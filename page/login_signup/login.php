<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        /* CSS cho form đăng nhập */
        .sign-in__form {
            margin-top: 20px; /* Khoảng cách từ header */
        }

        /* CSS cho các input trong form */
        .sign-in__form--input {
            height: 50px; /* Chiều cao */
            margin-bottom: 10px; /* Khoảng cách giữa các input */
            border-radius: 6px; /* Độ cong góc */
            display: block; /* Hiển thị dạng block */
            width: 100%; /* Chiều rộng */
            border: 1px solid #ddd; /* Viền */
            padding: 10px; /* Khoảng cách nội dung với viền */
            box-sizing: border-box; /* Tính cả padding và border vào kích thước */
        }

        /* CSS cho nút đăng nhập */
        .sign-in__form--btn {
            background-color: #007bff; /* Màu nền */
            color: white; /* Màu văn bản */
            border: none; /* Loại bỏ viền */
            padding: 10px 20px; /* Kích thước nút */
            cursor: pointer; /* Con trỏ khi hover */
            border-radius: 6px; /* Độ cong góc */
            display: block; /* Hiển thị dạng block */
            width: 100%; /* Chiều rộng */
        }

        /* CSS cho liên kết quên mật khẩu */
        .sign-in__form--link {
            color: #007bff; /* Màu văn bản */
        }

        .sign-in__form--link:hover {
            color: #0056b3; /* Màu văn bản khi hover */
        }

        .sign-in__form--btn:hover {
            background-color: #0056b3; /* Màu nền khi hover */
        }
    </style>
</head>
<body>
<!-- content -->
<div class="bg--outside">

<div class="container bg--inside">
    <div class="row">
        <div class="sign-in-sign-up__form">
            <!-- <form onsubmit="return false" action="" method="POST"> -->
                <form method="POST" id="form__login">
                    <!-- sign-in -->
                    <div class="sign-in__form" id="sign-in__form-move">
                    <h1 class="sign-in__form--header">
                        ĐĂNG NHẬP
                    </h1>

                    <div class="sign-in__form--content">
                        <p class="sign-in__form--inp-phone sign-in__form--inp-para">Số điện thoại</p>
                        <input type="text" id="sign_in_phone" class="sign-in__form--input" name="sign_in_phone">

                        <p class="sign-in__form--inp-pass sign-in__form--inp-para">Mật khẩu</p>
                        <input type="password" id="sign_in_pass" class="sign-in__form--input" name="sign_in_pass">

                        <!-- login -->
                        <?php

                        if(isset($_POST['login__btn'])){
                            
                            if (!empty($_POST['sign_in_phone']) && !empty($_POST['sign_in_pass'])){
                                $pass = md5($_POST['sign_in_pass']);
                                $phone = $_POST['sign_in_phone'];
                            
                                
                                if(!checkLogin($phone, $pass)){
                                    echo "<p class='sign-in__form-check'>Wrong phone number or password</p>";
                                }
                                else if(checkLogin($phone, $pass) && $pass == md5('123456') && $phone == 'admin'){
                                    $_SESSION['login_phone'] = $phone;
                                    $_SESSION['login_pass'] = $pass;
                                    header('location: manager_main.php?page=manage_user');
                                }
                                else{
                                    $dataAcc = getAccByPhone($phone);
                                    $isActive = $dataAcc['acc_isActive'];

                                    if($isActive == 'Lock'){
                                        echo "<p class='sign-in__form-check'>Tài khoản của bạn đã bị khóa</p>";
                                    }else{
                                        $_SESSION['login_phone'] = $phone;
                                        $_SESSION['login_pass'] = $pass;
                                        header('location: index');
                                    }
                                }
                            }else{
                                echo "<p class='sign-in__form-check'>Số điện thoại và mật khẩu không được để trống!</p>";
                            }
                        }
                        ?>

                        <div class="sign-in__form-forgot-remember">
                            <div>
                                <input type="checkbox" class="sign-in__form--checkbox" name="login__checkbox" id="sign-in__form--remember">
                                <label for="sign-in__form--remember"
                                    class="sign-up__form--label sign-in__form--label">
                                    Nhớ tài khoản
                                </label>
                            </div>
                            <a href="?page=forgot_password" class="sign-in__form--link">
                                <p class="sign-in__form--para sign-in__form--para-forgot">Quên mật khẩu?</p>
                            </a>
                        </div>

                        <p class="sign-in__form--para">Chưa có tài khoản?
                            <a href="?page=signup" onclick="onClickSignUpNow()" id="sign-in__form--link" class="sign-in__form--link">
                                Đăng kí ngay
                            </a>
                        </p>

                        <button name="login__btn" id="sign-in__form--btn" class="sign-in__form--btn">Đăng nhập</button>

                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
</div> 