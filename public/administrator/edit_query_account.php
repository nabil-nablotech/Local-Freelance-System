<?php
	require_once '../Database/db.php';
	if(ISSET($_POST['edit_account'])){
		$No = $_POST['No'];
		$Username = $_POST['Username'];
		$FullName= $_POST['FullName'];
        $Role=$_POST['Role'];
        $Createdby=$_POST['Createdby'];
		$con->query("UPDATE Account SET No = '$No', Username = '$Username', FullName='$FullName' 
		,Role= '$Role' ,Createdby='$Createdby' WHERE Username = '$_REQUEST[Username]'") or die(mysqli_error($con));
		header("location:Admin_users.php");
	}	