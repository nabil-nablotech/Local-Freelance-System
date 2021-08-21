<?php
    namespace Controller;
    class ServiceProvider extends Controller{
        
        public function home(){
            $this->view('service_provider/home');
        }

        public function logout(){
            session_destroy();
            header("Location: http://localhost/seralance/public/");                
            exit();
        }


    }
    
?>