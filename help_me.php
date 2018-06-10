<?php
    include_once("lib/settings/config.php");
    $title = "SUCCES";
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
    <img src="data:image/webp;base64,UklGRiIGAABXRUJQVlA4IBYGAABwJQCdASp3ASQBPm02lUmkIqIkICgggA2JZ278Tx96B8O2nUIrd3XlCAF2Afi/9tOPm+IF9fdz84lfv/7Xsf7/yAT22IvEEl69DTnIJmi5MiJlTvQjOwm9OaXiRwYnAYDJsmYi/WB5dHslL3XO3YY5xctXgYpr7vR+DHyzlwh+Yi4mFm5R5DIHsMFYIzJFVFoGFGnhJLUvyoxy" alt="">

    <?php include_once("lib/includes/footer.inc.php"); ?>
    
</div>
</body>
</html> 