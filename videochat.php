<?php
    include_once("lib/settings/config.php");
    $title = "MELDING";


    try {
        if(!empty($_POST)) {
            Melding::makeMelding($_POST['long'],$_POST['lat'], $_POST['photo'], $_POST['description']);
        }

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
 <div class="helpdesk">
 <iframe width="370" height="600" src="https://www.youtube.com/embed/YGQnH9g0Ago" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <video class="selfie" id="video" width="187" height="146" autoplay display="inherit" ></video>
        
 </div>
    
    
    
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</div>    
</body>
</html> 