<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class CourseC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/CourseM","cm");
		$this->load->model("User/CartM","cam");
		$this->load->model("User/CourseEnrollM","em");
		$this->load->model("User/MyCourseM","mcm");
		$this->load->library("pagination");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index()
	{
		$category = $this->cm->fetchcategory();
		foreach ($category as $key)
		{
			$key->subCategory=$this->cm->fetchSubCategory($key->categoryID);
		}
		$data = array(
			"categorydata"=>$category,
		);
		$this->load->view("User/courseList",$data);
	}

	public function showMore()
	{
		$category = $this->cm->fetchMoreCategory();
		foreach ($category as $key)
		{
			$key->subCategory=$this->cm->fetchSubCategory($key->categoryID);
		}
		$data = array(
			"categorydata"=>$category,
		);
		echo json_encode($data);
	}

	public function showLess()
	{
		$category = $this->cm->fetchcategory();
		foreach ($category as $key)
		{
			$key->subCategory=$this->cm->fetchSubCategory($key->categoryID);
		}
		$data = array(
			"categorydata"=>$category,
		);
		echo json_encode($data);
	}

	public function viewCourse($id)
	{	
		$id=urldecode(base64_decode($id));
		$cart = $this->cam->fetchCart($id);
		$res = $this->cm->fetchCourseInfo($id);
		$res1 = $this->cm->fetchReview($id);
		$res2 = $this->cm->fetchChapter($id);
		$enroll = $this->em->fetchEnrollCourse($id);
		$question = $this->mcm->fetchQuestion($id);
		$wishlist = $this->cm->fetchWishlist($id);

		foreach ($question as $key1)
		{
			$key1->answer = $this->mcm->fetchAnswer($key1->questionID);
		}
		foreach ($res2 as $key)
		{
			$key->tpID = $this->cm->fetchTopic($key->chapterID);
		}

		$data=array(
			"cartdata"=>$cart,
			"coursedata"=>$res,
			"description"=>$res->description,
			"reviewdata"=>$res1,
			"chapterData" => $res2,
			"enrollData" => $enroll,
			"questions"=>$question,
			"wishlist"=>$wishlist
		);
		$this->load->view("User/viewCourse",$data);
	}

	public function paginate($pageNo=null)
	{
		$subcategoryID="";
		$rowPage = 3;
		$price= null;
		$searcht = "";
		if($this->input->post("subID")!="")
		{
			$subcategoryID=$this->input->post("subID");
		}
		if($this->input->post("checkF")=="Free" && $this->input->post("checkP")=="Paid")
		{
			$price = '2';
		}
		elseif($this->input->post("checkF")=="Free")
		{
			$price = '0';
		}
		elseif($this->input->post("checkP")=="Paid")
		{
			$price = '1';
		}
		if($this->input->post("searcht")!="")
		{
			$searcht=$this->input->post("searcht");
		}	

		if($pageNo!=0)
		{

			$pageNo = ($pageNo-1)*$rowPage;
		}	

		$config = array(
			"base_url" => base_url()."index.php/User/CourseC/index/",
			"total_rows" => $this->cm->getCount($searcht,$price,$subcategoryID),
			"per_page" => $rowPage,
			"use_page_numbers" => TRUE,
			"cur_tag_open" => "<a class='current'>",
			"cur_tag_close" => "</a>",
			"next_link" => "Next",
			"prev_link" => "Prev"
		);
		$this->pagination->initialize($config);

		$y = $this->cm->fetchAllCourse($pageNo,$rowPage,$searcht,$price,$subcategoryID);

		foreach ($y as $key)
		{
			$key->enID = $this->cm->fetchEnroll($key->courseID);
			$rates = $this->cm->fetchRatings($key->courseID);
			if($rates!=null)
			{
				foreach ($rates as $key1 ) {
					$key->rates=$key1->stars*20;
				}
			}
			else
			{
				$key->rates=0;
			}
		}
		$data = array(
			"courseData" => $y,
			"pagination" => explode("&nbsp;",$this->pagination->create_links()),
			"row" => $pageNo
		);
		/*echo "<pre>";
		print_r($data);
		die();*/
		echo json_encode($data);
	}

	public function addWishlist($courseID)
	{
		$data=array(
			"userID"=>$this->session->userID,
			"courseID"=>$courseID
		);
		$this->cm->addWishlist($data);
	}

	public function removeWishlist($courseID)
	{
		$this->cm->removeWishlist($courseID);
	}
}
?>