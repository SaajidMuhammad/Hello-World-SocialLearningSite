<table class="table-hover table-dark table-bordered  table-striped" align="center" width="320px;" border="2">
		<tr>
			<th >No</th>
			<th>Topic</th>
			
		
			
			
		</tr>


<?php
			include("includes/connection.php");
			$sel_topic = "SELECT * FROM topic ORDER BY 1 ASC";
			$run_topic = mysqli_query($con,$sel_topic);
			$i=0;
			
			while($row_topics = mysqli_fetch_array($run_topic)){
				
				$topic_id = $row_topics['topic_id'];
				$topic_name = $row_topics['topic_title'];
			$i++;
			
			
			
			
			
?>

		<tr>
			<td> <?php echo "00$i" ; ?> </td>
			<td> <?php echo $topic_name; ?> </td>
	
		</tr>
			<?php } ?>

</table>