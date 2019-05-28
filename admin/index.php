<?php 
	session_start();
	include ("../functions/functions.php");
	
	if(!isset($_SESSION['admin_email'])){
		header("location: admin_login.php");
	}
	else {
	
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Hello World - Admin Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
		
		<link rel="icon" href="images/minilogo.jpg"/>
		
		<link rel="stylesheet" href="style/admin_style.css" media="all"/>
		<link rel="stylesheet" href="../styles/bootstrap.min.css" media="all"/>
		
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/fontawesome.min.js"></script>
    </head>
    <body class="bg-light">

	<div class="container-fluid bg-dark">
		<div id="head" style="background-color:black; padding:10px; border:3px solid white; width:100%; position:fixed;">
			<a href="index.php"><img src="images/logo.jpg" style="height:50px; outline:2px solid white;"></a>
		</div>
		
		
		
		<div id="sidebar" style="height:600px; background-color:black; float:left; width:260px; border-left:3px solid white;">
			<h5 style="color:white; padding:10px; padding-left:50px; font-weight:bold; border-bottom:1px solid white;" >Manage Content</h5>
			
				<a href="index.php?view_users"  class="btn btn-outline-light" role="button"> <i class="fas fa-users"></i> View All Users </a></br>
				<a href="index.php?view_posts"  class="btn btn-outline-light" role="button"> <i class="fas fa-paste"></i> View All Post</a></br>
			<!--	<a href="index.php?view_comments"  class="btn btn-outline-light" role="button"> <i class="fas fa-comments"></i> View Comments</a></br> 
				<a href="index.php?view_topics"  class="btn btn-outline-light" role="button"> <i class="far fa-comment-alt"></i> View All Topic</a></br>
				<a href="index.php?change_topics"  class="btn btn-outline-light" role="button"> <i class="fas fa-plus-square"></i> Change Topic</a></br> -->
				<a href="index.php?add_quiz"  class="btn btn-outline-light" role="button"> <i class="fas fa-plus-square"></i> Add New Quizes</a></br>
				<a href="index.php?view_quiz"  class="btn btn-outline-light" role="button"> <i class="fas fa-plus-square"></i> View Quizes</a></br>
				<a href="index.php?add_books"  class="btn btn-outline-light" role="button"> <i class="fas fa-plus-square"></i> Add Books</a></br>
				<a href="index.php?view_books"  class="btn btn-outline-light" role="button"> <i class="fas fa-plus-square"></i> View Books</a></br>
			
				<a href="admin_logout.php"  class="btn btn-outline-light" role="button"> <i class="fas fa-sign-out-alt"></i> Admin Logout</a></br>
			
		</div>
		
		<div id="content" style="height:600px; background-color:white; float:right; width:1055px; margin-top:75px;">
		
				
				<?php 
					if(isset($_GET['view_users'])){
						include("includes/view_users.php");
					}
					
					if(isset($_GET['view_posts'])){
						include("includes/view_posts.php");
					}
					
					if(isset($_GET['view_topics'])){
						include("includes/view_topics.php");
					}
					
					if(isset($_GET['view_quiz'])){
						include("includes/view_quiz.php");
					}
					
					if(isset($_GET['add_quiz'])){
						include("add_quiz.php");
					}
					
					if(isset($_GET['add_books'])){
						include("includes/add_books.php");
					}
					
					if(isset($_GET['view_books'])){
						include("includes/view_books.php");
					}
				
				?>
				
			
			
			
		</div>
		
		
		<div id="footer" style="width:100%; height:60px; background-color:black; border-right:3px solid white; clear:both;">
							<center><h6 style="padding-top:15px; solid white 1px; color:white;">&copy; TheHelloWorld.com</h6></center>
		</div>
	</div>
	
	
    </body>
</html>

	<?php } ?>