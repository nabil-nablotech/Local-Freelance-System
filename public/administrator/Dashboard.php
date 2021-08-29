<?php
require "includes/admin-navigation.php";
/* 
   $sql = "SELECT SUM(numberofview) as count FROM demo_viewer 
			GROUP BY YEAR(created_at) ORDER BY created_at";
    $viewer = mysqli_query($mysqli, $sql);
    $viewer = mysqli_fetch_all($viewer, MYSQLI_ASSOC);
    $viewer = json_encode(array_column($viewer, 'count'), JSON_NUMERIC_CHECK);


    /--* Getting demo_click table data 
    $sql = "SELECT SUM(numberofclick) as count FROM demo_click 
			GROUP BY YEAR(created_at) ORDER BY created_at";
    $click = mysqli_query($mysqli, $sql);
    $click = mysqli_fetch_all($click, MYSQLI_ASSOC);
    $click = json_encode(array_column($click, 'count'), JSON_NUMERIC_CHECK);
 $sql = "SELECT SUM(numberofclick) as count FROM demo_click 
			GROUP BY YEAR(created_at) ORDER BY created_at";
    $project = mysqli_query($mysqli, $sql);
    $project = mysqli_fetch_all($project, MYSQLI_ASSOC);
    $project = json_encode(array_column($project, 'count'), JSON_NUMERIC_CHECK); */

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
                        <span class="text-center text-info  " style="font-size:x-large;"> 200</span>

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
                       <span class="text-info">300</span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-3x fa-building mb-3 text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- total visitors-->
                        <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total visitors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info">300</span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-3x fa-eye mb-3 text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- total new disputes -->
                        <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total  Disputes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info">300</span> 
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
<!-- total project announced -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">total Announced Projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info">300</span> 
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
                       <span class="text-info">300</span> 
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


              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Transactions</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info">300</span> 
                      </div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tasks fa-3x  mb-3 text-primary">
                        
                      </i>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!--  total terminated projects-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total terminated projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center mt-2">
                       <span class="text-info">300</span> 
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
            <!-- Area Chart -->
           <div class="col-xl-12 col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                    </a>
                  </div>
                </div>
       <!--  -->





<script type="text/javascript">


$(function () { 


    var data_click = <?php echo $click; ?>;
    var data_viewer = <?php echo $viewer; ?>;
    var project=<?php echo $project?>


    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title:  {
            text: 'Montly registered customers & posted project report '
        },
       
        xAxis: {
            categories: ['September','October','November', 'December','January','February','March','April','May','june','July','August']
        },
        yAxis:
         {
            title: {
                text: 'Totals number of registered customers'
            }
        },


        series: [{
            name: 'Service Provider',
            data: data_click,
        
        }, 
        {
            name: 'Servie Seeker',
            data: data_viewer
        },
        {
            name: 'project',
            data: project
        } ]
        
    });
});


</script>




    
                    <div id="container">

                </div>
        
  




       <!--  -->
                 
          
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
  <script src="http://localhost/seralance/app/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="http://localhost/seralance/public/assets/js/administrator/seralance-admin.min.js"></script> 
</body>

</html>