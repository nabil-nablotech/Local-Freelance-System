<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

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

        public function retrieveUserDetails($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,status,education,experience,bank_name,account_number,wallet_balance,profile_photo,summary FROM user INNER JOIN service_provider ON user.username = service_provider.username where user.username='".$username."'");
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
                        'education'=>$row['education'],
                        'experience'=>$row['experience'],
                        'bankname'=>$row['bank_name'],
                        'accountnumber'=>$row['account_number'],
                        'walletbalance'=>$row['wallet_balance'],
                        'summary'=>$row['summary'],
                        'profilephoto'=>$row['profile_photo']                           
                    );

                    $data = array_merge($data,array('skill'=>$this->retrieveSkills($username)));
                    $data = array_merge($data,array('language'=>$this->retrieveLanguages($username)));
                    $data = array_merge($data,array('portfolio'=>$this->retrievePortfolios($username)));
                    return $data;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveSkills($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("select skill_id,skill_name from skill WHERE skill_id in (SELECT provider_skill.skill_id FROM service_provider INNER JOIN provider_skill ON service_provider.username = provider_skill.username where service_provider.username='".$username."')");
                if($skills = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $skills;
                }
                else{
                    return false;
                }
            }
        }
        
        
        public function retrieveLanguages($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("select language_id,language_name from language WHERE language_id in (SELECT provider_language.language_id FROM service_provider INNER JOIN provider_language ON service_provider.username = provider_language.username where service_provider.username='".$username."')");
                if($languages = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $languages;
                }
                else{
                    return false;
                }
            }
        }

        public function retrievePortfolios($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("select portfolio_id,portfolio_url from portfolio WHERE username ='".$username."'");
                if($portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $portfolios;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveServiceProviderDetails($username){
            require_once('../app/Core/Database.php');
            require_once('../app/models/Rate.php');
            $db = new Database();
            $rate = new Rate();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,education,experience,bank_name,account_number,wallet_balance,summary,profile_photo FROM user INNER JOIN service_provider ON user.username = service_provider.username and user.username = '".$username."'");
                if($provider = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $provider = array_merge($provider, array('skill'=>$this->retrieveSkills($provider['username']))) ; 
                    $provider = array_merge($provider, array('language'=>$this->retrieveLanguages($provider['username']))) ; 
                    $provider = array_merge($provider, array('portfolio'=>$this->retrievePortfolios($provider['username']))) ; 
                    $retrievedRate = $rate->retrieveRate($provider['username']);
                    $provider = array_merge($provider, array('ratings'=>$retrievedRate)) ;             
                    return $provider;
                }
                else{
                    return false;
                }
            }
        }

        public function generateFilterQuery($input){
            if(isset($input['search_btn'])){
                if(empty($input['serviceprovider'])){
                    return "SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,education,experience,bank_name,account_number,wallet_balance,summary,profile_photo FROM user INNER JOIN service_provider ON user.username = service_provider.username";
                }
                else{
                    $cleanData = $this->cleanInput($input['serviceprovider']);
                    return "SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,education,experience,bank_name,account_number,wallet_balance,summary,profile_photo FROM user INNER JOIN service_provider ON user.username = service_provider.username WHERE user.username = '".$cleanData."'";
                }
            }

            if(isset($input['filter_btn'])){
                $category = $experience = $rate = [];


                //category.......
                if(!empty($input['category'])){
                    $categories = $input['category'];
                    foreach($categories as $cat){
                        $cat = $this->cleanInput($input['category']);
                        if($cat==1){
                            $category = array_push($category,"Graphics and Design");
                        }
                        elseif(($cat==2)){
                            $category = array_push($category,"Writing and Translation");
                        }
                        elseif(($cat==3)){
                            $category = array_push($category,"Video and Animation");
                        }
                        elseif(($cat==4)){
                            $category = array_push($category,"Programming and Tech");
                        }
                    }
                }

                //experience.......
                if(!empty($input['experience'])){
                    $experiences = $input['experience'];
                    foreach($experiences as $exp){
                        $exp = $this->cleanInput($input['experience']);
                        if($exp==1){
                            $experience = array_push($experience,"Advanced");
                        }
                        elseif(($exp==2)){
                            $experience = array_push($experience,"Medium");
                        }
                        elseif(($exp==3)){
                            $experience = array_push($experience,"Beginner");
                        }
                    }
                }

                //rate.......
                if(!empty($input['rate'])){
                    $rates = $input['rate'];
                    foreach($rates as $ra){
                        $ra = $this->cleanInput($input['rate']);
                        if($ra==1){
                            $rate = array_push($rate,1);
                        }
                        elseif(($ra==2)){
                            $rate = array_push($rate,2);
                        }
                        elseif(($ra==3)){
                            $rate = array_push($rate,3);
                        }
                        elseif(($ra==4)){
                            $rate = array_push($rate,4);
                        }
                        elseif(($ra==5)){
                            $rate = array_push($rate,5);
                        }
                    }
                }

                if($category ==[] && $experience ==[] && $rate ==[]){
                    return "SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,education,experience,bank_name,account_number,wallet_balance,summary,profile_photo FROM user INNER JOIN service_provider ON user.username = service_provider.username ";
                }

                $categoryCondition = "";
                $categoryOptions = "";

                if($category!=[]){
                    
                    for($i=0;$i<count($category);$i++){
                        if(count($category)==1){
                            $categoryOptions = "skill_category = '".$category[$i]."'";
                            break; 
                        }

                        if($i==0){
                            $categoryOptions = "skill_category = '".$category[$i]."'";
                        }
                        else{
                            $categoryOptions .= " OR skill_category = '".$category[$i]."'";
                        }
                    }

                    if($categoryOptions != ""){
                        $categoryCondition = <<<EOT
                                                select DISTINCT service_provider.username from service_provider INNER JOIN provider_skill 
                                                ON service_provider.username =  provider_skill.username
                                                WHERE skill_id in (select skill_id from skill where ({$categoryOptions}))
                                            EOT;
                    }

                }

                $categoryCondition = "";
                $categoryOptions = "";

                if($category!=[]){
                    
                    for($i=0;$i<count($category);$i++){
                        if(count($category)==1){
                            $categoryOptions = "skill_category = '".$category[$i]."'";
                            break; 
                        }

                        if($i==0){
                            $categoryOptions = "skill_category = '".$category[$i]."'";
                        }
                        else{
                            $categoryOptions .= " OR skill_category = '".$category[$i]."'";
                        }
                    }

                    if($categoryOptions != ""){
                        $categoryCondition = <<<EOT
                                                select DISTINCT service_provider.username from service_provider INNER JOIN provider_skill 
                                                ON service_provider.username =  provider_skill.username
                                                WHERE skill_id in (select skill_id from skill where ({$categoryOptions}))
                                            EOT;
                    }

                }

                
                $experienceOptions = "";
                if($experience!=[]){
                    
                    for($i=0;$i<count($experience);$i++){
                        if(count($experience)==1){
                            $experienceOptions = "service_provider.experience = '".$experience[$i]."'";
                            break; 
                        }

                        if($i==0){
                            $experienceOptions = "service_provider.experience = '".$experience[$i]."'";
                        }
                        else{
                            $experienceOptions .= " OR service_provider.experience = '".$experience[$i]."'";
                        }
                    }

                }


                $rateCondition = "";

                if($rate!=[]){
                    
                    if(count($rate)==1){
                        $rateCondition = <<<EOT
                                                select tab.ratee from (select ratee,AVG(score) AS computedrate
                                                from rate GROUP BY ratee) as tab
                                                WHERE tab.computedrate>={$rate[0]}.00 and tab.computedrate<={$rate[0]}.99
                                            EOT;
                    }
                    else{
                        $min = min($rate);
                        $max = max($rate);
                        $rateCondition = <<<EOT
                                                select tab.ratee from (select ratee,AVG(score) AS computedrate
                                                from rate GROUP BY ratee) as tab
                                                WHERE tab.computedrate>={$min}.00 and tab.computedrate<={$max}.99
                                            EOT;
                    }

                    

                }

                
            }
        }

        public function retrieveServiceProviders($filter=""){
            require_once('../app/Core/Database.php');
            require_once('../app/models/Rate.php');
            $sql = "";
            if($filter==""){
                $sql = "SELECT user.username,email,firstname,lastname,gender,mobile_number,nationality,country,city,address,join_date,last_login,status,education,experience,bank_name,account_number,wallet_balance,summary,profile_photo FROM user INNER JOIN service_provider ON user.username = service_provider.username";
            }
            else{
                $sql =  $this->generateFilterQuery($filter);
            }
            $db = new Database();
            $rate = new Rate();
            $conn = $db->setConnection();
            if($conn !== null){
                
                
                $stmt = $conn->query($sql);
                if($providers = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    foreach($providers as $provider){
                        $key = array_search($provider, $providers);
                        $providers[$key] = array_merge($providers[$key], array('skill'=>$this->retrieveSkills($provider['username']))) ; 
                        $providers[$key] = array_merge($providers[$key], array('language'=>$this->retrieveLanguages($provider['username']))) ; 
                        $providers[$key] = array_merge($providers[$key], array('portfolio'=>$this->retrievePortfolios($provider['username']))) ; 
                        $computedRate = $rate->computeRate($provider['username']);
                        $providers[$key] = array_merge($providers[$key], array('rate'=>array('score'=>(empty($computedRate['computedrate']))? 0 : $computedRate['computedrate'],'totalreviews'=>$computedRate['totalreviews']))) ; 
                    }
                    return $providers;
                }
                else{
                    return false;
                }
            }
        }
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

                $verifcationId = uniqid();

                $verificationTb = array(
                    'verification_id' => "'".$verifcationId."'",
                    'username' => "'".$this->getUsername()."'",                    
                );
                $this->insert('verification',$verificationTb);

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
                    $mail->addAddress($this->getEmail(),$this->getFirstName()." ".$this->getLastName());
                    
                    $fullname = $this->getFirstName()." ".$this->getLastName();
                    //content
                    $mail->isHTML(true); // set email format to html
                    $mail->Subject = "Email address verification";
                    $msg =<<<EOT
                        <html>
                            <body>
                                <div style="text-align: center;">
                                    <img src="http://localhost/seralance/public/assets/images/seralance-logo.png" alt="Seralance">
                                </div>
                                <h1 style="text-align: center;">THANKS FOR SIGNING UP</h1>
                                <h1 style="text-align: center;">{$fullname}</h1>
                                <p style="text-align: center;">
                                    Please verify your email address to use the system.
                                </p>
                                <p style="text-align: center;">
                                    Thank you!
                                </p>
                                <p style="text-align: center;">
                                    <a href="http://localhost/seralance/public/main/verify/{$verifcationId}" style="text-decoration: none; border:0px solid black; color: white; background-color: rgba(25, 25, 214, 0.801); font-size: 16px; height: 40px; padding: 10px;">
                        
                                            Verify Email Now
                        
                                    </a>
                                </p>
                            </body>
                        </html>
                    EOT;

                    $mail->Body =$msg;

                    $mail->send();
                }
                catch(Exception $e){
                    echo "Could not send verification email";
                }
                return array('valid'=>1,'username'=>$this->getUsername(),'usertype'=>'serviceprovider');
            } 
            else{
                return $response;
            }      
        }

        public function validateUpdateProfile($input,$files){
            
            // $serviceProviderData holds the data to be inserted to Service provider table
            $serviceProviderData = array();
            $languageData = array();
            $skillData = array();
            $portfolioData = array();

            if(!empty($input['firstname'])){
                $serviceProviderData = array_merge($serviceProviderData,array('firstname' => $this->cleanInput($input['firstname'])));
            }

            if(!empty($input['lastname'])){
                $serviceProviderData = array_merge($serviceProviderData,array('lastname' => $this->cleanInput($input['lastname'])));
            }

            
            if(!empty($input['nationality'])){
                $cleanData = $this->cleanInput($input['nationality']);                
                require_once '../app/models/countries.php';
                if(in_array($cleanData,Countries::$countries)){
                    $serviceProviderData = array_merge($serviceProviderData,array('nationality' => $cleanData));
                }                                
            }

            if(!empty($files['profilephoto']['name'])){
                    $extension = explode('.',$files['profilephoto']['name']);
                    $file_ext=strtolower(end($extension));
                    if(!in_array($file_ext,array('jpeg','gif','png','jpg'))){
                        echo "<script>alert('JPG, JPEG, PNG and GIF are only supported.');</script>";
                    }
                    elseif($files['profilephoto']['size']>2097152){
                        echo "<script>alert('File should not be more than 2MB.');</script>";
                    }
                    else{
                        $cleanData = 'app/upload/profile/serviceprovider/'.time().$files['profilephoto']['name'];
                        move_uploaded_file($files['profilephoto']['tmp_name'],"../".$cleanData);
                        $serviceProviderData = array_merge($serviceProviderData,array('profilephoto' => $cleanData));
                    }
            }

            if(!empty($input['country'])){                
                $cleanData = $this->cleanInput($input['country']);                
                require_once '../app/models/countries.php';
                if(in_array($cleanData,Countries::$countries)){
                    $serviceProviderData = array_merge($serviceProviderData,array('country' => $cleanData));
                }
            }

            if(!empty($input['city'])){
                $serviceProviderData = array_merge($serviceProviderData,array('city' => $this->cleanInput($input['city'])));
            }

            if(!empty($input['address'])){
                $serviceProviderData = array_merge($serviceProviderData,array('address' => $this->cleanInput($input['address'])));
            }

            if(!empty($input['education'])){
                $cleanData = $this->cleanInput($input['education']);
                
                if($cleanData ==='Primary school' || $cleanData ==='High school' || $cleanData ==='Diploma' || $cleanData ==='Bachelor degree' || $cleanData ==='Masters degree' || $cleanData ==='Doctrate degree'){
                    $serviceProviderData = array_merge($serviceProviderData,array('education' => $cleanData));
                }              
            }

            if(!empty($input['language'])){
                
                $language_ids = [];
                foreach($this->retrieveAllLanguages() as $language){
                    array_push($language_ids,$language['language_id']);
                }
                for($i = 0; $i < count($input['language']);$i++){
                    $cleanData = $this->cleanInput($input['language'][$i]);
                    if(in_array($cleanData,$language_ids) == true){
                        $languageData = array_merge($languageData,array($cleanData)); 
                    }                    
                    
                }
                if(!empty($languageData)){
                    $serviceProviderData = array_merge($serviceProviderData,array('language' => $languageData));  
                }
            }

            if(!empty($input['skill'])){
                $skill_ids = [];
                foreach($this->retrieveAllSkills() as $skill){
                    array_push($skill_ids,$skill['skill_id']);
                }
                for($i = 0; $i < count($input['skill']);$i++){
                    $cleanData = $this->cleanInput($input['skill'][$i]);
                    if(in_array($cleanData,$skill_ids) == true){
                        $skillData = array_merge($skillData,array($cleanData)); 
                    }                                                  
                }
                if(!empty($skillData)){
                    $serviceProviderData = array_merge($serviceProviderData,array('skill' => $skillData));  
                }                
            }

            if(!empty($input['experience'])){
                $cleanData = $this->cleanInput($input['experience']);
                if($cleanData ==='Beginner' || $cleanData ==='Medium' || $cleanData ==='Advanced'){
                    $serviceProviderData = array_merge($serviceProviderData,array('experience' => $cleanData));
                }               
            }

            if(!empty($input['portfolio'])){              
                $portfolios = explode(",",$input['portfolio']);                
                for($i = 0; $i < count($portfolios);$i++){
                    $cleanData = $this->cleanInput($portfolios[$i]);                
                    if(filter_var($cleanData, FILTER_VALIDATE_URL)){
                        $portfolioData = array_merge($portfolioData,array($cleanData)); 
                    }
                                     
                }
                if(!empty($portfolioData)){
                    $serviceProviderData = array_merge($serviceProviderData,array('portfolio' => $portfolioData));  
                }          
            }


            if(!empty($input['bankname'])){
                $cleanData = $this->cleanInput($input['bankname']); 
                if($cleanData ==='CBE' || $cleanData ==='Awash' || $cleanData ==='Dashen' || $cleanData ==='Abyssinia' || $cleanData ==='Nib' || $cleanData ==='Abay' || $cleanData ==='United'){
                    $serviceProviderData = array_merge($serviceProviderData,array('bankname' => $cleanData));
                }                
            }

            if(!empty($input['accountnumber'])){
                $serviceProviderData = array_merge($serviceProviderData,array('accountnumber' => $this->cleanInput($input['accountnumber'])));
            }

            if(!empty($input['summary'])){
                $serviceProviderData = array_merge($serviceProviderData,array('summary' => $this->cleanInput($input['summary'])));
            }

            return $serviceProviderData;
        }


        public function updateProfile($data, $files){
            $response = $this->validateUpdateProfile($data, $files);
            
            $this->setUsername($_SESSION['username']);
            if(!empty($response['firstname'])){
                $this->setFirstName($response['firstname']);
            }
            if(!empty($response['lastname'])){
                $this->setLastName($response['lastname']);
            }
            if(!empty($response['nationality'])){
                $this->setNationality($response['nationality']);
            }
            if(!empty($response['country'])){
                $this->setCountry($response['country']);
            }
            if(!empty($response['city'])){
                $this->setCity($response['city']);
            }
            if(!empty($response['address'])){
                $this->setAddress($response['address']);
            }
            if(!empty($response['education'])){
                $this->setEducation($response['education']);
            }
            if(!empty($response['language'])){
                $this->setLanguage($response['language']);
            }
            if(!empty($response['skill'])){
                $this->setSkill($response['skill']);
            }
            if(!empty($response['experience'])){
                $this->setExperience($response['experience']);
            }
            if(!empty($response['portfolio'])){
                $this->setPortfolio($response['portfolio']);
            }
            if(!empty($response['bankname'])){
                $this->setBankName($response['bankname']);
            }
            if(!empty($response['accountnumber'])){
                $this->setAccountNumber($response['accountnumber']);
            }
            if(!empty($response['profilephoto'])){
                $this->setProfilePhoto($response['profilephoto']);
            }
            if(!empty($response['summary'])){
                $this->setSummary($response['summary']);
            }
        
            //The variables below are arguments to be passed to insert data to their respective table
            
            $userTb = array();
            if(!empty($this->getFirstName())){
                $userTb = array_merge($userTb,array('firstname' => "'".$this->getFirstName()."'"));
            }
            if(!empty($this->getLastName())){
                $userTb = array_merge($userTb,array('lastname' => "'".$this->getLastName()."'"));
            }
            if(!empty($this->getNationality())){
                $userTb = array_merge($userTb,array('nationality' => "'".$this->getNationality()."'"));
            }
            if(!empty($this->getCountry())){
                $userTb = array_merge($userTb,array('country' => "'".$this->getCountry()."'"));
            }
            if(!empty($this->getCity())){
                $userTb = array_merge($userTb,array('city' => "'".$this->getCity()."'"));
            }
            if(!empty($this->getAddress())){
                $userTb = array_merge($userTb,array('address' => "'".$this->getAddress()."'"));
            }


            $serviceProviderTb = array();
            if(!empty($this->getBankName())){
                $serviceProviderTb = array_merge($serviceProviderTb,array('bank_name' => "'".$this->getBankName()."'"));
            }
            if(!empty($this->getEducation())){
                $serviceProviderTb = array_merge($serviceProviderTb,array('education' => "'".$this->getEducation()."'"));
            }
            if(!empty($this->getExperience())){
                $serviceProviderTb = array_merge($serviceProviderTb,array('experience' => "'".$this->getExperience()."'"));
            }
            if(!empty($this->getAccountNumber())){
                $serviceProviderTb = array_merge($serviceProviderTb,array('account_number' => "'".$this->getAccountNumber()."'"));
            }
            if(!empty($this->getProfilePhoto())){
                $serviceProviderTb = array_merge($serviceProviderTb,array('profile_photo' => "'".$this->getProfilePhoto()."'"));
            }
            if(!empty($this->getSummary())){
                $serviceProviderTb = array_merge($serviceProviderTb,array('summary' => "'".$this->getSummary()."'"));
            }


            $providerSkillTb = [];
            if(!empty($this->getSkill())){
                foreach($this->getSkill() as $skill){

                    array_push($providerSkillTb,array('username' => "'".$this->getUsername()."'",'skill_id' => $skill));
                
                }
            }

            $providerLanguageTb = [];
            if(!empty($this->getLanguage())){
                foreach($this->getLanguage() as $language){

                    array_push($providerLanguageTb,array('username' => "'".$this->getUsername()."'",'language_id' => $language));
                
                }
            }

            $portfolioTb = [];
            if(!empty($this->getPortfolio())){
                foreach($this->getPortfolio() as $portfolio){

                    array_push($portfolioTb,array('username' => "'".$this->getUsername()."'",'portfolio_url' => "'". $portfolio."'"));
                
                }
            }

            if(!empty($providerSkillTb)){
                $this->remove('provider_skill',"WHERE username='".$this->getUsername()."'");
                foreach($providerSkillTb as $skill){
                    $this->insert('provider_skill',$skill);
                }
            }

            if(!empty($providerLanguageTb)){
                $this->remove('provider_language',"WHERE username='".$this->getUsername()."'");
                foreach($providerLanguageTb as $language){
                    $this->insert('provider_language',$language);
                }
            }

            if(!empty($portfolioTb)){
                $this->remove('portfolio',"WHERE username='".$this->getUsername()."'");
                foreach($portfolioTb as $portfolio){
                    $this->insert('portfolio',$portfolio);
                }
            }

            $this->update('user',$userTb,"WHERE username ='". $this->getUsername() . "'");
            $this->update('service_provider',$serviceProviderTb,"WHERE username ='". $this->getUsername() . "'"); 
              
        }

        public function updateWallet($username, $amount, $action){            
        
            //The variables below are arguments to be passed to insert data to their respective table
            $serviceProviderTb = array();
            if($action==='increase'){
                $serviceProviderTb = array('wallet_balance'=>"wallet_balance + ".$amount);
                
            }
            elseif($action==='decrease'){
                $serviceProviderTb = array('wallet_balance'=>"wallet_balance - ".$amount);
                
            }
            
            $this->update('service_provider',$serviceProviderTb,"WHERE username ='". $username . "'");
              
        }
                
    }
?>