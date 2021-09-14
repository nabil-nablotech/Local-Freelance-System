<?php
    namespace Controller;
    class Main extends Controller{
        
        public function home(){
            $this->view('guest/index');
        }
        public function FAQ()
        {
            $this->view('guest/FAQ');
        }
    
        public function forgotpassword(){
            $this->view('guest/forgotpassword');
        }

        public function validateLogin($input){
            $user = $this->model('User');
            $reply = $user->login($input);
            if($reply['valid']==true){
                $_SESSION['username'] = $reply['username'];
                $_SESSION['usertype'] = $reply['usertype'];
                header("Location: ".$_SESSION['baseurl']."public/");                
                exit();
            }
            else{
                return $reply;
            }
        }

        public function validateForgotPassword($input){
            $user = $this->model('User');
            $reply = $user->sendPassword($input);
            if($reply['valid']==true){
                echo "<script>alert('Your account details has been sent to your email(Check your inbox or spam folder).');</script>"; 
                echo "<script>location.href='".$_SESSION['baseurl']."public/';</script>";                
                exit();
            }
            else{
                return $reply;
            }
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
                /*$ _SESSION['username'] = $reply['username'];
                $_SESSION['usertype'] = $reply['usertype']; */
                echo "<script>alert('A verification email has been sent to the email address.');</script>"; 
                echo "<script>location.href='".$_SESSION['baseurl']."public/';</script>";                
                exit();
            }
            else{
                return $reply;
            }
        }

        public function verify($verificationId){
            $user = $this->model('User');
            $reply = $user->verifyUser($verificationId);
            $_SESSION['username'] = $reply['username'];
            $_SESSION['usertype'] = $reply['usertype'];
            header("Location: ".$_SESSION['baseurl']."public/");
            exit(); 

        }

        public function validateSsSignup($input,$files){
            $serviceSeeker = $this->model('ServiceSeeker');
            $reply = $serviceSeeker->createAccount($input, $files);
            if($reply['valid']==true){
                /* $_SESSION['username'] = $reply['username'];
                $_SESSION['usertype'] = $reply['usertype']; */
                echo "<script>alert('A verification email has been sent to the email address.');</script>";
                echo "<script>location.href='".$_SESSION['baseurl']."public/';</script>";                         
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
            return \Countries::$countries;
        }
        
        public function getAllSkills(){
            $serviceProvider = $this->model('ServiceProvider');
            return $serviceProvider->retrieveAllSkills();
        }
    }

?>