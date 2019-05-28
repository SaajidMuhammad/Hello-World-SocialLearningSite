<?php
	session_start();
	include("includes/database.php");
?>

<?php 
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	
	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choices'];
		$next = $number+1;
		
		// echo $number.'</br>';
		// echo $selected_choice;
		
		$query = "SELECT * FROM `quizzer`";
		$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
		$total = $results->num_rows;
		
		
		$query = "SELECT * FROM `choices` WHERE q_number = $number AND is_correct = 1";
		
		$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
		
		$row = $result->fetch_assoc();
		
		$correct_choice = $row['id'];
		
		if($correct_choice == $selected_choice){
			$_SESSION['score']++;
			
			
		}
		
		if($number == $total){
			header("Location: quiz_final.php");
			exit();
		}else{
			header("Location: questions.php?n=".$next);
			
		}
		
		
	}
?>