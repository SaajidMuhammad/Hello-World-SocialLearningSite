

<?php 
	session_start();
	include("../includes/connection.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Hello World</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="style/tutor_style.css" media="all"/>
		<link rel="stylesheet" href="../styles/bootstrap.min.css" media="all"/>
		
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/fontawesome.min.js"></script>
    </head>
    <body id="login_body">
	
		<div class="container" >
			
			<div class="login-form">
			<div class="main-div">
				<div class="panel">
			  
			   
			   </div>
				<form id="login" method="post" action="tutor_login.php">
				
					 <h2 style="text-align:center;">Tutor Login</h2></br>

					<div class="form-group">


						<input type="email" class="form-control" name="email" placeholder="Username">

					</div>

					<div class="form-group">

						<input type="password" class="form-control" name="pass" placeholder="Password"></br>

					</div>
				
					<button type="submit" class="btn btn-warning" name="login">Login</button>

						<button class="btn btn-link"  data-target='#tutor_reg' data-toggle='modal'>Create a New Tutor Account</button>
				</form>
						<div class="modal fade" id="tutor_reg">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						
						  <h4 style="width:650px; margin-bottom:10px;">Edit Your Profile</h4>
						<button type="button" class="close" data-dismiss="modal" style="width:50px;"> &times </button>
					</div>
					
				
					
					<div class="modal-body" style="margin:20px;">
					
						
												
						<form align="right" action="" method="post" id="tutor_login.php" enctype="multipart/form-data">
			
					
						<div class="row" >
							<strong> First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="name" name="fname" class="form-control" required="required" maxlength="24" style="width:450px; margin-bottom:10px;"/>  </br> 
						</div>
						<div class="row" >
							<strong> Last Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="name" name="lname" class="form-control" required="required" maxlength="24" style="width:450px; margin-bottom:10px;"/>  </br> 
						</div>
						<div class="row" >
							<strong> E-mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="email" name="email" class="form-control" required="required" maxlength="24" style="width:450px; margin-bottom:10px;"/>  </br> 
						</div>
						<div class="row" >
							<strong> Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="password" name="pass" class="form-control" required="required" maxlength="24" style="width:450px; margin-bottom:10px;"/>  </br> 
						</div>
						<div class="row" >
							<strong> Qualification &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="text" name="quli" class="form-control"  maxlength="44" style="width:450px; margin-bottom:10px;"/>  </br> </br>
						</div>
						</br>
						
						<input type="submit"  name="signup" class="btn btn-outline-primary"  style="width:; margin-bottom:10px;" value="Submit">
						</form>
						
			

					</div>	
				</div>
				<?php 
					if(isset($_POST['signup'])){
						$fname = mysqli_real_escape_string($con,$_POST['fname']);
						$lname = mysqli_real_escape_string($con,$_POST['lname']);
						$email = mysqli_real_escape_string($con,$_POST['email']);
						$pass = mysqli_real_escape_string($con,$_POST['pass']);
						$quli = mysqli_real_escape_string($con,$_POST['quli']);
						// $u_gender = $_POST['u_gender'];
					//	$u_image = $_FILES['u_image']['name'];
					//	$img_tmp = $_FILES['u_image']['tmp_name'];
						
					//	move_uploaded_file($img_tmp,"user/user_images/$u_image");
						// f_name='$fname',l_name='$lname',email='$email',password='$pass',qualification='$quli' WHERE id='$tutor_id' 
							$get_email = "SELECT * FROM tutors WHERE email='$email'";
							$run_email = mysqli_query($con,$get_email);
							$check = mysqli_num_rows($run_email);
							
							if($check==1){
								
								echo "<script>alert('This E-Mail Already Registered. Please Try With Another!')</script>";
								echo "<script>window.open('index.php','_self')</script>";
								exit();
							}
							else
							{
								
								$insert = "INSERT INTO tutors (f_name, l_name, email, password, qualification, register_date) VALUES ('$fname', '$lname', '$email', '$pass', '$quli', NOW())";
								$run_insert = mysqli_query($con,$insert);
								
								if($run_insert){
									$_SESSION['email']=$email;
									echo "<script>window.open('index.php','_self')</script>";
									exit();
								}
							}
						}
					
				
				
				?>
			</div>
			</div>
				
				
				<?php 
					if(isset($_POST['login'])){
						$email = mysqli_real_escape_string($con,$_POST['email']);
						$pass = mysqli_real_escape_string($con,$_POST['pass']);
						
						$get_admin = "SELECT * FROM tutors WHERE email='$email' AND password='$pass'";
						
						$run_admin = mysqli_query ($con,$get_admin);
						
						$check_admin = mysqli_num_rows($run_admin);
						
						if($check_admin == 1){
				
							$_SESSION['email']=$email;
							
							echo "<script>window.open('index.php','_self')</script>";
						}
						else{
							echo "<script>alert('Password or E-mail is not Correct !')</script>";
						}
						
					}
					
				?>
				
				
				</div>
			
			</div></div>
			
        
    </body>
</html>