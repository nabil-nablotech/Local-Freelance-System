<?php
header('Content-Type: application/json');

require_once('../app/controllers/serviceprovider.php');
$controller = new Controller\ServiceProvider();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(!empty($_POST["recipient"])){
        $seeker = $controller->checkUser($_POST["recipient"]);
        if($seeker!=false){
            echo json_encode(array('valid' => 1,'username'=>$seeker['username'],'profilephoto'=>$seeker['profilephoto']));
            exit;
        }
        else{
            echo json_encode(array('valid' => 0,'error'=>'Service seeker not found.'));
            exit;
        } 
    }
    else{
        echo json_encode(array('valid' => 0,'error'=>'This field is required.'));
        exit;
    }


    
    
}

  
    


?>  


