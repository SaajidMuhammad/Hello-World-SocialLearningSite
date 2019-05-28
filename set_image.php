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
					<div>
						<?php include("templates/side_bar.php"); ?>
					</div>
					<div id="image_timeline" align=>
						
						
						<?php
							$user = $_SESSION['u_email'];
							$get_user = "SELECT * FROM users WHERE u_email= '$user'";
							$run_user = mysqli_query($con,$get_user);
							$row = mysqli_fetch_array($run_user);

							$user_id = $row['u_id'] ;
							$user_name = $row['u_name'] ;
							$user_lname = $row['u_lname'] ;
							$user_pass = $row['u_pass'] ;
							$user_email = $row['u_email'] ;
							$user_country = $row['u_country'] ;
							$user_gender = $row['u_gender'] ;
							$user_image = $row['u_image'] ;
							$register_date = $row['register_date'] ;
							$last_login = $row['last_login'] ;

							
							
							echo
							"
							
							
							<img src='user/user_images/$user_image' width='50' hight='50' /> 
							 "  ?>
							 
							 <form align="right" action="" method="post"  id="" style= "" enctype="multipart/form-data">
							<div>
							<div class="row" >
						
							
							<input type="file" name="u_image" required="required"  class="form-control"/> 
							
								 <button name="update" class="btn btn-dark">  Change </button>  
							</div></div>
							</form>
					
				
				
				<?php 
					if(isset($_POST['update'])){
						
						$u_image = $_FILES['u_image']['name'];
						$img_tmp = $_FILES['u_image']['tmp_name'];
						
						move_uploaded_file($img_tmp,"user/user_images/$u_image");
						
						$update = "UPDATE users SET u_image='$u_image' WHERE u_id='$user_id' ";
						$run = mysqli_query($con,$update);
						
						if($run){
							
							echo "<script>window.open('home.php','_self')</script>";
						}
					}
				
				
				?>
						

					</div>
				</div>
			</div>
		<!-- Container Ends-->


	</body>
</html>

<?php } ?>