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

	<body  class="bg-light">

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
						<form action="home.php?id=<?php echo $user_id;?>" method="post" id="f" >
						<h2 style="margin-top:10px;font-size:22px;"> What's Your Question? Let's Discuss! </h2>
						<div class="row" style="margin-left:1px;">
						<input type="type" name="title" placeholder="Write a Title...." required="required" maxlength="40" class="form-control" style="width:480px;" />
						
						
						<select name="topic" class="form-control" style="width:158px; margin-left:3px;">
							<option> Select Topic </option>
							<?php getTopics(); ?>
						</select></br></div>

						<!--  <input type="type" name="Description" placeholder="Write a Discription" size="66"/></br> -->

						<textarea  name= "content" placeholder="Descripe Here..." class="form-control" style="width:640px; margin-top:5px; resize:none; height:80px;"></textarea>

						<button name="sub" class="btn btn-dark" style=" width:140px; font-weight:bold; margin-top:5px;">  Post </button>
						<!--  <input type="submit" name="sub" value="Post to Timeline"/>  -->
						</form>
						<?php insertPosts(); ?>
						 <div id = "f1">
						
						 </div>
							<?php getCats(); ?>

					</div>
				</div>
			</div>
		<!-- Container Ends-->


	</body>
</html>

<?php } ?>