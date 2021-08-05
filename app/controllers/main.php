<?php

    class Main extends Controller{
        
        public function home(){
            $this->view('guest/index');
        }

        public function signup($userType){
            if($userType==="serviceprovider"){
                $this->view('guest/SPRegistration');
            }
            else if($userType==="serviceseeker"){
                $this->view('guest/SSRegistration');
            }            
        }

        public function validateSpSignup($input){
            $serviceProvider = $this->model('ServiceProvider');
            //$serviceProvider->
        }

        public function indexd($some="sadf"){
            echo "I am index method in main";
            $class = $this->model($some);
            
            // In order to render a view
            $this->view('/main/page');
        }


    }
    
?>