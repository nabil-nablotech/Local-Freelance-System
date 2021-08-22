<?php
   include "includes/service_seeker-navigation.php";
   
   ?>

	<head>
		<script>
		document.title = "Service seeker-Home";
		</script>
	</head>
	<!--  -->
	<div class="container-fluid " style="margin-top: 100px;">
		<div class="row mb-3">
			<!-- profile photo -->
			<div class="col-xl-4 col-md-4 mb-4">
				<div class="card h-100">
					<div class="card-body text-center"> <img src="http://localhost/seralance/<?php echo $seekerDetail['profilephoto'];?>" class="img-avater " style="border:1px solid black; max-width:200px;">
						<p> Welcome <?php echo ucfirst($seekerDetail['firstname'])." ".ucfirst($seekerDetail['lastname']);?></p>
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
   		require "includes/service_seeker-footer.php";
   ?>
	