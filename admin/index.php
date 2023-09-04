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
$db = new Database();
$query = "select p.*, c.name from posts as p inner join categories as c on p.category = c.id";
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
$query = "select * from categories";
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
		<td><?php echo $row['name'];?></td>
	</tr>
 	 <?php endwhile; ?>
</table>
<?php include 'includes/footer.php'; ?>	
	     