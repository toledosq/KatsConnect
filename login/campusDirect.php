<?php
//This section and the one below are reusable php sections for making any new page.
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<!-- Map and Calendar -->
<div class="row">
    <!-- Map -->
    <div class="col-sm-6">
        <h2 align="center">Campus Map</h2>
        <iframe align="center"
                width="600"
                height="600"
                src="https://maphub.net/embed/39614"
                frameborder="0">
        </iframe>
    </div>
    <!-- Calendar -->
    <div class="col-sm-6">
        <h2>Academic Calendar</h2>
        <br>
        <!-- Calendar goes here -->
    </div>
</div>

<!-- KatSafe Alerts -->
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <!-- KatSafe alert goes here -->
    </div>
    <div class="col-sm-2"></div>
</div>

</body>
</html>