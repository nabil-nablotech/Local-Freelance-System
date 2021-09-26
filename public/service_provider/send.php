<?php

require_once('../app/controllers/serviceprovider.php');
$controller = new Controller\ServiceProvider();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(!empty($_POST["recipient"])){
        $controller->sendMessage($_SESSION['username'],$_POST["recipient"],$_POST["message"]);
    }

    
}


?>  


