<?php
   require "includes/service_seeker-navigation.php";
   if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_btn'])){     
		$serviceSeekerController->validateUpdateProfile($_POST,$_FILES);
   }
   
   ?>
	<!doctype html>
	<html>

	<head> </head>

	<body>
		<div class="container  " style="margin-top: 100px;">
			<div class="card shadow-sm mb-4">
			<form method="POST" enctype="multipart/form-data">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary mx-auto">Update Profile</h6> </div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
								<div class="col-sm-7">
									<input type="text" name="firstname" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $seekerDetail['firstname'];?>"> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm" >Last Name</label>
								<div class="col-sm-7">
									<input type="text" name="lastname" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $seekerDetail['lastname'];?>"> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
								<div class="col-sm-7">
									<input type="email" name="email" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $seekerDetail['email'];?>" disabled> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
								<div class="col-sm-7">
									<input type="text" name="username" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $seekerDetail['username'];?>" disabled> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Mobile Number</label>
								<div class="col-sm-7">
									<input type="text" name="mobilenumber" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $seekerDetail['mobilenumber'];?>" disabled> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nationality</label>
								<div class="col-sm-7">
									<select name="nationality" style="width: 100%;">
									<option value="">Please select</option>
										<?php
										foreach($serviceSeekerController->getAllCountries() as $country){
											echo '<option value="'.$country.'">'.$country.'</option>';
										} 
										?>
      								</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Gender</label>
								<!--  -->
								<div class="col-sm-7">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" <?php if($seekerDetail['gender']=='M'){echo 'checked';}?> disabled>
										<label class="form-check-label" for="inlineRadio1">Male</label>
									</div>
									<div class="form-check form-check-inline ml-5">
										<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" <?php if($seekerDetail['gender']=='F'){echo 'checked';}?> disabled>
										<label class="form-check-label" for="inlineRadio2">Female</label>
									</div>
								</div>
								<!--  -->
							</div>
						</div>
						<!-- next column  -->
						<div class="col-sm-3 ">
							<div class="form-group text-center mr-5">
								<label class="control-label">Photo Preview</label>
								<div class="input-group"> <img src="http://localhost/seralance/<?php echo $seekerDetail['profilephoto'];?>"  id="profiledisplay" class="img-rounded" alt="No photo to view" width="200" height="200"> </div>
								<input class="input-large" id="profilephoto" onchange="displayPhoto(this);" type="file" name="profilephoto" hidden>
								<button class="btn btn-success" type ="button"onclick="uploadPhoto();">upload photo</button>
							</div>
						</div>
					</div>
				</div>
				<!-- address information -->
				<h4 class="text-center mt-3"> Address Information</h4>
				<div class="container mt-3">
					<div class="card text-center">
						<div class="row mt-3">
							<div class="col-sm-6 mx-auto">
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Country</label>
									<div class="col-sm-7">
									<select name="country" style="width: 100%;">
										<option value="">Please select</option>
											<?php
											foreach($serviceSeekerController->getAllCountries() as $country){
												echo '<option value="'.$country.'">'.$country.'</option>';
											} 
											?>
      								</select>
									</div>
								</div>
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">City</label>
									<div class="col-sm-7">
										<input type="text" name="city" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $seekerDetail['city'];?>"> </div>
								</div>
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Address</label>
									<div class="col-sm-7">
										<input type="text" name="address" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $seekerDetail['address'];?>"> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--  -->
				<h4 class="text-center mt-3"> Bank Information</h4>
				<div class="container mt-3">
					<div class="card text-center">
						<div class="row mt-3">
							<div class="col-sm-7 mx-auto">
								<div class="form-group row ">
									<label for="mob">Bank Name</label>
									<div class="col-sm-7">
									<select class="form-control" name="bankname" style="margin-left: 50px;">
										<option value="">Please select</option>
										<option value="CBE">CBE</option>
										<option value="Abyssinia">Abyssinia</option>
										<option value="Awash">Awash</option>
										<option value="Dashen">Dashen</option>
										<option value="Nib">Nib</option>
										<option value="Abay">Abay</option>
										<option value="United">United</option>
									</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="colFormLabelSm " class=" col-form-label col-form-label-sm">Account Number</label>
									<div class="col-sm-7">
										<input type="text" class="form-control form-control-sm ml-5" id="colFormLabelSm" value="<?php echo $seekerDetail['accountnumber'];?>"> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group text-center">
					<button class="btn btn-primary mt-3" type="submit" name="update_btn"><i class="fa fa-pencil-square" aria-hidden="true"></i>Update</button>
				</div>
				<!--  -->
				</form>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		<?php
			require "includes/service_seeker-footer.php";
		?>
		<script>
			document.querySelector("[name ='nationality']").value = '<?php echo $seekerDetail['nationality'];?>';
			document.querySelector("[name ='country']").value = '<?php echo $seekerDetail['country'];?>';
			document.querySelector("[name ='bankname']").value = '<?php echo $seekerDetail['bankname'];?>';			

			function displayPhoto(event){
					profileDisplay = document.getElementById('profiledisplay');
					profileDisplay.setAttribute('src', URL.createObjectURL(event.files[0]));
					profileDisplay.onload = function() {
					URL.revokeObjectURL(profileDisplay.src); // free memory
				} 
			}

			function uploadPhoto(){
				document.getElementById('profilephoto').click();
			} 
			
		</script>

	</body>

	</html>