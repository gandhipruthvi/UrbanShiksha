<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class CourseM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchcategory()
	{
		$this->db->limit(3);
		$this->db->order_by("categoryName","asc");
		return $this->db->get("tblCategory")->result();
	}

	public function fetchMoreCategory()
	{
		// $this->db->limit(14,3);
		$this->db->order_by("categoryName","asc");
		return $this->db->get("tblCategory")->result();
	}

	public function fetchRandomCourse()
	{
		$this->db->select("courseID,courseName,image,price");
	    $this->db->order_by('courseID', 'RANDOM');
	    $this->db->limit(3);
	    $this->db->where("status",0);
	    return $this->db->get('tblCourse')->result();
	}

	public function fetchCourse($id)
	{
		$this->db->select("count(*) as count,c.*,s.subjectName,u.userName");
		$this->db->from("tblCourse as c");
		$this->db->join("tblUser as u","u.userID = c.userID");
		$this->db->join("tblSubject as s","s.subjectID=c.subjectID");
		$this->db->join("tblCourseEnrollment as c1","c1.courseID=c.courseID");
		$this->db->where("c.status",1);
		$this->db->or_where("c.status",0);
		if($id!=null)
		{
			$this->db->where("s.subcategoryID",$id);
		}
		$this->db->group_by("c.courseID");
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
	public function fetchSubCategory($id=null)
	{
		$this->db->select("s.*");
		$this->db->from("tblSubCategory as s");
		$this->db->join("tblCategory as c","c.categoryID = s.categoryID");
		$this->db->where("c.categoryID",$id);
		return $this->db->get()->result();
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

	public function fetchAllCourse($limit,$page,$searcht=null,$price=null,$subID=null)
	{
		$this->db->select("c.*,u.userName");
		$this->db->from("tblCourse c");
		$this->db->join("tblUser u","c.userID = u.userID");
		$this->db->join("tblsubject s","s.subjectID=c.subjectID");
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
		}
		if($subID!="" || $subID!=null)
		{
			$this->db->where("s.subcategoryID",$subID);
		}
		$this->db->where("c.status",0);
		$this->db->limit($page,$limit);
		return $this->db->get()->result();
	}

	public function fetchEnroll($id=null)
	{
		$this->db->select("count(*) as count");
		$this->db->from("tblCourseEnrollment e");
		$this->db->join("tblCourse c","e.courseID = c.courseID");
		$this->db->where("c.courseID",$id);
		return $this->db->get()->result()[0];
	}

	public function fetchChapter($id=null)
	{
		$this->db->select("ch.*");
		$this->db->from("tblChapter ch");
		$this->db->join("tblCourse c","c.courseID = ch.courseID");
		$this->db->where("c.courseID",$id);
		return $this->db->get()->result();
	}

	public function fetchTopic($id=null)
	{
		$this->db->select("t.*");
		$this->db->from("tblTopic t");
		$this->db->join("tblChapter c","c.chapterID = t.chapterID");
		$this->db->where("c.chapterID",$id);
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

	public function getCount($searcht=null,$price=null,$subcategoryID=null)
	{
		$this->db->select("c.*");
		if($subcategoryID!=null || $subcategoryID!="")
		{
			$this->db->where("s.subcategoryID",$subcategoryID);
		}
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
		}
		$this->db->from("tblCourse as c");
		$this->db->join("tblSubject as s","c.subjectID=s.subjectID");
		return $this->db->get()->num_rows();
	}

	public function fetchRatings($courseID)
	{
		$this->db->select("AVG(stars) stars");
		$this->db->from("tblRatings");
		$this->db->where("courseID",$courseID);
		$this->db->group_by("courseID");
		return $this->db->get()->result();
	}

	public function fetchWishlist($courseID)
	{
		$this->db->where("courseID",$courseID);
		$this->db->where("userID",$this->session->userID);
		return $this->db->get("tblWishlist")->num_rows();
	}

	public function addWishlist($data)
	{
		$this->db->insert("tblWishlist",$data);
	}

	public function removeWishlist($courseID)
	{
		$this->db->where("courseID",$courseID);
		$this->db->where("userID",$this->session->userID);
		$this->db->delete("tblWishlist");
	}
}
?>