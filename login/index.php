<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: ../index.php");
	} else {
		echo "<script>alert('Rất tiếc! Email hoặc mật khẩu sai.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../assets/logo1.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Đăng nhập - Mobile Shop</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Đăng nhập</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Mật khẩu" id="password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div>
				<input type="checkbox" id="showPasswordToggle" onclick="togglePasswordVisibility()"> 
				<label for="showPasswordToggle">Hiện mật khẩu</label>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Đăng nhập</button>
			</div>
			<p class="login-register-text">Bạn chưa có tài khoản? <a href="register.php">Đăng ký ở đây</a>.</p>
		</form>
	</div>

	<script>
		function togglePasswordVisibility() {
			const password = document.getElementById("password");
			password.type = password.type === "password" ? "text" : "password";
		}
	</script>
</body>
</html>
