<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class HomeM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertOrder($data)
	{
		 $this->db->insert("tblOrder",$data);
		 return $this->db->insert_id();
	}

	public function insertPayment($data)
	{
		 $this->db->insert("tblPayment",$data);
	}

	public function insertOrderCourse($data)
	{
			$this->db->insert("tblordercourse",$data);	
	}

	public function insertCourseEnrollment($data)
	{
			$this->db->insert("tblcourseenrollment",$data);	
	}
	
	public function fetchCart($uid)
	{
		$this->db->select("courseID");
		$this->db->from("tblCart");
		$this->db->where("userID",$uid);
		return $this->db->get()->result();
	}
	public function delCart($id)
	{
		$this->db->where("userID",$id);
		return $this->db->delete("tblCart");
	}

	public function fetchCourseUser($courseID)
	{
		return $this->db->where("courseID",$courseID)->select("userID,courseName")->get("tblCourse")->result()[0];
	}

	public function setNotification($value)
	{
		return $this->db->insert("tblNotification",$value);	
	}

	public function getCourse()
	{
		$this->db->select("c.*,u.userName");
		$this->db->from("tblCourse c");
		$this->db->join("tblUser u","c.userID = u.userID");
		$this->db->join("tblsubject s","s.subjectID=c.subjectID");
		// $this->db->where("c.courseID",$courseID);
		$this->db->order_by("c.courseID","RANDOM");
		$this->db->limit(3);
		return $this->db->get()->result();
	}

	public function courseNameImage()
	{
		return $this->db->get("tblCourse")->result();
	}

	public function insertRating($data)
	{
		$this->db->insert("tblRatings",$data);
	}

	public function getInstructors()
	{
		$this->db->select("COUNT(courseID) as course,userID");
		$this->db->group_by("userID");
		$this->db->order_by("course","desc");
		$this->db->limit(3);
		return $this->db->get("tblcourse")->result();
	}

	public function getInstructorData($userID)
	{
		$this->db->where("userID",$userID);
		return $this->db->get("tbluser")->result()[0];
	}
}
?>