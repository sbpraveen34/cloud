<?php

 class Login extends CI_Model
{
	/**
	 * Enter description here ...
	 * @param unknown_type $data
	 * This model is developed to provide a separate model for login api
	 * this currently has single function doLogin($data)
	 * $data holds the value like email and password(in encrypted format)
	 * this will check the availability of the users and display true if the 
	 * email and password are proper.
	 * 
	 */
	public function doLogin($data)
	{
		$db1=$this->load->database('default', TRUE);	
	if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) // validates email address
	{
		echo $data['email'];
		echo "<br>";
		echo $data['password'];
		echo "<br>";
		//echo "SELECT email,password FROM user WHERE email='".$data['email']."'";
		echo "<br>";
		$dbquery=$this->db->query("SELECT email,password FROM user WHERE email='".$data['email']."'");
		
		//print_r($dbquery->result_array());
		//echo $dbquery->result();
		//echo $dbquery->result();
		$result=$dbquery->result_array();
		
		if(empty($result))
		{
			
			echo 'false';
		header('HTTP/1.1 400 Bad Request Please register');	
			echo "please register";
		}
		else 
		{
			$result=$result[0];
			 trim($result['password']);
			print_r($result);
		//	echo $result->password;
			if(trim($result['password'])==$data['password'])
			{
				echo "true";
			}
			else
			{
				echo 'false';
				header('HTTP/1.1 400 Bad Request Please provide a valid p adderss');	
				echo "please give correct password";
			}
		}
	}
	else 
	{
		echo 'false';
		header('HTTP/1.1 400 Bad Request Please provide a valid email address');	
		echo "please give proper password";
	}
	$this->db->close('default');
	} 
}