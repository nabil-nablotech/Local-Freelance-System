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
                
                if(($url[0]!=='serviceprovider' && $url[0]!=='serviceseeker' && $url[0]!=='admin' && $url[0]!=='main') || (!empty($_SESSION['usertype']) && $_SESSION['usertype'] !== $url[0]) || (empty($_SESSION['usertype']) && $url[0] !== 'main') ){
                    header("Location: ".$_SESSION['baseurl']."public/".$this->controller."/home");                
                    exit();
                }
                unset($url[0]);
            }
            else{
                header("Location: ".$_SESSION['baseurl']."public/".$this->controller."/home");                
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
            $className = "Controller\\".$this->controller;
            $tmpController = $this->controller;
            $this->controller = new $className;

            if(isset($url[1])){
                
                if(method_exists($this->controller,$url[1])){
                    $this->method = $url[1];
                    unset($url[1]);

                    $this->params = $url ? array_values($url) : [];
            
                    call_user_func_array([$this->controller,$this->method],$this->params);
                }
                else{
                    header("Location: ".$_SESSION['baseurl']."public/".$tmpController."/home");                
                    exit();
                }
            }
            else{
                header("Location: ".$_SESSION['baseurl']."public/".$tmpController."/home");                
                exit();
            }

        }

        protected function parseUrl(){
            
            if(isset($_GET['url'])){
                
                return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
            }

        }

    }

?>