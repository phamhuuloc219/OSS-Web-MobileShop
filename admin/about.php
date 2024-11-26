  
<?php
  include 'action.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản trị viên</title>
  <link rel="icon" href="../admin/login/logo1.png">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
  <!-- font awesome icons -->
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php">Quản lý người dùng</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="product.php">Sản phẩm</a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="cart.php">Giỏ hàng</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="about.php">Thông tin</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
      </ul>
    </div>
    
  <!--admin logout and account-->
  <div class="font-roboto font-size-14">
            <a href="#" class="px-3 text-light dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo $_SESSION['adminname']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="login/logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
            </div>
          </div>
  </nav>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3 class="text-center text-info mt-2">Thông tin</h3>
        <h1 align="center">Hi 👋, I'm Pham Huu Loc</h1>
<h3 align="left">Connect with me:</h3>
<p align="left">
<a href="https://x.com/phloc2192003" target="blank"><img align="center" src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/twitter.svg" alt="https://x.com/phloc2192003" height="30" width="40" /></a>
<a href="https://facebook.com/phloc2193" target="blank"><img align="center" src="https://raw.githubusercontent.com/rahuldkjain/github-profile-readme-generator/master/src/images/icons/Social/facebook.svg" alt="facebook.com/phloc2193" height="30" width="40" /></a>
</p>
<br>
<p> 
  <h1>
  Bài tập nhóm môn Phát triển phần mềm mã nguồn mở: Website Mobile Shop</h1>
  <br>
  <h2>Thành viên trong nhóm:</h2>

<ol>
    <li>
        <a href="https://github.com/phamhuuloc219" target="blank">Phạm Hữu Lộc</a>
    </li>
    <li>
        <a href="https://github.com/thanhthao29032003" target="blank">Nguyễn Thị Thanh Thảo</a>
    </li>
    <li>
        <a href="https://github.com/Enzella" target="blank">Lê Tuấn Anh</a>
    </li>
</ol> 

<br>

</p>
      </div>
    </div>
    
  </div>
</body>

</html>