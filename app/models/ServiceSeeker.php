<?php

    class ServiceSeeker extends User{
        
        private $bankName;
        private $accountNumber;
        private $walletBalance;
        private $profilePhoto;



        // --------Getter and Setters of the attributes-----------

        public function getBankName(){
            return $this->bankName; 
        }

        public function setBankName($bankName){
            $this->bankName = $bankName;
        }

        public function getAccountNumber(){
            return $this->accountNumber; 
        }

        public function setAccountNumber($accountNumber){
            $this->accountNumber = $accountNumber;
        }

        public function getWalletBalance(){
            return $this->walletBalance; 
        }

        public function setWalletBalance($walletBalance){
            $this->walletBalance = $walletBalance;
        }
        
        public function getProfilePhoto(){
            return $this->profilePhoto; 
        }

        public function setProfilePhoto($profilePhoto){
            $this->profilePhoto = $profilePhoto;
        }

        //---------- End of getters and setters--------------

        public function retrieveAllSkills(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT * FROM skill");
                if($skills = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $skills;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveUserDetails($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,status,bank_name,account_number,wallet_balance,profile_photo FROM user INNER JOIN service_seeker ON user.username = service_seeker.username where user.username='".$username."'");
                if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $data = array(
                        'username'=>$row['username'],
                        'email'=>$row['email'],
                        'firstname'=>$row['firstname'],
                        'lastname'=>$row['lastname'],
                        'gender'=>$row['gender'],
                        'mobilenumber'=>$row['mobile_number'],
                        'nationality'=>$row['nationality'],
                        'country'=>$row['country'],
                        'city'=>$row['city'],
                        'address'=>$row['address'],
                        'status'=>$row['status'],
                        'bankname'=>$row['bank_name'],
                        'accountnumber'=>$row['account_number'],
                        'walletbalance'=>$row['wallet_balance'],
                        'profilephoto'=>$row['profile_photo']                        
                    );
                    return $data;
                }
                else{
                    return false;
                }
            }
        }

        public function validateSignup($input,$files){
            
            // $serviceSeekerData holds the data to be inserted to Service provider table
            $serviceSeekerData = array();
            $error=array();


            if(empty($input['firstname'])){
                $error = array_merge($error,array('firstname' => 'This field is required.'));
            }
            else{
                $serviceSeekerData = array_merge($serviceSeekerData,array('firstname' => $this->cleanInput($input['firstname'])));
            }

            if(empty($input['lastname'])){
                $error = array_merge($error,array('lastname' => 'This field is required.'));
            }
            else{
                $serviceSeekerData = array_merge($serviceSeekerData,array('lastname' => $this->cleanInput($input['lastname'])));
            }

            if(empty($input['email'])){
                $error = array_merge($error,array('email' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['email']);                

                if (!filter_var($cleanData, FILTER_VALIDATE_EMAIL)) {
                    $error = array_merge($error,array('email' => 'Invalid email format.'));
                  }

                elseif($this->checkEmailExists($cleanData)){
                    $error = array_merge($error,array('email' => 'Email already exist.'));
                }

                $serviceSeekerData = array_merge($serviceSeekerData,array('email' => $cleanData));              
            }

            if(empty($input['username'])){
                $error = array_merge($error,array('username' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['username']);

                if ($this->checkUserExists($cleanData)) {
                    $error = array_merge($error,array('username' => 'Username already taken.'));                                       
                  }
                  
                $serviceSeekerData = array_merge($serviceSeekerData,array('username' => $cleanData)); 
            }

            if(empty($input['password'])){
                $error = array_merge($error,array('password' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['password']);                
                $uppercase = preg_match('@[A-Z]@', $cleanData);
                $lowercase = preg_match('@[a-z]@', $cleanData);
                $number    = preg_match('@[0-9]@', $cleanData);
                $specialChars = preg_match('@[^\w]@', $cleanData);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($cleanData) < 8) {
                    $error = array_merge($error,array('password' => 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.'));
                  }
                else{
                    $serviceSeekerData = array_merge($serviceSeekerData,array('password' => password_hash($cleanData,PASSWORD_DEFAULT)));
                }                      
            }

            if(empty($input['mobilenumber'])){
                $error = array_merge($error,array('mobilenumber' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['mobilenumber']);

                if (!preg_match('/^09[0-9]{8}+$/', $cleanData)) {
                    $error = array_merge($error,array('mobilenumber' => 'Invalid mobile number format. Mobile No. should be in this format (09xxxxxxxx).'));
                }                   
                
                $serviceSeekerData = array_merge($serviceSeekerData,array('mobilenumber' => $cleanData));                  
            }

            if(empty($input['nationality'])){
                $error = array_merge($error,array('nationality' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['nationality']);                
                require_once '../app/models/countries.php';
                if(!in_array($cleanData,Countries::$countries))
                {   
                    $error = array_merge($error,array('nationality' => 'This field is required.'));                    
                }
                else{
                    $serviceSeekerData = array_merge($serviceSeekerData,array('nationality' => $cleanData));
                }
                                
            }

            if(empty($input['gender'])){
                $error = array_merge($error,array('gender' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['gender']);
                if($cleanData!=='M' && $cleanData!=='F'){
                    $error = array_merge($error,array('gender' => 'This field is required.'));
                }
                else{
                    $serviceSeekerData = array_merge($serviceSeekerData,array('gender' => $cleanData));
                }
                
            }

            if(empty($files['profilephoto'])){
                $error = array_merge($error,array('profilephoto' => 'This field is required.'));                
            }
            else{
                    $extension = explode('.',$files['profilephoto']['name']);
                    $file_ext=strtolower(end($extension));
                    if(!in_array($file_ext,array('jpeg','gif','png','jpg',))){
                        $error = array_merge($error,array('profilephoto' => 'JPG, JPEG, PNG and GIF are only supported.'));
                    }
                    elseif($files['profilephoto']['size']>2097152){
                        $error = array_merge($error,array('profilephoto' => 'File should not be more than 2MB.'));
                    }
                    elseif(empty($error)){
                        $cleanData = 'app/upload/profile/serviceseeker/'.time().$files['profilephoto']['name'];
                        move_uploaded_file($files['profilephoto']['tmp_name'],"../".$cleanData);
                        $serviceSeekerData = array_merge($serviceSeekerData,array('profilephoto' => $cleanData));
                    }
            }

            if(empty($input['country'])){
                $error = array_merge($error,array('country' => 'This field is required.'));
            }
            else{
                
                $cleanData = $this->cleanInput($input['country']);                
                require_once '../app/models/countries.php';

                if(!in_array($cleanData,Countries::$countries))
                {   
                    $error = array_merge($error,array('country' => 'This field is required.'));
                }
                else{
                    $serviceSeekerData = array_merge($serviceSeekerData,array('country' => $cleanData));
                }
            }

            if(empty($input['city'])){
                $error = array_merge($error,array('city' => 'This field is required.'));
            }
            else{
                $serviceSeekerData = array_merge($serviceSeekerData,array('city' => $this->cleanInput($input['city'])));
            }

            if(empty($input['address'])){
                $error = array_merge($error,array('address' => 'This field is required.'));
            }
            else{
                $serviceSeekerData = array_merge($serviceSeekerData,array('address' => $this->cleanInput($input['address'])));
            }

            if(empty($input['bankname'])){
                $error = array_merge($error,array('bankname' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['bankname']); 
                if($cleanData !=='CBE' && $cleanData !=='Awash' && $cleanData !=='Dashen' && $cleanData !=='Abyssinia' && $cleanData !=='Nib' && $cleanData !=='Abay' && $cleanData !=='United'){
                    $error = array_merge($error,array('bankname' => 'This field is required.'));
                }
                else{
                    $serviceSeekerData = array_merge($serviceSeekerData,array('bankname' => $cleanData));
                }
                
            }

            if(empty($input['accountnumber'])){
                $error = array_merge($error,array('accountnumber' => 'This field is required.'));
            }
            else{
                $serviceSeekerData = array_merge($serviceSeekerData,array('accountnumber' => $this->cleanInput($input['accountnumber'])));
            }

            if(empty($error)){
                return array('valid'=>1 ,'data'=>$serviceSeekerData);
            }
            else{
                return array('valid'=>0,'data'=>$serviceSeekerData,'error'=>$error);
            }
        }

        public function createAccount($data, $files){
            $response = $this->validateSignup($data, $files);
            if($response['valid']==true){
                $this->setUsername($response['data']['username']);
                $this->setPassword($response['data']['password']);
                $this->setEmail($response['data']['email']);
                $this->setFirstName($response['data']['firstname']);
                $this->setLastName($response['data']['lastname']);
                $this->setGender($response['data']['gender']);
                $this->setMobileNumber($response['data']['mobilenumber']);
                $this->setNationality($response['data']['nationality']);
                $this->setCountry($response['data']['country']);
                $this->setCity($response['data']['city']);
                $this->setAddress($response['data']['address']);
                $this->setBankName($response['data']['bankname']);
                $this->setAccountNumber($response['data']['accountnumber']);
                $this->setProfilePhoto($response['data']['profilephoto']);
                $this->setStatus('unverified');
                $this->setWalletBalance(0.00);

                //The variables below are arguments to be passed to insert data to their respective table 
                $userTb = array(
                    'username' => "'".$this->getUsername()."'",
                    'password' => "'".$this->getPassword()."'",
                    'email' => "'".$this->getEmail()."'",
                    'firstname' => "'".$this->getFirstName()."'",
                    'lastname' => "'".$this->getLastName()."'",
                    'gender' => "'".$this->getGender()."'",
                    'mobile_number' => "'".$this->getMobileNumber()."'",
                    'nationality' => "'".$this->getNationality()."'",
                    'country' => "'".$this->getCountry()."'",
                    'city' => "'".$this->getCity()."'",
                    'address' => "'".$this->getAddress()."'",
                    'join_date' => "UTC_TIMESTAMP",
                    'last_login' => "UTC_TIMESTAMP",
                    'user_type' => "'serviceseeker'",
                    'status' => "'".$this->getStatus()."'"
                );

                $serviceSeekerTb = array(
                    'username' => "'".$this->getUsername()."'",
                    'bank_name' => "'".$this->getBankName()."'",
                    'account_number' => "'".$this->getAccountNumber()."'",
                    'wallet_balance' => $this->getWalletBalance(),
                    'profile_photo' => "'".$this->getProfilePhoto()."'"
                );

                                
                $this->insert('user',$userTb);
                $this->insert('service_seeker',$serviceSeekerTb);

                return array('valid'=>1,'username'=>$this->getUsername,'usertype'=>'serviceseeker');
            } 
            else{
                return $response;
            }      
        }
    }
?>