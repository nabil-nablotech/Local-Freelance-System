<?php
   require_once "includes/config.php";
   require_once('../app/controllers/serviceprovider.php');
   $serviceProviderController = new Controller\ServiceProvider();
   $providerDetail = $serviceProviderController->getUserDetails($_SESSION['username']);
   $base = "http://localhost/seralance/";
   ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="service seeker">
		<meta name="author" content="serelance develpers">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



		<!--  -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<style>
		ul .dropdown-menu-center a li:hover{

		background-color: #f0f5f4!important;
		color: black!important;
		}
		.dropdown-menu-center {

		right: auto !important;
		text-align: left !important;
		transform: translate(-50%, 0) !important;
		}
		#notification.dropdown-toggle::after {
		content: none;
		}
		
		.fakeimg {
			height: 200px;
			background: #aaa;
		}
		
		.navbar-light .navbar-toggler {
			color: black;
			border-color: black;
			font-weight: bolder;
		}
		
		.navbar-light .navbar-nav .nav-link {
			color: #007bff!important;
			text-decoration: none;
			background-color: transparent;
		}
		/*  */
		
		ul li a {
			text-decoration: none;
			font-weight: bold;
			color: green;
			position: relative;
		}
		
		ul li a::before {
			content: "";
			width: 0px;
			height: 2px;
			background: black;
			position: absolute;
			top: 100%;
			left: 0;
			transition: .5s;
		}
	
		
		ul li.nav-item a:hover::before {
			width: 100%;
			background-color: black;
		}

		.nav-profile{
			 width: 40px;
			 height: 40px;
			 border-radius: 50%;
		 }
		</style>
	</head>

	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-light fixed-top" style="background-color:whitesmoke!important;">
			<a class="navbar-brand" href="#"><img src="<?php echo $base;?>public/assets/images/seralance-logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon " style="color: black!important;"></span> </button>
			<div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
				<ul class="navbar-nav ">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $base;?>public/serviceprovider/home">
							<?php  echo $lang['home'];?>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $base;?>public/serviceprovider/findproject">
						Find  project
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="<?php echo $base;?>public/serviceprovider/mybids">
					My Bids
						</a>
					</li>
					<li class="nav-item   "> <a class="nav-link " href="<?php echo $base;?>public/serviceprovider/transaction">Transaction
                  </a> </li>
				</ul>
				<!-- drop down -->
				<ul class="navbar-nav  ml-auto">
					<li class="nav-item dropdown mr-4 " style="list-style-type: none;">
						<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" 
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
            <i class="fa  fa-x fa-tasks" aria-hidden="true">  </i> </a> <span>My project</span>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown"
             style="background-color:#CCE5FF"> <a class="dropdown-item" 
             href="<?php echo $base;?>public/serviceprovider/completedprojects">Completed projects</a> 
             <a class="dropdown-item" href="<?php echo $base;?>public/serviceprovider/ongoingprojects">
               Ongoing projects</a> <a class="dropdown-item" 
               href="<?php echo $base;?>public/serviceprovider/terminatedprojects">Terminated Projects</a>
                <a class="dropdown-item" href="<?php echo $base;?>public/serviceprovider/offeredprojects">Offered Projects</a>
                 <a class="dropdown-item" href="<?php echo $base;?>public/serviceprovider/announcedprojects">Announced Projects</a> </div>
					</li>
					<li class="nav-item mr-4 ">
						<a class="nav-link" href="<?php echo $base;?>public/serviceprovider/message"> <i class="fa  fa-envelope" aria-hidden="true"></i> </a> <span>Message</span> </li>
						<li class="nav-item dropdown mr-4 " style="list-style-type: none;">
							<a class="nav-link   dropdown-toggle" href="#" id="notification" 
							role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
							<i class="fa fa-bell " aria-hidden="true">
							<span id="badge" class="badge badge-danger   badge-counter count" style="top:0px; 
							right:50px; position:absolute;border-radius:100%"></i>
										</span> </a> 
										<span>Notification</span>
								
							<ul class="dropdown-menu   dropdown-menu-center text-primary "
							id="notify" style="overflow-y:auto;height: 450px;width:380px;">
							</ul>
	
					</li>
					<!--  -->
					<form class="form-inline my-2   my-lg-0 mr-5 ">
						<li class="nav-item dropdown" style="list-style-type: none;">
							<a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="http://localhost/seralance/<?php echo $providerDetail['profilephoto'];?>" alt="profile-img" class="nav-profile"> </a> <span><?php echo $providerDetail['username'];?></span>
							<ul class="dropdown-menu  dropleft " aria-labelledby="navbarDropdown" style="background-color:#CCE5FF;"> <a class="dropdown-item" href="profile">My profile</a> <a class="dropdown-item" href="<?php echo $base;?>public/serviceprovider/dispute">Dispute</a> <a class="dropdown-item" href="<?php echo $base;?>public/serviceprovider/ticket"> Ticket</a> <a class="dropdown-item" href="faq.php">FAQ</a> <a class="dropdown-item" href="policy.php">Policy</a> <a class="dropdown-item" href="changepassword.php">Password</a> <a class="dropdown-item" href="<?php echo $base;?>/public/serviceprovider/logout">Logout</a> </ul>
						</li>
					</form>
				</ul>
			</div>
		</nav>
		<!--  -->
		<script>

function updateCount(){
   $.ajax({
		   type: "POST",
		   url: "http://localhost/seralance/public/serviceprovider/fetchnotification",		
		   data: {
			   id: "<?php echo $_SESSION['username'];?>",
			   count: true
		   },
		   success: function(data) {
			   if(data>0){
				   $('.count').html(data);
			   }
			   else{
				   $('.count').html('');
			   }
									   
		   }
	   });
}
$(window).on('load',updateCount);

setInterval(updateCount,5000); 
$('#notification').click(function(){
   $.ajax({
		   type: "POST",
		   url: "http://localhost/seralance/public/serviceprovider/fetchnotification",		
		   data: {
			   id: "<?php echo $_SESSION['username'];?>",
			   open: true
		   },
		   success: function(data) {
			   $('#notify').html(data);						
		   }
	   });
});


</script>