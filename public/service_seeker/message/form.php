<?php
	if (isset($_POST['submit'])){
	
	$link = mysqli_connect("localhost",
				"root", "", "chat_app");
		
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. "
				. mysqli_connect_error());
	}
		
	// Escape user inputs for security
	$un= mysqli_real_escape_string(
			$link, $_REQUEST['uname']);
	$m = mysqli_real_escape_string(
			$link, $_REQUEST['msg']);
			
	date_default_timezone_set('Asia/Kolkata');
	$ts=date('y-m-d h:ia');
		
	// Attempt insert query execution
	$sql = "INSERT INTO chats (uname, msg, dt)
				VALUES ('$un', '$m', '$ts')";
	if(mysqli_query($link, $sql)){
		;
	} else{
		echo "ERROR: Message not sent!!!";
	}
	
	// Close connection
	mysqli_close($link);
}
?>
