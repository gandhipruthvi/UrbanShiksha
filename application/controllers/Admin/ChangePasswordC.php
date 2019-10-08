<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePasswordC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/ChangePasswordM','cp');
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function changePass($npass)
	{
		$uid =$this->session->adminID;
		$data = array(
			"password" => $npass
		);

		echo $this->cp->updPass($data,$uid);
	}

	public function chkPass($str)
	{
		$data = array(
			"adminID" => $this->session->adminID,
			"password" => $str
		);

		echo $this->cp->fetchData($data);
	}
}

?>