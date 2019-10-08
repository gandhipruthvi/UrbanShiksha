<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class EditCourseC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Instructor/EditCourseM","em");
	}

	public function index($courseID)
	{
		$data = array(
			"courseName" => $this->input->post("txtCourseName"),
			"image" => "",
			"price" => $this->input->post("txtPrice"),
			"subjectID" => $this->input->post("listSubject"),
			"description" => $this->input->post("txtDescription"),
		);

		$img=$this->input->post('img');
		$image_array_1=explode(";",$img);
		$image_array_2=explode(",",$image_array_1[1]);
		$img1=base64_decode($image_array_2[1]);
		$imagename=$this->input->post('txtCourseName').".jpg";
		file_put_contents("upload/course/".$imagename,$img1);

		$data['image']=$imagename;
		// $this->em->setCourse($data,$courseID);
		// die();

		$cID = $this->em->fetchCourseUser($courseID);

		foreach ($cID as $key) 
		{
	        $temp = array(
	            "receiver" => $key->userID,
	            "sender" => $this->session->userID,
	            "message" => "Course ".$data['courseName']." has been updated",
	            "link"=> site_url("User/MyCourseC/viewCourse/").urlencode(base64_encode($courseID))
	        );

	        $this->em->setNotification($temp);			
		}

		redirect("Instructor/CourseC/courseDetails/".$courseID);	
	}
}
?>