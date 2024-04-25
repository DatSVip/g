<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <!-- Bao gồm thư viện jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bao gồm thư viện jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- CSS cho nút đăng ký và các liên kết -->
    <style>
        .sign-in__form--btn {
            background-color: #007bff; /* Màu nền xanh */
            color: white; /* Màu văn bản trắng */
            border: none; /* Loại bỏ viền */
            padding: 10px 20px; /* Khoảng cách padding */
            border-radius: 5px; /* Bo góc */
            cursor: pointer; /* Con trỏ khi di chuột */
            transition: background-color 0.3s ease; /* Hiệu ứng chuyển đổi màu nền */
        }

        .sign-in__form--btn:hover {
            background-color: #0056b3; /* Màu nền xanh đậm khi di chuột */
        }

        .sign-in__form--link {
            color: #007bff; /* Màu văn bản xanh */
            text-decoration: none; /* Loại bỏ gạch chân */
            transition: color 0.3s ease; /* Hiệu ứng chuyển đổi màu văn bản */
        }

        .sign-in__form--link:hover {
            color: #0056b3; /* Màu xanh đậm khi di chuột */
        }
    </style>
</head>
<body>

<div class="bg--outside">

        <div class="container bg--inside">
            <div class="row">
                <div class="sign-in-sign-up__form">
                    <!-- <form onsubmit="return false" action="" method="POST"> -->
                        <form method="POST">
                            
                            <!-- sign up -->
                            <div class="sign-in__form" id="sign-up__form-move">
                        
                            <h1 class="sign-in__form--header">
                                ĐĂNG KÝ TÀI KHOẢN
                            </h1>

                            <div class="sign-in__form--content">

                                <p class="sign-in__form--inp-phone sign-in__form--inp-para">Tên tài khoản</p>
                                <input type="text" class="sign-in__form--input" name="sign_up_name">

                                <p class="sign-in__form--inp-phone sign-in__form--inp-para">Số điện thoại</p>
                                <input type="text" class="sign-in__form--input" name="sign_up_phone">

                                <p class="sign-in__form--inp-phone sign-in__form--inp-para">Email</p>
                                <input type="text" class="sign-in__form--input" name="sign_up_email">

                                <p class="sign-in__form--inp-pass sign-in__form--inp-para">Mật khẩu</p>
                                <input type="password" class="sign-in__form--input" name="sign_up_pass">

                                <p class="sign-in__form--inp-pass sign-in__form--inp-para">Ngày tháng năm sinh</p>
                                <input type="text" class="sign-in__form--input" name="sign_up_dob" id="datepicker">

                                <div class="sign-in__form--gender">
                                    <label class="sign-in__form--inp-para">Giới tính</label>
                                    <div class="sign-form__male-female">
                                        <input id="male" type="radio" name="sign_up_gender" value="M">
                                        <label class="sign-in__form--input sign-in__form--input-gender"
                                            for="male">Nam</label>

                                        <input id="female" type="radio" name="sign_up_gender" value="F">
                                        <label class="sign-in__form--input sign-in__form--input-gender"
                                            for="female">Nữ</label>
                                    </div>
                                </div>

                                <!-- Sign up php -->
                                <?php
                                
                                if(isset($_POST['sign-up__btn'])){
                                    if (!empty($_POST['sign_up_name']) && !empty($_POST['sign_up_phone']) && !empty($_POST['sign_up_email']) && !empty($_POST['sign_up_pass']) && !empty($_POST['sign_up_dob']) && !empty($_POST['sign_up_gender'])){
                                        $sign_up_name = $_POST['sign_up_name'];
                                        $sign_up_phone = $_POST['sign_up_phone'];
                                        $sign_up_email = $_POST['sign_up_email'];
                                        $sign_up_pass = md5($_POST['sign_up_pass']);
                                        $sign_up_dob = $_POST['sign_up_dob'];
                                        $sign_up_gender = $_POST['sign_up_gender'];

                                        if(checkDuplicatePhone($sign_up_phone)){
                                            echo "<p class='sign-in__form-check'>Số điện thoại đã được sử dụng</p>";
                                            // exit();
                                        }else if(checkDuplicateEmail($sign_up_email)){
                                            echo "<p class='sign-in__form-check'>Email đã được sử dụng</p>";
                                        }else{
                                            createCustomer($sign_up_name, $sign_up_email, $sign_up_phone, null, $sign_up_dob, $sign_up_gender,$sign_up_pass);
                                            header('location: login_signup.php');
                                        }
                                    }else{
                                        echo "<p class='sign-in__form-check'>Vui lòng điền đầy đủ thông tin!</p>";
                                        // exit();
                                    }
                                }
                                ?>

                                <input type="checkbox" class="sign-in__form--input sign-up__checkbox" name="" id="sign-up__checkbox" required>
                                <label for="sign-up__checkbox" class="sign-up__form--label">Tôi đã đọc và đồng ý với
                                    <a href="#" class="sign-in__form--link">
                                        Điều khoản
                                    </a>
                                </label>

                                <p class="sign-in__form--para">Đã có tài khoản?
                                    <a href="?page=login" onclick="onClickSignInNow()" id="sign-up__form--link" class="sign-in__form--link">
                                        Đăng nhập ngay
                                    </a>
                                </p>

                                <button name="sign-up__btn" class="sign-in__form--btn">Đăng ký</button>

                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div> 
<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true,
            yearRange: '1800:2024' //Giới hạn năm từ 1800 - 2024
        });
    } );
</script>