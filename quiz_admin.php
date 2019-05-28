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
			<h2> Add a Quiz</h2>
			<?php
				if(isset($msg)){
					echo '<p>'.$msg.'</p>';
				}
			?>
			
			<form method="post" action="quiz_admin.php">
				<p>
					Question Number : 
					<input type="number" name="quiz_number" value="<?php echo $next; ?>">
				</p>
				<p>
					Question Text : 
					<input type="text" name="quiz_text">
				</p>
				<p>
					Choice #1 : 
					<input type="text" name="choice1">
				</p>
				<p>
					Choice #2 : 
					<input type="text" name="choice2">
				</p>
				<p>
					Choice #3 : 
					<input type="text" name="choice3">
				</p>
				<p>
					Choice #4 : 
					<input type="text" name="choice4">
				</p>
				<p>
					Choice #5 : 
					<input type="text" name="choice5">
				</p>
				<p>
					Correct Choice Number : 
					<input type="number" name="correct_choice">
				</p>
				<p>
					<input type="submit" name="submit" value="Submit">
				</p>
				
			</form>
			
			<?php
				if(isset($_POST['submit'])){
					$q_number = $_POST['quiz_number'];
					$q_text = $_POST['quiz_text'];
					
					$choices = array();
					$choices[1] = $_POST['choice1'];
					$choices[2] = $_POST['choice2'];
					$choices[3] = $_POST['choice3'];
					$choices[4] = $_POST['choice4'];
					$choices[5] = $_POST['choice5'];
					
					$query = "INSERT INTO `quizzer`(q_number, text) VALUES('$q_number','$q_text')";
					
					$insert_row = $mysqli->query($query) or die ($mysqli->error.__LINE__);
					
					if($insert_row){
						foreach($choices as $choice => $value){
							if($value != ''){
								if($correct_choice == $choice){
									$is_correct = 1;
								} else {
									$is_correct = 0;
								
							}
							$query = "INSERT INTO `choices`(q_number,is_correct,text) VALUES ('$q_number','$is_correct','$value')";
							$insert_row = $mysqli->query($query) or die ($mysqli->error.__LINE__);
							
							if($insert_row){
								continue;
							}else{
								die ('Error : ('.$mysqli->errno . ') '.$mysqli->error);
							}
							}
						}
						$msg = "Question Added";
					
					}
				}
				
				$query = "SELCET * FROM `quizzer` ";
				$quizzer = $mysqli->query($query) or die ($mysqli->error.__LINE__);
				$total = $quizzer->num_rows;
				$next = $total+1;

			?>
			
			
					
				
		<!-- Container Ends-->
			
			
	</body>
	
</html>

<?php } ?>