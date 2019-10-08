<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class EditCourseM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function setCourse($data,$courseID)
	{
		return $this->db->where("courseID",$courseID)->update("tblCourse",$data);
	}

	public function fetchCourseUser($courseID)
	{
		return $this->db->where("courseID",$courseID)->select("userID")->get("tblCourseEnrollment")->result();
	}

	public function setNotification($value)
	{
		return $this->db->insert("tblNotification",$value);	
	}

	public function fetchCourse($courseID)
	{
		return $this->db->where("courseID",$courseID)->select("courseName")->get("tblCourse")->result()[0];
	}
}
?>