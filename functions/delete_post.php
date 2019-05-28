<?php

$con = mysqli_connect("localhost","root","","hello_world") or die ("Connection was not Established");

if(isset($_GET['post_id'])){
	
	$post_id = $_GET['post_id'];
	
	$delete_post = "DELETE FROM posts WHERE post_id= '$post_id'";
	$run_delete = mysqli_query ($con,$delete_post);
	
	if($run_delete){
		
		echo "<script>window.open('../home.php','_self')</script>";
		
	}
	
}





?>