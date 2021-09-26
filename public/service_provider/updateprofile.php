<?php
   require "includes/service_provider-navigation.php";
   if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_btn'])){     
		$serviceProviderController->validateUpdateProfile($_POST,$_FILES);
   }
   
   ?>
	<!doctype html>
	<html>

	<head>
	<title>Service provider - Update profile</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="<?php echo $_SESSION['baseurl'];?>app/vendor/tagger-master/tagger.css" rel="stylesheet">
    <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/tagger-master/tagger.js"></script> </head>

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
									<input type="text" name="firstname" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $providerDetail['firstname'];?>"> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm" >Last Name</label>
								<div class="col-sm-7">
									<input type="text" name="lastname" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $providerDetail['lastname'];?>"> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
								<div class="col-sm-7">
									<input type="email" name="email" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $providerDetail['email'];?>" disabled> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
								<div class="col-sm-7">
									<input type="text" name="username" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $providerDetail['username'];?>" disabled> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Mobile Number</label>
								<div class="col-sm-7">
									<input type="text" name="mobilenumber" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $providerDetail['mobilenumber'];?>" disabled> </div>
							</div>
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nationality</label>
								<div class="col-sm-7">
									<select name="nationality" style="width: 100%;">
									<option value="">Please select</option>
										<?php
										foreach($serviceProviderController->getAllCountries() as $country){
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
										<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" <?php if($providerDetail['gender']=='M'){echo 'checked';}?> disabled>
										<label class="form-check-label" for="inlineRadio1">Male</label>
									</div>
									<div class="form-check form-check-inline ml-5">
										<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" <?php if($providerDetail['gender']=='F'){echo 'checked';}?> disabled>
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
								<div class="input-group"> <img src="<?php echo $_SESSION['baseurl'];?><?php echo $providerDetail['profilephoto'];?>"  id="profiledisplay" class="img-rounded" alt="No photo to view" width="200" height="200"> </div>
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
							<div class="col-sm-6 col-sm-10 mx-auto">
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Country</label>
									<div class="col-sm-7">
									<select name="country" style="width: 100%;">
										<option value="">Please select</option>
											<?php
											foreach($serviceProviderController->getAllCountries() as $country){
												echo '<option value="'.$country.'">'.$country.'</option>';
											} 
											?>
      								</select>
									</div>
								</div>
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">City</label>
									<div class="col-sm-7">
										<input type="text" name="city" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $providerDetail['city'];?>"> </div>
								</div>
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Address</label>
									<div class="col-sm-7">
										<input type="text" name="address" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $providerDetail['address'];?>"> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--  -->

                <!-- address information -->
				<h4 class="text-center mt-3"> Qualification details</h4>
				<div class="container mt-3">
					<div class="card text-center">
						<div class="row mt-3">
							<div class="col-sm-10 mx-auto">
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Educational level</label>
									<div class="col-sm-7">
                                    <select class="form-control"  name="education">
                                        <option value="">Please select</option>
                                        <option value="Primary school">Primary school</option>
                                        <option value="High school">High school</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Bachelor degree">Bachelor degree</option>
                                        <option value="Masters degree">Masters degree</option>
                                        <option value="Doctrate degree">Doctrate degree</option>
                                    </select>
									</div>
								</div>
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Language</label>
									<div class="col-sm-7">
                                    <select class="form-control language-multiple" name="language[]" multiple="multiple">
                                        <?php
                                            foreach($serviceProviderController->getAllLanguages() as $language){
                                                echo '<option value="'.$language['language_id'].'">'.$language['language_name'].'</option>';
                                            } 
                                        ?>
                                    </select>
								    </div>
                                </div>
								<div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Skill</label>
									<div class="col-sm-7">
                                    <select class="form-control skill-multiple" name="skill[]" multiple="multiple">
                                        <?php $skills = $serviceProviderController->getAllSkills(); ?>
                                        <optgroup label="Graphics and Design">
                                            <?php
                                                foreach($skills as $skill){
                                                    if($skill['skill_category'] === 'Graphics and Design'){
                                                    echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';
                                                    }                
                                                } 
                                            ?>
                                        </optgroup>
                                        <optgroup label="Writing and Translation">
                                            <?php
                                                foreach($skills as $skill){
                                                    if($skill['skill_category'] === 'Writing and Translation'){
                                                    echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';
                                                    }                
                                                } 
                                            ?>
                                        </optgroup> 
                                        <optgroup label="Video and Animation">
                                            <?php
                                                foreach($skills as $skill){
                                                    if($skill['skill_category'] === 'Video and Animation'){
                                                    echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';
                                                    }                
                                                } 
                                            ?>
                                        </optgroup> 
                                        <optgroup label="Programming and Tech">
                                            <?php
                                                foreach($skills as $skill){
                                                    if($skill['skill_category'] === 'Programming and Tech'){
                                                    echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';
                                                    }                
                                                } 
                                            ?>
                                        </optgroup>       
                                    </select> 
                                    </div>
								</div>
                                <div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Experience</label>
									<div class="col-sm-7">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="experience" id="inlineRadio1" value="Beginner" <?php if($providerDetail['experience']=='Beginner'){echo 'checked';}?>>
                                            <label class="form-check-label" for="inlineRadio1">Beginner(< 1Yr) </label>
                                        </div>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="experience" id="inlineRadio2" value="Medium" <?php if($providerDetail['experience']=='Medium'){echo 'checked';}?>>
                                            <label class="form-check-label" for="inlineRadio2">Medium(3-5)yrs</label>
                                        </div>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="experience" id="inlineRadio2" value="Advanced" <?php if($providerDetail['experience']=='Advanced'){echo 'checked';}?>>
                                            <label class="form-check-label" for="inlineRadio2">Advanced(>5)yrs</label>
                                        </div>
                                    </div>
								</div>

                                <div class="form-group row ">
									<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Portfolio</label>
									<div class="col-sm-7">
                                    <input class="form-control" name="portfolio" type="text">
                                    </div>
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
							<div class="col-sm-10 mx-auto">
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
									<label for="colFormLabelSm " class="col-form-label col-form-label-sm">Account Number</label>
									<div class="col-sm-7">
										<input type="text" class="form-control form-control-sm " id="colFormLabelSm" value="<?php echo $providerDetail['accountnumber'];?>"> 
                                    </div>
								</div>
                                <div class="form-group row">
									<label for="colFormLabelSm " class=" col-form-label col-form-label-sm">Summary</label>
                                        <div class="col-sm-7">
                                            <textarea class="multisteps-form__textarea form-control ml-5" rows="5" cols="45" placeholder="Summary" name="summary"> <?php echo $providerDetail['summary'];?> </textarea>
                                        </div>
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

            $(document).ready(function() {
            $('.language-multiple').select2({placeholder: 'Select language',
            maximumSelectionLength: 5});
            });

            $(document).ready(function() {
                $('.skill-multiple').select2({placeholder: 'Select skill',
                maximumSelectionLength: 5});
            });

            document.querySelector("[name ='nationality']").value = '<?php echo $providerDetail['nationality'];?>';
			document.querySelector("[name ='country']").value = '<?php echo $providerDetail['country'];?>';
			document.querySelector("[name ='bankname']").value = '<?php echo $providerDetail['bankname'];?>';
			document.querySelector("[name ='education']").value = '<?php echo $providerDetail['education'];?>';

            var element = document.querySelector("[name ='language[]']");
            <?php foreach($providerDetail['language'] as $language){ ?>
            for (var i = 0; i < element.options.length; i++) {
                if(element.options[i].value == <?php echo $language['language_id']?>){
                    element.options[i].selected = true;
                }
            }
            <?php } ?>// This is a closing for the previously declared foreach loop

            element = document.querySelector("[name ='skill[]']");
            <?php  foreach($providerDetail['skill'] as $skill){ ?>
            for (var i = 0; i < element.options.length; i++) {
                if(element.options[i].value == <?php echo $skill['skill_id']?>){
                    element.options[i].selected = true;
                }
            }
            <?php } ?>// This is a closing for the previously declared foreach loop

            element = document.querySelector("[name ='portfolio']");
            <?php  foreach($providerDetail['portfolio'] as $portfolio){ ?>
            element.value += '<?php echo $portfolio['portfolio_url']?>,';                    
            <?php } ?>// This is a closing for the previously declared foreach loop
            element.value = element.value.substr(0,(element.value.length-1));
                
            // Tagger for portfolio
            tagger(document.querySelector('[name="portfolio"]'),{wrap: true ,allow_spaces: false, tag_limit: 10, link: function(name){return false}});
			
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