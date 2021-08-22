<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href="../../assets/css/guest/signup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="http://localhost/seralance/app/vendor/tagger-master/tagger.css" rel="stylesheet">
    <script src="http://localhost/seralance/app/vendor/tagger-master/tagger.js"></script>
    <style>
      #profiledisplay{
        border-radius: 50%;
      }

      .errormessage {
        color: red;
        font-size: 10px;
      }
    </style>
</head>

<body>
  
<?php  
  require_once('../app/controllers/main.php');
  $mainController = new Controller\Main();
  $firstName = $lastName = $email = $username = $mobileNumber = $city = $address = $accountNumber = $summary = "";
  
  $firstNameErr = $lastNameErr = $emailErr = $usernameErr = $passwordErr = $mobileNumberErr = $nationalityErr = $genderErr = $profilePhotoErr 
  = $countryErr = $cityErr = $addressErr = $educationErr = $languageErr = $skillErr = $experienceErr = $portfolioErr 
  = $bankNameErr = $accountNumberErr = $summaryErr = "";

  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['signup_btn'])){     
    $feedback = $mainController->validateSpSignup($_POST,$_FILES);
    if($feedback['valid'] == false){
      
      // setting inserted data
      if(!empty($feedback['data']['firstname'])){
        $firstName = $feedback['data']['firstname'];
      }
      
      if(!empty($feedback['data']['lastname'])){
        $lastName = $feedback['data']['lastname'];
      }

      if(!empty($feedback['data']['email'])){
        $email = $feedback['data']['email'];
      }

      if(!empty($feedback['data']['username'])){
        $username = $feedback['data']['username'];
      }

      if(!empty($feedback['data']['mobilenumber'])){
        $mobileNumber = $feedback['data']['mobilenumber'];
      }

      if(!empty($feedback['data']['city'])){
        $city = $feedback['data']['city'];
      }

      if(!empty($feedback['data']['address'])){
        $address = $feedback['data']['address'];
      }

      if(!empty($feedback['data']['accountnumber'])){
        $accountNumber = $feedback['data']['accountnumber'];
      }

      if(!empty($feedback['data']['summary'])){
        $summary = $feedback['data']['summary'];
      }


      // Setting error values
      if(!empty($feedback['error']['firstname'])){
        $firstNameErr = $feedback['error']['firstname'];
      }
      
      if(!empty($feedback['error']['lastname'])){
        $lastNameErr = $feedback['error']['lastname'];
      }

      if(!empty($feedback['error']['email'])){
        $emailErr = $feedback['error']['email'];
      }

      if(!empty($feedback['error']['username'])){
        $usernameErr = $feedback['error']['username'];
      }

      if(!empty($feedback['error']['password'])){
        $passwordErr = $feedback['error']['password'];
      }

      if(!empty($feedback['error']['mobilenumber'])){
        $mobileNumberErr = $feedback['error']['mobilenumber'];
      }

      if(!empty($feedback['error']['nationality'])){
        $nationalityErr = $feedback['error']['nationality'];
      }

      if(!empty($feedback['error']['gender'])){
        $genderErr = $feedback['error']['gender'];
      }

      if(!empty($feedback['error']['profilephoto'])){
        $profilePhotoErr = $feedback['error']['profilephoto'];
      }

      if(!empty($feedback['error']['country'])){
        $countryErr = $feedback['error']['country'];
      }

      if(!empty($feedback['error']['city'])){
        $cityErr = $feedback['error']['city'];
      }

      if(!empty($feedback['error']['address'])){
        $addressErr = $feedback['error']['address'];
      }

      if(!empty($feedback['error']['education'])){
        $educationErr = $feedback['error']['education'];
      }

      if(!empty($feedback['error']['language'])){
        $languageErr = $feedback['error']['language'];
      }

      if(!empty($feedback['error']['skill'])){
        $skillErr = $feedback['error']['skill'];
      }

      if(!empty($feedback['error']['experience'])){
        $experienceErr = $feedback['error']['experience'];
      }

      if(!empty($feedback['error']['portfolio'])){
        $portfolioErr = $feedback['error']['portfolio'];
      }

      if(!empty($feedback['error']['bankname'])){
        $bankNameErr = $feedback['error']['bankname'];
      }

      if(!empty($feedback['error']['accountnumber'])){
        $accountNumberErr = $feedback['error']['accountnumber'];
      }

      if(!empty($feedback['error']['summary'])){
        $summaryErr = $feedback['error']['summary'];
      }

    }
  }
?>
<header class="header">
  <h4 class="header__title " > Register As service provider </h4>
</header>

