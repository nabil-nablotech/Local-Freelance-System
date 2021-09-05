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
                    $url = $notification['url'];
                }
                echo <<<EOT
                <a href="${url}" style="text-decoration:none; overflow-wrap: break-word;">
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

  
    
    
 
/* function to hold notification puhsed date  */

 function timeago($timestamp)
 {
     date_default_timezone_set("Africa/Addis_Ababa");
     $time_ago        = strtotime($timestamp);
     $current_time    = time();
     $time_difference = $current_time - $time_ago;
     $seconds         = $time_difference;
    
     $minutes = round($seconds / 60); // value 60 is seconds
    $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks   = round($seconds / 604800); // 7*24*60*60;
    $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
                  
    if ($seconds <= 60) {
        return "Just Now";
    } elseif ($minutes <= 60) {
        if ($minutes == 1) {
            return "one minute ago";
        } else {
            return "$minutes minutes ago";
        }
    } elseif ($hours <= 24) {
        if ($hours == 1) {
            return "1 hour ago";
        } else {
            return "$hours hrs ago";
        }
    } elseif ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    } elseif ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    } elseif ($months <= 12) {
        if ($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return "$years years ago";
        }
    }
 }

?>  


