<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class CourseM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchSubject()
	{
		return $this->db->get("tblSubject")->result();
	}
	
	public function fetchAllCourse()
	{
		$this->db->select("c.*,s.subjectName");
		$this->db->from("tblCourse c");
		$this->db->join("tblUser u","c.userID = u.userID");
		$this->db->join("tblSubject s","s.subjectID=c.subjectID");
		$this->db->where("c.userID",$this->session->userID);
		return $this->db->get()->result();
	}

	public function totalStudents($cID)
	{
		return $this->db->where("courseID",$cID)->get("tblCourseEnrollment")->num_rows();
	}

	public function fetchviewCourse($id)
	{
		$this->db->select("c.*,u.userName,s.subjectName");
		$this->db->from("tblCourse c");
		$this->db->join("tblUser u","c.userID = u.userID");
		$this->db->join("tblSubject s","s.subjectID=c.subjectID");
		$this->db->where("c.courseID",$id);	
		return $this->db->get()->result();
	}

	public function fetchReview($id)
	{
		$this->db->select("r.*,u.userName,u.image,r.courseID");
		$this->db->from("tblRatings as r");
		$this->db->join("tblCourse as c","c.courseID=r.courseID");
		$this->db->join("tblUser as u","u.userID=r.userID");
		$this->db->where('c.courseID',$id);
		return $this->db->get()->result();	
	}

	public function searchCourse($name)
	{
		$this->db->select("c.*,u.userName");
		$this->db->from("tblCourse c");
		if($name!=null)
		{
			$this->db->like('c.courseName', $name);
			$this->db->or_like('u.userName', $name);
		}
		$this->db->join("tblUser u","c.userID = u.userID");
		return $this->db->get()->result();
	}

	public function fetchChapter($id)
	{
		$this->db->select("c.*");
		$this->db->from("tblChapter c");
		$this->db->where("c.courseID",$id);
		$this->db->order_by("c.number");
		return $this->db->get()->result();	
	}

	public function fillSubject()
	{
		return $this->db->get("tblSubject")->result();
	}

	public function addCourse($data)
	{
		$this->db->insert("tblCourse",$data);
	}

	public function fetchQuestion($id)
	{
		$this->db->select("q.questionID,q.question,u.userName,u.image,q.date,q.status");
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

	public function incrementChapter($courseID)
	{
		$this->db->set("noOfChapters","noOfChapters+1",false)->where("courseID",$courseID)->update("tblCourse");
	}	

	public function updCourse($cID,$temp)
	{
		return $this->db->where("courseID",$cID)->update("tblCourse",$temp);
	}

	public function fetchEnrollUser($courseID)
	{
		$this->db->select("u.image,u.userName,u.email,u.contactNumber,u.qualification");
		$this->db->from("tblCourseEnrollment ce");
		$this->db->join("tblUser u","u.userID = ce.userID");
		$this->db->where("ce.courseID",$courseID);
		return $this->db->get()->result();
	}
}
?>