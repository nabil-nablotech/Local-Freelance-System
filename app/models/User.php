<?php

    class User extends Model{
        
        private $username;
        private $password;
        private $email;
        private $firstName;
        private $lastName;
        private $gender;
        private $mobileNumber;
        private $nationality;
        private $country;
        private $city;
        private $address;
        private $joinDate;
        private $lastLogin;
        private $status; // unverified, active and suspended


        // --------Getter and Setters of the attributes-----------
        public function getUsername(){
            return $this->username; 
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function getPassword(){
            return $this->password; 
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getEmail(){
            return $this->email; 
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getFirstName(){
            return $this->firstName; 
        }

        public function setFirstName($firstName){
            $this->firstName = $firstName;
        }

        public function getLastName(){
            return $this->lastName; 
        }

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }

        public function getGender(){
            return $this->gender; 
        }

        public function setGender($gender){
            $this->gender = $gender;
        }

        public function getMobileNumber(){
            return $this->mobileNumber; 
        }

        public function setMobileNumber($mobileNumber){
            $this->mobileNumber = $mobileNumber;
        }

        public function getNationality(){
            return $this->nationality; 
        }

        public function setNationality($nationality){
            $this->nationality = $nationality;
        }

        public function getCountry(){
            return $this->country; 
        }

        public function setCountry($country){
            $this->country = $country;
        }

        public function getCity(){
            return $this->city; 
        }

        public function setCity($city){
            $this->city = $city;
        }

        public function getAddress(){
            return $this->address; 
        }

        public function setAddress($address){
            $this->address = $address;
        }

        public function getJoinDate(){
            return $this->joinDate; 
        }

        public function setJoinDate($joinDate){
            $this->joinDate = $joinDate;
        }

        public function getLastLogin(){
            return $this->lastLogin; 
        }

        public function setLastLogin($lastLogin){
            $this->lastLogin = $lastLogin;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        //---------End of getters and setters ---------///

        protected function checkUserExists($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT username FROM user where username='".$username."'");
                if($stmt->fetch(PDO::FETCH_ASSOC)===true){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        protected function checkEmailExists($email){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT email FROM user where email='".$email."'");
                if($stmt->fetch(PDO::FETCH_ASSOC)===true){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }
?>