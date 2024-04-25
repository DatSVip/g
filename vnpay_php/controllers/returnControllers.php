<?php
    ob_start();
    session_start();
    //include(__DIR__.'../connect.php');

    // Kiểm tra xem biến $vnp_ResponseCode đã được truyền qua URL hay chưa
    if (isset($_GET['vnp_ResponseCode'])) {
        $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
    } else {
        // Nếu không có dữ liệu từ VNPAY, gán giá trị mặc định hoặc thông báo lỗi
        $vnp_ResponseCode = 'Không có dữ liệu';
    }

    // Tiếp tục kiểm tra và lấy các giá trị khác từ URL
    if (isset($_GET['vnp_TxnRef'])) {
        $vnp_TxnRef = $_GET['vnp_TxnRef'];
    } else {
        $vnp_TxnRef = 'Không có dữ liệu';
    }

    if (isset($_GET['vnp_Amount'])) {
        $vnp_Amount = $_GET['vnp_Amount'];
    } else {
        $vnp_Amount = 'Không có dữ liệu';
    }

    if (isset($_GET['vnp_OrderInfo'])) {
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    } else {
        $vnp_OrderInfo = 'Không có dữ liệu';
    }

    $voucher_ID = $_SESSION['voucher'];
    $_SESSION['voucher'] = $voucher_ID;
    require_once("../config.php");

    $vnp_SecureHash = isset($_GET['vnp_SecureHash']) ? $_GET['vnp_SecureHash'] : '';

    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);

    $hashData = "";
    foreach ($inputData as $key => $value) {
        $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $secureHash = hash_hmac('sha512', rtrim($hashData, '&'), $vnp_HashSecret);

    if ($secureHash === $vnp_SecureHash) {
        // Dữ liệu hợp lệ, tiếp tục xử lý
        // Đoạn mã xử lý thành công hoặc thất bại có thể được thêm ở đây
    } else {
        // Dữ liệu không hợp lệ, xử lý lỗi
    }
?>