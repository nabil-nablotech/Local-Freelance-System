<?php
require_once "nav.php";
require_once "../Database/db.php";
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
                  <h6 class="m-0 font-weight-bold text-primary">Add  Notification</h6>
                </div>
                <div class="card-body ">
<!--  -->

<h2>  Post Notification</h2>
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
 <!--  <div class="form-group">
   
  <select class="form-control">
  <option>users</option>
</select>
</div> -->
  <div class="text-center">
  <!-- <button type="submit" class="btn btn-sm btn-primary " id="post" name="send">
    <i class="fa fa-paper-plane" aria-hidden="true">


</i>push</button> -->
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

           
        
        

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
     <?php
require_once "footer.php";
     ?>

    </div>
  </div>
  <!-- Scrollto to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="vendor/jquery/jquery.min.js"></script>  
  <script src="vendor/datatables/jquery.dataTables.js" ></script>
  <script src="vendor/datatables/jquery.dataTables.min.js" ></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/serelance-admin.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js" ></script>



  <script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 
  

</body>

</html>

<!--  -->