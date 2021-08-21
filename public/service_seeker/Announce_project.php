<?php
   require "includes/service_seeker-navigation.php";
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
								<option value="Graphics and Design">Graphics and Design</option>
								<option value="Writing & Translation">Writing & Translation</option>
								<option value="Video & Animation">Video & Animation</option>
								<option value="Data Science and Analytics">Programming & Tech</option>
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
                            <input type="file"  class="form-control btn btn-success" required  name="projectfile" id="file">
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Skills </label>
						<div class="col-sm-8">
						<select class="form-control skill-multiple" name="skill[]" multiple="multiple">
								<?php
									$skills = $serviceSeekerController->getAllSkills();
									foreach($skills as $skill){
										echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';         
									} 
								?>    
						</select>
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Budget( in ETB) </label>
						<label for="colFormLabelSm" class="col-sm-2
                  col-form-label col-form-label-sm">Minimum</label>
						<div class="col-sm-2">
							<input type="number" min=0 oninput="validity.valid||(value='')" class="form-control" name="minbudget" required> </div>
						<label for="colFormLabelSm" class="col-sm-4-offset-4 col-form-label col-form-label-sm"> Maximum </label>
						<div class="col-sm-2">
							<input type="number" min=0 oninput="validity.valid||(value='')" class="form-control" name="maxbudget" required> </div>
					</div>
					<!--  -->
				</div>
				<div class="form-group mx-auto">
					<button type="button" class="btn btn-block btn-primary"><i class="fa fa-check-circle"></i>Submit</button>
				</div>
			</div>
		</div>
	</div>

	</body>
	<script>
			$(document).ready(function() {
			$('.skill-multiple').select2({placeholder: 'Select skill',
			maximumSelectionLength: 5});
		});
	</script>

	</html>