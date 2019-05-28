<?php

	$query = "SELECT * FROM posts";
	$result = mysqli_query($con,$query);
	
	$total_posts = mysqli_num_rows($result);
	
	$total_pages = ceil ($total_posts/$per_page);
	
	echo "
		<center>
		<div id= 'pagination'>
		<a href= 'home.php?page=1' class='btn btn-info' role='button' style='width:120px;'>First Pages</a>
	";
	
	for ($i = 1; $i <= $total_pages ; $i++) {
		echo "<a href='home.php?page=$i' class='btn btn-outline-info' role='button' >$i</a>";
	}
		echo "<a href='home.php?page=$total_pages' class='btn btn-info' role='button' style='width:120px;'>Last Page</a></center></div>";
?>