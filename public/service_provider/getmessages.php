<?php

require_once('../app/controllers/serviceprovider.php');
$controller = new Controller\ServiceProvider();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(!empty($_POST["username"]) && !empty($_POST["recipient"])){
        $messages = $controller->getMessages($_POST["username"],$_POST["recipient"]);
        if (!empty($messages)) {
            foreach ($messages as $message) {

                $msg = $message['content'];
                $datetime = $message['datetime'];
                if ($message['sender']==$_POST["username"]){
                    echo <<<EOT
                    <div class="chat outgoing">
                        <div class="details">                                     
                            <p>{$msg}                                                                      
                                <span class="message_time"><small><i>{$datetime}</i></small></span>
                            </p>
                        </div>
                    </div>
                EOT;
                }
                elseif ($message['receiver']==$_POST["username"]){
                    echo <<<EOT
                    <div class="chat incoming">
                        <div class="details">                                     
                            <p>{$msg}                                                                      
                                <span class="message_time"><small><i>{$datetime}</i></small></span>
                            </p>
                        </div>
                    </div>
                EOT;
                }
                
            }
        }

        else{
            echo '';
        }
    }

    
    
}

 

?>  


