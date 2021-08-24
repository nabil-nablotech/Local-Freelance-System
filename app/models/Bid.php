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

        //--------End of getters and setters --------
        public function retrieveAllBids($projectId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype'] ==='serviceseeker'){
                    $sql = "SELECT * FROM bid where project_id='".$projectId."' and project_id IN (select project_id from project where announced_by = '".$_SESSION['username']."')";
                }
                $stmt = $conn->query($sql);
                if($bids = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $bids;
                }
                else{
                    return false;
                }
            }
        }

    }
?>