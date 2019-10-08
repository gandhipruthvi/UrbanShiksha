<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class QuestionM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function setAnswer($data)
	{
		return $this->db->insert("tblAnswer",$data);
	}

	public function deleteAnswer($data)
	{
		return $this->db->delete("tblAnswer",$data);
	}

	public function updateAnswer($value,$ansID)
	{
		return $this->db->where("answerID",$ansID)->update("tblAnswer",$value);
	}

	public function statusChange($Qid)
	{
		$this->db->set("status","1-status",false)->where("questionID",$Qid)->update("tblQuestion");
	}
}
?>