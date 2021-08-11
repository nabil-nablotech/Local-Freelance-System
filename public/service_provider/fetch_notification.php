

<?php
if (isset($_POST["view"])) {
    include("../../Database/db.php");
    if ($_POST["view"] != '') {
        $update_query = "UPDATE comments SET comment_status=1 WHERE comment_status=0";
        mysqli_query($con, $update_query);
    }
    $query = "SELECT * FROM comments ORDER BY comment_id DESC LIMIT 5";
    $result = mysqli_query($con, $query);
    $output = '';
 
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output.=
      ' 
      <li style="list-style-type:none">
    <a href="#" style="text-decoration:none;">'
     .$row["comment_subject"].$row["comment_text"].'</br>'.
     timeago($row["pushed_date"])
   .'</a>
   <hr/>
   </li> 
    ';
        }
    } else {
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }
 
    $query_1 = "SELECT * FROM comments WHERE comment_status=0";
    $result_1 = mysqli_query($con, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
}
  echo json_encode($data);
    if ($data['unseen_notification']===0) {
        "<script type='text/javascript'>
    $(document).ready(function() {
        document.getElementById('#badge').style.background-color='white';
    });
    <script>";
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


