<?php
interface DBManager {
	public function addData($data,$database);
	public function updateData($oldData,$newData,$database);
	public function getData($parameter,$database);
	public function getcategorizedData($parameter,$database);
	public function removeData($parameter);
	public function addUser($data,$database);
	public function login($data,$database);
	public function createUser($data,$database);
	public function addcategorizedMessage($data,$database);
	
}