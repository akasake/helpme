<?php
    include_once("lib/settings/config.php");
    $title = "CAMERA";

    try {
        
    } 
    catch(Exception $e){
        
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("lib/includes/head.inc.php"); ?>
    <title><?php echo $title?></title>
</head>
<body>
    <?php include_once("lib/includes/nav.inc.php"); ?>   
    <video id="video" width="390" height="480" autoplay display="inherit" ></video>
    <button id="snap">Snap Photo</button>
    <canvas id="canvas" class="hidden" width="390" height="480" ></canvas>
    <button id="tryAgain" class="hidden">Try again</button>
    <button id="save" class="hidden">Save</button>
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>
</html> 