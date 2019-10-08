<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class AccountSettingC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/AccountSettingM","as");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index()
	{
		$x = $this->as->fetchUser();
		$y = $this->as->fetchCity();
		$data = array(
			"userData" => $x,
			"cityData" => $y
		);
		$this->load->view('User/accountSetting',$data);
	}

	public function editData()
	{
		$data = array(
			"email" => $this->input->post("txtemail"),
			"contactNumber" => $this->input->post("txtnum"),
			"dateOfBirth" => $this->input->post("date"),
			"gender" => $this->input->post("gender"),
			"qualification" => $this->input->post("txtquali"),
			"cityID" => $this->input->post("dropCity")
		);
		$this->as->editData($data);
		$this->index();
	}

	public function chkPass($str)
	{
		$data = array(
			"userID" => $this->session->userID,
			"password" => $str
		);

		$x = $this->as->fetchPass($data);

		if($x)
		{
			echo "Old password is correct";
		}
		else
		{
			echo "Old password is not correct";
		}
	}

	public function chngPass($npass)
	{
		$data = array(
			"password" => $npass
		);

		$this->as->chngPass($data);
	}

	public function changePicture()
	{
		if(isset($_FILES['newImage']['name'])) //empty($_FILES['image']['name'])
		{
			$config['upload_path'] = "./upload/";
			$config['allowed_types'] = "jpg|jpeg|png";
			$config['overwrite'] = true;
			$config['file_name'] = $this->session->userName;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('newImage'))
			{
				$img = $this->upload->data();
				$tmpnm = $img['file_name'];
				$data = array("image"=>$tmpnm);
				$flag = $this->as->changePicture($data);
				if($flag)
				{
					$this->session->set_userdata("picture",$tmpnm);
					$this->index();
				}
				else
				{				
					$this->index();
				}
			}
			else
			{
				$error = array('error'=>$this->upload->display_errors());
				echo $this->upload->display_errors();
				die();
				$this->load->view('User/accountSetting',$error);
			}	
		}
	}
}

?>