<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin sữa</title>
</head>

<body>
<?php
$ten_sua = "";
require_once('connect_db.php');
$Loai_sua = getData($conn, 'select Ten_loai FROM loai_sua');
$Hang_sua = getData($conn, 'select Ten_hang_sua FROM hang_sua');
if (isset($_REQUEST['find']) && !empty(addslashes($_GET['ten_sua']))) {
    $ten_sua = addslashes($_GET['ten_sua']);
    $loai_sua = $_GET['loai_sua'];
    $hang_sua = $_GET['hang_sua'];
    $sql =
        "SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia, ls.Ten_loai
    FROM sua s
    JOIN loai_sua ls ON s.Ma_loai_sua = ls.Ma_loai_sua
    JOIN hang_sua hs ON hs.Ma_hang_sua = s.Ma_hang_sua 
    WHERE Ten_sua LIKE '%$ten_sua%'
    AND ls.Ten_loai = '$loai_sua'
    AND hs.Ten_hang_sua = '$hang_sua'";
} else {
    $sql =
        "SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
    FROM sua s
    JOIN hang_sua hs ON hs.Ma_hang_sua = s.Ma_hang_sua";
}
$result = getData($conn, $sql);
?>
<p align='center'>
    <font color='#ff6603' face='Verdana, Geneva, sans-serif' size='5'>
        <b>TÌM KIẾM THÔNG TIN SỮA</b>
    </font>
</p>
<table align='center' width='800px' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>
    <tr style='background:#ffeee6;'>
        <td colspan='2' align='center'>
            <form action='' methoh='get' style='margin:10px;'>
                <label style="color: #ff6603; ">Loại sữa: </label>
                <select name="loai_sua">
                    <?php
                    foreach ($Loai_sua as $row) {
                        ?>
                        <option value='<?= $row['Ten_loai'] ?>'><?= $row['Ten_loai'] ?></option>
                        <?php
                    }
                    ?>
                </select> &emsp;
                <label>Hãng sữa: </label>
                <select name="hang_sua">
                    <?php
                    foreach ($Hang_sua as $row) {
                        ?>
                        <option value='<?= $row['Ten_hang_sua'] ?>'><?= $row['Ten_hang_sua'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <br>
                <br>
                <label>Tên sữa: </label>
                <input type='text' name='ten_sua' placeholder='Nhập từ khóa cần tìm'
                       value="<?php if (isset($_GET['ten_sua'])) {
                           echo $_GET['ten_sua'];
                       } ?>">
                <input type='submit' value='Tìm kiếm'name="find" style="background:#f6cacb;cursor: pointer;">
            </form>
            <?php
            if ($ten_sua != "")
                echo "Có " . mysqli_num_rows($result) . " sản phẩm được tìm thấy";
            else
                echo "";
            ?>
        </td>
    </tr>
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

</html>