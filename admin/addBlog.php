<?php
include 'config.php';

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog_title = $_POST['blog_title'];
    $blog_content = $_POST['blog_content'];
    $blog_describe = $_POST['blog_describe'];
    $blog_author = $_POST['blog_author'];

    // Xử lý file ảnh
    $target_dir = "/xampp/htdocs/OSS-Web-MobileShop/assets/blog/";
    $target_file = $target_dir . basename($_FILES["blog_image"]["name"]);
    $blog_image = './assets/blog/' . basename($_FILES["blog_image"]["name"]);

    if (move_uploaded_file($_FILES["blog_image"]["tmp_name"], $target_file)) {
        $blog_register = date('Y-m-d H:i:s');
        $sql = "INSERT INTO blog (blog_title, blog_content, blog_describe, blog_image, blog_register, blog_author) 
                VALUES ('$blog_title', '$blog_content', '$blog_describe', '$blog_image', '$blog_register', '$blog_author')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm dữ liệu thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Lỗi khi tải ảnh lên.";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản trị viên - Chi tiết sản phẩm</title>
  <link rel="icon" href="../admin/login/logo1.png">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="javascript:window.history.back(-1);">Quay lại ◀️</a>
    <!-- Toggler/collapsibe Button -->
  </nav>
  <div class="row ml-3">
    <div class="col-lg-12 mt-3">
        <form action="addBlog.php" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header"><strong>Tạo trang blog</strong></div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="title" class="form-control-label">Tiêu đề:</label>
                        <input type="text" name="blog_title" id="title" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="vcontent" class="form-control-label">Nội dung:</label>
                        <input type="text" name="blog_content" id="vcontent" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="vdescribe" class="form-control-label">Miêu tả:</label>
                        <input type="text" name="blog_describe" id="vdescribe" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="blog_register" class="form-control-label">Ngày đăng ký:</label>
                        <input type="date" name="blog_register" id="blog_register" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-control-label">Hình ảnh:</label>
                        <input type="file" name="blog_image" id="blog_image" required><br><br>
                    </div>
                    <div class="form-group">
                        <label for="blog_author" class="form-control-label">Tác giả:</label>
                        <input type="text" name="blog_author" id="blog_author" class="form-control" >
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="blog.php" role="button">Hủy</a>
                    <button class="btn btn-info" type="submit">Thêm</button>
                </div>
            </div>
            
        </form>
    </div>
</div>
</body>

</html>