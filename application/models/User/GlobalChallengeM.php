<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
  * 
  */
 class GlobalChallengeM extends CI_Model
 {
 	public function __construct()
 	{
 		parent::__construct();
 	}

 	public function getLastData()
 	{
 		$this->db->select("u.userName,u.image,u.email,u.qualification,g.question,g.globalChallengeName");
 		$this->db->from("tblGlobalChallenge g");
 		$this->db->join("tblGlobalChallengeEntries e","g.winnerID = e.globalChallengeEntriesID");
 		$this->db->join("tblUser u","u.userID = e.userID");
 		$this->db->order_by("g.endDate","desc");
 		$this->db->where("winnerID !=",null);
 		return $this->db->get()->result()[0];
 	}

 	public function getGlobalData($gID=null)
 	{
 		if($gID==null)
 		{
 			return $this->db->where("status",0)->get("tblGlobalChallenge")->result()[0];
 		}
 		else
 		{
 			return $this->db->where("status",0)->or_where("globalChallengeID",$gID)->get("tblGlobalChallenge")->result()[0];
 		}
 	}

 	public function acceptChallenge($data)
 	{
 		return $this->db->insert("tblGlobalChallengeEntries",$data);
 	}

 	public function getEntries($globalChallengeID)
 	{
 		$this->db->where("userID",$this->session->userID);
 		$this->db->where("globalChallengeID",$globalChallengeID);
 		return $this->db->get("tblGlobalChallengeEntries")->num_rows();
 	}

 	public function getChallengeParticipant($gID)
 	{
 		$this->db->select("u.userName,u.image");
 		$this->db->from("tblGlobalChallengeEntries e");
 		$this->db->join("tblUser u","u.userID = e.userID");
 		$this->db->where("e.globalChallengeID",$gID);
 		return $this->db->get()->result();
 	}

 	public function challengeAnswer($geID,$data)
 	{
 		return $this->db->where("globalChallengeEntriesID",$geID)->update("tblGlobalChallengeEntries",$data);
 	}

 	public function getChallengeAnswer($globalChallengeID)
 	{
 		$this->db->where("globalChallengeID",$globalChallengeID);
 		$this->db->where("userID",$this->session->userID);
 		return $this->db->get("tblGlobalChallengeEntries")->result()[0];
 	}
 } 
?>