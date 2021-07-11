<?php
    class Database{
        private $servername = "localhost";
        private $username = "nabilo";
        private $password = "123123";

        protected function setConnection()
        {   
            $conn = null;
            try{

                $conn = new PDO("mysql:host=$this->servername;dbname=myDB", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                return $conn;

            }
    
            catch(Exception $e){

                throw new Exception("Could not establish connection to the database");

            }

            finally{
                return $conn;
            }
        }

    }
?>