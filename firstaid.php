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
    <div class="canvas"> 
        <?php include_once("lib/includes/nav.inc.php"); ?>   
        <iframe width="390" height="220" src="https://www.youtube.com/embed/ea1RJUOiNfQ?rel=0&amp;controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <iframe width="390" height="220" src="https://www.youtube.com/embed/BQNNOh8c8ks?rel=0&amp;controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <iframe width="390" height="220" src="https://www.youtube.com/embed/NxO5LvgqZe0?rel=0&amp;controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>   
        <?php include_once("lib/includes/footer.inc.php"); ?>
    </div>
</body>
</html> 