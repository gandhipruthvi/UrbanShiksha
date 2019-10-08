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
		$this->load->model("Instructor/CourseM","cm");
		$this->load->model("Instructor/ChapterM","chpm");
	}

	public function index()
	{
		$course = $this->cm->fetchAllCourse();
		foreach ($course as $key) 
		{
			$key->enr = $this->cm->totalStudents($key->courseID);
		}
		$res=$this->cm->fillSubject();
		$data = array(
			"courseData" => $course,
			"subjectData"=>$res
		);
		$this->load->view("Instructor/CourseView",$data);
	}

	
	public function searchCourse()
	{
		$name = $this->input->post('txtsearch');
		$x = $this->cm->searchCourse($name);
		$data = array(
			"courseData"=>$x
		);
		$this->load->view("Instructor/CourseView",$data);
	}

	public function courseDetails($courseID)
	{
		$res1=$this->cm->fetchReview($courseID);
		$chapter=$this->cm->fetchChapter($courseID);
		foreach ($chapter as $key2) {
			$key2->topicData=$this->chpm->fetchTopic($key2->chapterID);
		}
		$question = $this->cm->fetchQuestion($courseID);
		foreach ($question as $key1)
		{
			$key1->answer = $this->cm->fetchAnswer($key1->questionID);
		}
		$res=$this->cm->fetchviewCourse($courseID);
		$s = $this->cm->fetchSubject();
		$enroll = $this->cm->fetchEnrollUser($courseID);
		$data=array(
			'courseID'=>$courseID,
			'courseDetails'=>$res,
			'chapterData'=>$chapter,
			'coursedescription'=>$res[0]->description,
			'reviewdata'=>$res1,
			'subjectData' => $s,
			"questionData" => $question,
			"userEnrollData" => $enroll
		);
		$this->load->view("Instructor/viewmoreCourse",$data);	
	}

	public function addCourse()
	{
		$data = array(
			'courseName' => $this->input->post('txtcourse'),
			'userID'=>$this->session->userID,
			'description' => $this->input->post('description'),
			'image' => "",
			'price' => $this->input->post('price'),
			'subjectID' => $this->input->post('listSubject')
		);
		$this->cm->addCourse($data);
		$cID = $this->db->insert_id().".jpg";
		$temp = array(
			'image' => $cID
		);
		$this->cm->updCourse($cID,$temp);
		$img=$this->input->post('img');
		$image_array_1=explode(";",$img);
		$image_array_2=explode(",",$image_array_1[1]);
		$img1=base64_decode($image_array_2[1]);
		$imagename=$cID;
		file_put_contents("upload/course/".$imagename,$img1);
		
		$this->load->view('Instructor/CourseView',$data);
		redirect('Instructor/CourseC/');			
	}
	
}
?>