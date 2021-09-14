<?php
   require "includes/service_seeker-navigation.php";
   $projects = $serviceSeekerController->getAllOngoingProjects($_SESSION['username']);

     
     ?>

	<head>

<style> 	body{background-color: #f0f5f7;  }</style>

		<script>
		document.title = "Service seeker-Announced projects";
		</script>
	</head>
	<div class="container-fluid " style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Ongoing projects</h6> </div>
					<div class="card-body ">
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
										<th>Offer type</th>
										<th>status</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php 
                                            if(!empty($projects)){

												$count = 1;
												foreach($projects as $project){

												$appoveBtn = "";

												if($project['status'] === 'Submitted'){
													$appoveBtn = '<button class="btn btn-success" onclick ="confirmAction(\''.$_SESSION['baseurl'].'public/serviceseeker/approveproject/'.$project['project_id'].'\');" >Approve</button>'; 
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
													{$project['offer_type']}
													</td>
													<td>
													{$project['status']}
													</td>
													<!--  -->
													<td><a href="{$_SESSION['baseurl']}public/serviceseeker/viewproject/{$project['project_id']}" class="d-inline btn-sm  btn btn-primary mr-5">View details</a> </td>
													<td>
														{$appoveBtn}
													</td>
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

			function confirmAction(anchor) {
				var conf = confirm("Are you sure you want to perform this action?");
				if(conf) {
					window.location = anchor;
				}
			}

			$(document).ready(function() {
				$("#table").DataTable();
			});


		</script>
