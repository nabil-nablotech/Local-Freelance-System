<?php
    class Database{
        private $servername = "localhost";
        private $username = "nablotech";
        private $password = "123123";

        public function setConnection()
        {   
            
            $conn = null;
            try{

                $conn = new PDO("mysql:host=$this->servername;dbname=seralance_db", $this->username, $this->password);
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