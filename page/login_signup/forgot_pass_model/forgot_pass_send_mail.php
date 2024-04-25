<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if(!empty($_SESSION['email'])){
        
        if(isset($_GET['email'])){
            $email = $_GET['email'];
            $_SESSION['email'] = $email;

            $email = $_SESSION['email'];

            $dataCus = getCusByEmail($email);

            $cus_ID = $dataCus['cus_ID'];
            $cus_Name = $dataCus['cus_Name'];

            require './Library/PHPMailer/src/Exception.php';
            require './Library/PHPMailer/src/PHPMailer.php';
            require './Library/PHPMailer/src/SMTP.php';
            
            sendMail($email, $cus_Name, $cus_ID);
            header('location: '.deleteOneURL('email'));
            
        }else{
            $email = $_SESSION['email'];
            // echo $email;
            $dataCus = getCusByEmail($email);

            $cus_ID = $dataCus['cus_ID'];
            $cus_Name = $dataCus['cus_Name'];
            $_SESSION['cus_ID'] = $cus_ID;
            // echo $cus_ID;
        }
    
?>
    <body>
        <form action="" method="post">
            <div class="bg--outside">
                <div class="container send-mail__container">
                    <div class="row">
                        <h1 class="send-mail__title">Xác thực tài khoản</h1>

                        <div class="send-mail__content">
                            <p class="send-mail__content--para">Vui lòng điền Email để gửi mã xác minh</p>
                            <input type="text" class="send-mail__inp" name="send-mail__inp" id="">

                            <?php
                                if(isset($_POST['send-mail__btn--verify'])){
                                    if(!empty($_POST['send-mail__inp'])){
                                        $code = $_POST['send-mail__inp'];
                                        if(checkAccCodeForgot($code, $cus_ID)){
                                            // 
                                            header('location: login_signup.php?page=change_pass');
                                        }else{
                                            echo "<p class='col-l-12 col-md-12 col-sm-12' style='color: red; font-weight: bold; text-align:center;'>Mã không hợp lệ!</p>";
                                        }

                                    }else{
                                        echo "<p class='col-l-12 col-md-12 col-sm-12' style='color: red; font-weight: bold; text-align:center;'>Vui lòng nhập mã!</p>";
                                    }

                                }else if(isset($_POST['send-mail__btn--resend'])){
                                    echo "<p class='col-l-12 col-md-12 col-sm-12' style='color: red; font-weight: bold; text-align:center;'>Mã mới đã được gửi!</p>";
                                    header('location: login_signup.php?page=send_mail&email='.$email);
                                }
                            ?>

                            <div class="send-mail__btn">
                                <button name="send-mail__btn--verify" class="send-mail__btn--verify">Xác thực</button>
                                <button name="send-mail__btn--resend" class="send-mail__btn--resend">Gửi lại</button>
                            </div>
                        </div>

                        <div class="row forgot-pass__voucher">
                            <h1 class="voucher-main__header col-l-12 col-md-12 col-sm-12">Mã khuyến mãi</h1>

                            <?php
                                foreach(getAllVoucher() as $row){
                                    $voucher_ID = $row['voucher_ID'];
                                    $voucher_EXP = $row['voucher_EXP'];
                                    $voucher_Discount = $row['voucher_Discount'];
                                    $voucher_Describe = $row['voucher_Description'];
                                    $voucher_photo = $row['voucher_Photo'];
                            ?>

                                <a href="/index.php?page=user_account&user=news_notice" class="voucher-main__items col-l-6 col-md-6 col-sm-12">
                                    <img class="voucher-main__img" src="/assets/img/<?= $voucher_photo ?>" alt="" srcset="">
                                </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
<?php
    }else{
        header('location: login_signup.php');
    }
?>

<?php
    function sendMail($email, $cus_Name, $cus_ID){
        //Create an instance; passing true enables exceptions
        $mail = new PHPMailer(true);
            
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'huynhdat10a1006@gmail.com';                     //SMTP username
            $mail->Password   = 'aoweoeqwqvxdnppy';                               //SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            $mail->ContentType = 'text/plain'; 
        
            //Recipients
            $mail->setFrom('huynhdat10a1006@gmail.com', 'Cinestar Cinema');
            $mail->addAddress($email, $cus_Name);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML

            $random_code = createRandomCode(8);
            updateAccCodeForgot($random_code, $cus_ID);
            $mail->Subject = 'Mã Code xác thực để tiến hành lấy lại mật khẩu!';
            $mail->Body    = '<b>Mã của bạn là: </b>'.$random_code;
        
            $mail->send();
            // echo 'Message has been sent';
            // header();
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>

