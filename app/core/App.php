<?php

    class App{
        
        protected $controller = "main"; // later on i will replace this part with session
        
        protected $method = "home"; 

        protected $params;

        public function __construct(){

            $url = $this->parseUrl();
            if(!empty($_SESSION['usertype'])){
                $this->controller = $_SESSION['usertype'];
            }

            if(!empty($url)){
                if($url[0]!=='serviceprovider' && $url[0]!=='serviceseeker' && $url[0]!=='admin' && $url[0]!=='main'){
                    header("Location: http://localhost/seralance/public/".$this->controller);                
                    exit();
                }
                unset($url[0]);
            }
            else{
                header("Location: http://localhost/seralance/public/".$this->controller);                
                exit();
            }

            /**********************************
             * The snippet below will be used if other extra controller in which session will not be the core for routing
            if(file_exists('../app/Controllers/'. $url[0] .'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }
            **********************************/

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