<?php

if (isset($_POST['register-submit'])) {
    // If they try to access this file, punt back to proper register page, otherwise proceed

    require 'dbh-inc.php';

    $username =  $_POST['uid'];
    $email =  $_POST['mail'];
    $password =  $_POST['pwd'];
    $passwordRepeat =  $_POST['pwd-repeat'];
    $firstName =  $_POST['first'];
    $lastName =  $_POST['last'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$email."&first=".$firstName."last&=".$lastName);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&uid=".$username."&first=".$firstName."last&=".$lastName);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location: ../register.php?error=invalidmailuid&first=".$firstName."last&=".$lastName);
        exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location: ../register.php?error=invaliduid&mail=".$email."&first=".$firstName."last&=".$lastName);
    }
    // Password Reqs: 8, up to 20, requires--
    // at least one lowercase char
    // at least one uppercase char
    // at least one digit
    // at least one special sign of @#-_$%^&+=§!?

    else if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) {
        header("Location: ../register.php?error=invalidpassword&mail=".$email."&first=".$firstName."last&=".$lastName);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location: ../register.php?error=invalidcheck&uid=".$username."&mail=".$email."&first=".$firstName."last&=".$lastName);
        exit();
    }
    else {

        // We also need to include another error handler here that checks whether or the username is already taken. We HAVE to do this using prepared statements because it is safer

        // First we create the statement that searches our database table to check for any identical usernames.
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
        // We create a prepared statement.
        $stmt = mysqli_stmt_init($conn);
        // Then we prepare our SQL statement AND check if there are any errors with it.
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // If there is an error we send the user back to the register page.
            header("Location: ../register.php?error=sqlerror");
            mysqli_stmt_close($stmt);
            exit();
        }
        else {
            // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
            // In case you need to know, "s" means "string", "i" means "integer", "b" means "blob", "d" means "double".
            mysqli_stmt_bind_param($stmt, "s", $username);
            // Then we execute the prepared statement and send it to the database!
            mysqli_stmt_execute($stmt);
            // Then we store the result from the statement.
            mysqli_stmt_store_result($stmt);
            // Then we get the number of result we received from our statement. This tells us whether the username already exists or not!
            $resultCount = mysqli_stmt_num_rows($stmt);
            // Then we close the prepared statement!
            mysqli_stmt_close($stmt);
            // Here we check if the username exists.
            if ($resultCount > 0) {
                header("Location: ../register.php?error=usertaken&mail=" . $email);
                exit();
            } else {
                // If we got to this point, it means the user didn't make an error

                // Next thing we do is to prepare the SQL statement that will insert the users info into the database. We HAVE to do this using prepared statements to make this process more secure. DON'T JUST SEND THE RAW DATA FROM THE USER DIRECTLY INTO THE DATABASE!

                // Prepared statements works by us sending SQL to the database first, and then later we fill in the placeholders (this is a placeholder -> ?) by sending the users data.
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";
                // Here we initialize a new statement using the connection from the dbh.inc.php file.
                $stmt = mysqli_stmt_init($conn);
                // Then we prepare our SQL statement AND check if there are any errors with it.
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // If there is an error we send the user back to the register page.
                    header("Location: ../register.php?error=sqlerror");
                    mysqli_stmt_close($stmt);
                    exit();
                } else {

                    // If there is no error then we continue the script!

                    // Before we send ANYTHING to the database we HAVE to hash the users password to make it un-readable in case anyone gets access to our database without permission.
                    // With this current setup, it uses an automatically updated system; however I plan on adding additional options for additional security

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    // Next we need to bind the type of parameters we expect to pass into the statement, and bind the data from the user.
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    // Then we execute the prepared statement and send it to the database!
                    // This means the user is now registered
                    mysqli_stmt_execute($stmt);
                    // Lastly we send the user back to the register page with a success message!
                    header("Location: ../register.php?register=success");
                    mysqli_stmt_close($stmt);
                    exit();
                }
            }
        }
    }
    // Then we close the prepared statement and the database connection!

    mysqli_close($conn);
}
else {
    // If the user tries to access this page an improper way, we send them back to the registration page.
    header("Location: ../register.php");
    exit();
}