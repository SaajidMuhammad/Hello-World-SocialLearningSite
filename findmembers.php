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
						<p3 style="margin-top:20px;"> Results for your Search </p3> 
						</br></br></div>
						
						<?php 
						findMembers();
							
						?>
						
					</div>
				</div>
			</div>
		<!-- Container Ends-->
			
	
	</body>
</html>  

<?php } ?>