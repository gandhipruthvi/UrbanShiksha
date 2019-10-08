<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeDataM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function changeData($data)
	{
		$this->db->set($data);
		$this->db->where('adminID',$this->session->adminID);
		return $this->db->update('tblAdmin');
	}

	public function fetchAdmin($uid)
	{
		$this->db->where("adminID",$uid);
		return $this->db->get("tblAdmin")->result()[0];
	}
}

?>