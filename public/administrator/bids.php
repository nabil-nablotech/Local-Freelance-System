<?php
require "includes/admin-navigation.php";
$bids = $adminController->getAllBids();
?>
  <script>
    document.title="Admin-list of bids";
</script>


 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bids </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Bids</li>
              <li class="breadcrumb-item active" aria-current="page">Bids</li>
            </ol>
          </div>
          <div class="row">
            <!-- Alerts Basic -->
            <div class="col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Bids</h6>
                </div>
                <div class="card-body">
<!--  -->
                <!--  -->
                <div class="table table-responsive mt-5">
               <table id = "table" class = "table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Bid Id</th>
                        <th>Bid price</th>
                        <th>Bid date</th>
                        <th>Project Id</th>
                        <th>Project title </th>
                        <th>Status</th>
                        <th> </th>
                     </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($bids)){
                            $count = 1;
                            foreach($bids as $bid){

                                echo <<<EOT
                                            <tr>
                                            <td>
                                                {$count}
                                            </td>
                                            <td>
                                                {$bid['bid_id']}
                                            </td>
                                            <td>
                                                {$bid['price']}
                                            </td>
                                            <td>
                                                {$bid['bid_date']}
                                            </td>
                                            <td>
                                                {$bid['project_id']}
                                            </td>
                                            <td>
                                                {$bid['title']}
                                            </td>
                                            <td>
                                                {$bid['status']}
                                            </td>
                                            <!--  -->
                                                <td><a class="btn btn-info" href="{$_SESSION['baseurl']}public/admin/viewbiddescription/{$bid['bid_id']}">Bid description</a> </td>
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
            <!--  -->
         </div>
      </div>
   </div>
</div>

   

                </div>
              </div>
            </div>


          </div>

        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery/jquery.min.js"></script>  
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/jquery.dataTables.js" ></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/jquery.dataTables.min.js" ></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>public/assets/js/administrator/serelance-admin.js "></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/dataTables.bootstrap4.js" ></script>
      <script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 

    </div>
  </div>



</body>



</html>

<!--  -->