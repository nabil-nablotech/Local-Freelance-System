<?php

    class Project extends Model{
        
        private $projectId;
        private $announcedDate;
        private $title;
        private $description;
        private $category;
        private $skillRequired;
        private $fileAttachment;
        private $budget;
        private $price;
        private $offerType;
        private $status;
        private $startDate;
        private $endDate;


        // --------Getter and Setters of the attributes-----------
        public function getProjectId(){
            return $this->projectId; 
        }

        public function setProjectId($projectId){
            $this->projectId = $projectId;
        }

        public function getAnnouncedDate(){
            return $this->announcedDate; 
        }

        public function setAnnouncedDate($announcedDate){
            $this->announcedDate = $announcedDate;
        }

        public function getTitle(){
            return $this->title; 
        }

        public function setTitle($title){
            $this->title = $title;
        }

        public function getDescription(){
            return $this->description; 
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getCategory(){
            return $this->category; 
        }

        public function setCategory($category){
            $this->category = $category;
        }

        public function getSkillRequired(){
            return $this->skillRequired; 
        }

        public function setSkillRequired($skillRequired){
            $this->skillRequired = $skillRequired;
        }

        public function getFileAttachment(){
            return $this->fileAttachment; 
        }

        public function setFileAttachment($fileAttachment){
            $this->fileAttachment = $fileAttachment;
        }

        public function getBudget(){
            return $this->budget; 
        }

        public function setBudget($budget){
            $this->budget = $budget;
        }

        public function getPrice(){
            return $this->price; 
        }

        public function setPrice($price){
            $this->price = $price;
        }

        public function getOfferType(){
            return $this->offerType; 
        }

        public function setOfferType($offerType){
            $this->offerType = $offerType;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getStartDate(){
            return $this->startDate; 
        }

        public function setStartDate($startDate){
            $this->startDate = $startDate;
        }

        public function getEndDate(){
            return $this->endDate; 
        }

        public function setEndDate($endDate){
            $this->endDate = $endDate;
        }
    }
?>