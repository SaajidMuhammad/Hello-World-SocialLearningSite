<?php
	session_start();
	include("includes/connection.php");
	include("functions/functions.php");

	if(!isset($_SESSION['u_email'])){

		echo "<script>window.open('index.php','_self')</script>";
	}
	else {
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Hello World</title>
		<link rel="stylesheet" href="styles/home_style.css" media="all"/>
		<link rel="stylesheet" href="styles/bootstrap.min.css" media="all"/>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/fontawesome.min.js"></script>
		
	</head>

	<body class="bg-light">

		<!-- Container Starts-->
			<div class="">
				<?php include("templates/menu_bar.php"); ?>


				<div class = "content">
					<div id = "user_timeline">
						<div>
							<?php include("templates/user_bar.php"); ?>
						</div>
					</div>
					<div >
						<?php include("templates/side_bar.php"); ?>
					</div>
					<div id="content_timeline">
						
						<h4 style="margin-top:20px;"> Info About This User </h4>
						
							<?php if(isset($_GET['u_id'])){
				
				global $con;
				$user_id = $_GET['u_id'];
				
				$select = "SELECT * FROM users WHERE u_id = '$user_id'"; 
				$run = mysqli_query ($con,$select);
				$row = mysqli_fetch_array ($run);
				
				$id = $row['u_id'];
				$image = $row['u_image'];
				$name = $row['u_name'];
				$lname = $row['u_lname'];
				$country = $row['u_country'];
				$gender = $row['u_gender'];
				$reg_date = $row['register_date'];
				
				if ($gender == 'Male'){
					$msg = "Send Him a Message";
				}
				else{
					$msg = "Send Her a Message";
				}
				
				echo " <div id='user_profile'>
							
							
							<img src='user/user_images/$image' width='140' hight='140' />
							
							<p><strong>Name : </strong>$name $lname</p>
							<p><strong>Gender : </strong>$gender</p>
							<p><strong>Country : </strong>$country</p>
							<p><strong>Member Since : </strong>$reg_date</p>
							&nbsp;&nbsp;&nbsp;&nbsp;<a href='messages.php?u_id=$id'><button class='btn btn-light'>$msg</button></a>
							
							</div>
							
					";
					
			} ?> </br></br></br>
							
						<h4> All Posts by <span style="font-weight:bold;"> <?php echo $name;  ?> <?php echo $lname;  ?> </span></h4>
						
							<?php  othersPosts(); ?> 
						
					</div>
					
				</div>
				
				
			</div>
			
		<!-- Container Ends-->


	</body>
</html>

<?php } ?>