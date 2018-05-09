<?php
    include_once("lib/settings/config.php");
    $title = "Helpme";
    // check with cookie if is firsttime user if yes redirect to first_visit.php 

    try {
        if(!empty($_POST['long']) && !empty($_POST['lat'])) {
            Melding::makeHelpmeMelding($_POST['lat'],$_POST['long']);
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
    <form action="" method="post">
        <input type="hidden" class="form__melding__long" name="long">
        <input type="hidden" class="form__melding__lat" name="lat">
        <button class="button" type="submit" name="submit">Help Mij</button>
    </form>
    <a href="#">Ooggetuigen</a>
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>
</html> 