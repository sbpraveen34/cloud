<?php
class Registration extends CI_Model{
/**
 * Enter description here ...
 * @param unknown_type $data
 * this model is created for registering a new user in the database
 * this model takes up $data variable which holds the email address of the user
 * this model then checks the email address validity and if the email id is 
 */
public function register($data)
{
	//echo $data;
	//print_r($data);
	$db1=$this->load->database('default', TRUE);	
	if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) 
	{
		$dbquery=$db1->query("select email from user where email = '".$data['email']."'");
		//echo $dbquery;
		$EmailArrayFromDb = $dbquery->result_array();
		print_r($EmailArrayFromDb);
   		if(empty($EmailArrayFromDb))
   		{
   			$data['password']=$this->generatePassword();
   			$dbquery=$db1->query("insert into user(email,password) value('".$data['email']."','".$data['password']."')");
   			$this->sendPassword($data);
   		}
  		else
   		{
   			echo "already present user";
   			header('HTTP/1.1 400 Bad Request Please provide password');	
   				
   		}
	}
	else 
	{
		echo 'false';
		header('HTTP/1.1 400 Bad Request Please provide a valid email adderss');	
	}
	 $this->db->close('default');
}
public function generatePassword()
{

	$password=file("listofpassword.txt");
	while(true)
	{
		$value=rand(0, count($password)-1);
		if(strlen($password[$value]) > 6)
		{
			break;
			}
}
return $password[$value];
}
public function resendPassword($data)
{
	
}
public function sendPassword($data)
{
	if(empty($data))
	{
		echo "Sorry some error occurred";
	}
	else 
	{
		$this->load->library('email');
	    $this->email->initialize(array(
       'protocol' => 'smtp',
       'smtp_host' => 'smtp.sendgrid.net',
       'smtp_user' => 'syncNscan',
       'smtp_pass' => 'pass@word2',
       'smtp_port' => 587,
       'mailtype'=>'html',
       'crlf' => "\r\n",
       'newline' => "\r\n"
        ));
    	$from="sbpraveen34@gmail.com";
		$sender="hello";
		$subject="Password Confirmation";
		$body="Password for your account is ".$data['password'];
    	$this->email->from($from, $sender);
    	$this->email->to($data['email']);
    	//$this->email->cc('another@another-example.com');
    	//$this->email->bcc('them@their-example.com');
    	$this->email->subject($subject);
    	$this->email->message($body);
    	$sent = $this->email->send();
    	//echo $this->email->print_debugger();
    	echo $sent;
	}
}
}

