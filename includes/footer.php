        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <?php echo $about_site; ?>
          </div>
          <div class="sidebar-module">
            
                 <?php 
                   $db = new Database();
                   $query = "select * from categories";
                   $categories = $db->select($query);
                 ?>
               
            <h4>Categories</h4>
            <ol class="list-unstyled caregory-styles">
              <?php foreach ($categories as $category) : ?>
              <li><a href="posts.php?category=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
            <?php endforeach ?>
                  <?php   if (basename($_SERVER['PHP_SELF']) == "posts.php") {
                      echo '<a href="posts.php">Reset filter</a>'; } ?>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="blog-footer">
      <p>PHPLoversBlog &copy; 2014</p>
      <a href="https://github.com/NekaDavaa/phplovers-blog" target="_blank">Click on the link to overview the project code...</a>
      <p>
        <a href="#">Back to top</a>
      </p>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>