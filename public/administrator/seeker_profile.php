<?php
require "includes/admin-navigation.php";
?>

<style> 
/* td{font-weight: bolder;}
 .table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border: none;
}  */ 
.comment{
    background-color: #EDEDEA;
    height: 120px;
    padding: 5px;
}

.comment .left-section{
    width: 20%;
    height: 100px;
    float: left;
    padding:5px;
    
}

.comment .left-section img{
    margin-left: 20px;
    border-radius: 50%;
}

.comment .right-section{
    background-color: #FFFFFF;
    float: left;
    border: 1px solid black;
    width: 80%;
    height: 90%;
    padding: 20px;
}

</style>
<div class="container-fluid" style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-8 mx-auto">
				<!--  -->
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Service seeker details</h6> </div>
					<div class="card-body"> 
         <div class="container-fluid">
   <div class="row">
    <div class="col-sm-10">

                     <div class="table  ">
                    <table id="table" class="table "  style="border:none">

                    <tbody>
                                                        


										<tr>
                                            <td>Username</td>
											<td>
											<?php echo $_SESSION['serviceSeekerDetails']['username'];?>
											</td>
                                      
                                         </tr>
                                         
                                         <tr>
                                          <td>Name</td>
											<td>
												<?php echo $_SESSION['serviceSeekerDetails']['firstname']." ".$_SESSION['serviceSeekerDetails']['lastname'];?>
											</td>
                                         </tr>
                                         <tr>
                                            <td>Gender</td>
											<td>
                                                <?php echo ($_SESSION['serviceSeekerDetails']['gender']==='M')?'Male':'Female';?>
											</td>
                                         </tr>
                                         <tr>
                                          <td>Mobile number</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['mobilenumber'];?>
											</td>
                                         </tr>

                                         <tr>
                                          <td>Nationality</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['nationality'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Country</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['country'];?>
											</td>
                                         </tr>

                                           <tr>
                                            <td>City</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['city'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Address</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['address'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Bank name</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['bankname'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Account number</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['accountnumber'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Wallet</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['walletbalance'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Join date</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['joindate'];?>
											</td>
                                         </tr>
                                           <tr>
                                            <td>Last login</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['lastlogin'];?>
											</td>
                                         </tr>

                                        <tr>
                                            <td>Status</td>
											<td>
                                                <?php echo $_SESSION['serviceSeekerDetails']['status'];?>
											</td>
                                         </tr>

                           </div>
								</tbody>
							</table>

		</div> 
        <!--  -->

     
</div>
   <div class="col-sm-2">
           <td>

  <div class="list-group">
 <img class="img-fluid" src="http://localhost/seralance/<?php echo $_SESSION['serviceSeekerDetails']['profilephoto']?>" style="width:100%; height:100%;">

</div>

                      
              <!--  -->      
    </div>
  </div>
                    </div>
<!--  -->



                    <!--  -->
                </div>
            </div>
<!--  -->


            <!--  -->
        </div>
</div>
</div>
<script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<!--  -->
