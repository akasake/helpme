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

        public function setPassword($password)
        {
            if(empty($password)) {
                throw new Exception("Fill in your password, please!");
            }
                $this->password = strip_tags($password);

                return $this;
        } 
        public function getPassword()
        {
                return htmlspecialchars($this->password);
        }

        public function canIRegister(){
            if($this->usernameAvailable()){
                return true;
            } else {
                throw new Exception("You are not able to register. Try again.");
            }
        }

        public function canILogin(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                SELECT password FROM tl_user WHERE username = :username 
            ");

            $statement->bindValue(":username", $this->getUsername());
            $statement->execute();

            if($statement->rowCount() == 1) {
                $result = $statement->fetch(PDO::FETCH_OBJ);
        
                if(password_verify($this->getPassword(), $result->password)) {
                    return true;
                } else {
                    throw new Exception("Password or username not correct.");
                }
            } else {
                throw new Exception("Password or username not correct.");
            }
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

        public function logout(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            session_destroy();
            header('Location: login.php');
        }

        /** 
         * Function to assign a unique username 
        */

        public function register(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("
                INSERT INTO tl_user (firstname, lastname, username, password)
                VALUES (:firstName, :lastName, :username, :password)
            ");

            $options = [
                "cost" => "12"
            ];
                
            $hash = password_hash($this->getPassword(), PASSWORD_DEFAULT, $options);

            $statement->bindValue(":firstName", $this->getFirstName());
            $statement->bindValue(":lastName", $this->getLastName());
            $statement->bindValue(":username", $this->getUsername());
            $statement->bindValue(":password", $hash);

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