<?php
/**
 * This function is used
 * 
 */
class History extends CI_Model 
{
	/**
 * This function is used
 * 
 */
	public function addrawHistory($data,$email)
	{
		$db1=$this->load->database('default', TRUE);	
		$this->db->query("INSERT INTO rawhistory(email,startDate,endDate,url,title) 
		VALUES 
		('".$email."','".$data['startDate']."','".$data['endDate']."','".$data['url']."','".$data['title']."')");
		
		print_r($data);
		
	}
	
}