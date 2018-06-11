<?php

    class Security {
        private $password;
        private $passwordConfirm;

        public function passwordIsSecure(){
            if($this->passwordsAreEqual() && $this->passwordIsStrong()){
                return true;
            } else {
                return false;
            }
        }

        private function passwordsAreEqual(){
            if($this->password != $this->passwordConfirm){
                throw new Exception("Passwords are not equal.");
            } else {
                return true;
            }
        }

        private function passwordIsStrong(){
            if(strlen($this->password) < 8){
                throw new Exception("Your password must contain at least 8 characters.");
            } else {
                return true;
            }
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of passwordConfirm
         */ 
        public function getPasswordConfirm()
        {
                return $this->passwordConfirm;
        }

        /**
         * Set the value of passwordConfirm
         *
         * @return  self
         */ 
        public function setPasswordConfirm($passwordConfirm)
        {
                $this->passwordConfirm = $passwordConfirm;

                return $this;
        }
    }

?>