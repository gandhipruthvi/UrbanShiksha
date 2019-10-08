<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UnCoursesC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/UnCoursesM","um");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$res=$this->um->fetchUnapprovedCourses();
		$data=array(
			"courseData"=>$res,
		);
		$this->load->view("Admin/courseApproval",$data);
	}

	public function approveCourse($id)
	{
		$data=array(
			"status"=>0
		);
		$this->um->approveCourse($id,$data);
		redirect("Admin/UnCoursesC");
	}
	public function disapproveCourse($id)
	{
		$data=array(
			"status"=>-2
		);
		$this->um->approveCourse($id,$data);
		redirect("Admin/UnCoursesC");	
	}
}
?>