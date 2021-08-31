<?php

    class Transaction extends Model{
        
        private $transactionId;
        private $type;
        private $detail;
        private $amount;
        private $date;


        // --------Getter and Setters of the attributes-----------
        public function getTransactionId(){
            return $this->transactionId;
        }

        public function setTransactionId($transactionId){
            $this->transactionId = $transactionId;
        }

        public function getType(){
            return $this->type; 
        }

        public function setType($type){
            $this->type = $type;
        }

        public function getDetail(){
            return $this->detail; 
        }

        public function setDetail($detail){
            $this->detail = $detail;
        }

        public function getDate(){
            return $this->date; 
        }

        public function setDate($date){
            $this->pate = $date;
        }

        public function getAmount(){
            return $this->amount; 
        }

        public function setAmount($amount){
            $this->amount = $amount;
        }

        //End of getter and setter

        public function insertTransaction($type, $detail, $amount,$username){

            $transactionTb = array(
                'type' => "'".$type."'",
                'detail' => "'".$detail."'",
                'amount' => $amount,
                'date' =>"UTC_TIMESTAMP",
                'username' => "'".$username."'"

            );

            $this->insert('transaction',$transactionTb);

        }

    }

    
?>