<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin khách hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"
            integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css"
          integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        table {
            text-align: center;
        }

        th {
            color: #ff6603;
        }

        tr:nth-child(even) {
            background-color: #efd6c6;
        }
    </style>

</head>

<body>
<?php
require_once('connect_db.php');

$sql = 'select * from khach_hang';
$result = getData($conn, $sql);
?>

<p align='center'><font size='5' color='#ff6603' face='Verdana, Geneva, sans-serif'><b>THÔNG TIN KHÁCH HÀNG</b></font>
</P>
<table align='center' width='90%' cellpadding='2' cellspacing='2' class='table-bordered'
       style='border-collapse:collapse'>
    <tr>
        <th width="50">Mã khách hàng</th>
        <th width="150">Tên khách hàng</th>
        <th width="200">Giới tính</th>
        <th width="200">Địa chỉ</th>
        <th width="200">Điện thoại</th>
        <th width="200">Email</th>
        <th width="20">Sửa</th>
        <th width="20">Xóa</th>
    </tr>

    <?php
    foreach ($result as $row) {
        ?>
        <tr>
            <td><?= $row['Ma_khach_hang']; ?></td>
            <td><?= $row['Ten_khach_hang']; ?></td>
            <td><?= ($row['Phai'] == 0) ? "Nam" : "Nữ"; ?></td>
            <td><?= $row['Dia_chi']; ?></td>
            <td><?= $row['Dien_thoai']; ?></td>
            <td><?= $row['Email']; ?></td>
            <td>
                <a href='B2.12-suakhachhang.php?maKH=<?= $row['Ma_khach_hang'] ?>' class='btn btn-primary'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </a>
            </td>
            <td>
                <a href='B2.12-xoakhachhang.php?maKH=<?= $row['Ma_khach_hang'] ?>' class='btn btn-danger'>
                    <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>

</html>