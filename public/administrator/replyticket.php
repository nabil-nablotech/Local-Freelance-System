<?php
   require "includes/admin-navigation.php";
   $reply = "";
  
  $replyErr = "";
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reply_btn'])){    
	$feedback = $adminController->validateTicketReply($_POST);
    if($feedback['valid'] == false){
      
      // setting inserted data
      if(!empty($feedback['data']['reply'])){
        $reply = $feedback['data']['reply'];
      }


      // Setting error values
      if(!empty($feedback['error']['reply'])){
        $replyErr = $feedback['error']['reply'];
      }
      

    }
  }
?>	

	<style>
	.col-form-label-sm {
		padding-top: calc(.25rem + 1px);
		padding-bottom: calc(.25rem + 1px);
		font-size: .875rem;
		line-height: 1.5;
		color: black;
		font-weight: bolder;
	}
	</style>
	<div class="container" style="margin-top: 100px;">
		<div class="col-sm-12">
			<div class="card shadow-sm mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary mx-auto">Review ticket</h6> 
				</div>
				<div class="card-body mx-auto">
				<form method="POST" >

					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"> Reply </label>
						<div class="col-sm-8">
                            <input type="text" name="ticketid" value="<?php echo $_SESSION['ticketid']?>" hidden>
							<textarea name="reply" id="" cols="50" rows="10" class="form-control" required></textarea>
							<p class="errormessage"> <?php echo $replyErr;?> </p>
						</div>
					</div>
					<!--  -->
				
					<div class="form-group mx-auto">
					<button type="submit" class="btn btn-block btn-primary" name="reply_btn"><i class="fa fa-check-circle"></i>Submit</button>
					</div>
					</form>
				</div>		
				
			</div>
		</div>
	</div>
    <script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	</body>

	</html>