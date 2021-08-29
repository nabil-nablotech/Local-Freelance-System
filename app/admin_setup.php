<?php

$servername = "localhost";
 $username = "nablotech";
$password = "123123";

            $conn = null;
            try{

                $conn = new PDO("mysql:host=$servername;dbname=seralance_db", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $sql = "INSERT INTO user(username, password,email,firstname,lastname, gender,mobile_number,nationality,country,city,address,join_date,last_login,user_type,status) VALUES ('admin','". password_hash("hello@there123HT",PASSWORD_DEFAULT)."','nabil.nablotech@gmail.com','Nabil','Mohammed', 'M','0966686856','Ethiopia','Ethiopia','Addis Ababa','6kilo',UTC_TIMESTAMP,UTC_TIMESTAMP,'admin','verified')";
                $conn->exec($sql);
                $sql = "INSERT INTO admin(username, role) VALUES ('admin','master')";
                $conn->exec($sql);
                $sql = "INSERT INTO permission VALUES ('admin',TRUE,TRUE,TRUE,TRUE,TRUE,TRUE,TRUE,TRUE)";
                $conn->exec($sql);


            }
    
            catch(Exception $e){

                throw new Exception("Could not establish connection to the database");

            }

     
        
    
?>