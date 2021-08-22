<?php
   require "includes/service_seeker-navigation.php";
   $title = $description = $minBudget = $maxBudget = "";
  
  $titleErr = $categoryErr = $descriptionErr = $projectFileErr = $skillErr = $minMaxErr = "";
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['announce_btn'])){    
	$feedback = $serviceSeekerController->validateProjectAnnouncement($_POST,$_FILES);
    if($feedback['valid'] == false){
      
      // setting inserted data
      if(!empty($feedback['data']['title'])){
        $title = $feedback['data']['title'];
      }

      if(!empty($feedback['data']['description'])){
        $description = $feedback['data']['description'];
	  }
	  
      if(!empty($feedback['data']['minbudget'])){
        $minBudget = $feedback['data']['minbudget'];
      }

      if(!empty($feedback['data']['maxbudget'])){
        $maxBudget = $feedback['data']['maxbudget'];
      }


      // Setting error values
      if(!empty($feedback['error']['title'])){
        $titleErr = $feedback['error']['title'];
      }
      
      if(!empty($feedback['error']['category'])){
        $categoryErr = $feedback['error']['category'];
      }

      if(!empty($feedback['error']['description'])){
        $descriptionErr = $feedback['error']['description'];
      }

      if(!empty($feedback['error']['projectfile'])){
        $projectFileErr = $feedback['error']['projectfile'];
      }

      if(!empty($feedback['error']['skill'])){
        $skillErr = $feedback['error']['skill'];
      }

      if(!empty($feedback['error']['minmax'])){
        $minMaxErr = $feedback['error']['minmax'];
      }

    }
  }
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
					<h6 class="m-0 font-weight-bold text-primary mx-auto">Announce New Project</h6> 
				</div>
				<div class="card-body mx-auto">
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Project Title </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="Project Title" required name="title" value = "<?php echo $title;?>"> 
							<p class="errormessage"> <?php echo $titleErr;?> </p>
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Project Category </label>
						<div class="col-sm-8">
							<select class="custom-select" name="category" id="" required>
								<option value="">Please Select a Category</option>
								<option value="Graphics and Design">Graphics and Design</option>
								<option value="Writing and Translation">Writing and Translation</option>
								<option value="Video and Animation">Video and Animation</option>
								<option value="Programming and Tech">Programming and Tech</option>
							</select>
							<p class="errormessage"> <?php echo $categoryErr;?> </p>
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Project Description </label>
						<div class="col-sm-8">
							<textarea name="description" id="" cols="30" rows="5" class="form-control" required><?php echo $description;?></textarea>
							<p class="errormessage"> <?php echo $descriptionErr;?> </p>
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> File Attachment </label>
						<div class="col-sm-8">
                            <input type="file"  class="form-control btn btn-success" name="projectfile" id="file">
							<p class="errormessage"> <?php echo $projectFileErr;?> </p>
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
						<p class="errormessage"> <?php echo $skillErr;?> </p>
						</div>
					</div>
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Budget( in ETB) </label>
						<label for="colFormLabelSm" class="col-sm-2
                  col-form-label col-form-label-sm">Minimum</label>
						<div class="col-sm-2">
							<input type="number" min=0 oninput="validity.valid||(value='')" class="form-control" name="minbudget" required value = "<?php echo $minBudget;?>"> </div>
						<label for="colFormLabelSm" class="col-sm-4-offset-4 col-form-label col-form-label-sm"> Maximum </label>
						<div class="col-sm-2">
							<input type="number" min=0 oninput="validity.valid||(value='')" class="form-control" name="maxbudget" required value = "<?php echo $maxBudget;?>"> </div>
					</div>
					<p class="errormessage"> <?php echo $minMaxErr;?> </p>
					<input type="text" name="offertype" value = "Announcement" hidden> 
					<div class="form-group mx-auto">
					<button type="submit" class="btn btn-block btn-primary" name="announce_btn"><i class="fa fa-check-circle"></i>Submit</button>
					</div>
					</form>
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