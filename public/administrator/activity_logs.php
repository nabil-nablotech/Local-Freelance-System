<?php
require_once "../includes/admin-navigation.php";
require_once "../guest/connection.php";
?>

<!--  -->


  <script>
    document.title="Admin-activty logs";
</script>


 <!-- Contents-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Activity Logs </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Login details</li>
              <li class="breadcrumb-item active" aria-current="page">Activity logs </li>
            </ol>
          </div>
          <div class="row">
            <!-- Alerts Basic -->
            <div class="col-lg-12 mx-auto">
              <div class="card shadow-sm mb-4 ">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Activity logs</h6>
                </div>
                <div class="card-body">
<!--  -->
 <!-- data to be fetched from the database  -->
               <div class="table table-responsive">
                  <table id = "table" class = "table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th> Username</th>
                           <th> Ip address</th>
                           <th> device</th>
                           <th>browser</th>
                           <th> date</th>
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
            echo "<td>".$createdby."</td>";


            
            echo "  </tr>";
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

<!--  -->