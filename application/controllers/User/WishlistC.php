<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WishlistC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/WishlistM","wm");
		$this->load->model("User/CourseM","cm");
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index()
	{
		$wishlistData=$this->wm->fetchWishlist();
		foreach($wishlistData as $key)
		{
			$key->enID = $this->cm->fetchEnroll($key->courseID);
			$rates=$this->cm->fetchRatings($key->courseID);
			if($rates!=null)
			{
				foreach ($rates as $key1 ) {
					$key->rates=$key1->stars*20;
				}
			}
			else
			{
				$key->rates=0;
			}
		}
		$data["wishlistData"]=$wishlistData;
		$this->load->view("User/wishlistView",$data);
	}

	public function removeCourse($courseID)
	{
		$this->cm->removeWishlist($courseID);
		redirect("User/WishlistC");
	}
}