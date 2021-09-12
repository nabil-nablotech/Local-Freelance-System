<?php
   require "includes/service_seeker-navigation.php";

   if($_SERVER["REQUEST_METHOD"] === "POST"){
		$serviceProviders = $serviceSeekerController->getServiceProviders($_POST);
   }
   else{
	$serviceProviders = $serviceSeekerController->getServiceProviders();
   }
   
?>

	<head>
	
		<style>
	body{
			overflow-x: hidden;
			background-color: #f0f5f7
			
		}
		.profile-item :hover {
			background-color: #f7fafa;
		}
		.justify-content-start a:hover{background-color:blue}
		
		.fre-profile-list {
			margin: 0;
			padding: 0;
		}
		/* list-style-type: none; */
		
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
			padding-left: 80px;
			font-size: 18px;
			font-weight: 700;
			line-height: 1.5em;
		}
		
		.profile-list-title a {
			color: #415161;
		}
		
		.profile-list-subtitle {
			margin: 0 0 0;
			padding-left: 0px;
			font-size: 16px;
			color: #415161;
			line-height: 1.3em;
		}
		
		.profile-list-info {
			padding-left: 80px;
			margin: 8px 0 0;
		}
		
		.profile-list-info span.rate-it {
			font-size: 14px;
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
		document.title = "Service seeker-Browse providers";
		</script>
		<link rel="stylesheet" href="../assets/css/service_seeker/browsestyle.css"> </head>
		<div class="row" style="margin-top: 100px;" style="background-color:#f5f8fa;
" >
		<div class="col-md-12 col-sm-12">
			<!-- Single Candidate List -->
			<div class="card-body px-0">
				<!--  -->
				<!-- Title Header Start -->
				<section class="inner-header-title" style="background-image:url(../assets/images/back3.jpg);text-align:center;">
					<h1 style="font-size: xx-large;">Browse Service  provider </h1> </div>
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
											
												<h6>
                                 <bold>Search specific service provider</bold>
                              </h6> 
							  		<form method="POST">		
									<div class="input-group mt-3 mb-3">
										<input name="serviceprovider" type="text" class="form-control" aria-label="Search service provider" placeholder="Enter service provider's username">
										<div class="input-group-append"> <button class="btn btn-primary" type="submit" name="search_btn"><i class="fa fa-search"></i></button> </div>
									</div>
									</form>
									<form method="POST">
									<div class="ur-detail-wrap-header">
									<h6>
										<bold>Filter by skill category</bold>
									</h6> </div>
									<div class="ur-detail-wrap-body">
										<ul class="advance-list">
											<li> <span class="custom-checkbox">
                                    <input type="checkbox" name="category[]" value="1" id="aw">
                                    <label for="aw"></label>
                                    </span> Graphics and Design </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" name="category[]" value="2" id="dd">
                                    <label for="dd"></label>
                                    </span> Writing and Translation</li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" name="category[]" value="3" id="er">
                                    <label for="er"></label>
                                    </span> Video and Animation </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" name="category[]" value="4" id="tr">
                                    <label for="tr"></label>
                                    </span> Programming and Tech </li>
												</ul>
											</div>

											<div class="ur-detail-wrap-header mt-3">
									<h6>
										<bold>Filter by experience</bold>
									</h6> </div>
									<div class="ur-detail-wrap-body">
										<ul class="advance-list">
											<li> <span class="custom-checkbox">
                                    <input type="checkbox" name="experience[]" value="1" id="aw">
                                    <label for="aw"></label>
                                    </span> Advanced </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" name="experience[]" value="2" id="dd">
                                    <label for="dd"></label>
                                    </span> Medium </li>
													<li> <span class="custom-checkbox">
                                    <input type="checkbox" name="experience[]" value="3" id="er">
                                    <label for="er"></label>
                                    </span> Beginner </li>
												</ul>
											</div>
										
											<div class="ur-detail-wrap-header mt-3">
												<h6>Filter By Rating</h6> </div>
											<div class="ur-detail-wrap-body">
												<ul class="advance-list">
													<li> <span class="custom-checkbox">
                                    <input name="rate[]" value="1" type="checkbox" id="uy">
                                    <label for="uy"></label>
                                    </span> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input name="rate[]" value="2" type="checkbox" id="io">
                                    <label for="io"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input name="rate[]" value="3" type="checkbox" id="lo">
                                    <label for="lo"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input name="rate[]" value="4" type="checkbox" id="kj">
                                    <label for="kj"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </li>
													<li> <span class="custom-checkbox">
                                    <input name="rate[]" value="5" type="checkbox" id="kj">
                                    <label for="kj"></label>
                                    </span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa  fa-star"> </i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </li>
													
												</ul>
											</div>
											<button class="btn btn-primary btn-block" type="submit" name="filter_btn">Filter results</button>
									</form>
										</div>
									</div>
									<!-- /rating -->
								</div>
							</div>
						
						</div>
						<!--Browse Candidates -->
						<!--Browse Candidates -->
						<div class="col-sm-8">
							<div class="row">
								<div class="col-md-12">
									<!-- Single Candidate List -->
									<div class="card shadow-sm mb-4">
										<div class="card-body">
											<!-- contents goes here -->
											<div class="table table-responsive mt-5 ">
												
											<table id="table" class="table table-bordered table-striped">
													<tbody>
														<!--  -->
														<!--  -->
														<!--  -->
														<div class="card" style="border: none;">
															<ul class="container">
															<?php

                                                            if (empty($serviceProviders)) {
                                                                echo "<h2>No service providers found</h2>";
                                                            } else {
                                                                foreach ($serviceProviders as $serviceProvider) {
                                                                    $myskill = "";
                                                                    foreach ($serviceProvider['skill'] as $skill) {
                                                                        $myskill .= $skill['skill_name']."| ";
																	}
																	$rating = number_format($serviceProvider['rate']['score'],2);
                                                                    echo <<<EOT
																				<div class="col-sm-12">
																				<li class="profile-item mb-3">
																				<div class="profile-list-wrap">
																					<a class="profile-list-avatar pl-3 pt-2 pb-2">
																						<img alt='' src="http://localhost/seralance/{$serviceProvider['profile_photo']}" 
																						class='avatar avatar-96 photo avatar-default' height='auto' width='20%' /> 
																					</a>
																					<h2 class="profile-list-title">
																					<a>{$serviceProvider['firstname']} {$serviceProvider['lastname']}</a>
																					</h2>
																					
																					<div class="profile-list-info">
																						<div class="profile-list-detail"> 
																						<span class="profile-list-subtitle">
																						{$myskill}</span>
																						<span><strong>Education: </strong>{$serviceProvider['education']}</span>
																						<span> <strong>Experience: </strong>
																						{$serviceProvider['experience']}
																						</span>
																						<span>
																							<i class="fa fa-star text-warning" data-score="4"></i>
																							{$rating}
																						</span> 

																							<span>{$serviceProvider['rate']['totalreviews']} reviews</span> 
																							
																						</div>
																						<div>
																						<p>{$serviceProvider['summary']}</p>

																						<div class="d-flex justify-content-start mb-2"> <a href=
																					"http://localhost/seralance/public/serviceseeker/hire/{$serviceProvider['username']}" 
																					class=" btn-sm  btn btn-primary mr-2">Hire</a>  <a href=
																					"http://localhost/seralance/public/serviceseeker/viewproviderprofile/{$serviceProvider['username']}" 
																					class=" btn-sm  btn btn-primary mr-5">View profile</a> 
																					</div>
																					
																						</div>
																						
																					</div>
																				</div>
																			</li>
																			</div>
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
						
						<!--  -->
					</div>
				</div>
		</div>
	</div>
	</section>
	<?php
		require "includes/service_seeker-footer.php";
   ?>

		<script >
		$(document).ready(function() {
			$("#table").DataTable();
		});
		</script>
		</body>

		</html>