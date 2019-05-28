<?php 
	
	session_start();
	
	session_destroy();
	
	header("location:tutor_login.php");

?>