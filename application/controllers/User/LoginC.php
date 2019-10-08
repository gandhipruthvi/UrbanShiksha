<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/LoginM','ml');
		if($this->session->userID)
		{
			redirect("User/HomeC");
		}
	}

	public function index($email=null,$userStatus=null)
	{
		$x = $this->ml->fetchCity();
		$data = array(
			"cityData" => $x,
		);
		if(isset($email))
		{
			$data["email"]=$email;
			$data["userStatus"]=$userStatus;
			if($userStatus==0)
				$data["error"]="*Invalid Email or Password";
			else if($userStatus==1)
				$data["msg"]="Your account is suspended by the admin";
			else if($userStatus==-1)
				$data["msg"]="Please verifiy your email first";
		}
		$this->load->view("User/login",$data);
	}

	public function log()
	{
		$data = array(
			'email' => $this->input->post('txtuser'),
			'password' => $this->input->post('txtpass')
		);

		$x = $this->ml->fetchUser($data);
		if($x==false)
		{
			$this->index($data['email'],0);
		}
		elseif($x->status==-1 || $x->status==1)
		{
			$this->index($data['email'],$x->status);
		}
		else
		{
			$this->session->userID = $x->userID;
			$this->session->userName=$x->userName;
			$this->session->picture=$x->image;

			$temp = array(
				"userID" => $this->session->userID
			);

			$this->ml->addLog($temp);
			redirect("User/HomeC");	
		}
	}

	public function addUser()
	{
		$data = array(
			'userName' => $this->input->post('txtuser'),
			'dateOfBirth' => $this->input->post('date'),
			'contactNumber' => $this->input->post('txtnum'),
			'email' => $this->input->post('txtemail'),
			'password' => $this->input->post('txtpass'),
			'gender' => $this->input->post('gender'),
			'qualification' => $this->input->post('txtquali'),
			'cityID' => $this->input->post('dropCity'),
			'image' => "",
		);

		$img=$this->input->post('img');
		$image_array_1=explode(";",$img);
		$image_array_2=explode(",",$image_array_1[1]);
		$img1=base64_decode($image_array_2[1]);
		$imagename=$this->input->post('txtuser').".jpg";
		file_put_contents("upload/".$imagename,$img1);

		$data['image']=$imagename;

		$this->ml->addUser($data);

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

		$userID=$this->db->insert_id();
		$si="<html>";
		$si.="<body>";
		$si.="Your email verfication link";
		$si.="<br>";
		$si.= anchor("User/VerificationC/index/".$userID,"Click here");
		$si.="</body>";
		$si.="</html>";
		
	    //Load email library
	    $this->email->from('urbanshiksha2019@gmail.com', 'Identification');
	    $this->email->to($this->input->post('txtemail'));
	    $this->email->subject('Send Email Codeigniter');
	    $this->email->message($si);
	    // Send mail
	    if($this->email->send())
	    {
	    	$this->load->view("User/registrationSuccessful.php");
	    }
	    else
	    {
	    	show_error($this->email->print_debugger());
	    }
	}
}

?>