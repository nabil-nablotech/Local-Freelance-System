<?php

    class Dispute extends Model{
        
        private $disputeId;
        private $disputeDate;
        private $status;
        private $explanation;
        private $fileAttachment;
        private $reviewedDate;
        private $decision;


        // --------Getter and Setters of the attributes-----------
        public function getDisputeId(){
            return $this->disputeId; 
        }

        public function setDisputeId($disputeId){
            $this->disputeId = $disputeId;
        }

        public function getDisputeDate(){
            return $this->disputeDate; 
        }

        public function setDisputeDate($disputeDate){
            $this->disputeDate = $disputeDate;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getExplanation(){
            return $this->explanation; 
        }

        public function setExplanation($explanation){
            $this->explanation = $explanation;
        }

        public function getFileAttachment(){
            return $this->fileAttachment; 
        }

        public function setFileAttachment($fileAttachment){
            $this->fileAttachment = $fileAttachment;
        }

        public function getReviewedDate(){
            return $this->reviewedDate; 
        }

        public function setReviewedDate($reviewedDate){
            $this->reviewedDate = $reviewedDate;
        }

        public function getDecision(){
            return $this->decision; 
        }

        public function setDecision($decision){
            $this->decision = $decision;
        }

    }
?>