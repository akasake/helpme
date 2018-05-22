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
    <script>
      function loadMaps() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        infoWindow = new google.maps.InfoWindow;
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

             var marker = new google.maps.Marker({
                position: pos,
                map: map
            });
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }
    </script>
</body>

</html> 