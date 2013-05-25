<?php
class History extends CI_Model 
{
	public function addrawMessage($data,$email)
	{
		$db1=$this->load->database('default', TRUE);	
		$this->db->query("INSERT INTO rawmessage(email,messageid,messagebody,fromname,fromphoneno,timereceived,mcc,mnc,lac,cid,lat,lon,top) 
		VALUES 
		('".$email."','".$data['messageid']."','".$data['messagebody']."','".$data['fromname']."','".$data['fromphoneno']."','".$data['timereceived']."','".$data['mcc']."','".$data['mnc']."','".$data['lac']."','".$data['cid']."','".$data['lat']."','".$data['lon']."','".$data['top']."')");
		
		print_r($data);
		
	}
	
}