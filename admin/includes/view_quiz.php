<table class="table-hover table-dark table-bordered  table-striped" align="center" width="1032px;" border="2">
		<tr>
			<th style="width:0px;">No</th>
			<th style="width:500px;">Topic</th>
			<th  style="width:0px;">Action</th>
		</tr>

<?php
			include("includes/connection.php");
			$sel_quiz = "SELECT * FROM quizzer ORDER BY 1 ASC";
			$run_quiz = mysqli_query($con,$sel_quiz);
			$i=0;
			
			while($row_quizs = mysqli_fetch_array($run_quiz)){
				
				$quiz_id = $row_quizs['q_number'];
				$quiz_name = $row_quizs['text'];
				$i++;
		?>
		

		<tr>
			<td style='text-align:center;'> <?php echo $quiz_id; ?> </td>
			<td> <?php echo $quiz_name; ?> </td>
			<td style='text-align:center;'> <button class='btn btn-outline-light' style='font-weight:bold;'>Edit Quiz</button> </td>
	
		</tr>
			<?php } ?>

</table>