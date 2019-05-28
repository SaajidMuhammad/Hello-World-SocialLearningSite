

<?php 
	session_start();
	include("includes/connection.php");
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Hello World - Admin Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="style/admin_style.css" media="all"/>
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
				<form id="login" method="post" action="admin_login.php">
				
					 <h2 style="text-align:center;">Admin Login</h2></br>

					<div class="form-group">


						<input type="email" class="form-control" name="email" placeholder="Username">

					</div>

					<div class="form-group">

						<input type="password" class="form-control" name="pass" placeholder="Password"></br>

					</div>
				
					<button type="submit" class="btn btn-warning" name="admin_login">Login</button>

				</form>
				
				<?php 
					if(isset($_POST['admin_login'])){
						$admin_email = mysqli_real_escape_string($con,$_POST['email']);
						$pass = mysqli_real_escape_string($con,$_POST['pass']);
						
						$get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_pass='$pass'";
						
						$run_admin = mysqli_query ($con,$get_admin);
						
						$check_admin = mysqli_num_rows($run_admin);
						
						if($check_admin == 1){
				
							$_SESSION['admin_email']=$admin_email;
							
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