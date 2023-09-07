<?php include 'includes/header.php'; ?>
<?php 
$current_cat = $_GET['id'];

$db = new Database();
$query = "select * from categories where id = $current_cat";
$cat = $db->select($query);
$cat = mysqli_fetch_assoc($cat);
?>

<?php 
if (isset($_POST['submit'])) {
$updated_name = $_POST['name'];
$query = "UPDATE categories SET name='$updated_name' WHERE id='$current_cat'";
$update_row = $mysqli->query($query) or die;
if ($update_row) {
    echo '<p class="post-added" style="color:#0cc50c;background: #555050;padding: 5px;display: inline;font-size: 26px;">Category name updated</p>'; }
}
?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $current_cat ?>">
  <div class="form-group">
    <label>Category Name</label>
         <?php
     $display_name = $cat['name'];  
if (isset($_POST['submit'])) {
    $updated_name = $_POST['name'];
    $display_name = $updated_name; 
}
?>
<input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $display_name ?>">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>
<?php include 'includes/footer.php'; ?>