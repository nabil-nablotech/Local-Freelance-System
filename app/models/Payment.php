<?php
    use YenePay\Models\CheckoutOptions;
    use YenePay\Models\CheckoutItem;
    use YenePay\Models\CheckoutType;
    use YenePay\Models\IPN;
    use YenePay\CheckoutHelper;

    require_once('../app/vendor/yenepay/php-sdk/src/CheckoutHelper.php');
    require_once('../app/vendor/yenepay/php-sdk/src/Models/CheckoutOptions.php');
    require_once('../app/vendor/yenepay/php-sdk/src/Models/CheckoutItem.php');
    require_once('../app/vendor/yenepay/php-sdk/src/Models/CheckoutType.php');
    require_once('../app/vendor/yenepay/php-sdk/src/Models/IPN.php');

    class Payment extends Model{
        
        private $paymentId;
        private $amount;
        private $issuedDate;
        private $paidDate;
        private $paymentMethod;


        // --------Getter and Setters of the attributes-----------
        public function getPaymentId(){
            return $this->paymentId; 
        }

        public function setPaymentId($paymentId){
            $this->paymentId = $paymentId;
        }

        public function getAmount(){
            return $this->amount; 
        }

        public function setAmount($amount){
            $this->amount = $amount;
        }

        public function getIssuedDate(){
            return $this->issuedDate; 
        }

        public function setIssuedDate($issuedDate){
            $this->issuedDate = $issuedDate;
        }

        public function getPaidDate(){
            return $this->paidDate; 
        }

        public function setPaidDate($paidDate){
            $this->paidDate = $paidDate;
        }

        public function getPaymentMethod(){
            return $this->paymentMethod; 
        }

        public function setPaymentMethod($paymentMethod){
            $this->paymentMethod = $paymentMethod;
        }

        //End of getter and setter
        public function generatePaymentUrl($projectId,$price){
            $sellerCode = "SB1199";
            $useSandbox = true;

            $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);

            // These properties are optional
            $successUrl = "http://localhost/seralance/public/serviceseeker/paymentsuccess";
            $cancelUrl = "http://localhost/seralance/public/serviceseeker/".$_SESSION['projectlist'];
            $failureUrl = "http://localhost/seralance/public/serviceseeker/".$_SESSION['projectlist'];
            //$ipnUrl = "http://localhost/seralance/public/serviceseeker/ipn";

            $checkoutOptions -> setSuccessUrl($successUrl);
            $checkoutOptions -> setCancelUrl($cancelUrl);
            $checkoutOptions -> setFailureUrl($failureUrl);
            //$checkoutOptions -> setIPNUrl($ipnUrl);
            $checkoutOptions -> setMerchantOrderId($projectId);
            $checkoutOptions -> setExpiresAfter("30");


            $checkoutOrderItem = new CheckoutItem($projectId, $price,1);
            $checkoutOrderItem  -> ItemId = $projectId;

            $checkoutHelper = new CheckoutHelper();
            return $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
        }

        public function verifyIPN(){
            $ipnModel = new IPN();
            $ipnModel->setUseSandbox(true); //set this to false on production

            $json_data = json_decode(file_get_contents('php://input'), true);

            if(isset($json_data["TotalAmount"]))
                $ipnModel->setTotalAmount($json_data["TotalAmount"]);
            if(isset($json_data["BuyerId"]))
                $ipnModel->setBuyerId($json_data["BuyerId"]);
            if(isset($json_data["MerchantOrderId"]))
                $ipnModel->setMerchantOrderId($json_data["MerchantOrderId"]);
            if(isset($json_data["MerchantId"]))
                $ipnModel->setMerchantId($json_data["MerchantId"]);
            if(isset($json_data["MerchantCode"]))
                $ipnModel->setMerchantCode($json_data["MerchantCode"]);
            if(isset($json_data["TransactionCode"]))
                $ipnModel->setTransactionCode($json_data["TransactionCode"]);
            if(isset($json_data["TransactionId"]))
                $ipnModel->setTransactionId($json_data["TransactionId"]);
            if(isset($json_data["Status"]))
                $ipnModel->setStatus($json_data["Status"]);
            if(isset($json_data["Currency"]))
                $ipnModel->setCurrency($json_data["Currency"]);
            if(isset($json_data["Signature"]))
                $ipnModel->setSignature($json_data["Signature"]);


            $helper = new CheckoutHelper();
            if ($helper->isIPNAuthentic($ipnModel))
                echo '<h1>Success!</h1>';
            else
                echo '<h1>Fail</h1>';
        }

        public function insertPayment($amount, $paymentMethod, $projectId){

            $paymentTb = array(
                'amount' => $amount,
                'paid_date' => 'UTC_TIMESTAMP',
                'payment_method' => "'".$paymentMethod."'",
                'paid_by' =>"'".$_SESSION['username']."'",
                'project_id' => "'".$projectId."'"

            );

            $this->insert('payment',$paymentTb);

        }

    }

    
?>