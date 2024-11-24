<?php
// Thông tin sản phẩm
$product = [
    'name' => 'iPhone 16 Pro Max',
    'launch_date' => '2024-12-01',
    'price' => 29990000, // Giá dự kiến
    'image' => './assets/blog/ip.jpg' // Đường dẫn tới ảnh sản phẩm
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm sắp ra mắt</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5 text-center">
    <h2 class="text-info">Sản phẩm sắp ra mắt</h2>
    <div class="card mx-auto mt-4" style="width: 18rem;">
        <img src="<?= htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']); ?>">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
            <p class="card-text">Ngày ra mắt: <strong><?= date("d-m-Y", strtotime($product['launch_date'])); ?></strong></p>
            <p class="card-text">Giá dự kiến: <strong><?= number_format($product['price'], 0, ',', '.'); ?> VND</strong></p>
            <p>iPhone 16 Pro Max là siêu phẩm tiếp theo của Apple, dự kiến ra mắt vào năm 2024 với nhiều cải tiến vượt bậc. ứa hẹn là sự lựa chọn hàng đầu cho những ai yêu thích công nghệ đỉnh cao và sự tinh tế.</p>
        </div>
    </div>
</div>
</body>
</html>
