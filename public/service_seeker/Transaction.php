<?php
require "includes/service_seeker-navigation.php";
$transactions = $serviceSeekerController->getAllTransactions($_SESSION['username']);
?>
  <script>
    document.title="Service Seeker-list of transactions";
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
                <div class="card-body">
<!--  -->
				<!--  -->
				<p>
					Wallet Balance : <?php echo $seekerDetail['walletbalance']?> ETB
				</p>

				<?php
					if(!$serviceSeekerController->checkRequestExists($_SESSION['username'])){
            $amount = $serviceSeekerController->getTransferableAmount($_SESSION['username']);
            if($amount>0){
              echo "<p>Transferable amount: ".$amount . " ETB</p>";
						  echo '<p><a href="http://localhost/seralance/public/serviceseeker/requesttransfer" class="btn btn-primary">Request transfer</a></p>';
            }
						
					}
					else{
						echo "<p>Your transfer request is being processed ...</p>";
					}
				?>
				
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
								elseif($transaction['type'] == 'Deposit'){
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
      <script type = "text/javascript">
     function confirmAction(anchor){
   	var conf = confirm("Are you sure you want to perform this record?");
   	if(conf){
   		window.location = anchor;
   	}
   } 
   $(document).ready(function(){
   	$("#table").DataTable();
   });
</script> 

    </div>
  </div>


	<?php  require "includes/service_seeker-footer.php"  ?>
</body>



</html>

<!--  -->