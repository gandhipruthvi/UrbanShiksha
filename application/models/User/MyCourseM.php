<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class MyCourseM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchEnrollCourse($limit,$page,$searcht=null,$price=null)
	{
		$this->db->select("c.*,e.*,u.userName");
		$this->db->from("tblCourseEnrollment e");
		$this->db->join("tblCourse c","c.courseID = e.courseID");
		$this->db->join("tblUser u","u.userID = c.UserID");
		if($price!="" || $price!=null || $searcht!="")
		{
			if($price=='0')
				$this->db->where("c.price",$price);
			elseif($price=='1')
				$this->db->where("c.price >=",$price);
			if($searcht!="")
			{
				$this->db->like("courseName",$searcht);
			}
		}
		$this->db->limit($page,$limit);
		$this->db->where("e.userID",$this->session->userID);
		return $this->db->get()->result();
	}

	public function getCount($searcht=null,$price=null)
	{
		if($price!="" || $price!=null || $searcht!="")
		{
			if($price=='0')
				$this->db->where("c.price",$price);
			elseif($price=='1')
				$this->db->where("c.price >=",$price);
			if($searcht!="")
			{
				$this->db->like("c.courseName",$searcht);
			}
			$this->db->from("tblCourseEnrollment e");
			$this->db->join("tblCourse c","c.courseID = e.courseID");
			$this->db->where("e.userID",$this->session->userID);
			return $this->db->get()->num_rows();
		}
		else
		{
			$this->db->from("tblCourseEnrollment e");
			$this->db->join("tblCourse c","c.courseID = e.courseID");
			$this->db->where("e.userID",$this->session->userID);
			return $this->db->get()->num_rows();
		}
	}

	public function setQuestion($data)
	{
		return $this->db->insert("tblQuestion",$data);
	}

	public function fetchQuestion($id)
	{
		$this->db->select("q.questionID,q.question,u.userName,u.image,q.date");
		$this->db->from("tblQuestion q");
		$this->db->join("tblUser u","u.userID = q.userID");
		$this->db->where("q.courseID",$id);
		return $this->db->get()->result();	
	}

	public function fetchAnswer($qID)
	{
		$this->db->select("a.answerID,a.answer,q.question,u.userName,u.image,u.qualification,u.email,a.date");
		$this->db->from("tblAnswer a");
		$this->db->join("tblQuestion q","q.questionID = a.questionID");
		$this->db->join("tblUser u","u.userID = a.userID");
		$this->db->where('a.questionID',$qID);
		return $this->db->get()->result();
	}

	public function fetchRatings($courseID)
	{
		$this->db->select("AVG(stars) stars");
		$this->db->from("tblRatings");
		$this->db->where("courseID",$courseID);
		$this->db->group_by("courseID");
		return $this->db->get()->result();
	}

	public function fetchCourse($courseID)
	{
		$this->db->select("c.courseName,u.userID");
		$this->db->where("c.courseID",$courseID);
		$this->db->from("tblCourse c");
		$this->db->join("tblUser u","u.userID=c.userID");
		return $this->db->get()->result()[0];
	}

	public function fetchUserName($uID)
	{
		return $this->db->where("userID",$uID)->select("userName")->get("tblUser")->result()[0];
	}

	public function fetchRatingData($courseid)
	{
		$this->db->where("courseID",$courseid);
		$this->db->where("userID",$this->session->userID);
		$res=$this->db->get("tblRatings");
		if($res->num_rows()==0)
			return null;
		else
			return $res->result()[0];
	}
}
?>