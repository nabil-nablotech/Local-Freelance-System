<?php

    class Main extends Controller{
        
        public function index($some="sadf"){
            echo "I am index method in main";
            $class = $this->model($some);
            
            // In order to render a view
            $this->view('/main/page');
        }


    }
    
?>