<?php

    class Message extends Model{
        
        private $messageId;
        private $content;
        private $sender;
        private $receiver;
        private $dateTime;
        private $openedByReceiver;


        // --------Getter and Setters of the attributes-----------
        public function getMessageId(){
            return $this->messageId; 
        }

        public function setMessageId($messageId){
            $this->messageId = $messageId;
        }

        public function getContent(){
            return $this->content; 
        }

        public function setContent($content){
            $this->content = $content;
        }

        public function getSender(){
            return $this->sender; 
        }

        public function setSender($sender){
            $this->sender = $sender;
        }

        public function getReceiver(){
            return $this->receiver; 
        }

        public function setReceiver($receiver){
            $this->receiver = $receiver;
        }

        public function getDateTime(){
            return $this->dateTime; 
        }

        public function setDateTime($dateTime){
            $this->dateTime = $dateTime;
        }

        public function getOpenedByReceiver(){
            return $this->openedByReceiver; 
        }

        public function setOpenedByReceiver($openedByReceiver){
            $this->openedByReceiver = $openedByReceiver;
        }

    }
?>