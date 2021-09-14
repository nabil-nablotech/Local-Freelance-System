<?php
require "includes/admin-navigation.php";
$requests = $adminController->getAllOpenRequests();
?>
  <script>
    document.title="Admin-list of bids";
</script>



 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fund transfer requests </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Fund transfer requests</li>
              <li class="breadcrumb-item active" aria-current="page">Fund transfer requests</li>
            </ol>
          </div>
          <div class="row">
            <!-- Alerts Basic -->
            <div class="col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Fund transfer requests</h6>
                </div>
                <div class="card-body">
<!--  -->
				<!--  -->
								
                <div class="table table-responsive mt-5">
               <table id = "table" class = "table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Request Id</th>
                        <th>Requester</th>
                        <th>Amount</th>
                        <th>Request date</th>
                        <th> </th>
                     </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($requests)){
                            $count = 1;
                            foreach($requests as $request){

                                echo <<<EOT
                                            <tr>
                                            <td>
                                                {$count}
                                            </td>
                                            <td>
                                                {$request['request_id']}
                                            </td>
                                            <td>
                                                {$request['requester']}
                                            </td>
                                            <td>
                                                {$request['amount']}
                                            </td>
                                            <td>
                                                {$request['datetime']}
                                            </td>
                                            <td>
                                            <button class="btn btn-primary" onclick ="confirmAction('{$_SESSION['baseurl']}public/admin/processrequest/{$request['request_id']}');">Process</button>  
                                            </td>
                                            
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
      <script src="http://localhost/seralance/app/vendor/jquery/jquery.min.js"></script>  
<script src="http://localhost/seralance/app/vendor/datatables/jquery.dataTables.js" ></script>
<script src="http://localhost/seralance/app/vendor/datatables/jquery.dataTables.min.js" ></script>
<script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/seralance/app/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>public/assets/js/administrator/serelance-admin.js "></script>
<script src="http://localhost/seralance/app/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://localhost/seralance/app/vendor/datatables/dataTables.bootstrap4.js" ></script>

<script type = "text/javascript">
    function confirmAction(anchor){
      var conf = confirm("Are you sure you want to perform this record?");
      if(conf){
        window.location = anchor;
      }
    } 
    $(document).ready(function(){
      $("#table").DataTable();
    });
</script>  

    </div>
  </div>



</body>



</html>

<!--  -->