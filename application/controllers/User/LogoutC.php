<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index()
	{
		session_destroy();
		redirect("User/LoginC/");
	}
}

?>