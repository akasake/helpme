<?php
    class ehbo {
        public $name;
        public $treatment;
        
        public static function standardTreatment(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT tl_treatment.video FROM `tl_treatment` WHERE tl_treatment.name = 'standaard'
            ");
            $statement->execute();
            if($statement->rowCount() != 1) {
                throw new Exception("No Treatment Tutorials Found");
            }
            $video = $statement->fetch(PDO::FETCH_OBJ);
            return $video;
        }
        
        public static function getTreatment($illness_id){

            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT tl_treatment.video FROM `tl_treatment` left outer join tl_illness_treatment on tl_illness_treatment.treatment_id = tl_treatment.id where tl_illness_treatment.illness_id = :ill_id
            ");
            $statement->bindValue(":ill_id", $illess_id);
            $statement->execute();
            if($statement->rowCount() != 1) {
                throw new Exception("No Treatment Tutorials Found");
            }
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>