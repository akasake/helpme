<?php
    include_once("lib/settings/config.php");
    $title = "Melding";


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
    <title>Muse</title>
</head>
<body>
    <?php include_once("lib/includes/nav.inc.php"); ?>  
    <form action="" method="post">
    <input type="file" accept="image/*;capture=camera">
    </form>
    
    
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>
</html> 