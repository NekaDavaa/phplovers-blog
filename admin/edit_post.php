<?php include 'includes/header.php'; ?>


<?php 
$current_post = $_GET['id'];
$db = new Database();
$query = "select * from posts where id = $current_post";
$posts = $db->select($query);
$posts = mysqli_fetch_assoc($posts);
?>


<form role="form" method="post" action="edit_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $posts['title'];?>" />
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"><?php echo $posts['body'];?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
		<option>News</option>
		<option>Events</option>
	</select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?php echo $posts['author'];?>"/>
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $posts['tags'];?>" />
  </div>
  <div>
	<input name="submit" type="submit" class="btn btn-default" value="Submit" />
	<a href="index.php" class="btn btn-default">Cancel</a>
	<input name="delete" type="submit" class="btn btn-danger" value="Delete" />
	
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>