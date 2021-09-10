<?php

require_once('../app/controllers/serviceseeker.php');
$controller = new Controller\ServiceSeeker();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(!empty($_POST["recipient"])){
        $controller->sendMessage($_SESSION['username'],$_POST["recipient"],$_POST["message"]);
    }

    
}


?>  


