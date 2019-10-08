<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class ForgetPassM extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchDetails($data)
	{
		$this->db->where($data);
		$x=$this->db->get("tblUser");

		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return false;
		}
	}

	public function updPass($data,$mail)
	{
		$this->db->where("email",$mail);
		return $this->db->update("tblUser",$data);
	}
}


?>