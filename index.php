<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'helpers/format_helper.php'; ?>

<?php
	//Create DB Object
	$db = new Database();
  //Query 
  $query = "SELECT * FROM POSTS"; 
  //Run query
  $posts = $db->select($query);

?>

<?php while ($row = mysqli_fetch_assoc($posts)) : ?>
<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo FormatDate($row['date']) ;?> by <a href="#"><?php echo $row['author']; ?></a></p>
				<p><?php echo FormatText($row['body']);?></p>
           <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']);?>">Read More</a>
          </div><!-- /.blog-post -->
          <?php endwhile ?>
		  
<?php include 'includes/footer.php'; ?>
