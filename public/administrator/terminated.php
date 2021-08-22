<?php
require_once "nav.php";
require_once "../Database/db.php";
?>

<!--  -->
 <script>
      document.title="Admin-list of terminated projects";
   </script>

 <!-- Contents-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Terminated Projects</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Projects</li>
              <li class="breadcrumb-item active" aria-current="page">Terminated projects</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List of Terminated Projects</h6>
                </div>
                <div class="card-body">
<!--  -->
                <!--  -->

                <div class="table table-responsive mt-5">
               <table id = "table" class = "table table-bordered table-striped">
                  <thead>
                     <tr>
                     <th>No</th>
                        <th>Project Id</th>
                        <th>Project Title</th>
                        <th> Service provider</th>
                        <th>Offer date</th>
                        <th>Start Date</th>
                        <th>Cancelled Date</th>
                        <th>Price </th>
                        <th>Reason</th>
                        <th>view datails</th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = $con->query("SELECT * FROM terminatedproject") or die(mysqli_error($con));
                        while ($fetch = $query->fetch_array()) {
                            ?>	
                     <tr>

                     <td><?php echo $fetch['No']?></td>
                        <td><?php echo $fetch['pid']?></td>
                        <td><?php echo $fetch['ptitle']?></td>
                        <td><?php echo $fetch['sp']?></td>
                        <td><?php echo $fetch['odate']?></td>
                        <td><?php echo $fetch['cdate']?></td>
                        <td><?php echo $fetch['cancelleddate']?></td>
                        <td><?php echo $fetch['price']?></td>
                        <td><?php echo $fetch['reason']?></td>
                     
                     <!--  -->
                       
                        <td><a class = "btn btn-primary btn-sm" href = "edit_room.php?room_id=<?php echo $fetch['room_id']?>">
                           <i class="fa fa-eye">view</i></a> 
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