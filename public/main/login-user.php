<?php require_once "controllerUserData.php";
require_once "../navigationbar.php";
?>
<script>
    
/* var img = document.createElement("img");
 
img.src = "/Image/Seralance logo.png";
var src = document.getElementById("myImg");
 
src.appendChild(img); */
//document.getElementById("myImg").src = "/Image/Seralance logo.png";

</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your username and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input onclick="location.href='../ServiceSeeker/Home.php'" class="form-control button" type="submit" name="login" value="Login">
                       
                    </div>
                    <div class="link login-link text-center">Not yet a member? <br/>
                    <a href="SPRegistration.php" style="text-decoration: underline;">Signup now as service provider </a ></div>
                    <div class="link login-link text-center " style="margin-top:-30px;text-decoration: underline;"> <br/>
                    <a href="SSRegistration.php">Signup now as service seeker</a></div>
                </form>
            </div>
        </div>
    </div>  
    
</body>
</html>