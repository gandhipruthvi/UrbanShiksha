<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class SortC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model("User/CourseM","cm");
		$this->load->model("User/SortM","sm");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index()
	{
		if($this->input->post("btnSort"))
		{
			$srt = $this->input->post("sort");

			if(isset($srt[0]) && isset($srt[1]))
			{
				$this->session->price=2;
			}
			elseif(isset($srt[0]))
			{
				if($srt[0]=="Free")
				{	
					$this->session->price = 0;
				}
				else
				{					
					$this->session->price = 1;
				}
			}
		}
		$config = array(
			"base_url" => base_url()."index.php/User/SortC/index/",
			"total_rows" => $this->sm->getCount($this->session->price),
			"per_page" => 3,
			"use_page_numbers" => TRUE,
			"cur_tag_open" => "<a class='current'>",
			"cur_tag_close" => "</a>",
			"next_link" => "Next",
			"prev_link" => "Prev"
		);
		$this->load->library("pagination");
		$this->pagination->initialize($config);
		if($this->uri->segment(4))
		{
			$page = ($this->uri->segment(4));
		}
		else
		{
			$page = 1;
		}
		$page=($page*$config["per_page"])-$config["per_page"];
		$category = $this->cm->fetchcategory();
		$y = $this->sm->fetchCourse($config["per_page"],$page,$this->session->price);
		foreach ($category as $key)
		{
			$key->subCategory=$this->cm->fetchSubCategory($key->categoryID);
		}
		foreach ($y as $key)
		{
			$key->enID = $this->cm->fetchEnroll($key->courseID);
		}
		$data = array(
			"courseData" => $y,
			"categorydata"=>$category,
			"links" => explode("&nbsp;",$this->pagination->create_links()),
			"price"	=> $this->session->price,
		);
		$this->load->view("User/courseList",$data);
	}
}
