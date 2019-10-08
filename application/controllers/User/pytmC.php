/<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/config_paytm.php"); //include in controller
require_once(APPPATH."libraries/encdec_paytm.php"); //include in controller
class pytmC extends CI_Controller 
{

	public function PaytmGateway()
    {
        $orderId = 69969;// must be unique  everytime orderID must be different
      $this->StartPayment($orderId); //payment gets started
    }
     public function StartPayment($orderId)
    {
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $orderId;     
        $paramList["CUST_ID"] = 344;   /// according to your logic sessionID
        $paramList["INDUSTRY_TYPE_ID"] = 'RETIAL';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = 1; //amt of course
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
   
		$paramList["CALLBACK_URL"]   = site_url("pytm/PaytmResponse"); //controller after payment is done successfully
        //$paramList["CALLBACK_URL"] = "http://localhost/testPaytm/pytm/PaytmResponse"; site_url("pytm/PaytmResponse")
        $paramList["MSISDN"] = '777777'; //Mobile number of customer
        $paramList["EMAIL"] ='foo@gmail.com'; // optional
        $paramList["VERIFIED_BY"] = "EMAIL"; //
        $paramList["IS_USER_VERIFIED"] = "YES"; //
      //  print_r($paramList);
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

        ?>

        <!--submit form to payment gateway OR in api environment you can pass this form data-->
   
        <form id="myForm" action="<?php echo PAYTM_TXN_URL ?>" method="post">
        <?php
         foreach ($paramList as $a => $b) {
        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
       }
       ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
         </script>
 
<?php
    }
    public function PaytmResponse()
    {
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $paramList = $_POST;
        echo "<pre>";
        print_r($paramList);
   

    }
}


/* default number and OTP
Mobile Number	77777 77777
Password	Paytm12345
OTP 489871

Doesn’t require 2nd factor authentication
	(
    [ORDERID] => 69969
    [MID] => starki11970539803647
    [TXNID] => 20190510111212800110168674000488069
    [TXNAMOUNT] => 1.00
    [PAYMENTMODE] => PPI
    [CURRENCY] => INR
    [TXNDATE] => 2019-05-10 18:42:08.0
    [STATUS] => TXN_SUCCESS
    [RESPCODE] => 01
    [RESPMSG] => Txn Success
    [GATEWAYNAME] => WALLET
    [BANKTXNID] => 6883353
    [BANKNAME] => WALLET
    [CHECKSUMHASH] => nCQFUlMc7KyJryF4ZBo8f6PticGuK+1q96viiBoWrSx4DReqpUsj7CgI5ESr1Emz8y8ZhXX0AxC8kftUpT46wd7I01qqZJoni3iAfQtDb/o=
)
*/
?>