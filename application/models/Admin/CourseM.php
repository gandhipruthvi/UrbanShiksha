<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CourseM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchCourse()
	{
		$this->db->limit(30);
		$this->db->select("c.*,u.userName,s.subjectName");
		$this->db->from("tblCourse as c");
		$this->db->join("tblUser as u","u.userID = c.userID");
		$this->db->join("tblSubject as s","s.subjectID = c.subjectID");
		$this->db->where("c.status",1);
		$this->db->or_where("c.status",0);
		return $this->db->get()->result();
	}

	public function fetchAllCourse($id=null)
	{
		$this->db->select('c.*,u.userName,s.subjectName');
		$this->db->from('tblCourse as c');
		$this->db->join('tblUser as u','c.userID=u.userID');
		$this->db->join('tblSubject as s','c.subjectID=s.subjectID');
		$this->db->where("c.status",1);
		$this->db->or_where("c.status",0);
		if($id!=null)
		{
			$this->db->where('c.subjectID',$id);
		}
		return $this->db->get()->result();
	}

	public function fetchCourseInfo($id=null)
	{
		$this->db->select("c.*,u.userName,s.subjectName");
		$this->db->from("tblCourse as c");
		$this->db->join("tblUser as u","u.userID = c.userID");
		$this->db->join("tblSubject as s","s.subjectID = c.subjectID");
		$this->db->where("c.courseID",$id);
		return $this->db->get()->result()[0];
	}
	public function fetchName($id)
	{
		$this->db->select("s.subjectName,sc.subcategoryName,c.categoryName");
		$this->db->from("tblSubject as s");
		$this->db->join("tblSubCategory as sc","s.subcategoryID=sc.subcategoryID");
		$this->db->join("tblCategory as c","c.categoryID=sc.categoryID");
		$this->db->where("s.subjectID",$id);
		return $this->db->get()->result()[0];	
	}	

	public function fetchReview($id)
	{
		$this->db->select("r.*,u.userName,u.image,r.courseID");
		$this->db->from("tblRatings as r");
		$this->db->join("tblCourse as c","c.courseID=r.courseID");
		$this->db->join("tblUser as u","u.userID=r.userID");
		// if($id!=null)
			$this->db->where('c.courseID',$id);
		return $this->db->get()->result();	
	}
}

?>