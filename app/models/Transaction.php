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

        public function retrieveAllTransactions($username=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype']==='serviceseeker' || $_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT * FROM transaction where username='".$username."' ORDER BY date DESC";
                }
                if($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM transaction ORDER BY date DESC";
                }
                $stmt = $conn->query($sql);
                if($transactions = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $transactions;
                }
                else{
                    return false;
                }
            }
        }

        public function computeRevenue(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){

                $sql = "SELECT sum(amount) as totalrevenue FROM transaction where type='Revenue' OR type='Fee' OR type='Return' ";
                $stmt = $conn->query($sql);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }

        public function retrieveStatistics(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            $statistics = [];
            if($conn !== null){
                $sql = "SELECT sum(amount) as total_revenue FROM transaction where type='Revenue' OR type='Fee' OR type='Return' ";         
                $stmt = $conn->query($sql);
                $statistics = array_merge($statistics,$stmt->fetch(PDO::FETCH_ASSOC));

                
                $sql = "SELECT sum(amount) as total_transferred_funds FROM transaction where type='Transfer'";         
                $stmt = $conn->query($sql);
                $statistics = array_merge($statistics,$stmt->fetch(PDO::FETCH_ASSOC));

                return $statistics;
                
            }
        }

    }

    
?>