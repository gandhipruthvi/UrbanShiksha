<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/QuestionM","qm");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$y = $this->qm->fetchQuestion();
		foreach ($y as $key)
		{
			$key->answer=$this->qm->fetchAnswer($key->questionID);
		}
		// $x = $this->qm->fetchAnswer();
		$data = array(
			"ans" => $y
		);
		$this->load->view("Admin/questionView",$data);
		// $this->load->view("Admin/temp");
	}
}

?>