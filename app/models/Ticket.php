<?php

    class Ticket extends Model{
        
        private $ticketId;
        private $openedDate;
        private $status;
        private $subject;
        private $message;
        private $fileAttachment;
        private $closedDate;
        private $reply;


        // --------Getter and Setters of the attributes-----------
        public function getTicketId(){
            return $this->ticketId; 
        }

        public function setTicketId($ticketId){
            $this->ticketId = $ticketId;
        }

        public function getOpenedDate(){
            return $this->openedDate; 
        }

        public function setOpenedDate($openedDate){
            $this->openedDate = $openedDate;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getSubject(){
            return $this->subject; 
        }

        public function setSubject($subject){
            $this->subject = $subject;
        }

        public function getMessage(){
            return $this->message; 
        }

        public function setMessage($message){
            $this->message = $message;
        }

        public function getFileAttachment(){
            return $this->fileAttachment; 
        }

        public function setFileAttachment($fileAttachment){
            $this->fileAttachment = $fileAttachment;
        }

        public function getClosedDate(){
            return $this->closedDate; 
        }

        public function setClosedDate($closedDate){
            $this->closedDate = $closedDate;
        }

        public function getReply(){
            return $this->reply; 
        }

        public function setReply($reply){
            $this->reply = $reply;
        }

    }
?>