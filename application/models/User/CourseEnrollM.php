<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class CourseEnrollM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchEnrollCourse($id=null)
	{
		$this->db->select("*");
		$this->db->where("courseID",$id);
		$this->db->where("userID",$this->session->userID);
		$x=$this->db->get('tblCourseEnrollment');
		if($x->num_rows()>0)
		{
			return "1";
		}
		else
		{
			return "0";
		}
	}	

	public function fetchCourse($eid)
	{
		return $this->db->where("courseID",$eid)->get("tblCourse")->result()[0];
	}
	public function courseEnroll($data)
	{
		return $this->db->insert("tblCourseEnrollment",$data);
	}
}
?>