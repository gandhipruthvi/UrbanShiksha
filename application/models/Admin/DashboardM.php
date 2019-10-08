<?php

defined('BASEPATH') OR exit('Ille');
/**
 * 
 */
class DashboardM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getStudent()
	{
		return $this->db->get("tblUser")->num_rows();
	}
	public function getCourse()
	{
		return $this->db->get("tblCourse")->num_rows();
	}
	public function getAmount()
	{
		$this->db->select('SUM(amount) as amount');
		$this->db->from("tblPayment");
		return $this->db->get()->result()[0];
	}
	public function getInstructor()
	{
		$this->db->distinct()->select('userID')->from('tblCourse');
  		return $this->db->get()->num_rows();
	}
	public function countCourse()
	{
		$this->db->select("c.courseID,COUNT(c.courseEnrollmentID) as ce");
		// $this->db->join("tblUser as u","u.userID=c.userID");
		$this->db->order_by("ce","desc");
		$this->db->group_by("c.courseID");
		$this->db->limit(5);
		return $this->db->get("tblCourseEnrollment as c")->result();
	}
	public function fetchCourse($courseid)
	{
		$this->db->select("c.*,u.userName");
		$this->db->join("tblUser as u","u.userID=c.userID");
		$this->db->where("c.courseID",$courseid);
		return $this->db->get("tblCourse as c")->result()[0];
	}
}
?>