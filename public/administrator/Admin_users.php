<?php
   require_once "../includes/admin-navigation.php";
   require_once "../guest/connection.php";
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
            <div class="card-header py-3 d-flex flex-row align-items-center
             justify-content-between">
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
                           <th>Details</th>
                           <th>Permission</th>
                           <th>Delete</th>
     
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
             </i>view</button></td>";
            echo "<td><button data-id='".$No."'
             class='btn btn-warning btn-sm btn-popup'><i class='fa fa-pencil'></i>edit</button></td>";
            echo "<td><button href=''
             class='btn btn-danger btn-sm btnDelete '>
             <i class='fa fa-trash'></i>
             </button></td>";
            echo "</tr>";
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
<!-- delte modal -->

<!-- start: Delete Coupon Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h3 class="modal-title" id="myModalLabel">Warning!</h3>

            </div>
            <div class="modal-body">
               
                 <h4> Are you sure you want to DELETE?</h4>

            </div>
            <!--/modal-body-collapse -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnDelteYes" href="#">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            <!--/modal-footer-collapse -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--  -->

  <script type="text/javascript">
    $(document).ready(function () {

      $('.btn-popup').click(function () {
        var custId = $(this).data('id');
        $.ajax({
          url: 'AdminDetails.php',
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


<!--  -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- content container ends -->

<script type = "text/javascript">
$('button.btnDelete').on('click', function (e) {
    e.preventDefault();
    var id = $(this).closest('tr').data('id');
    $('#myModal').data('id', id).modal('show');
});

$('#btnDelteYes').click(function () {
    var id = $('#myModal').data('id');
    $('[data-id=' + id + ']').remove();
    $('#myModal').modal('hide');
});
</script>


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
