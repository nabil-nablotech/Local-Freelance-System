<?php
   require_once "../config.php";
   require_once "../Database/db.php";
   ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="service seeker">
		<meta name="author" content="serelance develpers">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- jQuery Library -->
		<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<!--  -->
		<style>
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
		
		ul li .nav-item .nav-link a:hover {
			color: green!important;
		}
		
		ul li a:hover::before {
			width: 100%;
			background-color: black;
		}
		</style>
	</head>

	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-light fixed-top" style="background-color:whitesmoke!important;">
			<a class="navbar-brand" href="#"><img src="../Image/Seralance logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon " style="color: black!important;"></span> </button>
			<div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
				<ul class="navbar-nav ">
					<li class="nav-item">
						<a class="nav-link" href="Home.php">
							<?php  echo $lang['home'];?>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Browse_service_provider.php">
							<?php  echo $lang['Hsp'];?>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="Announce_project.php">
							<?php echo $lang['Ap'];?>
						</a>
					</li>
					<li class="nav-item   "> <a class="nav-link " href="Transaction.php">transaction
                  </a> </li>
				</ul>
				<!-- drop down -->
				<ul class="navbar-nav  ml-auto">
					<li class="nav-item dropdown mr-4 " style="list-style-type: none;">
						<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa  fa-x fa-tasks" aria-hidden="true">  </i> </a> <span>project</span>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#CCE5FF"> <a class="dropdown-item" href="completedProject.php">completed projects</a> <a class="dropdown-item" href="ongoingProject.php">Ongoing projects</a> <a class="dropdown-item" href="terminatedproject.php">Terminated Projects</a> <a class="dropdown-item" href="offeredproject.php">Offered Projects</a> <a class="dropdown-item" href="announcedproject.php">Announced Projects</a> </div>
					</li>
					<li class="nav-item mr-4 ">
						<a class="nav-link" href="message.php"> <i class="fa  fa-envelope" aria-hidden="true"></i> </a> <span>Message</span> </li>
					<li class="nav-item dropdown mr-4 " style="list-style-type: none;margin-left:0px;">
						<a class="nav-link dropdown-toggle" href="#" id="notification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa   fa-bell" aria-hidden="true"></i> <span id="badge" class="badge badge-light badge-counter count" style=" position: absolute;
                     color:red;
                     font-weight:bolder;
                     font-size:x-large;
                     top: 1px;
                     right: 55%;
                     width: 15px;
                     height: 15px;
                     display: flex;
                     justify-content: center;
                     align-items: center;
                     border-radius: 100%;">
                  </span> </a> <span>Notification</span>
						<div class="dropdown-menu " id="notify" style="overflow-y: scroll;"> </div>
					</li>
					<!--  -->
					<form class="form-inline my-2   my-lg-0 mr-5 ">
						<li class="nav-item dropdown" style="list-style-type: none;">
							<a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user-circle"></i> </a> <span>MulugetaA</span>
							<ul class="dropdown-menu  dropleft " aria-labelledby="navbarDropdown" style="background-color:#CCE5FF;"> <a class="dropdown-item" href="updateprofile.php">profile</a> <a class="dropdown-item" href="Dispute.php">Dispute</a> <a class="dropdown-item" href="ticket.php"> ticket</a> <a class="dropdown-item" href="faq.php">FAQ</a> <a class="dropdown-item" href="policy.php">Policy</a> <a class="dropdown-item" href="changepassword.php"> password</a> <a class="dropdown-item" href="logout.php">Logout</a> </ul>
						</li>
					</form>
				</ul>
			</div>
		</nav>
		<!--  -->
		<script>
		$(document).ready(function() {
			function load_unseen_notification(view = '') {
				$.ajax({
					url: "Notification/fetch.php",
					method: "POST",
					data: {
						view: view
					},
					dataType: "json",
					success: function(data) {
						$('#notify').html(data.notification);
						if(data.unseen_notification > 0) {
							$('.count').html(data.unseen_notification);
						}
					}
				});
			}
			load_unseen_notification();
			$(document).on('click', '.dropdown-toggle', function() {
				$('.count').html('');
				load_unseen_notification('yes');
			});
			setInterval(function() {
				load_unseen_notification();;
			}, 5000);
		});
		/*  */
		/*  */
		</script>
		<!--  -->