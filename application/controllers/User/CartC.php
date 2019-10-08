<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class CartC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/HomeM","hm");
		$this->load->model("User/CartM","cam");
		$this->load->model("User/CourseM","cm");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index($courseid=null)
	{
		$data=array(
			"userID"=>$this->session->userID,
			"courseID"=>$courseid
		);
		$this->cam->insertCart($data);
	}

	public function viewCart($val=null)	
	{
		$course=$this->hm->getCourse();
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
		if($val==1)
		{
			?>
			<script type="text/javascript">
				alert("Sorry,Your Payment Failed");
			</script>
			<?php
		}
		$id=$this->session->userID;
		$res=$this->cam->showCart($id);
		$data=array(
			"cartData"=>$res,
			"courseData"=>$course
		);
		/*echo "<pre>";
		print_r($data);
		die();*/
		$this->load->view("User/cart",$data);
	}

	public function deleteCart($id)
	{
		$res=$this->cam->delCart($id);
		redirect("User/CartC/viewCart");
	}

	public function checkCode($offerCode)
	{
		$res=$this->cam->checkCode($offerCode);
		echo json_encode($res);
	}
}
?>
