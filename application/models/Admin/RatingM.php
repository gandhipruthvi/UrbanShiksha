<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RatingM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchUser($uid)
	{
		$this->db->select("u.*,c.cityName,s.stateName,cnt.countryName");
		$this->db->from("tblUser u");
		$this->db->join("tblCity c","c.cityID = u.cityID");
		$this->db->join("tblState s","s.stateID = c.stateID");
		$this->db->join("tblCountry cnt","cnt.countryID = s.countryID");
		$this->db->where("u.userID",$uid);
		return $this->db->get()->result()[0];
	}

	public function fetchRating($uid)
	{
		$this->db->where("userID",$uid);
		return $this->db->get("tblratings")->result();
	}

	public function fetchAllCourse($uid)
	{
		// $this->db->select("ce.courseEnrollmentID,ce.courseID,ce.userID,ce.date,c.courseName,c.userID,c.description,c.status,c.noOfChapters,c.image,c.price,c.subjectID");
		$this->db->select("c.*,ce.*,s.*");
		$this->db->from("tblCourseEnrollment as ce");
		$this->db->join("tblCourse as c","c.courseID=ce.courseID");
		$this->db->join("tblSubject as s","s.subjectID=c.subjectID");
		$this->db->where("ce.userID",$uid);
		// return $this->db->get()->result();
		return $this->db->get()->result();
		
	}
}

?>