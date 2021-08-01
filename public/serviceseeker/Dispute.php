<?php
include "navigation.php";
require_once "../Database/db.php";
?>
<head>
  <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
   <!-- Datatable CSS -->
   <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
   <!-- jQuery Library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <!-- Bootstrap CSS -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
   <!-- Datatable JS -->
   <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script>
      document.title="Service seeker-Transaction history";
   </script>
   </head>

<div class="container " style="margin-top: 100px;">
   <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 ">
         <div class="jumbotron bg-light " style="padding-top: 25px; background-color:rgb(204,229,255,0.5);">
            <h3 class="text-primary mb-5" style="text-decoration:underline;">List of Disputes </h3>
            <!-- claim fund -->
            <a class = "btn btn-success" href = "addDispute.php"><i class = "fa fa-plus-circle"></i> New Dispute</a>

            <!--  -->
            <div class="table table-responsive mt-5">
               <table id = "table" class = "table table-bordered table-striped">
                  <thead>
                     <tr>
                     <th>No</th>
                        <th> Id</th>
                        <th>Dispute Date</th>
                        <th>Dispute Title</th>
                        <th> Service provider</th>
                        <th>closed Date</th>
                        <th>Status</th>
                        <th> Dispute</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = $con->query("SELECT * FROM dispute") or die(mysqli_error($con));
                        while($fetch = $query->fetch_array()){
                        ?>	
                     <tr>

                     <td><?php echo $fetch['No']?></td>
                        <td><?php echo $fetch['Disputeid']?></td>
                        <td><?php echo $fetch['Disputedate']?></td>
                        <td><?php echo $fetch['Disputetitle']?></td>
                        <td><?php echo $fetch['Serviceprovider']?></td>
                        <td><?php echo $fetch['Closeddate']?></td>
                        <td><?php echo $fetch['Status']?></td>
                     <!--  -->
                       
                        <td><a class = "btn btn-info" href = "viewDispute.php?No=<?php echo $fetch['No']?>">
                           View</a> 
                        </td>
                        
                           <!--  -->
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
<script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script>
<?php
   include "Footer.php";
   ?>