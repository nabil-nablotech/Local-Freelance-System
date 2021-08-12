<?php
require_once "../includes/admin-navigation.php";
require_once "../guest/connection.php";
?>

<!--  -->

  <script>
    document.title="Admin-Edit FAQs";
</script>

 <!-- contents -->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit FAQS </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">FAQS</li>
              <li class="breadcrumb-item active" aria-current="page">Edit FAQS </li>
            </ol>
          </div>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit FAQS</h6>
                </div>
                <div class="card-body">
<!--  -->
<form action="#" method="post" id="add_form" >
<div class="form-group">
   <label for="policy">Questions</label>
   <select class="form-control">
   <option>Question 1</option>
 </select>
 </div>
  
  <div class="form-group">
    <label for="pwd">Draft:</label>
	<textArea input="text" class="form-control" name="message" placeholder="enter message" rows="4"  required> </textArea>
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-sm btn-primary " name="send"><i class="fa fa-paper-plane" aria-hidden="true">
</i>publish</button>
</div>
</form>
    <!--  -->
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