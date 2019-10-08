<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function instructorView()
	{
		redirect("Instructor/CourseC");
	}

	public function studentView()
	{
		redirect("User/HomeC");
	}
}

?>