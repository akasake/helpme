<?php
    include_once("lib/settings/config.php");
    $title = "DETAIL MAP";


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
    <div class="mapdetail">
        <img src="images/down.png" alt="down">
        <h2>Jan Janssens</h2>
        <div class="info__details">
            <div class="risico">
                <h3><span class="red">risicopatiënt</span></h3>
                <h3>Aandoening</h3>
                <p>Diabetis, Epilepsie</p>
            </div>

            <div class="adres">
                <h3>Adres</h3>
                <p>Rue du dis 5</p>
                <p>Montréal</p>
            </div>
        </div>
        <div class="buttons__details">
            <a class="buttons__details__route" href="#">ROUTE<img src="images/route.svg" alt="Route"></a>
            <a class="buttons__details__bel" href="#">BELLEN<img src="images/bel.svg" alt="Bellen"></a>

            <a class="buttons__details__onderweg" href="#">ONDERWEG</a>
            <a class="buttons__details__hulp" href="#">EXTRA HULP</a>
        </div> 
        
    </div>
    <?php include_once("lib/includes/footer.inc.php"); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCP6tWYDigepitMGesI3xXYxg2mnvVDPAs&callback=loadMaps" async defer></script>
</div>
</body>

</html> 