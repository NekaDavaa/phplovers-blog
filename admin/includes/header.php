<?php include '../config/config.php'; ?>
<?php include '../libraries/Database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body>

   <?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">Dashboard</a>
            <a class="blog-nav-item <?php echo ($current_page == 'add_post.php') ? 'active' : ''; ?>" href="add_post.php">Add Post</a>
            <a class="blog-nav-item <?php echo ($current_page == 'add_category.php') ? 'active' : ''; ?>" href="add_category.php">Add Category</a>
            <a class="blog-nav-item pull-right" href="/phplovers-blog">Visit Blog</a>
        </nav>
    </div>
</div>


    <div class="container">

      <div class="blog-header">
		<h2>Admin Area</h2>
      </div>
      <div class="row">
        <div class="col-sm-12 blog-main">