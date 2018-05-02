<?php
    class Conversation {
        private $helperId;
        private $userId;
        private $message;

        
        /**
         * Get the value of helperId
         */ 
        public function gethelperId()
        {
                return htmlspecialchars($this->helperId);
        }

        /**
         * Set the value of helperId
         *
         * @return  self
         */ 
        public function sethelperId($helperId)
        {
                $this->helperId = strip_tags($helperId);

                return $this;
        }

        /**
         * Get the value of message
         */ 
        public function getMessage()
        {
                return htmlspecialchars($this->message);
        }


        public function save(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("INSERT INTO tl_conversation (helper_id, user_id, message) VALUES (:helperId, :userId, :message)");
            $statement-> bindValue(":helperId", $this->gethelperId());
            $statement->bindValue(":userId", $_SESSION['id']);
            $statement->bindValue(":message", $this->getMessage());
            $statement->execute();
            return true;
        }


        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return $this->userId;
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }
    }

?>