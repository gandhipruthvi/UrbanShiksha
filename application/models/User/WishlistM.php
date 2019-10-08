<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class WishlistM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchWishlist()
	{
		$this->db->select("c.*,u.userName");
		$this->db->from("tblcourse as c");
		$this->db->join("tbluser as u","u.userID=c.userID");
		$this->db->join("tblwishlist as w","w.courseID=c.courseID");
		$this->db->where("w.userID",$this->session->userID);
		return $this->db->get()->result();
	}
}
?>