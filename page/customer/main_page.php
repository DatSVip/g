<!-- CSS đè cho voucher, slide, phim và combo -->
<!-- CSS cho slide -->
<style>
    .slide-show__container {
        position: relative;
        width: 100%;
        height: 400px; /* Điều chỉnh chiều cao của slider theo nhu cầu */
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNkng2yNcFwqKi0hz92w9HMU2bzdtsqOlGIdMJxVf2Ag&s');
        background-size: cover; /* Đảm bảo hình nền phù hợp với kích thước của phần tử */
        background-position: center; /* Canh chỉnh hình nền ở trung tâm */
    }
    .film-main__bg-outside{
        position: relative;
        width: 100%;
        height: 400px;
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMI08t-oCOHCMNrizH6qfYvZ4C-kPoVx59Td2x3CT7tDGbcaV13-izOaBrV-NG6-2nAlk&usqp=CAU');
        background-size: cover;
        background-position: center;
    }
    .voucher-main__bg-outside{
        position: relative;
        width: 100%;
        height: auto;
        background-image: url('');
        background-size: cover;
        background-position: center;
    }
</style>
<!-- CSS cho giải trí và contact us -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .content-wrapper {
        background-image: url("https://media.istockphoto.com/id/1138288769/vi/anh/n%E1%BB%81n-tr%E1%BB%ABu-t%C6%B0%E1%BB%A3ng-chuy%E1%BB%83n-%C4%91%E1%BB%99ng-m%E1%BB%9D-m%C3%A0u-t%C3%ADm-nh%E1%BA%A1t.jpg?s=612x612&w=0&k=20&c=0wnFN9C7__ia8PX7ZxPwCgUcCZiQ_23FbkTa4o1RKv8="); /* Đường dẫn đến hình ảnh nền */
        background-size: cover; /* Đảm bảo hình ảnh nền được hiển thị toàn bộ và không bị méo */
        background-position: center; /* Canh giữa hình ảnh nền */
        padding: 50px 0; /* Tùy chỉnh padding theo nhu cầu */
        opacity: 0.9; 
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .sec-heading {
        text-align: center;
        margin-bottom: 30px;
        padding-left: 50px; /* Thêm padding bên trái là 50px */
        padding-right: 50px; /* Thêm padding bên phải là 50px */
        padding-top: 50px; /*Thêm padding trên là 50px */
    }

    .sec-heading h2 {
        font-size: 36px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
        color: aliceblue;
    }

    .sec-heading p {
        font-size: 18px;
        color: #666;
        padding-top: 10px;
        color: aliceblue;
    }


    .service-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .cinema-rental-item {
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
    }

    .cinema-rental-item img {
        width: 300px;
        height: 200px;
        border-radius: 0.4rem;
        border: 2px solid #ccc;
        transition: transform 0.3s ease;
    }

    .cinema-rental-item:hover img {
        transform: scale(0.9);
    }

    /* Style for desktop view */
    .image.is-desktop {
        display: none;
    }

    /* Style for mobile view */
    .image.is-mobile {
        display: block;
    }

    /* Media query for desktop view */
    @media only screen and (min-width: 768px) {
        .image.is-desktop {
            display: block;
        }
        
        .image.is-mobile {
            display: none;
        }

        .cinema-rental-item {
            flex-basis: calc(33.3333% - 20px);
        }
    }
</style>

<style>
    /* CSS cho Contact us */
    .contact-section {
        background-image: url('https://nhadepso.com/wp-content/uploads/2023/02/hinh-nen-mau-tim_1.jpg');
        background-size: cover;
        background-position: center;
    }
    .heading {
        font-size: 24px; /* Cỡ chữ mong muốn */
    }

    .social-link .text {
        font-size: 18px; /* Cỡ chữ mong muốn */
    }

    /* Định dạng khung liên hệ và chữ */
    .contact-content {
        padding: 50px 0; /* Thay đổi giữa các giá trị theo nhu cầu */
    }

    .contact-box {
        background-color: #0056b3; /* Màu nền của khung liên hệ */
        padding: 30px;
        border-radius: 10px;
    }

    .contact-box h3.heading {
        font-size: 24px;
        color: white; /* Màu của tiêu đề "THÔNG TIN LIÊN HỆ" */
        padding-bottom: 10px;
    }

    .contact-details li {
        margin-bottom: 15px;
        font-size: 18px;
        color: white; /* Màu của nội dung liên hệ */
    }

    .contact-details li img {
        margin-right: 10px;
        width: 15px;
        height: 15px;
        background-color: transparent; /* Xóa nền của ảnh */
    }

    .contact-form .form-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box; /* Đảm bảo padding và border không tăng kích thước của ô input */
    }

    .contact-form .form-input::placeholder {
        color: #999; /* Màu của placeholder */
    }

    .contact-form button {
        padding: 10px 20px;
        background-color: yellow; /* Màu của nút "GỬI NGAY" */
        border: none;
        border-radius: 5px;
        font-size: 18px;
        color: black; /* Màu chữ trên nút */
        cursor: pointer;
    }

    .contact-form button:hover {
        background-color: white; /* Màu nền khi di chuột qua */
    }

    .contact-form .form-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /*Canh các ô input vào hai bên*/
    }

    .contact-form .form-item {
        flex: 1 1 auto; /* Phân chia ô input thành 50% của hàng và tạo khoảng cách */
        margin-bottom: 15px;
    }

    .contact-form .form-item:nth-child(odd) {
        margin-right: 20px; /* Khoảng cách giữa các ô input */
    }

    .contact-form .form-item:nth-child(even) {
        margin-right: 20px; /* Khoảng cách giữa các ô input */
    }

    .contact-form .form-item:last-child {
        flex-basis: 100%; /* Ô input cuối cùng chiếm toàn bộ chiều rộng */
        margin-right: 0;
        margin-left: 0;
    }
        .contact-details li {
        margin-bottom: 15px;
        font-size: 15px;
        color: #fff; /* Thay đổi màu chữ thành màu trắng */
        text-decoration: none; /* Loại bỏ gạch chân */
    }

    .contact-details li a {
        color: #fff; /* Thay đổi màu chữ của các liên kết thành màu trắng */
    }
    .social-link .text {
        color: #fff; /* Thay đổi màu chữ của các liên kết mạng xã hội thành màu trắng */
    }

    .section-heading .heading {
        color: #fff; /* Thay đổi màu chữ của tiêu đề "Liên hệ với chúng tôi" thành màu trắng */
    }

