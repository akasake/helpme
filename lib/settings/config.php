<?php
    // * Do not place user only code here for performance!

    // * Place user only code here!

    spl_autoload_register(function($class) {
        // Check if the class exists
        if(file_exists($_SERVER['DOCUMENT_ROOT'] ."/helpme/lib/classes/$class.class.php")) {
            include_once($_SERVER['DOCUMENT_ROOT'] ."/helpe/lib/classes/$class.class.php");
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
    }catch(Exception $e){

    }

?>