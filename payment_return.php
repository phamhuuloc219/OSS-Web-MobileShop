<?php
require_once("vnpay_config.php");

$vnp_SecureHash = $_GET['vnp_SecureHash'];
unset($_GET['vnp_SecureHash']);
ksort($_GET);
$hashData = "";
$i = 0;
foreach ($_GET as $key => $value) {
    if ($i == 1) {
        $hashData .= '&' . $key . "=" . $value;
    } else {
        $hashData .= $key . "=" . $value;
        $i = 1;
    }
}

$secureHash = hash('sha256', $vnp_HashSecret . $hashData);
if ($secureHash === $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        echo "Thanh toán thành công! Cảm ơn bạn đã mua hàng.";
    } else {
        echo "Thanh toán không thành công. Mã lỗi: " . $_GET['vnp_ResponseCode'];
    }
} else {
    echo "Chữ ký không hợp lệ!";
}
?>
