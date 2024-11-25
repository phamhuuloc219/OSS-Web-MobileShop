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
  <title>Quản trị viên - Sản phẩm</title>
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
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3 class="text-center text-dark mt-2">Quản lý sản phẩm</h3>
        <hr>
        <?php if (isset($_SESSION['response'])) { ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?= $_SESSION['response']; ?></b>
        </div>
        <?php } unset($_SESSION['response']); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <h3 class="text-center text-info">Thêm sản phẩm </h3>
        <form action="actionProduct.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <div class="form-group">
            <input type="text" name="brand" value="<?= $brand; ?>" class="form-control" placeholder="Nhập thương hiệu" required>
          </div>
          <div class="form-group">
            <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Nhập tên sản phẩm" required>
          </div>
          <div class="form-group">
            <input type="number" name="price" value="<?= $price; ?>" class="form-control" placeholder="Nhập giá" required>
          </div>
          <div class="form-group">
            <input type="hidden" name="oldimage" value="<?= $image; ?>">
            <input type="file" name="image" class="custom-file">
            <img src="<?= $image; ?>" width="120" class="img-thumbnail">
          </div>
          <div class="form-group">
            <input type="date" name="date" value="<?= $date; ?>" class="form-control" placeholder="Nhập ngày" required>
          </div>
          <div class="form-group">
            <?php if ($update == true) { ?>
            <input type="submit" name="update" class="btn btn-success btn-block" value="Cập nhật bản ghi">
            <?php } else { ?>
            <input type="submit" name="add" class="btn btn-primary btn-block" value="Thêm bản ghi">
            <?php } ?>
          </div>
        </form>
      </div>
      <div class="col-md-8">
        <?php
          $query = 'SELECT * FROM product';
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
              <th>Tên</th>
              <th>Hãng</th>
              <th>Giá</th>
              <th>Ngày</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?= $row['item_id']; ?></td>
              <td><img src=".<?= $row['item_image']; ?>" width="25"></td>
              <td><?= $row['item_name']; ?></td>
              <td><?= $row['item_brand']; ?></td>
              <td><?= $row['item_price']; ?></td>
              <td><?= $row['item_register']; ?></td>
              <td>
                <a href="detailsProduct.php?details=<?= $row['item_id']; ?>" class="badge badge-primary p-2">Chi tiết</a> |
                <a href="actionProduct.php?delete=<?= $row['item_id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Xóa</a> |
                <a href="product.php?edit=<?= $row['item_id']; ?>" class="badge badge-success p-2">Sửa</a>
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