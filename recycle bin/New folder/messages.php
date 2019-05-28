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
								$user_image = $row['u_image'];
								$reg_date = $row['register_date'];
								
								
							}
						
						?>
							<h2> Send a Message to <span style='color:red;'><?php echo $user_name ?></span></h2>
						
						<form action="messages.php?u_id=<?php echo $u_id; ?>" method="post" id="msg">
							<textarea name="msg" placeholder="Type some texts" required="required"></textarea></br>
							<input type="submit" name="message" value="Send Messages"/>
						</form>
							<div id="msg"><p><strong> <?php echo $user_name;?> </strong> Is Member Since: <?php echo $reg_date;?> </p></div>
						<?php 
						if(isset($_POST['message'])){
							
						$msg= $_POST['msg'];
						
						$insert = "INSERT INTO messages (sender,reciver,msg_sub,reply,status,msg_date) VALUES ('$user_id','$u_id','$msg','---','unread',NOW())";
						
						$run_insert = mysqli_query($con,$insert);
						
						if($run_insert){
							
							 echo "<center><h2 style='margin-top:10px; background-color:Black;color:white; padding:4px;'>Message was Sent To <span style='color:red;'>$user_name<span></h2></center>";
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