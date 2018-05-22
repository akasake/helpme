<?php
    include_once("lib/settings/config.php");
    $title = "HELPME";
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
    <title><?php echo $title ?></title>
</head>
<body>
<div class="canvas">    
    <?php include_once("lib/includes/nav.inc.php"); ?>  
    
    <div class="buttons">
        <a class="buttons__main__helpmij" href="#">HELP MIJ <img src="images/helpmij.svg" alt="helpmij"></a>
        <a href="map.php" class="buttons__main__hulpbieden" href="#">HULP BIEDEN <img src="images/hulpBieden.svg" alt="hulpbieden"></a>
        <form  class="form__main__melden" action="melding.php" method="post">
            <input type="hidden" class="form__melding__long" name="long">
            <input type="hidden" class="form__melding__lat" name="lat">
            <button class="button buttons__main__melden" type="submit" name="submit">MELD ONGEVAL <img src="images/meldOngeval.svg" alt="ongeval melden"> </button>
        </form>
        <a class="buttons__main__ooggetuigen" href="ooggetuigen.php">OOGGETUIGEN <img src="images/ooggetuigen.svg" alt="ooggetuigen"></a>
    </div>
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</div>    
</body>
</html> 