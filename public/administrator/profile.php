<?php
   require_once "nav.php";
   require_once "../Database/db.php";
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
      </div>
   </div>
   <!-- button -->
   <div class="row">
      <div class="col-sm-6 mx-auto">
         <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-key">Change password</i>
            </button>
            <button type="button" class="btn btn-primary btn-sm "><i class="fa fa-edit"></i>Update</button>
         </div>
      </div>
   </div>
   <!--  -->
   <!-- Button trigger modal -->
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header mx-auto">
               <h5 class="modal-title" id="exampleModalLabel ">Change password</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="col-sm-6 mx-auto">
                  <div class="form-group">
                     <input type="password" class="form-control" placeholder="old password">
                  </div>
                  <div class="form-group">
                     <input type="password" class="form-control" placeholder="new password">
                  </div>
                  <div class="form-group">
                     <input type="password" class="form-control" placeholder="confirm new password">
                  </div>
               </div>
               <div class="form-group text-center">
                  <button class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>change</button>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
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
</div>
<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to logout?</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="login.html" class="btn btn-primary">Logout</a>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<!-- Footer -->
<?php
   require_once "footer.php";
        ?>
</div>  
</div>
<!-- Scrollto to top -->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<script src="vendor/jquery/jquery.min.js"></script>  
<script src="vendor/datatables/jquery.dataTables.js" ></script>
<script src="vendor/datatables/jquery.dataTables.min.js" ></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/serelance-admin.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js" ></script>
<script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 
</body>
</html>
<!--  -->