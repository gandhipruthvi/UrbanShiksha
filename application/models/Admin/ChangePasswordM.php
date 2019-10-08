<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePasswordM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchData($data)
	{
		$this->db->where($data);
		return $this->db->get('tblAdmin')->num_rows();
	}

	public function updPass($data,$uid)
	{
		$this->db->set($data);
		$this->db->where('adminID',$uid);
		return $this->db->update('tblAdmin');
	}
}

?>