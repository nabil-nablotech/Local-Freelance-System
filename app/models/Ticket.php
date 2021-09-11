<?php

    class Ticket extends Model{
        
        private $ticketId;
        private $openedDate;
        private $status; // open,closed
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


        //----------End of getters and setters----------//

        public function retrieveTicketDetails($ticketId){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype'] ==='serviceprovider' || $_SESSION['usertype'] ==='serviceseeker'){
                    $sql = "SELECT * FROM ticket where ticket_id='".$ticketId."' and opened_by= '".$_SESSION['username']."'";
                }

                elseif($_SESSION['usertype'] ==='admin'){
                    $sql = "SELECT * FROM ticket where ticket_id='".$ticketId."'";
                }
                $stmt = $conn->query($sql);
                if($ticket = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $ticket;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllTickets($username=""){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype']==='serviceseeker' || $_SESSION['usertype']==='serviceprovider'){
                    $sql = "SELECT * FROM ticket where opened_by='".$username."'";
                }
                $stmt = $conn->query($sql);
                if($tickets = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $tickets;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllOpenTickets(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM ticket where status='open'";
                }
                $stmt = $conn->query($sql);
                if($tickets = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $tickets;
                }
                else{
                    return false;
                }
            }
        }

        public function retrieveAllClosedTickets(){
            require_once('../app/Core/Database.php');
            $db = new Database();
            $conn = $db->setConnection();
            if($conn !== null){
                $sql = "";
                if($_SESSION['usertype']==='admin'){
                    $sql = "SELECT * FROM ticket where status='closed'";
                }
                $stmt = $conn->query($sql);
                if($tickets = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                    return $tickets;
                }
                else{
                    return false;
                }
            }
        }
    
        public function validateNewTicket($input,$files){
            
            // $ticketData holds the data to be inserted to Service provider table
            $ticketData = array();
            $error=array();


            if(empty($input['subject'])){
                $error = array_merge($error,array('subject' => 'This field is required.'));
            }
            else{
                $ticketData = array_merge($ticketData,array('subject' => $this->cleanInput($input['subject'])));
            }

            if(empty($input['message'])){
                $error = array_merge($error,array('message' => 'This field is required.'));
            }
            else{
                $ticketData = array_merge($ticketData,array('message' => $this->cleanInput($input['message'])));
            }

            if(empty($files['ticketfile']['name'])){
                $error = array_merge($error,array('ticketfile' => 'This field is required.'));                
            }
            else{
                    $extension = explode('.',$files['ticketfile']['name']);
                    $file_ext=strtolower(end($extension));
                    if(!in_array($file_ext,array('jpeg','gif','png','jpg','zip', 'pdf'))){
                        $error = array_merge($error,array('ticketfile' => 'JPG, JPEG, PNG, GIF, ZIP and PDF are only supported.'));
                    }
                    elseif($files['ticketfile']['size']>2097152){
                        $error = array_merge($error,array('ticketfile' => 'File should not be more than 2MB.'));
                    }
                    elseif(empty($error)){
                        $cleanData = 'app/upload/tickets/'.time().$files['ticketfile']['name'];
                        move_uploaded_file($files['ticketfile']['tmp_name'],"../".$cleanData);
                        $ticketData  = array_merge($ticketData,array('ticketfile' => $cleanData));
                    }
            }

            if(empty($error)){
                return array('valid'=>1 ,'data'=>$ticketData);
            }
            else{
                return array('valid'=>0,'data'=>$ticketData,'error'=>$error);
            }
        }

        public function createTicket($data, $files){
            $response = $this->validateNewTicket($data, $files);
            if($response['valid']==true){
                $this->setSubject($response['data']['subject']);
                $this->setMessage($response['data']['message']);
                $this->setFileAttachment($response['data']['ticketfile']);
                $this->setStatus('open');
                
    
                //The variables below are arguments to be passed to insert data to their respective table 
                $ticketTb = array(
                    'opened_date' => "UTC_TIMESTAMP",
                    'subject' => "'".$this->getSubject()."'",
                    'message' => "'".$this->getMessage()."'",
                    'file' => "'".$this->getFileAttachment()."'",
                    'opened_by' => "'".$_SESSION['username']."'",
                    'status' => "'".$this->getStatus()."'"
                );

                $this->insert('ticket',$ticketTb);
                return array('valid'=>1);
            } 
            else{
                return $response;
            }      
        }

        public function validateTicketReply($input){
            
            // $ticketData holds the data to be inserted to Service provider table
            $ticketData = array();
            $error=array();


            if(empty($input['reply'])){
                $error = array_merge($error,array('reply' => 'This field is required.'));
            }
            else{
                $ticketData = array_merge($ticketData,array('reply' => $this->cleanInput($input['reply'])));
                $ticketData = array_merge($ticketData,array('ticketid' => $this->cleanInput($input['ticketid'])));
            }

            if(empty($error)){
                return array('valid'=>1 ,'data'=>$ticketData);
            }
            else{
                return array('valid'=>0,'data'=>$ticketData,'error'=>$error);
            }
        }

        public function reviewTicket($data){
            $response = $this->validateTicketReply($data);
            if($response['valid']==true){

                $this->setTicketId($response['data']['ticketid']);
                $this->setReply($response['data']['reply']);
                $this->setStatus('closed') ;
    
                //The variables below are arguments to be passed to insert data to their respective table 
                
                $ticketTb = array(
                    'closed_date' => "UTC_TIMESTAMP",
                    'reply' => "'".$this->getReply()."'",
                    'reviewed_by' => "'".$_SESSION['username']."'",
                    'status' => "'".$this->getStatus()."'"
                );
                $condition = "WHERE ticket_id = '". $this->getTicketId() ."'"; 
                $this->update('ticket',$ticketTb,$condition);

                
                $ticketDetails = $this->retrieveTicketDetails($this->getTicketId());
                require_once('../app/Models/User.php');
                $user = new User();
                $usertype = $user->retrieveUserType($ticketDetails['opened_by']);
                require_once('../app/Models/Notification.php');
                $notification = new Notification();
                $notification->autoNotify(
                                            "Ticket reviewed",
                                            "Ticket ".$this->getTicketId(). " has been resolved.",
                                            $ticketDetails['opened_by'],
                                            "http://localhost/seralance/public/".$usertype['user_type']."/ticket"
                                        );
                
                return array('valid'=>1);
            } 
            else{
                return $response;
            }      
        }

    }
?>