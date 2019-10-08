<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class CheckC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/CheckM","cm");
	}

	public function chkUser($userNm)
	{
		$data = array("userName"=>$userNm);
		$x = $this->cm->fetchUser($data);

		if($x)
		{
			echo "* Please enter Unique Username";
		}
		else
		{
			echo "Valid Username";
		}
	}


	public function chkMail()
	{
		$data = array("email"=>$this->input->post("usMail"));
		$y = $this->cm->fetchUser($data);
		if($y)
		{
			echo "* Please enter Unique Mail";
		}
		else
		{
			echo "Valid email";
		}
	}
}
?>