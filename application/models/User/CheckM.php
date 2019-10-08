<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class CheckM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchUser($data)
	{
		$this->db->where($data);
		$x = $this->db->get("tblUSer");

		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return false;
		}
	}
}


?>