<?php
session_start();
include 'config.php';
mysqli_set_charset($conn,'utf8mb4');
$update = false;
$id = "";
$title = "";
$content = "";
$describe = "";
$image = "";
$date = "";
$author= "";

// Thêm sản phẩm mới
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $describe = $_POST['describe'];
    $date = $_POST['date'];
    $date = "";
    $author = $_POST['author'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/OSS-Web-MobileShop/assets/blog/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $allowed_types = array("jpg", "png", "jpeg", "gif");
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = "./assets/blog/" . $image_name;
                $query = "INSERT INTO blog(blog_title, blog_content, blog_describe, blog_image, blog_register,blog_author) VALUES(?,?,?,?,?,?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssss", $title, $content, $describe, $image_path, $date,$author);  // Lưu đường dẫn ảnh tương đối
                $stmt->execute();
                $_SESSION['response'] = "Thêm sản phẩm thành công!";
                $_SESSION['res_type'] = "success";
                header('location:product.php');
            } else {
                $_SESSION['response'] = "Error uploading image.";
                $_SESSION['res_type'] = "danger";
            }
        } else {
            $_SESSION['response'] = "Những file JPG, JPEG, PNG, GIF mới được tải lên.";
            $_SESSION['res_type'] = "danger";
        }
    } else {
        $_SESSION['response'] = "Vui lòng tải ảnh lên.";
        $_SESSION['res_type'] = "danger";
    }
}

// Xóa sản phẩm
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM blog WHERE blog_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('location:blog.php');
    $_SESSION['response'] = "Xóa sản phẩm thành công!";
    $_SESSION['res_type'] = "danger";
}

// Sửa sản phẩm
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM product WHERE blog_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $id = $row['blog_id'];
    $title = $row['blog_title'];
    $content = $row['content'];
    $describe = $row['blog_describe'];
    $image = $row['blog_image'];
    $date = $row['blog_register'];
    $author = $row['blog_author'];
    $update = true;
}

// Sửa sản phẩm
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM product WHERE item_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $id = $row['item_id'];
    $brand = $row['item_brand'];
    $name = $row['item_name'];
    $price = $row['item_price'];
    $image = $row['item_image'];
    $date = $row['item_register'];
    $update = true;
}

// Cập nhật sản phẩm
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    
    $image = $_POST['oldimage'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/OSS-Web-MobileShop/assets/products/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $allowed_types = array("jpg", "png", "jpeg", "gif");
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = "./assets/products/" . $image_name;
            } else {
                $_SESSION['response'] = "Error uploading image.";
                $_SESSION['res_type'] = "danger";
                header('location:product.php');
                exit();
            }
        } else {
            $_SESSION['response'] = "Những file JPG, JPEG, PNG, GIF mới được tải lên.";
            $_SESSION['res_type'] = "danger";
            header('location:product.php');
            exit();
        }
    }

    $query = "UPDATE product SET item_brand=?, item_name=?, item_price=?, item_image=?, item_register=? WHERE item_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $brand, $name, $price, $image, $date, $id);
    $stmt->execute();
    
    $_SESSION['response'] = "Cập nhật sản phẩm thành công!";
    $_SESSION['res_type'] = "primary";
    header('location:product.php');
}

// Xem chi tiết sản phẩm
if (isset($_GET['details'])) {
    $id = $_GET['details'];
    $query = "SELECT * FROM blog WHERE blog_id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $vid = $row['blog_id'];
    $vtitle = $row['blog_title'];
    $vcontent = $row['blog_content'];
    $vdescribe = $row['blog_describe'];
    $vimage = $row['blog_image'];
    $vregister = $row['blog_register'];
    $vauthor = $row['blog_author'];
}
?>
