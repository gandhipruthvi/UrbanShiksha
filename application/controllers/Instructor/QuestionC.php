<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class QuestionC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Instructor/QuestionM","qm");
		$this->load->model("Instructor/CourseM","cm");
	}

	public function statusChange($Qid)
	{
		$this->qm->statusChange($Qid);
		echo $this->db->last_query();
	}

	public function updateAnswer($ansID,$qID=null)
	{
		$data = array(
			"answer" => $this->input->post("answer")
		);

		$x = $this->qm->updateAnswer($data,$ansID);

		$ansData= $this->cm->fetchAnswer($qID);
		?>
		<div class="form-control" style="border:#4f5962;border-width:1px;border-style: solid;width: 800px;margin-left: 70px;background-color: #F5F5F5;">
			<p><b><i>
				<?php
				if($ansData==null)
				{
					echo "Answer is pending";
				}
				else
				{
					echo "Old answer";
				}
				?>
			</i></b></p>
			<?php
			foreach ($ansData as $key0) 
			{
				?>
				<div class="row" style="border:#4f5962;border-width:1px;width: 500px;">
					<div class="col-md-6">
						<p style="margin:5px 5px 5px 5px;font-size: 20px;"><b><i><?=$key0->answer?></i></b> </p>
						<textarea class="form-control" id="txtAns<?=$key0->answerID?>" name="txtAnswer" style="display: none;visibility: hidden;"></textarea>
					</div>
					<div class="col-md-4">
						<input type="button" class="form-control btn-primary" id="btnAnsChange<?=$key0->answerID?>" name="btnAns" value="Change Answer" style="margin:5px 5px 5px 5px;" onclick="showChangeAnswer(<?=$key0->answerID?>)">
						<input type="button" class="form-control" id="btnAnsSubmit<?=$key0->answerID?>" name="btnAns0" value="Submit" style="display: none;visibility: hidden;margin:5px 5px 5px 5px;" onclick="ansSubmit(<?= $qID?>,<?=$key0->answerID?>)">
					</div>
					<div class="col-md-2"> 
						<center style="margin:5px;"><button class="btn btn-danger btn-round waves-effect waves-light" onclick="delAnswer(<?= $qID?>,<?=$key0->answerID?>)"><i class="fa fa-trash"></i></button></center>
					</div>
				</div>
			</div>
			<pre></pre>
			<?php
		}		
	}

	public function deleteAnswer($answerID,$qID=null)
	{
		$data = array(
			"answerID" => $answerID
		);

		$x = $this->qm->deleteAnswer($data);

		$ansData= $this->cm->fetchAnswer($qID);
		?>
		<div class="form-control" style="border:#4f5962;border-width:1px;border-style: solid;width: 800px;margin-left: 70px;background-color: #F5F5F5;">
			<p><b><i>
				<?php
				if($ansData==null)
				{
					echo "Answer is pending";
				}
				else
				{
					echo "Old answer";
				}
				?>
			</i></b></p>
			<?php
			foreach ($ansData as $key0) 
			{
				?>
				<div class="row" style="border:#4f5962;border-width:1px;width: 500px;">
					<div class="col-md-6">
						<p style="margin:5px 5px 5px 5px;font-size: 20px;"><b><i><?=$key0->answer?></i></b> </p>
						<textarea class="form-control" id="txtAns<?=$key0->answerID?>" name="txtAnswer" style="display: none;visibility: hidden;"></textarea>
					</div>
					<div class="col-md-4">
						<input type="button" class="form-control btn-primary" id="btnAnsChange<?=$key0->answerID?>" name="btnAns" value="Change Answer" style="margin:5px 5px 5px 5px;" onclick="showChangeAnswer(<?=$key0->answerID?>)">
						<input type="button" class="form-control" id="btnAnsSubmit<?=$key0->answerID?>" name="btnAns0" value="Submit" style="display: none;visibility: hidden;margin:5px 5px 5px 5px;" onclick="ansSubmit(<?= $qID?>,<?=$key0->answerID?>)">
					</div>
					<div class="col-md-2"> 
						<center style="margin:5px;"><button class="btn btn-danger btn-round waves-effect waves-light" onclick="delAnswer(<?= $qID?>,<?=$key0->answerID?>)"><i class="fa fa-trash"></i></button></center>
					</div>
				</div>
			</div>
			<pre></pre>
			<?php
		}
	}

	public function index($qID)
	{
		$data = array(
			"questionID" => $qID,
			"answer" => $this->input->post("qAnswer"),
			"userID" => $this->session->userID
		);

		$x=$this->qm->setAnswer($data);

		$ansData= $this->cm->fetchAnswer($qID);
		?>
		<div class="form-control" style="border:#4f5962;border-width:1px;border-style: solid;width: 800px;margin-left: 70px;background-color: #F5F5F5;">
			<p><b><i>
				<?php
				if($ansData==null)
				{
					echo "Answer is pending";
				}
				else
				{
					echo "Old answer";
				}
				?>
			</i></b></p>
			<?php
			foreach ($ansData as $key0) 
			{
				?>
				<div class="row" style="border:#4f5962;border-width:1px;width: 500px;">
					<div class="col-md-6">
						<p style="margin:5px 5px 5px 5px;font-size: 20px;"><b><i><?=$key0->answer?></i></b> </p>
						<textarea class="form-control" id="txtAns<?=$key0->answerID?>" name="txtAnswer" style="display: none;visibility: hidden;"></textarea>
					</div>
					<div class="col-md-4">
						<input type="button" class="form-control btn-primary" id="btnAnsChange<?=$key0->answerID?>" name="btnAns" value="Change Answer" style="margin:5px 5px 5px 5px;" onclick="showChangeAnswer(<?=$key0->answerID?>)">
						<input type="button" class="form-control" id="btnAnsSubmit<?=$key0->answerID?>" name="btnAns0" value="Submit" style="display: none;visibility: hidden;margin:5px 5px 5px 5px;" onclick="ansSubmit(<?= $qID?>,<?=$key0->answerID?>)">
					</div>
					<div class="col-md-2"> 
						<center style="margin:5px;"><button class="btn btn-danger btn-round waves-effect waves-light" onclick="delAnswer(<?= $qID?>,<?=$key0->answerID?>)"><i class="fa fa-trash"></i></button></center>
					</div>
				</div>
			</div>
			<pre></pre>
			<?php
		}
	}
}
?>