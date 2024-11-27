<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sữa mới</title>
    <style>
        table {
            background: #ffeee6;

        }

        td {
            padding: 6px;
        }
    </style>
</head>

<body>
<?php
require_once('connect_db.php');

$Loai_sua = getData($conn, 'select Ma_loai_sua,Ten_loai FROM loai_sua');
$Hang_sua = getData($conn, 'select Ma_hang_sua,Ten_hang_sua FROM hang_sua');

function upload_file($name, $upload_path) {
    $file = $_FILES[$name];

    if ($file['error'] === 0) {
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];

        $upload_path = $upload_path. '/' . $file_name;

        echo $file_name . $file_tmp . $upload_path;

        // Di chuyển tệp tải lên vào thư mục lưu trữ trên máy chủ
        if (move_uploaded_file($file_tmp, $upload_path)) {
            echo "Tải lên thành công.";
        } else {
            echo "Lỗi khi lưu tệp.";
        }
    } else {
        echo "Có lỗi xảy ra trong quá trình tải lên.";
    }
}

if(isset($_POST['them'])) {
    $ma_sua = $_POST['ma_sua'];
    $ten_sua = $_POST['ten_sua'];
    $hang_sua = $_POST['hang_sua'];
    $loai_sua = $_POST['loai_sua'];
    $trong_luong = $_POST['trong_luong'];
    $don_gia = $_POST['don_gia'];
    $thanh_phan = $_POST['thanh_phan'];
    $loi_ich = $_POST['loi_ich'];
    $hinh_anh = $_FILES['hinh_anh']['name'];

    upload_file('hinh_anh', 'Hinh_sua');

    $sql = "INSERT INTO sua
            values ('$ma_sua','$ten_sua','$hang_sua','$loai_sua','$trong_luong','$don_gia','$thanh_phan','$loi_ich','$hinh_anh')";
    echo $sql;
    if ($conn->query($sql)) {
        header("Location: B2.11-hienthi.php?maSua=$ma_sua");
    } else {
        echo "Thêm thất bại: ". $conn->error;
    };

}

?>
<form action="" method="post" enctype="multipart/form-data">
    <table style="width: 50%;" align="center">
        <tr>
            <th colspan="2" align="center" bgcolor="#ff6603" style="color: #ffeee6;font-family: Verdana, Geneva, sans-serif">
                <div style="padding: 20px; font-size: 20px;">THÊM SỮA MỚI</div>
            </th>
        </tr>
        <tr>
            <td>Mã sữa: </td>
            <td>
                <input type="text" required name="ma_sua" id="">
            </td>
        </tr>
        <tr>
            <td>Tên sữa: </td>
            <td>
                <input type="text" required name="ten_sua" id="">
            </td>
        </tr>
        <tr>
            <td>Hãng sữa: </td>
            <td>
                <select required name="hang_sua">
                    <?php
                    foreach ($Hang_sua as $row) {
                        ?>
                        <option value='<?= $row['Ma_hang_sua'] ?>'><?= $row['Ten_hang_sua'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Loại sữa: </td>
            <td>
                <select required name="loai_sua">
                    <?php
                    foreach ($Loai_sua as $row) {
                        ?>
                        <option value='<?= $row['Ma_loai_sua'] ?>'><?= $row['Ten_loai'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Trọng lượng: </td>
            <td>
                <input type="text" required name="trong_luong"> (gr hoặc ml)
            </td>
        </tr>
        <tr>
            <td>Đơn giá</td>
            <td>
                <input type="text" required name="don_gia"> (VNĐ)
            </td>
        </tr>
        <tr>
            <td style="display: block;">Thành phần dinh dưỡng: </td>
            <td>
                <textarea required name="thanh_phan" id="" cols="30" rows="3" style="overflow: auto;"></textarea>
            </td>
        </tr>
        <tr>
            <td style="display: block;">Lợi ích: </td>
            <td>
                <textarea required name="loi_ich" id="" cols="30" rows="3" style="overflow: auto;"></textarea>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh: </td>
            <td>
                <input type="file" required name="hinh_anh">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input required name="them" type="submit" value="Thêm mới">
            </td>
        </tr>
    </table>
</form>
</body>

</html>