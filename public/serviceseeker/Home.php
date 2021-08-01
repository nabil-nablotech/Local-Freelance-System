<?php
   include "navigation.php";
   include "../config.php";
   ?>
<style>
   input[type=text] {
   width: 430px;
   }
   .jumbotron {
   padding-top: 25px;
   padding-right: 25px;
   padding-bottom: 25px;
   padding-left: 25px;
   }
   /*  */
</style>
<head>
   <script>
      document.title="Service seeker-Home";
   </script>
</head>
<div class="container mb-3" style="margin-top:100px;">
   <div class="row">
      <div class="jumbotron mx-auto " style=" width:50%;   padding-top: 10px !important;
         padding-bottom: 10px !important;   padding-left: 2px !important;
         padding-right: 2px !important;" >
         <div class="col-sm-12 mx-auto">
            <div class="input-group">
               <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
               <div class="input-group-append">
                  <button type="button" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
                  <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="#">By skill</a>
                     <a class="dropdown-item" href="#">By Rating</a>
                     <!--  <a class="dropdown-item" href="#">Something else here</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--  -->
<div class="card " style="width:100%">
   <div class="container-fluid" style="margin-top:30px">
      <div class="row mx-auto">
         <!--  column 1 -->
         <div class="col-sm-3 ml-5 mr-5">
            <div class="jumbotron" >
               <div class="card text-center" style="border-style: none; background-color:#e9ecef;" >
                  <img class="card-img-top mx-auto " src="p.jpg" alt="Card image"  style="border-radius:400px; width:80px; ">
                  <div class="card-body">
                     <h4 class="card-title ">Mulugeta Adamu</h4>
                     <span class="card-text"> Front End developer</span>
                     <a href="profile.php" class="btn btn-primary btn-sm mt-2 mx-auto">View Profile</a>
                  </div>
               </div>
            </div>
         </div>
         <!--  column 2 -->
         <!--  -->
         <div class="col-sm-3 ml-5 mr-5">
            <div class="jumbotron" >
               <div class="card text-center" style="border-style: none; background-color:#e9ecef;" >
                  <img class="card-img-top mx-auto " src="p.jpg" alt="Card image"  style="border-radius:400px; width:80px; ">
                  <div class="card-body">
                     <h4 class="card-title ">Mulugeta Adamu</h4>
                     <span class="card-text"> Front End developer</span>
                     <a href="#" class="btn btn-primary btn-sm mt-2 mx-auto">View Profile</a>
                  </div>
               </div>
            </div>
         </div>
         <!--  -->
         <!-- column 3 -->
         <div class="col-sm-3 ml-5">
            <div class="jumbotron" >
               <div class="card text-center" style="border-style: none; background-color:#e9ecef;" >
                  <img class="card-img-top mx-auto " src="p.jpg" alt="Card image"  style="border-radius:400px; width:80px; ">
                  <div class="card-body">
                     <h4 class="card-title ">Mulugeta Adamu</h4>
                     <span class="card-text"> Front End developer</span>
                     <a href="#" class="btn btn-primary btn-sm mt-2 mx-auto">View Profile</a>
                  </div>
               </div>
            </div>
         </div>
         <!--  column 4-->
         <!--  -->
         <div class="col-sm-3 ml-5 mr-5">
            <div class="jumbotron" >
               <div class="card text-center" style="border-style: none; background-color:#e9ecef;" >
                  <img class="card-img-top mx-auto " src="p.jpg" alt="Card image"  style="border-radius:400px; width:80px; ">
                  <div class="card-body">
                     <h4 class="card-title ">Mulugeta Adamu</h4>
                     <span class="card-text"> Front End developer</span>
                     <a href="#" class="btn btn-primary btn-sm mt-2 mx-auto">View Profile</a>
                  </div>
               </div>
            </div>
         </div>
         <!--  -->
         <!-- column 5 -->
         <!--  -->
         <div class="col-sm-3 ml-5 mr-5">
            <div class="jumbotron" >
               <div class="card text-center" style="border-style: none; background-color:#e9ecef;" >
                  <img class="card-img-top mx-auto " src="p.jpg" alt="Card image"  style="border-radius:400px; width:80px; ">
                  <div class="card-body">
                     <h4 class="card-title ">Mulugeta Adamu</h4>
                     <span class="card-text"> Front End developer</span>
                     <a href="#" class="btn btn-primary btn-sm mt-2 mx-auto">View Profile</a>
                  </div>
               </div>
            </div>
         </div>
         <!--  -->
         <!-- column 6 -->
         <!--  -->
         <div class="col-sm-3 ml-5 mr-5">
            <div class="jumbotron" >
               <div class="card text-center" style="border-style: none; background-color:#e9ecef;" >
                  <img class="card-img-top mx-auto " src="p.jpg" alt="Card image"  style="border-radius:400px; width:80px; ">
                  <div class="card-body">
                     <h4 class="card-title ">Mulugeta Adamu</h4>
                     <span class="card-text"> Front End developer</span>
                     <a href="#" class="btn btn-primary btn-sm mt-2 mx-auto">View Profile</a>
                  </div>
               </div>
            </div>
         </div>
         <!--  -->
         <!--  -->
      </div>
   </div>
</div>
<?php
   include "Footer.php";
?>