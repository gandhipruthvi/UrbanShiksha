<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class NotificationM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getNotification()
	{
		$this->db->where("receiver",$this->session->userID);
		$this->db->where("status",0);
		return $this->db->get("tblNotification")->result();
	}

	public function cntNotification()
	{
		$this->db->where("receiver",$this->session->userID);
		$this->db->where("status",0);
		return $this->db->get("tblNotification")->num_rows();
	}

	public function readNotification($id)
	{
		$this->db->set("status","1-status",false)->where("notificationID",$id)->update("tblNotification");
	}

	public function readAllNotification()
	{
		$this->db->set("status","1-status",false)->where("receiver",$this->session->userID)->where("status",0)->update("tblNotification");
	}
}
?>