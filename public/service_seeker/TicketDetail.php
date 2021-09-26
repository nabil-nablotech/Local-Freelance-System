<?php
require "includes/service_seeker-navigation.php";

?>
	<div class="container">
		<div class="row " style="margin-top: 100px;">
			<div class="col-sm-8 mx-auto">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto"> Tickets Details</h6> </div>
					<div class="card-body mx-auto">
					<form>
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Ticket ID</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['ticketDetails']['ticket_id'];?>" disabled>
								</div>
						</div>
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Opened date</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['ticketDetails']['opened_date'];?>" disabled>
								</div>
						</div>
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Status</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['ticketDetails']['status'];?>" disabled>
								</div>
						</div>

						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Subject</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['ticketDetails']['subject'];?>" disabled>
								</div>
						</div>

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     col-form-label col-form-label-sm">Message</label>
							<div class="col-sm-8">
							<textarea class="textarea form-control" rows="5" cols="45" disabled><?php echo $_SESSION['ticketDetails']['message'];?></textarea>
							</div>
						</div>
						
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">File</label>
								<div class="col-sm-8">
									<a href="<?php echo $_SESSION['baseurl'].$_SESSION['ticketDetails']['file'];?>" download>Download</a>
								</div>
						</div>

						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Closed date</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['ticketDetails']['closed_date'];?>" disabled>
								</div>
						</div>

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     		col-form-label col-form-label-sm">Reply</label>
							<div class="col-sm-8">
							<textarea class="textarea form-control" rows="5" cols="45" disabled><?php echo $_SESSION['ticketDetails']['reply'];?></textarea>
							</div>
						</div>
					 </form>
					 </div>
				</div>
			</div>
		</div>
	</div>
	<?php
require "includes/service_seeker-footer.php";
?>

		</body>

		</html>