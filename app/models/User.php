<?php

    class User extends Database{
        
        private $username;
        private $password;
        private $email;
        private $firstName;
        private $lastName;
        private $gender;
        private $mobileNumber;
        private $nationality;
        private $counrty;
        private $city;
        private $address;
        private $joinDate;
        private $lastLogin;

        public function getUsername(){
            return $this->username; 
        }

        public function setUsername($username){
            $this->username = $username;
        }
    }
?>