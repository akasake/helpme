<?php
    include_once("lib/settings/config.php");
    $title = "map"


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("lib/includes/head.inc.php"); ?>
    <title>Muse</title>
    <style>
      #map{
        height: 400px;
        width: 100%;
       }
    </style>
</head>
<body>
    <?php include_once("lib/includes/nav.inc.php"); ?>       
    <div id="map"></div>

    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>

</html> 