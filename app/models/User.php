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

        public function checkUserExists($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT username FROM user where username='".$username."'");
                if($stmt->fetch(PDO::FETCH_ASSOC)==true){
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
                if($stmt->fetch(PDO::FETCH_ASSOC)==true){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        public function validateLogin($input){
            
            $error=array();

            if(empty($input['username']) || empty($input['password'])){
                $error = array_merge($error,array('login' => 'All the fields are required.'));
            }
            else{
                $cleanUsername = $this->cleanInput($input['username']);
                $cleanPassword = $this->cleanInput($input['password']);
                require_once('../app/Core/Database.php');
                $db = new Database();
                $conn = $db->setConnection();
                if($conn !== null){
                    $stmt = $conn->query("SELECT username,password,user_type,status FROM user where username='".$cleanUsername."'");
                    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        if(password_verify($cleanPassword,$row['password']) ){
                            if($row['status']!=='Suspended' && $row['status']!=='unverified'){
                                return array('valid'=>1 ,'data'=>['username'=>$row['username'],'usertype'=>$row['user_type']]);
                            }
                            $error = array_merge($error,array('login' => 'Your account is currently suspended or unverified. Please contact the support center for further details.'));
                        }
                        else{
                            $error = array_merge($error,array('login' => 'Incorrect username or password.'));
                        }
                    }
                    else{
                        $error = array_merge($error,array('login' => 'Incorrect username or password.'));
                    }
                }               
            }
            return array('valid'=>0, 'error'=>$error);

        }

        public function login($data){
            $response = $this->validateLogin($data);
            if($response['valid']==true){
                $this->setUsername($response['data']['username']);

                //The variables below are arguments to be passed to insert data to their respective table 
                $userTb = array('last_login' => "UTC_TIMESTAMP()");                
                $this->update('user',$userTb,"WHERE username ='". $this->getUsername() . "'");

                return array('valid'=>1,'username'=>$this->getUsername(),'usertype'=> $response['data']['usertype']);
            } 
            else{
                return $response;
            }      
        }

        public function suspend($username){
            $userTb = array('status' => "'Suspended'"); 
            return $this->update('user',$userTb,"WHERE username='".$username."'");
        }

        public function activate($username){
            $userTb = array('status' => "'verified'"); 
            return $this->update('user',$userTb,"WHERE username='".$username."'");

        }

        public function verifyUser($verificationId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "select * from verification where verification_id='".$verificationId."'";
                
                $stmt = $conn->query($sql);
                if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $data = array('status'=>"'verified'");
                    $condition = "WHERE username='".$row['username']."'";
                    $this->update("user",$data,$condition);
                    $usertype = $this->retrieveUserType($row['username']);
                    return array('username'=>$row['username'],'usertype'=>$usertype['user_type']);
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveUserType($username){
            $username = $this->cleanInput($username);
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";

                if(!empty($_SESSION['usertype'])){
                    if($_SESSION['usertype'] ==='serviceseeker'){
                        $sql = "SELECT user_type FROM user where user_type = 'serviceprovider' and username='".$username."'";
                    }
                    if($_SESSION['usertype'] ==='serviceprovider'){
                        $sql = "SELECT user_type FROM user where user_type = 'serviceseeker' and username='".$username."'";
                    }
                }                
                else{
                    $sql = "SELECT user_type FROM user where username='".$username."'";
                }
                $stmt = $conn->query($sql);
                if($usertype = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $usertype;
                }
                else{
                    return false;
                }
            }
        }
    }
?>