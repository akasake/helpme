<?php
    include_once("lib/settings/config.php");
    $title = "INSTRUCTIES";

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
    <?php include_once("lib/includes/nav.inc.php"); ?>   
    
    <div class="buttons">
        <a class="buttons__main__instructies" href="firstaid.php">INSTRUCTIES <img src="images/instructies.svg" alt="instructies"></a>
        <a href="map.php" class="buttons__main__voicechat" href="#">VOICE CHAT <img src="images/voiceChat.svg" alt="voice chat"></a>
        <a href="map.php" class="buttons__main__videochat" href="#">VIDEO CHAT <img src="images/videoChat.svg" alt="video chat"></a>
    </div>    

    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>
</html> 