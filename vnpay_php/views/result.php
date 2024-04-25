<?php
ob_start();
session_start();
include('./connect.php');
require_once("./config.php");

// Lấy dữ liệu trả về từ VNPAY
$vnp_ResponseCode = isset($_GET['vnp_ResponseCode']) ? $_GET['vnp_ResponseCode'] : '';
$vnp_TxnRef = isset($_GET['vnp_TxnRef']) ? $_GET['vnp_TxnRef'] : '';
$vnp_Amount = isset($_GET['vnp_Amount']) ? $_GET['vnp_Amount'] : '';
$vnp_OrderInfo = isset($_GET['vnp_OrderInfo']) ? $_GET['vnp_OrderInfo'] : '';

// Kiểm tra mã phản hồi từ VNPAY
if ($vnp_ResponseCode === '00') {
    // Thanh toán thành công, tiếp tục xử lý
    // Cập nhật trạng thái đơn hàng hoặc thực hiện các tác vụ khác ở đây
    $message = "Thanh toán thành công! Mã đơn hàng: $vnp_TxnRef, Số tiền: $vnp_Amount VND, Nội dung thanh toán: $vnp_OrderInfo";
} else {
    // Thanh toán không thành công, xử lý lỗi
    $message = "Thanh toán thất bại! Mã đơn hàng: $vnp_TxnRef, Lý do: $vnp_ResponseCode";
}

// Hiển thị thông báo kết quả cho người dùng
echo "<h1>Kết quả thanh toán</h1>";
echo "<p>$message</p>";

// Xóa các biến session hoặc thực hiện các tác vụ cần thiết khác sau khi xử lý kết quả

?>
