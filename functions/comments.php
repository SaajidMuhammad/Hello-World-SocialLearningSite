<?php			
			
			
			$get_id = $_GET['post_id'];
				
			$get_com = "SELECT * FROM comments WHERE post_id='$get_id' ORDER by 1 DESC";
			
			$run_com = mysqli_query($con,$get_com);
			
			while($row=mysqli_fetch_array($run_com)){
				
				$com = $row ['comment'];
				$com_name = $row ['comment_author'];
				$date = $row ['date'];
				
				echo "
				<div id='comments'>
				<p3>$com_name</p3> <span><kbd> $date </kbd></span>
				<p>$com</p>
				
				</div>
				
				";
				
			}
			
?>