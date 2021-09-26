<?php
   require "includes/admin-navigation.php";
   $decision = "";
  
  $decisionErr = $actionErr = "";
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['review_btn'])){    
	$feedback = $adminController->validateDisputeReview($_POST);
    if($feedback['valid'] == false){
      
      // setting inserted data
      if(!empty($feedback['data']['decision'])){
        $decision = $feedback['data']['decision'];
      }


      // Setting error values
      if(!empty($feedback['error']['decision'])){
        $decisionErr = $feedback['error']['decision'];
      }

      if(!empty($feedback['error']['action'])){
        $actionErr = $feedback['error']['action'];
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

<script>
	document.title = "Admin- Review dispute";
	</script>
	<div class="container" style="margin-top: 100px;">
		<div class="col-sm-12">
			<div class="card shadow-sm mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary mx-auto">Review dispute</h6> 
				</div>
				<div class="card-body mx-auto">
				<form method="POST" >

					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Decision </label>
						<div class="col-sm-8">
                            <input type="text" name="projectid" value="<?php echo $_SESSION['projectid']?>" hidden>
                            <input type="text" name="disputeid" value="<?php echo $_SESSION['disputeid']?>" hidden>
							<textarea name="decision" id="" cols="50" rows="10" class="form-control" required></textarea>
                            <p class="errormessage"> <?php echo $decisionErr;?> </p>
                            
                        </div>
                        
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Action </label>
						<div class="col-sm-8">
                            
                            <p>
                                <input type="radio" name="action" value="0" required> Terminate project and keep service seeker's money.
                            </p>
                            <p>
                                <input type="radio" name="action" value="1"> Terminate project and release payment to service provider.
                            </p>
                            <p class="errormessage"> <?php echo $actionErr;?> </p>
                            
						</div>
					</div>
					<!--  -->
				
					<div class="form-group mx-auto">
					<button type="submit" class="btn btn-block btn-primary" name="review_btn"><i class="fa fa-check-circle"></i>Submit</button>
					</div>
					</form>
				</div>		
				
			</div>
		</div>
	</div>
	<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $_SESSION['baseurl'];?>public/assets/js/administrator/serelance-admin.js "></script>

	</body>

	</html>