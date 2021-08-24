<?php
   require "includes/service_seeker-navigation.php";
   $projects = $serviceSeekerController->getAllAnnouncedProjects($_SESSION['username']);
     
     ?>

	<head>

		<script>
		document.title = "Service seeker-Announced projects";
		</script>
	</head>
	<div class="container " style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 ">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Announced Project</h6> </div>
					<div class="card-body mx-auto">
						<!-- claim fund -->
						<!--  -->
						<div class="table table-responsive mt-5">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Project Id</th>
										<th>Project Title</th>
										<th>Announced date</th>
										<th>status</th>
										<th>View project</th>
										<th>View bids</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php 
											if(!empty($projects)){
												$count = 1;
												foreach($projects as $project){
													$deleteBtn = "";
													if($project['status'] == 'Pending Deposit'){
														$deleteBtn = '<a class="btn btn-success" href="Change it">Deposit</a>'; 
													}
													echo <<<EOT
																<tr>
																<td>
																	{$count}
																</td>
																<td>
																	{$project['project_id']}
																</td>
																<td>
																	{$project['title']}
																</td>
																<td>
																	{$project['announced_date']}
																</td>
																<td>
																	{$project['status']}
																</td>
																<!--  -->
																<td><a class="btn btn-primary" href="Change it">
																	View details</a> </td>
																	<td><a class="btn btn-primary" href="viewbids/{$project['project_id']}">
																	View bids</a> </td>
																<td>{$deleteBtn}</td>
																<td><button class="btn btn-danger" onclick ="confirmDelete('http://localhost/seralance/public/serviceseeker/deleteproject/announcedprojects/{$project['project_id']}');" >
																	Delete</button> </td>
																<!--  -->
																</tr>
															EOT;
														$count++ ;
													}
												}
										?>
										
										
								</tbody>
							</table>
						</div>
						<!--  -->
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		function confirmDelete(anchor) {
			var conf = confirm("Are you sure you want to delete this record?");
			if(conf) {
				window.location = anchor;
			}
		}

		$(document).ready(function() {
			$("#table").DataTable();
		});
		</script>
		<?php
   		require "includes/service_seeker-footer.php";
   ?>