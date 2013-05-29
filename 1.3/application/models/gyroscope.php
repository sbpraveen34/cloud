<?php

class Gyroscope extends CI_Model
{
	public function addData($data)
	{
		$db1=$this->load->database('default', TRUE);	
		$this->db->query("INSERT INTO gyroscope(x,y,z) 
		VALUES 
		('".$data['x']."','".$data['y']."','".$data['z']."')");
		
		print_r($data);
	 $this->db->close('default');
	}
} 