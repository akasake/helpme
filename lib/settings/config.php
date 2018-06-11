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
       // registers user
    if(!isset($_SESSION['id'])) {
        header("Location: login.php");
    }else if(isset($_SESSION['id'])){
        header("Location: index.php");
    }
    }catch(Exception $e){

    }

?>