</style>

<style>
    .content-wrapper-other {
        background-image: url("data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgICAcHBw0IBwcHBw0HBwcHBw8ICQcNFREWFiARExMYHSggGBolJx8fITEhJSkrLi4uFx8zODMsNygtLisBCgoKDQ0NDg0NDysZFRk3LTctKzcrKysrKy0tKzc3LSsrLTcrNy0rKy0rKysrLS0tKy0tKysrKysrKysrKysrK//AABEIAKgBLAMBIgACEQEDEQH/xAAZAAEBAQEBAQAAAAAAAAAAAAABAAIDBQb/xAAZEAEBAQEBAQAAAAAAAAAAAAAAEQESAiH/xAAZAQEBAQEBAQAAAAAAAAAAAAAAAQIDBAX/xAAYEQEBAQEBAAAAAAAAAAAAAAAAEQESAv/aAAwDAQACEQMRAD8A+tST67skkCRiUBSBFFRHEsAtYMOCNYcGNYgcaxnGsA4ViApFVCKRU1jLWM6pxoYcY1CkmQBoI1gSI0Tgw4gg0ER46MUeiuYRhBkmKKAqKAioYtAcKEOYVhwDhxYcRDjWDGhVhWEEilUFI1U1gw4xocaGHGQpJlQDqRcCxHBpNYMaQAKRHkJqKO1c2SUUCaihQIpaCGElQQ5iJRFNYUWY1gxrMKLGhjQRQoqoKKqEUKsOLCzqHCsLIkki4NBCN5gOIoqawYcRENaCDy4oYo3XIRRqIozDDEUEUJWgihJQQorSI5ihKRZjWI4VYsOLDhViKK0iRS1QcRWojiOAiizqxApGsxkNBGoCjiBwjGkQApFjzYo0ma5RmKNJaRmEopBEStIEVCkRUK1YCYikTSOYtWI4swlIijCgJii0BUMWoCo1mLVgwnMMFgDUMRWII3FEVmGGHMRBmGNRRKrMEbijNV5kUaijnWIzE1FCkZhhhi0jMUahi0jEMahhSMxRvkxarEazGsw5hRnMMa5azyVGcw5jWYYUZijcMWoxFG4YtGIo3yYtGIcxvPJzytGcwxvMOYVaxFHSKJUrnFHTlRKVz5PLcOYzulY5PLcMZ30tc+Vy6wRKV5XK5deVyzWnLlcuvK5KOXJ5dOTyVHLk8unJ5KOXJ5deVCjnyeXSHkqVz5azy3yYVGOTy3DCjGYeW4YtRiKNwxaMcqNxRqjMMJi1RDmE5hRZhhMKjMUaRRmKNAIIYSysWYoYWRmKNBEefFGk510jMUaRSCKElSMwwkpBFCSkEMRKQQxVUqcmEVVavJQqq05KCaq8lArSEg5hSE4jmFSIqGFSBNRRc0jKah5aqs5hzGsxqJUrOYmoYiMCNwRKPNVPK5eWvRBVTzp5Kc4KqeVyUmCk8nlaTGamuTwUmMpvk8rSYwnTk8rUc4o6cnkpXOGOnK5WpXOGOnJ5WpXPPJ5dM8nPK1mueeWs8umeWs8lSuWeWs8umeTFpXPk8ukUKlY5PLajVSscnluKFSs8nlpJUZhhqFZgjaB53K5w1V5a9I5XLVVWg5XJqpRcrlU0oooaqVFDyqqVFDBTVooYKqtSGGDpdKkaiZ6VVI2XOmg3TWEtZbqrJKjVLBWjdVYKjVVZiglNVUUKlRUUKE0RFHnJJ5XpqSQVFJRFIKkUqVJJSn6klSmKJKm6YYkrNMMSE3TDEhmqHMSEpiiQUwwJpKYYkqUxQpGaoYkFUUSCmKJKV//Z");
        background-size: cover; /* Đảm bảo hình ảnh nền được hiển thị toàn bộ và không bị méo */
        background-position: center; /* Canh giữa hình ảnh nền */
        padding: 50px 0; /* Tùy chỉnh padding theo nhu cầu */
        opacity: 0.9; 
    }
    /* CSS cho Member program */
    .cinema-rental-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .cinema-rental-item .image {
        margin-bottom: 15px;
    }

    .cinema-rental-item .image img {
        max-width: 100%;
        height: auto;
    }

    .cinema-rental-heading h4.tittle {
        font-size: 24px;
        font-weight: bold;
        color: white; /* Màu chữ */
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .cinema-rental-body p.desc {
        color: white; /* Màu chữ */
        margin-bottom: 10px;
    }

    .cinema-rental-item a.btn.btn-primary {
        display: block;
        padding: 5px 18px;
        font-size: 15px;
        line-height: 36px;
        border: 2px solid #ffc107; /* Màu viền */
        background-color: #ffc107; /* Màu nền */
        color: #fff; /* Màu chữ */
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .cinema-rental-item a.btn.btn-primary:hover {
        background-color: transparent;
        color: #ffc107; /* Màu chữ */
    }
</style>

<body>
    <!-- slider -->
    <div class="slide-show__container">

        <div class=" slide-show__main">
            
            <div class="slide-show--click">
                <?php
                $i = 0;
                $d_none = '';
                    foreach(getAllFilmLimitSixFilm() as $row){
                        $film_slider = $row['film_Slider'];
                        $film_photo = $row['film_photo'];
                    ?>
                        
                        <img class="slide-show__img <?= $d_none ?> fade" src="/assets/img/<?= $film_slider ?>">
                        
                    <?php
                        $d_none = 'd-none';
                    }
                    ?>
                <a class="slider-prev" onclick="backImg()">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <a class="slider-next" onclick="nextImg()">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
        
        </div>
    </div>

    <!-- film -->
    <div class="film-main__bg-outside">
        <h1 class="film-main__header">LỰA CHỌN PHIM</h1>
        <div class="film-main container">
            <div class="film-main__row">
                

                <div id="film-main__list" class="film-main__list">
                    
                    <div id="film-main__inner-list" class="film-main__inner-list">
                        <?php
                            foreach(getAllFilmLimitSixFilm() as $row){
                                $url = '';
                                $file_name = basename($_SERVER['PHP_SELF']);
                                if($file_name != 'index.php'){
                                    
                                }
                        ?>
                            <a href="?page=describe&filmID=<?= $row['film_ID'] ?>" title="<?= $row['film_Name'] ?>" class="film-main__items col-l-2 col-md-3 col-sm-6">
                                <img src="<?php echo '/assets/img/'. $row['film_photo'] ?>" alt="" class="film-main__items--img">
                                <div class="film-main__items-booking">
                                    <h1 class="film-main__items-title"><?= $row['film_Name'] ?></h1>
                                    <button class="film-main__btn" type="submit">ĐẶT VÉ</button>
                                </div>
                            </a>
                        <?php
                            }
                        ?>

                    </div>
                    <a onclick="onClickFilmMainLeft()" id="film-main__click--left" class="film-main__click--left">
                        <i class="fa-solid fa-circle-chevron-left"></i>
                    </a>
    
                    <a onclick="onClickFilmMainRight()" id="film-main__click--right" class="film-main__click--right">
                        <i class="fa-solid fa-circle-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- voucher -->
    <div class="voucher-main__bg-outside">
        <div class="container">
            <div class="row">
                <h1 class="voucher-main__header col-l-12 col-md-12 col-sm-12">MÃ KHUYẾN MÃI</h1>

                <?php
                    foreach(getAllVoucher() as $row){
                        $voucher_ID = $row['voucher_ID'];
                        $voucher_EXP = $row['voucher_EXP'];
                        $voucher_Discount = $row['voucher_Discount'];
                        $voucher_Describe = $row['voucher_Description'];
                        $voucher_photo = $row['voucher_Photo'];
                ?>

                    <a href="?page=user_account&user=news_notice" class="voucher-main__items col-l-6 col-md-6 col-sm-12">
                        <img class="voucher-main__img" src="/assets/img/<?= $voucher_photo ?>" alt="" srcset="">
                    </a>
                <?php
                    }
                ?>

            </div>
        </div>
    </div>

    <!-- member program -->
    <div class="content-wrapper-other">
        <div class="container">
            <div class="sec-heading" data-aos="fade-up">
                <h2 class="heading">CHƯƠNG TRÌNH THÀNH VIÊN</h2>
                <p class="des">
                    Cinestar cung cấp cho bạn các loại hình thành viên đặc biệt.
                </p>
            </div>
            <div class="service-content">
                <div class="cinema-rental-list row">
                    <div class="cinema-rental-item col col-4" data-aos="fade-up">
                        <a href="?page=user_account&user=memberships">
                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/CMSPage/Member/Desktop519x282_CMember.jpg" alt="" class="rounded-[0.4rem] is-mobile"/>
                            <div class="image is-desktop">
                                <img src="./assets/images/img-service0.jpg" alt="">
                            </div>
                        </a>
                        <div class="content-main">
                            <div class="address-box">
                                <div class="cinema-rental-heading"><h4 class="tittle">THÀNH VIÊN C'FRIEND</h4></div>
                                <div class="cinema-rental-body"><p class="desc">Thẻ thành viên C'Friends là thẻ dành cho thành viên, khách hàng mới.</p></div>
                            </div>
                        </div>
                        <a href="?page=user_account&user=memberships" class="btn btn-primary">Tìm hiểu ngay</a>
                    </div>
                    <div class="cinema-rental-item col col-4" data-aos="fade-up">
                        <a href="?page=user_account&user=memberships">
                            <img src="https://api-website.cinestar.com.vn/pub/media/wysiwyg/CMSPage/Member/c-vip.jpg" alt="" class="rounded-[0.4rem] is-mobile"/>
                            <div class="image is-desktop">
                                <img src="./assets/images/img-service1.jpg" alt="">
                            </div>
                        </a>
                        <div class="content-main">
                            <div class="address-box">
                                <div class="cinema-rental-heading"><h4 class="tittle">THÀNH VIÊN VIP</h4></div>
                                <div class="cinema-rental-body"><p class="desc">Thẻ thành viên VIP dành cho thành viên có những ưu đãi độc quyền.</p></div>
                            </div>
                        </div>
                        <a href="?page=user_account&user=memberships" class="btn btn-primary">Tìm hiểu ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- games events -->
    <div class="content-wrapper">
        <div class="container">
        <div class="sec-heading" data-aos="fade-up">
            <h2 class="heading">TẤT CẢ CÁC GIẢI TRÍ</h2>
            <p class="des">
            Ngoài hệ thống rạp chiếu phim chất lượng cao, Cinestar còn cung cấp
            cho bạn nhiều loại hình giải trí tuyệt vời khác.
            </p>
        </div>
            <div class="service-content">
                    <div class="cinema-rental-list row">
                        <div class="cinema-rental-item col col-4" data-aos="fade-up">
                            <a href="/kidzone">
                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/CMSPage/Service/bg-kidzone_home.webp" alt="" class="rounded-[0.4rem] is-mobile"/>
                            <div class="image is-desktop"><img src="./assets/images/img-service0.jpg" alt="">
                                <!-- <div class="content-main">
                                    <div class="address-box">
                                        <div class="cinema-rental-heading"><h4 class="sub-tittle">Kid Zone</h4></div>
                                        <div class="cinema-rental-body"><p class="desc">Khu vui chơi trẻ em.</p></div>
                                        <div class="cinema-rental-link"><span class="txt">Tìm hiểu thêm</span><span
                                            class="ic ani-f"><img src="./assets/images/ic-arr-right.svg" alt=""></span><span
                                            class="ic ani-s"><img src="./assets/images/ic-arr-right.svg" alt=""></span></div>
                                    </div>
                                </div> -->
                            </div></a>
                        </div>
                        <div class="cinema-rental-item col col-4" data-aos="fade-up">
                            <a href="/bowling">
                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/CMSPage/Service/bg-bowling_home.webp" alt="" class="rounded-[0.4rem] is-mobile"/>
                                <div class="image is-desktop"><img src="./assets/images/img-service1.jpg" alt="">
                                <!-- <div class="content-main">
                                    <div class="address-box">
                                        <div class="cinema-rental-heading"><h4 class="sub-tittle">Bowling</h4></div>
                                        <div class="cinema-rental-body"><p class="desc"></p></div>
                                        <div class="cinema-rental-link" ><span class="txt">Tìm hiểu thêm</span><span
                                            class="ic ani-f"><img src="./assets/images/ic-arr-right.svg" alt=""></span><span
                                            class="ic ani-s"><img src="./assets/images/ic-arr-right.svg" alt=""></span></div>
                                    </div>
                                </div> -->
                            </div></a>
                        </div>
                        <div class="cinema-rental-item col col-4" data-aos="fade-up">
                            <a href="/billiard">
                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/CMSPage/Service/bg-billiard_home.webp" alt="" class="rounded-[0.4rem] is-mobile"/>
                                <div class="image is-desktop"><img src="./assets/images/img-service2.jpg" alt="">
                                <!-- <div class="content-main">
                                    <div class="address-box">
                                        <div class="cinema-rental-heading"><h4 class="sub-tittle">Billiard</h4></div>
                                        <div class="cinema-rental-body"><p class="desc"></p></div>
                                        <div class="cinema-rental-link"><span class="txt">Tìm hiểu thêm</span><span
                                            class="ic ani-f"><img src="./assets/images/ic-arr-right.svg" alt=""></span><span
                                            class="ic ani-s"><img src="./assets/images/ic-arr-right.svg" alt=""></span></div>
                                    </div>
                                </div> -->
                            </div></a>
                        </div>
                        <div class="cinema-rental-item col col-4" data-aos="fade-up">
                            <a href="/restaurant">
                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/CMSPage/Service/bg-restaurant_home.webp" alt="" class="rounded-[0.4rem] is-mobile"/>
                                <div class="image is-desktop"><img src="./assets/images/img-service3.jpg" alt="">
                                <!-- <div class="content-main">
                                    <div class="address-box">
                                        <div class="cinema-rental-heading"><h4 class="sub-tittle">Food and Drink</h4></div>
                                        <div class="cinema-rental-body"><p class="desc"></p></div>
                                        <div class="cinema-rental-link" ><span class="txt">Tìm hiểu thêm</span><span
                                            class="ic ani-f"><img src="./assets/images/ic-arr-right.svg" alt=""></span><span
                                            class="ic ani-s"><img src="./assets/images/ic-arr-right.svg" alt=""></span></div>
                                    </div>
                                </div> -->
                            </div></a>
                        </div>
                        <div class="cinema-rental-item col col-4" data-aos="fade-up">
                            <a href="/gym">
                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/CMSPage/Service/bg-gym-image_home.webp" alt="" class="rounded-[0.4rem] is-mobile"/>
                                <div class="image is-desktop"><img src="./assets/images/img-service4.jpg" alt="">
                                <!-- <div class="content-main">
                                    <div class="address-box">
                                        <div class="cinema-rental-heading"><h4 class="sub-tittle">Gym</h4></div>
                                        <div class="cinema-rental-body"><p class="desc"></p></div>
                                        <div class="cinema-rental-link" ><span class="txt">Tìm hiểu thêm</span><span
                                            class="ic ani-f"><img src="./assets/images/ic-arr-right.svg" alt=""></span><span
                                            class="ic ani-s"><img src="./assets/images/ic-arr-right.svg" alt=""></span></div>
                                    </div>
                                </div> -->
                            </div></a>
                        </div>
                        <div class="cinema-rental-item col col-4" data-aos="fade-up">
                            <a href="/opera">
                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/CMSPage/Service/bg-opera-banner_home.webp" alt="" class="rounded-[0.4rem] is-mobile"/>
                                <div class="image is-desktop"><img src="./assets/images/img-service5.jpg" alt="">
                                <!-- <div class="content-main">
                                    <div class="address-box">
                                        <div class="cinema-rental-heading"><h4 class="sub-tittle">Nhà hát Đà Lạt Opera House</h4></div>
                                        <div class="cinema-rental-body"><p class="desc"> </p></div>
                                        <div class="cinema-rental-link" ><span class="txt">Tìm hiểu thêm</span><span
                                            class="ic ani-f"><img src="./assets/images/ic-arr-right.svg" alt=""></span><span
                                            class="ic ani-s"><img src="./assets/images/ic-arr-right.svg" alt=""></span></div>
                                    </div>
                                </div> -->
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Contact us-->
    <section class="contact-section">
        <div class="contact-content section-padding">
            <div class="container">
            <div class="content-side row">
                <div class="left-content col col-6" data-aos="fade-up">
                <div class="left-content-inner">
                    <div class="section-heading">
                    <h2 class="heading">Liên hệ với chúng tôi</h2>
                    </div>
                    <div class="social-links">
                    <a class="social-link" href="https://www.facebook.com/HuynhHoangTienDatt/" target="_blank" rel="noreferrer">
                        <img src="https://cinestar.com.vn/assets/images/ct-1.webp" alt=""/>
                        <span class="text">FACEBOOK</span>
                    </a>
                    <a class="social-link" href="https://zalo.me/2861828859391058401" target="_blank" rel="noreferrer">
                        <img src="https://cinestar.com.vn/assets/images/ct-2.webp" alt=""/>
                        <span class="text">ZALO CHAT</span>
                    </a>
                    </div>
                </div>
                </div>
                <div class="right-content col col-6" data-aos="fade-up">
                <div class="contact-box">
                    <h3 class="heading">THÔNG TIN LIÊN HỆ</h3>
                    <ul class="contact-details">
                    <li>
                        <img src="https://i.pinimg.com/736x/a1/84/0a/a1840a14b487ef2bee618d080221ec13.jpg" alt=""/>
                        <a href="mailto:huynhdat10a1006@gmail.com">huynhdat10a1006@gmail.com</a>
                    </li>
                    <li>
                        <img src="https://static.vecteezy.com/system/resources/previews/003/720/498/original/phone-icon-telephone-icon-symbol-for-app-and-messenger-vector.jpg" alt=""/>
                        <a href="tel:0985723241">098 572 3241</a>
                    </li>
                    <li>
                        <img src="data:image/png;base64,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" alt=""/>
                        <a href="https://www.google.com/maps/place/19+%C4%90.+Nguy%E1%BB%85n+H%E1%BB%AFu+Th%E1%BB%8D,+T%C3%A2n+H%C6%B0ng,+Qu%E1%BA%ADn+7,+Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.7326452,106.697189,17z/data=!3m1!4b1!4m6!3m5!1s0x31752fbd7d343a57:0xb5ca26918dff0578!8m2!3d10.7326399!4d106.6997639!16s%2Fg%2F11c5jdpjy4?hl=vi-VN&entry=ttu" 
                        target="_blank" rel="noreferrer">19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Thành phố Hồ Chí Minh, Việt Nam</a>
                    </li>
                    </ul>
                    <div class="contact-form">
                    <form>
                        <div class="form-list row">
                        <div class="form-item col">
                            <input class="form-input" type="text" name="fullname" required placeholder="Họ và tên"/>
                        </div>
                        <div class="form-item col">
                            <input class="form-input" type="email" name="email" required placeholder="Email của bạn"/>
                        </div>
                        <div class="form-item col">
                            <textarea class="form-input" name="message" cols="30" rows="10" required placeholder="Thông điệp bạn muốn truyền tải"></textarea>
                        </div>
                        </div>
                        <button class="btn btn-primary btn-pad-2" type="submit">
                        <span class="button-text">GỬI NGAY</span>
                        </button>
                    </form>
                    </div>
                </div>
                <div class="hidden">
                    <div class="loading-icon">
                    <div class="loading-wrapper">
                        <div class="loading-box">
                        <div class="inner"></div>
                        </div>
                        <div class="loading-line"></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
</section>

</body>

<script>
    setIntervalSlider()
</script>