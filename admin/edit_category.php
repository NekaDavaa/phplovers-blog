<?php include 'includes/header.php'; ?>
<?php 
$current_cat = $_GET['id'];
$db = new Database();
$query = "select * from categories where id = $current_cat";
$cat = $db->select($query);
$cat = mysqli_fetch_assoc($cat);
?>
<form role="form" method="post" action="edit_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $cat['name']?>">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>
<?php include 'includes/footer.php'; ?>