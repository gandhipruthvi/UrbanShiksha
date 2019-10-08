<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/AdminM","am");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$x = $this->am->getAdmin();
		$temp = array("adminD"=>$x);
		$this->load->view("Admin/allAdmin",$temp);
		// $this->load->view("Admin/tempAdd",$temp);
	}

	public function addData()
	{
		$this->load->view("Admin/addAdmin");
	}

	public function addAdmin()
	{
		$data = array(
			'adminName' => $this->input->post('txtanm'),
			'email' => $this->input->post('txtemail'),
			'password' => $this->input->post('txtpass'),
			'userName' => $this->input->post('txtusnm'),
			'image' => "",
			'contactNo' => $this->input->post('txtcno'),
		);

		$img=$this->input->post('img');
		$image_array_1=explode(";",$img);
		$image_array_2=explode(",",$image_array_1[1]);
		$img1=base64_decode($image_array_2[1]);
		$imagename=$this->input->post('txtusnm').".jpg";
		file_put_contents("upload/".$imagename,$img1);

		$data['image']=$imagename;

		// $config['upload_path'] = "./upload/";
		// $config['allowed_types'] = "jpg";
		// $config['file_name'] = $this->input->post('txtanm');
		// $this->load->library('upload',$config);

		// if(!$this->upload->do_upload('image'))
		// {
		// 	$error = array('error'=>$this->upload->display_errors());
		// 	$this->load->view('Admin/addAdmin',$error);
		// }
		// else
		// {
		// 	$t=$this->upload->data();
		// 	$data['image']=$t['file_name'];
		// }
		$this->am->addAdmin($data);
		$this->load->view('Admin/addAdmin',$data);
		redirect('Admin/AdminC/');			
	}

	public function updData($id)
	{
		$x = $this->am->updData($id);
		$data = array(
			"adminInfo" => $x
		);
		$this->load->view("Admin/addAdmin",$data);
	}

	public function updAdmin($id)
	{
		$data = array(
			'adminName' => $this->input->post('txtanm'),
			'email' => $this->input->post('txtemail'),
			'userName' => $this->input->post('txtusnm'),
			'contactNo' => $this->input->post('txtcno'),
		);
		$this->am->updAdmin($data,$id);				
		redirect('Admin/AdminC/');
	}

	public function searchAdmin($value='')
	{
		if($this->input->post('txtSearch'))
			$name = $this->input->post('txtSearch');
		else
			$name = null;

		$x = $this->am->searchAdmin($name);
		$data = array(
			"adminD" => $x
		);
		$this->load->view("Admin/allAdmin",$data);
	}

	public function dash()
	{
		$this->load->view("Admin/dashboard");
	}
}

?>