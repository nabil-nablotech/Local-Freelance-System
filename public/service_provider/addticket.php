<?php
   require "includes/service_provider-navigation.php";
   $subject = $message = "";
  
  $subjectErr = $messageErr = $ticketFileErr = "";
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['newticket_btn'])){    
	$feedback = $serviceProviderController->validateNewTicket($_POST,$_FILES);
    if($feedback['valid'] == false){
      
      // setting inserted data
      if(!empty($feedback['data']['subject'])){
        $subject = $feedback['data']['subject'];
      }

      if(!empty($feedback['data']['message'])){
        $message = $feedback['data']['message'];
	  }
	  

      // Setting error values
      if(!empty($feedback['error']['subject'])){
        $subjectErr = $feedback['error']['subject'];
      }
      
      if(!empty($feedback['error']['message'])){
        $messageErr = $feedback['error']['message'];
      }

      if(!empty($feedback['error']['ticketfile'])){
        $ticketFileErr = $feedback['error']['ticketfile'];
      }

    }
  }
   
   ?>
	<div class="container">
		<div class="row " style="margin-top: 100px;">
			<div class="col-sm-8 mx-auto">
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Add Tickets</h6> </div>
					<div class="card-body mx-auto">
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     col-form-label col-form-label-sm">Subject</label>
							<div class="col-sm-8">
								<input type="text" class="col" name="subject" placeholder="Subject of your issue" value = "<?php echo $subject;?>">
								<p class="errormessage"> <?php echo $subjectErr;?> </p>
							</div>
						</div>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     col-form-label col-form-label-sm">Message</label>
							<div class="col-sm-8">
							<textarea class="textarea form-control" rows="5" cols="45" placeholder="Message" name="message"><?php echo $message;?></textarea>
								<p class="errormessage"> <?php echo $messageErr?> </p>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-sm-4 
                     			col-form-label col-form-label-sm">File attachment</label>
							<div class="col-sm-8">
								<input type="file" class="col" name="ticketfile" >
								<p class="errormessage"> <?php echo $ticketFileErr;?> </p>
							</div>
						</div>
						<div class="form-group ">
							<div class="col-sm-4 mx-auto">
								<button class="btn btn-primary" type="submit" name="newticket_btn"><i class="fa fa-check-circle">submit</i></button>
							</div>
						</div>
					 </form>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<?php
   require "includes/service_seeker-footer.php";
   ?>
		</body>

		</html>

