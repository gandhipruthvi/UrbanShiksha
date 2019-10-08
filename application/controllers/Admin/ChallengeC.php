<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChallengeC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	    $this->load->model("Admin/ChallengeM","clm");
	}

	public function index()
	{
		$x = $this->clm->fetchChallenge();

		//$y = $this->clm->fetchChallengeAnswer();

		foreach ($x as $key)
		{
			$key->answer = $this->clm->fetchChallengeAnswer($key->challengeID);
		}

		$data = array(
			"challengeData" => $x
			// "answerData" => $y
		);
		$this->load->view("Admin/viewChallenge",$data);
		// $this->load->view("Admin/viewChallenge");
	}

	public function statusChange($id)
	{
		$this->clm->statusChange($id);
	}
}
?>