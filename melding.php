<?php
    include_once("lib/settings/config.php");
    $title = "MELDING";


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
    <title><?php echo $title ?></title>
</head>
<body>
<div class="canvas">     
    <?php include_once("lib/includes/nav.inc.php"); ?>  
        <video id="video" width="375" height="292" autoplay display="inherit" ></video>
        <button id="snap">Snap Photo</button>
        <canvas id="canvas" class="hidden" width="375" height="292" ></canvas>
        <button id="tryAgain" class="hidden">Try again</button>
        <button id="save" class="hidden">Save</button>     
    <form action="" method="post">   
        <input type="hidden" name="photo" class="photo" id="photo" value="">
        <div class="description">
            <label for="description" class="">Description</label>
            <textarea cols="30" rows="5" class="" name="description" id="description" placeholder=" Describe here"></textarea>
        </div>
        <input type="hidden" class="form__melding__long" name="long">
        <input type="hidden" class="form__melding__lat" name="lat">
        <button id="send" type="submit">send</button>
    </form>
    
    
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</div>    
</body>
</html> 