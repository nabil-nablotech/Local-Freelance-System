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

    }
    
?>