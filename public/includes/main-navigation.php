<!DOCTYPE html>
	<?php  
		require_once('../app/controllers/main.php');
		$mainController = new Controller\Main();
		
		$loginErr = "";

		if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login_btn'])){     
			$feedback = $mainController->validateLogin($_POST);
			if($feedback['valid'] == false){
			
				// Setting error values
				if(!empty($feedback['error']['login'])){
					$loginErr = $feedback['error']['login'];
				}

			}
		}
	?>

	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1 ">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../assets/css/guest/landing.css"> </head>
		<style>
				.navbar-collapse {
    -ms-flex-preferred-size: 100%;
    flex-basis: 100%;
    -ms-flex-positive: 1;
    flex-grow: 1;
    -ms-flex-align: center;
    align-items: center;
    text-align: center;
}
			.bg-light {
    background-color: rgb(86, 130, 232)!important;
}
		

			#profiledisplay{
				border-radius: 50%;
			}

			.errormessage {
				color: red;
				font-size: 10px;
			}
			li a{
				color: whitesmoke;
			}
			li a:hover{
				color: greenyellow;
			}
		</style>
	<body style="overflow-x: hidden;">
	
	
		<!--  navigation bar -->
	
		<nav class="navbar navbar-expand-md  bg-light fixed-top " role="navigation">
			<a class="navbar-brand  " href="<?php echo $_SESSION['baseurl'];?>public/main/home"> 
				<img ID="myImg" class="img-fluid d-none d-sm-block "
				 alt="logo" src="../assets/images/seralance-logo.png "> </a>
			<button class="navbar-toggler toggler-example"
			 type="button" data-toggle="collapse" data-target=
			 "#navbarSupportedContent" aria-controls="navbarSupportedContent"
			  aria-expanded="false" aria-label="Toggle navigation" 
			  style="border-color: black;border-width:3px;"> 
			  <span class="text-white"><i
            class="fas fa-bars fa-2x"></i></span> </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto ">
					<li class="nav-item col-sm-text-center">
						<a class="nav-link" href="<?php echo $_SESSION['baseurl'];?>public/main/home#how
">
							How it works?
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $_SESSION['baseurl'];?>public/main/home#offer
">
							what do we offer?
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $_SESSION['baseurl'];?>public/main/home#about">
							About Us
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $_SESSION['baseurl'];?>public/main/home#contact">
						Contact us
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $_SESSION['baseurl'];?>public/main/FAQ
">
                       FAQ
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link"  
						 href="<?php echo $_SESSION['baseurl'];?>public/seralancepolicy.docx" download>
					<i class="fa fa-download"></i> Policy 
						</a>
					</li>
				</ul>
				<ul class=" navbar-nav  ">
					<li class="nav-item" style="list-style-type: none;">
						<a class="nav-link" href="" id="login_prompt_btn" data-toggle="modal" data-target="#loginModal">
							Login
						</a>
					</li>
					<li class="nav-item dropdown mr-5" style="list-style-type: none;margin-right:100px">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							join
						</a>
						<div class="dropdown-menu mx-auto" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="signup/serviceprovider">
							Service provider
							</a>
							<a class="dropdown-item" href="signup/serviceseeker">
								Service Seeker
							</a>
						</div>
					</li>
					
	</ul>
			</div>
		</nav>
		<!-- login modal -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header ">
						<h5 class="modal-title mx-auto " id="exampleModalLabel">Login Form</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>
					<div class="modal-body col-sm-8 mx-auto">
						<!--  -->
						<form method="POST" autocomplete="">
							<p class="text-center">Login with your username and password.</p>
							<!-- alert -->
							<p class="errormessage" id="loginErr"><?php echo $loginErr;?></p>
							<!--  -->
							<div class="form-group">
								<input class="form-control" type="text" name="username" placeholder="Username"> </div>
							<div class="form-group">
								<input class="form-control" type="password" name="password" placeholder="Password" required> </div>
							<div class="link forget-pass text-left"> <a href="<?php echo $_SESSION['baseurl'];?>public/main/forgotpassword">Forgot username or password?</a></div>
							<div class="form-group">
								<input class="btn btn-primary btn-block " type="submit" name="login_btn" style="background-color: #6665ee;"> </div>
							<div class="link login-link text-center">Not yet a member?
								<br/> <a href="signup/serviceprovider" style="text-decoration: underline;">Signup now as service provider </a ></div>
                    <div class="link login-link text-center " style="margin-top:-30px;text-decoration: underline;"> <br/>
                    <a href="signup/serviceseeker">Signup now as service seeker</a></div>
						</form>
						<!--  -->
					</div>
				</div>
			</div>
		</div>
		<!--/login modal  -->
		<script>
			var element = document.getElementById('loginErr');
			if(element.innerHTML!==""){
				window.addEventListener('load',()=>{document.getElementById('login_prompt_btn').click();})
				
			}
		</script>