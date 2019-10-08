<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class AccountSettingM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchUser()
	{
		$this->db->select("u.*,c.*");
		$this->db->from("tblUser as u");
		$this->db->join("tblCity as c","c.cityID = u.cityID");
		$this->db->where("u.userID",$this->session->userID);
		return $this->db->get()->result()[0];
	}

	public function fetchCity()
	{
		$this->db->order_by("cityName","asc");
		return $this->db->get("tblCity")->result();
	}

	public function editData($data)
	{
		$this->db->where("userID",$this->session->userID);
		return $this->db->update("tblUser",$data);
	}

	public function fetchPass($data)
	{
		$this->db->where($data);
		$x=$this->db->get("tblUser");

		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return null;
		}
	}

	public function chngPass($data)
	{
		$this->db->where("userID",$this->session->userID);
		return $this->db->update("tblUser",$data);
	}

	public function changePicture($data)
	{
		$this->db->where("userID",$this->session->userID);
		return $this->db->update("tblUser",$data);
	}
}
?>