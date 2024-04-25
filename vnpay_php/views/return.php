<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PHẢN HỒI VNPAY</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>
<body>
    <?php include('../controllers/returnControllers.php'); ?>
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">PHẢN HỒI THANH TOÁN VNPAY</h3>
        </div>
        <div class="table-responsive">
            <!-- Hiển thị thông tin đơn hàng -->
            <div class="form-group">
                <label>Mã đơn hàng (Order code):</label>
                <label><?php echo $vnp_TxnRef; ?></label>
            </div>
            <div class="form-group">
                <label>Số tiền (Total money):</label>
                <label><?php echo $vnp_Amount; ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán (Content billing):</label>
                <label><?php echo $vnp_OrderInfo; ?></label>
            </div>
             <!-- Hiển thị thông báo thành công hoặc thất bại -->
             <?php if ($vnp_ResponseCode == "00"): ?>
                <div class="alert alert-success" role="alert">
                    Thanh toán thành công!
                </div>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">
                    Thanh toán thất bại. Vui lòng thử lại!
                </div>
            <?php endif; ?>
            <!-- Các trường dữ liệu khác có thể được hiển thị tại đây -->
        </div>
        <p>&nbsp;</p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y')?></p>
        </footer>
    </div>
</body>
</html>