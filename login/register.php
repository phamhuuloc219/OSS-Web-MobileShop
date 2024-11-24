<?php 
include 'config.php';
error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    registerUser();
}

function registerUser() {
    global $conn;

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    if (!validateInput($username, $email, $password, $cpassword)) {
        return;
    }

    $hashedPassword = md5($password);

    if (emailExists($email)) {
        alert("Rất tiếc! Email đã tồn tại.");
        return;
    }

    if (insertUser($username, $email, $hashedPassword)) {
        echo "<script>
                alert('Wow! Đăng ký người dùng đã hoàn thành.');
                window.location.href = 'index.php';
              </script>";
        exit();
    } else {
        alert("Rất tiếc! Đã xảy ra sai sót gì đó.");
    }
}

function validateInput($username, $email, $password, $cpassword) {
    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        alert("Vui lòng điền vào tất cả các trường.");
        return false;
    }

    if ($password !== $cpassword) {
        alert("Mật khẩu không khớp.");
        return false;
    }

    if (!validatePassword($password)) {
        return false;
    }

    return true;
}

function validatePassword($password) {
    if (strlen($password) < 8 || strlen($password) > 12) {
        alert("Mật khẩu phải từ 8 đến 12 ký tự.");
        return false;
    }

    if (!preg_match('/[A-Z]/', $password)) {
        alert("Mật khẩu phải chứa ít nhất một chữ cái viết hoa.");
        return false;
    }

    if (!preg_match('/[a-z]/', $password)) {
        alert("Mật khẩu phải chứa ít nhất một chữ cái thường.");
        return false;
    }

    if (!preg_match('/[0-9]/', $password)) {
        alert("Mật khẩu phải chứa ít nhất một chữ số.");
        return false;
    }

    if (!preg_match('/[\W_]/', $password)) {
        alert("Mật khẩu phải chứa ít nhất một ký tự đặc biệt.");
        return false;
    }

    return true;
}

function emailExists($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    return $result->num_rows > 0;
}

function insertUser($username, $email, $hashedPassword) {
    global $conn;
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    return mysqli_query($conn, $sql);
}

function alert($msg) {
    echo "<script>alert('$msg')</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Đăng ký - Mobile Shop</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Đăng ký</p>
			<div class="input-group">
				<input type="text" placeholder="Họ tên" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Mật khẩu" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Xác nhận mật khẩu" id="cpassword" name="cpassword" value="<?php echo isset($_POST['cpassword']) ? htmlspecialchars($_POST['cpassword']) : ''; ?>" required>
			</div>
			<div>
				<input type="checkbox" id="showPasswordToggle" onclick="togglePasswordVisibility()"> 
				<label for="showPasswordToggle">Hiện mật khẩu</label>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Đăng ký</button>
			</div>
			<p class="login-register-text">Bạn đã có tài khoản? <a href="index.php">Đăng nhập ở đây</a>.</p>
		</form>
	</div>

	<script>
		function togglePasswordVisibility() {
			const password = document.getElementById("password");
			const cpassword = document.getElementById("cpassword");
			const type = password.type === "password" ? "text" : "password";
			password.type = type;
			cpassword.type = type;
		}
	</script>
</body>
</html>
