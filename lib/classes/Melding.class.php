<?php
    class Melding {
        private $melderId;
        private $userId;
        private $message;
        private $type;
        private $location;

        public static function makeHelpmeMelding($long, $lat){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                INSERT INTO tl_melding
                (user_id, longitude, latitude)
                VALUES (:userId, :long, :lat)
            ");
            $statement->bindValue(":userId", $_SESSION['id']);
            // Checks if the values are set, else return null
            $statement->bindValue(":long", $long ?? null);
            $statement->bindValue(":lat", $lat ?? null);
            // time is filled automatically in database
			$statement->execute();

        }
        public static function getMeldingen(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                Select * from tl_melding 
                limit 20 
                order by tl_melding.time desc
            ");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);        

        }

    }
?>