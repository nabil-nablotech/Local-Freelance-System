<?php
    namespace Controller;
    ob_start();// to avoid header() error. should be put at first
    class ServiceSeeker extends Controller{
        
        public function home(){
            $this->view('service_seeker/home');
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
        
        public function viewticket($ticketId){
            $ticket = $this->model('Ticket');
            $_SESSION['ticketDetails'] = $ticket->retrieveTicketDetails($ticketId);
            if(empty($_SESSION['ticketDetails']['closed_date'])){
                $_SESSION['ticketDetails'] = array_merge($_SESSION['ticketDetails'], array('closed_date'=>'---'));
            }
            if(empty($_SESSION['ticketDetails']['reply'])){
                $_SESSION['ticketDetails'] = array_merge($_SESSION['ticketDetails'], array('reply'=>'---'));
            }

            $this->view('service_seeker/ticketdetail');
            unset($_SESSION['ticketDetails']);
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

        public function validateProjectAnnouncement($input,$files){
            $project = $this->model('Project');
            $reply = $project->createProject($input, $files);

            if($reply['valid']==true){  
                header("Location: http://www.google.com/");              
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
                header("Location: http://localhost/seralance/public/serviceseeker/ticket");              
                exit();
            }
            else{
                return $reply;
            }
        }
        

    }
    
?>