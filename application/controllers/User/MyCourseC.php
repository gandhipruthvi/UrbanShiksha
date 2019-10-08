<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class MyCourseC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/CourseM","cm");
		$this->load->model("User/MyCourseM","mcm");
		$this->load->model("User/CartM","cam");
		$this->load->model("User/CourseEnrollM","em");
		$this->load->model("Instructor/EditCourseM","im");
		$this->load->library("pagination");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index()
	{
		$config = array(
			"base_url" => base_url()."index.php/User/MyCourseC/index/",
			"total_rows" => $this->mcm->getCount(),
			"per_page" => 3,
			"use_page_numbers" => TRUE,
			"cur_tag_open" => "<a class='current'>",
			"cur_tag_close" => "</a>",
			"next_link" => "Next",
			"prev_link" => "Prev"
		);
		// echo $this->db->last_query();
		// echo "<br>";
		// echo $config["total_rows"];
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
		$y = $this->mcm->fetchEnrollCourse($config["per_page"],$page);
		foreach ($category as $key)
		{
			$key->subCategory=$this->cm->fetchSubCategory($key->categoryID);
		}
		// foreach ($y as $key)
		// {
		// 	$key->enID = $this->cm->fetchEnroll($key->courseID);
		// }
		$data = array(
			"courseData" => $y,
			"categorydata"=>$category,
			"links" => explode("&nbsp;",$this->pagination->create_links())
		);
		// echo "<pre>";
		// print_r($data);
		// die();
		$this->load->view("User/myCourseList",$data);
	}

	public function paginate($pageNo=null)
	{
		$rowPage = 3;
		$price= null;
		$searcht = "";
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
			"base_url" => base_url()."index.php/User/MyCourseC/index/",
			"total_rows" => $this->mcm->getCount($searcht,$price),
			"per_page" => $rowPage,
			"use_page_numbers" => TRUE,
			"cur_tag_open" => "<a class='current'>",
			"cur_tag_close" => "</a>",
			"next_link" => "Next",
			"prev_link" => "Prev"
		);
		$this->pagination->initialize($config);

		$y = $this->mcm->fetchEnrollCourse($pageNo,$rowPage,$searcht,$price);
		// echo $this->db->last_query();
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
		// echo "<pre>";
		// print_r($data);
		// die();
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
		$reviewres=$this->mcm->fetchRatingData($id);
		$question = $this->mcm->fetchQuestion($id);
		foreach ($res2 as $key)
		{
			$key->tpID = $this->cm->fetchTopic($key->chapterID);
		}
		foreach ($question as $key1)
		{
			$key1->answer = $this->mcm->fetchAnswer($key1->questionID);
		}
		$data=array(
			"cartdata"=>$cart,
			"coursedata"=>$res,
			"description"=>$res->description,
			"reviewdata"=>$res1,
			"chapterData" => $res2,
			"enrollData" => $enroll,
			"questions"=>$question,
			"myreview"=>$reviewres
		);
		$this->load->view("User/viewMyCourse",$data);
	}	

	public function questionAsk()
	{
		$data = array(
			"question" => $this->input->post('question'),
			"courseID" => $this->input->post('cid'),
			"userID" => $this->session->userID
		);

		$x=$this->mcm->setQuestion($data);
		$courseID = $data["courseID"];
		$uID = $this->mcm->fetchUserName($this->session->userID);
		$cID = $this->mcm->fetchCourse($courseID);

        $temp = array(
            "receiver" => $cID->userID,
            "sender" => $this->session->userID,
            "message" => "This User ".$uID->userName." has asked question on this course ".$cID->courseName,
            "link" => site_url("Instructor/CourseC/courseDetails/").$courseID
        );
        // echo "<pre>";
        // print_r($temp);
        // die();
        $this->im->setNotification($temp);			


		if($x)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
}
?>