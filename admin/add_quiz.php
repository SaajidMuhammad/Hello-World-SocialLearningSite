<div id="add_quiz">
<h2> Add More Quiz</h2>
			<?php 
				include("includes/connection.php");
				include("includes/database.php");
			?>
			
			<?php
				$select_query = "SELECT * FROM `quizzer`";
				$quizzer = mysqli_query($con,$select_query);
				$total = mysqli_num_rows($quizzer);
				$next = $total+1;
				
				
			?>
			
			
			<form method="post" action="add_quiz.php">
				<p>
					Question Number : 
					<input type="text" name="quiz_number" value="<?php 
						if($total==10){
							echo "Maximum number of Questions Added";
						}
						else
						{
						echo $next;
						} 
					?>" class="form-control" required>
				</p>
				<p>
					Question Text : 
					<input type="text" name="quiz_text" class="form-control" required>
				</p>
				<p>
					Choice 1 : 
					<input type="text" name="choice1" class="form-control" required>
				</p>
				<p>
					Choice 2 : 
					<input type="text" name="choice2" class="form-control" required>
				</p>
				<p>
					Choice 3 : 
					<input type="text" name="choice3" class="form-control" required>
				</p>
				<p>
					Choice 4 : 
					<input type="text" name="choice4" class="form-control" required>
				</p>
				<p>
					Correct Choice Number : 
					<input type="number" name="correct_choice" class="form-control" required>
				</p>
				<p>
					<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="width:400px; float:right; margin:20px 0 50px 0;">
				</p>
				
			</form>
			
				<?php
				if(isset($_POST['submit'])){
					$q_number = $_POST['quiz_number'];
					$q_text = $_POST['quiz_text'];
					$correct_choice = $_POST['correct_choice'];
					
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
							
							// if($insert_row){
								// continue;
							// }else{
								// die ('Error : ('.$mysqli->errno . ') '.$mysqli->error);
							// }
							// 
							}
						}
						
						header("Location:index.php?add_quiz");
					}
				}
				
				// $query = "SELECT * FROM 'quizzer'";
				// $quizzer = $mysqli->query($query) or die ($mysqli->error.__LINE__);
				// $total = $quizzer->num_rows;
				// $next = $total+1;
				
			
				
				
			?>
			
			
</div>