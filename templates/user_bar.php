<div id = "user_bar">
<?php
							$user = $_SESSION['u_email'];
							$get_user = "SELECT * FROM users WHERE u_email= '$user'";
							$run_user = mysqli_query($con,$get_user);
							$row = mysqli_fetch_array($run_user);

							$user_id = $row['u_id'] ;
							$user_name = $row['u_name'] ;
							$user_lname = $row['u_lname'] ;
							$user_country = $row['u_country'] ;
							$user_gender = $row['u_gender'] ;
							$user_image = $row['u_image'] ;
							$register_date = $row['register_date'] ;
							$last_login = $row['last_login'] ;
							// <p><strong>Last Login: </strong>$last_login</p>
							
							$user_posts = "SELECT * FROM posts WHERE user_id = '$user_id'";
							$run_posts = mysqli_query ($con,$user_posts);
							$posts = mysqli_num_rows ($run_posts);
							
							
							$sel_msg = "SELECT * FROM messages WHERE reciver='$user_id' AND status='unread'";
							$run_msg = mysqli_query($con,$sel_msg);
							$count_msg = mysqli_num_rows($run_msg);
							
							
							echo
							"
							<div id='user_pro'>
							<center>
							<a href ='set_image.php?u_id=$user_id'>
							<img src='user/user_images/$user_image' title='Change Your Profile Picture' style=''/>
							
							</a> 
							
							
									<p>$user_name $user_lname</p>
									<p><strong>Member Since: </strong>$register_date</p></center>
							</div>
									</br></br>

									<p><a href='my_messages.php?new_msg&u_id=$user_id'  class='btn btn-dark' role='button' style='font-weight:bold; width:200px;'><i class='fas fa-envelope'></i> Messages ($count_msg)</a></p>
									<p><a href='my_posts.php?u_id=$user_id'  class='btn btn-dark ' role='button' style='font-weight:bold; width:200px;padding-right:17px;'><i class='fas fa-newspaper'></i> My Posts ($posts)</a></p>
									<p><a href='edit_profile.php?u_id=$user_id'  class='btn btn-dark ' role='button' style='font-weight:bold; width:200px; padding-right:27px;'><i class='fas fa-user-edit'></i> Edit Profile </a></p>
									<p><a href='logout.php'  class='btn btn-dark' role='button' style='font-weight:bold; width:200px; padding-right:50px;'><i class='fas fa-sign-out-alt'></i> Log Out</a></p>

								
							";


							?>
</div>