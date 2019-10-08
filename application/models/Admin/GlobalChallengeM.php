<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class GlobalChallengeM extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function addGlobalChallenge($value)
	{
		return $this->db->insert("tblGlobalChallenge",$value);
	}

	public function fetchGlobalChallenge($gID=null)
	{
		$this->db->select("g.*,a.adminName");
		$this->db->from("tblGlobalChallenge g");
		$this->db->join("tblAdmin a","a.adminID = g.adminID");
		if($gID!=null)
		{
			$this->db->where("g.globalChallengeID",$gID);
			return $this->db->get()->result()[0];			
		}
		else
		{
			return $this->db->get()->result();			
		}
	}

	public function fetchGlobalChallengeEntries($gID)
	{
		$this->db->select("ge.*,u.userName,u.image");
		$this->db->from("tblGlobalChallengeEntries ge");
		$this->db->join("tblUser u","u.userID = ge.userID");
		$this->db->where("ge.globalChallengeID",$gID);
		return $this->db->get()->result();
	}

	public function statusChange($gID)
	{
		return $this->db->set("status","1-status",false)->where("globalChallengeID",$gID)->update("tblGlobalChallenge");
	}	

	public function setWinner($value,$gID)
	{
		return $this->db->where("globalChallengeID",$gID)->update("tblGlobalChallenge",$value);
	}
}
?>