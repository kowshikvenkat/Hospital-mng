<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index2.php?loginId=$id");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
			$id = $row['id'];
		echo "<script>alert('$id');</script>";
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
			
		$_SESSION['username'] = $row['username'];
	
		header("Location: index2.php?loginId=$id");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link rel="stylesheet" href="styles.css">
	<link rel = "icon" href="hosp_logo.png" type = "image/x-icon">
	<title>HOSPITAL LOGIN</title>
</head>
<body>
<video src="login.mp4" muted loop autoplay></video>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>

<style>
	video{
		position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.8;
	z-index:1;
	}
	.container{
		z-index:2;
	}
</style>
</body>
</html>