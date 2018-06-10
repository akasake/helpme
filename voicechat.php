<?php
    include_once("lib/settings/config.php");
    $title = "VOICE CHAT";

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
    <div class="voicechat">
    <img class="voice" src="images/voice.png" alt="icon voice chat">
    <img class="voiceb"src="images/voicebutton.png" alt="button voice chat">
    </div>
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</div>   
</body>
</html> 