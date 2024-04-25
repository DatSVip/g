<?php
    if(!empty($_SESSION['cus_ID'])){
        $acc_ID = $_SESSION['cus_ID'];
    ?>
        <body>
            <div class="bg--outside">
                <form action="" method="post">
                
                    <div class="container change-pass__container">
                        <div class="row">
                            <h1 class="change-pass__title">Thay đổi mật khẩu</h1>
            
                            <div class="change-pass__content">
                                <div class="change-pass__outter">
                                    <p class="change-pass__para">Mật khẩu mới</p>
                                    <input type="password" class="change-pass__input" name="change-pass__input" id="">
                                </div>
                                
                                <div class="change-pass__outter">
                                    <p class="change-pass__para">Nhập lại mật khẩu mới </p>
                                    <input type="password" class="change-pass__input" name="change-pass__re-input" id="">
                                </div>
    
                            </div>

                            <?php
                                if(isset($_POST['change-pass__btn'])){
                                    if(!empty($_POST['change-pass__input']) && !empty($_POST['change-pass__re-input'])){
                                        $newPass = $_POST['change-pass__input'];
                                        $reNewPass = $_POST['change-pass__re-input'];
                                        if($newPass == $reNewPass){
                                            updatePassWord(md5($newPass), $acc_ID);
                                            echo "<p class='col-l-12 col-md-12 col-sm-12' style='color: red; font-weight: bold; text-align:center;'>Thay đổi của bạn đã được lưu lại!</p>";
                                            unset($_SESSION['cus_ID']);
                                            unset($_SESSION['email']);
                                            updateAccCodeForgot(null, $acc_ID);
                                            // sleep(5);
                                            header('location: login_signup.php');
                                        }else{
                                            echo "<p class='col-l-12 col-md-12 col-sm-12' style='color: red; font-weight: bold; text-align:center;'>Mật khẩu mới và mật khẩu cũ không được trùng nhau!</p>";
                                        }
                                    }else{
                                        echo "<p class='col-l-12 col-md-12 col-sm-12' style='color: red; font-weight: bold; text-align:center;'>Vui lòng điền đầy đủ thông tin!</p>";
                                    }
                                }
                            ?>
                            
                            <button name="change-pass__btn" class="change-pass__btn">Thay đổi <button>
    
                            <div class="row forgot-pass__voucher">
                                <h1 class="voucher-main__header col-l-12 col-md-12 col-sm-12">VOUCHER</h1>
    
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
                </form>
            </div>
        </body>
        
    <?php
    }else{
        header('location: login_signup.php');
    }
?>
