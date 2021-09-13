<?php

   require "includes/service_provider-navigation.php";
   $projects = $serviceProviderController->getProjects();
   ?>
		<script>
		document.title = "Service provider-Find project";
		</script>
<!-- 	     <link rel="stylesheet" href="../assets/css/findproject.css"> 
 -->
	</head>
			
	<style> 
.profile-list-title {
			margin: -4px 0 0;
			font-size: 18px;
			font-weight: 700;
			line-height: 1.5em;
			color:blue !important;;
		}
		.profile-item :hover {
			background-color: #f7fafa;
		}

		.profile-list-info a:hover{background-color:blue}
		
	ul li{
		list-style-type: none;
	}
	body{
		background-color: #f5f8fa;
	}

</style>
				<!-- Title Header Start -->

				<div class="container-fluid " style="background-color: #f5f8fa;" >
					<div class="row">
				<div class="col-sm-12 mt-5 " >
					<div class="col-sm-10 mx-auto " style="margin-top: 50px!important;">
					<div class="card mb-4"  style="background-color: #e4ecf2;">
						<div class="card-body">
					<h1 class="text-center" style="  font-size: calc(100% + 1vw + 1vh);
">Available  Projects</h1>
					</div>
					</div>
					</div>
					 <!--  -->
					<div class="col-sm-10 mx-auto"> 
	<div class="card shadow-sm mb-4">
	<div class="card-body">
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 ">
		<label style="font-weight: bolder;" class="mx-auto">  Search Project </label>

						<!--  -->	
						<div class="input-group  mb-3">
										<input name="project" type="text" class="form-control" required aria-label="Search project" placeholder="Enter project title">
										<div class="input-group-append"> <button class="btn btn-primary" type="submit" name="search_btn"><i class="fa fa-search"></i></button> </div>
									</div>
		</div>

		<div class="col-sm-4 mx-auto ">
					<!--  -->	
		<label style="font-weight: bolder;" class="mx-auto">  Filter By Category </label>

        <div class="form-group mx-auto">
            <select class="form-control" name="category">
                <option value="">Select Category</option>
                <option value="graphics">Graphics and Design</option>
                <option value="writing">Writing and Translation</option>
				<option value="video">Video and Animation</option>
				<option value="programming">Programing and Tech</option>
            </select>
        </div>
    
		</div>
		<div class="col-sm-4 mx-auto">
			<!--  -->	<label style="font-weight: bolder;"> Filter By Price Range </label>
	<div class="form-group row  mx-auto" id="price_filter">
					
					
						<div class="col-sm-6 mb-3">
							<input type="number" class="form-control" min=100 oninput="validity.valid||(value='')" class="form-control" name="minprice" required value = "<?php echo $minBudget;?>"> </div>
						<div class="col-sm-6 ">
							<input type="number" class="form-control" min=1000 oninput="validity.valid||(value='')" class="form-control" name="maxprice" required value = "<?php echo $maxBudget;?>"> </div>
					</div>

			<!--  -->
		</div>
	</div>
</div>
</div>
	</div>

						<!--  -->
							<div class="row">
								<div class="col-md-12">
									<!-- Single Candidate List -->
									<div class="card shadow-sm mb-4">
										<div class="card-body">
											<!-- contents goes here -->
											<div class="table table-responsive ">
												
											<table id="table" class="table table-bordered table-striped">
													<tbody>
														<!--  -->
														<!--  -->
														<!--  -->
			<div class="card mt-0" style="border: none;list-style-type:none;">
							<ul class="container-fluid">
															<?php

                                             if (empty($projects)) {
                                                 echo "<h2>No projects found</h2>";
                                             } else {
                                                 foreach ($projects as $project) {
                                                     $myskill = "";
                                                     if (empty($project['skill'])) {
                                                         $myskill = "Not mentioned";
                                                     } else {
                                                         foreach ($project['skill'] as $skill) {
                                                             $myskill .= $skill['skill_name']." | ";
                                                         }
                                                     }
                                                     echo <<<EOT
                                                <li class="profile-item mb-3">
                                                <div class="profile-list-wrap pl-4 pt-3">
                                                <h2 class="profile-list-title">
                                                {$project['title']}
                                                </h2>

                                                <p class="profile-list-subtitle mb-3 "><strong>Category: </strong> {$project['category']} <strong class='ml-2'> Budget : </strong>{$project['budget_min']}-{$project['budget_max']} birr  <strong class='ml-2'>5 Bids  </strong> <strong class="ml-4">Required skills: </strong> {$myskill} </p>
                                                

                                                <div>
                                                <p>{$project['description']}</p>
                                                </div>

                                                <div class="profile-list-info form-group row mx-auto">
                                                <div  class='mb-2'> <a href="http://localhost/seralance/public/serviceprovider/viewproject/{$project['project_id']}"  class=" btn-sm  btn btn-primary mr-5">View details</a> <a href="http://localhost/seralance/public/serviceprovider/bid/{$project['project_id']}" class=" btn-sm  btn btn-primary ">Bid</a> </div>
                                                </div>

                                                <div class=" d-flex justify-content-between mb-1 " <strong>Posted by:</strong> {$project['announced_by']}  <strong class='mr-2'>Date:{$project['announced_date']}</strong> </div>                    
                                                </div>
                                                </li>
                                                EOT;
                                                 }
                                             }
                                                     ?>
															</ul>
														</div>
													</tbody>
												</table>
<div >

<!--  -->


<!--  -->
</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</section>
		</div>
	</div>
	</div>


	<?php
		require "includes/service_seeker-footer.php";
   ?>

		</body>

		</html>