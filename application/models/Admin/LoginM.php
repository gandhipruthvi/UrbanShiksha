<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginM extends CI_Model
{
	public function fetchAdmin($data)
	{
		$this->db->where($data);
		$x = $this->db->get('tblAdmin');

		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return null;
		}
	}
}

?>