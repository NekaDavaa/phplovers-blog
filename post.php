<?php include 'includes/header.php'; ?>

<?php
  //Get current post id
  $id = $_GET['id'] ?? null; 
  //Check for words or empty query
if(!isset($id) || !is_numeric($id)) {
    die("You cannot have word or empty query.");
}
  $db = new Database();
  //Query 
  $query = "SELECT * FROM POSTS where id = $id"; 
  //Run query
  $posts = $db->select($query);
  //Check for no posts
  if(!$posts || $posts->num_rows == 0) {
    die("Post not found.");
}
$posts = mysqli_fetch_assoc($posts);
?>



<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $posts['title'];?></h2>
            <p class="blog-post-meta"><?php echo FormatDate($posts['date']);?> by <a href="#"><?php echo $posts['author'];?></a></p>
				<?php echo "<p>". $posts['body'] ."</p>"; ?>
          </div><!-- /.blog-post -->		      
<?php include 'includes/footer.php'; ?>