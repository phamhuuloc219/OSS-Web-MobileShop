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
    <h2 style="text-align: center; text-transform: uppercase; color: #1d78ac;">Thông tin hãng sữa</h2>
    <table border="1" style="margin: 0 auto;">
        <tr>
            <th>Mã HS</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>
    <?php
        require_once('connect_db.php');
        $rows = getData($conn, 'SELECT * FROM hang_sua');

        foreach ($rows as $row) {
    ?>
            <tr>
                <td><?= $row['Ma_hang_sua']; ?></td>
                <td><?= $row['Ten_hang_sua']; ?></td>
                <td><?= $row['Dia_chi']; ?></td>
                <td><?= $row['Dien_thoai']; ?></td>
                <td><?= $row['Email']; ?></td>
            </tr>

    <?php
        }
    ?>

    </table>
</body>
</html>