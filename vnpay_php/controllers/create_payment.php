<?php
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    require_once("../config.php");

    // Lấy dữ liệu từ POST
    $vnp_TxnRef = $_POST['order_id']; // Mã đơn hàng
    $vnp_OrderInfo = $_POST['order_desc'];
    $vnp_OrderType = $_POST['order_type'];
    $vnp_Amount = isset($_POST['amount']) ? $_POST['amount'] * 100 : 0; // Kiểm tra và chuyển đổi số tiền
    $vnp_Locale = $_POST['language'];
    $vnp_BankCode = $_POST['bank_code'];
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    // Thêm các tham số mới từ phiên bản 2.0.1
    $vnp_ExpireDate = isset($_POST['txtexpire']) ? $_POST['txtexpire'] : '';
    // Thông tin thanh toán
    $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
    $vnp_Bill_Email = $_POST['txt_billing_email'];
    $fullName = isset($_POST['txt_billing_fullname']) ? trim($_POST['txt_billing_fullname']) : '';
    if (!empty($fullName)) {
        $name = explode(' ', $fullName);
        $vnp_Bill_FirstName = array_shift($name);
        $vnp_Bill_LastName = array_pop($name);
    } else {
        $vnp_Bill_FirstName = '';
        $vnp_Bill_LastName = '';
    }
    $vnp_Bill_Address = isset($_POST['txt_inv_addr1']) ? $_POST['txt_inv_addr1'] : '';
    $vnp_Bill_City = isset($_POST['txt_bill_city']) ? $_POST['txt_bill_city'] : '';
    $vnp_Bill_Country = isset($_POST['txt_bill_country']) ? $_POST['txt_bill_country'] : '';
    $vnp_Bill_State = isset($_POST['txt_bill_state']) ? $_POST['txt_bill_state'] : '';

    // Thông tin hóa đơn
    $vnp_Inv_Phone = isset($_POST['txt_inv_mobile']) ? $_POST['txt_inv_mobile'] : '';
    $vnp_Inv_Email = isset($_POST['txt_inv_email']) ? $_POST['txt_inv_email'] : '';
    $vnp_Inv_Customer = isset($_POST['txt_inv_customer']) ? $_POST['txt_inv_customer'] : '';
    $vnp_Inv_Address = isset($_POST['txt_inv_addr1']) ? $_POST['txt_inv_addr1'] : '';
    $vnp_Inv_Company = isset($_POST['txt_inv_company']) ? $_POST['txt_inv_company'] : '';
    $vnp_Inv_Taxcode = isset($_POST['txt_inv_taxcode']) ? $_POST['txt_inv_taxcode'] : '';
    $vnp_Inv_Type = isset($_POST['cbo_inv_type']) ? $_POST['cbo_inv_type'] : '';

    // Tạo mảng dữ liệu đầu vào
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
        "vnp_ExpireDate" => $vnp_ExpireDate,
        "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
        "vnp_Bill_Email" => $vnp_Bill_Email,
        "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
        "vnp_Bill_LastName" => $vnp_Bill_LastName,
        "vnp_Bill_Address" => $vnp_Bill_Address,
        "vnp_Bill_City" => $vnp_Bill_City,
        "vnp_Bill_Country" => $vnp_Bill_Country,
        "vnp_Inv_Phone" => $vnp_Inv_Phone,
        "vnp_Inv_Email" => $vnp_Inv_Email,
        "vnp_Inv_Customer" => $vnp_Inv_Customer,
        "vnp_Inv_Address" => $vnp_Inv_Address,
        "vnp_Inv_Company" => $vnp_Inv_Company,
        "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
        "vnp_Inv_Type" => $vnp_Inv_Type
    );

    // Kiểm tra và thêm các tham số không bắt buộc
    if (!empty($vnp_BankCode)) {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (!empty($vnp_Bill_State)) {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    // Sắp xếp mảng dữ liệu theo thứ tự
    ksort($inputData);

    // Tạo query string từ mảng dữ liệu
    $query = http_build_query($inputData, '', '&');

    // Tạo URL redirect
    $vnp_Url = $vnp_Url . "?" . $query;

    // Tạo mã hash
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $query, $vnp_HashSecret);
        $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
    }

    // Trả về kết quả hoặc redirect đến URL
    if (isset($_POST['momo_payment'])) {
        $partnerCode = 'MOMODATHOCNGU123';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
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

    } elseif (isset($_POST['redirect'])) {
        // Chuyển hướng người dùng đến URL redirect
        header('Location: ' . $vnp_Url);
        die();
    } else {
        // Xử lý trường hợp không nhận được nút nào được nhấn
        echo "Không nhận được yêu cầu thanh toán";

        // Trả về kết quả hoặc redirect đến URL
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        echo json_encode($returnData);
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