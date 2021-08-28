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

        public function profile(){
            $this->view('service_provider/updateprofile');
        }

        public function ticket(){
            $this->view('service_provider/ticket');
        }

        public function newticket(){
            $this->view('service_provider/addticket');
        }

        public function viewticket($ticketId){
            $ticket = $this->model('Ticket');
            $_SESSION['ticketDetails'] = $ticket->retrieveTicketDetails($ticketId);
            if($_SESSION['ticketDetails']==false){
                unset($_SESSION['ticketDetails']);
                header("Location: http://localhost/seralance/public/serviceprovider/ticket");                
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

        public function viewproject($projectId){
            $project = $this->model('Project');
            $_SESSION['projectDetails'] = $project->retrieveProjectDetails($projectId);
            if($_SESSION['projectDetails']==false){
                unset($_SESSION['projectDetails']);
                header("Location: http://localhost/seralance/public/serviceprovider/");                
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
                header("Location: http://localhost/seralance/public/serviceprovider/");                
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
                header("Location: http://localhost/seralance/public/serviceprovider/mybids");                
                exit();
            }

            header("Location: http://localhost/seralance/public/serviceprovider/mybids");                
            exit();
        }

        public function rejectproject($projectId){
            $project = $this->model('Project');
            $sucess = $project->rejectProject($projectId);
            if($sucess==false){
                header("Location: http://localhost/seralance/public/serviceprovider/offeredprojects");                
                exit();
            }

            header("Location: http://localhost/seralance/public/serviceprovider/offeredprojects");                
            exit();
        }

        public function logout(){
            session_destroy();
            header("Location: http://localhost/seralance/public/");                
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

        public function getUserDetails($username){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveUserDetails($username);
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

        public function validateUpdateProfile($input,$files){
            $serviceProvider = $this->model('ServiceProvider');
            $serviceProvider->updateProfile($input, $files);
            header("Location: http://localhost/seralance/public/serviceprovider/profile");                
            exit();
        }

        public function validateNewTicket($input,$files){
            $ticket = $this->model('Ticket');
            $reply = $ticket->createTicket($input, $files);

            if($reply['valid']==true){  
                header("Location: http://localhost/seralance/public/serviceprovider/ticket");              
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
                header("Location: http://localhost/seralance/public/serviceprovider/mybids");           
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
                header("Location: http://localhost/seralance/public/serviceprovider/offeredprojects");                
                exit();
            }
            else{
                return $reply;
            }
        }



    }
    
?>