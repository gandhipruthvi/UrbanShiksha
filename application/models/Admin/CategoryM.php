<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryM extends CI_Model
{
	public function fetchAllCategory()
	{
		return $this->db->get("tblCategory")->result();
	}

	public function fetchAllSubCategory()
	{
		return $this->db->get("tblSubCategory")->result();
	}
	public function fetchAllSubject()
	{
		return $this->db->get("tblSubject")->result();
	}

	public function addCategory($data)
	{
		$this->db->insert("tblCategory",$data);
	}
	
	public function addSubcategory($data)
	{
		$this->db->insert("tblSubcategory",$data);
	}
	public function addSubject($data)
	{
		$this->db->insert("tblSubject",$data);
	}

	public function statusChange($courseID)
	{
		$this->db->set("status","1-status",false)->where("courseID",$courseID)->update("tblCourse");
	}
}	
?>