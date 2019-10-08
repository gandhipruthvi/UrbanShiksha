<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUsC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("User/contactUs");
	}

	public function sendFeedBack()
	{
		$data = array(
			"Name" => $this->input->post("name"),
			"Email" => $this->input->post("email"),
			"Subject" => $this->input->post("subject"),
			"Message" => $this->input->post("message")
		);

	    $config = array(
		    "protocol" => 'smtp',
			"smtp_host" => 'ssl://smtp.googlemail.com',
			"smtp_port" => 465,
			"smtp_user" => 'urbanshiksha2019@gmail.com',
			"smtp_pass" => 'urbanshiksha@2019'
	    );
		$this->load->library('email',$config);

		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$si="<html>";
		$si.="<body>";
		$si.="Visiters Details";
		$si.="<br>";
		$si.= "User Details : ";
		$si.= "<table>";
		$si.= "<tr>";
		$si.= "<td>Name=>".$data['Name']."</td>";
		$si.= "</tr>";
		$si.= "<tr>";
		$si.= "<td>Email=>".$data['Email']."</td>";
		$si.= "</tr>";
		$si.= "<tr>";
		$si.= "<td>Subject=>".$data['Subject']."</td>";
		$si.= "</tr>";
		$si.= "<tr>";
		$si.= "<td>Message=>".$data['Message']."</td>";
		$si.= "</tr>";
		$si.= "</table>";
		$si.="</body>";
		$si.="</html>";

	    //Load email library
	    $this->email->from('urbanshiksha2019@gmail.com', 'ContactUs');
	    $this->email->to('urbanshiksha2019@gmail.com');
	    $this->email->subject('Send Email Codeigniter');
	    $this->email->message($si);
	    // Send mail
	    if($this->email->send())
	    {
	    	redirect("User/ContactUsC");
	    }
	    else
	    {
	    	show_error($this->email->print_debugger());
	    }

	}
}

?>