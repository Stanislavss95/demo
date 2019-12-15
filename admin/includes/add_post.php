<?php

if(isset($_POST['create_post'])) {

       
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
		$post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        
		
		$post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
    
        $query = "INSERT INTO posts (post_category_id, post_title, post_author,
        post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";

        $query .= "VALUES({$post_category_id},
        '{$post_title}',
        '{$post_author}',
         now(),
          '{$post_image}',
          '{$post_content}',
          '{$post_tags}',
        '{$post_comment_count}',
        '{$post_status}')";

        $create_post_query = mysqli_query($connection, $query);

        confirmQuery( $create_post_query);
}


?>



<form action="" method="post" enctype="multipart/form-data">
	<!-- hidden input field to hold post_author -->
	<input type="hidden" name="author" value="">

	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="author">
	</div>	
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>
    <div class="form-group">
		<label for="post_title">Post Category Id</label>
		<input type="text" class="form-control" name="post_category_id">
	</div>


	<div class="row">	<!-- ------------------------------------------- -->
	<div class="col-md-4">	


	<!-- <div class="form-group">
		<label for="post_category_id">Post Category</label>
			<select name="post_category_id">
			
		</select>			
	</div> -->
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="post_status">
			<option value="Draft">Draft</option>
			<option value="Published">Publish</option>
		</select>
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" accept="image/*" name="image">
	</div>

	</div>		<!-- /.col-md-4 ---------------------------------------- -->
	<div class="col-md-8">


	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>

	</div>		<!-- /.col-md-8 -->
	</div>		<!-- /.row --------------------------------------------- -->


	<button type="submit" name="create_post" class="btn btn-success add-del-btn">
		<i class="fa fa-plus"></i> Add Post</button>
	<a href="posts.php" class="btn btn-primary">
			<i class="fa fa-eye"></i> View All Posts</a>

</form> 