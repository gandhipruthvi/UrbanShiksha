<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/VerificationM","vm");
	}

	public function index($uid)
	{
		$x = $this->vm->getInfo($uid);
		if($x->status==-1)
		{
			$this->vm->updStatus($uid);	
			$data = array(
				"userStatus" => 0 
			);		
			$this->load->view("User/thankYou",$data);
		}
		else
		{
			$data = array(
				"userStatus" => 1
			);		
			$this->load->view("User/thankYou",$data);
		}
	}
}
