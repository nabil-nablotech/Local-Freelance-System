<?php
header('Content-Type: application/json');

require_once('../app/controllers/serviceseeker.php');
$controller = new Controller\ServiceSeeker();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(!empty($_POST["recipient"])){
        $provider = $controller->checkUser($_POST["recipient"]);
        if($provider!=false){
            echo json_encode(array('valid' => 1,'username'=>$provider['username'],'profilephoto'=>$provider['profilephoto']));
            exit;
        }
        else{
            echo json_encode(array('valid' => 0,'error'=>'Service provider not found.'));
            exit;
        } 
    }
    else{
        echo json_encode(array('valid' => 0,'error'=>'This field is required.'));
        exit;
    }


    
    
}

  
    


?>  


