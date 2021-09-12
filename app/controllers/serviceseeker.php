<?php
    namespace Controller;
    ob_start();// to avoid header() error. should be put at first
    class ServiceSeeker extends Controller{
        
        public function home(){
            $this->view('service_seeker/home');
        }

        public function browse(){
            $this->view('service_seeker/browse_service_provider');
        }

        public function announce(){
            $this->view('service_seeker/announce_project');
        }

        public function transaction(){
            $this->view('service_seeker/transaction');
        }

        public function profile(){
            $this->view('service_seeker/updateprofile');
        }
        
        public function ticket(){
            $this->view('service_seeker/ticket');
        }

        public function dispute(){
            $this->view('service_seeker/dispute');
        }

        public function newticket(){
            $this->view('service_seeker/addticket');
        }
        
        public function newdispute(){
            $this->view('service_seeker/adddispute');
        }

        public function changepassword(){
            $this->view('service_seeker/changepassword');
        }

        public function message(){
            $this->view('service_seeker/message');
        }

        public function announcedprojects(){
            $_SESSION['projectlist'] = 'announcedprojects';
            $this->view('service_seeker/announcedproject');
            unset($_SESSION['projectlist']);
        }

        public function offeredprojects(){
            $_SESSION['projectlist'] = 'offeredprojects';
            $this->view('service_seeker/offeredproject');
            unset($_SESSION['projectlist']);
        }

        public function ongoingprojects(){
            $this->view('service_seeker/ongoingproject');
        }

        public function terminatedprojects(){
            $this->view('service_seeker/terminatedproject');
        }

        public function completedprojects(){
            $this->view('service_seeker/completedproject');
        }

        public function fetchnotification(){
            $this->view('service_seeker/fetchnotification');
        }

        public function compose(){
            $this->view('service_seeker/compose');
        }

        public function send(){
            $this->view('service_seeker/send');
        }

        public function chathistory(){
            $this->view('service_seeker/chathistory');
        }

        public function messages(){
            $this->view('service_seeker/getmessages');
        }

        
        public function paymentsuccess(){
            $serviceSeeker = $this->model('ServiceSeeker');
            $serviceSeeker->updateWallet($_SESSION['username'],$_GET['TotalAmount'],'increase');

            $payment = $this->model('Payment');
            $payment->insertPayment($_GET['TotalAmount'], 'YENEPAY', $_GET['MerchantOrderId']);

            $transaction = $this->model('Transaction');
            $transaction->insertTransaction("Deposit", 'Deposit for project ID: '.$_GET['MerchantOrderId'], $_GET['TotalAmount'],$_SESSION['username']);

            $project = $this->model('Project');
            $project->updateStatus($_GET['MerchantOrderId'],"Ongoing");

            header("Location: http://localhost/seralance/public/serviceseeker/ongoingprojects");                
            exit();

            
        }

        public function approveproject($projectId){

            $project = $this->model('Project');
            $projectDetails = $project->retrieveProjectDetails($projectId);
            $project->endProject($projectDetails['project_id'],"Completed");

            $transaction = $this->model('Transaction');

            $serviceSeeker = $this->model('ServiceSeeker');
            $serviceSeeker->updateWallet($_SESSION['username'],$projectDetails['price'],'decrease');
            $transaction->insertTransaction("Settle", 'Payment for project ID: '.$projectDetails['project_id'], $projectDetails['price'],$_SESSION['username']);

            $revenue = number_format($projectDetails['price'] * 0.10,2);
            $payment = $projectDetails['price'] - $revenue;

            $serviceProvider = $this->model('ServiceProvider');
            $serviceProvider->updateWallet($projectDetails['assigned_to'],$payment,'increase');
            $transaction->insertTransaction("Income", 'Payment for project ID: '.$projectDetails['project_id'], $payment, $projectDetails['assigned_to']);

            $transaction->insertTransaction("Revenue", 'Revenue for project ID: '.$projectDetails['project_id'], $revenue,'admin');

            header("Location: http://localhost/seralance/public/serviceseeker/completedprojects");                
            exit();

            
        }
        

        public function checkRating($projectId){
            $rate = $this->model('Rate');

            return $rate->checkRatingExists($projectId);
            
        }

        public function viewproviderprofile($username){                 
            $serviceProvider = $this->model('ServiceProvider');
            
            $_SESSION['serviceProviderDetails'] = $serviceProvider->retrieveServiceProviderDetails($username);
            if($_SESSION['serviceProviderDetails']==false){
                unset($_SESSION['serviceProviderDetails']);
                header("Location: http://localhost/seralance/public/serviceseeker/browse");                
                exit();
            }
            $this->view('service_seeker/provider_profile');
            unset($_SESSION['serviceProviderDetails']);
        }

        public function viewbids($projectId){
            $_SESSION['projectid'] = $projectId;
            $this->view('service_seeker/viewbids');
            unset($_SESSION['projectid'] );
        }

        public function viewbiddescription($bidId){
            $bid = $this->model('Bid');
            $_SESSION['bidDetails'] = $bid->retrieveBidDetails($bidId);
            if($_SESSION['bidDetails']==false){
                unset($_SESSION['bidDetails']);
                header("Location: http://localhost/seralance/public/serviceseeker/");                
                exit();
            }

            $this->view('service_seeker/biddescription');
            unset($_SESSION['bidDetails']);
            
        }

        public function approvebid($bidId,$projectId){
            $bid = $this->model('Bid');            
            $bid->approveBid($bidId,$projectId);
            $details = $bid->retrieveBidDetails($bidId);
            $project = $this->model('Project'); 
            $project->approveBid($details['project_id'],$details['price'],$details['made_by']);
            header("Location: http://localhost/seralance/public/serviceseeker/announcedprojects");                
            exit();
        }

        public function viewproject($projectId){
            $project = $this->model('Project');
            $_SESSION['projectDetails'] = $project->retrieveProjectDetails($projectId);
            if($_SESSION['projectDetails']==false){
                unset($_SESSION['projectDetails']);
                header("Location: http://localhost/seralance/public/serviceseeker/");                
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

            $this->view('service_seeker/projectdetails');
            unset($_SESSION['projectDetails']);
            
        }
        
        public function viewticket($ticketId){
            $ticket = $this->model('Ticket');
            $_SESSION['ticketDetails'] = $ticket->retrieveTicketDetails($ticketId);
            if($_SESSION['ticketDetails']==false){
                unset($_SESSION['ticketDetails']);
                header("Location: http://localhost/seralance/public/serviceseeker/ticket");                
                exit();
            }
            if(empty($_SESSION['ticketDetails']['closed_date'])){
                $_SESSION['ticketDetails'] = array_merge($_SESSION['ticketDetails'], array('closed_date'=>'---'));
            }
            if(empty($_SESSION['ticketDetails']['reply'])){
                $_SESSION['ticketDetails'] = array_merge($_SESSION['ticketDetails'], array('reply'=>'---'));
            }

            $this->view('service_seeker/ticketdetail');
            unset($_SESSION['ticketDetails']);
        }

        public function viewdispute($disputeId){
            $dispute = $this->model('Dispute');
            $_SESSION['disputeDetails'] = $dispute->retrieveDisputeDetails($disputeId);
            if($_SESSION['disputeDetails']==false){
                unset($_SESSION['disputeDetails']);
                header("Location: http://localhost/seralance/public/serviceseeker/dispute");                
                exit();
            }
            if(empty($_SESSION['disputeDetails']['review_date'])){
                $_SESSION['disputeDetails'] = array_merge($_SESSION['disputeDetails'], array('review_date'=>'---'));
            }
            if(empty($_SESSION['disputeDetails']['decision'])){
                $_SESSION['disputeDetails'] = array_merge($_SESSION['disputeDetails'], array('decision'=>'---'));
            }

            $this->view('service_seeker/disputedetail');
            unset($_SESSION['disputeDetails']);
        }

        public function deleteproject($offertype,$projectId){
            $project = $this->model('project');
            $sucess = $project->deleteProject($projectId);
            if($sucess==false){
                header("Location: http://localhost/seralance/public/serviceseeker/{$offertype}");                
                exit();
            }

            header("Location: http://localhost/seralance/public/serviceseeker/{$offertype}");                
            exit();
        }

        public function hire($username){
            $_SESSION['assignto'] = $username;
            header("Location: http://localhost/seralance/public/serviceseeker/announce");                 
            exit();
        }

        public function logout(){
            session_destroy();
            header("Location: http://localhost/seralance/public/");                
            exit();
        }

        public function getAllSkills(){
            $serviceSeeker = $this->model('ServiceSeeker');
            return $serviceSeeker->retrieveAllSkills();
        }

        public function getUserDetails($username){
            $serviceSeeker = $this->model('ServiceSeeker');
            return $serviceSeeker->retrieveUserDetails($username);
        }

        public function getAllTransactions($username){
            $transaction = $this->model('Transaction');
            return $transaction->retrieveAllTransactions($username);
        }
        
        public function getAllTickets($username){
            $ticket = $this->model('Ticket');
            return $ticket->retrieveAllTickets($username);
        }

        public function getTransferableAmount($username){
            $serviceSeeker = $this->model('ServiceSeeker');
            $seeker = $serviceSeeker->retrieveUserDetails($username);
            $project = $this->model('Project');
            $ongoingCost = $project->retrieveOngoingPrice($username);
            
            return $seeker['walletbalance'] - $ongoingCost['totalprice'];
        }

        public function getAllNotifications($username){
            $notification = $this->model('Notification');
            return $notification->retrieveAllNotifications($username);
        }

        public function updateNotificationStatus($username){
            $notification = $this->model('Notification');
            return $notification->openNotifications($username);
        }

        public function countNotifications($username){
            $notification = $this->model('Notification');
            return $notification->countClosedNotifications($username);
        }
        
        public function getAllDisputes($username){
            $dispute = $this->model('Dispute');
            return $dispute->retrieveAllDisputes($username);
        } 

        public function getAllBids($projectId){
            $bid = $this->model('Bid');
            return $bid->retrieveAllBids($projectId);
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

        public function getServiceProviders($filter=""){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveServiceProviders($filter);
        }

        public function getAllCountries(){
            require_once('../app/models/countries.php');
            return \Countries::$countries;
        }

        public function getPaymentUrl($projectId,$price){
            $payment = $this->model('Payment');
            return $payment->generatePaymentUrl($projectId,$price);
        }

        public function getChatHistory($username){
            $message = $this->model('Message');
            $chats = $message->retrieveChatHistory($username); 
            if($chats==true){
                foreach($chats as $chat){
                    $key = array_search($chat, $chats);
                    $serviceProvider = $this->model('ServiceProvider'); 
                    if($chat['sender']==$username){
                        $chats[$key] = array_merge($chats[$key], array('recipientprofile'=>$serviceProvider->retrieveUserDetails($chat['receiver'])['profilephoto'])) ; 
                    }
                    elseif($chat['receiver']==$username){
                        $chats[$key] = array_merge($chats[$key], array('recipientprofile'=>$serviceProvider->retrieveUserDetails($chat['sender'])['profilephoto'])) ; 
                    }
                } 
                return $chats;
            }
            
            return $chats; 
        }

        public function getMessages($username,$recipient){
            $message = $this->model('Message');
            return $message->retrieveMessages($username,$recipient);             
        }

        public function validateUpdateProfile($input,$files){
            $serviceSeeker = $this->model('ServiceSeeker');
            $serviceSeeker->updateProfile($input, $files);
            header("Location: http://localhost/seralance/public/serviceseeker/profile");                
            exit();
        }

        public function validatePasswordChange($input){
            $user = $this->model('User');
            $reply = $user->updatePassword($input);
            if($reply['valid']==true){
                echo "<script>alert('Your password has been changed sucessfully.');</script>"; 
                echo "<script>location.href='http://localhost/seralance/public/';</script>";                
                exit();
                
            }
            else{
                return $reply;
            }
        }

        public function validateProjectAnnouncement($input,$files){
            $project = $this->model('Project');
            $reply = $project->createProject($input, $files);

            if($reply['valid']==true){
                if(!empty($_SESSION['assignto'])){
                    unset($_SESSION['assignto']); 
                }  

                if($input['offertype']==='Announcement'){
                    header("Location: http://localhost/seralance/public/serviceseeker/announcedprojects");              
                    exit();
                }
                if($input['offertype']==='Offer'){
                    header("Location: http://localhost/seralance/public/serviceseeker/offeredprojects");              
                    exit();
                }
                
            }
            else{
                return $reply;
            }
        }

        public function validateNewTicket($input,$files){
            $ticket = $this->model('Ticket');
            $reply = $ticket->createTicket($input, $files);

            if($reply['valid']==true){  
                header("Location: http://localhost/seralance/public/serviceseeker/ticket");              
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
                header("Location: http://localhost/seralance/public/serviceseeker/dispute");              
                exit();
            }
            else{
                return $reply;
            }
        }

        public function validateRateProvider($input){
            $rate = $this->model('Rate');
            $reply = $rate->rateProvider($input);

            if($reply['valid']==true){  
                header("Location: http://localhost/seralance/public/serviceseeker/completedprojects");              
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
            $amount = $this->getTransferableAmount($_SESSION['username']);
            $request->sendRequest($_SESSION['username'],$amount);
            header("Location: http://localhost/seralance/public/serviceseeker/transaction");              
            exit();           
            
        }

        public function checkUser($username){
            $user= $this->model('User');
            if($user->retrieveUserType($username)!=false){
                $serviceProvider = $this->model('ServiceProvider');
                return $serviceProvider->retrieveUserDetails($username);
            }
            return false;
        }

        public function sendMessage($send,$reciever,$message){
            $msg= $this->model('Message');
            $msg->insertMessage($send,$reciever,$message);
        }

        

    }
    
?>