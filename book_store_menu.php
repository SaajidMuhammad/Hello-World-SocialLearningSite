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
					<div>
						
					</div>
					<div id="quiz_timeline" >
						<div id="quiz_head">
						
						
					
					<div style="margin-left:0px;">
									<center><h1 style="margin:30px; border-bottom:1px solid black;">E-Books</h1></center>
					 <?php  echo getbooks();?>
						
						 
							<!--<div id="select" class="tab-pane fade">
							  <select class="form-control" id="">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							  </select>
							</div>-->
						<div class="modal" id="quiz_mod">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Test Your Programming Knowledge</h4>
								
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
									
								<form action="qus_show.php" method="post">
									<select class="form-control" id="" style="" name="categery">
										<option>Select a Catagery</option>
										<?php quizCategary(); ?>
									</select>
								
							  </div>

							  <!-- Modal footer -->
							  <div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
								<input type="submit" class="btn btn-primary" value="Start Test">
								
							  </div>
								</form>
							</div>
						  </div>
						</div>
						 

						
					</div>
				</div>
			</div>
			
			</div>
			
			
			</div>
			
			
			</div>
			<div id="footer">
			<div class="col-md-12 text-center">
				<p>&copy; TheHelloWorld.com</p>
			</div>
			</div>
					
				
		<!-- Container Ends-->
			
			
	</body>
	
</html>

<?php } ?>