<?php
    include_once("lib/settings/config.php");
    $title = "HELPME";
    // check with cookie if is firsttime user if yes redirect to first_visit.php 
    $check = User::showNotif($_SESSION['id']);

    try {
        if(!empty($_POST)) {
            Melding::makeHelpmeMelding($_POST['long'],$_POST['lat']);
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
    <?php if($check = true):  ?>
     <?php include_once("lib/includes/notif.inc.php"); ?>         
    <?php endif; ?>
    <img src="" alt="">
    
    <div class="buttons">
        <form  class="form__main__helpmij" action="" method="post">
            <input type="hidden" class="form__melding__long" name="long">
            <input type="hidden" class="form__melding__lat" name="lat">
            <button class="buttons__main__helpmij button" type="submit" name="submit">HELP MIJ<img src="images/helpmij.svg" alt="helpmij"></button>
        </form>
        <a href="map.php" class="buttons__main__hulpbieden" href="#">HULP BIEDEN <img src="images/hulpBieden.svg" alt="hulpbieden"></a>
        <a class="buttons__main__melden" href="melding.php">MELD ONGEVAL <img src="images/meldOngeval.svg" alt="ongeval melden"></a>
        <a class="buttons__main__ooggetuigen" href="ooggetuigen.php">OOGGETUIGEN <img src="images/ooggetuigen.svg" alt="ooggetuigen"></a>
    </div>
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</div>    
</body>
</html> 