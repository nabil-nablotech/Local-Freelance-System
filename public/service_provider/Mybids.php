<?php
require "includes/service_provider-navigation.php";
$bids = $serviceProviderController->getAllBids($_SESSION['username']);
?>
  <script>
    document.title="Service Provider-list of bids";
</script>


 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper"  style="margin-top:100px;">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My bids </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Bids</li>
              <li class="breadcrumb-item active" aria-current="page">My bids</li>
            </ol>
          </div>
          <div class="row">
            <!-- Alerts Basic -->
            <div class="col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">My bids</h6>
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
                        <th> </th>
                     </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($bids)){
                            $count = 1;
                            foreach($bids as $bid){
                              $deleteBtn = "";
                              if($bid['status'] == 'open'){
                                 $deleteBtn = '<button class="btn btn-danger" onclick ="confirmAction(\''.$_SESSION['baseurl'].'public/serviceprovider/deletebid/'.$bid['bid_id'].'\');" > Delete</button>'; 
                              }
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
                                                <td><a class="btn btn-info" href="viewbiddescription/{$bid['bid_id']}">Bid description</a> </td>
                                                <td>$deleteBtn</td>
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
      <script type = "text/javascript">
     function confirmAction(anchor){
   	var conf = confirm("Are you sure you want to delete this record?");
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

  <?php
		require "includes/service_seeker-footer.php";
   ?>

</body>



</html>

<!--  -->