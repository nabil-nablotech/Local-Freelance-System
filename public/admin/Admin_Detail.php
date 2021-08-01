<?php
   require_once "nav.php";
   require_once "../Database/db.php";
   ?>
<!--  -->
<head>
   <link rel="stylesheet" href="vendor/datatables/dataTables.bootstrap4.css">
</head>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Admin Users</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="./">Home</a>
         </li>
         <li class="breadcrumb-item">Admin Account</li>
         <li class="breadcrumb-item active" aria-current="page">Admin Details</li>
      </ol>
   </div>
   <div class="row">
      <!-- Alerts Basic -->
      <div class="col-lg-9 mx-auto">
         <div class="card shadow-sm mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Personal  Details</h6>
            </div>
            <div class="card-body">
               <!--  -->
               <!--  -->
               
               <div class="table table-responsive">
                  <table id = "table" class = "table table-borderless">
                    
                     <thead>
                        <tr class="bg-primary" style="
    background-color: rgb(128,234,211,0.2)!important;">
                           <th >Attributes</th>
                           <th class="col-sm-4"> Value</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query = $con->query("SELECT * FROM Account") or die(mysqli_error($con));
                           $fetch = $query->fetch_array();
                               ?>	
                        <tr>
                          <th> No</th>
                           <td ><?php echo $fetch['No']?></td>
                           </tr>
                           <tr>  
                             <th>Username</th>
                             <td><?php echo $fetch['Username']?></td>
                            </tr>
                         
                          <tr> 
                            <th>Full Name</th>
                            <td><?php echo $fetch['FullName']?></td>
                          </tr>
                          <tr> 
                            <th>Role</th>
                            <td><?php echo $fetch['Role']?>
                          </td>
                        </tr>
                          <tr> 
                            <th>Created By</th>
                            <td><?php echo $fetch['Createdby']?>
                          </td>
                        </tr>
                        <tr> 
                            <th>Country</th>
                            <td>Ethiopia
                          </td>
                        </tr>
                        <tr> 
                            <th>City</th>
                            <td>Addis Ababa
                          </td>
                        </tr>
                        <tr> 
                            <th>Address</th>
                            <td>6 killo
                          </td>
                        </tr>
                        <tr> 
                            <th>permissions</th>
                            <td>policy managment</br>
                            FAQ Management
                          </td>
                        </tr>
                        <?php
                           
                           ?>	
                     </tbody>
                  </table>
               </div>
               <!--  -->
            </div>
         </div>
      </div>
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
<!---Container Fluid-->
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
<script src="js/ruang-admin.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js" ></script>
<!-- <script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script>  -->
</body>
</html>
<!--  -->