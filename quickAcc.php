<?php 
$u = new User;
        $username = rand(0,100).".".rand(0,100).".".rand(0,100).".".rand(0,100);
        $u->setUsername($username);
        $u->setPassword("");
        $u->setFirstName("");
        $u->setLastName("");
        //$cookieVal = $username;
        // remember that the user has logged in (cookies)
        //setcookie('login', $cookieVal, time()+60*60*24*360); //+1 year 
        $u->register();
        $u->login();

    ?>