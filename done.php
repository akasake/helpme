<?php
    include_once("lib/settings/config.php");
    $title = "HULP KOMT";
    


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("lib/includes/head.inc.php"); ?>
    <title><?php echo $title ?></title>
    <style>
      #map{
        height: 600px;
        width: 100%;
       }
    </style>
</head>
<body>
<div class="canvas">
    <?php include_once("lib/includes/nav.inc.php"); ?>       
    <h1>Hulp komt er zo aan!</h1>

    <?php include_once("lib/includes/footer.inc.php"); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCP6tWYDigepitMGesI3xXYxg2mnvVDPAs&callback=loadMaps" async defer></script>
</div>
</body>

</html> 