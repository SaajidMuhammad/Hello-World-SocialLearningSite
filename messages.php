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
					<div >
						<?php include("templates/side_bar.php"); ?>
					</div>
					<div id="content_timeline">
						
						<?php 
							if(isset($_GET['u_id'])){
								
								$u_id = $_GET['u_id'];
								$sel = "SELECT * FROM users WHERE u_id='$u_id'";
								$run = mysqli_query($con,$sel);
								$row = mysqli_fetch_array($run);
								$user_name = $row['u_name'];
								$lastname_name = $row['u_lname'];
								$user_image = $row['u_image'];
								$reg_date = $row['register_date'];
								
								
							}
						
						?>
							<h2 style="font-size:22px; margin-top:10px;"> Ask any thing from <span style='color:red; font-weight:bold;'><?php echo $user_name ?> <?php echo $lastname_name;?></span></h2>
						<div id="msg">
						<form action="messages.php?u_id=<?php echo $u_id; ?>" method="post" >
							<textarea name="msg" placeholder="Type some texts" required="required" class="form-control"></textarea></br>
							<input type="submit" name="message" value="Send Messages" class="btn btn-dark"/>
						</form>
							<p style="margin-top:10px;"><strong> <?php echo $user_name;?> <?php echo $lastname_name;?></strong> Is Member Since: <?php echo $reg_date;?> </p></div>
						<?php 
						if(isset($_POST['message'])){
							
						$msg= $_POST['msg'];
						
						$insert = "INSERT INTO messages (sender,reciver,msg_sub,reply,status,msg_date) VALUES ('$user_id','$u_id','$msg','---','unread',NOW())";
						
						$run_insert = mysqli_query($con,$insert);
						
						if($run_insert){
							
							 echo "<center><div class='alert alert-primary alert-dismissible'>
									  <button type='button' class='close' data-dismiss='alert'>&times;</button>
									  <strong>Message was Sent To  <span style='color:red;'>$user_name $lastname_name<span></strong> 
									</div></center>";
							//echo "<script>window.open('messages.php?u_id=$u_id','_self')</script>";
							
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