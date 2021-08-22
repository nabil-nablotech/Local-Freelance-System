<?php
   require_once "../includes/admin-navigation.php";
   require_once "../guest/connection.php";
   ?>
<script>
    document.title="Admin-list of system admins";
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
crossorigin="anonymous"></script>   
<!-- content begins -->

<div class="container-fluid" id="container-wrapper">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Admin users</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="Dashboard.php">Home</a>
         </li>
         <li class="breadcrumb-item">Users</li>
         <li class="breadcrumb-item active" aria-current="page">Admin users</li>
      </ol>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card shadow-sm mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center
             justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">List of Admin Users</h6>
            </div>
            <div class="card-body">
               
               <!-- data to be fetched from the database  -->
               <div class="table table-responsive">
                  <table id = "table" class = "table table-bordered table-striped">
                     <a class = "btn btn-success mb-3" href = "create_new_admin.php">
                       <i class = "fa  fa-plus-circle"></i> New Admin Account</a>
                     <thead>
                        <tr>
                           <th>No</th>
                           <th> Username</th>
                           <th> FullName</th>
                           <th> Role</th>
                           <th>Created By</th>
                           <th>Details</th>
                           <th> Permission</th>
                        </tr>
                     </thead>
              
               <!--  ends -->
                
      <tbody>
        <?php
        $query = "select * from Account";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $No = $row['No'];
            $Username = $row['Username'];
            $FullName = $row['FullName'];
            $Role = $row['Role'];
            $createdby = $row['Createdby'];


            echo "<tr>";
            echo "<td>".$No."</td>";
            echo "<td>".$Username."</td>";
            echo "<td>".$FullName."</td>";
            echo "<td>".$Role."</td>";
            echo "<td>".$createdby."</td>";
            echo "<td><button type='button' data-id='".$No."'
             class='btn btn-info btn-sm btn-popup'><i class='fa  fa-eye'>
             </i>view </button></td>";
            echo "<td><button type='button' data-id='".$No."'
             class='btn btn-warning btn-sm edit'><i class='fa  fa-eye'>
             </i>edit </button></td>";

            
            echo "  </tr>";
        }
        ?>
      </tbody>
    
        </table>
      </div>
    <!-- Modal -->
    <div class="modal fade" id="custModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Admin Details</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </div>
<!-- editmodal -->


  <script type="text/javascript">
    $(document).ready(function () {

      $('.edit').click(function () {
        var editId = $(this).data('id');
        $.ajax({
          url: 'edit_permission.php',
          type: 'post',
          data: { editId: editId },
          success: function (response) {
            $('.modal-body').html(response);
            $('#editModal').modal('show');
          }
        });
      });

    });
  </script>
<!-- /.modal -->
<!--  -->

  <script type="text/javascript">
    $(document).ready(function () {

      $('.btn-popup').click(function () {
        var custId = $(this).data('id');
        $.ajax({
          url: 'Admin_Details.php',
          type: 'post',
          data: { custId: custId },
          success: function (response) {
            $('.modal-body').html(response);
            $('#custModal').modal('show');
          }
        });
      });

    });
  </script>

    <!-- Modal -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Permission</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body">

      
          </div>
          

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </div>
<!--  -->
                  </div>
               </div>
            </div>
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
