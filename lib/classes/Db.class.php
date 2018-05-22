<?php
    class Db {

        private static $conn;  
        /**
         * @return PDO connection
         * -> if exists -> return existing
         * -> if !exists -> return new PDO
         * 
         * Singleton: kijken of er een connectie is?
         * Anders aanmaken!
         */
        public static function getInstance() {

            if($_SERVER['HTTP_HOST'] == "localhost") {
                include_once($_SERVER['DOCUMENT_ROOT'] ."/helpme/lib/settings/db.php");
            }else{
                include_once($_SERVER['DOCUMENT_ROOT'] ."/helpme/lib/settings/db.prod.php");
            }
            
            if(self::$conn == null) {
                self::$conn = new PDO("mysql:host=".$db["host"].";dbname=".$db["dbname"]."", $db["username"], $db["password"]);
            }
            return self::$conn;
        }
        
    }
?>