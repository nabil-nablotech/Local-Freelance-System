<?php

    class App{
        
        protected $controller = "main"; // later on i will replace this part with session
        
        protected $method = "home"; 

        protected $params;

        public function __construct(){

            $url = $this->parseUrl();
            if(file_exists('../app/Controllers/'. $url[0] .'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }

            require_once('../app/Controllers/'. $this->controller .'.php');

            $this->controller = new $this->controller;

            if(isset($url[1])){
                
                if(method_exists($this->controller,$url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];
            
            call_user_func_array([$this->controller,$this->method],$this->params);

        }

        protected function parseUrl(){
            
            if(isset($_GET['url'])){
                
                return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
            }

        }

    }

?>