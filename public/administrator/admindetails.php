<?php
require "includes/admin-navigation.php";
?>

<style> 


 .table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border: none;
}  


</style>
<div class="container-fluid" style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-8 mx-auto">
				<!--  -->
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Admin details</h6> </div>
					<div class="card-body"> 

<!--  -->
<div class="table  mt-5">
							<table id="table" class="table "  style="border:none">
								
								<tbody>
									
										<tr>
                                            <td>Username</td>
											<td>
												<?php echo $_SESSION['adminDetails']['username'];?>
											</td>
                                         </tr>
                                         
                                         <tr>
                                          <td>Full name</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['firstname'] . " " . $_SESSION['adminDetails']['lastname'];?>
											</td>
                                         </tr>
                                         <tr>
                                          <td>Gender</td>
											<td>
                                                <?php echo ($_SESSION['adminDetails']['gender']==='M')?'Male':'Female';?>
											</td>
                                         </tr>

                                         <tr>
                                          <td>Mobile number</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['mobilenumber'];?>
											</td>
                                         </tr>

                                         <tr>
                                          <td>Nationality</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['nationality'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Country</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['country'];?>
											</td>
                                         </tr>

                                           <tr>
                                            <td>City</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['city'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Address</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['address'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Join date</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['joindate'];?>
											</td>
                                         </tr>
                                           <tr>
                                            <td>Last login</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['lastlogin'];?>
											</td>
                                         </tr>

                                        <tr>
                                            <td>Status</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['status'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Role</td>
											<td>
                                                <?php echo $_SESSION['adminDetails']['role'];?>
											</td>
                                         </tr>
                                           <tr>
                                            <td>Permission</td>
											<td>
                                                <?php
                                                    $mypermission = "";
                                                    foreach($_SESSION['adminDetails']['permission'] as $key => $value){
                                                        if($value==true){
                                                            if($key == 'user_management'){
                                                                $mypermission .= "User management"." | ";
                                                            }
                                                            else if($key == 'project_management'){
                                                                $mypermission .= "Project management"." | ";
                                                            }
                                                            else if($key == 'notification_management'){
                                                                $mypermission .= "Notification management"." | ";
                                                            }
                                                            else if($key == 'transcation'){
                                                                $mypermission .= "Transaction"." | ";
                                                            }
                                                            else if($key == 'dispute_management'){
                                                                $mypermission .= "Dispute management"." | ";
                                                            }
                                                            else if($key == 'ticket_management'){
                                                                $mypermission .= "Ticket management"." | ";
                                                            }
                                                            else if($key == 'policy_drafting'){
                                                                $mypermission .= "Policy drafting"." | ";
                                                            }
                                                            else if($key == 'faq_drafting'){
                                                                $mypermission .= "Faq drafting"." | ";
                                                            }


                                                        }
                                                        
                                                    }
                                                    
                                                
                                                    echo $mypermission;
                                                ?>
											</td>
                                         </tr>

								</tbody>
							</table>
						</div>


<!--  -->

                    </div>
		
		<!--  -->

    

</table>
    </div>
    </div>
	</div>
		</div>
        <!--  -->
	</div>
<script src="http://localhost/seralance/app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

