<?php
require "includes/admin-navigation.php";
$transactions = $adminController->getAllTransactions();
?>
  <script>
    document.title="Admin-list of bids";
</script>
<style>
	.credit{
		background-color: rgba(60, 246, 97,0.2) !important;
	}

	.debit{
		background-color: rgba(250, 71, 71,0.2) !important;
	}
</style>


 <!-- Container Fluid-->
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transactions </h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="./">Home</a>
              </li>
              <li class="breadcrumb-item">Transactions</li>
              <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            </ol>
          </div>
          <div class="row">
            <!-- Alerts Basic -->
            <div class="col-lg-12">
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary mx-auto">Transactions</h6>
                </div>
                <p class="ml-4">
					        Revenue : <?php echo $adminController->getRevenue()['totalrevenue']?> ETB
				        </p>
                <div class="card-body">
<!--  -->
				<!--  -->
								
                <div class="table table-responsive mt-5">
               <table id = "table" class = "table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Transaction Id</th>
                        <th>Action</th>
                        <th>Detail</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>User</th>
                     </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($transactions)){
                            $count = 1;
                            foreach($transactions as $transaction){
                                $class= "";
                                if($transaction['type'] == 'Settle' || $transaction['type'] == 'Refund' || $transaction['type'] == 'Termination' || $transaction['type'] == 'Transfer'){
                                  $class = "debit";
                                }
                                elseif($transaction['type'] == 'Deposit' || $transaction['type'] == 'Income' || $transaction['type'] == 'Compensation' || $transaction['type'] == 'Revenue' || $transaction['type'] == 'Fee' || $transaction['type'] == 'Return'){
                                  $class = "credit";
                                }
                                echo <<<EOT
                                            <tr class="{$class}">
                                            <td>
                                                {$count}
                                            </td>
                                            <td>
                                                {$transaction['transaction_id']}
                                            </td>
                                            <td>
                                                {$transaction['type']}
                                            </td>
                                            <td>
                                                {$transaction['detail']}
                                            </td>
                                            <td>
                                                {$transaction['amount']}
                                            </td>
                                            <td>
                                                {$transaction['date']}
                                            </td>
                                            <td>
                                                {$transaction['username']}
                                            </td>
                                            
                                            </tr>
                                        EOT;
                                    $count++ ;
                                }
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

   

                </div>
              </div>
            </div>


          </div>

        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery/jquery.min.js"></script>  
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/jquery.dataTables.js" ></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/jquery.dataTables.min.js" ></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>public/assets/js/administrator/serelance-admin.js "></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $_SESSION['baseurl'];?>app/vendor/datatables/dataTables.bootstrap4.js" ></script>
      <script type = "text/javascript">
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script>  

    </div>
  </div>



</body>



</html>

<!--  -->