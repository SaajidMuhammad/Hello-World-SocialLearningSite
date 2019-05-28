<table class="table-hover table-dark table-bordered  table-striped" align="center" width="1032px;" border="2">
		<tr>
			<th style="width:80px;">Index</th>
			<th style="width:160px;">Name</th>
			
			<th>Country</th>
			<th>Gender</th>
			<th>Image</th>
			<th>Spam Reports</th>
			<th>Delete</th>
			
		</tr>
		<?php
			include("includes/connection.php");
			$sel_user = "SELECT * FROM users ORDER BY 1 ASC";
			$run_user = mysqli_query($con,$sel_user);
			$i=0;
			
			while($row_users = mysqli_fetch_array($run_user)){
				
				$user_id = $row_users['u_id'];
				$user_name = $row_users['u_name'];
				$user_lname = $row_users['u_lname'];
				$user_country = $row_users['u_country'];
				$user_gender = $row_users['u_gender'];
				$user_image = $row_users['u_image'];
				$user_reg_date = $row_users['register_date'];
				$i++;
		?>
		
		<tr>
			<td style="padding-left:27px;"><?php echo "00$i" ; ?></td>
			<td><?php echo $user_name; ?> <?php echo $user_lname; ?></td>
			<td style="padding-left:30px;"><?php echo $user_country; ?></td>
			<td style="padding-left:40px;"><?php echo $user_gender; ?></td>
			<td style="padding-left:30px;"> <img src="../user/user_images/<?php echo $user_image; ?>" style="width:50px; height:50px; margin:2px; object-fit: cover; border-radius:4px; border: solid gray 1px;"/></td>
			<td style="padding-left:40px;">None</td>
			<td><button class="btn btn-outline-light btn-sm"  style="width:80px; font-weight:bold;" data-target='#confirm_modal1' data-toggle='modal'>Delete</button></td>
		</tr>
			<?php } ?>
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
					 Are you Sure You want delete this User? </br></br></br>
						<a href="delete_user.php?delete=<?php echo $user_id;?>"> <button style="float:right; margin-left:10px; width:120px;" class="btn btn-danger">Delete</button></a>
						<button style="float:right; width:120px;" class="btn btn-light" data-dismiss="modal">Cancel</button> 
						

					</div>	
					
					

				</div>
			</div>
			</div>

	


