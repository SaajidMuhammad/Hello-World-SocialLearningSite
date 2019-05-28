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
	</head>

	<body>

		<!-- Container Starts-->
			<div class="container">
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
						
						
					</div>
							
						$msg = $_POST['msg'];
					<?php 
						if(isset($_POST['message'])){
						
						$insert = "INSERT INTO messages (sender,reciver,msg_sub,replay,status,msg_date) VALUES ('$user_id','$u_id','$msg','no_reply','unread',NOW())";
						
						$run_insert = mysqli_query($con,$insert);
						
						}
					
					?>
				</div>
				
				
			</div>
		<!-- Container Ends-->


	</body>
</html>

<?php } ?>