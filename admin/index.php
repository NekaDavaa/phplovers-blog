<?php include 'includes/header.php'; ?>
<table class="table table-striped">
	<tr>
		<th>Post ID#</th>
		<th>Post Title</th>
		<th>Category</th>
		<th>Author</th>
		<th>Date</th>
	</tr>
<?php 
//Change styles
$db = new Database();
$query = "select p.*, c.name from posts as p inner join categories as c on p.category = c.id order by date desc";
$posts = $db->select($query);
?>
 <?php while ($row = $posts->fetch_assoc()) : ?>
	<tr>
		<td><?php echo $row['id'];?></td>
		<td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['author'];?></td>
		<td><?php echo $row['date'];?></td>
	</tr>
    <?php endwhile; ?>
</table>
<?php 
$db = new Database();
$query = "select * from categories order by id desc";
$categories = $db->select($query);
?>
<table class="table table-striped">
	<tr>
		<th>Category ID#</th>
		<th>Category Name</th>
	</tr>
        <?php while ($row = $categories->fetch_assoc()) : ?>
    <tr>
		<td><?php echo $row['id'];?></td>
		<td><a href="edit_category.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
	</tr>
 	 <?php endwhile; ?>
</table>
<hr>
<h3>About the site</h3>
<?php 
if (isset($_POST['submit'])){

echo "submit";
}
?>
<form role="form" method="post" action="index.php">
<textarea style="width:100%;">asd</textarea>
<input name="submit" type="submit" class="btn btn-default" value="Change" />
</form>
<br />

<?php include 'includes/footer.php'; ?>	
	     