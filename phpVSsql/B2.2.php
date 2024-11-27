<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2 style="text-align: center; text-transform: uppercase; color: #1d78ac;">Thông tin khách hàng</h2>
<table border="1" style="margin: 0 auto;">
    <tr>
        <th>Mã KH</th>
        <th>Tên khách hàng</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
    </tr>
    <?php
    require_once('connect_db.php');
    $rows = getData($conn, 'SELECT * FROM khach_hang');
    $color = 0;
    foreach ($rows as $row) {
        if ($color % 2 == 0) {
            echo "<tr style='background-color: #efd6c6'>";
            $color++;
        }
        else {
            echo "<tr>";
            $color++;
        }
        ?>
        <td><?= $row['Ma_khach_hang']; ?></td>
        <td><?= $row['Ten_khach_hang']; ?></td>
        <td align="center"><?= $row['Phai']; ?></td>
        <td><?= $row['Dia_chi']; ?></td>
        <td><?= $row['Dien_thoai']; ?></td>
        </tr>

        <?php
    }
    ?>

</table>
</body>
</html>