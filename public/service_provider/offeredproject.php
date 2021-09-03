<?php
   require "includes/service_provider-navigation.php";
   $projects = $serviceProviderController->getAllOfferedProjects($_SESSION['username']);
   $acceptErr = "";

		if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['accept_price_btn'])){     
			$feedback = $serviceProviderController->validateAcceptOffer($_POST);
			if($feedback['valid'] == false){
			
				// Setting error values
				if(!empty($feedback['error']['accept'])){
					$acceptErr = $feedback['error']['accept'];
                }
                
			}
		}
     
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
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Offered Project</h6> </div>
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
										<th>Offer type</th>
										<th>status</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php 
                                            if(!empty($projects)){

												$count = 1;
												foreach($projects as $project){
                                                $acceptBtn = '';
                                                $rejectBtn = '';
                                                if($project['status']!=='Cancelled' && $project['status']!=='Pending Deposit'){

                                                    $acceptBtn = '<button class="btn btn-success" data-project="'.$project['project_id'].'" data-minbudget="'.$project['budget_min'].'" data-maxbudget="'.$project['budget_max'].'" data-toggle="modal" data-target="#acceptModal" onclick ="setAcceptModal(this);">Accept</button>';
                                                    $rejectBtn = '<button class="btn btn-danger" onclick ="confirmAction(\'http://localhost/seralance/public/serviceprovider/rejectproject/'.$project['project_id'].'\');" > Reject</button>'; 
                                                    
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
                                                    <td><a href="http://localhost/seralance/public/serviceprovider/viewproject/{$project['project_id']}" class="d-inline btn-sm  btn btn-primary mr-5">View details</a> </td>
                                                    <td>
                                                        {$acceptBtn}
                                                    </td>
                                                    <td>
                                                        {$rejectBtn}
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
		<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header ">
						<h5 class="modal-title mx-auto " id="exampleModalLabel">Accept project offer</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					<div class="modal-body col-sm-8 mx-auto">
						<!--  -->
						<form method="POST" autocomplete="">
							<p class="text-center">Enter the price that is within the project budget</p>
							<p class="text-center" id="budget_range"></p>
							<!-- alert -->
							<p class="errormessage" id="acceptErr"><?php echo $acceptErr;?></p>
							<!--  -->
							<div class="form-group">
                                <input type="text"  class="form-control" name="projectid" id="projectid" hidden>								
                                <input type="number"  oninput="validity.valid||(value='')" class="form-control" name="price" id="price" required>								
                            </div>

							<div class="form-group">
								<input class="btn btn-primary btn-block " type="submit" name="accept_price_btn" style="background-color: #6665ee;"> 
                            </div>

						</form>
						<!--  -->
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
        function setAcceptModal(event){
            document.getElementById('budget_range').innerHTML = 'Budget(in ETB): '+event.getAttribute('data-minbudget')+'-'+event.getAttribute('data-maxbudget');
            
            let priceInput = document.getElementById('price');
            priceInput.setAttribute('min',event.getAttribute('data-minbudget'));
            priceInput.setAttribute('max',event.getAttribute('data-maxbudget'));

            document.getElementById('projectid').value = event.getAttribute('data-project');
        }
		function confirmAction(anchor) {
			var conf = confirm("Are you sure you want to do this action?");
			if(conf) {
				window.location = anchor;
			}
		}

		$(document).ready(function() {
			$("#table").DataTable();
		});

        <?php
            if(!empty($acceptErr)){
                echo "document.querySelector('[data-project='".$_POST['projectid']."']').click();";
            }
        ?>
		</script>
		<?php
   		require "includes/service_seeker-footer.php";
   ?>