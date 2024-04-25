<?php
    $servername = "localhost";
    $username = "username"; // Thay bằng tên đăng nhập cơ sở dữ liệu của bạn
    $password = "password"; // Thay bằng mật khẩu cơ sở dữ liệu của bạn
    $dbname = "database"; // Thay bằng tên cơ sở dữ liệu của bạn

    // Tạo kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>