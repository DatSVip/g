<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderid = $_POST["orderid"];
    $hashSecret = $vnp_HashSecret;
    $ipaddr = $_SERVER['REMOTE_ADDR'];
    $inputData = array(
        "vnp_Version" => '2.1.0',
        "vnp_Command" => "querydr",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_TxnRef" => $orderid,
        "vnp_OrderInfo" => 'Noi dung thanh toan',
        "vnp_TransDate" => $_POST['paymentdate'],
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_IpAddr" => $ipaddr
    );
    
    ksort($inputData);
    $query = http_build_query($inputData);
    $hashdata = $query;
    
    $vnp_apiUrl = $vnp_apiUrl . "?" . $query;
    if (isset($hashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
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