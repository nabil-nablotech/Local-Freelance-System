<?php
   
include "../includes/admin-navigation.php";
require_once "../guest/connection.php";
   ?>
<!--  -->

   <script>
      document.title="Admin-Profile details";
   </script>

<!-- Contents-->
<div class="container-fluid" id="container-wrapper">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Profile details</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="./">Home</a>
         </li>
         <li class="breadcrumb-item">Admin profile</li>
         <li class="breadcrumb-item active" aria-current="page">profile </li>
      </ol>
   </div>
   <div class="row">
      <div class="col-lg-6 ">
         <div class="card shadow-sm mb-4 ">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Personal details</h6>
            </div>
            <div class="card-body">
               <!-- content -->
               <div class="form-group row ">
                  <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">First Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="First Name">
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Last Name</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Last Name">
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Email">
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Role</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Role">
                  </div>
               </div>
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
               <div class="form-group row ">
                  <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Mobile Number</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Mobile No">
                  </div>
               </div>
               <!--  -->
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
               <!--  -->
            </div>
         </div>
      </div>
      <!-- Address details -->
      <div class="col-lg-6">
         <div class="card shadow-sm mb-4 ">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Address details</h6>
            </div>
            <div class="card-body">
               <div class="form-group row ">
                  <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Country</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Country">
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="city">
                  </div>
               </div>
               <div class="form-group row ">
                  <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address </label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Address">
                  </div>
               </div>
            </div>
         </div>
<!--  -->
<div class="container-fluid">
<div class="row">
      <!--  -->
          <div class="col-lg-12">
         <div class="card shadow-sm mb-4 ">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">upload profile</h6>
            </div>
            <div class="card-body mx-auto">
    <input type="file"   >
        
            </span>
            <input type="file" name="profileImage"  id="profileImage"
             class="form-control" style="display: none;">

            </div>
         </div>
      </div>
      <!--  -->
   </div>
</div>
</div>
      </div>
</div>
      <!--  -->
   </div>
   <!-- button -->
   <div class="row">
      <div class="col-sm-6 mx-auto">
         <div class="form-group">
            <button type="button" class="btn btn-primary btn-sm "><i class="fa fa-edit"></i>Update</button>
         </div>
      </div>
   </div>
   <!--  -->

   <!--  -->
   <script type = "text/javascript">
      function confirmationDelete(anchor){
      	var conf = confirm("Are you sure you want to delete this record?");
      	if(conf){
      		window.location = anchor.attr("href");
      	}
      } 
   </script>
</div>
</div>
<?php
   require_once "../includes/admin-footer.php";
        ?>
</div>  
</div>
<!-- Scrollto to top -->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<script src="../assets/vendor/jquery/jquery.min.js"></script>  
<script src="../assets/vendor/datatables/jquery.dataTables.js" ></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js" ></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../assets/js/administrator/serelance-admin.js "></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.js" ></script>

<script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 
</body>
</html>
<!--  -->