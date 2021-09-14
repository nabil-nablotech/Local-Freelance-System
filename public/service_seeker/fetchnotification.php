<?php

require_once('../app/controllers/serviceseeker.php');
$controller = new Controller\ServiceSeeker();
if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(!empty($_POST["open"])){
        $controller->updateNotificationStatus($_POST["id"]);
        $notifications = $controller->getAllNotifications($_POST["id"]);
 
        if (!empty($notifications)) {
            foreach ($notifications as $notification) {
                //timeago($notification["datetime"])
                $url = "#";
                if(!empty($notification['url'])){
                    $url = $_SESSION['baseurl']."public/".$notification['url'];
                }
                echo <<<EOT
                <a href="{$url}" style="text-decoration:none; overflow-wrap: break-word;">
                    <li class="ml-2"style="list-style-type:none;">
                        {$notification["title"]} 
                        </br> 
                        <span style="font-weight:lighter;"> {$notification["content"]} </span>
                        </br>    
                        <small><em><span style="color:blue">{$notification["datetime"]}</span></em></small>
                        <hr  style="margin-top:0px; margin-bottom:0px; margin-left:0px;!important">
                    </li> 
                </a>
                EOT;
            }
        }
        else{
            echo '<li class="text-bold text-italic ml-2">No Notification Found</li>';
        } 
    }

    if(!empty($_POST["count"])){
        $notification = $controller->countNotifications($_POST["id"]);
        echo $notification['number'];  
    }
    
    
}

?>  


