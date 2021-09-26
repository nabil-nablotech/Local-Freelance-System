<?php
    namespace Controller;
    ob_start();// to avoid header() error. should be put at first
    class Admin extends Controller{
        
        public function home(){
            $this->view('administrator/dashboard');
        }

        public function logout(){
            unset($_SESSION['username']);
            unset($_SESSION['usertype']);
            header("Location: ".$_SESSION['baseurl']."public/");                
            exit();
        }

        public function profile(){
            $this->view('administrator/updateprofile');
        }

        public function adminusers(){
            $this->view('administrator/admin_users');
        }

        public function serviceproviders(){
            $this->view('administrator/serviceproviders');
        }

        public function serviceseekers(){
            $this->view('administrator/serviceseekers');
        }

        public function bids(){
            $this->view('administrator/bids');
        }

        public function announcedprojects(){
            $this->view('administrator/announced');
        }

        public function offeredprojects(){
            $this->view('administrator/offered');
        }

        public function ongoingprojects(){
            $this->view('administrator/ongoing');
        }

        public function terminatedprojects(){
            $this->view('administrator/terminated');
        }

        public function completedprojects(){
            $this->view('administrator/completed');
        }

        public function notification(){
            $this->view('administrator/notification');
        }

        public function pushnotification(){
            $this->view('administrator/push_notification');
        }

        public function transactionhistory(){
            $this->view('administrator/transaction_history');
        }

        public function fundtransferrequests(){
            $this->view('administrator/fund_transfer_request');
        }

        public function transferredfunds(){
            $this->view('administrator/transferred_funds');
        }

        public function changepassword(){
            $this->view('administrator/changepassword');
        }
        
        public function opentickets(){
            $this->view('administrator/open_tickets');
        }

        public function closedtickets(){
            $this->view('administrator/closed_tickets');
        }

        public function opendisputes(){
            $this->view('administrator/open_disputes');
        }

        public function closeddisputes(){
            $this->view('administrator/closed_disputes');
        }

        public function reply($ticketId){
            $_SESSION['ticketid'] = $ticketId;
            $this->view('administrator/replyticket');
            unset($_SESSION['ticketid']);
        }

        public function review($projectId,$disputeId){
            $_SESSION['projectid'] = $projectId;
            $_SESSION['disputeid'] = $disputeId;
            $this->view('administrator/reviewdispute');
            unset($_SESSION['projectid']);
            unset($_SESSION['disputeid']);
        }

        public function viewadmin($username){
            $admin = $this->model('Admin');
            $_SESSION['adminDetails'] = $admin->retrieveUserDetails($username);
            if($_SESSION['adminDetails']==false){
                unset($_SESSION['adminDetails']);
                header("Location: ".$_SESSION['baseurl']."public/admin/home");                
                exit();
            }

            $this->view('administrator/admindetails');
            unset($_SESSION['adminDetails']);
        }

        public function viewticket($ticketId){
            $ticket = $this->model('Ticket');
            $_SESSION['ticketDetails'] = $ticket->retrieveTicketDetails($ticketId);
            if($_SESSION['ticketDetails']==false){
                unset($_SESSION['ticketDetails']);
                header("Location: ".$_SESSION['baseurl']."public/admin/home");                
                exit();
            }
            if(empty($_SESSION['ticketDetails']['closed_date'])){
                $_SESSION['ticketDetails'] = array_merge($_SESSION['ticketDetails'], array('closed_date'=>'---'));
            }
            if(empty($_SESSION['ticketDetails']['reply'])){
                $_SESSION['ticketDetails'] = array_merge($_SESSION['ticketDetails'], array('reply'=>'---'));
            }

            $this->view('administrator/ticketdetails');
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

            $this->view('administrator/disputedetail');
            unset($_SESSION['disputeDetails']);
        }

        public function newadmin(){
            $this->view('administrator/create_new_admin');
        }

        public function getUserDetails($username){
            $admin = $this->model('Admin');
            return $admin->retrieveUserDetails($username);
        }

        public function getStatistics(){
            $project = $this->model('Project');
            $serviceProvider = $this->model('ServiceProvider');
            $serviceSeeker = $this->model('ServiceSeeker');
            $transaction = $this->model('Transaction');
            $request = $this->model('TransferRequest');
            $dispute = $this->model('Dispute');
            $ticket = $this->model('Ticket');
            $statistics =[];
            $statistics = array_merge($statistics,$project->retrieveStatistics());
            $statistics = array_merge($statistics,$serviceProvider->retrieveStatistics());
            $statistics = array_merge($statistics,$serviceSeeker->retrieveStatistics());
            $statistics = array_merge($statistics,$transaction->retrieveStatistics());
            $statistics = array_merge($statistics,$request->retrieveStatistics());
            $statistics = array_merge($statistics,$dispute->retrieveStatistics());
            $statistics = array_merge($statistics,$ticket->retrieveStatistics());
            return $statistics;
        }

        public function getAdmins(){
            $admin = $this->model('Admin');
            return $admin->retrieveAdmins();
        }

        public function getServiceProviders(){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveServiceProviders();
        }

        public function getServiceSeekers(){
            $serviceSeeker = $this->model('ServiceSeeker');
            return $serviceSeeker->retrieveServiceSeekers();
        }

        public function getAllBids(){
            $bid = $this->model('Bid');
            return $bid->retrieveAllBids();
        }

        public function getAllNotifications(){
            $notification = $this->model('Notification');
            return $notification->retrieveAllNotifications();
        }

        public function getAllAnnouncedProjects(){
            $project = $this->model('Project');
            return $project->retrieveAllAnnouncedProjects();
        }

        public function getAllOfferedProjects(){
            $project = $this->model('Project');
            return $project->retrieveAllOfferedProjects();
        }

        public function getAllOngoingProjects(){
            $project = $this->model('Project');
            return $project->retrieveAllOngoingProjects();
        }

        public function getAllTerminatedProjects(){
            $project = $this->model('Project');
            return $project->retrieveAllTerminatedProjects();
        }

        public function getAllCompletedProjects(){
            $project = $this->model('Project');
            return $project->retrieveAllCompletedProjects();
        }

        public function getAllTransactions(){
            $transaction = $this->model('Transaction');
            return $transaction->retrieveAllTransactions();
        }

        public function getAllOpenRequests(){
            $transaction = $this->model('TransferRequest');
            return $transaction->retrieveAllOpenRequests();
        }

        public function getAllClosedRequests(){
            $transaction = $this->model('TransferRequest');
            return $transaction->retrieveAllClosedRequests();
        }

        public function getRevenue(){
            $transaction = $this->model('Transaction');
            return $transaction->computeRevenue();
        }

        public function getAllOpenTickets(){
            $ticket = $this->model('Ticket');
            return $ticket->retrieveAllOpenTickets();
        } 

        public function getAllClosedTickets(){
            $ticket = $this->model('Ticket');
            return $ticket->retrieveAllClosedTickets();
        }
        
        public function getAllOpenDisputes(){
            $dispute = $this->model('Dispute');
            return $dispute->retrieveAllOpenDisputes();
        }

        public function getAllClosedDisputes(){
            $dispute = $this->model('Dispute');
            return $dispute->retrieveAllClosedDisputes();
        }

        public function getAllCountries(){
            require_once('../app/models/countries.php');
            return \Countries::$countries;
        }

        public function viewserviceprovider($username){                 
            $serviceProvider = $this->model('ServiceProvider');
            
            $_SESSION['serviceProviderDetails'] = $serviceProvider->retrieveServiceProviderDetails($username);
            if($_SESSION['serviceProviderDetails']==false){
                unset($_SESSION['serviceProviderDetails']);
                header("Location: ".$_SESSION['baseurl']."public/admin/serviceproviders");                
                exit();
            }
            $this->view('administrator/provider_profile');
            unset($_SESSION['serviceProviderDetails']);
        }

        public function viewbiddescription($bidId){
            $bid = $this->model('Bid');
            $_SESSION['bidDetails'] = $bid->retrieveBidDetails($bidId);
            if($_SESSION['bidDetails']==false){
                unset($_SESSION['bidDetails']);
                header("Location: ".$_SESSION['baseurl']."public/admin/");                
                exit();
            }

            $this->view('administrator/biddescription');
            unset($_SESSION['bidDetails']);
            
        }

        public function viewproject($projectId){
            $project = $this->model('Project');
            $_SESSION['projectDetails'] = $project->retrieveProjectDetails($projectId);
            if($_SESSION['projectDetails']==false){
                unset($_SESSION['projectDetails']);
                header("Location: ".$_SESSION['baseurl']."public/admin/");                
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

            $this->view('administrator/projectdetails');
            unset($_SESSION['projectDetails']);
            
        }

        public function viewserviceseeker($username){                 
            $serviceSeeker = $this->model('ServiceSeeker');
            
            $_SESSION['serviceSeekerDetails'] = $serviceSeeker->retrieveUserDetails($username);
            if($_SESSION['serviceSeekerDetails']==false){
                unset($_SESSION['serviceSeekerDetails']);
                header("Location: ".$_SESSION['baseurl']."public/admin/serviceseekers");                
                exit();
            }
            $this->view('administrator/seeker_profile');
            unset($_SESSION['serviceSeekerDetails']);
        }

        public function suspend($usertype,$username){
            $user = $this->model('User');
            $user->suspend($username);
            if($usertype == 'serviceprovider'){
                header("Location: ".$_SESSION['baseurl']."public/admin/serviceproviders");  
            }
            if($usertype == 'serviceseeker'){
                header("Location: ".$_SESSION['baseurl']."public/admin/serviceseekers");  
            }       
                          
            exit();
        }

        public function activate($usertype,$username){
            $user = $this->model('User');
            $user->activate($username);
            if($usertype == 'serviceprovider'){
                header("Location: ".$_SESSION['baseurl']."public/admin/serviceproviders");  
            }
            if($usertype == 'serviceseeker'){
                header("Location: ".$_SESSION['baseurl']."public/admin/serviceseekers");  
            }                          
            exit();
        }

        public function validateUpdateProfile($input){
            $admin = $this->model('Admin');
            $admin->updateProfile($input);
            header("Location: ".$_SESSION['baseurl']."public/admin/profile");                
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

        public function validateTicketReply($input){
            $ticket = $this->model('Ticket');
            $reply = $ticket->reviewTicket($input);

            if($reply['valid']==true){

                header("Location: ".$_SESSION['baseurl']."public/admin/closedtickets");              
                exit();
                
            }
            else{
                return $reply;
            }
        }

        public function validateDisputeReview($input){
            $dispute = $this->model('Dispute');
            $reply = $dispute->reviewDispute($input);

            if($reply['valid']==true){
                $project = $this->model('Project');
                $projectDetails = $project->retrieveProjectDetails($reply['projectid']);
                $project->endProject($projectDetails['project_id'],"Terminated");

                $transaction = $this->model('Transaction');

                if($reply['action']==0){
                    $terminationFee = number_format($projectDetails['price'] * 0.04,2);
                    $serviceSeeker = $this->model('ServiceSeeker');
                    $serviceSeeker->updateWallet($projectDetails['announced_by'],$terminationFee,'decrease');
                    $transaction->insertTransaction("Refund", 'Termination fee of project ID: '.$projectDetails['project_id'], $terminationFee, $projectDetails['announced_by']);
                    $transaction->insertTransaction("Fee", 'Termination fee of project ID: '.$projectDetails['project_id'], $terminationFee,'admin');
                }

                elseif($reply['action']==1){

                    $serviceSeeker = $this->model('ServiceSeeker');
                    $serviceSeeker->updateWallet($projectDetails['announced_by'],$projectDetails['price'],'decrease');
                    $transaction->insertTransaction("Termination", 'Termination and payment for project ID: '.$projectDetails['project_id'], $projectDetails['price'],$projectDetails['announced_by']);
                    
                    $revenue = number_format($projectDetails['price'] * 0.10,2);
                    $payment = $projectDetails['price'] - $revenue;

                    $serviceProvider = $this->model('ServiceProvider');
                    $serviceProvider->updateWallet($projectDetails['assigned_to'],$payment,'increase');
                    $transaction->insertTransaction("Compensation", 'Termination and payment for project ID: '.$projectDetails['project_id'], $payment, $projectDetails['assigned_to']);

                    $transaction->insertTransaction("Return", 'Termination and revenue for project ID: '.$projectDetails['project_id'], $revenue,'admin');
                }
                

                header("Location: ".$_SESSION['baseurl']."public/admin/closeddisputes");              
                exit();
                
            }
            else{
                return $reply;
            }
        }

        public function validatePushNotification($input){
            $notification = $this->model('Notification');
            $reply = $notification->pushNotification($input);

            if($reply['valid']==true){  
                header("Location: ".$_SESSION['baseurl']."public/admin/notification");              
                exit();
            }
            else{
                return $reply;
            }
        }

        public function processrequest($requestId){
            $request = $this->model('TransferRequest');
            $requestDetails = $request->retrieveRequestDetails($requestId);

            if(!empty($requestDetails)){
                $user = $this->model('User');
                $usertype = $user->retrieveUserType($requestDetails['requester']);
                $transaction = $this->model('Transaction');

                if($usertype['user_type']=='serviceseeker'){
                    $serviceSeeker = $this->model('ServiceSeeker');
                    $serviceSeeker->updateWallet($requestDetails['requester'],$requestDetails['amount'],'decrease');
                    $transaction->insertTransaction("Transfer", 'Transfer to bank account', $requestDetails['amount'], $requestDetails['requester']);
                }

                elseif($usertype['user_type']=='serviceprovider'){
                    $serviceProvider = $this->model('ServiceProvider');
                    $serviceProvider->updateWallet($requestDetails['requester'],$requestDetails['amount'],'decrease');
                    $transaction->insertTransaction("Transfer", 'Transfer to bank account', $requestDetails['amount'], $requestDetails['requester']);
                }                
                
                $request->updateRequestStatus($requestId);

                
                $notification = $this->model('Notification');
                $notification->autoNotify(
                                            "Money transferred",
                                            $requestDetails['amount']. " ETB has been transferred to your bank account.",
                                            $requestDetails['requester'],
                                            $usertype['user_type']."/transaction"
                                        );
                header("Location: ".$_SESSION['baseurl']."public/admin/transferredfunds");              
                exit();
                
            }
        }


    }
    
?>