<?php
require "includes/service_seeker-navigation.php";
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
body{background-color: #f0f5f7
;} 
</style>
<script>
		document.title = "Service provider-profile  details";
</script>
<div class="container-fluid" style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-8 mx-auto">
				<!--  -->
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary mx-auto">Service provider details</h6> </div>
					<div class="card-body"  > 
         <div class="container-fluid">
   <div class="row">
    <div class="col-sm-8 mx-auto">

                     <div class="table table-responsive  ">
                    <table id="table" class="table "  style="border:none">

                    <tbody>
                                                        


										<tr>
                                            <td>Username</td>
											<td>
											<?php echo $_SESSION['serviceProviderDetails']['username'];?>
											</td>
                                      
                                         </tr>
                                         
                                         <tr>
                                          <td>Name</td>
											<td>
												<?php echo $_SESSION['serviceProviderDetails']['firstname']." ".$_SESSION['serviceProviderDetails']['lastname'];?>
											</td>
                                         </tr>
                                         <tr>
                                            <td>Education Level</td>
											<td>
												<?php echo $_SESSION['serviceProviderDetails']['education'];?>
											</td>
                                         </tr>
                                        <tr>
                                            <td>Skills</td>
											<td>
                                                <div class='list-group'>
                                                <?php
                                                    foreach($_SESSION['serviceProviderDetails']['skill'] as $skill){
                                                        echo <<<EOT
                                                            
                                                            <li class='list-group-item '>
                                                                {$skill['skill_name']}
                                                            </li>
                                                            
                                                        EOT;
                                                    }
                                                ?>
                                                </div>
											</td>
                                         </tr>    

                                         <tr>
                                            <td>Languages</td>
											<td>
                                                <div class='list-group'>
                                                <?php
                                                    foreach($_SESSION['serviceProviderDetails']['language'] as $language){
                                                        echo <<<EOT
                                                            
                                                            <li class='list-group-item '>
                                                                {$language['language_name']}
                                                            </li>
                                                            
                                                        EOT;
                                                    }
                                                ?>
                                                </div>
											</td>
                                         </tr>                                     

                                           <tr>
                                            <td>Experience</td>
											<td>
												<?php echo $_SESSION['serviceProviderDetails']['experience'];?>
											</td>
                                         </tr>
                                          <tr>
                                            <td>Portifolio</td>
											<td>
                                                <div class='list-group'>
                                                <?php
                                                        foreach($_SESSION['serviceProviderDetails']['portfolio'] as $url){
                                                            echo <<<EOT
                                                                
                                                                <li class='list-group-item '>
                                                                    <a href="{$url['portfolio_url']}">{$url['portfolio_url']}</a>
                                                                </li>
                                                            EOT;
                                                        }
                                                ?>
                                                </div>
											</td>
                                         </tr>                                    

                                        <tr>
                                            <td>Summary</td>                                  
											<td>
                                                <?php
                                                    echo $_SESSION['serviceProviderDetails']['summary'];
                                                ?>
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
 <img class="img-fluid" src="http://localhost/seralance/<?php echo $_SESSION['serviceProviderDetails']['profile_photo']?>" style="width:100%; height:100%;">

</div>

                      
              <!--  -->      
    </div>
  </div>
                    </div>
<!--  -->
<div class="card-body">
    <h2 class="text-center">Testimonials</h2> 
<div class="row">
    <div class="col-sm-12 mx-auto">
        <?php
            if(!empty($_SESSION['serviceProviderDetails']['ratings'] )){
                foreach($_SESSION['serviceProviderDetails']['ratings'] as $rating){
                    echo <<<EOT
                        
                    <div class="comment">
                        <div class="left-section">                                        
                            <img class="img-fluid" src="http://localhost/seralance/public/assets/images/profile.jpg" style="width:80px; height:80px; border:1px solid black;">
                            <p class="ml-4">{$rating['rater']}</p>
                        </div>
                        <div class="right-section">
                            <p>
                                {$rating['comment']}
                            </p>
                        </div>            
                    </div> 
                    EOT;
                }
            }            
        ?>
              

    </div>
    
</div>

</div>


                    <!--  -->
                </div>
            </div>
<!--  -->


            <!--  -->
        </div>
</div>
</div>
</body>
<!--  -->
