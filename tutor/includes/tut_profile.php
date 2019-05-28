<div id="tut_pro">
	<div style="float:left;">
	<h5>Full Name : <?php echo $tutor_fname; ?> <?php echo $tutor_lname;?></h5>
	<h5>Qualification : <?php echo $qualification; ?> </h5>
	<h5>Tutor Since : <?php echo $register_date; ?></h5>
	</br>
	<button data-target='#edit_modal' data-toggle='modal' class='btn btn-link'>Edit Profile</button>
	</div>
	<img style="height:100px;width:100px; float:right;">
	
	<div class="modal fade" id="edit_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						
						  <h4>Edit Your Profile</h4>
						<button type="button" class="close" data-dismiss="modal"> &times </button>
					</div>
					
				
					
					<div class="modal-body" style="margin:20px;">
					
						
												
						<form align="right" action="tut_profile.php" method="post" id="tut_update" enctype="multipart/form-data">
			
					
						<div class="row" >
							<strong> First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="name" name="fname" class="form-control" required="required" maxlength="24" value = "<?php echo $tutor_fname ?>"/>  </br> 
						</div>
						<div class="row" >
							<strong> Last Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="name" name="lname" class="form-control" required="required" maxlength="24" value = "<?php echo $tutor_lname ?>"/>  </br> 
						</div>
						<div class="row" >
							<strong> E-mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="email" name="email" class="form-control" required="required" maxlength="24" value = "<?php echo $tutor_email ?>"/>  </br> 
						</div>
						<div class="row" >
							<strong> Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="password" name="pass" class="form-control" required="required" maxlength="24" value = "<?php echo $tutor_password ?>"/>  </br> 
						</div>
						<div class="row" >
							<strong> Qualification &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
							<input type="text" name="quli" class="form-control"  maxlength="44" value = "<?php echo $qualification ?>"/>  </br> </br>
						</div>
						</br>
						<button name="update" class="btn btn-outline-primary btn-block">  Update </button> 
						</form>
						
			

					</div>	
				</div>
				<?php 
					if(isset($_POST['update'])){
						$fname = $_POST['fname'];
						$lname = $_POST['lname'];
						$email = $_POST['email'];
						$pass = $_POST['pass'];
						$quli = $_POST['quli'];
						// $u_gender = $_POST['u_gender'];
					//	$u_image = $_FILES['u_image']['name'];
					//	$img_tmp = $_FILES['u_image']['tmp_name'];
						
					//	move_uploaded_file($img_tmp,"user/user_images/$u_image");
						
						$update = "UPDATE tutors SET f_name='$fname',l_name='$lname',email='$email',password='$pass',qualification='$quli' WHERE id='$tutor_id' ";
						$run = mysqli_query($con,$update);
						
						if($run){
							
							echo "<script>window.open('index.php?tut_profile','_self')</script>";
						}
					}
				
				
				?>
			</div>
			</div>
	
</div>