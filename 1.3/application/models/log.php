<?php
/**
 * This function is used
 * 
 */
class Log extends CI_Model 
{
	/**
 	* This function is used
 	* 
 	*/
	public function addrawLog($data,$email)
	{
		$db1=$this->load->database('default', TRUE);	
		$this->db->query("INSERT INTO rawlog(email,name,number,time,type,top,mcc,mnc,lac,cid,lat,lon) 
		VALUES 
		('".$email."','".$data['name']."','".$data['number']."','".$data['time']."','".$data['type']."','".$data['top']."','".$data['mcc']."','".$data['mnc']."','".$data['lac']."','".$data['cid']."','".$data['lat']."','".$data['lon']."')");
		
		print_r($data);
	 $this->db->close('default');

		
	}
	public function addContact($data,$email)
	{
		$db1=$this->load->database('default', TRUE);
		$this->db->query("INSERT INTO contact(email,name,Number) 
		VALUES 
		('".$email."','".$data['name']."','".$data['Number']."')");
		
		print_r($data);
		$this->db->close('default');
			
	}
	public function addGyroscope($data)
	{
		$db1=$this->load->database('default', TRUE);
		$this->db->query("INSERT INTO contact(email,name,Number) 
		VALUES 
		('".$email."','".$data['name']."','".$data['Number']."')");
		
		print_r($data);
		$this->db->close('default');
	}
	
}