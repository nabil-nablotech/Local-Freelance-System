
<html>
	<head>
		<title>Service seeker- Change password</title>
		<style> 	
			body {
				background-color: #f0f5f7 !important;
			}
		</style>
	</head>
	<body>
	<?php
    require "includes/service_seeker-navigation.php";

    $oldPasswordErr = $newPasswordErr = $confirmPasswordErr  = "";
  
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_btn'])){     
      $feedback = $serviceSeekerController->validatePasswordChange($_POST);
      if($feedback['valid'] == false){
        
        // Setting error values
        if(!empty($feedback['error']['oldpassword'])){
          $oldPasswordErr = $feedback['error']['oldpassword'];
        }
        
        if(!empty($feedback['error']['newpassword'])){
          $newPasswordErr = $feedback['error']['newpassword'];
        }
  
        if(!empty($feedback['error']['confirmpassword'])){
          $confirmPasswordErr = $feedback['error']['confirmpassword'];
        }
      }
    }

    ?>
	<div class="container" style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-9 mx-auto ">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Change password</h6> </div>
					<div class="card-body ml-5 ">
                        <!--  -->
                        <form method="POST">
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Old password</label>
							<div class="col-sm-5">
								<input name="oldpassword" type="password" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Old password" required > 
								<p class="errormessage"> <?php echo $oldPasswordErr;?> </p>
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">New password</label>
							<div class="col-sm-5">
								<input name="newpassword" type="password" class="form-control form-control-sm" id="colFormLabelSm" placeholder="New password" required>
								<p class="errormessage"> <?php echo $newPasswordErr;?> </p> 
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Confirm new password</label>
							<div class="col-sm-5">
								<input name="confirmpassword" type="password" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Confirm new password" required> 
								<p class="errormessage"> <?php echo $confirmPasswordErr;?> </p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 offset-2">
							<button name="change_btn" class="btn bnt-sm btn-primary" type="submit"><i class="fa fa-pencil-square" aria-hidden="true"></i>Change</button>
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