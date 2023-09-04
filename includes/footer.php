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
              <li><a href="#"><?php echo $category['name']; ?></a></li>
            <?php endforeach ?>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="blog-footer">
      <p>PHPLoversBlog &copy; 2014</p>
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