<?php
   include 'actionBlog.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quản trị viên - Chi tiết sản phẩm</title>
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
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header"><strong>Thông tin blog</strong></div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="id" class="form-control-label">Id blog:</label>
                        <input type="text" name="blog_id" id="id" class="form-control" value="<?= $vid; ?>">
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-control-label">Tiêu đề:</label>
                        <input type="text" name="blog_title" id="title" class="form-control" value="<?= $vtitle; ?>">
                    </div>
                    <div class="form-group">
                        <label for="vcontent" class="form-control-label">Nội dung:</label>
                        <input type="text" name="blog_content" id="vcontent" class="form-control" value="<?= $vcontent; ?>">
                    </div>
                    <div class="form-group">
                        <label for="vdescribe" class="form-control-label">Miêu tả:</label>
                        <input type="text" name="blog_describe" id="vdescribe" class="form-control" value="<?= $vdescribe; ?>">
                    </div>
                    <div class="form-group">
                        <label for="blog_register" class="form-control-label">Ngày đăng ký:</label>
                        <input type="date" name="blog_register" id="blog_register" class="form-control" value="<?= $vregister; ?>">
                    </div>
                    <div class="form-group">
                        <label for="blog_author" class="form-control-label">Tác giả:</label>
                        <input type="text" name="blog_author" id="blog_author" class="form-control" value="<?= $vauthor; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-control-label">Hình ảnh:</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <input type="hidden" name="oldimage" value="<?= $image; ?>">
                        <img src="<?= $image; ?>" width="300" class="img-thumbnail">
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="blog.php" role="button">Hủy</a>
                    <a href="editBlog.php?id=<?= $row['blog_id']; ?>" class="btn text-white btn-info">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Chỉnh sửa
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>