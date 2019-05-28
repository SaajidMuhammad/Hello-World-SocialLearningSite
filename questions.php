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
	$number = (int) $_GET['n'];
	
	$query = "SELECT * FROM `quizzer`";
	$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
	$total = $results->num_rows;
	
	
	$query = "SELECT * FROM `quizzer` WHERE q_number = $number ORDER BY RAND() LIMIT 10"  ;
	
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	$question = $result->fetch_assoc();
	
	
	
	
	$query = "SELECT * FROM `choices` WHERE q_number = $number ORDER BY RAND() LIMIT 4";
	
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
	
	// $choices = $result->fetch_assoc();
	
	
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
						
							<h1 style="margin:20px 0 20px 0;">Test Your Programming Knowldge</h1>
							
							<div class="list-group-item active" style="height:55px; font-weight:bold; margin-right:300px; padding-top:px; margin-bottom:0px; background-color:black;">
							<div id="current">Question <?php echo $question['q_number']; ?> of <?php echo $total;?></div></br>
							</div>
							
								<p id="questions" class="list-group-item active" style="margin-right:300px;">
									<?php echo $question['text']; ?>
								</p>
								<form method="post" action="quiz_process.php">
									<ul id="choices" style="margin-right:300px;" >
									
										<?php while($row = $choices->fetch_assoc()): ?>
											<li class="list-group-item list-group-item-action"><input name="choices" type="radio" value="<?php echo $row['id']; ?>" /> <?php echo $row['text']; ?> </li>
										<?php endwhile; ?>
									
								
										<input type="submit" value="Submit" class="btn btn-outline-primary" style="margin-top:2px; width:150px; border-radius:0px; float:right;">
										<input type="hidden" name="number" value="<?php echo $number; ?>" >
									</ul>
								</form>
							
							
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