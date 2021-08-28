<?php
require_once "../includes/admin-navigation.php";
require_once "../guest/connection.php";
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
              <li class="breadcrumb-item active" aria-current="page">Add Notification </li>
            </ol>
          </div>
          <div class="row">
            <!-- Alerts Basic -->
            <div class="col-lg-8 mx-auto">
              <div class="card shadow-sm mb-4 ">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Add  Notification</h6>
                </div>
                <div class="card-body ">
<!--  -->
<form action="push.php"  method="post" id="comment_form" >
  <div class="form-group">
    <label for="email">subject</label>
    <input type="text" class="form-control" name="title" id="subject" placeholder="Enter title" required  >
  </div>
  <div class="form-group">
    <label for="pwd">Message:</label>
	<textArea input="text" class="form-control" name="message" id="comment" placeholder="enter message" rows="4"
    required> </textArea>
  </div>

  <div class="form-group">
<select id="test" class="form-control" name="form_select" onchange="showDiv(this)">
        <option>Choose any recipient </option>
      <option value="1">All service providers</option>
      <option value="2">All Service Seekers</option>
      <option value="3">All service seekers and providers</option>
      <option value="4">specific users</option>
</select>
<div id="hidden_div" class="mt-3" style="display:none;">
<input type="text" class="form-control" placeholder="please enter username"></div>

<script type="text/javascript">
function showDiv(select){
   if(select.value==4){
    document.getElementById('hidden_div').style.display = "block";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
} 
</script>
</div> 
  <div class="text-center">
<input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
</div>
</form>
    <!--  -->
    
    <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"../ServiceSeeker/Notification/fetch.php", 
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"push.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>


    <!--  -->
    </div>
              </div>
            </div>
          </div>
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