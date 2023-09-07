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
  $post = $db->select($query);
  //Check for no posts
  if(!$post || $post->num_rows == 0) {
    die("Post not found.");
}
$post = mysqli_fetch_assoc($post);
?>
<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title'];?></h2>
            <p class="blog-post-meta"><?php echo FormatDate($post['date']);?> by <a href="author.php"><?php echo $post['author'];?></a></p>
				<?php echo "<p>". $post['body'] ."</p>"; ?>
          </div><!-- /.blog-post -->		      
<?php include 'includes/footer.php'; ?>