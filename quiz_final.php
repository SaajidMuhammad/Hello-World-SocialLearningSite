<?php
	session_start();
	// include("includes/connection.php");
	include("functions/functions.php");
	include("includes/database.php");

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
						
					</div>
					<div id="quiz_timeline" >
						<div id="quiz_head">
						
							<h2>You're Done</h2>
							
							<p>Congratez! You have completed the test</p>
							<p>Your Final Score: <?php echo $_SESSION['score']; ?></p>
							<a href="questions.php?n=1" class="btn btn-primary">Take Again</a>
							
							
						</div>
					</div>
			
			</div>
			
			
			</div>
			
			
			</div>
			<div id="footer">
			<div class="col-md-12 text-center">
				<p>&copy; TheHelloWorld.com</p>
			</div>
			</div>
					
				
		<!-- Container Ends-->
			
			
	</body>
	
</html>

<?php } ?>