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
					<div id="msg1">
						
					
							
						<p align="center" style="padding:10px; ">
						 <a href ="my_messages.php?new_msg">New Messages(<?php echo $count_msg;?>)</a>&nbsp;||&nbsp; 
						 <a href ="my_messages.php?inbox">Inbox</a> &nbsp;||&nbsp; 
						 <a href ="my_messages.php?sent">Sent Items</a>  
						
						 
						</p>
						
						<?php if(isset($_GET['inbox'])){
							include ("inbox.php");
						}?>
						
						<?php if(isset($_GET['sent'])){
							include ("sent.php");
						}?>	
						<?php if(isset($_GET['replies'])){
							include ("reply.php");
						}?>
						
						<?php if(isset($_GET['new_msg'])){?>
					
						<table width="600" align="center">
							<tr>
								<th>Sender</th>
								<th>Subject</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
							<?php
						$sel_msg = "SELECT * FROM messages WHERE reciver='$user_id' AND status='unread'";
						$run_msg = mysqli_query($con,$sel_msg);
						$count_msg = mysqli_num_rows($run_msg);
						
						
						
						
						while($row_msg=mysqli_fetch_array($run_msg)){
							$msg_id = $row_msg['msg_id'];
							$msg_reciver = $row_msg['reciver'];
							$msg_sender = $row_msg['sender'];
							$msg_sub = $row_msg['msg_sub'];
							$msg_date = $row_msg['msg_date'];
							
							$get_sender = "SELECT * FROM users WHERE u_id='$msg_sender'";
							$run_sender = mysqli_query($con,$get_sender);
							$row = mysqli_fetch_array($run_sender);
							
							$sender_name = $row['u_name'];
						
					
					
					?>
							<tr align="center">
								<td>
								<a href="user_profile.php?u_id=<?php echo $msg_sender; ?>">
								<?php echo $sender_name; ?></td></a>
								<td>
								<a href="my_messages.php?inbox&msg_id=<?php echo $msg_id; ?>">
								<?php echo $msg_sub; ?>
								</a>
								</td>
								<td><?php echo $msg_date; ?></td>
								<td><a href="my_messages.php?inbox&msg_id=<?php echo $msg_id; ?>">Reply</a></td>
							</tr>
						<?php } ?>
						</table>
						<?php
						 if(isset($_GET['msg_id'])){
							 $get_id = $_GET['msg_id'];
							 
							 $sel_message = "SELECT * FROM messages WHERE msg_id='$get_id'";
							 $run_message = mysqli_query($con,$sel_message);
							 
							 $row_message = mysqli_fetch_array($run_message);
							 
							 $msg = $row_message['msg_sub'];
							 $reply =  $row_message['reply'];
							 
							 //update the unread msg to readdir
						
							$update_unread = "update messages set status ='read' WHERE msg_id='$get_id'";
							$run_unread = mysqli_query($con,$update_unread);
						
							 echo"
							 <center><div id=inbox></br><hr>
								<p>Message : $msg</p></br>
								<p>Your Reply : $reply</p>
								</div></br>
							<form action='' method='post'>
								<textarea cols='50' rows='3' name='reply' required='required'></textarea></br>
								<input id='reply_btn' type='submit' name='msg_reply' value='Reply To this' style='float:center'>
							</form>
								
							 </center>
							 ";
						 }
						 
						 if(isset($_POST['msg_reply'])){
							 
							 $user_reply = $_POST['reply'];
							 
							 if($user_reply != '---'){
								  echo "<center><h2>You're Already Replied To This</h2></center>";
								  exit();
							 }
							 else{
							 $update_msg = "UPDATE messages SET reply='$user_reply' WHERE msg_id='$get_id'";
							 $run_msg = mysqli_query($con,$update_msg);
							 
							
							echo "<script>window.open('my_messages.php?u_id=$u_id','_self')</script>";
							 }
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