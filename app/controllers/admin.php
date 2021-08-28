<?php
    namespace Controller;
    class Admin extends Controller{
        
        public function home(){
            $this->view('administrator/dashboard');
        }


        public function getUserDetails($username){
            $serviceSeeker = $this->model('Admin');
            return $admin->retrieveUserDetails($username);
        }


    }
    
?>