<?php include 'inc/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/formeting.php'; ?>
<?php
	$db = new Database();
	$fm = new format();
?>
<?php
	if (!isset($_GET['id']) || $_GET['id'] == NULL ) {
		header("location:404.php");
	} else{
		$id = $_GET['id'];
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php
				$query = "SELECT * FROM tbl_post where id=$id";
				$post = $db->select($query);
				if ($post) {
					while ($result = $post->fetch_assoc()) {
			?>

				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?></h4>
				<img src="admin/<?php echo $result['image']; ?>" alt="MyImage"/>
				<?php echo $result['body']; ?>
				
					

				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 
						$catid = $result['cat'];
						$queryrelated = "SELECT * FROM tbl_post where cat='$catid' limit 6";
						$relatedpost = $db->select($queryrelated);
						if ($relatedpost) {
							while ($rresult = $relatedpost->fetch_assoc()) {
					?>
					<a href="post.php?id=<?php echo $rresult['id']; ?>"><img src="admin/<?php echo $rresult['image']; ?>" alt="post image"/></a>
					<?php }}else { echo "No Related Post Available"; } ?>
				</div>
				<?php }} else{ header("location:404.php");}?>
	</div>

		</div>
		<?php include'inc/sidebar.php'; ?>	</div>

	<?php include'inc/footer.php'; ?>