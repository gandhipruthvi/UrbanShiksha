<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RatingC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/RatingM","mi");		
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index($uid)
	{
		$x = $this->mi->fetchUser($uid);
		$course = $this->mi->fetchAllCourse($uid);
		$rating = $this->mi->fetchRating($uid);
		$data = array(
			"userData" => $x,
			"courseData" => $course,
			"rateData" => $rating
		);
		// print_r($data);
		// die();
		$this->load->view("Admin/review",$data);
	}

}


?>