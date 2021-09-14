<?php 
    require "includes/main-navigation.php";

    require_once('../app/controllers/main.php');
    
    $emailErr = "";

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['forgot_btn'])){     
        $feedback = $mainController->validateForgotPassword($_POST);
        if($feedback['valid'] == false){
        
            // Setting error values
            if(!empty($feedback['error']['email'])){
                $emailErr = $feedback['error']['email'];
            }

        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form  method="POST" >
                    <h2 class="text-center">Forgot Username or Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                        <p class="errormessage"> <?php echo $emailErr;?> </p>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="forgot_btn" value="Continue">
                    </div>
                </form>

                
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
    <script>
$(document).ready(function() {
//Preloader
preloaderFadeOutTime = 300;
function hidePreloader() {
var preloader = $('.spinner-wrapper');
preloader.fadeOut(preloaderFadeOutTime);
}
hidePreloader();
});
</script>  
    
</body>
</html>