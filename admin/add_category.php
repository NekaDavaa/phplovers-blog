<?php include 'includes/header.php'; ?>
<?php
if (isset($_POST['submit'])){
$entered_category = $_POST['cat-name'];
$query = "INSERT INTO categories (`name`) VALUES ('$entered_category')";
$insert_row = $mysqli->query($query) or die;
if ($insert_row) {
    echo '<p class="post-added" style="color:#0cc50c;background: #555050;padding: 5px;display: inline;font-size: 26px;">Category added</p>';
}
if (empty($_POST['cat-name'])) {
        header("Location:add_category.php?error=Please+fill+category+name");
    }
}
?>
<?php
if (isset($_GET['error'])) {
echo "<p class='text-danger'>" . htmlentities($_GET['error']) . "</p>"; }?>
<form role="form" method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="cat-name" type="text" class="form-control" placeholder="Enter Category">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>
<?php include 'includes/footer.php'; ?>