<?php

    class TransferRequest extends Model{
        
        private $requestId;
        private $requester;
        private $dateTime;
        private $amount;
        private $status;
        private $processedDateTime;
        private $type;


        // --------Getter and Setters of the attributes-----------
        public function getRequestId(){
            return $this->requestId; 
        }

        public function setRequestId($requestId){
            $this->requestId = $requestId;
        }

        public function getRequester(){
            return $this->requester; 
        }

        public function setRequester($requester){
            $this->requester = $requester;
        }

        public function getDateTime(){
            return $this->dateTime; 
        }

        public function setDateTime($dateTime){
            $this->dateTime = $dateTime;
        }

        public function getAmount(){
            return $this->amount; 
        }

        public function setAmount($amount){
            $this->amount = $amount;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getProcessedDateTime(){
            return $this->processedDateTime; 
        }

        public function setProcessedDateTime($processedDateTime){
            $this->processedDateTime = $processedDateTime;
        }

        public function getType(){
            return $this->type; 
        }

        public function setType($type){
            $this->type = $type;
        }

    }
?>