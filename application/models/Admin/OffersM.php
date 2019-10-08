<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OffersM extends CI_Model
{
	public function fetchOffers()
	{
		return $this->db->get("tblOffer")->result();
	}

	public function statusChange($id)
	{
		$this->db->set("status","1-status",false)->where("offerID",$id)->update("tblOffer");
	}	

	public function startOffer($id,$data)
	{
		$this->db->set($data)->where("offerID",$id)->update("tblOffer");
	}

	public function getOffer($id)
	{
		$x=$this->db->where("offerID",$id)->get("tblOffer")->result()[0];
		$res="<div class='form-group row'>";
		$res.="<label class='col-sm-4 col-form-label'>Offer Name</label>";
		$res.="<div class='col-sm-8'>";
		$res.="<input class='form-control' type='text' id='txtOfferName' name='txtOfferName' value=".$x->offerName.">";
		$res.="</div></div>";

		$res.="<div class='form-group row'>";
		$res.="<label class='col-sm-4 col-form-label'>Offer Code</label>";
		$res.="<div class='col-sm-8'>";
		$res.="<input class='form-control' type='text' id='txtOfferCode' name='txtOfferCode' value=".$x->offerCode.">";
		$res.="</div></div>";

		$res.="<div class='form-group row'>";
		$res.="<label class='col-sm-4 col-form-label'>Start From</label>";
		$res.="<div class='col-sm-8'>";
		$res.="<input class='form-control datetime' type='date' id='txtStartFrom' name='txtStartFrom' value=".$x->startFrom.">";
		$res.="</div></div>";

		$res.="<div class='form-group row'>";
		$res.="<label class='col-sm-4 col-form-label'>End To</label>";
		$res.="<div class='col-sm-8'>";
		$res.="<input class='form-control datetime' type='date' id='txtEndTo' name='txtEndTo' value=".$x->endTo.">";
		$res.="</div></div>";
		return $res;
	}

	public function editOffer($id,$data)
	{
		$this->db->set($data);
		$this->db->where("offerID",$id);
		$this->db->update("tblOffer");
	}

	public function addOffer($data)
	{
		$this->db->insert("tblOffer",$data);
	}
}

?>