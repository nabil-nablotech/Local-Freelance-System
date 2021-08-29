<?php
require "includes/admin-navigation.php";
$firstName = $lastName = $email = $username = $mobileNumber = $city = $address = $accountNumber = "";
  
  $firstNameErr = $lastNameErr = $emailErr = $usernameErr = $passwordErr = $mobileNumberErr = $nationalityErr = $genderErr = $profilePhotoErr 
  = $countryErr = $cityErr = $addressErr  
  = $bankNameErr = $accountNumberErr = "";

  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['signup_btn'])){     
    $feedback = $mainController->validateSsSignup($_POST,$_FILES);
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

      if(!empty($feedback['error']['bankname'])){
        $bankNameErr = $feedback['error']['bankname'];
      }

      if(!empty($feedback['error']['accountnumber'])){
        $accountNumberErr = $feedback['error']['accountnumber'];
      }

    }
  }
?>

<!--  -->

<script>
    document.title="Admin-create new account";
</script>

 <!-- Content begins here-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New Admin Account</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active" aria-current="page">Create New Admin account</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Personal Details </h6>
                </div>
                <div class="card-body">
<!-- first name form  -->
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">First Name</label>
<div class="col-sm-9">
<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="First Name">
</div>
</div>
<!--last name form  -->
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Last Name</label>
<div class="col-sm-9">
<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Last Name">
</div>
</div>
  <!--  -->
  <div class="form-group row">
<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
<div class="col-sm-9">
<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Email">
</div>
</div>
  <!--  -->
  <div class="form-group row">
<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Role</label>
<div class="col-sm-9">
<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Role">
</div>
</div>
  <!--  -->
  <div class="form-group row">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Gender</label>
                           <!--  -->
                           <div class="col-sm-9">
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                 <label class="form-check-label" for="inlineRadio1">Male</label>
                              </div>
                              <div class="form-check form-check-inline ">
                                 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                 <label class="form-check-label" for="inlineRadio2">Female</label>
                              </div>
                        </div>
                     </div>
  <!--  -->
<!--  -->
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Phone Number</label>
<div class="col-sm-9">
<input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Mobile Number">
</div>
</div>
  <!--  nationality form-->
  <div class="form-group row">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nation</label>
                           <div class="col-sm-9">
                        <select name="nationality" class="form-control" style="width: 100%;">
                         <option value="">Ethiopian</option>
                         <option value="eritrean">Eritrean</option>
                         <option value="estonian">Estonian</option>
                         <option value="ethiopian">Ethiopian</option>
                 </select>
             </div>
        </div>
  <!--  -->
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">profile photo</label>
<div class="col-sm-9">
<input type="file" class="form-control form-control-sm" id="colFormLabelSm" placeholder="upload photo">
</div>
</div>  </div>
      </div>
   </div>
   <!-- column 2for address information -->
   <div class="col-lg-6">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Address details </h6>
                </div>
                <div class="card-body">
<!--  -->
<div class="form-group row ">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Country</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="country">
        </div>
    </div> 
    <div class="form-group row ">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="city">
        </div>
    </div> 
    <div class="form-group row ">
        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
        <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="address">
        </div>
    </div> 
<!--  -->
</div>
</div>


<!-- permission form -->

<div class="row ">
<div class="col-lg-12 mt-0">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Permissions </h6>
                </div>
                <div class="card-body">
<!--  -->
<div class="form-group row mx-auto">
<div class="form-check form-check-inline  col-sm-6">
  <input class="form-check-input" name="permission[]" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">User Management</label>
</div>
<div class="form-check form-check-inline ">
  <input class="form-check-input" name="permission[]"  type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">Dispute Management</label>
</div>
</div>
<!--  -->
<div class="form-group row mx-auto">
<div class="form-check form-check-inline  col-sm-6">
  <input class="form-check-input" name="permission[]"  type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">projects Management</label>
</div>
<div class="form-check form-check-inline ">
  <input class="form-check-input" name="permission[]"  type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">Tickets Management</label>
</div>
</div>
<!--  -->
<div class="form-group row mx-auto">
<div class="form-check form-check-inline  col-sm-6">
  <input class="form-check-input" name="permission[]"  type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Notification Management</label>
</div>
<div class="form-check form-check-inline ">
  <input class="form-check-input" name="permission[]"  type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">Policy Management</label>
</div>
</div>
<!--  -->
<div class="form-group row mx-auto">
<div class="form-check form-check-inline  col-sm-6">
  <input class="form-check-input" name="permission[]"  type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Transaction Management</label>
</div>
<div class="form-check form-check-inline ">
  <input class="form-check-input" name="permission[]"  type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">Faqs Drafting</label>
</div>
</div>
<!--  -->
</div>

  <!--  -->
                </div>
         </div>
      </div>
   </div>
   <div class="form-group  mx-auto ">
             <button  class="btn  btn-success"><i class="fa fa fa-check-circle"></i>create account</button>
         </div>
   </div>
   <!--  -->
</div>
 <script type = "text/javascript">
   function confirmationDelete(anchor){
   	var conf = confirm("Are you sure you want to delete this record?");
   	if(conf){
   		window.location = anchor.attr("href");
   	}
   } 
</script>
   

                </div>
            

           
        
        

      <!-- Footer -->
     <?php
require_once "includes/admin-footer.php";
     ?>

    </div>
  </div>
  <!-- Scrollto to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
   
</script> 
  

</body>

</html>

<!--  -->