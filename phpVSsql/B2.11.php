<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin sữa</title>
    <style>

        .button{
            text-align: center;
            margin: 40px 0;
        }
        .add {
            text-decoration: none;
            color: #ff6603;
            background:#ffeee6;
            padding: 10px 20px;
            border: #ff6603 1px solid;
        }

        a {
            text-decoration: none;
            color: #d0a58e;
            padding: 0 10px;
        }

        a:hover {
            color: #ff6603;
        }
    </style>
</head>

<body>
<?php
require_once('connect_db.php');

$rowsPerPage = 2;
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$offset = ($_GET['page'] - 1) * $rowsPerPage;
$sql =
    'SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
  FROM sua s
  JOIN hang_sua hs ON hs.Ma_hang_sua = s.Ma_hang_sua  LIMIT ' . $offset . ', ' . $rowsPerPage;
$result = getData($conn, $sql);
?>
<p align='center'>
    <font color='#ff6603' face= 'Verdana, Geneva, sans-serif' size='5'>
        <b>THÔNG MỚI SỮA</b>
    </font>
</p>
<div class='button'>
    <a class='add' href='B2.11-formthem.php'>Thêm mới</a>
</div>
<table align='center' width='800px' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>
    <?php
    foreach ($result as $row) {
        ?>
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
        <?php
    }
    ?>
</table>

<p align='center'>
    <?php
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows / $rowsPerPage) + 1;

    if ($_GET['page'] > 1) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . (1) . ">&#60&#60</a> ";
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">&#60</a> ";
    }
    for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $_GET['page'])
            echo "<b style='padding:0 10px;'>" . $i . "</b> ";
        else
            echo "<a href="
                . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
    }

    if ($_GET['page'] < $maxPage) {
        echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">&#62</a>";
        echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=" . ($maxPage) . ">&#62&#62</a>";
    }
    ?>
</p>
</body>
</html>