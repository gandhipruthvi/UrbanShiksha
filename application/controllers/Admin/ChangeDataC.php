<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeDataC extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/ChangeDataM","dm");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function fetchAdmin($uid)
	{
		$x = $this->dm->fetchAdmin($uid);
		$data = array(
			"adminInfo" => $x
		);
		// print_r($data);
		// die();
		$this->load->view("Admin/manageProfile",$data);
	}

	public function index()
	{
		// $uid =$this->session->adminID;
		$data = array(
			"adminName" => $this->input->post("txtanm"),
			"email" => $this->input->post("txtemail"),
			"contactNo" => $this->input->post("txtcno")			
		);

		$this->dm->changeData($data);
		redirect("Admin/AdminC/");
	}
}

?>