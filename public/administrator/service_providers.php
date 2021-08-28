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
      <h1 class="h3 mb-0 text-gray-800">Service Providers</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="Dashboard.php">Home</a>
         </li>
         <li class="breadcrumb-item">Users</li>
         <li class="breadcrumb-item active" aria-current="page">Service Providers</li>
      </ol>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card shadow-sm mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center
             justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">List of Service Providers</h6>
            </div>
            <div class="card-body">
               
               <!-- data to be fetched from the database  -->
               <div class="table table-responsive">
                  <table id = "table" class = "table table-bordered table-striped">
           
                     <thead>
                        <tr>
                           <th>No</th>
                           <th> Username</th>
                           <th> FullName</th>
                           <th> Joined Date</th>
                           <th>Account Status</th>
                           <th> Details</th>
<th>Transaction</th>
<th>Activate</th>
<th>Suspend</th>
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
             class='btn btn-info btn-sm btn-popup'>
             view </button></td>";
            echo "<td><button data-id='".$No."'
             class='btn btn-info btn-sm btn-popup'>
             View</button></td>";
            echo "<td><button type='button' data-id='".$No."'
             class='btn btn-success btn-sm  btn-popup'>Activate</button></td>";
            echo "<td><button type='button' data-id='".$No."'
             class='btn btn-danger btn-sm btn-popup'>
             Suspend </button></td>";

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
