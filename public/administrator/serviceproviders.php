<?php
   require "includes/admin-navigation.php";
   $serviceProviders= $adminController->getServiceProviders();
   ?>
<script>
    document.title="Admin-list of service providers";
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

<!-- content begins -->

<div class="container-fluid" id="container-wrapper">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Service providers</h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="Dashboard.php">Home</a>
         </li>
         <li class="breadcrumb-item">Users</li>
         <li class="breadcrumb-item active" aria-current="page">Service providers</li>
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
               <div class="table table-responsive mt-5">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Username</th>
										<th>Full name</th>
										<th>Date joined</th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php 
											if(!empty($serviceProviders)){
												$count = 1;
												foreach($serviceProviders as $serviceProvider){
                                                    $thirdRow = "";
                                                    if($serviceProvider['status']=='Suspended'){
                                                        $thirdRow = '<button class="btn btn-success" onclick ="confirmAction(\'http://localhost/seralance/public/admin/activate/serviceprovider/'.$serviceProvider['username'].'\');" >Activate</button>';
                                                    }
                                                    else{
                                                        $thirdRow = '<button class="btn btn-danger" onclick ="confirmAction(\'http://localhost/seralance/public/admin/suspend/serviceprovider/'.$serviceProvider['username'].'\');" >Suspend</button>';
                                                    }
                                                    echo <<<EOT
                                                        <tr>
                                                            <td>
                                                                {$count}
                                                            </td>
                                                            <td>
                                                                {$serviceProvider['username']}
                                                            </td>
                                                            <td>
                                                                {$serviceProvider['firstname']} {$serviceProvider['lastname']}
                                                            </td>
                                                            <td>
                                                                {$serviceProvider['join_date']}
                                                            </td>
                                                        <!--  -->
                                                            <td><a class="btn btn-primary" href="http://localhost/seralance/public/admin/viewserviceprovider/{$serviceProvider['username']}">
                                                            View details</a> </td>
                                                            <td><a class="btn btn-primary" href="http://localhost/seralance/public/admin/transctions/{$serviceProvider['username']}">
                                                            Transactions</a> </td>
                                                            <td>{$thirdRow}</td>
                                                        <!--  -->
                                                        </tr>
                                                    EOT;
														$count++ ;
													}
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
   require_once "includes/admin-footer.php";
        ?>
</div>
</div>
<!-- Scrollto to top -->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<script src="http://localhost/seralance/app/vendor/jquery/jquery.min.js"></script>  
<script src="http://localhost/seralance/app/vendor/datatables/jquery.dataTables.js" ></script>
<script src="http://localhost/seralance/app/vendor/datatables/jquery.dataTables.min.js" ></script>
<script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/seralance/app/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="http://localhost/seralance/public/assets/js/administrator/serelance-admin.js "></script>
<script src="http://localhost/seralance/app/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://localhost/seralance/app/vendor/datatables/dataTables.bootstrap4.js" ></script>

<script type = "text/javascript">
    function confirmAction(anchor) {
        var conf = confirm("Are you sure you want to perform this action?");
        if(conf) {
            window.location = anchor;
        }
    }

   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 
</body>
</html>
