<?php include 'includes/header.php'; ?>

<?php
  //Create DB Object
  $db = new Database();

  if(isset($_GET['category'])) {
     $category = mysqli_real_escape_string($db->link, $_GET['category']); // Sanitize input
     $query = "SELECT * FROM POSTS WHERE category = '$category' ORDER BY date DESC"; 
     //Run query
     $posts = $db->select($query);
  } else {
    //All posts query 
    $query = "SELECT * FROM POSTS ORDER BY date DESC"; 
    //Run query
    $posts = $db->select($query);
  }
?>

<?php 
if ($posts && mysqli_num_rows($posts) > 0) {
    while ($row = mysqli_fetch_assoc($posts)) : ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo FormatDate($row['date']); ?> by <a href="author.php"><?php echo $row['author']; ?></a></p>
            <p><?php echo FormatText($row['body']); ?></p>
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
        </div><!-- /.blog-post -->
    <?php endwhile; 
} 
else {
    if (isset($category)) {
        echo "No posts in this category yet";
    } else {
        echo "No posts yet";
    }
}
?>

<?php include 'includes/footer.php'; ?>
