<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginM extends CI_Model
{
	public function fetchUser($data)
	{
		$this->db->where($data);
		$x = $this->db->get('tblUser');

		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return false;
		}
	}
	public function addUser($data)
	{
		$this->db->insert("tblUser",$data);
	}
	public function fetchCity()
	{
		$this->db->order_by("cityName","asc");
		return $this->db->get("tblCity")->result();
	}

	public function addLog($temp)
	{
		return $this->db->insert("tblLog",$temp);
	}
}

?>