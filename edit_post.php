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
					<div>
						<?php include("templates/side_bar.php"); ?>
					</div>
					<div id="content_timeline">
					<?php
						if(isset($_GET['post_id'])){
							
							$get_id = $_GET['post_id'];
							
							$get_post = "SELECT * FROM posts WHERE post_id ='$get_id'";
							$run_post = mysqli_query($con,$get_post);
							$row=mysqli_fetch_array($run_post);
							
							$post_title = $row['post_title'];
							$post_con = $row['post_content'];
							
							
							}
					?>
						<form action="" method="post" id="f" >
						<h2 style="margin-top:10px;font-size:22px;"> Edit Your Post here</h2>
						<div class="row" style="margin-left:1px;">
						<input type="type" name="title" value="<?php echo $post_title; ?>" required="required" maxlength="40" class="form-control" style="width:480px;"/>
						
						<select name="topic" class="form-control" style="width:158px; margin-left:3px;" required="required">
							<option>Select Topic</option>
							<?php getTopics(); ?>
						</select></br></div>

						<!--  <input type="type" name="Description" placeholder="Write a Discription" size="66"/></br> -->
						
						<textarea  name= "content" placeholder="" class="form-control" style="width:640px; margin-top:5px; resize:none; height:116px;"><?php echo $post_con; ?></textarea>

						<button name="update" class="btn btn-dark" style=" width:140px; font-weight:bold; margin-top:5px;">  Update Post </button>
						<!--  <input type="submit" name="sub" value="Post to Timeline"/>  -->
						
						</form>
						
						<?php
							if(isset($_POST['update'])){
								
								$title = $_POST['title'];
								$content = $_POST['content'];
								$topic = $_POST['topic'];
								
								$update_post = "UPDATE posts SET post_title = '$title', post_content='$content', topic_id='$topic' WHERE post_id = '$get_id'";
								$run_update = mysqli_query($con,$update_post);
								
								if($run_update){
									echo "<script>window.open('home.php','_self')</script>";
								}
								
							}
						?> 
							

							

					</div>
				</div>
				
			
			</div>
					
		<!-- Container Ends-->

			
	</body>
</html>

<?php } ?>