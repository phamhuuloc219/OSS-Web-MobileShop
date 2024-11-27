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
<h2 style="text-align: center; text-transform: uppercase; color: #aa1b00;">Thông tin sữa</h2>
<table border="1" style="margin: 0 auto;">
    <tr style="background:#fee0c1;">
        <th>Số TT</th>
        <th>Tên sữa</th>
        <th>Hãng sữa</th>
        <th>Loại sữa</th>
        <th>Trọng lượng</th>
        <th>Đơn giá</th>
    </tr>
    <?php
    require_once('connect_db.php');

    $rowsPerPage = 5;
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }
    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $sql = 'SELECT ten_sua,Ten_hang_sua,Ten_loai, Trong_luong,Don_gia FROM sua 
        join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua  LIMIT ' . $offset . ', ' . $rowsPerPage;

    $rows = getData($conn, $sql);

    $color = 0;
    $i = 0;
    foreach ($rows as $row) {
        if ($color % 2 == 0) {
            echo "<tr style='background-color: #efd6c6'>";
            $color++;
        } else {
            echo "<tr>";
            $color++;
        }
        $i++;
        ?>
        <td align="center"><?= $i; ?></td>
        <td><?= $row['ten_sua']; ?></td>
        <td><?= $row['Ten_hang_sua']; ?></td>
        <td><?= $row['Ten_loai']; ?></td>
        <td><?= $row['Trong_luong']; ?></td>
        <td><?= $row['Don_gia']; ?></td>
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
            echo "<b style='padding:0 10px;'>" . $i . "</b> "; //trang hiện tại sẽ được bôi đậm
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