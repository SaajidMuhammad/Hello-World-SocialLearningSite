<div id="msg2">
						
					
							
						
					
						<table width="600" align="center">
							<tr>
								<th>Sender</th>
								<th>Subject</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
							<?php
						$sel_msg = "SELECT * FROM messages WHERE reciver='$user_id'";
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
						?>
						</div>
						<?php
							 echo"
							 <center><div id=inbox></br><hr>
								<p><b>Message :</b> $msg</p></br>
								<p><b>Your Reply :</b> $reply</p>
								</div></br>
							<form action='' method='post'>
								<textarea cols='50' rows='3' name='reply' required='required'></textarea></br>
								<input class='btn btn-primary'  role='button' type='submit' name='msg_reply' value='Reply To This' style='float:center; margin-bottom:20px;'>
							</form>
								
							 </center>
							 ";
						 }
						 
						 if(isset($_POST['msg_reply'])){
							 
							 $user_reply = $_POST['reply'];
							 /*
							 if($user_reply != '---'){
								  echo "<center><div class='alert alert-danger alert-dismissible'>
					  <button type='button' class='close' data-dismiss='alert'>&times;</button>
					  You're Already Replied To This &nbsp;&nbsp;&nbsp;</center></div>";
								  
								  
					
							 }
							 else{ */
							 $update_msg = "UPDATE messages SET reply='$user_reply' WHERE msg_id='$get_id'";
							 $run_msg = mysqli_query($con,$update_msg);
							 
						 }
						 
						
						 
						
						?>
						
					</div>