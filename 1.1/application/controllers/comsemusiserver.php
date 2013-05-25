<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comsemusiserver extends CI_Controller {
public function index()
{
	
}
public function userlogin()
{
	if(isset($_POST['data']) && isset($_POST['format']) && isset($_POST['data_type']))
	{
		if($this->input->post('format')=="json" && $this->input->post('data_type')=="sms")
		{
			$jsonArray=json_decode($_POST['data'],true);
			//print_r($jsonArray);
			$this->load->model("login");
			$this->login->doLogin($jsonArray);
		}
		else 
		{
			echo "enter all valid parameters";
		}
	}
	else 
	{
		
		echo 'false';
		header('HTTP/1.1 400 Bad Request Please provide a valid parameters');
	}
}
public function userregistration()
{
	print_r($_POST);
	if(isset($_POST['data']) && isset($_POST['format']) && isset($_POST['data_type']))
	{
		if($this->input->post('format')=="json" && $this->input->post('data_type')=="sms")
		{
			//print_r($_POST['data']);
			$jsonArray=json_decode($_POST['data'],true);
			//print_r($jsonArray);
			$this->load->model("registration");
			$this->registration->register($jsonArray);
		}
		else
		{
			echo 'false';
		header('HTTP/1.1 400 Bad Request Please provide a valid values ');
		}
	}
	else
	{
		echo 'false';
		header('HTTP/1.1 400 Bad Request Please provide a valid parameters');
	}
	
}
public function addMessage()
{
	if(isset($_POST['data']) && isset($_POST['format']) && isset($_POST['data_type']) && isset($_POST['noofdata']))
	{
		if($this->input->post('format')=="json" && $this->input->post('data_type')=="sms")
		{
			//echo $_POST['data'];
			$Data=json_decode($_POST['data'],true);
			//$data=$_POST['data'];
			
			$TotalData=(int)$_POST['noofdata'];
			//echo $Data;
			for ($i=0;$i<$TotalData;$i++)
			{
				$this->load->model("sms");
				$this->sms->addrawMessage($Data[$i],$_POST['email']);
				print_r($Data[$i]);
				
			}
		}
		else 
		{
			echo 'false';
		header('HTTP/1.1 400 Bad Request Please provide a valid parameters');
		}
	}
	else
	{
		echo 'false';
		header('HTTP/1.1 400 Bad Request Please provide values for all the Parameters');
	}
}
}