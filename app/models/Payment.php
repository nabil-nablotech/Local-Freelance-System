<?php
    use YenePay\Models\CheckoutOptions;
    use YenePay\Models\CheckoutItem;
    use YenePay\Models\CheckoutType;
    use YenePay\CheckoutHelper;

    require_once('../vendor/yenepay/php-sdk/src/CheckoutHelper.php');
    require_once('../vendor/yenepay/php-sdk/src/Models/CheckoutOptions.php');
    require_once('../vendor/yenepay/php-sdk/src/Models/CheckoutItem.php');
    require_once('../vendor/yenepay/php-sdk/src/Models/CheckoutType.php');

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

    }

    $sellerCode = "10152";
    $useSandbox = true;

    $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
?>