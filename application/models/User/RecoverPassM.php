<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class RecoverPassM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function chngPass($data,$userName)
	{
		return $this->db->set($data)->where("userName",$userName)->update("tblUser");
	}
}
?>