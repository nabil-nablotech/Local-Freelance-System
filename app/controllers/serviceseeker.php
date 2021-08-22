<?php
    namespace Controller;
    class ServiceSeeker extends Controller{
        
        public function home(){
            $this->view('service_seeker/home');
        }

        public function announce(){
            $this->view('service_seeker/announce_project');
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

        public function validateProjectAnnouncement($input,$files){
            $serviceProvider = $this->model('ServiceProvider');
            $reply = $serviceProvider->createAccount($input, $files);
            if($reply['valid']==true){
                $_SESSION['username'] = $reply['username'];
                $_SESSION['usertype'] = $reply['usertype'];
                header("Location: http://localhost/seralance/public/");                
                exit();
            }
            else{
                return $reply;
            }
        }

    }
    
?>