<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'includes/header.php'; ?>
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
            <p class="blog-post-meta"><?php echo $row['date'];?> <a href="#"><?php echo $row['author']; ?></a></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium commodo felis vel ultrices. Etiam id dui eros. Praesent nunc dui, volutpat at eleifend nec, suscipit a sapien. Morbi leo urna, aliquam a purus eget, tempus cursus nisl. In hac habitasse platea dictumst. Aliquam pulvinar at lorem vel vulputate. Nunc tempus enim neque. Fusce justo nibh, volutpat eget auctor et, malesuada quis odio. Suspendisse convallis consequat lectus, ullamcorper consequat mauris luctus in. Suspendisse accumsan lorem varius tincidunt tristique. Ut nulla libero, feugiat vitae dui ac, dictum adipiscing libero. Sed sit amet augue mi. Nullam luctus ligula ultricies erat volutpat scelerisque. Etiam molestie sodales aliquam. Donec nisl odio, fringilla quis nibh quis, pulvinar ornare nibh. Integer lorem ligula, scelerisque ut felis et, pretium ultricies arcu.</p>
           <a class="readmore" href="post.php?id=1">Read More</a>
          </div><!-- /.blog-post -->
          <?php endwhile ?>
		  
<?php include 'includes/footer.php'; ?>
