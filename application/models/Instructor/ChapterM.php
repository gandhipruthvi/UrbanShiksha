<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ChapterM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function addChapter($data)
	{
		$this->db->insert("tblChapter",$data);
	}

	public function addTopics($data)
	{
		$this->db->insert("tblTopic",$data);
	}

	public function fetchTopic($chpID)
	{
		$this->db->select("t.*");
		$this->db->from("tblTopic t");
		$this->db->where("t.chapterID",$chpID);
		return $this->db->get()->result();
	}

	public function updateVideo($tpID,$temp)
	{
		$this->db->where("topicID",$tpID)->update("tblTopic",$temp);
	}
	
	public function fetchTopicData($topicID)
	{
		return $this->db->where("topicID",$topicID)->get("tblTopic")->result()[0];
	}

	public function updateTopic($topicID,$data)
	{
		$this->db->set($data)->where("topicID",$topicID)->update("tblTopic");	
	}

	public function getMaxChapterNumber($courseID)
	{
		$this->db->select("max(number)");
		$this->db->from("tblChapter");
		$this->db->where("courseID",$courseID);
		return $this->db->get()->result()[0];
	}	

	public function moveChapter($chapterNo,$courseID)
	{
		$this->db->limit(500,$chapterNo-1);
		$this->db->from("tblChapter");
		$this->db->where("courseID",$courseID);
		$this->db->order_by("number");
		$x=$this->db->get()->result();

		foreach ($x as $key) {
			$this->db->set("number","number+1",false)->where("chapterID",$key->chapterID)->update("tblChapter");
		}
	}

	public function fetchChapterData($chapterID)
	{
		return $this->db->where("chapterID",$chapterID)->get("tblChapter")->result()[0];
	}

	public function fetchCourseNumber($courseID)
	{
		return $this->db->select("number")->where("courseID",$courseID)->order_by("number")->get("tblChapter")->result();
	}

	public function editChapterAbove($preNumber,$newNumber,$courseID)
	{
		$diff=$preNumber-$newNumber;
		$this->db->limit($diff,$newNumber-1);
		$this->db->from("tblChapter");
		$this->db->where("courseID",$courseID);
		$this->db->order_by("number");
		$x=$this->db->get()->result();

		foreach ($x as $key) {
			$this->db->set("number","number+1",false)->where("chapterID",$key->chapterID)->update("tblChapter");
		}
	}

	public function editChapterBelow($preNumber,$newNumber,$courseID)
	{
		$diff=$newNumber-$preNumber;
		$this->db->limit($diff,$preNumber);
		$this->db->from("tblChapter");
		$this->db->where("courseID",$courseID);
		$this->db->order_by("number");
		$x=$this->db->get()->result();

		foreach ($x as $key) {
			$this->db->set("number","number-1",false)->where("chapterID",$key->chapterID)->update("tblChapter");
		}
	}

	public function editChapter($chapterID,$data)
	{
		$this->db->set($data)->where("chapterID",$chapterID)->update("tblChapter");
	}
}
?>