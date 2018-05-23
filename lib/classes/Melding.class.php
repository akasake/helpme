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
                (user_id, longitude, latitude, melder_id, type)
                VALUES (:userId, :long, :lat, :melderId, 1)
            ");
            $statement->bindValue(":userId", $_SESSION['id']);
            $statement->bindValue(":melderId", $_SESSION['id']);            
            // Checks if the values are set, else return null
            $statement->bindValue(":long", $long ?? null);
            $statement->bindValue(":lat", $lat ?? null);
            // time is filled automatically in database
            $statement->execute();
            if($statement->execute()){
                header("location: done.php");
            }

        }
        public static function makeMelding($long, $lat, $img, $des){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                INSERT INTO tl_melding
                (longitude, latitude,  melder_id, type, image, description)
                VALUES (:long, :lat, :userId, 2, :image, :des )
            ");
            $statement->bindValue(":userId", $_SESSION['id']);
            // Checks if the values are set, else return null
            $statement->bindValue(":long", $long ?? null);
            $statement->bindValue(":lat", $lat ?? null);
            $statement->bindValue(":image", $img ?? null);
            $statement->bindValue(":des", $des ?? null);
            // time is filled automatically in database
            $statement->execute();
            if($statement->execute()){
                header("location: done.php");
            }
            
            

        }
        public static function getMeldingen(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                Select tl_melding.id, tl_melding.type, tl_melding.longitude, tl_melding.latitude, tl_melding.image, tl_melding.user_id, tl_melding.time, tl_user.firstname, tl_user.lastname from tl_melding
                left OUTER JOIN tl_user ON tl_user.id = tl_melding.user_id
                order by tl_melding.time desc
                limit 20 
            ");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);        

        }

        public static function getCloseMeldingen($long, $lat){
            $melding = Melding::getMeldingen();   
            $mInRange = [];
            $maxDistance = 2;
            foreach($melding as $m){
             
                if(Melding::calculateWithinDistance($long, $lat, $m['longitude'], $m['latitude'], $maxDistance)){
                    array_push($mInRange, $m);
                }
            }
   
            if(count($mInRange)<1) {
                throw new Exception("There are no emergencies near you.");
            }
   
            return $mInRange;
        }

            

        

        // function altered from the GeoDataSource.com 
       // this function will calculate if the given long and lat of a post is within the given distance of the user
       // return true or false
       public static function calculateWithinDistance($longUser, $latUser, $longPost, $latPost, $maxDistance){
        if($longPost != NULL && $latPost != NULL){
             $theta = $longUser - $longPost;
             $dist = sin(deg2rad($latUser)) * sin(deg2rad($latPost)) +  cos(deg2rad($latUser)) * cos(deg2rad($latPost)) * cos(deg2rad($theta));
             $dist = acos($dist);
             $dist = rad2deg($dist);
             $miles = $dist * 60 * 1.1515;
             $km = ($miles * 1.609344);
             if($km<$maxDistance){
                 return true;
             }else{
                 return false;
             }
        }else{
            return false;
        }
         
     }

    }
?>