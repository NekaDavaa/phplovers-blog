<?php include 'includes/header.php'; ?>
<?php 
$current_post = $_GET['id'];
$db = new Database();
$query = "select * from posts where id = $current_post";
$posts = $db->select($query);
$posts = mysqli_fetch_assoc($posts);
?>

<?php 
if (isset($_POST['submit'])) {

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
$query = "UPDATE posts SET category='$new_post_cat', title='$post_title', body='$post_body', author='$post_author', tags='$post_tags' WHERE id='$current_post'";
$update_row = $mysqli->query($query) or die;

}

?>



<?php   
if (isset($_POST['delete'])) {

$query = "delete from posts where id ='$current_post'";
$delete_row = $mysqli->query($query) or die;
if ($delete_row) {
    echo '<p class="post-added" style="color:#0cc50c;background: #555050;padding: 5px;display: inline;font-size: 26px;">Post deleted succesfully</p>'; 
    echo '<meta http-equiv="refresh" content="1;url=http://localhost/phplovers-blog/admin/index.php">'; }
}







?>





<form role="form" method="post" action="edit_post.php?id=<?php echo $current_post ?>">
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
  <?php 
      $current_cat = $posts['category'];     
      $db = new Database();
      $query = "select * from categories";
      $categories = $db->select($query);
      $selected = "";
       while($row = $categories->fetch_assoc()) : ?>
      <?php 
        if ($current_cat === $row['id']) {
             $selected = "selected";
        }
          else {
               $selected = "";
          }
      ?>
      <option <?php echo $selected; ?>><?php echo $row['name'];?></option>
       <?php endwhile ?>
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