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

        public function profile(){
            $this->view('service_seeker/updateprofile');
        }
        
        public function ticket(){
            $this->view('service_seeker/ticket');
        }

        public function newticket(){
            $this->view('service_seeker/addticket');
        }

        public function message(){
            $this->view('service_seeker/message');
        }

        public function announcedprojects(){
            $this->view('service_seeker/announcedproject');
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

        public function getAllTickets($username){
            $ticket = $this->model('Ticket');
            return $ticket->retrieveAllTickets($username);
        } 

        public function getAllAnnouncedProjects($username){
            $project = $this->model('Project');
            return $project->retrieveAllAnnouncedProjects($username);
        }

        public function getServiceProviders($filter=""){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveServiceProviders($filter);
        }

        public function getAllCountries(){
            require_once('../app/models/countries.php');
            return \Countries::$countries;
        }

        public function validateUpdateProfile($input,$files){
            $serviceSeeker = $this->model('ServiceSeeker');
            $serviceSeeker->updateProfile($input, $files);
            header("Location: http://localhost/seralance/public/serviceseeker/profile");                
            exit();
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
        

    }
    
?>