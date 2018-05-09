<?php
    // Only start a session if one hasn't been started yes
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    spl_autoload_register(function($class) {
        // Check if the class exists
        if(file_exists($_SERVER['DOCUMENT_ROOT'] ."/helpme/lib/classes/$class.class.php")) {
            include_once($_SERVER['DOCUMENT_ROOT'] ."/helpme/lib/classes/$class.class.php");
        // If not, include the helper class
        }else{
            if(file_exists($_SERVER['DOCUMENT_ROOT'] ."/helpme/lib/helpers/$class.class.php")) {
                include_once($_SERVER['DOCUMENT_ROOT'] ."/helpme/lib/helpers/$class.class.php");
            }
        }
    });

    try{
       if(!empty($_POST['search'])){
            $description= $_POST['search'];
            $searchedPosts = Post::searchRedirect($description);
       } 
       // registers user
    if(!isset($_SESSION['id'])) {
        $u = new User;
        $username = rand(0,100).".".rand(0,100).".".rand(0,100).".".rand(0,100);
        $u->setUsername($username);
        //$cookieVal = $username;
        // remember that the user has logged in (cookies)
        //setcookie('login', $cookieVal, time()+60*60*24*360); //+1 year 
        $u->register();
        $u->login();
    }
    }catch(Exception $e){

    }

?>