<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class GlobalChallengeC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/GlobalChallengeM","gm");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$this->load->view("Admin/addGlobalChallenge");
	}

	public function addGlobalChallenge()
	{
		$data = array(
			"globalChallengeName" => $this->input->post("globalChallengeName"),
			"question" => $this->input->post("txtQuestion"),
			"adminID" => $this->session->adminID,
			"description" => $this->input->post("description"),
			"image" => "",
			"startDate" => $this->input->post("startDate"),
			"endDate" => $this->input->post("endDate")
		);

		if($this->input->post('img')!=null || $this->input->post('img')!="")
		{
			$img=$this->input->post('img');
			$image_array_1=explode(";",$img);
			$image_array_2=explode(",",$image_array_1[1]);
			$img1=base64_decode($image_array_2[1]);
			$imagename=$this->input->post('globalChallengeName').".jpg";
			file_put_contents("upload/challenge/".$imagename,$img1);
			$data['image']=$imagename;
		}
		// echo "<pre>";
		// print_r($data);
		// die();
		$this->gm->addGlobalChallenge($data);
		redirect("Admin/GlobalChallengeC/displayGlobalChallenge");
	}

	public function displayGlobalChallenge()
	{
		$globalChallenge = $this->gm->fetchGlobalChallenge();

		$data = array(
			"globalChallenge" => $globalChallenge
		);

		$this->load->view("Admin/viewGlobalChallenge",$data);
	}

	public function statusChange($gID)
	{
		$this->gm->statusChange($gID);
	}

	public function getGlobalEntries($gID)
	{
		$globalChallenge = $this->gm->fetchGlobalChallenge($gID);
		$x = $this->gm->fetchGlobalChallengeEntries($gID);

		$data = array(
			"globalChallenge" => $globalChallenge,
			"fetchEntries" => $x,
			"gID" => $gID
		);

		$this->load->view("Admin/viewGlobalChallengeEntries",$data);
	}

	public function setWinner($winnerID,$gID)
	{
		$data = array(
			"winnerID" => $winnerID
		);

		$this->gm->setWinner($data,$gID);
		redirect('Admin/GlobalChallengeC/displayGlobalChallenge');
	}
}
?>