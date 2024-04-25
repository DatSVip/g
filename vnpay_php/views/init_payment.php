<?php
header('Content-type: text/html; charset=utf-8');

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";

$amount = "10000";
$orderId = time() . "";
$redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
$ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
$extraData = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $partnerCode = $_POST["partnerCode"];
    $accessKey = $_POST["accessKey"];
    $secretKey = $_POST["secretKey"];
    $orderId = $_POST["orderId"];
    $orderInfo = $_POST["orderInfo"];
    $amount = $_POST["amount"];
    $ipnUrl = $_POST["ipnUrl"];
    $redirectUrl = $_POST["redirectUrl"];
    $extraData = $_POST["extraData"];

    $requestId = time();
    $requestType = "captureWallet";
    $extraData = $_POST["extraData"] ? $_POST["extraData"] : "";

    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);

    $data = array(
        'partnerCode' => $partnerCode,
        'partnerName' => "Test",
        'storeId' => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature
    );

    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);

    if(isset($jsonResult['payUrl'])) {
        header('Location: ' . $jsonResult['payUrl']);
    } else {
        echo "Có lỗi xảy ra khi tạo thanh toán.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MoMo Sandbox</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet"
          href="./statics/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
    <!-- CSS -->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Initial payment/Khởi tạo thanh toán</h3>
                </div>
                <div class="panel-body">
                    <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <!-- Input fields for MoMo parameters -->
                        <div class="form-group">
                            <label for="partnerCode">Partner Code:</label>
                            <input type="text" name="partnerCode" class="form-control" value="<?php echo $partnerCode; ?>">
                        </div>
                        <div class="form-group">
                            <label for="accessKey">Access Key:</label>
                            <input type="text" name="accessKey" class="form-control" value="<?php echo $accessKey; ?>">
                        </div>
                        <div class="form-group">
                            <label for="secretKey">Secret Key:</label>
                            <input type="text" name="secretKey" class="form-control" value="<?php echo $secretKey; ?>">
                        </div>
                        <div class="form-group">
                            <label for="orderId">Order ID:</label>
                            <input type="text" name="orderId" class="form-control" value="<?php echo $orderId; ?>">
                        </div>
                        <div class="form-group">
                            <label for="orderInfo">Order Info:</label>
                            <input type="text" name="orderInfo" class="form-control" value="<?php echo $orderInfo; ?>">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ipnUrl">IPN URL:</label>
                            <input type="text" name="ipnUrl" class="form-control" value="<?php echo $ipnUrl; ?>">
                        </div>
                        <div class="form-group">
                            <label for="redirectUrl">Redirect URL:</label>
                            <input type="text" name="redirectUrl" class="form-control" value="<?php echo $redirectUrl; ?>">
                        </div>
                        <div class="form-group">
                            <label for="extraData">Extra Data:</label>
                            <input type="text" name="extraData" class="form-control" value="<?php echo $extraData; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Start MoMo payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="./statics/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="./statics/moment/min/moment.min.js"></script>
</body>
</html>
