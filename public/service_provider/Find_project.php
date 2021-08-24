<?php
   require "includes/service_provider-navigation.php";
   $projects = $serviceProviderController->getProjects();
   ?>

<head>
		<style>
		body{
			overflow-x: hidden;
		}
		
		
		.fre-profile-list {
			margin: 0;
			padding: 0;
		}
		
      .profile-item :hover {
			background-color: #f7fafa;
		}

		.profile-list-wrap {
			position: relative;
			padding-bottom: 26px;
			border-bottom: 1px solid #ededed;
		}
		
		.profile-list-avatar {
			display: inline-block;
			width: 60px;
			height: 60px;
			position: absolute;
			left: 0;
		}
		
		.profile-list-avatar img {
			width: 100%;
			height: auto;
			border-radius: 50%;
		}
			
	
		
		img {
			border: 0;
		}
		
		a,
		a:focus,
		a:hover {
			color: #00b0ff;
			text-decoration: none!important;
			outline: none;
		}
		
		.profile-list-title {
			margin: -4px 0 0;
			font-size: 18px;
			font-weight: 700;
			line-height: 1.5em;
		}
		
		.profile-list-title a {
			color: #415161;
		}
		
		.profile-list-subtitle {
			margin: 6px 0 0;
			font-size: 12px;
			color: #415161;
			line-height: 1.3em;
		}
		

	
		
		.profile-list-info span {
			display: inline-block;
			font-size: 16px;
			font-weight: 400;
			color: #415161;
		
			line-height: 16px;
			margin-top: 6px;
			margin-bottom: 6px;
		}
		
	
		
		
		
		.profile-list-info span {
			display: inline-block;
			font-size: 16px;
			font-weight: 400;
			color: #415161;
			margin-right: 30px;
			line-height: 16px;
			margin-top: 6px;
			margin-bottom: 6px;
		}
		
		.profile-list-info span>b {
			font-weight: 600;
		}
		
		.profile-list-info span:last-child {
			font-weight: 600;
			margin-right: 0;
			border: none;
		}
		
		.profile-list-desc {
			margin: 14px 0 0;
		}
		
		.profile-list-desc p {
			margin: 0;
			font-size: 16px;
			color: #415161;
			line-height: 1.8em;
			-o-text-overflow: ellipsis;
			text-overflow: ellipsis;
			overflow: hidden;
			white-space: nowrap;
		}
		</style>
		<script>
		document.title = "Service seeker-Home";
		</script>
		<link rel="stylesheet" href="../assets/css/service_seeker/browsestyle.css"> </head>
	<div class="row" style="margin-top: 100px;">
		<div class="col-md-12 col-sm-12">
			<!-- Single Candidate List -->
			<div class="card-body px-0">
				<!--  -->
				<!-- Title Header Start -->
				<section class="inner-header-title" style="background-image:url(../assets/images/back3.jpg);text-align:center;">
					<h1 style="font-size: xx-large;">Advance Search</h1> </div>
			</section>
			<!--  -->
			<section class="advance-search">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="full-sidebar-wrap">
								<div class="show-hide-sidebar hidden-xs hidden-sm">
									<!-- Search Job -->
									<div class="sidebar-widgets">
										<div class="ur-detail-wrap">
											<h1>Search Filters</h1>
											<!-- 										<span><button class="btn btn-danger">clear results</button> </span>  
 -->
											<hr>
											<div class="ur-detail-wrap-header">
												<h6>
                                 <bold>Search By Category</bold>
                              </h6> </div>
											<div class="ur-detail-wrap-body">
												<div class="input-group">
													<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
													<div class="input-group-append"> <span class="input-group-text"><i class="fa fa-search"></i></span> </div>
												</div>
												<ul class="advance-list">
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="aw">
                                    <label for="aw"></label>
                                    </span> Graphics and Design </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="dd">
                                    <label for="dd"></label>
                                    </span> Writing and Translation</li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="er">
                                    <label for="er"></label>
                                    </span> Video and Animation </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="tr">
                                    <label for="tr"></label>
                                    </span> Programming and Tech </li>
												</ul>
											</div>
										</div>
									</div>
									<!-- filter by rating -->
									<div class="sidebar-widgets mt-3">
										<div class="ur-detail-wrap">
											<div class="ur-detail-wrap-header">
												<h6>Filter By Rating</h6> </div>
											<div class="ur-detail-wrap-body">
												<ul class="advance-list">
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="uy">
                                    <label for="uy"></label>
                                    </span> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="io">
                                    <label for="io"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="lo">
                                    <label for="lo"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="kj">
                                    <label for="kj"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="kj">
                                    <label for="kj"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa  fa-star">

									 </i> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" id="kj">
                                    <label for="kj"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </li>
												</ul>
											</div>
											<button class="btn btn-primary btn-block">filter results</button>
										</div>
									</div>
									<!-- /rating -->
								</div>
							</div>
						</div>
						<!--Browse Candidates -->
						<div class="col-sm-8">
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
														<div class="card mt-0" style="border: none;">
															<ul class="container">
															<?php
                                             if(empty($projects)){
                                                echo "<h2>No projects found</h2>";
                                             }
                                             else{
															 foreach($projects as $project){
                                                $myskill = "";
                                                if(empty($project['skill'])){
                                                   $myskill = "Not mentioned";
                                                }
                                                else{
                                                   foreach($project['skill'] as $skill){
                                                      $myskill .= $skill['skill_name']." | ";
                                                   }
                                                }
                                                echo <<<EOT
                                                <li class="profile-item mb-3">
                                                <div class="profile-list-wrap pl-4 pt-3">
                                                <h2 class="profile-list-title">
                                                {$project['title']}
                                                </h2>

                                                <p class="profile-list-subtitle mb-3 "><strong>Category: </strong> {$project['category']}  <strong class="ml-4">Required skills: </strong> {$myskill} </p>
                                                

                                                <div>
                                                <p>{$project['description']}</p>
                                                </div>

                                                <div class="profile-list-info">
                                                <div > <a href="http://localhost/seralance/public/serviceprovider/viewproject/{$project['project_id']}" class="d-inline btn-sm  btn btn-primary mr-5">View details</a> <a href="http://localhost/seralance/public/serviceprovider/bid/{$project['project_id']}" class="d-inline  btn-sm  btn btn-primary mr-5">Bid</a> </div>
                                                </div>
                                                <div class="mt-3 mb-4">
                                                   <p class="profile-list-subtitle  float-left "> <strong>Posted by:</strong> {$project['announced_by']} </p>
                                                   <p class="profile-list-subtitle float-right mr-4 "> <strong>{$project['announced_date']}</strong> </p>
                                                </div>
                                                
                                                </div>
                                                </li>
                                                EOT;
																
                                              }
                                             }
																?>
															</ul>
														</div>
														<!--  -->
														<!--  -->
													</tbody>
												</table>
											</div>
											<!--  -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	</section>

		<script >
		$(document).ready(function() {
			$("#table").DataTable();
		});
		</script>
		</body>

		</html>