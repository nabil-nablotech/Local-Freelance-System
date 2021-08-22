<?php
   require_once "navigation.php";
   require_once "../Database/db.php";
     
     ?>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Datatable CSS -->
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
		document.title = "Service seeker-Terminated projects";
		</script>
	</head>
	<div class="container " style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 ">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Terminated Project</h6> </div>
					<div class="card-body mx-auto">
						<!--  -->
						<div class="table table-responsive mt-5">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Project Id</th>
										<th>Project Title</th>
										<th> Service provider</th>
										<th>Offer date</th>
										<th>Start Date</th>
										<th>Cancelled Date</th>
										<th>Price </th>
										<th>Reason</th>
										<th>view datails</th>
									</tr>
								</thead>
								<tbody>
									<?php
                        $query = $con->query("SELECT * FROM terminatedproject") or die(mysqli_error($con));
                        while ($fetch = $query->fetch_array()) {
                            ?>
										<tr>
											<td>
												<?php echo $fetch['No']?>
											</td>
											<td>
												<?php echo $fetch['pid']?>
											</td>
											<td>
												<?php echo $fetch['ptitle']?>
											</td>
											<td>
												<?php echo $fetch['sp']?>
											</td>
											<td>
												<?php echo $fetch['odate']?>
											</td>
											<td>
												<?php echo $fetch['cdate']?>
											</td>
											<td>
												<?php echo $fetch['cancelleddate']?>
											</td>
											<td>
												<?php echo $fetch['price']?>
											</td>
											<td>
												<?php echo $fetch['reason']?>
											</td>
											<!--  -->
											<td><a class="btn btn-primary" href="edit_room.php?room_id=<?php echo $fetch['room_id']?>">
                           details</a> </td>
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
   include "../ServiceSeeker/Footer.php";
   ?>