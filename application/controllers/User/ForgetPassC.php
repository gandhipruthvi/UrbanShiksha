<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class ForgetPassC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User/ForgetPassM","fm");
	}

	public function index()
	{
		$data = array(
			"userName" => $this->input->post('textuser'),
			"contactNumber" => $this->input->post('textcno'),
			"email" => $this->input->post('textmail')
		);

		$x=$this->fm->fetchDetails($data);

		if($x)
		{
			echo "True";
		}
		else
		{
			echo "False";
		}
	}

	public function sendMail()
	{
		$mail = $this->input->post('textmail');
        $config = array(
		    "protocol" => 'smtp',
			"smtp_host" => 'ssl://smtp.googlemail.com',
			"smtp_port" => 465,
			"smtp_user" => 'urbanshiksha2019@gmail.com',
			"smtp_pass" => 'urbanshiksha@2019'
        );
        // print_r($config);
        // die();

        // Encryption of email
        $encrypt_method = "AES-256-CBC";
    	$key = '6818f23eef19d38dad1d2729991f6368';
    	$iv = '0ac35e3823616c81';
    	$enc_user = openssl_encrypt($this->input->post('textuser'), $encrypt_method, $key, 0, $iv);
    	$enc=strtr(base64_encode($enc_user), '+/=', '._-');

		$this->load->library('email',$config);

		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$msg = anchor("User/RecoverPassC/index/".$enc,"Click here");
        //Load email library
        $this->email->from('infopapmedia@gmail.com', 'Identification');
        $this->email->to($mail);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message($msg);
        if($this->email->send())
        {
        	echo "Correct";
        }
        else
        {
        	show_error($this->email->print_debugger());
        }
	}
}

?>