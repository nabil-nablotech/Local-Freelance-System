<?php
require "includes/admin-navigation.php";
$value = $adminController->getStatistics();
?>




<script>
    document.title="Admin-Dashboard";
</script>
<head>

<style>
  @import 'https://code.highcharts.com/css/highcharts.css';
 
.highcharts-color-0 {
  fill: blue;
  stroke: red;
}
 
/* Titles */
.highcharts-title {
  fill: black;
  font-size: 26px;
  font-weight: bold;
}
  .highcharts-credits {
display: none !important;
}

  </style>
</head>
<!--  -->


<!--  -->
        <!-- Container-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- total registered service providers-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1 text-dark" >
                        Total Registered Service Providers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                        <span class="text-center text-info  " style="font-size:x-large;"> <?php echo $value['total_service_providers'];?></span>

                      </div>
                    
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-primary mb-4"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- total registered service seekers -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Registered Service Seekers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['total_service_seekers'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-3x fa-building mb-3 text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            
<!-- total project announced -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Announced Projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['announced_projects'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-3x fa-tasks mb-3 text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- total project offered -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Offered Projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['offered_projects'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-3x fa-tasks mb-3 text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- total project ongoing -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Ongoing Projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['ongoing_projects'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-3x fa-tasks mb-3 text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

<!-- total completed projects -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Completed Projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['completed_projects'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-3x fa-tasks mb-3 text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->


              
            <!--  total terminated projects-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total terminated projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['terminated_projects'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-3x fa-tasks mb-3 text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- Total revenue generated-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total revenue generated</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['total_revenue'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-3x  mb-3 text-success">
                        
                      </i>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- Total transferred funds-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total transferred funds</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['total_transferred_funds'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-exchange-alt fa-3x  mb-3 text-success">
                        
                      </i>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- Pending fund transfer requests-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pending fund transfer requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['total_pending_fund_requests'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-exchange-alt fa-3x  mb-3 text-primary">
                        
                      </i>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- total open disputes -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Open  Disputes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['total_open_disputes'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-3x fa-legal mb-3 text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- total closed disputes -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Closed  Disputes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['total_closed_disputes'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-3x fa-legal mb-3 text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- total open tickets -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Open tickets</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['total_open_tickets'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-3x fa-hands-helping mb-3 text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->

            <!-- total closed tickets -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Closed ticets</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info"><?php echo $value['total_closed_tickets'];?></span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-3x fa-hands-helping mb-3 text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->




</div>
  
          
              </div>
            </div> 
            <!--  -->
          

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
     <?php
     include "includes/admin-footer.php";
     ?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top" >
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $_SESSION['baseurl'];?>public/assets/js/administrator/serelance-admin.js "></script>
</body>

</html>