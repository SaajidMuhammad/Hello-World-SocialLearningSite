	<?php
		include("includes/connection.php");
	
			if(isset($_GET['delete'])){
				
				
				
				$delete = "DELETE FROM users WHERE u_id = '$user_id'";
				$run_delete = mysqli_query($con,$delete);
				
				
				
				echo "<script>alert('User has been Deleted')</script>";
				echo "<script>window.open('index.php?view_users','_self')</script>";
				
			}
		
		
		
		
		
		
		
		?>