<div class="content">
  <div class="content__inner">
  <!--   <div class="container">
      <h2 class="content__title">Click on steps or 'Prev' and 'Next' buttons</h2>
    </div> -->
    <div class="container overflow-hidden">
      <div class="multisteps-form">
        <div class="row">
          <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Personal details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Address">Address details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Order Info">Qualification Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Message">Bank Details        </button>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-8 m-auto">
            <form class="multisteps-form__form" method="POST" enctype="multipart/form-data">
              <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Personal details</h3>
                <div class="multisteps-form__content">
              <!--  -->
              <div class="row">
    <div class ="col-md-9">
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="first name" name="firstname" value = "<?php echo $firstName;?>">
      <p class="errormessage"> <?php echo $firstNameErr;?> </p>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Last Name</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="last name" name="lastname" value = "<?php echo $lastName;?>">
      <p class="errormessage"> <?php echo $lastNameErr ;?> </p>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Email" name="email" value = "<?php echo $email;?>">
      <p class="errormessage"> <?php echo $emailErr ;?> </p>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="username" name="username" value = "<?php echo $username;?>">
      <p class="errormessage"> <?php echo $usernameErr;?> </p>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control form-control-sm" id="colFormLabelSm" placeholder="password" name="password">
      <p class="errormessage"> <?php echo $passwordErr;?> </p>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Mobile Number</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="phone No" name="mobilenumber" value = "<?php echo $mobileNumber;?>">
      <p class="errormessage"> <?php echo $mobileNumberErr;?> </p>
    </div>  
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nationality</label>
    <div class="col-sm-7">
      <select name="nationality" style="width: 100%;">
        <option value="">Please select</option>
        <?php
          foreach($mainController->getAllCountries() as $country){
            echo '<option value="'.$country.'">'.$country.'</option>';
          } 
        ?>
      </select>
      <p class="errormessage"> <?php echo $nationalityErr;?> </p>     
    </div>  
  </div>
     
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Gender</label>
    <!--  -->
    <div class="col-sm-7">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">
        <label class="form-check-label" for="inlineRadio1">Male</label>
      </div>
      <div class="form-check form-check-inline ml-5">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" >
        <label class="form-check-label" for="inlineRadio2">Female</label>
      </div>
    </div>
    <p class="errormessage"> <?php echo $genderErr;?> </p>
    <!--  -->
  </div>
    </div>
    <div class="col-sm-3">
  <!--  -->
  <div class="form-group" style="margin-left: -100px;">
                            <label class="control-label">Photo Preview</label>
                            <div class="input-group">
                                <img src="../../assets/images/profile.jpg" id="profiledisplay" class="img-rounded" alt="No photo to view" width="200" height="200">
                            </div>
                        </div>

                            <div class="form-group" style="margin-left: -100px;">
                                <label class="control-label">
                                    <span style="font-weight: normal;"><em>Allowed Image Formats (JPEG,PNG,GIF,JPG) (Passport size)</em></span></label>
                                <div class="input-group">
                                    <input class="input-large" id="profilephoto" onchange="displayPhoto(this);" type="file" name="profilephoto"/>                                    
                                </div>
                                <p class="errormessage"> <?php echo $profilePhotoErr;?> </p>
                            </div>  <!--  -->
    </div>
  </div>

              <!--  -->
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>

              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Your Address</h3>
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <div class="col">
                    <select name="country" style="width: 100%;">
                      <option value="">Country</option>
                      <?php
                        foreach($mainController->getAllCountries() as $country){
                          echo '<option value="'.$country.'">'.$country.'</option>';
                        } 
                      ?>
                    </select>
                    <p class="errormessage"> <?php echo $countryErr;?> </p>  
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col">
                      <input class="multisteps-form__input form-control" type="text" placeholder="City" name="city" value = "<?php echo $city;?>">
                      <p class="errormessage"> <?php echo $cityErr;?> </p>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Address" name="address" value = "<?php echo $address;?>">
                      <p class="errormessage"> <?php echo $addressErr;?> </p>
                    </div>

                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              

              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Qualification details</h3>
                <div class="multisteps-form__content">
                    <!--  -->
    <div class="form-group row">
    <label for="mob">Educational Level</label>
    <div class="col-sm-7">
     <select class="form-control" id="sel1" name="education">
        <option value="">Please select</option>
        <option value="Primary school">Primary school</option>
        <option value="High school">High school</option>
        <option value="Diploma">Diploma</option>
        <option value="Bachelor degree">Bachelor degree</option>
        <option value="Masters degree">Masters degree</option>
        <option value="Doctrate degree">Doctrate degree</option>
      </select>
      <p class="errormessage"> <?php echo $educationErr;?> </p>
    </div>
    </div>
    <!--  -->
    <div class="form-group row" >
    <label for="mob">Langauge</label>
    <div class="col-sm-7" style="margin-left: 60px;">
    <select class="form-control language-multiple" name="language[]" multiple="multiple">
      <?php
          foreach($mainController->getAllLanguages() as $language){
            echo '<option value="'.$language['language_id'].'">'.$language['language_name'].'</option>';
          } 
      ?>
    </select>
    <p class="errormessage"> <?php echo $languageErr;?> </p> 
    </div>
    </div>
    <!--  -->
    <div class="form-group row" >
    <label for="mob">Skill</label>
    <div class="col-sm-7" style="margin-left: 120px;">
    <select class="form-control skill-multiple" name="skill[]" multiple="multiple">
      <?php $skills = $mainController->getAllSkills(); ?>
      <optgroup label="Graphics and Design">
        <?php
              foreach($skills as $skill){
                if($skill['skill_category'] === 'Graphics and Design'){
                  echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';
                }                
              } 
        ?>
      </optgroup>
      <optgroup label="Writing & Translation">
        <?php
              foreach($skills as $skill){
                if($skill['skill_category'] === 'Writing & Translation'){
                  echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';
                }                
              } 
        ?>
      </optgroup> 
      <optgroup label="Video & Animation">
        <?php
              foreach($skills as $skill){
                if($skill['skill_category'] === 'Video & Animation'){
                  echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';
                }                
              } 
        ?>
      </optgroup> 
      <optgroup label="Programming & Tech">
        <?php
              foreach($skills as $skill){
                if($skill['skill_category'] === 'Programming & Tech'){
                  echo '<option value="'.$skill['skill_id'].'">'.$skill['skill_name'].'</option>';
                }                
              } 
        ?>
      </optgroup>       
    </select>
    <p class="errormessage"> <?php echo $skillErr;?> </p> 
    </div>
    </div>
    <!-- experience -->
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Experience</label>
    <!--  -->
    <div class="col-sm-9">
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="experience" id="inlineRadio1" value="Beginner">
  <label class="form-check-label" for="inlineRadio1">Beginner(< 1Yr) </label>
