<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class CartM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchCart($id)
	{
		$this->db->where("CourseID",$id);
		$this->db->where("userID",$this->session->userID);
		$x=$this->db->get('tblCart');

		if($x->num_rows()>0)
		{
			return "1";
		}
		else
		{
			return "0";
		}
		// return $this->db->get("tblcart")->result()[0];
	}

	public function showCart($id)
	{
		$this->db->select("ca.cartID,c.courseID,c.courseName,c.price,c.image");
		$this->db->from("tblCart as ca");
		$this->db->join("tblCourse as c","c.CourseID=ca.CourseID");
		$this->db->where("ca.userID",$id);
		return $this->db->get()->result();
	}
	public function insertCart($data)
	{
		return $this->db->insert("tblCart",$data);
	}

	public function delCart($id)
	{
		$this->db->where("courseID",$id);
		return $this->db->delete("tblCart");
	}

	public function checkCode($offerCode)
	{
		$this->db->where("offerCode",$offerCode);
		$this->db->where("status",0);
		$res=$this->db->get("tblOffer");
		if($res->num_rows()==0)
		{
			return null;
		}
		else
		{
			return $res->result()[0];
		}
	}
}
?>