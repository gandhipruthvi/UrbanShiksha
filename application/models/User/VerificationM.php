<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getInfo($uid)
	{
		return $this->db->where("userID",$uid)->get("tblUser")->result()[0];
	}

	public function updStatus($uid)
	{
		return $this->db->set("status","0")->where("userID",$uid)->update("tblUSer");
	}
}
