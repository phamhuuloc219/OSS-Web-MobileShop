<?php
  include 'actionProduct.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản trị viên - Blog</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
  <!-- font awesome icons -->
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
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
  
      <div class="col-md-8">
        <?php
          $query = 'SELECT * FROM blog';
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
        ?>
        <h3 class="text-center text-info">Thông tin danh sách các sản phẩm</h3>
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
              <th>id</th>
              <th>Ảnh</th>
              <th>Tiêu đề</th>
              <th>Nội dung</th>
              <th>Miêu tả</th>
              <th>Ngày</th>
              <th>Tác giả</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['blog_id']; ?></td>
              <td><img src=".<?= $row['blog_image']; ?>" width="25"></td>
              <td><?= $row['blog_title']; ?></td>
              <td><?= $row['blog_content']; ?></td>
              <td><?= $row['blog_describe']; ?></td>
              <td><?= $row['blog_register']; ?></td>
              <td><?= $row['blog_author']; ?></td>

              <td>
                <a href="detailsBlog.php?details=<?= $row['blog_id']; ?>" class="badge badge-primary p-2">Chi tiết</a> |
                <a href="actionBlog.php?delete=<?= $row['blog_id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Xóa</a> |
                <a href="editBlog.php?id=<?= $row['blog_id']; ?>" class="badge badge-success p-2">Sửa</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: true
    });
  });
  </script>
</body>

</html>