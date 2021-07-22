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
        
    }
?>