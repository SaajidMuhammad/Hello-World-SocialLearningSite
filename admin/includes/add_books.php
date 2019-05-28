<div id="add_books">
	<form action="" method="post" enctype="multipart/form-data">
		<h3 style="border-bottom:solid 1px black;">Add New Book</h3>
	
		Book Name : 
		<input type="name" class="form-control" placeholder="Book Name" required="requird" name="book_name">
		
		Book Author : 
		<input type="name" class="form-control" placeholder="Book Author" required="requird" name="book_aut">
		
		Book Cover : 
		<input type="file" class="form-control" placeholder="Book Name" required="requird" name="book_cover">
		
		Upload the Book : 
		<input type="file" class="form-control" placeholder="Book Name" required="requird" name="book">
		
		<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="width:140px; float:right; margin-bottom:30px;">
	</form>
	
	<?php 


			if(isset($_POST['submit'])){
				// global $con;
				// global $user_id;
				$book_name = $_POST['book_name'];
				$book_aut = $_POST['book_aut'];
				// $book_cover = $_POST['book_cover'];
				// $book = $_POST['book'];
				
				$book_cover = $_FILES["book_cover"]["name"];
				$book_cover_tmp = $_FILES["book_cover"]["tmp_name"];
				$filepath ="books_img/".$book_cover;
				
				move_uploaded_file($book_cover_tmp,$filepath);
				
				$book = $_FILES["book"]["name"];
				$book_tmp = $_FILES["book"]["tmp_name"];
				$filepath ="books/".$book;
				
				move_uploaded_file($book_tmp,$filepath);
	
			
				$insert = "INSERT INTO book (book_name,book_author,book_cover,book_file) VALUES ('$book_name','$book_aut','$book_cover','$book')";
				
				$run = mysqli_query($con,$insert);
				
				if($run){
				
				
					
				}
			}
			



?>

</div>