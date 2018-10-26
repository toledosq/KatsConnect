<?php
//Login Database connector

$dbServername = "localhost"; //this is where the real server name should be
$dbUsername = "root"; //
$dbPassword = ""; //
$dbDBname = "login";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbDBname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
