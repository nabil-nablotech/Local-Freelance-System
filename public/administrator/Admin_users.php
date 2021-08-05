<?php
   require_once "nav.php";
   require_once "../Database/db.php";
   ?>

<script>
    document.title="Admin-list of system admins";
</script>
<!-- content begins -->

<div class="container-fluid" id="container-wrapper">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Admin users</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="./">Home</a>
         </li>
         <li class="breadcrumb-item">Users</li>
         <li class="breadcrumb-item active" aria-current="page">Admin users</li>
      </ol>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card shadow-sm mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">List of Admin Users</h6>
            </div>
            <div class="card-body">
               
               <!-- data to be fetched from the database  -->
               <div class="table table-responsive">
                  <table id = "table" class = "table table-bordered table-striped">
                     <a class = "btn btn-success mb-3" href = "create_new_admin.php"><i class = "fa  fa-plus-circle"></i> New Admin Account</a>
                     <thead>
                        <tr>
                           <th>No</th>
                           <th> Username</th>
                           <th> FullName</th>
                           <th> Role</th>
                           <th>Created By</th>
                           <th> Details</th>
                           <th>Permission</th>
                           <th>Delete</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query = $con->query("SELECT * FROM Account") or die(mysqli_error($con));
                           while ($fetch = $query->fetch_array()) {
                               ?>	
                        <tr>
                           <td><?php echo $fetch['No']?></td>
                           <td><?php echo $fetch['Username']?></td>
                           <td><?php echo $fetch['FullName']?></td>
                           <td><?php echo $fetch['Role']?></td>
                           <td><?php echo $fetch['Createdby']?></td>
                           <td><a class = "btn btn-primary btn-sm" href = "Admin_Detail.php?Username=
                           <?php echo $fetch['Username']?>">
                              <i class = "fa fa-eye">view</i> </a> 
                           </td>
                           <td>
                        
             <a class = "btn btn-success btn-sm" href = "edit_account.php?Username=<?php
                echo $fetch['Username']?>"><i class = "fa fa-edit">edit</i> </a>
                           <td>
                              <a class = "btn btn-danger btn-sm" 
                              onclick = "confirmationDelete(this); return false;"
                                 href = "delete_account.php?Username=<?php echo $fetch['Username']?>"><i class 
                                 = "fa fa-trash">delete</i> </a>
                           </td>
                        </tr>
                        <?php
                           }
                           ?>	
                     </tbody>
                  </table>
               </div>
               <!--  ends -->

               <!-- modal to modify permissions begins  -->

               <div class="modal fade" id="modal" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <form method="POST" action="">
                           <div class="modal-header ">
                              <h3 class="modal-title mx-auto">Modify permissions</h3>
                           </div>
                           <div class="modal-body">
                              <!-- modal contents-->
                              <div class="card shadow-sm mb-4">
                                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary mx-auto">Permissions </h6>
                                 </div>
                                 <div class="card-body">
                                   <input type="text" class="form-control" name="username" placeholder="username">
                              <div class="form-group row mx-auto">
                                       <div class="form-check form-check-inline  col-sm-6">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                          <label class="form-check-label" for="inlineCheckbox1">User Management</label>
                                       </div>
                                       <div class="form-check form-check-inline ">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                          <label class="form-check-label" for="inlineCheckbox2">Dispute Management</label>
                                       </div>
                                    </div>
                                  
                                    <div class="form-group row mx-auto">
                                       <div class="form-check form-check-inline  col-sm-6">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                          <label class="form-check-label" for="inlineCheckbox1">projects Management</label>
                                       </div>
                                       <div class="form-check form-check-inline ">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                          <label class="form-check-label" for="inlineCheckbox2">Tickets Management</label>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group row mx-auto">
                                       <div class="form-check form-check-inline  col-sm-6">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                          <label class="form-check-label" for="inlineCheckbox1">Notification Management</label>
                                       </div>
                                       <div class="form-check form-check-inline ">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                          <label class="form-check-label" for="inlineCheckbox2">Policy Management</label>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group row mx-auto">
                                       <div class="form-check form-check-inline  col-sm-6">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                          <label class="form-check-label" for="inlineCheckbox1">Transaction Management</label>
                                       </div>
                                       <div class="form-check form-check-inline ">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                          <label class="form-check-label" for="inlineCheckbox2">Faqs Drafting</label>
                                       </div> -->
                                       <!--  -->
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div class="modal-footer">
                                       <button name="update" class="btn btn-warning mx-auto"><i class="fa fa-edit">

                                       </i> Modify</button>
                                       <button class="btn btn-danger" type="button" data-dismiss="modal">
                                       <span class="glyphicon glyphicon-remove"></span> Close</button>
                                    </div>
                                 </div>
                        </form>
                        <?php
                        
                        ?>
                        </div>
                        </div>
                     </div>

                     <!-- modal ends -->

                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- content container ends -->
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