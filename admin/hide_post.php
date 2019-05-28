	<?php
		include("includes/connection.php");
	
			if(isset($_POST['hide'])){
				
				$get_id = $_GET['post_id'];
							
				$get_post = "SELECT * FROM posts WHERE post_id ='$get_id'";
				$run_post = mysqli_query($con,$get_post);
				$row=mysqli_fetch_array($run_post);
				
				$visibility = $row['is_hidden'];
				
				$update_post = "UPDATE posts SET is_hidden='1' WHERE post_id = '$get_id' LIMIT 1";
				$run_update = mysqli_query($con,$update_post);
				
				
				echo "<script>alert('Post has been Hide')</script>";
				echo "<script>window.open('index.php?view_posts','_self')</script>";
				
			}
		
		
		
		
		
		
		
		?>

	