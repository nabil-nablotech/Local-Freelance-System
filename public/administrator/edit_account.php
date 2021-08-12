
<?php
require_once "../includes/admin-navigation.php";
require_once "../guest/connection.php";
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
$query = $con->query("SELECT * FROM Account WHERE No= '$_REQUEST[No]'")
or die(mysqli_error($con));
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
 


      <!-- Footer -->
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




  
  


