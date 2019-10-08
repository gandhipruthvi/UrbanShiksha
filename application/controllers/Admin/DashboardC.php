<?php

defined('BASEPATH') OR exit('Ille');

class DashboardC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/DashboardM","dm");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$res = $this->dm->getStudent();
		$res1=$this->dm->getCourse();
		$res2=$this->dm->getAmount();
		$res3=$this->dm->getInstructor();
		$res4=$this->dm->countCourse();
		foreach ($res4 as $key) {
			$key->cdata1=$this->dm->fetchCourse($key->courseID);
		}
		$data = array(
			"studentdata"=>$res,
			"coursedata"=>$res1,
			"amountdata"=>$res2,
			"instructordata"=>$res3,
			"coursedata1"=>$res4
		);
		// echo $this->db->last_query();
		// echo "<pre>";
		// print_r($data);
		// die();
		$this->load->view("Admin/dashboard",$data);
		// $this->load->view("Admin/tempAdd",$temp);
	}

}

?>