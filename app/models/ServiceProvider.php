<?php

    class ServiceProvider extends User{
        
        private $education;
        private $skill;
        private $language;
        private $experience;
        private $portfolio;
        private $bankName;
        private $accountNumber;
        private $walletBalance;
        private $summary;
        private $profilePhoto;


        // --------Getter and Setters of the attributes-----------
        public function getEducation(){
            return $this->education; 
        }

        public function setEducation($education){
            $this->education = $education;
        }

        public function getSkill(){
            return $this->skill; 
        }

        public function setSkill($skill){
            $this->skill = $skill;
        }

        public function getLanguage(){
            return $this->language; 
        }

        public function setLanguage($language){
            $this->language = $language;
        }

        public function getExperience(){
            return $this->experience; 
        }

        public function setExperience($experience){
            $this->experience = $experience;
        }

        public function getPortfolio(){
            return $this->portfolio; 
        }

        public function setPortfolio($portfolio){
            $this->portfolio = $portfolio;
        }

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

        public function getSummary(){
            return $this->summary; 
        }

        public function setSummary($summary){
            $this->summary = $summary;
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

        //-------End of getters and setters---------

        public function retrieveAllLanguages(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT * FROM language");
                if($languages = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $languages;
                }
                else{
                    return false;
                }
            }
        }

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

        public function validateSignup($input,$files){
            
            // $serviceProviderData holds the data to be inserted to Service provider table
            $serviceProviderData = array();
            $languageData = array();
            $skillData = array();
            $portfolioData = array();
            $error=array();


            if(empty($input['firstname'])){
                $error = array_merge($error,array('firstname' => 'This field is required.'));
            }
            else{
                $serviceProviderData = array_merge($serviceProviderData,array('firstname' => $this->cleanInput($input['firstname'])));
            }

            if(empty($input['lastname'])){
                $error = array_merge($error,array('lastname' => 'This field is required.'));
            }
            else{
                $serviceProviderData = array_merge($serviceProviderData,array('lastname' => $this->cleanInput($input['lastname'])));
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

                $serviceProviderData = array_merge($serviceProviderData,array('email' => $cleanData));              
            }

            if(empty($input['username'])){
                $error = array_merge($error,array('username' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['username']);

                if ($this->checkUserExists($cleanData)) {
                    $error = array_merge($error,array('username' => 'Username already taken.'));                                       
                  }
                  
                $serviceProviderData = array_merge($serviceProviderData,array('username' => $cleanData)); 
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
                    $serviceProviderData = array_merge($serviceProviderData,array('password' => password_hash($cleanData,PASSWORD_DEFAULT)));
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
                
                $serviceProviderData = array_merge($serviceProviderData,array('mobilenumber' => $cleanData));                  
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
                    $serviceProviderData = array_merge($serviceProviderData,array('nationality' => $cleanData));
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
                    $serviceProviderData = array_merge($serviceProviderData,array('gender' => $cleanData));
                }
                
            }

            if(empty($files['profilephoto']['name'])){
                $error = array_merge($error,array('profilephoto' => 'This field is required.'));                
            }
            else{
                    $extension = explode('.',$files['profilephoto']['name']);
                    $file_ext=strtolower(end($extension));
                    if(!in_array($file_ext,array('jpeg','gif','png','jpg'))){
                        $error = array_merge($error,array('profilephoto' => 'JPG, JPEG, PNG and GIF are only supported.'));
                    }
                    elseif($files['profilephoto']['size']>2097152){
                        $error = array_merge($error,array('profilephoto' => 'File should not be more than 2MB.'));
                    }
                    elseif(empty($error)){
                        $cleanData = 'app/upload/profile/serviceprovider/'.time().$files['profilephoto']['name'];
                        move_uploaded_file($files['profilephoto']['tmp_name'],"../".$cleanData);
                        $serviceProviderData = array_merge($serviceProviderData,array('profilephoto' => $cleanData));
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
                    $serviceProviderData = array_merge($serviceProviderData,array('country' => $cleanData));
                }
            }

            if(empty($input['city'])){
                $error = array_merge($error,array('city' => 'This field is required.'));
            }
            else{
                $serviceProviderData = array_merge($serviceProviderData,array('city' => $this->cleanInput($input['city'])));
            }

            if(empty($input['address'])){
                $error = array_merge($error,array('address' => 'This field is required.'));
            }
            else{
                $serviceProviderData = array_merge($serviceProviderData,array('address' => $this->cleanInput($input['address'])));
            }

            if(empty($input['education'])){
                $error = array_merge($error,array('education' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['education']);

                if($cleanData !=='Primary school' && $cleanData !=='High school' && $cleanData !=='Diploma' && $cleanData !=='Bachelor degree' && $cleanData !=='Masters degree' && $cleanData !=='Doctrate degree'){
                    $error = array_merge($error,array('education' => 'This field is required.'));
                }
                else{
                    $serviceProviderData = array_merge($serviceProviderData,array('education' => $cleanData));
                }                
            }

            if(empty($input['language'])){
                $error = array_merge($error,array('language' => 'This field is required.'));
            }
            else{
                $language_ids = [];
                foreach($this->retrieveAllLanguages() as $language){
                    array_push($language_ids,$language['language_id']);
                }
                for($i = 0; $i < count($input['language']);$i++){
                    $cleanData = $this->cleanInput($input['language'][$i]);
                    if(in_array($cleanData,$language_ids) == false){
                        $error = array_merge($error,array('language' => 'Invalid Input.'));
                        break;
                    }                    
                    $languageData = array_merge($languageData,array($cleanData)); ;
                }
                if(empty($error)){
                    $serviceProviderData = array_merge($serviceProviderData,array('language' => $languageData));  
                }
            }

            if(empty($input['skill'])){
                $error = array_merge($error,array('skill' => 'This field is required.'));
            }
            else{
                $skill_ids = [];
                foreach($this->retrieveAllSkills() as $skill){
                    array_push($skill_ids,$skill['skill_id']);
                }
                for($i = 0; $i < count($input['skill']);$i++){
                    $cleanData = $this->cleanInput($input['skill'][$i]);
                    if(in_array($cleanData,$skill_ids) == false){
                        echo '<script>window.alert(breaking)</script>';
                        $error = array_merge($error,array('skill' => 'Invalid Input.'));
                        break;
                    }
                    $skillData = array_merge($skillData,array($cleanData));                               
                }
                if(empty($error)){
                    $serviceProviderData = array_merge($serviceProviderData,array('skill' => $skillData));  
                }                
            }

            if(empty($input['experience'])){
                $error = array_merge($error,array('experience' => 'This field is required.'));
            }
            else{
                $cleanData = $this->cleanInput($input['experience']);
                if($cleanData !=='Beginner' && $cleanData !=='Medium' && $cleanData !=='Advanced'){
                    $error = array_merge($error,array('experience' => 'This field is required.'));
                }
                else{
                    $serviceProviderData = array_merge($serviceProviderData,array('experience' => $cleanData));
                }                
            }

            if(empty($input['portfolio'])){
                $error = array_merge($error,array('portfolio' => 'This field is required.'));
            }
            else{               
                $portfolios = explode(",",$input['portfolio']);                
                for($i = 0; $i < count($portfolios);$i++){
                    $cleanData = $this->cleanInput($portfolios[$i]);                
                    if(!filter_var($cleanData, FILTER_VALIDATE_URL)){
                        $error = array_merge($error,array('portfolio' => 'Invalid url inserted.'));
                        break;
                    }
                    $portfolioData = array_merge($portfolioData,array($cleanData));                  
                }
                if(empty($error)){
                    $serviceProviderData = array_merge($serviceProviderData,array('portfolio' => $portfolioData));  
                }          
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
                    $serviceProviderData = array_merge($serviceProviderData,array('bankname' => $cleanData));
                }
                
            }

            if(empty($input['accountnumber'])){
                $error = array_merge($error,array('accountnumber' => 'This field is required.'));
            }
            else{
                $serviceProviderData = array_merge($serviceProviderData,array('accountnumber' => $this->cleanInput($input['accountnumber'])));
            }

            if(empty($input['summary'])){
                $error = array_merge($error,array('summary' => 'This field is required.'));
            }
            else{
                $serviceProviderData = array_merge($serviceProviderData,array('summary' => $this->cleanInput($input['summary'])));
            }

            if(empty($error)){
                return array('valid'=>1 ,'data'=>$serviceProviderData);
            }
            else{
                return array('valid'=>0,'data'=>$serviceProviderData,'error'=>$error);
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
                $this->setEducation($response['data']['education']);
                $this->setSkill($response['data']['skill']);
                $this->setLanguage($response['data']['language']);
                $this->setExperience($response['data']['experience']);
                $this->setPortfolio($response['data']['portfolio']);
                $this->setBankName($response['data']['bankname']);
                $this->setAccountNumber($response['data']['accountnumber']);
                $this->setSummary($response['data']['summary']);
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
                    'user_type' => "'serviceprovider'",
                    'status' => "'".$this->getStatus()."'"
                );

                $serviceProviderTb = array(
                    'username' => "'".$this->getUsername()."'",
                    'education' => "'".$this->getEducation()."'",
                    'experience' => "'".$this->getExperience()."'",
                    'bank_name' => "'".$this->getBankName()."'",
                    'account_number' => "'".$this->getAccountNumber()."'",
                    'wallet_balance' => $this->getWalletBalance(),
                    'summary' => "'".$this->getSummary()."'",
                    'profile_photo' => "'".$this->getProfilePhoto()."'"
                );

                $providerSkillTb = [];
                foreach($this->getSkill() as $skill){

                    array_push($providerSkillTb,array('username' => "'".$this->getUsername()."'",'skill_id' => $skill));
                
                }

                $providerLanguageTb = [];
                foreach($this->getLanguage() as $language){

                    array_push($providerLanguageTb,array('username' => "'".$this->getUsername()."'",'language_id' => $language));
                
                }

                $portfolioTb = [];
                foreach($this->getPortfolio() as $portfolio){

                    array_push($portfolioTb,array('username' => "'".$this->getUsername()."'",'portfolio_url' => "'". $portfolio."'"));
                
                }

                
                $this->insert('user',$userTb);
                $this->insert('service_provider',$serviceProviderTb);

                foreach($providerSkillTb as $skill){
                    $this->insert('provider_skill',$skill);
                }

                foreach($providerLanguageTb as $language){
                    $this->insert('provider_language',$language);
                }

                foreach($portfolioTb as $portfolio){
                    $this->insert('portfolio',$portfolio);
                }
                return array('valid'=>1,'username'=>$this->getUsername,'usertype'=>'serviceprovider');
            } 
            else{
                return $response;
            }      
        }
                
    }
?>