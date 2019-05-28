<table class="table-hover table-dark table-bordered  table-striped" align="center" width="1032px;" border="2">
		<tr>
			<th style="width:80px;">Post No</th>
			<th style="width:180px;">Title</th>
			<th>Author</th>
			<th  style="width:50px;">Date</th>
			<th>Spam Reports</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<?php
			include("includes/connection.php");
			$sel_posts = "SELECT * FROM posts ORDER BY 1 DESC";
			$run_posts = mysqli_query($con,$sel_posts);
			$i=0;
			
			while($row_posts = mysqli_fetch_array($run_posts)){
				
				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$post_title = $row_posts['post_title'];
				$post_date = $row_posts['post_date'];
				$visibilty = $row_posts['is_hidden'];
				
			
				$i++;
				
				$sel_user = "SELECT * FROM users WHERE u_id='$user_id'";
				$run_user = mysqli_query($con,$sel_user);
				
				while($row_users = mysqli_fetch_array($run_user)){
					
					$user_name = $row_users['u_name'];
					$user_lname = $row_users['u_lname'];
					
					// "hide_post.php?hide=<?php echo $user_id;"
				
		?>
		
		<tr>
			<td style="padding-left:27px;"><?php echo "00$i" ; ?></td>
			<td style="padding-left:30px;"><?php echo $post_title; ?></td>
			<td style="padding-left:10px;"><?php echo $user_name; ?> <?php echo $user_lname; ?></td>
			<td style="padding-left:20px;"><?php echo $post_date; ?></td>
			<td style="padding-left:40px;">None</td>
			<td style="padding-left:40px;"><?php if ($visibilty == 0){
					echo 'Visible';
				}
				else{
					echo 'Hidden';
				} ?></td>
			<td><button class="btn btn-outline-light btn-sm"  style="width:80px; font-weight:bold;" data-target='#confirm_modal1' data-toggle='modal'>Hide</button></td>
			
		</tr>
			<?php } } ?>
</table>

<?php



?>

	<div class="modal" id="confirm_modal1">
			<div class="modal-dialog">
				<div class="modal-content" ng-app="myApp" ng-controller="FormController">
					<div class="modal-header">
						
						  <strong>Confirm Delete</strong>
						
					</div>
					<div class="modal-body">
					 Are you Sure You want Hide this User? </br></br></br>
						<a href="hide_post.php?hide=<?php echo $post_id;?>"> <button style="float:right; margin-left:10px; width:120px;" class="btn btn-danger">Delete</button></a>
						<button style="float:right; width:120px;" class="btn btn-light" data-dismiss="modal">Cancel</button> 
						

					</div>	
					

				</div>
			</div>
			</div>

