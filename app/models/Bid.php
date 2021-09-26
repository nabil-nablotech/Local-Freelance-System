<?php

    class Bid extends Model{
        
        private $bidId;
        private $bidDate;
        private $price;
        private $coverLetter;
        private $status; //open or approved or not approved


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
            $this->coverLetter = $coverLetter;
        }

        public function getStatus(){
            return $this->status; 
        }

        public function setStatus($status){
            $this->status = $status;
        }

        //--------End of getters and setters --------

        public function retrieveBidDetails($bidId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                if($_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT bid_id, bid_date, bid.price, cover_letter, bid.status,made_by, project.project_id, project.title,project.announced_by FROM bid INNER JOIN project ON bid.project_id = project.project_id where bid_id ='".$bidId."' AND made_by='".$_SESSION['username']."'";
                }
                if($_SESSION['usertype']==='serviceseeker'){
                    $sql = "SELECT bid_id, bid_date, bid.price, cover_letter, bid.status,made_by, project.project_id, project.title,project.announced_by FROM bid INNER JOIN project ON bid.project_id = project.project_id where bid_id ='".$bidId."' AND project.announced_by='".$_SESSION['username']."'";
                }
                if($_SESSION['usertype']==='admin'){
                    $sql = "SELECT bid_id, bid_date, bid.price, cover_letter, bid.status,made_by, project.project_id, project.title,project.announced_by FROM bid INNER JOIN project ON bid.project_id = project.project_id where bid_id ='".$bidId."'";
                }
                $stmt = $conn->query($sql);
                if($bid = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $bid;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllBids($id=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype'] ==='serviceseeker'){
                    $sql = "SELECT bid_id,bid_date, bid.price, cover_letter, bid.status,made_by, project.project_id, project.title FROM bid INNER JOIN project ON bid.project_id = project.project_id where bid.project_id = ".$id." AND project.announced_by='".$_SESSION['username']."' ORDER BY bid_date DESC";
                }
                
                if($_SESSION['usertype'] ==='serviceprovider'){
                    $sql = "SELECT bid_id,bid_date, bid.price, cover_letter, bid.status,made_by, project.project_id, project.title FROM bid INNER JOIN project ON bid.project_id = project.project_id where made_by='".$id."' ORDER BY bid_date DESC";
                }

                if($_SESSION['usertype'] ==='admin'){
                    $sql = "SELECT bid_id,bid_date, bid.price, cover_letter, bid.status,made_by, project.project_id, project.title FROM bid INNER JOIN project ON bid.project_id = project.project_id ORDER BY bid_date DESC";
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

        public function totalBids($projectId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "SELECT count(*) as total_bids FROM bid WHERE project_id='".$projectId."'";
                $stmt = $conn->query($sql);
                if($totalBids = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $totalBids;
                }
                else{
                    return false;
                }
            }
        }

        public function deleteBid($bidId){
                
            $condition = "";              
            $condition= "WHERE bid_id ='". $bidId ."' and made_by ='".$_SESSION['username']."' AND status = 'open'" ;
            if($this->remove('bid',$condition)){
                return 1;
            }             
            
            return 0;
        }
        
        public function approveBid($bidId,$projectId){                       
            
            $condition= "WHERE bid_id !=". $bidId ." and project_id ='".$projectId."' AND status = 'open'" ;
            $this->update('bid', array('status'=>"'Rejected'"),$condition);
            $condition= "WHERE bid_id =". $bidId ."  AND status = 'open'" ;
            $this->update('bid', array('status'=>"'Approved'"),$condition);

            $bidDetails = $this->retrieveBidDetails($bidId);
            require_once('../app/Models/Notification.php');
            $notification = new Notification();
            $notification->autoNotify(
                                        "Bid approved",
                                        "Bid on project ".$projectId. " has been approved.",
                                        $bidDetails['made_by'],
                                        "serviceprovider/announcedprojects"
                                    );
            
        }

        public function validateNewBid($input){
            
            // $bidData holds the data to be inserted to Service provider table
            $bidData = array();
            $error=array();


            if(empty($input['price'])){
                $error = array_merge($error,array('price' => 'This field is required.'));
            }
            else{
                $bidData = array_merge($bidData,array('price' => $this->cleanInput($input['price'])));
            }

            if(empty($input['coverletter'])){
                $error = array_merge($error,array('coverletter' => 'This field is required.'));
            }
            else{
                $bidData = array_merge($bidData,array('coverletter' => $this->cleanInput($input['coverletter'])));
            }

            if(empty($error)){
                return array('valid'=>1 ,'data'=>$bidData);
            }
            else{
                return array('valid'=>0,'data'=>$bidData,'error'=>$error);
            }
        }

        public function createBid($data, $projectId){
            $response = $this->validateNewBid($data);
            if($response['valid']==true){

                $this->setPrice($response['data']['price']);
                $this->setCoverLetter($response['data']['coverletter']);
                $this->setStatus('open');
                
    
                //The variables below are arguments to be passed to insert data to their respective table 
                $bidTb = array(
                    'bid_date' => "UTC_TIMESTAMP",
                    'price' => $this->getPrice(),
                    'cover_letter' => "'".$this->getCoverLetter()."'",
                    'status' => "'".$this->getStatus()."'",
                    'made_by' => "'".$_SESSION['username']."'",
                    'project_id' => "'".$projectId."'"
                );

                $this->insert('bid',$bidTb);                
                return array('valid'=>1);
            } 
            else{
                return $response;
            }      
        }

    }
?>