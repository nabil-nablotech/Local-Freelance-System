<?php

    require_once('Database.php');

    class Model{

        function insert($table,$data){

            $connection = null;
            try{
                $db = new Database();
                $connection = $db->setConnection();
                $sql = "INSERT INTO $table". implode(",",array_keys($data)) . "VALUES (" . implode (",",$data) . ")";
                $connection->exec($sql);
                
            }

            catch(Exception $e){
                echo $e->getMessage();

            }

            finally{

                if($connection!==null){
                    $connection = null;
                }
            }

            
        }


        function update($table,$data,$condition=""){

            $connection = null;
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
                $connection->exec($sql);
                
            }

            catch(Exception $e){
                echo $e->getMessage();

            }

            finally{

                if($connection!==null){
                    $connection = null;
                }
            }

            
        }

        function remove($table,$condition){

            $connection = null;
            try{
                $db = new Database();
                $connection = $db->setConnection();
                
                $sql = "DELETE FROM $table " . $condition;
                $connection->exec($sql);
                
            }

            catch(Exception $e){
                echo $e->getMessage();

            }

            finally{

                if($connection!==null){
                    $connection = null;
                }
            }

            
        }

        

    }
?>