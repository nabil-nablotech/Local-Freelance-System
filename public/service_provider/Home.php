<?php
   include "navigation.php";
   
   ?>

<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap CSS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- Datatable JS -->
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<head>
		<script>
		document.title = "Service provider-Home";
		</script>
	</head>
	<!--  -->
	<div class="container-fluid " style="margin-top: 100px;">
		<div class="row mb-3">
			<!-- profile photo -->
			<div class="col-xl-4 col-md-4 mb-4">
				<div class="card h-100">
					<div class="card-body text-center"> <img src="../Admin/img/boy.png" class="img-avater " style="border-radius: 50%;max-width:110px;">
						<p> profile</p>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-md-4">
				<div class="row mx-auto">
					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-danger  text-white"> <span style="font-size: xx-large;font-weight:bolder"> 200</span>
								<p> Terminated projects</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-success  text-white"> <span style="font-size: xx-large;font-weight:bolder"> 200</span>
								<p> posted Projects</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-warning  text-white"> <span style="font-size: xx-large;font-weight:bolder"> 20</span>
								<p> pending projects</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-info  text-white"> <span style="font-size: xx-large;font-weight:bolder"> 200</span>
								<p>Total Biddings</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  -->
		<div class="row">
			<!-- Area Chart -->
			<div class="col-xl-12 col-lg-8 mx-auto">
				<p class="text-center text-primary">Recent Activity</p>
				<div class="card mb-4 ">
					<div class="card-body"> </div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Logout -->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to logout?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button> <a href="login.html" class="btn btn-primary">Logout</a> </div>
			</div>
		</div>
	</div>
	</div>
	<!---Container Fluid-->
	</div>
	</div>
	</div>
	</div>
	<?php
   include "../ServiceSeeker/Footer.php";
   ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Bootstrap CSS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<!-- Datatable JS -->
		<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<!--  -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--  -->