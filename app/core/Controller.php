<?php
    namespace Controller;
    class Controller{
    
        protected function model($model){
            require_once('../app/models/'. $model .'.php');
            return new $model();
        }

        protected function view($view){
            require_once($view .'.php');
        }
    }
    
?>