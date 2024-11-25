<?php
require_once("vnpay_config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderTotal = $_POST['orderTotal']; // Tổng tiền đơn hàng
    $orderInfo = $_POST['orderInfo'];   // Thông tin đơn hàng

    $vnp_TxnRef = time(); // Mã giao dịch
    $vnp_OrderInfo = $orderInfo;
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $orderTotal * 100; // Đơn vị: VNĐ * 100
    $vnp_Locale = 'vn';
    $vnp_BankCode = '';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . $key . "=" . $value;
        } else {
            $hashdata .= $key . "=" . $value;
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    header('Location: ' . $vnp_Url);
    exit();
}
?>
