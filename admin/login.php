<?php 
	include '../lib/session.php'; 
	Session::init();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/formeting.php'; ?>
<?php
	$db = new Database();
	$fm = new format();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $fm->validation($_POST['username']);
			$password = $fm->validation(md5($_POST['password']));

			$username = mysqli_real_escape_string($db->link, $username);
			$password = mysqli_real_escape_string($db->link, $password);

			$query = "SELECT * FROM tbl_user WHERE username = '$username' and password = '$password' ";
			$result = $db->select($query);
			if ($result != false){
				$value = mysqli_fetch_array($result);
				$row   = mysqli_num_rows($result);
				if ($row > 0) {
					Session::set("login", true);
					Session::set("username", $value['username']);
					Session::set("userId", $value['id']);
					header("location:index.php");
				} else{
					echo "<span style='color:red;font-size:18px;' >Username Or Password Can Not By Empty</span>";

				}
			} else{
				echo "<span style='color:red;font-size:18px;' >Username Or Password Not Mase</span>";
			}
		}
	?>

		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>