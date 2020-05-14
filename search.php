<?php include 'inc/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/formeting.php'; ?>
<?php
	$db = new Database();
	$fm = new format();
?>
<?php
	if (!isset($_GET['search']) || $_GET['search'] == NULL ) {
		header("location:404.php");
	} else{
		$search = $_GET['search'];
	}
?>


<div class="contentsection contemplete clear">
<div class="maincontent clear">
<?php
	$query = "SELECT * FROM tbl_post where title LIKE '%$search%' OR body LIKE '%$search%' ";
	$post = $db->select($query);
	if ($post) {
		while ($result = $post->fetch_assoc()) {
?>

<div class="samepost clear">
	<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
	<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
	 <a href="#"><img src="admin/upload/<?php echo $result['image']; ?>" alt="post image"/></a>
	<?php echo $fm->textShorten($result['body']); ?>
	<div class="readmore clear">
		<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
	</div>
</div>

<?php } } else{?> 
	<p>Our Result Not Founded <span style="font-weight:bold;color:Red;font-size: 22px" ><?php echo $search; ?></span> </p>
	<?php }?>

</div>
<?php include'inc/sidebar.php'; ?>
</div>

<?php include 'inc/footer.php'; ?>