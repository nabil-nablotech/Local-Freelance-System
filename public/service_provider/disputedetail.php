<?php
require "includes/service_provider-navigation.php";

?>
	<div class="container">
		<div class="row " style="margin-top: 100px;">
			<div class="col-sm-8 mx-auto">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto"> Dispute Details</h6> </div>
					<div class="card-body mx-auto">
					<form>
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Dispute ID</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['disputeDetails']['dispute_id'];?>" disabled>
								</div>
						</div>
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Dispute date</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['disputeDetails']['dispute_date'];?>" disabled>
								</div>
						</div>
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Status</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['disputeDetails']['status'];?>" disabled>
								</div>
						</div>

						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Explanation</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['disputeDetails']['explanation'];?>" disabled>
								</div>
						</div>

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     col-form-label col-form-label-sm">Project</label>
							<div class="col-sm-8">
							<textarea class="textarea form-control" rows="5" cols="45" disabled><?php echo $_SESSION['disputeDetails']['project_id'];?></textarea>
							</div>
						</div>
						
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">File</label>
								<div class="col-sm-8">
									<a href="<?php echo $_SESSION['baseurl'].$_SESSION['disputeDetails']['file'];?>" download>Download</a>
								</div>
						</div>

						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 
						col-form-label col-form-label-sm">Reviewed date</label>
								<div class="col-sm-8">
									<input type="text" class="col" value="<?php echo $_SESSION['disputeDetails']['review_date'];?>" disabled>
								</div>
						</div>

						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     		col-form-label col-form-label-sm">Decision</label>
							<div class="col-sm-8">
							<textarea class="textarea form-control" rows="5" cols="45" disabled><?php echo $_SESSION['disputeDetails']['decision'];?></textarea>
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