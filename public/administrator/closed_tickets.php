<?php
require "includes/admin-navigation.php";
$tickets = $adminController->getAllClosedTickets();
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
						<h6 class="m-0 font-weight-bold text-primary mx-auto">List of closed tickets</h6> </div>
					<div class="card-body">
						<!--  -->
						<div class="table table-responsive mt-5">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Ticket ID</th>
										<th>Opened Date</th>
										<th>Subject</th>
										<th>Closed Date</th>
										<th>Status</th>
                    <th></th>
									</tr>
								</thead>
								<tbody>
										<?php 
											if(!empty($tickets)){
												$count = 1;
												foreach($tickets as $ticket){
													if(empty($ticket['closed_date'])){
														$ticket = array_merge($ticket,array('closed_date'=>'---'));
													}
                                       echo <<<EOT
                                                <tr>
                                                <td>
                                                   {$count}
                                                </td>
                                                <td>
                                                   {$ticket['ticket_id']}
                                                </td>
                                                <td>
                                                   {$ticket['opened_date']}
                                                </td>
                                                <td>
                                                   {$ticket['subject']}
                                                </td>
                                                <td>
                                                   {$ticket['closed_date']}
                                                </td>
                                                <td>
                                                   {$ticket['status']}
                                                </td>
                                                <!--  -->
                                                   <td><a class="btn btn-info" href="http://localhost/seralance/public/admin/viewticket/{$ticket['ticket_id']}">View</a> </td>
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
   <script src="http://localhost/seralance/app/vendor/jquery/jquery.min.js"></script>  
<script src="http://localhost/seralance/app/vendor/datatables/jquery.dataTables.js" ></script>
<script src="http://localhost/seralance/app/vendor/datatables/jquery.dataTables.min.js" ></script>
<script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/seralance/app/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="http://localhost/seralance/public/assets/js/administrator/seralance-admin.js "></script>
<script src="http://localhost/seralance/app/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://localhost/seralance/app/vendor/datatables/dataTables.bootstrap4.js" ></script>
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