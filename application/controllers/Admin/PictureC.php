<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PictureC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/PictureM","pm");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{		
		$this->load->view("Admin/manageProfile");
	}	

	public function changePicture()
	{
		if(isset($_FILES['newImage']['name'])) //empty($_FILES['image']['name'])
		{
			$config['upload_path'] = "./upload/";
			$config['allowed_types'] = "jpg|jpeg|png";
			$config['overwrite'] = true;
			$config['file_name'] = $this->session->adminName;
			$this->load->library('upload',$config);
			//$config['file_name'] = $this->session->userdata("username");
			// $this->load->helper(array('form','url'));
			// echo $this->session->userdata("username");
			// echo $this->session->pictur;
			// die();
			if($this->upload->do_upload('newImage'))
			{
				// $this->load->library('upload',$config);
				// echo $img['file_name'];
				// echo $this->session->userdata("username");
				// echo $this->session->userdata("pictur");
				// die();

				$img = $this->upload->data();
				$tmpnm = $img['file_name'];
				$uid = $this->session->adminID;
				// print_r($img);
				// echo $tmpnm;
				// echo $unm;
				// die();
				$data = array("image"=>$tmpnm);
				$flag = $this->pm->changePicture($data,$uid);
				// print_r($flag);
				// echo $this->db->last_query();
				// print_r($data);
				//die();
				if($flag)
				{
					$res = array("result"=>"Updated");
					$this->session->set_userdata("pictur",$tmpnm);
					// echo $this->db->last_query();
					// die();
					$this->load->view("Admin/manageProfile",$res);
				}
				else
				{
					$res = array("result"=>"Not Updated");
					$this->load->view("Admin/manageProfile",$res);
				}
			}
			else
			{
				$error = array('error'=>$this->upload->display_errors());
				echo $this->upload->display_errors();
				die();
				// echo $this->session->userdata("username");
				// echo $this->session->userdata("pictur");
				$this->load->view('Admin/manageProfile',$error);
			}	
		}
	}


	// public function changePicture()
	// {
	// 	$config['upload_path'] = "./upload/";
	// 	$config['allowed_types'] = "jpg|jpeg|png";
	// 	//$config['overwrite'] = true;
	// 	//$config['file_name'] = $this->session->userdata("username");
	// 	$this->load->library('upload',$config);

	// 	if($this->upload->do_upload("newImage"))
	// 	{
	// 		$img = $this->upload->data();
	// 	}
	// 	echo $this->session->userdata("username");
	// 	echo $this->session->userdata("pictur");
	// 	// die();

	// 	$tmpnm = $img['file_name'];
	// 	$unm = $this->session->userdata("username");

	// 	$data = array("image"=>$tmpnm);
	// 	$flag = $this->pm->changePicture($data,$unm);

	// 	// $this->pm->changePicture($data,$unm);

	// 	if($flag)
	// 	{
	// 		$res = array("result"=>"Updated");
	// 		$this->session->set_userdata("pictur",$tmpnm);
	// 		$this->load->view("Admin/manageProfile",$res);
	// 	}
	// 	else
	// 	{
	// 		$res = array("result"=>"Not Updated");
	// 		$this->load->view("Admin/manageProfile",$res);
	// 	}
	// }	
}

?>