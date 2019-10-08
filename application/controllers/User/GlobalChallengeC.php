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
		$this->load->model("User/GlobalChallengeM","gm");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index()
	{
		$globalChallenge = $this->gm->getLastData();
		$globalChallengeData = $this->gm->getGlobalData();
		$globalChallengeEntry = $this->gm->getEntries($globalChallengeData->globalChallengeID);
		$data = array(
			"globalChallenge" => $globalChallenge,
			"globalChallengeData" => $globalChallengeData,
			"globalChallengeEntry" => $globalChallengeEntry
		);
		/*echo "<pre>";
		print_r($data);
		die();*/
		$this->load->view("User/challenge",$data);
	}

	public function acceptChallenge($gID)
	{
		$data = array(
			"globalChallengeID" => $gID,
			"userID" => $this->session->userID
		);
		$this->gm->acceptChallenge($data);
		$y = $this->db->insert_id();
		$y=urlencode(base64_encode($y));
		$gID=urlencode(base64_encode($gID));
		redirect("User/GlobalChallengeC/challengeAccepted/$y/$gID");
	}

	public function challengeAccepted($y,$gID)
	{
		$x = $this->gm->getGlobalData($gID);
		$temp = array(
			"globalData" => $x,
			"entryID" => $y
		);
		$this->load->view("User/globalAnswer",$temp);
	}

	public function getChallengeParticipant($gID)
	{
		$x = $this->gm->getChallengeParticipant($gID);
		echo json_encode($x);
	}

	public function challengeAnswer($geID)
	{
		$data = array(
			"answer" => addslashes($this->input->post("txtAnswer"))
		);
		$this->gm->challengeAnswer($geID,$data);
		redirect("User/GlobalChallengeC/");
	}

	public function challengeAlreadyAccepted($gID)
	{
		$globalData = $this->gm->getGlobalData($gID);
		$globalChallengeData=$this->gm->getChallengeAnswer($gID);
		$data=array(
			"globalData" => $globalData,
			"globalChallengeData"=>$globalChallengeData,
			"entryID"=>$globalChallengeData->globalChallengeEntriesID
		);
		/*echo "<pre>";
		print_r($data);
		die();*/
		$this->load->view("User/globalAnswer",$data);
	}
}
?>