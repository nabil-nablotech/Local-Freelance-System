<?php

require_once('../app/controllers/serviceseeker.php');
$controller = new Controller\ServiceSeeker();
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

                    </div>
                EOT;
                }
                elseif ($message['receiver']==$_POST["username"]){
                    $contactName = $message['sender'];
                }

                echo <<<EOT
                    <div class="chat-box active">

                    <div class="chat incoming">
                        <div class="details">                        
                            <p>
                                hello nzkakskka 
                                <span class="message_time"><small><i>August 25 4:00 am</i> </small></span>
                            </p>
                        </div>
                    </div>

                    <div class="chat outgoing">
                        <div class="details">                                     
                            <p>hello dani  am nabil                                                                        
                                <span class="message_time"><small><i>August 25 4:00 am</i></small></span>
                            </p>
                        </div>
                    </div>

                    </div>
                EOT;
            }
        }
        else{
            echo '';
        } 
    }

    if(!empty($_POST["count"])){
        $notification = $controller->countNotifications($_POST["id"]);
        echo $notification['number'];  
    }
    
    
}

 

?>  


