
<?php
require_once "nav.php";
require_once "../Database/db.php";
?>

<!--  -->

<script>
    document.title="Admin-update account";
</script>

 <!-- Content-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin users</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item"> Admin Account</li>
              <li class="breadcrumb-item active" aria-current="page">Update Account details</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Update your Account</h6>
                </div>
                <div class="card-body">


<!-- display form with current values -->
<?php
$query = $con->query("SELECT * FROM Account WHERE Username = '$_REQUEST[Username]'") or die(mysqli_error($con));
                    $fetch = $query->fetch_array();

                ?>
				<br />
<div class = "col-md-6 mx-auto">	
    <form method = "POST" action = "edit_query_account.php?Username=<?php echo $fetch['Username']?>">
        <div class = "form-group ">
            <label>No </label>
            <input type = "text" class = "form-control" value = "<?php echo $fetch['No']?>" name = "No" />
        </div>
        <div class = "form-group">
            <label>Username </label>
            <input type = "text" class = "form-control" value = "<?php echo $fetch['Username']?>" name = "Username" />
        </div>
        <div class = "form-group">
            <label>FullName</label>
            <input type = "text" class = "form-control" value = "<?php echo $fetch['FullName']?>" name = "FullName" />
        </div>
        <div class = "form-group">
            <label>Role</label>
            <input type = "text" class = "form-control" value = "<?php echo $fetch['Role']?>" name = "Role" />
        </div>
        <div class = "form-group">
            <label>Created by</label>
            <input type = "text" class = "form-control" value = "<?php echo $fetch['Createdby']?>" name = "CreatedBy" />
        </div>
        <br />
        <div class = "form-group">
            <button name = "edit_account" class = "btn btn-success btn-sm  form-control">
                <i class = "fa fa-check-circle"></i> Save Changes</button>
        </div>
    </form>
</div>
</div>
</div>
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



  <script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 
  

</body>

</html>

<!--  -->
