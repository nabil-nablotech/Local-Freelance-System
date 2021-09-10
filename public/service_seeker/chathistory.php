<?php

require_once('../app/controllers/serviceseeker.php');
$controller = new Controller\ServiceSeeker();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(!empty($_POST["username"])){
        $chats = $controller->getChatHistory($_POST["username"]);
        if (!empty($chats)) {
            foreach ($chats as $chat) {
                $profilePhoto = $chat['recipientprofile'];
                $contactName = "";
                $msg = substr($chat['content'],0,30);
                $msg = $msg . "...";
                $datetime = $chat['datetime'];
                if ($chat['sender']==$_POST["username"]){
                    $contactName = $chat['receiver'];
                }
                elseif ($chat['receiver']==$_POST["username"]){
                    $contactName = $chat['sender'];
                }
                echo <<<EOT
                    <a href="#" onclick="displayChat(this);">
                        <div class="chat-history-container row">
                            <img class="col-2" src="http://localhost/seralance/{$profilePhoto}" alt="" >
                            <div class="col-6">
                                <span class="username-history">{$contactName}</span>
                                <p class="message-history">{$msg}</p>	
                            </div>	
                            <span class="col-4 time-history">{$datetime}</span>		
                        </div>
                        <hr>
                    </a>
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


