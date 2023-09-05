<?php include 'includes/header.php'; ?>
<?php 
  $db = new Database();
  $query = "select * from categories";
  $categories = $db->select($query);
?>
<?php 
if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['body'])) {
        header("Location:add_post.php?error=Please+fill+title+and+body");
        die("Please fill out title and body");
    }
$post_title = $_POST['title'];
$post_body = $_POST['body'];
$post_cat = $_POST['category'];
$post_author = $_POST['author'];
$post_tags = $_POST['tags'];
$db = new Database();
$query = "select * from categories where name = '$post_cat'";
$new_post_cat = $db->select($query);
$row = $new_post_cat->fetch_assoc();
$new_post_cat = $row['id'];
$query = "INSERT INTO posts (category, title, body, author, tags) VALUES ('$new_post_cat', '$post_title', '$post_body', '$post_author', '$post_tags')";
$insert_row = $mysqli->query($query) or die;
if ($insert_row) {
    echo '<p class="post-added" style="color:#0cc50c;background: #555050;padding: 5px;display: inline;font-size: 26px;">Post added</p>';
}
}
?>
<?php
if (isset($_GET['error'])) {
echo "<p class='text-danger'>" . htmlentities($_GET['error']) . "</p>"; }?>

<form role="form" method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
		<?php while($row = $categories->fetch_assoc()) : ?>
		<option><?php echo $row['name'];?></option>
  <?php endwhile ?>
	</select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>
  <div>
	<input name="submit" type="submit" class="btn btn-default" value="Submit" />
	<a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>