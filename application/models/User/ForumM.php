<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class ForumM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchForum()
	{
		return $this->db->where("status",0)->get("tblForum")->result();
	}

	public function fetchForumCount($forumID)
	{
		return $this->db->where("forumID",$forumID)->get("tblForumPost")->num_rows();
	}

	public function fetchUser($creatorID)
	{
		return $this->db->where("userID",$creatorID)->get("tblUser")->result();
	}

	public function fetchSinglePost($forumID)
	{
		return $this->db->where("forumID",$forumID)->where("status",0)->get("tblForumPost")->result();
	}

	public function addForum($data)
	{
		return $this->db->insert("tblForumPost",$data);
	}
	public function addForumPost($data)
	{
		$this->db->insert("tblForum",$data);
	}
	public function searchForum($searchF)
	{
		$this->db->select("u.userName,u.image,f.*");
		$this->db->from("tblForum f");
		$this->db->join("tblUser as u","f.creatorID=u.userID");
		$this->db->like("f.forumTopic",$searchF);
		$this->db->or_like("u.userName",$searchF);
		return $this->db->get()->result();
	}

	public function searchPost($searchPost,$forumID)
	{
		$this->db->select("u.userName,u.image,f.*");
		$this->db->from("tblForumPost as f");
		$this->db->like("u.userName",$searchPost);
		$this->db->or_like("f.forumPost",$searchPost);
		$this->db->join("tblUser as u","f.userID=u.userID");
		$this->db->join("tblForum as fo","fo.forumID=f.forumID");
		$this->db->where("f.forumID",$forumID);
		return $this->db->get()->result();
	}

	public function fetchPostLikes($forumPostID)
	{
			$x=$this->db->where("forumPostID",$forumPostID)->get("tblForumPostLike");
			return $x->num_rows();
	}

	public function fetchLikedPost($userID)
	{
		$this->db->select("forumPostID");
		$this->db->from("tblforumpostlike");
		$this->db->where("userID",$userID);
		return $this->db->get()->result();
	}	

	public function addForumPostLike($data)
	{
		if($this->db->where("forumPostID",$data["forumPostID"])->where("userID",$data["userID"])->get("tblForumPostLike")->num_rows())
		{
			$this->db->where("forumPostID",$data["forumPostID"])->where("userID",$data["userID"])->delete("tblForumPostLike");
			return 1;
		}
		else
		{			
			$this->db->insert("tblForumPostLike",$data);	
			return 0;		
		}
	}

	public function countPostLike($forumPostID)
	{
		return $this->db->where("forumPostID",$forumPostID)->get("tblForumPostLike")->num_rows();
	}

	public function fetchForumTopic($forumID)
	{
		return $this->db->select("forumTopic")->where("forumID",$forumID)->get("tblForum")->result()[0];
	}
}

?>