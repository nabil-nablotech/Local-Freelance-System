<!DOCTYPE html>
<?php include "config.php" ?>
	<html>

	<head>
		<title>
			<?php echo $lang['title'] ?>
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1 ">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="landing.css"> </head>
		<style>
			#profiledisplay{
				border-radius: 50%;
			}

			.errormessage {
				color: red;
				font-size: 10px;
			}
		</style>
	<body style="overflow-x: hidden;">
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
		<!--  navigation bar -->
		<nav class="navbar navbar-expand-lg fixed-top " style="background-color: whitesmoke!important;">
			<a class="navbar-brand" href="#"> <img ID="myImg" class="img-fluid " alt="logo" src="../assets/images/seralance-logo.png"> </a>
			<button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color:blue"> <span class="dark-blue-text"><i
            class="fas fa-bars fa-1x"></i></span> </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#how">
							<?php echo $lang['howitworks'] ?>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#offer">
							<?php echo $lang['whatwoweoffer'] ?>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#about">
							<?php echo $lang['aboutus'] ?>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#contact">
							<?php echo $lang['contactus'] ?>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="FAQ.php">
							<?php echo $lang['FAQ'] ?>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="policy.php">
							<?php echo $lang['policy'] ?>
						</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0 ">
					<li class="nav-item" style="list-style-type: none;">
						<a class="nav-link" href="" id="login_prompt_btn" data-toggle="modal" data-target="#loginModal">
							<?php echo $lang['signin'] ?>
						</a>
					</li>
					<li class="nav-item dropdown" style="list-style-type: none;">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $lang['join'] ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="signup/serviceprovider">
								<?php echo $lang['provider'] ?>
							</a>
							<a class="dropdown-item" href="signup/serviceseeker">
								<?php echo $lang['seeker'] ?>
							</a>
						</div>
					</li>
					<li class="nav-item dropdown" style="list-style-type: none;">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $lang['language'] ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?lang=am">
								<?php echo $lang['lang_am'] ?>
							</a>
							<a class="dropdown-item" href="index.php?lang=en">
								<?php echo $lang['lang_en'] ?>
							</a>
						</div>
					</li>
				</form>
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
							<div class="link forget-pass text-left"> <a href="registration/forgot-password.php">Forgot password?</a></div>
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