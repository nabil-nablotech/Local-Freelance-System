<?php
   require_once "navigation.php";
   require_once "../Database/db.php";
     
     ?>
	<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap CSS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- Datatable JS -->
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script>
	document.title = "Service seeker-Transaction history";
	</script>
	</head>
	<div class="container " style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 ">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Transaction History</h6> </div>
					<div class="card-body">
						<!-- claim fund -->
						<div class="form-group row  mt-2">
							<div class="form-inline" style=" border-style:outset;">
								<div class="col-sm-2">
									<label for="colFormLabelSm " class="col-form-label col-form-label-sm" style="font-weight: bolder;">Wallet Balance</label>
								</div>
								<div class="col-sm-5"> <span style="font-style:italic;font-weight:bolder;"> ETB 150.00 </span> </div>
								<div class="col-sm-5">
									<button type="submit" class="btn btn-sm btn-success">Claim Fund</button>
								</div>
							</div>
						</div>
						<!--  -->
						<div class="table table-responsive">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th> Id</th>
										<th> Details</th>
										<th> Date</th>
										<th>Amount</th>
										<th>Balance</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php
                        $query = $con->query("SELECT * FROM transaction") or die(mysqli_error($con));
                        while ($fetch = $query->fetch_array()) {
                            ?>
										<tr>
											<td>
												<?php echo $fetch['No']?>
											</td>
											<td>
												<?php echo $fetch['Tid']?>
											</td>
											<td>
												<?php echo $fetch['Tdetails']?>
											</td>
											<td>
												<?php echo $fetch['Tdate']?>
											</td>
											<td>
												<?php echo $fetch['Amount']?>
											</td>
											<td>
												<?php echo $fetch['Balance']?>
											</td>
											<td>
												<a class="btn btn-warning" href="edit_room.php?room_id=<?php echo $fetch['room_id']?>"> <i class="fa fa-edit"></i> </a>
											</td>
											<td> <a class="btn btn-danger" onclick="confirmationDelete(this); return false;" href="delete_room.php?room_id=<?php echo $fetch['room_id']?>"><i class =
                              "fa fa-trash"></i></a> </td>
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
	<!--  -->
	<script type="text/javascript">
	$(document).ready(function() {
		$("#table").DataTable();
	});
	</script>
	<?php
   include "../ServiceSeeker/Footer.php";
   ?>
		<!-- included files -->
		<!-- Latest compiled JavaScript -->
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		</body>

		</html>