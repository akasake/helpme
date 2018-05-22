<?php
    include_once("lib/settings/config.php");


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("backend/includes/head.inc.php"); ?>
    <title>Muse</title>
</head>
<body>
    <?php include_once("backend/includes/nav.inc.php"); ?>
        
    <div class="container">
        
        <div id="googleMapContainer">
            <div class="googleMap googleMap--all" data-lat="50.641111" data-long="4.668056"></div>
        </div>
    </div>

    <?php include_once("backend/includes/footer.inc.php"); ?>
</body>
</html> 