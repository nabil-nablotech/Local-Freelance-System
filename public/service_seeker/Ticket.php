<?php
include "navigation.php";
require_once "../Database/db.php";
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
						<h6 class="m-0 font-weight-bold text-primary mx-auto">List of Tickets</h6> </div>
					<div class="card-body">
						<a class="btn btn-success" href="addTicket.php"> <i class="fa fa-plus-circle"></i> New Ticket</a>
						<!--  -->
						<div class="table table-responsive mt-5">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th> Id</th>
										<th>Dispute Date</th>
										<th>Dispute Title</th>
										<th> Service provider</th>
										<th>closed Date</th>
										<th>Status</th>
										<th> Dispute</th>
									</tr>
								</thead>
								<tbody>
									<?php
                        $query = $con->query("SELECT * FROM dispute") or die(mysqli_error($con));
                        while ($fetch = $query->fetch_array()) {
                            ?>
										<tr>
											<td>
												<?php echo $fetch['No']?>
											</td>
											<td>
												<?php echo $fetch['Disputeid']?>
											</td>
											<td>
												<?php echo $fetch['Disputedate']?>
											</td>
											<td>
												<?php echo $fetch['Disputetitle']?>
											</td>
											<td>
												<?php echo $fetch['Serviceprovider']?>
											</td>
											<td>
												<?php echo $fetch['Closeddate']?>
											</td>
											<td>
												<?php echo $fetch['Status']?>
											</td>
											<!--  -->
											<td><a class="btn btn-info" href="TicketDetail.php?No=<?php echo $fetch['No']?>">
                           View</a> </td>
											<!--  -->
										</tr>
										<?php
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
   include "Footer.php";
   ?>
		<!-- included files -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		</body>

		</html>