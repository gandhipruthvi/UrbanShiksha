<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class RecoverPassC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/RecoverPassM","rm");
	}

	public function index($userName)
	{
		// Decryption of email
        $encrypt_method = "AES-256-CBC";
    	$key = '6818f23eef19d38dad1d2729991f6368';
    	$iv = '0ac35e3823616c81';
    	$dec=base64_decode(strtr($userName, '._-', '+/='));
    	$dec_user = openssl_decrypt($dec, $encrypt_method, $key, 0, $iv);

		$data = array("userName"=>$dec_user);
		$this->load->view("User/recoverPass",$data);
	}

	public function chngPass($userName)
	{
		$data = array(
			"password" => $this->input->post('npass')
		);

		$this->rm->chngPass($data,$userName);
		$this->load->view("User/login");
	}
}


?>