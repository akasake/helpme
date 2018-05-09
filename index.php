<?php
    include_once("lib/settings/config.php");
    $title = "Helpme";
    // check with cookie if is firsttime user if yes redirect to first_visit.php 
    


    try {
        if(!isset($_COOKIE['login'])) {
            header('Location: first_visit.php');
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
    <title>Muse</title>
</head>
<body>
    <?php include_once("lib/includes/nav.inc.php"); ?>  
        
    <a href="#">Noodmelding</a>
    <a href="#">Hulp bieden</a>
    <a href="#">Help mij</a>
    <a href="#">Ooggetuigen</a>
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>
</html> 