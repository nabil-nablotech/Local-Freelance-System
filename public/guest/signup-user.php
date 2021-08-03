<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- MultiStep Form -->
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;
  }
  </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-md-2 form" >
                
            <form id="regiration_form" novalidate action="action.php"  method="post">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>                
    <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
     aria-valuemax="100"></div>
  </div> 
  <fieldset>
    <h2>Step 1: personal details</h2>
  <div class="row">
    <div class ="col-md-9">
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="first name">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Last Name</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="last name">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
    <div class="col-sm-7">
      <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Email">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="username">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
    <div class="col-sm-7">
      <input type="password" class="form-control form-control-sm" id="colFormLabelSm" placeholder="password">
    </div>
  </div>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Gender</label>
    <!--  -->
    <div class="col-sm-7">
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline ml-5">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
    </div>
    <!--  -->
  </div>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Mobile Number</label>
    <div class="col-sm-7">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="phone No">
    </div>  
  </div>
    </div>
    <div class="col-sm-2">
  <!--  -->

                        <div class="form-group">
                            <label class="control-label">Photo Preview</label>
                            <div class="input-group">
                                <img src="../Image/profile.jpg" id="output" class="img-rounded" alt="No photo to view" width="200" height="180">
                            </div>
                        </div>

                            <div class="form-group">
                                <label class="control-label">
                                    <span style="font-weight: normal;"><em>Allowed Image Formats (JPEG,PNG,GIF,JPG) (Passport size)</em></span></label>
                                <div class="input-group">

                                    <input accept="image/*" class="input-large" id="StudentPhoto" name="StudentPhoto" onchange="checkFile" type="file" value="" />


                                </div>
                            </div>  <!--  -->


    </div>
  </div>
  

    <input  type="button"  name="password" class="next btn btn-info " style="margin-left: 370px; background-color:cornflowerblue" value="Next" />
 
</fieldset>
            
  <fieldset>
    <h2> Step 2: Address Details</h2>
    <div class="row">
<div class=" col-sm-8">
    <div class="form-group row">
    <label for="fName">Country</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="fName" id="fName" placeholder="country">
    </div>
    </div>
    
    <div class="form-group row">
    <label for="fName">City</label>
    <div class="col-sm-7">
      <input type="text" class="form-control ml-5" name="city" id="city" placeholder="city">
    </div>
    </div>
    <div class="form-group row">
    <label for="lName">Address</label>
    <div class="col-sm-7">
    <input type="text" class="form-control" name="lName" id="lName" placeholder="address">
    </div>
    </div>
    </div>

    <div class="col-sm-4" >
      <h1 style="margin-top:-40px;margin-left:-50px;">Bank  Details</h1>
    </div>
    </div>
    <input type="button" name="previous" class="previous btn btn-default text-center" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" />
    
  </fieldset>
  
  <fieldset>
    <h2> step 3 Qualification Details</h2>
    <div class="form-group row">
    <label for="mob">Educational Level</label>
    
    <div class="col-sm-7">
     <select class="form-control" id="sel1">
        <option>primary school</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
    </div>
    <div class="form-group row">
    <label for="address">Address</label>
    <div class="col-sm-7 ml-5" style="margin-left: 240px;;">
    <textarea  class="form-control ml-5" name="address" placeholder="Communication Address"></textarea>
    </div>
    </div>

    <!-- experience -->
    <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Experience</label>
    <!--  -->
    <div class="col-sm-8">
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Biggner(< 1Yr) </label>
</div>
<div class="form-check form-check-inline ml-2">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Intermidate(3-5)yrs</label>
</div>
<div class="form-check form-check-inline ml-2">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Advanced(>5)yrs</label>
</div>
    </div>
    <!--  -->
  </div>

  <div class="form-group row">
    <label for="address">Portfolio</label>
    <div class="col-sm-7 ml-5" style="margin-left: 240px;;">
    <textarea  class="form-control ml-5" name="address" placeholder="portfolio"></textarea>
    </div>
    </div>

    <!--  -->
    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="submit" name="submit" class="submit btn btn-success" value="Submit" />
  </fieldset>
  

                   <!--  -->
                  
<!--                     <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
 -->              </div>  </form>
            </div>
        </div>
    </div>

    <!--  -->
<script>

    $(document).ready(function(){
  var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  $(".next").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().next();
    next_step.show();
    current_step.hide();
    setProgressBar(++current);
  });
  $(".previous").click(function(){
    current_step = $(this).parent();
    next_step = $(this).parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });
  setProgressBar(current);
  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }
});
</script>
    <!--  -->
</body>
</html>