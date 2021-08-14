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

        public function validateSpSignup($input,$files){
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

        public function getAllLanguages(){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveAllLanguages();
        }

        public function getAllCountries(){
            require_once('../app/models/countries.php');
            return Countries::$countries;
        }
        
        public function getAllSkills(){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveAllSkills();
        }
    }
    
?>