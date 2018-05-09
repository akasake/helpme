<?php
    include_once("lib/settings/config.php");
    $title = "Alle Meldingen";

    try {
        $u = new User;
        $username = rand(0,100).".".rand(0,100).".".rand(0,100).".".rand(0,100);
        $u->setUsername($username);
        $cookieVal = $username;
        // remember that the user has logged in (cookies)
        setcookie('login', $cookieVal, time()+60*60*24*360); //+1 year 
        $u->register();
        $u->login();
        $meldingen = Melding::getMelding();
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
        
    <!-- can add instructions or intro animation-->
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>
</html> 