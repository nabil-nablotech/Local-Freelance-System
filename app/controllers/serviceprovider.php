<?php
    namespace Controller;
    ob_start();// to avoid header() error. should be put at first
    class ServiceProvider extends Controller{
        
        public function home(){
            $this->view('service_provider/home');
        }

        public function findproject(){
            $this->view('service_provider/find_project');
        }

        public function mybids(){
            $this->view('service_provider/mybids');
        }

        public function transaction(){
            $this->view('service_provider/transaction');
        }

        public function bid($projectId){
            $_SESSION['projectId'] = $projectId;
            $this->view('service_provider/bid');
        }

        public function announcedprojects(){
            $this->view('service_provider/announcedproject');
        }

        public function offeredprojects(){
            $this->view('service_provider/offeredproject');
        }

        public function ongoingprojects(){
            $this->view('service_provider/ongoingproject');
        }

        public function terminatedprojects(){
            $this->view('service_provider/terminatedproject');
        }

        public function completedprojects(){
            $this->view('service_provider/completedproject');
        }

        public function fetchnotification(){
            $this->view('service_provider/fetchnotification');
        }

        public function compose(){
            $this->view('service_provider/compose');
        }

        public function send(){
            $this->view('service_provider/send');
        }

        public function chathistory(){
            $this->view('service_provider/chathistory');
        }

        public function messages(){
            $this->view('service_provider/getmessages');
        }

        public function profile(){
            $this->view('service_provider/updateprofile');
        }

        public function ticket(){
            $this->view('service_provider/ticket');
        }

        public function dispute(){
            $this->view('service_provider/dispute');
        }

        public function newticket(){
            $this->view('service_provider/addticket');
        }

        public function newdispute(){
            $this->view('service_provider/adddispute');
        }

        public function changepassword(){
            $this->view('service_provider/changepassword');
        }

        public function message(){
            $this->view('service_provider/message');
        }

        public function viewticket($ticketId){
            $ticket = $this->model('Ticket');
            $_SESSION['ticketDetails'] = $ticket->retrieveTicketDetails($ticketId);
            if($_SESSION['ticketDetails']==false){
                unset($_SESSION['ticketDetails']);
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/ticket");                
                exit();
            }
            if(empty($_SESSION['ticketDetails']['closed_date'])){
                $_SESSION['ticketDetails'] = array_merge($_SESSION['ticketDetails'], array('closed_date'=>'---'));
            }
            if(empty($_SESSION['ticketDetails']['reply'])){
                $_SESSION['ticketDetails'] = array_merge($_SESSION['ticketDetails'], array('reply'=>'---'));
            }

            $this->view('service_provider/ticketdetail');
            unset($_SESSION['ticketDetails']);
        }

        public function viewdispute($disputeId){
            $dispute = $this->model('Dispute');
            $_SESSION['disputeDetails'] = $dispute->retrieveDisputeDetails($disputeId);
            if($_SESSION['disputeDetails']==false){
                unset($_SESSION['disputeDetails']);
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/dispute");                
                exit();
            }
            if(empty($_SESSION['disputeDetails']['review_date'])){
                $_SESSION['disputeDetails'] = array_merge($_SESSION['disputeDetails'], array('review_date'=>'---'));
            }
            if(empty($_SESSION['disputeDetails']['decision'])){
                $_SESSION['disputeDetails'] = array_merge($_SESSION['disputeDetails'], array('decision'=>'---'));
            }

            $this->view('service_provider/disputedetail');
            unset($_SESSION['disputeDetails']);
        }

        public function viewproject($projectId){
            $project = $this->model('Project');
            $_SESSION['projectDetails'] = $project->retrieveProjectDetails($projectId);
            if($_SESSION['projectDetails']==false){
                unset($_SESSION['projectDetails']);
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/");                
                exit();
            }

            if(empty($_SESSION['projectDetails']['price'])){
                $_SESSION['projectDetails'] = array_merge($_SESSION['projectDetails'], array('price'=>'---'));
            }
            if(empty($_SESSION['projectDetails']['start_date'])){
                $_SESSION['projectDetails'] = array_merge($_SESSION['projectDetails'], array('start_date'=>'---'));
            }
            if(empty($_SESSION['projectDetails']['end_date'])){
                $_SESSION['projectDetails'] = array_merge($_SESSION['projectDetails'], array('end_date'=>'---'));
            }
            if(empty($_SESSION['projectDetails']['file'])){
                $_SESSION['projectDetails'] = array_merge($_SESSION['projectDetails'], array('file'=>'---'));
            }
            if(empty($_SESSION['projectDetails']['delivered_file'])){
                $_SESSION['projectDetails'] = array_merge($_SESSION['projectDetails'], array('delivered_file'=>'---'));
            }
            if(empty($_SESSION['projectDetails']['assigned_to'])){
                $_SESSION['projectDetails'] = array_merge($_SESSION['projectDetails'], array('assigned_to'=>'---'));
            }

            $this->view('service_provider/projectdetails');
            unset($_SESSION['projectDetails']);
            
        }

        public function viewbiddescription($bidId){
            $bid = $this->model('Bid');
            $_SESSION['bidDetails'] = $bid->retrieveBidDetails($bidId);
            if($_SESSION['bidDetails']==false){
                unset($_SESSION['bidDetails']);
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/");                
                exit();
            }

            $this->view('service_provider/biddescription');
            unset($_SESSION['bidDetails']);
            
        }

        public function deletebid($bidId){
            $bid = $this->model('Bid');
            $sucess = $bid->deleteBid($bidId);
            if($sucess==false){
                echo "<script>console.log('I have returned')</script>";
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/mybids");                
                exit();
            }

            header("Location: ".$_SESSION['baseurl']."public/serviceprovider/mybids");                
            exit();
        }

        public function rejectproject($projectId){
            $project = $this->model('Project');
            $sucess = $project->rejectProject($projectId);
            if($sucess==false){
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/offeredprojects");                
                exit();
            }

            header("Location: ".$_SESSION['baseurl']."public/serviceprovider/offeredprojects");                
            exit();
        }

        public function logout(){
            unset($_SESSION['username']);
            unset($_SESSION['usertype']);
            header("Location: ".$_SESSION['baseurl']."public/");                
            exit();
        }

        public function getAllCountries(){
            require_once('../app/models/countries.php');
            return \Countries::$countries;
        }

        public function getAllLanguages(){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveAllLanguages();
        }

        public function getAllSkills(){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveAllSkills();
        }

        public function getAllTickets($username){
            $ticket = $this->model('Ticket');
            return $ticket->retrieveAllTickets($username);
        }

        public function getAllNotifications($username){
            $notification = $this->model('Notification');
            return $notification->retrieveAllNotifications($username);
        }

        public function getChatHistory($username){
            $message = $this->model('Message');
            $chats = $message->retrieveChatHistory($username); 
            if($chats==true){
                foreach($chats as $chat){
                    $key = array_search($chat, $chats);
                    $serviceSeeker = $this->model('ServiceSeeker'); 
                    if($chat['sender']==$username){
                        $chats[$key] = array_merge($chats[$key], array('recipientprofile'=>$serviceSeeker->retrieveUserDetails($chat['receiver'])['profilephoto'])) ; 
                    }
                    elseif($chat['receiver']==$username){
                        $chats[$key] = array_merge($chats[$key], array('recipientprofile'=>$serviceSeeker->retrieveUserDetails($chat['sender'])['profilephoto'])) ; 
                    }
                } 
                return $chats;
            }
            
            return $chats; 
        }

        public function updateNotificationStatus($username){
            $notification = $this->model('Notification');
            return $notification->openNotifications($username);
        }

        public function countNotifications($username){
            $notification = $this->model('Notification');
            return $notification->countClosedNotifications($username);
        }
        
        public function getStatistics($username){
            $project = $this->model('Project');
            return $project->retrieveStatistics($username);
        } 

        public function getAllDisputes($username){
            $dispute = $this->model('Dispute');
            return $dispute->retrieveAllDisputes($username);
        } 

        public function getUserDetails($username){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveUserDetails($username);
        }

        public function getAllTransactions($username){
            $transaction = $this->model('Transaction');
            return $transaction->retrieveAllTransactions($username);
        }

        public function getProjects($filter=""){
            $project = $this->model('Project');
            return $project->retrieveProjects($filter);
        }

        public function getProjectDetails($projectId){
            $project = $this->model('Project');
            return $project->retrieveProjectDetails($projectId);
        }

        public function getAllAnnouncedProjects($username){
            $project = $this->model('Project');
            return $project->retrieveAllAnnouncedProjects($username);
        }

        public function getAllOfferedProjects($username){
            $project = $this->model('Project');
            return $project->retrieveAllOfferedProjects($username);
        }

        public function getAllOngoingProjects($username){
            $project = $this->model('Project');
            return $project->retrieveAllOngoingProjects($username);
        }

        public function getAllTerminatedProjects($username){
            $project = $this->model('Project');
            return $project->retrieveAllTerminatedProjects($username);
        }

        public function getAllCompletedProjects($username){
            $project = $this->model('Project');
            return $project->retrieveAllCompletedProjects($username);
        }

        public function getMessages($username,$recipient){
            $message = $this->model('Message');
            return $message->retrieveMessages($username,$recipient);             
        }

        public function validateUpdateProfile($input,$files){
            $serviceProvider = $this->model('ServiceProvider');
            $serviceProvider->updateProfile($input, $files);
            header("Location: ".$_SESSION['baseurl']."public/serviceprovider/profile");                
            exit();
        }

        public function validatePasswordChange($input){
            $user = $this->model('User');
            $reply = $user->updatePassword($input);
            if($reply['valid']==true){
                echo "<script>alert('Your password has been changed sucessfully.');</script>"; 
                echo "<script>location.href='".$_SESSION['baseurl']."public/';</script>";                
                exit();
                
            }
            else{
                return $reply;
            }
        }

        public function validateNewTicket($input,$files){
            $ticket = $this->model('Ticket');
            $reply = $ticket->createTicket($input, $files);

            if($reply['valid']==true){  
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/ticket");              
                exit();
            }
            else{
                return $reply;
            }
        }

        public function validateNewDispute($input,$files){
            $dispute = $this->model('Dispute');
            $reply = $dispute->createDispute($input, $files);

            if($reply['valid']==true){  
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/dispute");              
                exit();
            }
            else{
                return $reply;
            }
        }

        public function validateNewBid($input,$projectId){
            $bid = $this->model('Bid');
            $reply = $bid->createBid($input, $projectId);

            if($reply['valid']==true){
                unset($_SESSION['projectId']); 
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/mybids");           
                exit();
            }
            else{
                return $reply;
            }
        }

        public function getAllBids($username){
            $bid = $this->model('Bid');
            return $bid->retrieveAllBids($username);
        }
        
        public function validateAcceptOffer($input){
            $project = $this->model('Project');
            $reply = $project->acceptOffer($input);
            if($reply['valid']==true){
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/offeredprojects");                
                exit();
            }
            else{
                return $reply;
            }
        }

        public function validateDeliverProject($input,$files){
            $project = $this->model('Project');
            $reply = $project->deliverProject($input,$files);
            if($reply['valid']==true){
                header("Location: ".$_SESSION['baseurl']."public/serviceprovider/ongoingprojects");                
                exit();
            }
            else{
                return $reply;
            }
        }

        public function checkRequestExists($username){
            $request = $this->model('TransferRequest');
            return $request->checkExists($username);
        }

        public function requesttransfer(){
            $request= $this->model('TransferRequest');
            $request->sendRequest($_SESSION['username'],$this->getUserDetails($_SESSION['username'])['walletbalance']);
            header("Location: ".$_SESSION['baseurl']."public/serviceprovider/transaction");              
            exit();           
            
        }

        public function checkUser($username){
            $user= $this->model('User');
            if($user->retrieveUserType($username)!=false){
                $serviceSeeker = $this->model('ServiceSeeker');
                return $serviceSeeker->retrieveUserDetails($username);
            }
            return false;
        }

        public function sendMessage($send,$reciever,$message){
            $msg= $this->model('Message');
            $msg->insertMessage($send,$reciever,$message);
        }



    }
    
?>