</div>
<div class="form-check form-check-inline ">
  <input class="form-check-input" type="radio" name="experience" id="inlineRadio2" value="Medium">
  <label class="form-check-label" for="inlineRadio2">Medium(3-5)yrs</label>
</div>
<div class="form-check form-check-inline ">
  <input class="form-check-input" type="radio" name="experience" id="inlineRadio2" value="Advanced">
  <label class="form-check-label" for="inlineRadio2">Advanced(>5)yrs</label>
</div>
    </div>
    <p class="errormessage"> <?php echo $experienceErr;?> </p>
    <!--  -->
  </div>

  <div class="form-group row">
    <label for="address">Portfolio</label>
    <div class="col-sm-7 ml-5" style="margin-left: 240px;">
      <input class="form-control" name="portfolio" type="text">
    </div>
    <p class="errormessage"> <?php echo $portfolioErr;?> </p>
    
 </div>
</div>
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
         
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Bank Details</h3>
                <div class="multisteps-form__content mb-5">

                <div class="form-group row mt-5" >
    <label for="mob">Bank Name</label>
    <div class="col-sm-7" style="margin-left: 60px;">
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
      <p class="errormessage"> <?php echo $bankNameErr;?> </p>
    </div>
    </div>

    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Bank Account </label>
    <div class="col-sm-7" style="margin-left: 85px;">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Account number" name="accountnumber" value = "<?php echo $accountNumber;?>"> 
      <p class="errormessage"> <?php echo $accountNumberErr;?> </p>
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm" style="margin-top: 30px;">Summary </label>

      <div class="form-row mt-4" style="margin-left: 95px;">
        <textarea class="multisteps-form__textarea form-control" rows="5" cols="45" placeholder="Summary" name="summary"> <?php echo $summary;?> </textarea>
        <p class="errormessage"> <?php echo $summaryErr;?> </p>
      </div>
  </div>
 </div>

                   <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-success ml-auto" type="submit" title="Send"  name="signup_btn">Signup</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="../../assets/js/guest/signup.js"></script>
<script>
  $(document).ready(function() {
        $('.language-multiple').select2({placeholder: 'Select language',
          maximumSelectionLength: 5});
    });

    $(document).ready(function() {
        $('.skill-multiple').select2({placeholder: 'Select skill',
          maximumSelectionLength: 5});
    });

    function displayPhoto(event){
      profileDisplay = document.getElementById('profiledisplay');
      profileDisplay.setAttribute('src', URL.createObjectURL(event.files[0]));
      profileDisplay.onload = function() {
      URL.revokeObjectURL(profileDisplay.src); // free memory
      } 
    }
    // Tagger for portfolio
    tagger(document.querySelector('[name="portfolio"]'),{wrap: true ,allow_spaces: false, tag_limit: 10, link: function(name){return false}});

</script>
</body>


</html>