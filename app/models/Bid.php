<?php

    class Bid extends Model{
        
        private $bidId;
        private $bidDate;
        private $price;
        private $coverLetter;
        private $fileAttachment;
        private $status;


        // --------Getter and Setters of the attributes-----------
        public function getBidId(){
            return $this->bidId; 
        }

        public function setBidId($bidId){
            $this->bidId = $bidId;
        }

        public function getBidDate(){
            return $this->bidDate; 
        }

        public function setBidDate($bidDate){
            $this->bidDate = $bidDate;
        }

        public function getPrice(){
            return $this->price; 
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function getCoverLetter(){
            return $this->coverLetter; 
        }

        public function setCoverLetter($coverLetter){
            $this->title = $coverLetter;
        }

        public function getFileAttachment(){
            return $this->fileAttachment; 
        }

        public function setFileAttachment($fileAttachment){
            $this->fileAttachment = $fileAttachment;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

    }
?>