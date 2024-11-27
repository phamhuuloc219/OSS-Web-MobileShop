<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
require_once('connect_db.php');
$sql = 'SELECT
            Hinh,
            Ten_sua,
            Ten_hang_sua,
            Ten_loai,
            Trong_luong,
            Don_gia
        FROM
            sua
            INNER JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua
            INNER JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
    ';
$result = getData($conn, $sql);
?>

<table align='center' width='30%' border='1' style='border:solid 1px black'>
    <tr>
        <th colspan="5" style="text-transform: uppercase; color: #ff6603; background:#ffeee6;margin: 0 auto;">
            <p style="text-align: center; font-size: 24px">Thông tin các sản phẩm</p>
        </th>
    </tr>
    <?php
    foreach ($result as $row) {
        ?>
        <tr>

            <td width='20%' height='200px' align='center'><img width='150px' src='./Hinh_sua/<?= $row['Hinh'] ?>'
                                                               alt=''></td>
            <td>
                <b><?= $row['Ten_sua']; ?></b><br>
                Nhà sản xuất: <?= $row['Ten_hang_sua']; ?><br>
                <?= $row['Ten_loai']; ?> - <?= $row['Trong_luong']; ?> gr - <?= $row['Don_gia']; ?> VNĐ
            </td>
        </tr>

        <?php
    }
    ?>
</table>

</body>

</html>