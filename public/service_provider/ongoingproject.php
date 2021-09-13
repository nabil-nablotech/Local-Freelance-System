<?php
   require "includes/service_provider-navigation.php";
   $projects = $serviceProviderController->getAllOngoingProjects($_SESSION['username']);
   $deliverErr = "";

		if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deliver_btn'])){     
			$feedback = $serviceProviderController->validateDeliverProject($_POST,$_FILES);
			if($feedback['valid'] == false){
			
				// Setting error values
				if(!empty($feedback['error']['deliver'])){
					$deliverErr = $feedback['error']['deliver'];
                }
                
			}
		}
     
     ?>

	<head>

		<script>
		document.title = "Service seeker-Ongoing projects";
		</script>
	</head>
	<div class="container-fluid " style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Ongoing projects</h6> </div>
					<div class="card-body">
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
													<td><a href="http://localhost/seralance/public/serviceprovider/viewproject/{$project['project_id']}" class="d-inline btn-sm  btn btn-primary mr-5">View details</a> </td>
													<td>
														<button class="btn btn-success" data-project="{$project['project_id']}" data-toggle="modal" data-target="#deliverModal" onclick ="setDeliverModal(this);" > Deliver work</button>
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
		<div class="modal fade" id="deliverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header ">
						<h5 class="modal-title mx-auto " id="exampleModalLabel">Deliver project</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					<div class="modal-body col-sm-8 mx-auto">
						<!--  -->
						<form method="POST" autocomplete="" enctype="multipart/form-data">

							<!-- alert -->
							<p class="errormessage" id="deliverErr"><?php echo $deliverErr;?></p>
							<!--  -->
							<div class="form-group">
                                <input type="text"  class="form-control" name="projectid" id="projectid" hidden>								
                                <input type="file"  class="form-control" name="deliveredfile" id="deliveredfile" required>								
                            </div>

							<div class="form-group">
								<input class="btn btn-primary btn-block " type="submit" name="deliver_btn" style="background-color: #6665ee;"> 
                            </div>

						</form>
						<!--  -->
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
        function setDeliverModal(event){
            
            document.getElementById('projectid').value = event.getAttribute('data-project');
        }

		$(document).ready(function() {
			$("#table").DataTable();
		});

        <?php
            if(!empty($deliverErr)){
                echo "document.querySelector('[data-project='".$_POST['projectid']."']').click();";
            }
        ?>
		</script>
