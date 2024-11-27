<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sữa</title>
    <style>
        .item {
            display: flex;
            height: 250px;
            flex-direction: column;
            justify-content: space-between;
        }

        .chitiet {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: start;
        }

    </style>
</head>

<body>
<?php
require_once('connect_db.php');
$sql =
    'select Ma_sua,Ten_sua,Trong_luong,Don_gia,Hinh
    from sua s 
    join loai_sua ls on s.Ma_loai_sua = ls.Ma_loai_sua';
$result = getData($conn, $sql);


?>
<table align='center' width='30%' border='1' style='border-collapse:collapse'>
    <tr>
        <th colspan="5" style="text-transform: uppercase; color: #ff6603; background:#ffeee6;margin: 0 auto;">
            <p style="text-align: center; font-size: 24px">Thông tin Sữa</p>
        </th>
    </tr>
    <?php
    $n = 0;
    foreach ($result as $row) {
        if ($n % 5 == 0) {
            echo "<tr>";
        }
        ?>
        <td align='center'>
            <div class='item'>
                <div class='chitiet'>
                    <b><a href='B2.7-chitiet.php?maSua=<?= $row['Ma_sua']; ?>'><?= $row['Ten_sua']; ?></a></b>
                    <?= $row['Trong_luong']; ?> gr - <?= $row['Don_gia']; ?> VNĐ<br>
                </div>
                <div class='hinh'><img width='150px' src='./Hinh_sua/<?= $row['Hinh']; ?>' alt=''></div>
            </div>
        </td>
        <?php
        if ($n % 5 == 4) {
            echo "</tr>";
        }
        $n++;
    }
    if ($n % 5 != 0) {
        echo "</tr>";
    }
    ?>
</table>
</body>

</html>