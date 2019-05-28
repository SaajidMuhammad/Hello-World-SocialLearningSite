<?php

	$query = "SELECT * FROM posts WHERE topic_id='$topic_id'";
	$result = mysqli_query($con,$query);
	
	$total_posts = mysqli_num_rows($result);
	
	$total_pages = ceil ($total_posts/$per_page);
	
	echo "
		<center>
		<div id= 'pagination'>
		<a href= 'topic.php?page=1'>First Pages</a>
	";
	
	for ($i = 1; $i <= $total_pages ; $i++) {
		echo "<a href='topic.php?page=$i' >$i</a>";
	}
		echo "<a href='topic.php?page=$total_pages' >Last Page</a></center></div>";
?>