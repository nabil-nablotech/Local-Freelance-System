<?php

    require_once('Database.php');

    class Model{

        protected function cleanInput($data){
            if(is_string($data)){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                $data = str_replace("'","\'",$data);
                return $data;
            }
            else{
                return $data;
            }
                                
        }

        protected function insert($table,$data){

            $connection = null;
            try{
                $db = new Database();
                $connection = $db->setConnection();
                $sql = "INSERT INTO $table(". implode(",",array_keys($data)) . ") VALUES (" . implode (",",$data) . ")";
                //echo '<script>window.alert("'.$sql.'")</script>';
                
                $connection->exec($sql);                
            }

            catch(Exception $e){
                echo $e->getMessage();
                echo '<script>window.alert("failed to insert to db")</script>';
            }

            finally{

                if($connection!==null){
                    $connection = null;
                }
            }

            
        }


        protected function update($table,$data,$condition=""){
            $connection = null;
            $sucess = 0;
            try{
                $db = new Database();
                $connection = $db->setConnection();
                
                $setStmt = "";
                $lastKey = array_key_last($data);

                foreach($data as $key=>$value){

                    if($key === $lastKey){

                        $setStmt .= $key. " = ". $value; 
                    }

                    else{
                        $setStmt .= $key. " = ". $value. ","; 
                    }
                }
                
                $sql = "UPDATE $table SET ". $setStmt ." ".$condition;
                //echo "<h1> $sql</h1>";
                //exit();
                $connection->exec($sql);
                $sucess = 1;
            }

            catch(Exception $e){
                echo $e->getMessage();

            }

            finally{

                if($connection!==null){
                    $connection = null;
                    return $sucess;
                }
            }

            
        }

        protected function remove($table,$condition){

            $connection = null;
            $sucess = 0;
            try{
                $db = new Database();
                $connection = $db->setConnection();
                
                $sql = "DELETE FROM $table " . $condition;
                echo "<script> window.alert('".$sql."')</script>";
                $connection->exec($sql);
                $sucess = 1;
            }

            catch(Exception $e){
                echo $e->getMessage();

            }

            finally{

                if($connection!==null){
                    $connection = null;
                    return $sucess;
                }
            }

            
        }

        

    }
?>