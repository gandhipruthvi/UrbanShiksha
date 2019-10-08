<?php

defined('BASEPATH') OR exit('ILLE');

class LoginC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/LoginM','ml');
		if($this->session->adminID)
		{
			redirect("Admin/DashboardC/");
		}
	}

	public function index()
	{
		{
			$this->load->view("Admin/sign-in");
		}
	}

	public function log()
	{
		$data = array(
			'userName' => $this->input->post('txtuser'),
			'password' => $this->input->post('txtpass')
		);

		$x = $this->ml->fetchAdmin($data);
		if($x==null)
		{
			redirect("Admin/LoginC");
		}
		else
		{
			$this->session->adminID=$x->adminID;
			// $this->session->userName=$x->userName;
			$this->session->adminName=$x->adminName;
			$this->session->pictur=$x->image;
			redirect("Admin/DashboardC/");
		}
	}
}

?>