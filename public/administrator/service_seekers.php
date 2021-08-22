<?php
require_once "nav.php";
require_once "../Database/db.php";
?>

<!--  -->
 <script>
      document.title="Admin-list of service seekers";
   </script>

 <!-- Contents-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Service seekers</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active" aria-current="page">Service seekers</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List of service seekers</h6>
                </div>
                <div class="card-body">
<!--  -->
                <!--  -->

            <div class="table table-responsive">
              

               <table id = "table" class = "table table-bordered table-striped">

                  <thead>
                     <tr>
                        <th>No</th>
                        <th> Username</th>
                        <th> FullName</th>
                        <th> Date joined</th>
                        <th>Account status</th>
                        <th> Details</th>
                        <th> transaction</th>
                        <th> Activate</th>
                        <th>Suspend</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = $con->query("SELECT * FROM transaction") or die(mysqli_error($con));
                        while ($fetch = $query->fetch_array()) {
                            ?>	
                     <tr>
                        <td><?php echo $fetch['No']?></td>
                        <td><?php echo $fetch['Tid']?></td>
                        <td><?php echo $fetch['Tdetails']?></td>
                        <td><?php echo $fetch['Tdate']?></td>
                        <td><?php echo $fetch['Amount']?></td>
                       
                        <td><a class = "btn btn-primary btn-sm" href = "#">
                           <i class = "fa fa-eye">view </i> </a> 
                        </td>
                        <td><a class = "btn btn-primary btn-sm" href = "#">
                           Transaction </a> 
                        </td>
                        <td><a class = "btn btn-success btn-sm" href = "#">Activate
                         </a> 
                        </td>
                        <td>
                           <a class = "btn btn-danger btn-sm" onclick =
                              "confirmationDelete(this); return false;" 
                              href = "#">Suspend<a>
                        </td>
                     </tr>
                     <?php
                        }
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