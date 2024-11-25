<?php
include 'config.php';

// Lấy thông tin từ form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $id = $_POST['vid'];
    $title = $_POST['vtitle'];
    $content = $_POST['vcontent'];
    $describe = $_POST['vdescribe'];
    $register = $_POST['vregister'];
    $author = $_POST['vauthor'];
    $oldImage = $_POST['oldimage'];

    // Xử lý hình ảnh mới nếu có tải lên
    if ($_FILES['image']['name']) {
        $imageName = time() . '_' . $_FILES['image']['name'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . $imageName;

        // Kiểm tra và di chuyển file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $image = $targetFile;

            // Xóa hình ảnh cũ nếu tồn tại
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        } else {
            echo "Không thể tải lên hình ảnh.";
            $image = $oldImage;
        }
    } else {
        $image = $oldImage;
    }

    // Cập nhật thông tin vào cơ sở dữ liệu
    $sql = "UPDATE blog SET 
            blog_title = ?, 
            blog_content = ?, 
            blog_describe = ?, 
            blog_register = ?, 
            blog_author = ?, 
            blog_image = ? 
            WHERE blog_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $title, $content, $describe, $register, $author, $image, $id);

    if ($stmt->execute()) {
        echo "Cập nhật thành công!";
    } else {
        echo "Lỗi cập nhật: " . $stmt->error;
    }

    $stmt->close();
}

// Lấy thông tin blog hiện tại
$id = $_GET['id'] ?? null;
if ($id) {
    $sql = "SELECT * FROM blog WHERE blog_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "Không tìm thấy blog.";
    exit;
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
    <a class="navbar-brand" href="javascript:window.history.back(-1);">Quay lại ◀️</a>
    <!-- Toggler/collapsibe Button -->
  </nav>
  <div class="container mt-5">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header"><strong>Cập nhật Blog</strong></div>
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="id" class="form-control-label">Id blog:</label>
                    <input type="text" name="vid" id="vid" class="form-control" value="<?= $row['blog_id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="title" class="form-control-label">Tiêu đề:</label>
                    <input type="text" name="vtitle" id="vtitle" class="form-control" value="<?= $row['blog_title']; ?>">
                </div>
                <div class="form-group">
                    <label for="vcontent" class="form-control-label">Nội dung:</label>
                    <input type="text" name="vcontent" id="vcontent" class="form-control" value="<?= $row['blog_content']; ?>">
                </div>
                <div class="form-group">
                    <label for="vdescribe" class="form-control-label">Miêu tả:</label>
                    <input type="text" name="vdescribe" id="vdescribe" class="form-control" value="<?= $row['blog_describe']; ?>">
                </div>
                <div class="form-group">
                    <label for="vregister" class="form-control-label">Ngày đăng ký:</label>
                    <input type="date" name="vregister" id="vregister" class="form-control" value="<?= $row['blog_register']; ?>">
                </div>
                <div class="form-group">
                    <label for="vauthor" class="form-control-label">Tác giả:</label>
                    <input type="text" name="vauthor" id="vauthor" class="form-control" value="<?= $row['blog_author']; ?>">
                </div>
                <div class="form-group">
                    <label for="image" class="form-control-label">Hình ảnh:</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <input type="hidden" name="oldimage" value="<?= $row['blog_image']; ?>">
                    <img src="<?= $row['blog_image']; ?>" width="300" class="img-thumbnail">
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="blog.php" role="button">Hủy</a>
                <input class="btn btn-success" type="submit" name="submit" value="Cập nhật">
            </div>
        </div>
    </form>
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