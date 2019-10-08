<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchUser()
	{
		/*$this->db->select("u.userID,u.userName,u.contactNumber,u.email,u.gender,u.qualification,c.courseName,u.userXP,u.status,u.image,r.stars,r.review");
		$this->db->from("tblRatings as r");
		$this->db->join("tblUser as u","r.userID=u.userID");
		$this->db->join("tblCourse as c","c.courseID = r.courseID","c.courseID=u.courseID");*/
		return $this->db->get("tblUser")->result();
	}
	
	public function statusChange($id)
	{
		$this->db->set("status","1-status",false)->where("userID",$id)->update("tblUser");
	}	
}


?>