<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAdmin()
	{
		return $this->db->get("tblAdmin")->result();
	}

	public function addAdmin($data)
	{
		$this->db->insert("tblAdmin",$data);
	}

	public function updData($id)
	{
		$this->db->where('adminID',$id);
		return $this->db->get('tblAdmin')->result()[0];
	}

	public function updAdmin($data,$id)
	{
		$this->db->set($data);
		$this->db->where('adminID',$id);
		$this->db->update('tblAdmin',$data);
	}

	public function searchAdmin($name)
	{
		$this->db->where('adminName',$name);
		return $this->db->get('tblAdmin')->result();
	}
}

?>