<?php
require "includes/service_seeker-navigation.php";
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
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Project details</h6> </div>
					<div class="card-body"> 

<!--  -->
<div class="table  mt-5">
							<table id="table" class="table "  style="border:none">
								
								<tbody>
									
										<tr>
                                            <td>Date of Announcement/offer</td>
											<td>
												<?php echo $_SESSION['projectDetails']['announced_date'];?>
											</td>
                                         </tr>
                                         
                                         <tr>
                                          <td>Project Id</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['project_id'];?>
											</td>
                                         </tr>
                                         <tr>
                                          <td> Project Title</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['title'];?>
											</td>
                                         </tr>

                                         <tr>
                                          <td>Start date</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['start_date'];?>
											</td>
                                         </tr>

                                         <tr>
                                          <td>End date</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['end_date'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Announcement/offer status</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['status'];?>
											</td>
                                         </tr>

                                           <tr>
                                            <td>Offer type</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['offer_type'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Budget</td>
											<td>
                                                <?php echo "ETB ".$_SESSION['projectDetails']['budget_min']." --  ETB ".$_SESSION['projectDetails']['budget_max'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Price</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['price'];?>
											</td>
                                         </tr>
                                           <tr>
                                            <td>Category</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['category'];?>
											</td>
                                         </tr>

                                           <tr>
                                            <td>Project description</td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['description'];?>
											</td>
                                         </tr>

                                           <tr>
                                                <td>File Attachment</td>                                    
                                    
                                                <td>
                                                    <?php 
                                                        if($_SESSION['projectDetails']['file']!=="---"){
                                                        echo '<a href="'.$_SESSION['baseurl'].$_SESSION['projectDetails']['file'].'" download>Download</a>' ;
                                                        }
                                                        else{
                                                            echo $_SESSION['projectDetails']['file'];
                                                        }
                                                    ?>
                                                </td>                                            
                                            </tr>

                                           <tr>
                                            <td>Skills Required</td>
											<td>
                                                <?php
                                                    $myskill = "";
                                                    if(empty($_SESSION['projectDetails']['skill'])){
                                                       $myskill = "---";
                                                    }
                                                    else{
                                                       foreach($_SESSION['projectDetails']['skill'] as $skill){
                                                          $myskill .= $skill['skill_name']." | ";
                                                       }
                                                    }
                                                
                                                    echo $myskill;
                                                ?>
											</td>
                                         </tr>

                                          <tr>
                                            <td>Hired service provider </td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['assigned_to'];?>
											</td>
                                         </tr>

                                         <tr>
                                            <td>Posted by </td>
											<td>
                                                <?php echo $_SESSION['projectDetails']['announced_by'];?>
											</td>
                                         </tr>

                                         <tr>
                                                <td>Delivered work</td>                                    
                                    
                                                <td>
                                                <?php 
                                                    if($_SESSION['projectDetails']['delivered_file']!=='---'){
                                                    echo '<a href="'.$_SESSION['baseurl'].$_SESSION['projectDetails']['delivered_file'].'" download>Download</a>' ;
                                                    }
                                                    else{
                                                        echo $_SESSION['projectDetails']['delivered_file'];
                                                    }
                                                ?>
                                                </td>                                            
                                            </tr>

										<?php
                        
                        ?>
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