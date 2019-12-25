<?php 
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'pff';
	$db = @new mysqli($host,$user,$password,$db_name);

	if($db->connect_errno){
		die('Error : '.$db->connect_error);
	}
?>