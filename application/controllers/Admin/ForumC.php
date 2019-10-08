<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ForumC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	    $this->load->model("Admin/ForumM","fm");
	}

	public function index()
	{
		$forumData = $this->fm->getForum();
		foreach ($forumData as $key) 
		{
			$key->user = $this->fm->getUser($key->forumID);
			$key->totalLike = $this->fm->getLikes($key->forumID);
		}

		$data = array(
			"forumData" => $forumData
		);
		// echo "<pre>";
		// print_r($data);
		// die();

		$this->load->view("Admin/forums",$data);
	}

	public function statusChange($id)
	{
		$this->fm->statusChange($id);
	}
}
?>