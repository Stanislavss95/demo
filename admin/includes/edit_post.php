
<?php

if(isset($_GET['p_id'])) {

        $the_post_id = $_GET['p_id'];

}

        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $select_posts_by_id = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];

        
        }
        

        
		if(isset($_POST['update_post'])) {
			echo "Hi";
		}



?>



<form action="" method="post" enctype="multipart/form-data">
	

	<div class="form-group">
		<label for="author">Post Author</label>
		<input value="<?php echo $post_author;?>" type="text" class="form-control" name="author">
	</div>	
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input value="<?php echo $post_title;?>" type="text" class="form-control" name="title">
	</div>
    <div class="form-group">
		<select name="" id="">
		<?php

			$query = "SELECT * FROM categories";
			$select_categories = mysqli_query($connection, $query);
			
			confirmQuery($select_categories);

			while($row = mysqli_fetch_assoc($select_categories)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];
			
				echo "<option value=''>{$cat_title}</option>";
			}
		?>
		
		</select>
		
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
		<select value="<?php echo $post_status;?>" name="post_status">
			<option value="Draft">Draft</option>
			<option value="Published">Publish</option>
		</select>
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags;?>" type="text" class="form-control" name="post_tags">
	</div>
	<div class="form-group">
		<img width="100" src="../images/<?php echo $post_image; ?>" alt=""?>
	</div>

	</div>		<!-- /.col-md-4 ---------------------------------------- -->
	<div class="col-md-8">


	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        
        
        </textarea>
	</div>

	</div>		<!-- /.col-md-8 -->
	</div>		<!-- /.row --------------------------------------------- -->


	<button type="submit" name="update_post" class="btn btn-success add-del-btn">
		<i class="fa fa-plus"></i> Update</button>
	<a href="posts.php" class="btn btn-primary">
			<i class="fa fa-eye"></i> View All Posts</a>

</form> 

