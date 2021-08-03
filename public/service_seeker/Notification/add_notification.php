<?php
include "../../Database/db.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
<div class="container">
<div class="row">
<div class="jumbotron mx-auto" style="margin-top:100px;  ">
<div class="col-sm-9 col-md-12 col-lg-12  ">
<h2>  Post Notification</h2>
<!--  -->
<form action="#" method="post" id="add_form" >
  <div class="form-group">
    <label for="email">Title:</label>
    <input type="text" class="form-control" name="title" placeholder="Enter title" id="title" required  >
  </div>
  <div class="form-group">
    <label for="pwd">Message:</label>
	<textArea input="text" class="form-control" name="message" placeholder="enter message" rows="4"  required> </textArea>

  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-sm btn-primary " name="send"><i class="fa fa-paper-plane" aria-hidden="true">
</i>push</button>
</div>

</form>
<!--  -->
</div>
<?php
//insert.php
if(isset($_POST["send"]))
{
	
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$message= mysqli_real_escape_string($con, $_POST['message']);
$sql="insert into notification (title, message) values ('$title', '$message')";
$exesql= mysqli_query($con,$sql);
}
if($exesql)
{
	echo "<div class='alert alert-success mt-5'>
  <strong>Success!</strong> sent successfully.
</div>";
}
?>
</div>
</div>
</div>

</body>

</html>









<?php
//insert.php
if(isset($_POST["firstname"]))
{
	include('conn.php');
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);

	mysqli_query($conn,"insert into `user` (firstname, lastname) values ('$firstname', '$lastname')");
}
?>