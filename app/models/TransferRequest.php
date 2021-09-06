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

        //End of getter and setter

        public function checkExists($username){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $stmt = $conn->query("SELECT * FROM transfer_request where requester='".$username."' and status='open'");
                if($stmt->fetch(PDO::FETCH_ASSOC)==true){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        public function sendRequest($username,$amount){
            $transferTb = array(
                'requester'=>"'".$username."'",
                'datetime'=>"UTC_TIMESTAMP",
                'amount'=>$amount,
                'status'=>"'open'"
            );
            $this->insert('transfer_request',$transferTb);

        }

        public function retrieveAllOpenRequests(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM transfer_request where status = 'open' ORDER BY datetime DESC";
                }
                $stmt = $conn->query($sql);
                if($requests = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $requests;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllClosedRequests(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM transfer_request where status = 'closed' ORDER BY datetime DESC";
                }
                $stmt = $conn->query($sql);
                if($requests = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $requests;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveRequestDetails($requestId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                
                if($_SESSION['usertype'] ==='admin'){
                    $sql = "SELECT * FROM transfer_request where request_id='".$requestId."'";
                }

                $stmt = $conn->query($sql);
                if($request = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $request;
                }
                else{
                    return false;
                }
            }
        }

        public function updateRequestStatus($requestId){
            $data = array(
                "status"=>"'closed'",
                'processed_date'=>"UTC_TIMESTAMP",
                'processed_by'=>"'".$_SESSION['username']."'"
            );
            $this->update('transfer_request',$data,"WHERE request_id = '".$requestId."'");
        }

    }
?>