<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/UserM","um");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$x = $this->um->fetchUser();
		$data = array(
			"userD" => $x
		);
		$this->load->view("Admin/userView",$data);
	}

	public function statusChange($id)
	{
		$this->um->statusChange($id);
		echo $this->db->last_query();
	}	
}

?>