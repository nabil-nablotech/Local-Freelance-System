<?php
require "includes/admin-navigation.php";
$disputes = $adminController->getAllClosedDisputes();
?>
	<script>
	document.title = "Service seeker-Transaction history";
	</script>
	</head>
	<div class="container " style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 ">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">List of closed disputes</h6> </div>
					<div class="card-body">
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
                                                   <td><a class="btn btn-info" href="{$_SESSION['baseurl']}public/admin/viewdispute/{$dispute['dispute_id']}">View</a> </td>
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
   <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery/jquery.min.js"></script>  
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/jquery.dataTables.js" ></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/jquery.dataTables.min.js" ></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>public/assets/js/administrator/serelance-admin.js "></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/dataTables.bootstrap4.js" ></script>
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


		</body>

		</html>