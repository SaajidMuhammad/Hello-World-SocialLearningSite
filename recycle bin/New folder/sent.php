<div id="msg2">


						
					
							
						
					
						<table width="600" align="center">
							<tr>
								<th>Reciver</th>
								<th>Subject</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
							<?php
						$sel_msg = "SELECT * FROM messages WHERE sender='$user_id' ";
						$run_msg = mysqli_query($con,$sel_msg);
						$count_msg = mysqli_num_rows($run_msg);
						
						while($row_msg=mysqli_fetch_array($run_msg)){
							$msg_id = $row_msg['msg_id'];
							$msg_reciver = $row_msg['reciver'];
							$msg_sender = $row_msg['sender'];
							$msg_sub = $row_msg['msg_sub'];
							$msg_date = $row_msg['msg_date'];
							
							$get_reciver = "SELECT * FROM users WHERE u_id='$msg_reciver'";
							$run_reciver = mysqli_query($con,$get_reciver);
							$row = mysqli_fetch_array($run_reciver);
							
							$reciver_name = $row['u_name'];
						
					
					
					?>
							<tr align="center">
								<td>
								<a href="user_profile.php?u_id=<?php echo $msg_reciver; ?>">
								<?php echo $reciver_name; ?></td></a>
								<td>
								<a href="my_messages.php?sent&msg_id=<?php echo $msg_id; ?>">
								<?php echo $msg_sub; ?>
								</a>
								</td>
								<td><?php echo $msg_date; ?></td>
								<td><a href="my_messages.php?sent&msg_id=<?php echo $msg_id; ?>">View Reply</a></td>
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
							 
							 echo"
							 <center><div id=inbox></br><hr>
								<p>Message : $msg</p></br>
								<p>Reply : $reply</p>
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
							 
							 if($reply != 'You Not Replied To This'){
								  echo "<center><h2>You're Already Replied To This</h2></center>";
								  exit();
							 }
							 else{
							 $update_msg = "UPDATE messages SET reply='$user_reply' WHERE msg_id='$get_id'";
							 $run_msg = mysqli_query($con,$update_msg);
							 
							
							echo "<script>window.open('my_messages.php?u_id=$u_id','_self')</script>";
							 }
						 }
						?>
						
					</div>
					
			