<?php
require "includes/service_seeker-navigation.php";
$bids = $serviceSeekerController->getAllBids($_SESSION['username']);
?>
  <script>
    document.title="Admin-list of bids";
</script>

 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List of bids </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Bids</li>
              <li class="breadcrumb-item active" aria-current="page">List of Bids</li>
            </ol>
          </div>
          <div class="row">
            <!-- Alerts Basic -->
            <div class="col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">List of bids</h6>
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
                        <th>Service provider</th>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                     </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($bid)){
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
                                                {$bid['opened_date']}
                                            </td>
                                            <td>
                                                {$bid['price']}
                                            </td>
                                            <td>
                                                {$bid['bid_date']}
                                            </td>
                                            <td>
                                                {$bid['made_by']}
                                            </td>
                                            <!--  -->
                                                <td><a class="btn btn-info" href="viewbiddescription/{$bid['bid_id']}"> View</a> </td>
                                                <td><a class="btn btn-info" href="viewbiddescription/{$bid['bid_id']}"> View service provider</a> </td>
                                                <td><a class="btn btn-info" href="viewbiddescription/{$bid['bid_id']}"> View</a> </td>
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


          </div>

        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
     <?php
        require "includes/service_seeker-footer.php";
     ?>

    </div>
  </div>




  <script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 
  

</body>

</html>

<!--  -->