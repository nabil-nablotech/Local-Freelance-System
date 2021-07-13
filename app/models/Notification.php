<?php

    class Notification extends Model{
        
        private $notificationId;
        private $title;
        private $content;
        private $dateTime;
        private $status;
        private $recipient;
        private $url;
        private $type;


        // --------Getter and Setters of the attributes-----------
        public function getNotificationId(){
            return $this->notificationId; 
        }

        public function setNotificationId($notificationId){
            $this->notificationId = $notificationId;
        }

        public function getTitle(){
            return $this->title; 
        }

        public function setTitle($title){
            $this->title = $title;
        }

        public function getContent(){
            return $this->content; 
        }

        public function setContent($content){
            $this->content = $content;
        }

        public function getDateTime(){
            return $this->dateTime; 
        }

        public function setDateTime($dateTime){
            $this->dateTime = $dateTime;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getRecipient(){
            return $this->recipient; 
        }

        public function setRecipient($recipient){
            $this->recipient = $recipient;
        }

        public function getUrl(){
            return $this->url; 
        }

        public function setUrl($url){
            $this->url = $url;
        }

        public function getType(){
            return $this->type; 
        }

        public function setType($type){
            $this->type = $type;
        }

    }
?>