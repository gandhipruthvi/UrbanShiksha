<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class NotificationC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/NotificationM","nc");
	}

	public function getNotification()
	{
		$noti = $this->nc->getNotification();
		$count = $this->nc->cntNotification();

		$data = array(
			"notification" => $noti,
			"count" => $count
		);

		echo json_encode($data);
	}

	public function readNotification($id)
	{
		$this->nc->readNotification($id);
		echo $this->db->last_query();
	}

	public function readAllNotification()
	{
		$this->nc->readAllNotification();
		echo $this->db->last_query();
	}
}
?>