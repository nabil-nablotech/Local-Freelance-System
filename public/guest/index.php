<!--  navigation bar -->
<?php
   include "config.php";
   include "navigationbar.php"
   ?>
	<a href="" id="top"></a>
	<!--  -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active"> <img class="d-block w-100" src="Image\unsplash2.jpg" alt="First slide"> </div>
			<div class="carousel-item"> <img class="d-block w-100" src="Image\unsplash 1.jpg" alt="Second slide"> </div>
			<div class="carousel-item"> <img class="d-block w-100" src="Image\unsplash4.jpg" alt="Third slide"> </div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true" style="color: blue;"></span> <span class="sr-only">Previous</span> </a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
	</div>
	<!--  -->
	<!--  part 2 -->
	<div style="background-color:aliceblue;">
		<div class="container fluid">
			<div class="row mt-2">
				<div class="col-sm-6">
					<div class="card shadow-sm mb-4">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary mx-auto"><bold>are you a service seeker?</bold></h6> </div>
						<div class="card-body">
							<p> Simply post a job you need completed and receive competitive bids from freelancers within minutes. Whatever your needs, there will be a freelancer to get it done: from web design, mobile app development, virtual assistants, and graphic design . It is the simplest way to get work done online. </p> <a href="registration\SSRegistration.php" class="btn btn-success btn-md ml-5">Get Started</a> </div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card shadow-sm mb-4">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary mx-auto">are you a service provider?</h6> </div>
						<div class="card-body">
							<p>If you are an expert in any kind of computer related or online work, then do not hesitate to join our platform. It is easy to use and payment is secured. It is a great platform to those people who are skillful.</p>
							<p> <a href="registration\SPRegistration.php" class="btn btn-success btn-md ml-5">Get Started</a> </div>
					</div>
				</div>
			</div>
			<!--  -->
			<!--How it works-->
			<div class="container text-center" style="padding:4%;" id="how">
				<div class="container text-center" style="padding:4%;">
					<h1 class="card header2" style="background:#007BFF ;">How it works</h1>
					<div class="row card" style="padding:30px 60px 30px 60px;margin:30px; ">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-sm-6">
									<h3>Post Projects For Free</h3>
									<p>It's always free to post your project. You’ll automatically begin to receive bids from our freelancers. Also, you can browse through the talent available on our site, and contact them by the contact information. </p>
								</div>
								<div class="col-sm-6"> <img src="Image\project.jpg" width="200px" height="150px"> </div>
							</div>
						</div>
					</div>
					<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
						<div class="row">
							<div class="col-lg-6">
								<h3>Deposit Money Safely</h3>
								<p>We have a complete security to your valuable money. You have the rights to pay the deposited money after the project completed. We have a good refund policy to make sure of satisfaction of the project completed. </p>
							</div>
							<div class="col-sm-6"> <img src="Image\deposit.png" width="200px" height="150px"> </div>
						</div>
					</div>
					<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
						<div class="row">
							<div class="col-lg-6">
								<h3>Feel Free To Talk</h3>
								<p>It is easier to talk with the freelancers here. So before you hire any freelancer feel free to talk with them. Tell them what you need and get the project done in the shortest possible time.</p>
							</div>
							<div class="col-lg-6"> <img src="image/message.png" width="200px" height="150px"> </div>
						</div>
					</div>
					<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
						<div class="row">
							<div class="col-lg-6">
								<h3>Build  Profile</h3>
								<p>If you have a lot of works to be done or run a small business that needs some freelancers in a daily basis, this is the perfect place for you. Build your employer profile today and start hiring.</p>
							</div>
							<div class="col-lg-6"> <img src="image/profile.jpg" width="200px" height="150px"> </div>
						</div>
					</div>
					<!--End How it works-->
					<h1 class="card header2" style="background:#007BFF; " id="offer">what do we offer?</h1>
					<!--  what do we offor -->
					<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
						<div class="row">
							<div class="col-lg-6">
								<p>We have a complete security to your valuable money. You have the rights to pay the deposited money after the project completed. We have a good refund policy to make sure of satisfaction of the project completed. </p>
							</div>
							<div class="col-sm-6"> <img src="image/offer.jpg" width="200px" height="150px"> </div>
						</div>
					</div>
					<!-- about us -->
					<h1 class="card header2" style="background:#007BFF; " id="about">about us</h1>
					<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
						<div class="row">
							<div class="col-lg-6">
								<p>We have a complete security to your valuable money. You have the rights to pay the deposited money after the project completed. We have a good refund policy to make sure of satisfaction of the project completed. </p>
							</div>
							<div class="col-sm-6"> <img src="Image\Seralance logo.png"> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  -->
		<p id="contact"></p>
		<?php include "footer.php"; ?>
			<!--Footer-->
			<button onclick="GoTopFunction()" id="GoTopBtn" title="Go to top" data-toggle="tooltip" data-placement="top" title="Tooltip on top" scroll to top><i class="fa  fa-arrow-up" aria-hidden="true"></i></button>
			<script>
			window.onscroll = function() {
				scroll()
			};

			function scroll() {
				if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("GoTopBtn").style.display = "block";
				} else {
					document.getElementById("GoTopBtn").style.display = "none";
				}
			}

			function GoTopFunction() {
				document.documentElement.scrollTop = 0;
			}
			</script>
	</div>
	</div>
	</div>
	</div>
	<!-- included files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<!--  -->
	</body>

	</html>
	<!--  -->