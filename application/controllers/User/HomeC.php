<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH."libraries/config_paytm.php"); //include in controller
require(APPPATH."libraries/encdec_paytm.php"); //include in controller

class HomeC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/HomeM","hm");
		$this->load->model("User/CourseM","cm");
		// if(!$this->session->userID)
		// {
		// 	redirect("User/LoginC");
		// }
		$cnt=1;
	}

	public function index()
    {
        $course=$this->hm->getCourse();
        $courseS = $this->hm->courseNameImage();
        $instructors = $this->hm->getInstructors();
        foreach ($instructors as $key) {
            $key->instructorData=$this->hm->getInstructorData($key->userID);
        }
        foreach ($course as $key) {
            $key->enID = $this->cm->fetchEnroll($key->courseID);
            $rates = $this->cm->fetchRatings($key->courseID);
            if($rates!=null)
            {
                foreach ($rates as $key1 ) {
                    $key->rates=$key1->stars*20;
                }
            }
            else
            {
                $key->rates=0;
            }
        }
        $data=array(
            "courseData"=>$course,
            "instructors"=>$instructors,
            "courseS" => $courseS,
        );
        $this->load->view("User/home",$data);
    }

    public function randomCourse()
    {
        $x = $this->cm->fetchRandomCourse();
        $data = array(
            "courseData" => $x
        );
        echo json_encode($data);
    }

	public function paySuccess($cartid,$total)
	{
		$cartID=$cartid;
		$uID=$this->session->userID;
		$digit=$cartID+$uID+9991;
        // $digit=101010101011;
		$type="paytm Wallet";
		$amt=$total;
        $data=array(
            "totalAmount"=>$amt,
            "userID"=>$uID,
            "netAmount"=>'0',
            "offerID"=>'1'
        );
        $this->hm->insertOrder($data);
        $oId=$this->db->insert_id();        
		$orderId=$digit+$oId;
		$this->StartPayment($cartID,$orderId,$type,$uID,$amt);

	}

	public function StartPayment($cartID,$orderId,$type,$uid,$amt)
    {
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $orderId;     
        $paramList["CUST_ID"] = $uid;   /// according to your logic sessionID
        $paramList["INDUSTRY_TYPE_ID"] = 'RETIAL';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $amt; //amt of course
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
   
		$paramList["CALLBACK_URL"]   = site_url("User/HomeC/CoursePayResponse/$cartID/$amt/$orderId"); //controller after payment is done successfully
        //$paramList["CALLBACK_URL"] = "http://localhost/testPaytm/pytm/PaytmResponse"; site_url("pytm/PaytmResponse")
        $paramList["MSISDN"] = '777777'; //Mobile number of customer
        $paramList["EMAIL"] ='foo@gmail.com'; // optional
        $paramList["VERIFIED_BY"] = "EMAIL"; //
        $paramList["IS_USER_VERIFIED"] = "YES"; //
      //  print_r($paramList);

        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
        // echo print_r($paramList);
        // echo print_r($checkSum);
        // die();
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

     public function CoursePayResponse($cartID,$amt,$orderId)
    {
    	$uID=$this->session->userID;
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        $paramList = $_POST;
        // print_r($paramList);
        // die();
        if($paramList['STATUS'] == "TXN_SUCCESS")
        {
            $data=array(
            	// "paymentID"=>$paramList['TXNID'],
            	"userID"=>$uID,
            	"type"=>'Paytm',
            	"amount"=>$amt,
            	"orderID"=>$orderId        	
            );

            $this->hm->insertPayment($data);
            redirect("User/HomeC/deleteCart/$cartID/$orderId");
        }
        else
        {
            $val=1;
            redirect("User/CartC/viewCart/$val");
        }   
    }

    public function deleteCart($cartid,$orderId)
	{
        $uid=$this->session->userID;
        $res=$this->hm->fetchCart($uid);
        foreach ($res as $key) {
            $data=array(
            "courseID"=>$key->courseID,
            "orderID"=>$orderId
        );
            $this->hm->insertOrderCourse($data);
        }
        
        foreach ($res as $key) {
            $data=array(
            "courseID"=>$key->courseID,
            "userID"=>$uid
        );
            $this->hm->insertCourseEnrollment($data);
        }
        
		$this->hm->delCart($uid);

        foreach ($res as $key) 
        {
            $cID = $this->hm->fetchCourseUser($key->courseID);
        
            $data = array(
                "receiver" => $cID->userID,
                "sender" => $this->session->userID,
                "message" => "Your course ".$cID->courseName." has been purchased by".$this->session->userName,
                "link"=> site_url("Instructor/CourseC/courseDetails/").$key->courseID
            );

            $this->hm->setNotification($data);
        }
		redirect("User/HomeC");
	}

    public function addRating($courseid)
    {
        $data=array(
            'userID'=>$this->session->userID,
            'courseID'=>$courseid,
            'stars'=>$this->input->post('rate'),
            'review'=>$this->input->post('txtreview')
        );
        $this->hm->insertRating($data);
        $id=urlencode(base64_encode($courseid));
        redirect("User/MyCourseC/viewCourse/$id");
    }
}

?>