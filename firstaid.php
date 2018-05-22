<?php
    include_once("lib/settings/config.php");
    $title = "INSTRUCTIES";

    try {
        $video = ehbo::standardTreatment();
        if(!empty($_GET['illness'])){
            $videos = ehbo::getTreatment($_GET['illness']);
        }
        /*else if( ebho::userInRange($long, $lat)){
            $video = ehbo::getTreatment(ehbo::getIllnessIdFromMelding());
        }*/
        
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
        <?php include_once("lib/includes/nav.inc.php"); 
        if(isset($videos)): ?>
            <?php foreach($videos as $v): ?>
            <iframe width="390" height="220" src="<?php echo $v->video?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <?php endforeach; ?> 
        <?php else: ?>  
            <iframe width="390" height="220" src="<?php echo $video->video?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <?php endif; ?>
        <?php include_once("lib/includes/footer.inc.php"); ?>
    </div>
</body>
</html> 