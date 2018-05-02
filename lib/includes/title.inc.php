<?php
    /** Reads out the basename of the current script
     *  For example: edit-profile.php
    */
    $base = basename($_SERVER['PHP_SELF']);
    
    if(!empty($base) && $base != "index.php") {

        // Get the filename without the extension
        $title = explode(".", $base)[0];
        // Remove hyphens in the name
        $title = str_replace('-', ' ', $title);
        // Make the first letter a capital letter, print the result
        echo ucfirst($title)." | Helpme ";

    }else{

        echo ("Helpme");

    } 
?>