<?php
require_once "includes/admin-navigation.php";
$notifications = $adminController->getAllNotification();
?>

<!--  -->


  <script>
    document.title="Admin-Notifications";
</script>
 <!-- Contents-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List of Notification </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Notification</li>
              <li class="breadcrumb-item active" aria-current="page">list of Notification </li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List of Notification</h6>
                </div>
                <div class="card-body">
<!--  -->
                <!--  -->
                <div class="table table-responsive mt-3">
                <a class = "btn btn-success btn-sm mb-3" href = "push_notification.php">
                  <i class = "fa  fa-plus-circle"></i> Push new notification</a>

                  <table id = "table" class = "table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Notification Id</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Recipient</th>
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
                                                <td><a class="btn btn-info" href="http://localhost/seralance/public/admin/viewbiddescription/{$bid['bid_id']}">Bid description</a> </td>
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
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 
  

</body>

</html>

<!--  -->