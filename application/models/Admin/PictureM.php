<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PictureM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function changePicture($data,$uid)
	{
		//+$this->db->set($data);
		$this->db->where("adminID",$uid);
		return $this->db->update("tblAdmin",$data);
	}
}

?>