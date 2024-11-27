<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết</title>
</head>

<body>
<?php
require_once('connect_db.php');

$Ma_sua = isset($_GET['maSua']) ? $_GET['maSua'] : '';

$sql =
    "SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia 
  FROM sua s 
  JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua 
  WHERE Ma_sua = '$Ma_sua'";
$result = getData($conn, $sql)->fetch_all(MYSQLI_ASSOC);
$row = $result[0];


?>
<div>
    <p align='center'>
        <font color='#ff6603' face='Verdana, Geneva, sans-serif' size='5'>
            <b>KẾT QUẢ SAU KHI THÊM</b>
        </font>
    </p>
    <table border=1 align='center' style='width: 600px'>
        <tr style="color: #ff6603; background:#ffeee6;">
            <th colspan='2'><h2><?= $row['Ten_sua'] ?> - <?= $row['Ten_hang_sua']; ?></h2></th>
        </tr>
        <tr>
            <td style='width: 200px'><img src='./Hinh_sua/<?= $row['Hinh']; ?> ' width=200px height=270/></td>
            <td>
                <div>
                    <b>Thành phần dinh dưỡng:</b>
                    <p><?= $row['TP_Dinh_Duong']; ?></p>
                    <b>Lợi ích:</b>
                    <p><?= $row['Loi_ich']; ?></p>
                    <p style='text-align: right'><b>Trọng lượng:<?= $row['Trong_luong']; ?> gr - <b>Đơn
                                giá:</b><?= $row['Don_gia']; ?></p>
                </div>
            </td>
        </tr>
        <tr>
            <td><a href='B2.11.php'>Quay lại</a></td>
        </tr>
    </table>
</div>

</body>

</html>