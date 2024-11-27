<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Thông tin sữa</title>
  
</head>

<body>
  <?php
  $search = "";
  require_once('connect_db.php');

  if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql =
      "SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
    FROM sua s
    JOIN hang_sua hs ON hs.Ma_hang_sua = s.Ma_hang_sua 
    WHERE Ten_sua LIKE '%$search%'";
  } else {

    $sql =
      "SELECT Ten_sua, hs.Ten_hang_sua, Hinh, TP_Dinh_Duong, Loi_ich, Trong_luong, Don_gia
      FROM sua s
      JOIN hang_sua hs ON hs.Ma_hang_sua = s.Ma_hang_sua";
  }

  $result = $conn->query($sql);

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
          <label style="color: #ff6603; ">Tên sữa: </label>
          <input type='text' name='search' placeholder='Nhập từ khóa cần tìm' value="<?php if (isset($_GET['search'])) {
                                                                                        echo $_GET['search'];
                                                                                      } ?>">
          <input type='submit' value='Tìm kiếm' style="background:#ffeee6;cursor: pointer;">
        </form>
        <?php
        if ($search != "") {
            if ($result->num_rows === 0) {
                echo "<p style='font-weight: bold;'>Không tìm thấy sản phẩm này!</p>";
            }
          else echo "<p style='font-weight: bold;'>Có " . $result->num_rows . " sản phẩm được tìm thấy</p>";
        }
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
    </table>
  </body>
</html>