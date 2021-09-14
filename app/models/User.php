<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

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

                    if($_SESSION['usertype'] ==='admin'){
                    $sql = "SELECT user_type FROM user where username='".$username."'";
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

        public function validatePasswordChange($input){
            
            // $userData holds the data to be inserted to Service provider table
            $userData = array();
            $error=array();


            if(empty($input['oldpassword'])){
                $error = array_merge($error,array('oldpassword' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['oldpassword']);
                require_once('../app/Core/Database.php');
                $db = new Database();
                $conn = $db->setConnection();
                if($conn !== null){
                    $stmt = $conn->query("SELECT username,password FROM user where username='".$_SESSION['username']."'");
                    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        if(!password_verify($cleanData,$row['password']) ){
                            $error = array_merge($error,array('oldpassword' => 'Incorrect password.'));
                        }
                    } 
                }                      
            }

            if(empty($input['newpassword'])){
                $error = array_merge($error,array('newpassword' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['newpassword']);                
                $uppercase = preg_match('@[A-Z]@', $cleanData);
                $lowercase = preg_match('@[a-z]@', $cleanData);
                $number    = preg_match('@[0-9]@', $cleanData);
                $specialChars = preg_match('@[^\w]@', $cleanData);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($cleanData) < 8) {
                    $error = array_merge($error,array('newpassword' => 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.'));
                  }
                else{
                    $userData = array_merge($userData,array('newpassword' => password_hash($cleanData,PASSWORD_DEFAULT)));
                }                      
            }

            if(empty($input['confirmpassword'])){
                $error = array_merge($error,array('confirmpassword' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['confirmpassword']);

                if ($cleanData!=$this->cleanInput($input['newpassword'])) {
                    $error = array_merge($error,array('confirmpassword' => 'Password does not match with the new password'));
                }                     
            }

            if(empty($error)){
                return array('valid'=>1 ,'data'=>$userData);
            }
            else{
                return array('valid'=>0,'error'=>$error);
            }

            
        }


        public function updatePassword($data){
            if(empty($_SESSION['username'])){
                $this->setEmail($data['email']);
                $this->setPassword(password_hash($data['newpassword'],PASSWORD_DEFAULT));

                $userTb = array('password' => "'".$this->getPassword()."'");
                $this->update('user',$userTb,"WHERE email ='". $this->getEmail() . "'");
            }
            else{
                $response = $this->validatePasswordChange($data);            
            
                if($response['valid']==true){
                    $this->setUsername($_SESSION['username']);
                    $this->setPassword($response['data']['newpassword']);

                    $userTb = array('password' => "'".$this->getPassword()."'");
                    $this->update('user',$userTb,"WHERE username ='". $this->getUsername() . "'");
                    return array('valid'=>1);
                } 
                else{
                    return $response;
                } 
            }
            
              
        }

        public function validateForgotPassword($input){
            
            // $userData holds the data to be inserted to Service provider table
            $userData = array();
            $error=array();


            if(empty($input['email'])){
                $error = array_merge($error,array('email' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['email']);
                require_once('../app/Core/Database.php');
                $db = new Database();
                $conn = $db->setConnection();
                if($conn !== null){
                    $stmt = $conn->query("SELECT username,email FROM user where email='".$cleanData."'");
                    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $username = $row['username'];
                        $newPassword = uniqid();
                        require '../app/vendor/autoload.php';
                        $mail = new PHPMailer(true);
                        try{
                            $mail->isSMTP();// set mailer to use smtp
                            $mail->Host = 'smtp.gmail.com'; //specify the smtp server
                            $mail->SMTPAuth = true; // enable smtp authenticatiion
                            $mail->Username = "seralance2021@gmail.com"; // SMTP username
                            $mail->Password = "hello@there123HT"; // SMTP pasword
                            $mail->SMTPSecure = "tls"; // Enable TLS encryption
                            $mail->Port = 587; // TCP port to connect to

                            // recipient
                            $mail->setFrom("seralance2021@gmail.com","Seralance");
                            $mail->addAddress($row['email'],$row['email']);
                            
                            //content
                            $mail->isHTML(true); // set email format to html
                            $mail->Subject = "Forgotten password";
                            $msg =<<<EOT
                                <html>
                                    <body>
                                        <div style="text-align: center;">
                                            <img src="{$_SESSION['baseurl']}public/assets/images/seralance-logo.png" alt="Seralance">
                                        </div>
                                        
                                        <p style="text-align: center;">
                                            Your username is {$username}.
                                        </p>
                                        <p style="text-align: center;">
                                            Your newly generated password is {$newPassword}.
                                        </p>
                                    </body>
                                </html>
                            EOT;

                            $mail->Body =$msg;

                            $mail->send();
                            $this->updatePassword(array('email'=>$row['email'],'newpassword'=>$newPassword));

                        }
                        catch(Exception $e){
                            $error = array_merge($error,array('email' => 'Sorry for the inconvenience! We could not send a new password. Please try again later.'));
                        }                        
                    }
                    else{
                        $error = array_merge($error,array('email' => 'Email does not exist.'));
                    } 
                }                      
            }
            
            if(empty($error)){
                return array('valid'=>1 ,'data'=>$userData);
            }
            else{
                return array('valid'=>0,'error'=>$error);
            }

            
        }


        public function sendPassword($data){
            $response = $this->validateForgotPassword($data);            
            
            if($response['valid']==true){                
                return array('valid'=>1);
            } 
            else{
                return $response;
            } 
              
        }

    }
?>