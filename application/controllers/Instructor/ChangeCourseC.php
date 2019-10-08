<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class ChangeCourseC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Instructor/ChangeCourseM","cm");
	}
	public function fetchCourse($cid)
	{
		$x = $this->dm->fetchCourse($cid);
		$data = array(
			"CourseData" => $x
		);
		// print_r($data);
		// die();
		$this->load->view("Instructor/viewmoreCourse",$data);
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