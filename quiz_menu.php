<?php
	session_start();
	// include("includes/connection.php");
	include("includes/database.php");
	include("functions/functions.php");

	if(!isset($_SESSION['u_email'])){

		echo "<script>window.open('index.php','_self')</script>";
	}
	else {
?>
<?php 
	$query = "SELECT * FROM `quizzer` ";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $result->num_rows;
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
						
							<h1 style="margin-top:20px; margin-bottom:50px;">Test Your Programming Knowldge</h1>
							
							<ul class="list-group" style="margin-right:280px;">
							<li class="list-group-item"><strong>Number of Questions : </strong> <?php echo $total; ?> </li>
							<li class="list-group-item"><strong>Type : </strong>Multiple Choices</li>
							<li class="list-group-item"><strong>Estimated Time : </strong> <?php echo $total*0.5; ?> Miniutes </li>
							</ul>
					
							<center><a href="questions.php?n=1" class="btn btn-primary" style="margin-right:300px; margin-top: 40px; width:250px;">Start Quiz </a></center>
							
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