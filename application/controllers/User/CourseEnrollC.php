<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class CourseEnrollC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/CourseEnrollM","em");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index($eid=null)
	{
		$temp = $this->em->fetchCourse($eid);
		$data = array(
			"userID" => $this->session->userID,
			"courseID" => $eid
		);

		$this->em->courseEnroll($data);
	}
}
?>