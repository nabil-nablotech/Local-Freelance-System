<?php
require_once "includes/admin-navigation.php";

$title = $content = "";


$titleErr = $contentErr = $recipientErr  = "";
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['push_btn'])){    
$feedback =  $adminController->validatePushNotification($_POST);
  if($feedback['valid'] == false){
    
    // setting inserted data
    if(!empty($feedback['data']['title'])){
      $title = $feedback['data']['title'];
    }

    if(!empty($feedback['data']['content'])){
      $content = $feedback['data']['content'];
  }
  

    // Setting error values
    if(!empty($feedback['error']['title'])){
      $titleErr = $feedback['error']['title'];
    }
    
    if(!empty($feedback['error']['content'])){
      $contentErr = $feedback['error']['content'];
    }

    if(!empty($feedback['error']['recipient'])){
      $recipientErr = $feedback['error']['recipient'];
    }

  }
}
?>

<!--  -->

  <script>
    document.title="Admin-Notifications";
</script>


 <!-- Contents-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
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
<form  method="post" id="comment_form" >
  <div class="form-group">
    <label for="email">Title</label>
    <input type="text" class="form-control" name="title" id="subject" placeholder="Enter title" value = "<?php echo $title;?>" required  >
    <p class="errormessage"> <?php echo $titleErr;?> </p>
  </div>
  <div class="form-group">
    <label for="pwd">Content</label>
	<textArea input="text" class="form-control" name="content" id="comment" placeholder="Enter message" rows="4"
    required> <?php echo $content;?> </textArea>
  </div>
  <p class="errormessage"> <?php echo $contentErr;?> </p>

  <div class="form-group">
<select id="test" class="form-control" name="recipientselect" onchange="showDiv(this)">
        <option>Choose any recipient </option>
      <option value="1">All service providers</option>
      <option value="2">All service seekers</option>
      <option value="3">All service seekers and providers</option>
      <option value="4">Specific user</option>
</select>
<p class="errormessage"> <?php echo $recipientErr;?> </p>
<div id="hidden_div" class="mt-3" style="display:none;">
<input type="text" class="form-control" name="recipient" placeholder="Please enter username"></div>

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
<input type="submit" name="push_btn" id="post" class="btn btn-info" value="Push"/>
</div>
</form>
    <!--  -->
    


    <!--  -->
    </div>
              </div>
            </div>
          </div>
 </div>

           
        
        

      <!-- Footer -->
     <?php
require_once "includes/admin-footer.php";
     ?>

    </div>
  </div>
  <!-- Scrollto to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery/jquery.min.js"></script>  
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/jquery.dataTables.js" ></script>
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/jquery.dataTables.min.js" ></script>
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo $_SESSION['baseurl'];?>public/assets/js/administrator/serelance-admin.js "></script>
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/dataTables.bootstrap4.js" ></script>




  <script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 
  

</body>

</html>

<!--  -->