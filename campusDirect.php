<?php
//This section and the one below are reusable php sections for making any new page.
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KatsConnect - Campus Direct</title>
    <!-- Using Bootstrap 3.3.7!! -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #b3d9ff">
<!-- Map and Calendar -->
<div class="row">
    <div class="col-sm-1"></div>
    <!-- Map -->
    <div class="col-md-4">
        <h2 align="center">Campus Map</h2>
        <div class="embed-responsive embed-responsive-4by3" align="center">
            <iframe class="embed-responsive-item"
                    src="https://maphub.net/embed/39614">
            </iframe>
        </div>
    </div>
    <div class="col-sm-2"></div>
    <!-- Calendar -->
    <div class="col-md-4">
        <h2 align="center">Academic Calendar</h2>
        <!-- Calendar goes here -->
        <div class="embed-responsive embed-responsive-4by3" align="center">
            <iframe class="embed-responsive-item"
                    width="560"
                    height="315"
                    src="https://www.youtube.com/embed/q6EoRBvdVPQ"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>

            </iframe>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<!-- KatSafe Alerts -->
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-md-6">
        <h2 align="center">Current KatSafe Alert</h2>
        <div class="embed-responsive embed-responsive-4by3" align="center">
            <!-- KatSafe alert goes here -->
            <iframe class="embed-responsive-item"
                    width="560"
                    height="315"
                    src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>

            </iframe>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>

</body>
</html>
<?php
include_once 'footer.php';
?>