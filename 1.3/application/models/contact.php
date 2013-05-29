<?php
class Contact extends CI_Model 
{
	public function addContactDetail($data,$email)
	{
		$db1=$this->load->database('default', TRUE);	
		$this->db->query("INSERT INTO contact(email,name,Number) 
		VALUES 
		('".$email."','".$data['name']."','".$data['Number']."')");
		
		print_r($data);
	 $this->db->close('default');
	}
}