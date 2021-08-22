<?php
   include "navigation.php";
   
   ?>
	<div class="container">
		<div class="row " style="margin-top: 100px;">
			<div class="col-sm-8 mx-auto">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Add Tickets</h6> </div>
					<div class="card-body mx-auto">
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     col-form-label col-form-label-sm">Project ID</label>
							<div class="col-sm-8">
								<select name="nationality" style="width: 100%;">
									<option value="">DI-11</option>
									<option value="eritrean">DI-12</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Explanation </label>
							<div class="col-sm-8">
								<textarea class="textarea form-control" rows="5" cols="45" placeholder="Explanation"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<div class="col-sm-4 mx-auto">
							<button class="btn btn-primary"><i class="fa fa-check-circle">submit</i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
   include "Footer.php";
   ?>
		</body>

		</html>
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