<?php
require "includes/admin-navigation.php";
?>
<style> 
td{font-weight: bolder;}

</style>
<div class="container-fluid" style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-8 mx-auto">
				<!--  -->
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Bid Description </h6> </div>
					<div class="card-body"> 

<!--  -->
<div class="table  mt-5">
							<table id="table" class="table "  style="border:none">
								
								<tbody>
										<tr>
                                            <td>Bid Id</td>
											<td>
												<?php echo $_SESSION['bidDetails']['bid_id'];?>
											</td>
                                         </tr>
                                         
                                         <tr>
                                          <td>Bid Date</td>
											<td>
												<?php echo $_SESSION['bidDetails']['bid_date'];?>
											</td>
                                         </tr>
                                         <tr>
                                          <td> Price</td>
											<td>
												<?php echo $_SESSION['bidDetails']['price'];?>
											</td>
                                         </tr>

                                         <tr>
                                          <td>Bidder</td>
											<td>
												<?php echo $_SESSION['bidDetails']['made_by'];?>
											</td>
                                         </tr>


                                        <tr>
                                            <td>Cover Letter</td>
											<td><?php echo $_SESSION['bidDetails']['cover_letter'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Bid status</td>
                                            <td> <?php echo $_SESSION['bidDetails']['status'];?></td>                                            
                                        </tr>
                                        <tr>
                                            <td>Project ID </td>
                                            <td> <?php echo $_SESSION['bidDetails']['project_id'];?></td>                                            
                                        </tr>
                                        <tr>
                                            <td>Project title</td>
                                            <td><?php echo $_SESSION['bidDetails']['title'];?></td>                                            
                                        </tr>
                                        <tr>
                                            <td>Project posted by</td>
                                            <td> <?php echo $_SESSION['bidDetails']['announced_by'];?></td>                                            
                                        </tr>
								</tbody>
							</table>
						</div>


<!--  -->

                    </div>
				</div>
			</div>
		</div>
		<!--  -->
	</div>
    <script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>