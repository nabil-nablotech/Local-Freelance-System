<?php

    class ServiceProvider extends User{
        
        private $bankName;
        private $accountNumber;
        private $walletBalance;



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
        
    }
?>