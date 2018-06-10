<?php
    
    class User {
        private $firstName;
        private $lastName;
        private $username;
        private $userId;
        private $avatar;
        private $helperId;

        /**
         * Function for collecting user info
         * Returns object of requested user data
         */

        public function getUserInfo($fields = null) {

            // Optional array of fields to select

            if(!empty($fields)) {

                // Makes fields ready for SELECT statement
                 $fields = implode(", ", $fields);

            }
           
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT ".(!empty($fields) ? $fields : "*")." FROM tl_user
                WHERE tl_user.id = :userId OR tl_user.username = :username
            ");
            $statement->bindValue(":userId", $this->getUserId());
            $statement->bindValue(":username", $this->getUsername());
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);

        }

        public function updateEmail() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                UPDATE tl_user
                SET tl_user.email = :email
                WHERE tl_user.id = :userId
            ");
            $statement->bindValue(":email", $this->getEmailNew());
            $statement->bindValue(":userId", $this->getUserId());
            if($statement->execute()) {
                return true;
            }
            return false;
        }

        public function validateEmailUpdate() {
            if($this->emailCorrect() && $this->emailAvailable()) {
                return true;
            }
            return false;
        }

        private function emailCorrect() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT tl_user.email FROM tl_user
                WHERE tl_user.email = :email AND tl_user.id = :userId
            ");
            $statement->bindValue(":email", $this->getemail());
            $statement->bindValue(":userId", $this->getUserId());
            $statement->execute();
            if($statement->rowCount() != 1) {
                throw new Exception("Your current email isn't correct.");
            }
            return true;
        }

        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return htmlspecialchars($this->userId);
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId($userId)
        {
                $this->userId = strip_tags($userId);

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return htmlspecialchars($this->email);
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
            if(empty($email)) {
                throw new Exception("Fill in your email address, please!");
            }
                $this->email = strip_tags($email);
                $this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);

                if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                    return true;
                } else {
                    throw new Exception("Fill in a valid email address.");
                }

                return $this;
        }

        /**
         * Updates the avatar for the user who's logged in
         */

        public function updateAvatar() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                UPDATE tl_user
                SET tl_user.avatar = :avatar
                WHERE tl_user.id = :userId
            ");
            $statement->bindValue(":avatar", $this->getAvatar());
            $statement->bindValue(":userId", $this->getUserId());
            if($statement->execute()) {
                return true;
            }
            return false;
        }

        /**
         * Get the value of avatar
         */ 
        public function getAvatar()
        {
                return htmlspecialchars($this->avatar);
        }

        /**
         * Set the value of avatar
         *
         * @return  self
         */ 
        public function setAvatar($avatar)
        {
                $this->avatar = strip_tags($avatar);

                return $this;
        }

        /**
         * Get the value of firstName
         */ 
        public function getFirstName()
        {
                return htmlspecialchars($this->firstName);
        }

        /**
         * Set the value of firstName
         *
         * @return  self
         */ 
        public function setFirstName($firstName)
        {
            if(empty($firstName)) {
                throw new Exception("Fill in your first name, please!");
            }
                $this->firstName = strip_tags($firstName);

                return $this;
        }

        /**
         * Get the value of lastName
         */ 
        public function getLastName()
        {
                return htmlspecialchars($this->lastName);
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */ 
        public function setLastName($lastName)
        {
            if(empty($lastName)) {
                throw new Exception("Fill in your last name, please!");
            }
                $this->lastName = strip_tags($lastName);

                return $this;
        }

        /**
         * Get the value of userName
         */ 
        public function getUsername()
        {
                return htmlspecialchars($this->username);
        }

        /**
         * Set the value of userName
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
            if(empty($username)) {
                throw new Exception("Fill in your username, please!");
            }
                $this->username = strip_tags($username);

                return $this;
        }

        /** 
         * Feature to check if the email is available
        */

        private function emailAvailable(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT * FROM tl_user WHERE email = :email
            ");

            if($this->getUserId()) {
                $statement->bindValue(":email", $this->getEmailNew());
            }else{
                $statement->bindValue(":email", $this->getEmail());
            }
            
            $statement->execute();
            
            if($statement->rowCount() > 0){
                throw new Exception("This email address is already in use.");
            } else {
                return true;
            }
        }

        /** 
         * Feature to check if the username is available
        */

        private function usernameAvailable(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT * FROM tl_user WHERE username = :username
            ");

            $statement->bindValue(":username", $this->getUsername());
            $statement->execute();
            
            if($statement->rowCount() > 0){
                throw new Exception("This username is already in use.");
            } else {
                return true;
            }
        }


        // first log in, you are asigned a unique username
        public function login(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT id FROM tl_user WHERE username = :username 
            ");

            $statement->bindValue(":username", $this->getUsername());
            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_OBJ);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['id'] = $result->id;
            header('Location: index.php');
        }

        /** 
         * Function to assign a unique username 
        */

        public function register(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                INSERT INTO tl_user (first_name, last_name, username)
                VALUES (:firstName, :lastName, :username)
            ");

            $statement->bindValue(":firstName", "");
            $statement->bindValue(":lastName", "");
            $statement->bindValue(":username", $this->getUsername());
            $statement->execute();

            
        }
    
        /**
         * Get the value of helperId
         */ 
        public function getHelperId()
        {
                return $this->helperId;
        }

        /**
         * Set the value of helperId
         *
         * @return  self
         */ 
        public function setHelperId($helperId)
        {
                $this->helperId = $helperId;

                return $this;
        }

        // get user illnesses
        public static function getUserIllness($userId){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT name
                FROM tl_illness
                left outer join tl_user_illness on tl_user_illness.illness_id = tl_illness.id
                WHERE user_id = :userId 
            ");  
            $statement->bindValue(":userId", $userId);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);   
        }

        public static function showNotif($id) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT tl_user.showNotif FROM tl_user
                WHERE tl_user.id = :userId
            ");
            $statement->bindValue(":userId", $id);
            $statement->execute();
            $show = $statement->fetch();
            if( $show != 1) {
                return false;
            }else{
                return true;
            }
            
        }
    }
?>