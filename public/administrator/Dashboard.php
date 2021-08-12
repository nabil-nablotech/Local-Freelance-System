<?php
include "../includes/admin-navigation.php";
?>
 <script type="text/javascript" src="../assets/js/administrator/demo/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/administrator/demo/Chart.min.js"></script>
<script>
    document.title="Admin-Dashboard";
</script>

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
                      <i class="fas fa-3x  mb-3 text-primary">
                        <img class="img-responsive" src="../assets/Icon/transaction.png" style="width:4vw;height:4vw;">
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
                  <h6 class="m-0 font-weight-bold text-primary mx-auto ">
                    Monthly Registered custmers </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
            <div class="card-body">
    <div id="chart-container" >
        <canvas id="graphCanvas" style="font-weight: bolder;font-size:x-large;color:crimson">

        </canvas>
    </div>
                 
              </div>
              </div>
            </div> 
            <!--  -->
             <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph()
        {
            {
                $.post("../includes/data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var marks = [];

                    for (var i in data) {
                        name.push(data[i].student_name);
                        marks.push(data[i].marks);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'registered customers per month',
                                backgroundColor: '#6777EF',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
            <!--  -->
            <!-- Pie Chart -->
            <!-- Invoice Example -->

            <div class="col-xl-12 col-lg-12 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Recent Activities</h6>
                </div>
               
                
                <div class="card-footer">

                </div>
              </div>
            </div> 
            
     
          <!--Row-->


        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
     <?php
     include "../includes/admin-footer.php";
     ?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top" >
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/administrator/serelance-admin.min.js"></script>



</body>

</html>