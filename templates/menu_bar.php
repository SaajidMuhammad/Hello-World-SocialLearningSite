<div id="head_wrap" class="bg-warning" style="box-shadow: box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
					<link rel="icon" href="images/minilogo.jpg"/>
					<div id="header" class="bg-warning" >
					<a href="home.php">
					
					</a>
						<ul id="menu" >
						
							<li><a href="home.php" title="Home"  class="btn btn-warning btn-sm" role="button"  style="font-weight:bold; font-size:18px; color:black;"><i class="fas fa-home"></i></a></li>
							<li><a href="members.php" title="Memebers"  class="btn btn-warning btn-sm" role="button" style="margin-right:10px;font-weight:bold; font-size:18px;color:black;"><i class="fas fa-users"></i></a></li>
							
							
							<?php

								$get_topics = "SELECT * FROM topic";
								$run_topics = mysqli_query($con,$get_topics);

								while($row=mysqli_fetch_array($run_topics)){

									$topic_id=$row['topic_id'];
									$topic_title=$row['topic_title'];

								echo "<li><a href='topic.php?topic=$topic_id' class='btn btn-warning btn-sm' role='button'  style='font-weight:bold; width:150px;color:black;'>$topic_title</a></li>";

								}


							?>
						</ul>

						<form method="get" action="result.php" id="form1">
							<div class="input-group mb-3" style="padding-top:5px;">
							<input type="text" name="user_query" placeholder="Search Posts...." class="form-control" style="width:; margin-left:18px" maxlength="24" required="required"/>
							<div class="input-group-append"><button name="search" class="btn btn-dark"> <i class="fas fa-search"></i> </button></div></div>
							<!-- <input type="submit" name="search" value="Search"/> -->
						</form>
					</div>
				</div>