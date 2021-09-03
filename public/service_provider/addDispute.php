<?php
   require "includes/service_provider-navigation.php";
   $explanation  = "";
  
  $projectIdErr = $explanationErr = $disputeFileErr = "";
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['newdispute_btn'])){    
	$feedback = $serviceProviderController->validateNewDispute($_POST,$_FILES);
    if($feedback['valid'] == false){
      
      // setting inserted data
      if(!empty($feedback['data']['explanation'])){
        $explanation = $feedback['data']['explanation'];
      }

  

      // Setting error values
      if(!empty($feedback['error']['explanation'])){
        $explanationErr = $feedback['error']['explanation'];
      }
      
      if(!empty($feedback['error']['projectid'])){
        $projectIdErr = $feedback['error']['projectid'];
      }

      if(!empty($feedback['error']['disputefile'])){
        $disputeFileErr = $feedback['error']['disputefile'];
      }

    }
  }
   
   ?>
	<div class="container">
		<div class="row " style="margin-top: 100px;">
			<div class="col-sm-8 mx-auto">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">New Dispute</h6> </div>
					<div class="card-body mx-auto">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     col-form-label col-form-label-sm">Project</label>
							<div class="col-sm-8">
							<select class="form-control" name="projectid" >
								<option value="">Please select</option>
								<?php
									foreach($serviceProviderController->getAllOngoingProjects($_SESSION['username']) as $project){
										echo '<option value="'.$project['project_id'].'">'.$project['project_id'] . " : " .$project['title'].'</option>';
									} 
								?>
							</select>
							<p class="errormessage"> <?php echo $projectIdErr;?> </p>
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     col-form-label col-form-label-sm">Explanation</label>
							<div class="col-sm-8">
							<textarea class="textarea form-control" rows="5" cols="45" placeholder="Explanation" name="explanation"><?php echo $explanation;?></textarea>
								<p class="errormessage"> <?php echo $explanationErr?> </p>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     			col-form-label col-form-label-sm">File attachment</label>
							<div class="col-sm-8">
								<input type="file" class="col" name="disputefile" >
								<p class="errormessage"> <?php echo $disputeFileErr;?> </p>
							</div>
						</div>
						<div class="form-group ">
							<div class="col-sm-4 mx-auto">
								<button class="btn btn-primary" type="submit" name="newdispute_btn"><i class="fa fa-check-circle">submit</i></button>
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

