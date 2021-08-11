<?php
   include "navigation.php";
   ?>
	<style>
	.col-form-label-sm {
		padding-top: calc(.25rem + 1px);
		padding-bottom: calc(.25rem + 1px);
		font-size: .875rem;
		line-height: 1.5;
		color: black;
		font-weight: bolder;
	}
	</style>
	<div class="container" style="margin-top: 100px;">
		<div class="col-sm-12">
			<div class="card shadow-sm mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary mx-auto">Announce New Project</h6> </div>
				<div class="card-body mx-auto">
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Project Title </label>
						<div class="col-sm-8">
							<input type="text" class=" form-control" placeholder="Project Title" required> </div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label 
                  col-form-label-sm">Project Category </label>
						<div class="col-sm-8">
							<select class="custom-select" name="select1" id="" required>
								<option value="">Please Select a Category</option>
								<option value="Accounting & Consulting">Accounting & Consulting</option>
								<option value="Admin Support">Admin Support</option>
								<option value="Customer Service">Customer Service</option>
								<option value="Data Science and Analytics">Data Science and Analytics</option>
								<option value="Design & Creative">Design & Creative</option>
								<option value="Engineering & Architecture">Engineering & Architecture</option>
								<option value="IT & Networking">IT & Networking</option>
								<option value="Legal">Legal</option>
								<option value="Sales & Marketing">Sales & Marketing</option>
								<option value="Transiation">Transiation</option>
								<option value="Web & Mobile Development">Web & Mobile Development</option>
								<option value="Writing">Writing</option>
							</select>
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Project Description </label>
						<div class="col-sm-8">
							<textarea name="job_description" id="" cols="30" rows="5" class="form-control" required></textarea>
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> File Attachment </label>
						<div class="col-sm-8">
                            <input type="file"  class="form-control btn btn-success" required  name="file[]" id="file" multiple>
							</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Skills </label>
						<div class="col-sm-8">
							<select class="custom-select" name="select1" id="" required>
								<option value=""> Select skills needed</option>
								<option value="Accounting & Consulting">Accounting & Consulting</option>
								<option value="Admin Support">Admin Support</option>
								<option value="Customer Service">Customer Service</option>
								<option value="Data Science and Analytics">Data Science and Analytics</option>
								<option value="Design & Creative">Design & Creative</option>
								<option value="Engineering & Architecture">Engineering & Architecture</option>
								<option value="IT & Networking">IT & Networking</option>
								<option value="Legal">Legal</option>
								<option value="Sales & Marketing">Sales & Marketing</option>
								<option value="Transiation">Transiation</option>
								<option value="Web & Mobile Development">Web & Mobile Development</option>
								<option value="Writing">Writing</option>
							</select>
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Budget </label>
						<label for="colFormLabelSm" class="col-sm-2
                  col-form-label col-form-label-sm">Minimum</label>
						<div class="col-sm-2">
							<input type="number" min=0 oninput="validity.valid||(value='')" class="form-control" name="minimum_budget" required> </div>
						<label for="colFormLabelSm" class="col-sm-4-offset-4 col-form-label col-form-label-sm"> Maximum </label>
						<div class="col-sm-2">
							<input type="number" min=0 oninput="validity.valid||(value='')" class="form-control" name="minimum_budget" required> </div>
					</div>
					<!--  -->
				</div>
				<div class="form-group mx-auto">
					<button type="button" class="btn btn-block btn-primary"><i class="fa fa-check-circle"></i>Submit</button>
				</div>
			</div>
		</div>
	</div>
	<!--  -->
	<!-- included files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	</body>

	</html>