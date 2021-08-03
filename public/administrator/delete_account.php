<?php
	 require_once "../Database/db.php";
	 $con->query("DELETE FROM Account WHERE Username= '$_REQUEST[Username]'") or die(mysqli_error($con));
	 header("location: Admin_users.php");