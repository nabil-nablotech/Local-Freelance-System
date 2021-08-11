<?php
//insert.php
if(isset($_POST["post"]))
{
 include("../Database/db.php");
 $subject = mysqli_real_escape_string($con, $_POST["title"]);
 $comment = mysqli_real_escape_string($con, $_POST["message"]);
 $query = "
 INSERT INTO comments(comment_subject, comment_text)
 VALUES ('$subject', '$comment')
 ";
 mysqli_query($con, $query);
 header("location: push_notification.php");
}
?>