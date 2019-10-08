<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/CategoryM","catm");
		$this->load->model("Admin/CourseM","cm");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$res1=$this->catm->fetchAllCategory();
		$res2=$this->catm->fetchAllSubCategory();
		$res3=$this->catm->fetchAllSubject();

		$res = $this->cm->fetchCourse();
		$data=array(
			"categorydata"=>$res1,
			"subcategorydata"=>$res2,
			"subjectdata"=>$res3,
			"coursedata"=>$res
		);	
		$this->load->view("Admin/categoryDisplay",$data);
	}
	
	public function courseInfo($id)
	{
		$res = $this->cm->fetchCourseInfo($id);
		$res1 = $this->cm->fetchReview($id);
		$data=array(
			"coursedata1"=>$res,
			"description"=>$res->description,
			"reviewdata"=>$res1
		);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->load->view("Admin/courseInfo",$data);
	}


	public function addCategory()
	{
		$data=array(
			"categoryName"=>$this->input->post("txtcategory")
		);
		$this->catm->addCategory($data);
		redirect("Admin/CategoryC");
	}

	public function addSubcategory()
	{
		$data=array(
			"categoryID"=>$this->input->post("selectCategory"),
			"subcategoryName"=>$this->input->post("txtsubcategory")
		);
		$this->catm->addSubcategory($data);
		redirect("Admin/CategoryC");
	}

	public function addSubject()
	{
		$data=array(
			"subcategoryID"=>$this->input->post("selectSubcategory"),
			"subjectName"=>$this->input->post("txtSubject")
		);
		$this->catm->addSubject($data);
		redirect("Admin/CategoryC");
	}

	public function statusChange($courseID)
	{
		$this->catm->statusChange($courseID);
	}
}
?>