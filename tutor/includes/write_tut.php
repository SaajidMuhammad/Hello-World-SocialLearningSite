<div id="tut_box" style="margin-left:50px; margin-right:30px;">
	
	<form action="" method="post" id="" >
		<h2 style="margin-top:10px;font-size:22px;"> Write a New tutorial </h2>
		<div class="row" style="margin-left:1px;">
		<input type="type" name="title" placeholder="Write a Title...." required="required" maxlength="40" class="form-control" style="width:950px;margin-bottom:10px;" />
		
		
		</br></div>

		<!--  <input type="type" name="Description" placeholder="Write a Discription" size="66"/></br> -->

		<textarea name="content" placeholder="Descripe Here..." class="tinymce" style="width:950px; height:380px;"></textarea>

		<button name="sub" class="btn btn-dark" style=" width:140px; font-weight:bold; margin-top:5px;">  Post </button>
		<!--  <input type="submit" name="sub" value="Post to Timeline"/>  -->
	</form>
</div>
		
<?php 


			if(isset($_POST['sub'])){
				// global $con;
				// global $user_id;
				$title = addslashes($_POST['title']);
				$content = $_POST['content'];
	
			
				$insert = "INSERT INTO tutorials (tutor_id,t_title,t_tutorial,t_time,is_hidden) VALUES ('$tutor_id','$title','$content',NOW(),0)";
				
				$run = mysqli_query($con,$insert);
				
				if($run){
					echo "<script>window.open('index.php?view_tut','_self')</script>";
					
				}
			}
			



?>
	