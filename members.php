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
				<div id="head_wrap" class="bg-warning">
					<link rel="icon" href="images/minilogo.jpg"/>
					<div id="header" class="bg-warning">
					<a href="home.php">
					
					</a>
						<ul id="menu" >
						
							<li><a href="home.php" title="Home"  class="btn btn-warning btn-sm" role="button"  style="font-weight:bold; font-size:18px; color:black;"><i class="fas fa-home"></i></a></li>
							<li><a href="members.php" title="Memebers"  class="btn btn-warning btn-sm" role="button" style="margin-right:10px;font-weight:bold; font-size:18px;color:black;"><i class="fas fa-users"></i></a></li>
							
							
							<?php

								$get_topics = "SELECT * FROM topic";
								$run_topics = mysqli_query($con,$get_topics);

								while($row=mysqli_fetch_array($run_topics)){

									$topic_id=$row['topic_id'];
									$topic_title=$row['topic_title'];

								echo "<li><a href='topic.php?topic=$topic_id' class='btn btn-warning btn-sm' role='button'  style='font-weight:bold; width:150px;color:black;'>$topic_title</a></li>";

								}


							?>
						</ul>

						<form method="get" action="findmembers.php" id="form1">
							<div class="input-group mb-3" style="padding-top:5px;">
							<input type="text" name="find_members" placeholder="Find Members...." class="form-control" style="width:; margin-left:18px" maxlength="24" required="required"/>
							<div class="input-group-append"><button name="search" class="btn btn-dark"> <i class="fas fa-search"></i> </button></div></div>
							<!-- <input type="submit" name="search" value="Search"/> -->
						</form>
					</div>
				</div>
				
				<div class = "content">
					<div id = "user_timeline"> 
						<div>
							<?php include("templates/user_bar.php"); ?>
						</div>
					</div>
					<div>
					
					<?php include("templates/side_bar.php"); ?>
				
					</div>
					<div id="members_timeline">
						
						<div id="mem_search" style="width:680px; margin-bottom:10px;border-radius:5px; box-shadow:3px 3px 3px gray">
						<p3 style="margin-top:20px;"> Peoples Who Are Here </p3> 
						</br></br></div>
						
						<?php 
							global $con;
			
			$per_page=10;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
						
							$get_members = "SELECT * FROM users  ORDER BY u_id DESC LIMIT $start_from, $per_page";
							$run_members = mysqli_query($con,$get_members);
							while($row = mysqli_fetch_array($run_members)){
							
							$user_id = $row['u_id'] ;
							$user_name = $row['u_name'] ;
							$user_lname = $row['u_lname'] ;
							$user_country = $row['u_country'];
							$register_date = $row['register_date'];
							$user_image = $row['u_image'] ;
							
							
							echo 
							" 
							
							<div id='members_list'>
							
							
							
							<a href ='user_profile.php?u_id=$user_id'> 
							
							<img src='user/user_images/$user_image''/> 
							 <span> $user_name $user_lname</a></br> 
							Country : $user_country </br>
							Member Since: $register_date </span>
							
							
							
							</div>
							";
							
							}
							
						?>
						
					</div>
				</div>
			</div>
		<!-- Container Ends-->
			
	
	</body>
</html>  

<?php } ?>