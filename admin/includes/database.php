<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'hello_world';
	
	// $con = mysqli_connect("localhost","root","","hello_world") or die ("Connection was not Established");
	
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	if($mysqli->connect_error){
		printf('faild', $mysqli->connect_error);
		exit();
	}
?>