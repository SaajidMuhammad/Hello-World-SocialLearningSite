<?php 
	session_start();
	include ("../functions/functions.php");
	
	
	
	if(!isset($_SESSION['email'])){
		header("location: tutor_login.php");
	}
	else {
	
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Hello World - Tutor Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
		
		<link rel="icon" href="images/minilogo.jpg"/>
		
		<link rel="stylesheet" href="style/tutor_style.css" media="all"/>
		<link rel="stylesheet" href="../styles/bootstrap.min.css" media="all"/>
		
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/fontawesome.min.js"></script>
		<script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>

    </head>
    <body class="bg-light">

	<div class="container-fluid bg-dark">
			<?php 
				$tutor = $_SESSION['email'];
							$get_tutor = "SELECT * FROM tutors WHERE email = '$tutor'";
							$run_tutor = mysqli_query($con,$get_tutor);
							$row = mysqli_fetch_array($run_tutor);

							$tutor_id = $row['id'] ;
							$tutor_fname = $row['f_name'] ;
							$tutor_lname = $row['l_name'] ;
							$tutor_email = $row['email'] ;
							$tutor_password = $row['password'] ;
							$tutor_image = $row['pro_pic'] ;
							$register_date = $row['reg_date'] ;
							$qualification = $row['qualification'] ;
			
			?>
		<div id="head" style="background-color:black; padding:10px; border:3px solid white; width:100%; position:fixed;">
			<a href="index.php"><img src="images/logo.jpg" style="height:50px; outline:2px solid white;"></a>
			<h6 style="color:white; float:right; margin-right:30px;margin-top:10px;">You have loggeed as: <?php echo $tutor_fname . $tutor_lname; ?></h6>
		</div>
		
		
		
		<div id="sidebar" style="height:600px; background-color:black; float:left; width:260px; border-left:3px solid white;">
		
			<h5 style="color:white; padding:10px; padding-left:50px; font-weight:bold; border-bottom:1px solid white;" >Manage Content</h5>
			
				<a href="index.php?tut_profile"  class="btn btn-outline-light" role="button"> <i class="fas fa-paste"></i>  My Profile </a></br>
				<a href="index.php?write_tut"  class="btn btn-outline-light" role="button"> <i class="fas fa-paste"></i>  Write Tutorials </a></br>
				<a href="index.php?view_tut"  class="btn btn-outline-light" role="button"> <i class="fas fa-paste"></i> View Tutorials</a></br>
				<a href="index.php?other_tut"  class="btn btn-outline-light" role="button"> <i class="fas fa-users"></i> Other Tutors</a></br>
				<a href="tutor_logout.php"  class="btn btn-outline-light" role="button"> <i class="fas fa-sign-out-alt"></i> Tutor Logout</a></br>
			
		</div>
		
		<div id="content" style="height:600px; background-color:white; float:right; width:1055px; margin-top:75px;">
		
				
				<?php 
					if(isset($_GET['tut_profile'])){
						include("includes/tut_profile.php");
					}
				
					if(isset($_GET['write_tut'])){
						include("includes/write_tut.php");
					}
					
					if(isset($_GET['view_tut'])){
						include("includes/view_tut.php");
					}
					
					if(isset($_GET['other_tut'])){
						include("includes/other_tut.php");
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