<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <script src="http://localhost/seralance/public/assets/js/loader.js"></script>
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   </head>
</html>
<style>
   #GoTopBtn {
   cursor: pointer;
   font-size: 0.9em;
   position: fixed;
   text-align: center;
   z-index: 9999;
   -webkit-transition: background-color 0.2s ease-in-out;
   -moz-transition: background-color 0.2s ease-in-out;
   -ms-transition: background-color 0.2s ease-in-out;
   -o-transition: background-color 0.2s ease-in-out;
   transition: background-color 0.2s ease-in-out;
   background: #121212;
   color: #fff;
   border-radius: 3px;
   padding-left: 11px;
   padding-right: 11px;
   padding-top: 11px;
   padding-bottom: 11px;
   right: 20px;
   bottom: 20px;
   }
   #GoTopBtn:hover {
   background-color: green;
   }
</style>
<body>
   <!--  navigation bar -->
   <?php require "includes/main-navigation.php" ?>
   <a href="" id ="top"></a>
   <!--  -->
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img class="d-block w-100" src="../assets/images/unsplash2.jpg" alt="First slide">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100" src="../assets/images/unsplash 1.jpg" alt="Second slide">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100" src="../assets/images/unsplash4.jpg" alt="Third slide">
         </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true" style="color: blue;"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
   </div>
   <!--  -->
   <!--  part 2 -->
   <div class="container fluid">
      <div class="row mt-2" >
         <div class="col-sm-6">
            <div class="jumbotron">
               <h2 style="margin-top: -40px; ">are you service seeker?</h2>
               <p>If you are a service seeker, Simply post a job you need completed and receive 
                  competitive bids from freelancers within minutes. Whatever your needs, 
                  there will be a freelancer to get it done: from web design, mobile app development,
                  virtual assistants,  and graphic design . It is the simplest way to 
                  get work done online.
               </p>
               </p>
               <a href="registration\SSRegistration.php" class="btn btn-success btn-lg ml-5">Get Started</a>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="jumbotron">
               <h2 style="margin-top: -40px; ">Are you service provider?</h2>
               <p>If you are an expert in any kind of computer related or online work, then do not hesitate to join our platform. It is easy to use and payment is secured. It is a great platform to those people who are skillful. So do not miss the chance to explore the job posts and make some money.</p>
               <p></p>
               <a href="registration\SPRegistration.php" class="btn btn-success btn-lg ml-5">Get Started</a>
            </div>
         </div>
      </div>
   </div>
   <!--  -->
   <!--How it works-->
   <div style="background:#cce5ff" >
      <div class="container text-center" style="padding:4%;"id="how" >
         <div class="container text-center" style="padding:4%;" >
            <h1 class="card header2" style="background:#007BFF ;"  >How it works</h1>
            <div class="row card" style="padding:30px 60px 30px 60px;margin:30px; ">
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-sm-6">
                        <h3>Post Projects For Free</h3>
                        <p>It's always free to post your project. You’ll automatically begin to receive bids from our freelancers. 
                           Also, you can browse through the talent available on our site, and contact them by the contact information.
                        </p>
                     </div>
                     <div class="col-sm-6">
                        <img src="../assets/images/project.jpg" width="200px" height="150px">
                     </div>
                  </div>
               </div>
            </div>
            <div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
               <div class="row">
                  <div class="col-lg-6">
                     <h3>Deposit Money Safely</h3>
                     <p>We have a complete security to your valuable money. You have the rights to pay the deposited money
                        after the project completed. We have a good refund policy to make sure of satisfaction of the project
                        completed.
                     </p>
                  </div>
                  <div class="col-sm-6">
                     <img src="../assets/images/deposit.png" width="200px" height="150px">
                  </div>
               </div>
            </div>
            <div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
               <div class="row">
                  <div class="col-lg-6">
                     <h3>Feel Free To Talk</h3>
                     <p>It is easier to talk with the freelancers here. So before you hire any freelancer feel free to talk with them. Tell them what you need and get the project done in the shortest possible time.</p>
                  </div>
                  <div class="col-lg-6">
                     <img src="../assets/images/message.png" width="200px" height="150px">
                  </div>
               </div>
            </div>
            <div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
               <div class="row">
                  <div class="col-lg-6">
                     <h3>Build A service seeker Profile</h3>
                     <p>If you have a lot of works to be done or run a small business that needs some freelancers in a daily basis, this is the perfect place for you. Build your employer profile today and start hiring.</p>
                  </div>
                  <div class="col-lg-6">
                     <img src="../assets/images/profile.jpg" width="200px" height="150px" >
                  </div>
               </div>
            </div>
            <!--End How it works-->
            <h1 class="card header2" style="background:#007BFF; " id="offer"  >what do we offer?</h1>
            <!--  what do we offor -->
            <div class="row card" style="padding:30px 60px 30px 60px;margin:30px;" >
               <div class="row" >
                  <div class="col-lg-6">
                     <p>We have a complete security to your valuable money. You have the rights to pay the deposited money
                        after the project completed. We have a good refund policy to make sure of satisfaction of the project
                        completed.
                     </p>
                  </div>
                  <div class="col-sm-6">
                     <img src="../assets/images/offer.jpg" width="200px" height="150px" >
                  </div>
               </div>
            </div>
            <!-- about us -->
            <h1 class="card header2" style="background:#007BFF; " id="about" >about us</h1>
            <div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
               <div class="row">
                  <div class="col-lg-6">
                     <p>We have a complete security to your valuable money. You have the rights to pay the deposited money
                        after the project completed. We have a good refund policy to make sure of satisfaction of the project
                        completed.
                     </p>
                  </div>
                  <div class="col-sm-6">
                     <img src="../assets/images/seralance-logo.png">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  -->
     
               <!-- contact us -->
               <section class="">
                  <!--Grid row-->
                  <div class="row">
                     <!--Grid column-->
                     <div class="col-lg-4 col-md-3 col-sm-12 mb-4 mb-md-0 mr-5" style="margin-left: 50px;;">
                        <h5 class="text-uppercase text-center" style="color: black;">Map</h5>
                        <iframe width="300" height="200"
                           id="gmap_canvas" src="https://maps.google.com/maps?q=addis%20ababa%20university&t=&z=13&ie=
                           UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>
                     </div>
                     <!--Grid column-->
                     <!--Grid column-->
                     <div class="col-lg-3 col-md-3 col-sm-12 mb-md-0 ml-5 ">
                        <h3 style="color: black;">follow us</h3>
                        <a href="https://www.facebook.com/mulugeta.adamu.4/" target="_blank">
                           <p style="font-size:20px;"><i class="fab fa-facebook-square"> Facebook</i></p>
                        </a>
                        <a href="#" target="_blank">
                           <p style="font-size:20px;color:#D34438;"><i class="fab fa-google-plus-square"> Google</i></p>
                        </a>
                        <a href="https://twitter.com/login" target="_blank">
                           <p style="font-size:20px;color:#2CAAE1;"><i class="fab fa-twitter-square"> Twitter</i></p>
                        </a>
                        <a href="https://www.linkedin.com/in/mulugeta-adamu-a92007196/" target="_blank">
                           <p style="font-size:20px;color:#0274B3;"><i class="fab fa-linkedin"> Linkedin</i></p>
                        </a>
                        <a href="#"><i class="fa fa-phone"> 0983054774</i> </a>
                     </div>
                     <!--Grid column-->
                     <!--Grid column-->
                     <div class="col-lg-3 col-md-3  col-sm-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase  mx-auto" style="color: black;">message us</h5>
                        <form>
                           <div class="form-group">
                              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Full Name">
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                           </div>
                           <div class="form-group">
                              <textarea  class="form-control" rows="3" cols="10" id="formGroupExampleInput2" placeholder="message"> </textarea>
                           </div>
                           <button class="btn-primary"> submit</button>
                        </form>
                     </div>
                     <!--Grid column-->
                  </div>
               </section>
         

         <!--Footer-->
         <hr style="color: #3B579D; border-style:double; border-color:black; border-width:100%!important; ">
         <div class="text-center" style="padding:2%;color:blue;margin-top:1px;">
            <script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>&copy; Serelance.plc All rights reserved.  
            <button onclick="GoTopFunction()" id="GoTopBtn" title="Go to top" 
               data-toggle="tooltip" data-placement="top" title="Tooltip on top"
               scroll to top
               ><i class="fa fa-2x fa-arrow-up" aria-hidden="true"></i></button>
            <script>
               window.onscroll = function() {
                 scroll()
               };
               
               function scroll() {
                 if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
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
   </div>
   </div>
</body>
</html>