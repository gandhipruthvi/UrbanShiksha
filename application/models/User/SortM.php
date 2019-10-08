<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class SortM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchCourse($limit,$page,$price)
	{
		$this->db->limit($limit,$page);
		$this->db->select("c.*,u.userName");
		$this->db->from("tblCourse c");
		$this->db->join("tblUser u","c.userID = u.userID");
		if($price==0)
			$this->db->where("price",$price);
		elseif($price==1)
			$this->db->where("price >=",$price);
		// echo "<pre>";
		return $this->db->get()->result();
		// die();
	}

	public function getCount($price)
	{
		if($price==0)
			$this->db->where("price",$price);
		elseif($price==1)
			$this->db->where("price >=",$price);
		$this->db->from("tblCourse");
		return $this->db->count_all_results();
	}
}
?>