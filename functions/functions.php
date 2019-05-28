<?php

	$con = mysqli_connect("localhost","root","","hello_world") or die ("Connection was not Established");
	
		
		
		function getTopics(){
			
		global $con;
			$get_topics = "SELECT * FROM topic";
			$run_topics = mysqli_query($con,$get_topics);
								
			while($row=mysqli_fetch_array($run_topics)){ 
									
				$topic_id=$row['topic_id'];
				$topic_title=$row['topic_title'];
									
			echo "<option value='$topic_id'>$topic_title</option>";
									
			}
		}
		
		function insertPosts(){
			if(isset($_POST['sub'])){
				global $con;
				global $user_id;
				$title = addslashes($_POST['title']);
				$content = addslashes($_POST['content']);
				$topic = $_POST ['topic'];
				
				
				if(strlen($content)<10){
				
				echo "<div class='alert alert-danger alert-dismissible'>
					  <button type='button' class='close' data-dismiss='alert'>&times;</button>
					  <strong>Posted unsuccessfully!</strong> &nbsp; &nbsp; You must type more than 10 letters to post!
					</div>";
				getPosts();
				exit();
				
			}
			else{
				
				
			
				$insert = "INSERT INTO posts (user_id,topic_id,post_title,post_content,post_date) VALUES ('$user_id','$topic','$title','$content',NOW())";
				
				$run = mysqli_query($con,$insert);
			}	
				if($run){
					
					
					$update= "UPDATE users SET posts = 'yes' WHERE u_id='$user_id'";
					$run_update = mysqli_query($con,$update);
					echo "<script>window.open('home.php','_self')</script>";
					;
				}
			}
		}
		
		
		function getPosts(){
			
			global $con;
			
			$per_page=12;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
			
			$get_posts = "SELECT * FROM posts ORDER by 1 DESC LIMIT $start_from, $per_page";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			while ($row_posts=mysqli_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$post_title = $row_posts['post_title'];
				$content = $row_posts['post_content'];
				$post_date = $row_posts['post_date'];
				
				$user = "SELECT * FROM users WHERE u_id='$user_id' AND posts='yes'";
				
				$run_user = mysqli_query($con,$user);
				$row_user = mysqli_fetch_array($run_user);
				$user_name = $row_user['u_name'];
				$user_lname = $row_user['u_lname'];
				$user_image = $row_user['u_image'];
				
				
				
				echo "<div id='posts'>
				<div id='post_head'>
				<a href='user_profile.php?u_id=$user_id'>
				<img src='user/user_images/$user_image' width='50' hight='40'></a>
				<a href='user_profile.php?u_id=$user_id'>
				<p3>$user_name $user_lname</p3></a></br>
				<p2>$post_title</p2> </br>
				<p1><kbd>$post_date</kbd></p1></div><hr/>
				<p>$content</p>
				
				
				</div>
				<div id='postsbtn'>
				<a href='single.php?post_id=$post_id' style='float:right;'><button>Reply Or See Replies</button></a></div>
				";
			}	
			include("pagination.php");
		}
		
		function single_post(){
			
			if(isset($_GET['post_id'])){
			global $con;
			
			$get_id = $_GET['post_id'];
				
			$get_posts = "SELECT * FROM posts WHERE post_id='$get_id'";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			$row_posts=mysqli_fetch_array($run_posts);
				
				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$post_title = $row_posts['post_title'];
				$content = $row_posts['post_content'];
				$post_date = $row_posts['post_date'];
				
				$user = "SELECT * FROM users WHERE u_id='$user_id' AND posts='yes'";
				
				$run_user = mysqli_query($con,$user);
				$row_user = mysqli_fetch_array($run_user);
				$user_name = $row_user['u_name'];
				$user_lname = $row_user['u_lname'];
				$user_image = $row_user['u_image'];
				
				$user_com = $_SESSION['u_email'];
				$get_com = "SELECT * FROM users WHERE u_email= '$user_com'";
				$run_com = mysqli_query($con,$get_com);
				$row_com = mysqli_fetch_array($run_com);
				$user_com_id = $row_com['u_id'] ;
				$user_com_name = $row_com['u_name'] ;
				
				echo "
				
				<div id='posts'>
				
				<a href='user_profile.php?u_id=$user_id'>
				<img src='user/user_images/$user_image' width='50' hight='40'></a>
				<a href='user_profile.php?u_id=$user_id'>
				<p3>$user_name $user_lname</p3></a></br>
				<p2>$post_title</p2> </br>
				<p1><kbd>$post_date</kbd></p1><hr/>
				<p>$content</p></div>
				
				<div id='postsbtn'>
				<a href='home.php' style='float:right;'><button>See All Other Posts</button></a>
				
				
				</div>
				
				";
				
				echo " 
				
				<div id='replay'>
				<form action='' method='post' id='replay'>
				<textarea cols='60' rows='4' name='comment' placeholder='Write your reply' required='required' maxlength='300' class='form-control'></textarea>
				
				<button name='replay' class='btn btn-dark' style='font-weight:bold;'>Submit</button>
				</form></br>
				</div>
				
				";
				include("comments.php");
				
				
				if(isset($_POST['replay'])){
					
					$comment = $_POST['comment'];
					$insert = "INSERT INTO comments (post_id,user_id,comment,comment_author,date) values ('$post_id','$user_id','$comment','$user_com_name',NOW())";
					
					$run = mysqli_query($con,$insert);
					include("comments.php");
					
				}


			
			}
			
			
			
		}
		
		function getCats(){
			
			global $con;
			
			$per_page=8;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
			
			if(isset($_GET['topic'])){
				$topic_id = $_GET['topic'];
			}
			
			$get_posts = "SELECT * FROM posts WHERE topic_id='$topic_id' ORDER by 1 DESC LIMIT $start_from, $per_page";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			while ($row_posts=mysqli_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$post_title = $row_posts['post_title'];
				$content = $row_posts['post_content'];
				$post_date = $row_posts['post_date'];
				
				$user = "SELECT * FROM users WHERE u_id='$user_id' AND posts='yes'";
				
				$run_user = mysqli_query($con,$user);
				$row_user = mysqli_fetch_array($run_user);
				$user_name = $row_user['u_name'];
				$user_lname = $row_user['u_lname'];
				$user_image = $row_user['u_image'];
				
				echo "<div id='posts'>
				<div id='post_head'>
				<a href='user_profile.php?u_id=$user_id'>
				<img src='user/user_images/$user_image' width='50' hight='40'></a>
				<a href='user_profile.php?u_id=$user_id'>
				<p3>$user_name $user_lname</p3></a></br>
				<p2>$post_title</p2> </br>
				<p1><kbd>$post_date</kbd></p1></div><hr/>
				<p>$content</p>
				</div>
				<div id=postsbtn>
				<a href='single.php?post_id=$post_id' style='float:right;'><button>Replay Or See Replies</button></a>
				
				</div>
				";
			}	
			include("pagination.php");
		}
		
		function getResult(){
			
			global $con;
			
			$per_page=8;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
			
			if (isset($_GET['user_query'])) {
				$search_term = $_GET['user_query'];
			}
			
			$get_posts = "SELECT * FROM posts WHERE post_title LIKE '%$search_term%' AND post_content LIKE '%$search_term%' ORDER by 1 DESC LIMIT $start_from, $per_page";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			$count_result = mysqli_num_rows($run_posts);
			
			if($count_result==0){
			
			echo "<div class='alert alert-danger alert-dismissible'>
					  <button type='button' class='close' data-dismiss='alert'>&times;</button>
					  <strong>No result found!</strong> &nbsp;&nbsp;&nbsp; We can't find any items matching your search
					</div>";
			exit();
				
			}
			
			while ($row_posts=mysqli_fetch_array($run_posts)){
				
				
				
				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$post_title = $row_posts['post_title'];
				$content = $row_posts['post_content'];
				$post_date = $row_posts['post_date'];
				
				$user = "SELECT * FROM users WHERE u_id='$user_id' AND posts='yes'";
				
				$run_user = mysqli_query($con,$user);
				$row_user = mysqli_fetch_array($run_user);
				$user_name = $row_user['u_name'];
				$user_lname = $row_user['u_lname'];
				$user_image = $row_user['u_image'];
				
				
				
				echo "
				<div id='posts'>
				<div id='post_head'>
				<a href='user_profile.php?u_id=$user_id'>
				<img src='user/user_images/$user_image' width='50' hight='40'></a>
				<a href='user_profile.php?u_id=$user_id'>
				<p3>$user_name $user_lname</p3></a></br>
				<p2>$post_title</p2> </br>
				<p1><kbd>$post_date</kbd></p1></div><hr/>
				<p>$content</p>
				</div>
				<div id=postsbtn>
				<a href='single.php?post_id=$post_id' style='float:right;'><button>Replay Or See Replies</button></a>
				
				</div>
				";
			}	
			include("pagination.php");
		}
		
		function userPosts(){
			
			global $con;
			
			$per_page=8;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
			
			if(isset($_GET['u_id'])){
				$u_id = $_GET['u_id'];
			}
			
			
			$get_posts = "SELECT * FROM posts WHERE user_id='$u_id' ORDER by 1 DESC LIMIT $start_from, $per_page";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			while ($row_posts=mysqli_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$post_title = $row_posts['post_title'];
				$content = $row_posts['post_content'];
				$post_date = $row_posts['post_date'];
				
				$user = "SELECT * FROM users WHERE u_id='$user_id' AND posts='yes'";
				
				$run_user = mysqli_query($con,$user);
				$row_user = mysqli_fetch_array($run_user);
				$user_name = $row_user['u_name'];
				$user_lname = $row_user['u_lname'];
				$user_image = $row_user['u_image'];
				
				echo "<div id='my_posts'>
				
				
				<div id='post_head'>
				<a href='user_profile.php?u_id=$user_id'>
				<img src='user/user_images/$user_image' width='50' hight='40'></a>
				<a href='user_profile.php?u_id=$user_id'>
				<p3>$user_name $user_lname</p3></a></br>
				<p2>$post_title</p2> </br>
				<p1><kbd>$post_date</kbd></p1></div><hr/>
				<p>$content</p>
				</div>

				
				
				<div id='my_postsbtn'>
				<a href='single.php?post_id=$post_id'><button style='margin-right:50px;'>View</button></a>
				<a href='edit_post.php?post_id=$post_id'><button>Edit</button></a>
				<a href='functions/delete_post.php?post_id=$post_id'><button>Delete</button></a>
				
				
				
				</div>"
				
				
				
				
				;
				
				include ("delete_post.php");
			}	
			
		}
		
		function userProfile(){
			if(isset($_GET['u_id'])){
				
				global $con;
				$user_id = $_GET['u_id'];
				
				$select = "SELECT * FROM users WHERE u_id = '$user_id'"; 
				$run = mysqli_query ($con,$select);
				$row = mysqli_fetch_array ($run);
				
				$id = $row['u_id'];
				$image = $row['u_image'];
				$name = $row['u_name'];
				$lname = $row['u_lname'];
				$country = $row['u_country'];
				$gender = $row['u_gender'];
				$reg_date = $row['register_date'];
				
				if ($gender == 'Male'){
					$msg = "Send Him a Message";
				}
				else{
					$msg = "Send Her a Message";
				}
				
				echo " <div id='user_profile'>
							
							
							<img src='user/user_images/$image' width='140' hight='140' />
							
							<p><strong>Name : </strong>$name $lname</p>
							<p><strong>Gender : </strong>$gender</p>
							<p><strong>Country : </strong>$country</p>
							<p><strong>Member Since : </strong>$reg_date</p>
							&nbsp;&nbsp;&nbsp;&nbsp;<a href='messages.php?u_id=$id'><button class='btn btn-light'>$msg</button></a>
							
							</div>
							
					";
					
			}
			
		}
		
		function newMembers(){
			
			global $con;
			
			$user = "SELECT * FROM users LIMIT 0,20";
			
			$run_user = mysqli_query($con,$user);
			
			echo 
			
			"
			<div id='new_member'>
			</br><h2>New Members :</h2></br>";
			while($row_user=mysqli_fetch_array($run_user)){
			
			$user_id = $row_user['u_id'];
			$user_name = $row_user['u_name'];
			$user_image = $row_user['u_image'];
			
			echo "
			
				
					<a href='user_profile.php?u_id=$user_id'>
					<img src='user/user_images/$user_image' width='40' hight='40' title='$user_name' style='float:left;' />
					</a>
				</div>
			";
			
		}
		}
		
		function othersPosts(){
			
			global $con;
			
			
			$per_page=8;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
			
			if(isset($_GET['u_id'])){
				$u_id = $_GET['u_id'];
			}
			
			
			$get_posts = "SELECT * FROM posts WHERE user_id='$u_id' ORDER by 1 DESC LIMIT $start_from, $per_page";
			
			$run_posts = mysqli_query($con,$get_posts);
			
			while ($row_posts=mysqli_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$post_title = $row_posts['post_title'];
				$content = $row_posts['post_content'];
				$post_date = $row_posts['post_date'];
				
				$user = "SELECT * FROM users WHERE u_id='$user_id' AND posts='yes'";
				
				$run_user = mysqli_query($con,$user);
				$row_user = mysqli_fetch_array($run_user);
				$user_name = $row_user['u_name'];
				$user_lname = $row_user['u_lname'];
				$user_image = $row_user['u_image'];
				
				echo "<div id='posts'>
				<div id='post_head'>
				<a href='user_profile.php?u_id=$user_id'>
				<img src='user/user_images/$user_image' width='50' hight='40'></a>
				<a href='user_profile.php?u_id=$user_id'>
				<p3>$user_name $user_lname</p3></a></br>
				<p2>$post_title</p2> </br>
				<p1><kbd>$post_date</kbd></p1></div><hr/>
				<p>$content</p>
				</div>
				<div id=postsbtn>
				<a href='single.php?post_id=$post_id' style='float:right;'><button>Reply Or See Replies</button></a>
				
				</div>"
				
				
				
				
				;
				
			}	
			
		}
		
		
		function findMembers(){
			
			global $con;
			
			$per_page=15;
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
			
			if (isset($_GET['find_members'])) {
				$search_term = $_GET['find_members'];
			}
			
			$get_members = "SELECT * FROM users WHERE u_name LIKE '%$search_term%' ORDER by 1 DESC LIMIT $start_from, $per_page";
			
			$run_members = mysqli_query($con,$get_members);
			
			$count_result = mysqli_num_rows($run_members);
			
			if($count_result==0){
			
			echo "<div class='alert alert-danger alert-dismissible'>
					  <button type='button' class='close' data-dismiss='alert'>&times;</button>
					  <strong>No result found!</strong> &nbsp;&nbsp;&nbsp; We can't find any items matching your search
					</div>";
			exit();
				
			}
			
			while($row = mysqli_fetch_array($run_members)){
							
							$user_id = $row['u_id'] ;
							$user_name = $row['u_name'] ;
							$user_lname = $row['u_lname'];
							$user_country = $row['u_country'];
							$register_date = $row['register_date'];
							$user_image = $row['u_image'] ;
							
							
							echo 
							" 
							
							<div id='members_list'>
							
							
							
							<a href ='user_profile.php?u_id=$user_id'> 
							
							<img src='user/user_images/$user_image''/> 
							 <span> $user_name $user_lname</a></br> 
							Country : $user_country </br>
							Member Since: $register_date </span>
							
							
							
							</div>
							";
							}
		
		}
		
		// function quizCategary(){
			
		// global $con;
			// $get_quizcat = "SELECT * FROM quiz_cat";
			// $run_quizcat = mysqli_query($con,$get_quizcat);
								
			// while($row=mysqli_fetch_array($run_quizcat)){ 
									
				// $quizcat_id=$row['id'];
				// $quizcat_name=$row['cat_name'];
									
			// echo "<option value='$quizcat_id'>$quizcat_name</option>";
									
			// }
		// }
		
		// function quizShow(){
			
		// global $con;
			// $get_quizcat = "SELECT * FROM quiz_cat";
			// $run_quizcat = mysqli_query($con,$get_quizcat);
								
			// while($row=mysqli_fetch_array($run_quizcat)){ 
									
			// $quizcat_id=$row['id'];
			// $quizcat_name=$row['cat_name'];
		
			// $get_quizshow = "SELECT * FROM questions WHERE cat_id='$quizcat_name'";
			// $run_quizshow = mysqli_query($con,$get_quizshow);
								
			// while($row=mysqli_fetch_array($run_quizshow)){ 
									
				// $quizshow_id=$row['id'];
				// $quizshow_quiz=$row['quiz'];
				// $quizshow_ans1=$row['ans1'];
				// $quizshow_ans2=$row['ans2'];
				// $quizshow_ans3=$row['ans3'];
				// $quizshow_ans4=$row['ans4'];
				// $quizshow_ans=$row['ans'];
									
			// echo "
				// <div class='container'>
				  // <h2>Test Your Knwoledge</h2>           
				  // <table class='table table-hover'>
					// <thead>
					  // <tr>
						// <th>$quizshow_quiz</th>
					  // </tr>
					// </thead>
					// <tbody>
					  // <tr>
						// <td>$quizshow_ans1</td>
					  // </tr>
					 // <tr>
						// <td>$quizshow_ans2</td>
					 // </tr>
					 // <tr>
						// <td>$quizshow_ans3</td>
					 // </tr>
					 // <tr>
						// <td>$quizshow_ans4</td>
					  // </tr>
					// </tbody>
				  // </table>
				// </div>
			// ";
									
			// }
		// }
		// }
		
	function gettutorials(){
						
						global $con;
		
						$get_tut = "SELECT * FROM tutorials";
			
						$run_tut = mysqli_query($con,$get_tut);
						
						$no_row = mysqli_num_rows($run_tut);
						
						while($row_tut=mysqli_fetch_array($run_tut)){
							
							$t_id = $row_tut['t_id'];
							$tutor_id = $row_tut['tutor_id'];
							$t_title = $row_tut['t_title'];
							$t_tutorial = $row_tut['t_tutorial'];
							$t_time = $row_tut['t_time'];
							
							$tut = "SELECT * FROM tutors WHERE id='$tutor_id'";
							
							$run_tut = mysqli_query($con,$tut);
							$row_tut = mysqli_fetch_array($run_tut);
							$tut_fname = $row_tut['f_name'];
							$tut_lname = $row_tut['l_name'];
							$tut_image = $row_tut['pro_pic'];
							$tut_quali = $row_tut['qualification'];
							
							
					echo "<div id='tut_timeline' >
						<div id='tut_head'>
							<h2>Start to Learn Programming</h2>
							
						</div>
						<div id='tut_content'>
							
							
							<div id='tut_card'>
								<p style='padding-left:30px;'>Tutor By : $tut_fname</p>
												
								<h4> $t_title </h4>
							<center>
							<a href='single_tut.php?t_id=$t_id'><button class='btn btn-primary' style='margin:10px;'>Start Learning</button></a>
							</center>	
							</div>
							
							
						</div>
						
			
					</div>";
						
				mysqli_close($con);
	}
	}
	
	function getSingleTut(){
						global $con;
		
                        if(isset($_GET['t_id'])){
                            $tut_id = $_GET['t_id'];
                            $get_tut = "select * from tutorials where t_id='$tut_id'";
							$run_tut = mysqli_query($con,$get_tut);
						
						while($row_tut=mysqli_fetch_array($run_tut)){
							
							$t_id = $row_tut['t_id'];
							$tutor_id = $row_tut['tutor_id'];
							$t_title = $row_tut['t_title'];
							$t_tutorial = $row_tut['t_tutorial'];
							$t_time = $row_tut['t_time'];
							
						echo "
								<div id='single_tut'>
									<center><h2 style='border-bottom:1px solid black;'> $t_title </h2></center>
									<div>
										$t_tutorial
									</div>
								</div>
						
						
						
						
						";
							
                        }
                        
	}
	}
	
	
	function getbooks(){
						
						global $con;
		
						$get_book = "SELECT * FROM book";
			
						$run_book = mysqli_query($con,$get_book);
						
						$no_row = mysqli_num_rows($run_book);
						
						while($row_book=mysqli_fetch_array($run_book)){
							
							$book_id = $row_book['book_id'];
							$book_name = $row_book['book_name'];
							$book_author = $row_book['book_author'];
							$book_cover = $row_book['book_cover'];
							$book_file = $row_book['book_file'];
							
							
							
							
					echo "<div id='book_card'>
						<h5 style='border-bottom:1px solid black;'>$book_name</h5>
						<p>Author : $book_author</p>
						<center><img src='admin/books_img/$book_cover' style='height:240px'/></center>
						<center><a href='admin/books/$book_file'><button class='btn btn-primary' style='margin:30px;'>Read Book</button></center></a>
					
					</div>";
						
		
	}
	}
		
		
					// <a href='single_tut.php?t_id=$t_id'><button class='btn btn-primary' style='margin:10px;'>Start Learning</button></a>
?>