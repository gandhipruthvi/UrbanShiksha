<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class ChapterC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Instructor/ChapterM","chpm");
		$this->load->model("Instructor/CourseM","cm");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function addChapter($courseID)
	{
		$radio=$this->input->post('r1');
		?>
		<script type="text/javascript">
			alert("<?= $radio?>");
		</script>
		<?php
		if($radio=="addNew")
			$name = $this->input->post('txtchapter');
		else
			$chpID = $this->input->post('listchapter');

		$data = array(
			'courseID'=>$courseID,
			'chapterName'=>$name
		);

		if($radio=="addNew")
		{
			$this->chpm->addChapter($data);
			$chpID=$this->db->insert_id();
			$this->cm->incrementChapter($courseID);
		}

		$data1=array(
			'chapterID'=>$chpID,
			'topicName'=>$this->input->post('txttopic'),
			'description'=>$this->input->post('txtdescription'),
			'videoURL'=>''
		);

		$data1['videoURL']=$imagename;
		$this->chpm->addTopics($data1);
		$tpID = $this->db->insert_id();
		$tpChID = $chpID.$tpID.".mp4";
		$temp = array(
			'videoURL' => $tpChID
		);
		$this->chpm->updateVideo($tpID,$temp);
		$img=$this->input->post('img');
		$image_array_1=explode(";",$img);
		$image_array_2=explode(",",$image_array_1[1]);
		$img1=base64_decode($image_array_2[1]);
		$imagename=$tpChID;
		file_put_contents("upload/video/".$imagename,$img1);
		redirect('Instructor/CourseC/courseDetails/'.$courseID);	
	}

	public function topicEditModal($topicID)
	{
		$topicData=$this->chpm->fetchTopicData($topicID);
		echo json_encode($topicData);
	}

	public function editTopic($courseID,$topicID,$chapterID)
	{
		$data=array(
			"topicName"=>$this->input->post("txtTopicName"),
			"description"=>$this->input->post("txtDescription"),
		);
		if($this->input->post("editVideo")!="default")
		{
			$tpID = $topicID;
			$tpChID = $chapterID.$tpID.".mp4";
			$data = array(
				'videoURL' => $tpChID
			);
			$img=$this->input->post('editVideo');
			$image_array_1=explode(";",$img);
			$image_array_2=explode(",",$image_array_1[1]);
			$img1=base64_decode($image_array_2[1]);
			$imagename=$tpChID;
			file_put_contents("upload/video/".$imagename,$img1);
		}
		$this->chpm->updateTopic($topicID,$data);
		redirect('Instructor/CourseC/courseDetails/'.$courseID);
	}
}
?>