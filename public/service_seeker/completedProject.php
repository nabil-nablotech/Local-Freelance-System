<?php
   require "includes/service_seeker-navigation.php";
   $projects = $serviceSeekerController->getAllCompletedProjects($_SESSION['username']);

	$rateErr = "";

	if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['rate_btn'])){     
		$feedback = $serviceSeekerController->validateRateProvider($_POST);
		if($feedback['valid'] == false){
		
			// Setting error values
			if(!empty($feedback['error']['rate'])){
				$rateErr = $feedback['error']['rate'];
			}
			
		}
	}

     
     ?>

	<head>

		<script>
		document.title = "Service seeker-Completed projects";
		</script>

		<style>
			body{background-color: #f0f5f7;  }
			.rating-star {
				direction: rtl;
				font-size: 40px;
				unicode-bidi: bidi-override;
				display: inline-block;
			}
			.rating-star input {
				opacity: 0;
				width: 20px;
				height: 20px;
				position: relative;
				left: -30px;
				z-index: 2;
				cursor: pointer;
			}
			.rating-star span.star:before {
				color: #777777;
			}
			.rating-star span.star {
				display: inline-block;
				font-family: FontAwesome;
				font-style: normal;
				font-weight: normal;
				position: relative;
				z-index: 1;
			}
			.rating-star span {
				margin-left: -30px;
			}
			.rating-star span.star:before {
				color: #777777;
				content:"\f006";
			}
			.rating-star input:hover + span.star:before, .rating-star input:hover + span.star ~ span.star:before, .rating-star input:checked + span.star:before, .rating-star input:checked + span.star ~ span.star:before {
				color: #ffd100;
				content:"\f005";
			}

			.selected-rating{
				color: #ffd100;
				font-weight: bold;
				font-size: 42px;
			}
		</style>
	</head>
	<div class="container-fluid " style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 ">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Completed projects</h6> </div>
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

												$rateBtn = "";

												if($serviceSeekerController->checkRating($project['project_id'])==false){
													$rateBtn = '<button class="btn btn-success" data-project="'.$project['project_id'].'" data-serviceprovider="'.$project['assigned_to'].'" data-toggle="modal" data-target="#rateModal" onclick ="setRateModal(this);" >Rate</button>'; 
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
													<td><a href="http://localhost/seralance/public/serviceseeker/viewproject/{$project['project_id']}" class="d-inline btn-sm  btn btn-primary mr-5">View details</a> </td>
													<td>
														{$rateBtn}
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

	<!-- accept modal -->
	<div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header ">
							<h5 class="modal-title mx-auto " id="exampleModalLabel">Rate service provider</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
						</div>
						<div class="modal-body col-sm-8 mx-auto">
							<!--  -->
							<form method="POST" autocomplete="" >

								<!-- alert -->
								<p class="errormessage" id="rateErr"><?php echo $rateErr;?></p>
								<!--  -->
								<div class="form-group">
									<input type="text"  class="form-control" name="projectid" id="projectid" hidden>								
									<input type="text"  class="form-control" name="serviceprovider" id="serviceprovider" hidden>								
									<span class="mr-5">Rate: </span>
									<span class="rating-star">
											<input type="radio" name="score" value="5"><span class="star"></span>

											<input type="radio" name="score" value="4"><span class="star"></span>

											<input type="radio" name="score" value="3"><span class="star"></span>

											<input type="radio" name="score" value="2"><span class="star"></span>

											<input type="radio" name="score" value="1"><span class="star"></span>
									</span>	
									<span class="mr-5 mt-2">Comment: </span>						
									<textarea class="form-control mt-2" name="comment" id="comment" rows="5" required> </textarea>								
								</div>

								<div class="form-group">
									<input class="btn btn-primary btn-block" type="submit" name="rate_btn" style="background-color: #6665ee;"> 
								</div>
							</form>

							<!--  -->
						</div>
					</div>
				</div>
			</div>
       
		<script type="text/javascript">

			function setRateModal(event){            
            	document.getElementById('projectid').value = event.getAttribute('data-project');
            	document.getElementById('serviceprovider').value = event.getAttribute('data-serviceprovider');
        	}

			function confirmAction(anchor) {
				var conf = confirm("Are you sure you want to perform this action?");
				if(conf) {
					window.location = anchor;
				}
			}

			$(document).ready(function() {
				$("#table").DataTable();
			});


			<?php
            if(!empty($rateErr)){
                echo "document.querySelector('[data-project='".$_POST['projectid']."']').click();";
            }
        ?>


		</script>
