<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchAnswer($qid)
	{
		$this->db->select("a.answerID,a.answer,q.question,u.userName,u.image,u.qualification,u.email,a.date");
		$this->db->from("tblAnswer a");
		$this->db->join("tblQuestion q","q.questionID = a.questionID");
		$this->db->join("tblUser u","u.userID = a.userID");
		$this->db->where('a.questionID',$qid);
		return $this->db->get()->result();
	}

	public function fetchQuestion()
	{
		$this->db->select("q.questionID,q.question,u.userName,u.image,q.date");
		$this->db->from("tblQuestion q");
		$this->db->join("tblUser u","u.userID = q.userID");
		return $this->db->get()->result();
	}
}

?>