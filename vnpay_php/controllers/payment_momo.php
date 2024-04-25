<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    require_once("../config.php");

    // Lấy dữ liệu từ POST
    $vnp_TxnRef = $_POST['order_id']; // Mã đơn hàng
    $vnp_OrderInfo = $_POST['order_desc'];
    $vnp_OrderType = $_POST['order_type'];
    $vnp_Amount = isset($_POST['amount']) ? floatval($_POST['amount']) * 100 : 0; // Kiểm tra và chuyển đổi số tiền
    $vnp_Locale = $_POST['language'];
    $vnp_BankCode = $_POST['bank_code'];
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    // Kiểm tra và tính toán tổng số tiền thanh toán
    if ($vnp_Amount <= 0) {
        // Thông báo lỗi hoặc xử lý lỗi ở đây
        // Ví dụ:
        echo "Lỗi: Số tiền thanh toán không hợp lệ.";
        exit;
    }

    // Thông tin thanh toán
    $partnerCode = 'YOUR_PARTNER_CODE';
    $accessKey = 'YOUR_ACCESS_KEY';
    $secretKey = 'YOUR_SECRET_KEY';
    $orderId = $vnp_TxnRef;
    $orderInfo = $vnp_OrderInfo;
    $amount = $vnp_Amount;
    $orderType = $vnp_OrderType;
    $returnUrl = 'http://localhost/vnpay_php/views/return.php';
    $notifyUrl = 'http://localhost/vnpay_php/views/notify.php';
    $extraData = ''; // Có thể để trống

    // Tạo dữ liệu JSON
    $requestData = [
        'partnerCode' => $partnerCode,
        'accessKey' => $accessKey,
        'requestId' => time(),
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'orderType' => $orderType,
        'returnUrl' => $returnUrl,
        'notifyUrl' => $notifyUrl,
        'extraData' => $extraData,
        'requestType' => 'captureMoMoWallet'
    ];

    // Tạo chữ ký
    ksort($requestData);
    $query = http_build_query($requestData);
    $signature = hash_hmac('sha256', $query, $secretKey);

    // Thêm chữ ký vào dữ liệu JSON
    $requestData['signature'] = $signature;

    // Gửi yêu cầu thanh toán đến Momo API
    $endpoint = 'https://test-payment.momo.vn/gw_payment/transactionProcessor';
    $response = sendPostRequest($endpoint, $requestData);

    // Xử lý phản hồi từ Momo
    if ($response !== false) {
        // Redirect đến trang thanh toán của Momo
        $data = json_decode($response, true);
        if ($data['errorCode'] == 0) {
            header('Location: ' . $data['payUrl']);
            exit;
        } else {
            echo "Lỗi khi tạo thanh toán: " . $data['message'];
        }
    } else {
        echo "Lỗi khi gửi yêu cầu thanh toán đến Momo API.";
    }

    // Hàm gửi yêu cầu POST
    function sendPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
?>