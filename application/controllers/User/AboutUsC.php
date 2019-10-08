<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUsC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("User/aboutUs");
	}
}

?>