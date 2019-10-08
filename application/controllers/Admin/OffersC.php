<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OffersC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Admin/OffersM","om");
		if(!$this->session->adminID)
		{
			redirect("Admin/LoginC");
		}
	}

	public function index()
	{
		$res=$this->om->fetchOffers();
		$data["offersData"]=$res;
		$this->load->view("Admin/offersView",$data);
	}

	public function statusChange($id)
	{
		$this->om->statusChange($id);
	}

	public function startOffer($id)
	{
		$now = date('Y-m-d H:i:s');
		$data=array(
			"status"=>0,
			"startFrom"=>$now
		);
		$this->om->startOffer($id,$data);
		redirect("Admin/OffersC");
	}

	public function editOffer($id)
	{	
		$data=array(
			"offerName"=>$this->input->post("txtOfferName"),
			"offerCode"=>$this->input->post("txtOfferCode"),
			"startFrom"=>$this->input->post("txtStartFrom"),
			"endTo"=>$this->input->post("txtEndTo")
		);
		$this->om->editOffer($id,$data);
		redirect("Admin/OffersC");
	}

	public function getOffer($id)
	{
		$res=$this->om->getOffer($id);
		echo $res;
	}

	public function addOffer()
	{
		$data=array(
			"offerName"=>$this->input->post("txtOfferName"),
			"offerCode"=>$this->input->post("txtOfferCode"),
			"startFrom"=>$this->input->post("txtStartFrom"),
			"endTo"=>$this->input->post("txtEndTo"),
			"description"=>$this->input->post("txtDesc")
		);
		$this->om->addOffer($data);
		redirect("Admin/OffersC");	
	}
}
?>