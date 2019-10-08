<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ChangeCourseM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function changeData($data)
	{
		$this->db->set($data);
		$this->db->where('courseID',$this->session->adminID);
		return $this->db->update('tblCourse');
	}

	public function fetchCourse($cid)
	{
		$this->db->where("courseID",$cid);
		return $this->db->get("tblCourse")->result()[0];
	}
	
}
?>