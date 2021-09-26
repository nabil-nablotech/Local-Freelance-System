<?php
   require "includes/service_provider-navigation.php";
	$price = $coverLetter = "";
	$project = $serviceProviderController->getProjectDetails($_SESSION['projectId']);
  
  $priceErr = $coverLetterErr  = "";
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['bid_btn'])){    
	$feedback =  $serviceProviderController->validateNewBid($_POST,$_SESSION['projectId']);
    if($feedback['valid'] == false){
      
      // setting inserted data
      if(!empty($feedback['data']['price'])){
        $price = $feedback['data']['price'];
      }

      if(!empty($feedback['data']['coverletter'])){
        $coverLetter = $feedback['data']['coverletter'];
	  }
	  

      // Setting error values
      if(!empty($feedback['error']['price'])){
        $priceErr = $feedback['error']['price'];
      }
      
      if(!empty($feedback['error']['coverletter'])){
        $coverLetterErr = $feedback['error']['coverletter'];
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
					<h6 class="m-0 font-weight-bold text-primary mx-auto">Bid On Projects</h6> 
                </div>
				<div class="card-body mx-auto">

					<form method="post" enctype='multipart/form-data'>
<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label 
                        col-form-label-sm">Bid Price </label>
						<div class="col-sm-8">
                        <input type="number" min="<?php echo $project['budget_min']?>" max="<?php echo $project['budget_max']?>" oninput="validity.valid||(value='')" class="form-control" name="price" required value = "<?php echo $price;?>">
						<p>Allowed price range: <?php echo $project['budget_min']."--".$project['budget_max']?></p> 
                        <p class="errormessage"> <?php echo $priceErr;?> </p>
                        </div>
					</div>
					<!--  -->
					
					<!--  -->
					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">
                           Bid  Cover Letter </label>
						<div class="col-sm-8">
							<textarea cols="30" rows="5" class="form-control" name="coverletter" required><?php echo $coverLetter;?></textarea>
                             <p class="errormessage"><?php echo $coverLetterErr;?> </p>
						</div>
					</div>

				</div>
				<div class="form-group mx-auto">
					<button type="submit" name ="bid_btn" class="btn btn-block btn-primary"><i class="fa fa-check-circle"></i>Submit</button>
				</div>
					<!-- / -->
					</form>
					<!--  -->
			</div>
		</div>
	</div>

	
	<!--  -->

	<!--  -->
	<!-- included files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	</body>
	

	</html>