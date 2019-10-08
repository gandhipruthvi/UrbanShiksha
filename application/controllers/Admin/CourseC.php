<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CourseC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/CourseM","cm");
		$this->load->model("Admin/CategoryM","catm");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$x = $this->cm->fetchCourse();
		$data = array(
			"course" => $x
		);
		$this->load->view("Admin/courseView",$data);
	}
	public function dropdown()
	{
		$this->load->view("Admin/temp");	
	}

	public function showCourse($subjectID)
	{
		$res = $this->cm->fetchAllCourse($subjectID);
		echo $this->db->last_query();
		echo "<br>";
		$res1=$this->catm->fetchAllCategory();
		$res2=$this->catm->fetchAllSubCategory();
		$res3=$this->catm->fetchAllSubject();
		$res4=$this->cm->fetchName($subjectID);
		$data = array(
			"coursedata"=>$res,
			"categorydata"=>$res1,
			"subcategorydata"=>$res2,
			"subjectdata"=>$res3,
			"names"=>$res4
			);
		$this->load->view("Admin/categoryDisplay",$data);
	}
}

?>