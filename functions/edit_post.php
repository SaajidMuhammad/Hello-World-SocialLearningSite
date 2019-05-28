<?php
	session_start();
	include("../includes/connection.php");
	include("functions.php");

	if(!isset($_SESSION['u_email'])){

		echo "<script>window.open('index.php','_self')</script>";
	}
	else {
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Hello World</title>
		<link rel="stylesheet" href="../styles/home_style.css" media="all"/>
	</head>

	<body>

		<!-- Container Starts-->
			<div class="container">
				<div id="head_wrap">
					<div id="header">
						<ul id="menu">
							<li><a href="home.php">Home</a></li>
							<li><a href="members.php">Members</a></li>
							<strong>Topics : </strong>
							<?php

								$get_topics = "SELECT * FROM topic";
								$run_topics = mysqli_query($con,$get_topics);

								while($row=mysqli_fetch_array($run_topics)){

									$topic_id=$row['topic_id'];
									$topic_title=$row['topic_title'];

								echo "<li><a href='topic.php?topic=$topic_id'>$topic_title</a></li>";

								}


							?>
						</ul>

						<form method="get" action="result.php" id="form1">
							<input type="text" name="user_query" placeholder="Search a Topic" /> &nbsp;
							 <button name="search">  Search </button>
							<!-- <input type="submit" name="search" value="Search"/> -->
						</form>
					</div>
				</div>


				<div class = "content">
					<div id = "user_timeline">
						<div>
							<?php include("../templates/user_bar.php"); ?>
						</div>
					</div>
					<div>
						<?php include("../templates/side_bar.php"); ?>
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
						<h2> Edit Your Post </h2>
						<input type="type" name="title" value="<?php echo $post_title; ?>" required="required" />
						<select name="topic">
							<option> Select Topic </option>
							<?php getTopics(); ?>
						</select></br>

						<!--  <input type="type" name="Description" placeholder="Write a Discription" size="66"/></br> -->

						<textarea  name= "content" placeholder=""><?php echo $post_con; ?></textarea></br>

						<button name="update">  Update Post </button>
						<!--  <input type="submit" name="sub" value="Post to Timeline"/>  -->
						</form>
						
						 
							

							

					</div>
				</div>
				
			
			</div>
					
		<!-- Container Ends-->

			
	</body>
</html>

<?php } ?>