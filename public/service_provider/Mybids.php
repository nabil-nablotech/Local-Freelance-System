<?php
include "navigation.php";
?>
				<!--  -->
	<div class="container-fluid" style="margin-top: 100px;">
		<div class="row">
			<div class="col-sm-10 mx-auto">
				<!--  -->
                              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">List of bids</h6>
                </div>
                <div class="card-body">
<!--  -->
                <!--  -->
                <div class="table table-responsive mt-5">
               <table id = "table" class = "table table-bordered table-striped">
                  <thead>
                     <tr>
                       <th>No</th>
                       <th>Bid Id</th>
                        <th>Project Id</th>
                        <th>Project Title</th>
                        <th>service provider</th>
                        <th>service seeker </th>
                        <th>Bid price</th>
                        <th>Bid date</th>
                        <th>Bid description</th>
                        <th>View project</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = $con->query("SELECT * FROM offeredproject") or die(mysqli_error($con));
                        while ($fetch = $query->fetch_array()) {
                            ?>	
                     <tr>

                     <td><?php echo $fetch['No']?></td>
                        <td><?php echo $fetch['pid']?></td>
                        <td><?php echo $fetch['ptitle']?></td>
                        <td><?php echo $fetch['odate']?></td>
                        <td><?php echo $fetch['pbudget']?></td>
                        <td><?php echo $fetch['status']?></td>   
                        <td><?php echo $fetch['status']?></td>          
                        <td><?php echo $fetch['status']?></td>                 
                        <td><a class = "btn btn-primary btn-sm" href = "bid_detail.php?pid=<?php echo $fetch['pid']?>">
                           <i class="fa fa-eye">view</i></a> 
                        </td>
                        <td><a class = "btn btn-primary btn-sm"
                         href = "project_detail.php?pid=<?php echo $fetch['pid']?>">
                           <i class="fa fa-eye">view</i></a> 
                        </td>
                       
                       
                     </tr>
                     <?php
                        }
                        ?>	
                  </tbody>
               </table>
            </div>
            <!--  -->
         </div>
      </div>
   </div>
</div>
 <script type = "text/javascript">
   function confirmationDelete(anchor){
   	var conf = confirm("Are you sure you want to delete this record?");
   	if(conf){
   		window.location = anchor.attr("href");
   	}
   } 
</script>
   

                </div>
              </div>
            </div>

           
        
        
				<!--  -->
			</div>
		</div>
		<!--  -->
	</div>
	</div>
	</div>

				<!--  -->
			</div>
		</div>
		<!--  -->
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
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    	<script type="text/javascript">
		$(document).ready(function() {
			$("#table").DataTable();
		});
		</script>
	</body>

	</html>

