<?php
	session_start();
	include("includes/connection.php");
	include("functions/functions.php");

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
		<script type="text/javascript" src="js/script.js"></script>
		
	</head>

	<body class="bg-light">

		<!-- Container Starts-->
			<div class="">
				<?php include("templates/menu_bar.php"); ?>


				<div class = "content">
					<div id = "user_timeline">
						<div>
							<?php include("templates/user_bar.php"); ?>
						</div>
					</div>
					<div >
						<?php include("templates/side_bar.php"); ?>
					</div>
					<div id="content_timeline">
						
						<h2> Your All Posts </h2>
						
						<?php	
			
			global $con;
			
			$per_page=8;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
			
			if(isset($_GET['u_id'])){
				$u_id = $_GET['u_id'];
			}
			
			
			$get_posts = "SELECT * FROM posts WHERE user_id='$u_id' ORDER by 1 DESC LIMIT $start_from, $per_page";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			while ($row_posts=mysqli_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$post_title = $row_posts['post_title'];
				$content = $row_posts['post_content'];
				$post_date = $row_posts['post_date'];
				
				$user = "SELECT * FROM users WHERE u_id='$user_id' AND posts='yes'";
				
				$run_user = mysqli_query($con,$user);
				$row_user = mysqli_fetch_array($run_user);
				$user_name = $row_user['u_name'];
				$user_lname = $row_user['u_lname'];
				$user_image = $row_user['u_image'];
				
				echo "<div id='my_posts'>
				
				
				<div id='post_head'>
				<a href='user_profile.php?u_id=$user_id'>
				<img src='user/user_images/$user_image' width='50' hight='40'></a>
				<a href='user_profile.php?u_id=$user_id'>
				<p3>$user_name $user_lname</p3></a></br>
				<p2>$post_title</p2> </br>
				<p1><kbd>$post_date</kbd></p1></div><hr/>
				<p>$content</p>
				</div>

				
				
				<div id='my_postsbtn'>
				<a href='single.php?post_id=$post_id'><button style='margin-right:50px;'>View</button></a>
				<a href='edit_post.php?post_id=$post_id'><button>Edit</button></a>
				<button type='button' data-target='#confirm_modal' data-toggle='modal'>Delete</button>
				
				
				
				</div>"
				
				
				
				
				;
				
				include ("functions/delete_post.php");
			}	
			
		 ?>

					</div>
				</div>
				
				
			
			<div class="modal" id="confirm_modal">
			<div class="modal-dialog">
				<div class="modal-content" ng-app="myApp" ng-controller="FormController">
					<div class="modal-header">
						
						  <strong>Confirm Delete</strong>
						
					</div>
					<div class="modal-body">
					 Are you Sure You want delete this Post? </br></br></br>
						<a href="<?php echo "functions/delete_post.php?post_id=$post_id" ?>"> <button style="float:right; margin-left:10px; width:120px;" class="btn btn-danger">Delete</button></a>
						<button style="float:right; width:120px;" class="btn btn-light" data-dismiss="modal">Cancel</button> 
						

					</div>
					
					
					
					
				</div>
			</div>
			
			
			</div>
		</div>
		<!-- Container Ends-->

		
	</body>
</html>

<?php } ?>