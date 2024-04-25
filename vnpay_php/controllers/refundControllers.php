<?php
require_once("../config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = ($_POST["amount"]) * 100;
    $ipaddr = $_SERVER['REMOTE_ADDR'];
    $inputData = array(
        "vnp_Version" => '2.1.0',
        "vnp_TransactionType" => $_POST["trantype"],
        "vnp_Command" => "refund",
        "vnp_CreateBy" => $_POST["mail"],
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_TxnRef" => $_POST["orderid"],
        "vnp_Amount" => $amount,
        "vnp_OrderInfo" => 'Noi dung thanh toan',
        "vnp_TransDate" => $_POST['paymentdate'],
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_IpAddr" => $ipaddr
    );
    
    ksort($inputData);
    $query = "";
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        $hashdata .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_apiUrl = $vnp_apiUrl . "?" . $hashdata;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', rtrim($hashdata, '&'), $vnp_HashSecret);
        $vnp_apiUrl .= '&vnp_SecureHash=' . $vnpSecureHash;
    }
    
    $ch = curl_init($vnp_apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    echo $data;
}
?>