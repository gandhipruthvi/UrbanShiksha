<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChallengeM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchChallenge()
	{
		$this->db->select("c.*,u.userName");
		$this->db->from("tblChallenge c");
		$this->db->join("tblUser u","u.userID = c.creatorID");
		return $this->db->get()->result();
	}

	public function fetchChallengeAnswer($cid)
	{
		$this->db->select("c.*,u.*");
		$this->db->from("tblChallengeAnswer c");
		$this->db->join("tblUser u","c.userID = u.userID");
		$this->db->where("c.challengeID",$cid);
		return $this->db->get()->result();
	}

	public function statusChange($id)
	{
		$this->db->set("status","1-status",false)->where("challengeID",$id)->update("tblChallenge");
	}
}


?>