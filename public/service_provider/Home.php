<?php
   require "includes/service_provider-navigation.php";
   $value = $serviceProviderController->getStatistics($_SESSION['username']);
   
 ?>

<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

	<head>

		<script>
		document.title = "Service provider-Home";
		</script>
		<style>
		body { background-color: #5f5; width: 100%; margin: 0; padding: 0; -webkit-font-smoothing: antialiased;
min-height: 60vh;}

		
		 </style>
	</head>
	<!--  -->
	<div class="container-fluid " style="margin-top: 100px;">
		<div class="row mb-3">
			<!-- profile photo -->
			<div class="col-xl-4 col-md-4 mb-4">
				<div class="card h-100" style="background-color:#abbddb">
					<div class="card-body text-center"> <img src="<?php echo $_SESSION['baseurl'];?><?php echo $providerDetail['profilephoto'];?>" class="img-avater " style="border:1px solid black; max-width:200px;">
					<p> Welcome <?php echo ucfirst($providerDetail['firstname'])." ".ucfirst($providerDetail['lastname']);?></p>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-md-4">
				<div class="row mx-auto">
					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-danger  text-white"> <span style="font-size: xx-large;font-weight:bolder"> <?php echo $value['terminated_projects'];?></span>
								<p> Terminated projects</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-success  text-white"> <span style="font-size: xx-large;font-weight:bolder"><?php echo $value['completed_projects'];?></span>
								<p> Completed Projects</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-warning  text-white"> <span style="font-size: xx-large;font-weight:bolder"> <?php echo $value['ongoing_projects'];?></span>
								<p> Ongoing projects</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-info  text-white"> <span style="font-size: xx-large;font-weight:bolder"> <?php echo $value['offered_projects'];?></span>
								<p>Offered projects</p>
							</div>
						</div>
					</div>


					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-info  text-white"> <span style="font-size: xx-large;font-weight:bolder"> <?php echo $value['announced_projects'];?></span>
								<p>Announced projects</p>
							</div>
						</div>
					</div>



					<div class="col-xl-3  col-md-4 mb-4 text-center">
						<div class="card h-100">
							<div class="card-body bg-success  text-white"> <span style="font-size: xx-large;font-weight:bolder"> <?php echo $providerDetail['walletbalance'];?></span>
								<p>Wallet Balance</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  -->
	
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
   		require "includes/service_seeker-footer.php";
   ?>
		
<!--  -->