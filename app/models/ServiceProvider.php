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





        // -------Form handlers methods ----------//

        public function validateSignup($input){
            
            // $userData holds the data to be inserted to user table
            // $serviceProviderData holds the data to be inserted to Service provider table
            $userData = array();
            $serviceProviderData = array();
            $error=array();


            if(empty($input['firstname'])){
                $error = array_merge($error,array('firstname' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['firstname'])."'";
                $userData = array_merge($userData,array('firstname' => $data));
            }

            if(empty($input['lastname'])){
                $error = array_merge($error,array('lastname' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['lastname'])."'";
                $userData = array_merge($userData,array('lastname' => $data));
            }

            if(empty($input['email'])){
                $error = array_merge($error,array('email' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['email'])."'";
                $userData = array_merge($userData,array('email' => $data));
            }

            if(empty($input['username'])){
                $error = array_merge($error,array('username' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['username'])."'";
                $userData = array_merge($userData,array('username' => $data));
                $serviceProviderData = array_merge($serviceProviderData,array('username' => $data));
            }

            if(empty($input['password'])){
                $error = array_merge($error,array('password' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['password'])."'";
                $userData = array_merge($userData,array('password' => $data));
            }

            if(empty($input['mobilenumber'])){
                $error = array_merge($error,array('mobilenumber' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['mobilenumber'])."'";
                $userData = array_merge($userData,array('mobile_number' => $data));
            }

            if(empty($input['nationality'])){
                $error = array_merge($error,array('nationality' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['nationality'])."'";
                $userData = array_merge($userData,array('nationality' => $data));
            }

            if(empty($input['gender'])){
                $error = array_merge($error,array('gender' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['gender'])."'";
                $userData = array_merge($userData,array('gender' => $data));
            }

            if(empty($input['profilephoto'])){
                $error = array_merge($error,array('profilephoto' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['profilephoto'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('profile_photo' => $data));
            }

            if(empty($input['country'])){
                $error = array_merge($error,array('country' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['country'])."'";
                $userData = array_merge($userData,array('country' => $data));
            }

            if(empty($input['city'])){
                $error = array_merge($error,array('city' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['city'])."'";
                $userData = array_merge($userData,array('city' => $data));
            }

            if(empty($input['address'])){
                $error = array_merge($error,array('address' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['address'])."'";
                $userData = array_merge($userData,array('address' => $data));
            }

            if(empty($input['education'])){
                $error = array_merge($error,array('education' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['education'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('education' => $data));
            }

            if(empty($input['language'])){
                $error = array_merge($error,array('language' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['language'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('language_name' => $data));
            }

            if(empty($input['skill'])){
                $error = array_merge($error,array('skill' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['skill'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('skill_name' => $data));
            }

            if(empty($input['experience'])){
                $error = array_merge($error,array('experience' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['experience'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('experience' => $data));
            }

            if(empty($input['portfolio'])){
                $error = array_merge($error,array('portfolio' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['portfolio'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('portfolio' => $data));
            }

            if(empty($input['bankname'])){
                $error = array_merge($error,array('bankname' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['bankname'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('bank_name' => $data));
            }

            if(empty($input['accountnumber'])){
                $error = array_merge($error,array('accountnumber' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['accountnumber'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('account_number' => $data));
            }

            if(empty($input['summary'])){
                $error = array_merge($error,array('summary' => 'This field is required.'));
            }
            else{
                $data = "'".$this->cleanInput($input['summary'])."'";
                $serviceProviderData = array_merge($serviceProviderData,array('summary' => $data));
            }

        }
        
    }
?>