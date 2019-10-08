<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ForumM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getForum()
	{
		return $this->db->get("tblForum")->result();
	}

	public function getLikes($forumID)
	{
		$this->db->select("COUNT(fpl.forumPostLikeID) as flike");
		$this->db->from("tblforumpostlike fpl");
		$this->db->join("tblforumpost fp","fp.forumpostID=fpl.forumpostID");
		$this->db->where("fp.forumID",$forumID);
		return $this->db->get()->result()[0];
	}

	public function getUser($forumID)
	{
		$this->db->select("u.userName");
		$this->db->from("tblForum f");
		$this->db->join("tblUser u","u.userID = f.creatorID");
		$this->db->where("f.forumID",$forumID);
		return $this->db->get()->result()[0];
	}

	public function statusChange($id)
	{
		$this->db->set("status","1-status",false)->where("forumID",$id)->update("tblForum");
	}
}
?>