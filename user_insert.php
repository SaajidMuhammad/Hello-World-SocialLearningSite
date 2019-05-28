<?php
include("includes/connection.php");
if(isset($_POST['sign_up'])){
			
			
			$name = mysqli_real_escape_string($con,$_POST['u_name']);
			$l_name = mysqli_real_escape_string($con,$_POST['u_lname']);
			$pass = mysqli_real_escape_string($con,$_POST['u_pass']);
			$email = mysqli_real_escape_string($con,$_POST['u_email']);
			$country = mysqli_real_escape_string($con,$_POST['u_country']);
			$gender = mysqli_real_escape_string($con,$_POST['u_gender']);
			$dob = mysqli_real_escape_string($con,$_POST['u_dob']); 
			$status = "unverified";
			$posts = "NO";
			
			$get_email = "SELECT * FROM users WHERE u_email='$email'";
			$run_email = mysqli_query($con,$get_email);
			$check = mysqli_num_rows($run_email);
			
			if($check==1){
				
				echo "<script>alert('This E-Mail Already Registered. Please Try With Another!')</script>";
				echo "<script>window.open('index.php','_self')</script>";
				exit();
			}
			else
			{
				
				$insert = "INSERT INTO users (u_name, u_lname, u_pass, u_email, u_country, u_gender, u_dob, u_image, register_date, last_login, status, posts) VALUES ('$name', '$l_name', '$pass', '$email', '$country', '$gender', '$dob', 'default.gif', NOW(), NOW(), '$status', '$posts')";
				$run_insert = mysqli_query($con,$insert);
				
				if($run_insert){
					$_SESSION['u_email']=$email;
					echo "<script>window.open('home.php','_self')</script>";
					exit();
				}
			}
			
		}
		
?>