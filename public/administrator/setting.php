<?php
require_once "../includes/admin-navigation.php";
require_once "../guest/connection.php";
?>

<!--  -->


  <script>
    document.title="Admin-settings";
</script>


 <!-- Contents-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">page settings </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">settings</li>
              <li class="breadcrumb-item active" aria-current="page">page settings </li>
            </ol>
          </div>
          <div class="row">
            <!-- Alerts Basic -->
            <div class="col-lg-12 mx-auto">
              <div class="card shadow-sm mb-4 ">
                <div class="card-body " style="background-color:#hhh" >
<!--  -->
<div class="wrap">
<ul class="nav nav-tabs " id="myTab" role="tablist"
>
  <li class="nav-item">
    <a class="nav-link active" id="logo-tab" data-toggle="tab" href="#logo"
     role="tab" aria-controls="logo" aria-selected="true">Logo Settings</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="footer-tab" data-toggle="tab" href="#footer"
     role="tab" aria-controls="footer" aria-selected="false">Footer Settings</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="header-tab" data-toggle="tab" href="#header"
     role="tab" aria-controls="header" aria-selected="false">Header Settings</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="social-tab" data-toggle="tab" href="#social"
     role="tab" aria-controls="social" aria-selected="false">social media link Settings</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
     role="tab" aria-controls="contact" aria-selected="false">contact Settings</a>
  </li>
</ul>
</div>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="logo" role="tabpanel" aria-labelledby="logo-tab">
      ...</div>
  <div class="tab-pane fade" id="footer" role="tabpanel" aria-labelledby="footer-tab">
      ...</div>
  <div class="tab-pane fade" id="header" role="tabpanel" aria-labelledby="header-tab">
      ...</div>
    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
        ...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      ...</div>

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