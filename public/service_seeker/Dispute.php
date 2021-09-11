<?php
require "includes/service_seeker-navigation.php";
$disputes = $serviceSeekerController->getAllDisputes($_SESSION['username']);
?>
	<script>
	document.title = "Service seeker-dispute";
	</script>
		<style> 	body{background-color: #f0f5f7;  }</style>
	</head>
	<div class="container-fluid " style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">List of Disputes</h6> </div>
					<div class="card-body">
						<a class="btn btn-success" href="newdispute"> <i class="fa fa-plus-circle"></i> New Dispute</a>
						<!--  -->
						<div class="table table-responsive mt-5">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Dispute ID</th>
										<th>Dispute Date</th>
										<th>Project id</th>
										<th>Review date</th>
										<th>Status</th>
										<th> </th>
									</tr>
								</thead>
								<tbody>
										<?php 
											if(!empty($disputes)){
												$count = 1;
												foreach($disputes as $dispute){
													if(empty($dispute['review_date'])){
														$dispute = array_merge($dispute,array('review_date'=>'---'));
													}
													echo <<<EOT
																<tr>
																<td>
																	{$count}
																</td>
																<td>
																	{$dispute['dispute_id']}
																</td>
																<td>
																	{$dispute['dispute_date']}
																</td>
																<td>
																	{$dispute['project_id']}
																</td>
																<td>
																	{$dispute['review_date']}
																</td>
																<td>
																	{$dispute['status']}
																</td>
																<!--  -->
																	<td><a class="btn btn-info" href="viewdispute/{$dispute['dispute_id']}"> View</a> </td>
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
	</div>
	<script type="text/javascript">
	function confirmationDelete(anchor) {
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf) {
			window.location = anchor.attr("href");
		}
	}
	</script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#table").DataTable();
	});
	</script>
	<?php
   require "includes/service_seeker-footer.php";
   ?>

		</body>

		</html>