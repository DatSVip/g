<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tra cứu giao dịch</title>
        <!-- Bootstrap CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">THỬ NGHIỆM VNPAY</h3>
            </div>
            <div style="width: 100%;padding-top:0px;font-weight: bold;color: #333333">
                <h3>Hoàn tiền</h3>
            </div>
            <div style="width: 100% ;border-bottom: 2px solid black;padding-bottom: 20px" >
                <form action="/vnpay_php/views/refund.php" id="frmCreateOrder" method="post"> <!--<<form action="refund.php" id="frmCreateOrder" method="post">-->
 
                    <div class="form-group">
                        <label >ID Đặt hàng</label>
                        <input class="form-control" data-val="true"  name="orderid" type="text" value="" />
                    </div>
                    <div class="form-group">
                        <label>Kiểu hoàn tiền </label>
                        <select name="trantype" id="trantype" class="form-control">
                            <option value="02">Hoàn tiền toàn phần</option>
                            <option value="03">Hoàn tiền 1 phần</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="Lượng là một yêu cầu!" id="amount" max="100000000" min="1" name="amount" type="number" value="10000" />
                    </div>
                    <div class="form-group">
                        <label>Ngày Thanh Toán</label>
                        <input class="form-control" data-val="true"  name="paymentdate" type="text" value="" />
                    </div>
                    <div class="form-group">
                        <label >Mail người khởi tạo GD hoàn tiền</label>
                        <input class="form-control" data-val="true"  name="mail" type="text" value="" />
                    </div>
                    <input type="submit"  class="btn btn-default" value="Refund" />
                </form>
            </div>
        </div>
    </body>
</html>