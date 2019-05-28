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
					<div id="msg1">
						
						<?php 
							if(isset($_GET['u_id'])){
								global $con;
								$get_id = $_GET['u_id'];
								$get_user = "SELECT * FROM users WHERE u_id ='$get_id'";
								$run_user = mysqli_query($con,$get_user);
								$row_user = mysqli_fetch_array($run_user);
								
								$user_to_msg = $row_user['u_id'];
								$user_to_name = $row_user['u_name'];
								
							}
							$user = $_SESSION['u_email'];
							$get_user = "SELECT * FROM users WHERE u_email ='$user'";
							$run_user = mysqli_query($con, $get_user);
							$row = mysqli_fetch_array($run_user);
							
							$user_from_msg = $row['u_id'];
							$user_from_name = $row['u_name'];
							
							
						
						?>
						
						<div id="select_user">
							<?php
								$user = "SELECT * FROM users";
								
								$run_user = mysqli_query($con,$user);
								
								while($row_user = mysqli_fetch_array($run_user)){
									
									$user_id = $row_user['u_id'];
									$user_name = $row_user['u_name'];
									$register_date = $row_user['register_date'];
									$user_image = $row_user['u_image'];
									
									echo"
										<div class='container_fluid'>
											<a style='text_decoration : none; ' href=messages.php?u_id=$user_id>
											<img class='img_circle' src='user/user_images/$user_image' width='80px' hight='80px' title='$user_name'><strong>&nbsp $user_name </strong>
											</a>
										</div>
									";
								}
							?>
							
						</div>
						<div class="col-sm-6">
							<div id="scroll_msg">
								<?php
									$sel_msg = "SELECT * FROM messages WHERE (sender='$user_to_msg' AND reciver='$user_from_msg') OR (reciver='$user_to_msg' AND sender='$user_from_msg') ORDER by 1 ASC";
									$run_msg = mysqli_query($con,$sel_msg);
									
									while($row_msg = mysqli_fetch_array($run_msg)){
										
										$user_to = $row_msg['sender'];
										$user_from = $row_msg['reciver'];
										$msg_sub = $row_msg['msg_sub'];
										$msg_date = $row_msg['msg_date'];
										?>
										
										<div id="loaded_msg">
											<p><?php if($user_to == $user_to_msg AND $user_from == $user_from_msg)
														{echo"<div class='message' id='blue' data-toggle = 'tooltip' title='$msg_date'>$msg_sub</div><br><br> ";}
													else if($user_from == $user_to_msg AND $user_to == $user_from_msg){
														echo"<div class='message' id='green' data-toggle = 'tooltip' title='$msg_date'>$msg_sub</div><br><br> ";
													}
											?></p>
										</div>
										<?php
									}
								?>
								
							</div>
							<?php
								if(isset($_GET['u_id'])){
									$u_id = $_GET['u_id'];
									if($u_id == "new"){
										echo'
											<form>
												<center><h3>Select Some One To Start Conversation</h3></center>
												<textarea disabled class="form-control" placeholder="Enter Your Message"></textarea>
												<input type="submit" class="btn btn-default" disabled value="Send">
												
											</form><br><br>
										';
									}
								}
							?>
						</div>
						
						
				</div>
				
				
			</div>
			</div>
		<!-- Container Ends-->


	</body>
</html>

<?php } ?>