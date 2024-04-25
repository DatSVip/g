<body>

    <div class="manage-user">
        <!-- <form onsubmit="" action="" method="post"> -->

            <h1 class="manage-user__title">QUẢN LÝ NGƯỜI DÙNG</h1>
    
            <input placeholder="Tìm kiếm khách hàng trong tất cả" type="text" name="" id="search-input" class="manage-film__input">

            <table id="table" class="manage-user__table">
                <tbody class="manage-user__tbody">
                    <tr class="manage-user__tr">
                        <th class="manage-user__th">ID Khách hàng</th>
                        <th class="manage-user__th">Tên khách hàng</th>
                        <th class="manage-user__th">Số điện thoại khách hàng</th>
                        <!-- <th class="manage-user__th">Cus_Password</th> -->
                        <th class="manage-user__th">Email khách hàng</th>
                        <th class="manage-user__th">Ngày tháng năm sinh</th>
                        <th class="manage-user__th">Giới tính khách hàng</th>
                        <th class="manage-user__th">Trạng thái tài khoảkhoản</th>
                        <th class="manage-user__th">Khóa tài khoản</th>
                        <!-- <th class="manage-user__th">Reset Password</th> -->
                        <!-- <th class="manage-user__th">Edit</th> -->
                        <th class="manage-user__th">Xóa</th>
                        <!-- <th class="manage-user__th">Reset Password</th> -->
                    </tr>
    
                    <?php
                        foreach (displayAccount() as $row){
                            $customer_ID = $row['cus_ID'];
                            $customer_Name = $row['cus_Name'];
                            $customer_Phone_number = $row['cus_Phone_number'];
                            $customer_Password = $row['acc_Password'];
                            $customer_Email = $row['cus_Email'];
                            $customer_DOB = $row['cus_DOB'];
                            $customer_Sex= $row['cus_Sex'];
                            $account_isActive= $row['acc_isActive'];
                    ?>
                        <tr class="manage-film__tr">
                            <input type="hidden" value="<?= $customer_ID ?>" name="">
                            <td class="manage-user__td"><?= $customer_ID ?></td>
                            <td class="manage-user__td"><?= $customer_Name ?></td>
                            <td class="manage-user__td"><?= $customer_Phone_number ?></td>
                            <!-- <td class="manage-booking__items"><= $customer_Password ?></td> -->
                            <td class="manage-user__td"><?= $customer_Email ?></td>
                            <td class="manage-user__td"><?= dayReverse($customer_DOB) ?></td>
                            <td class="manage-user__td"><?= $customer_Sex ?></td>
                            <td class="manage-user__td"><?= $account_isActive ?></td>
                            <td class="manage-user__td">
                                <a href="?page=manage_user_lock&cusID=<?= $customer_ID ?>&isActive=<?= $account_isActive ?>" id="<?= $customer_ID ?>" class="<?= $account_isActive ?> manage-user__btn">
                                    <i class="manage-user__icon fa-solid fa-key"></i>
                                </a>
                            </td>
                            <!-- <td id="" class="manage-user__td">
                                <a href="?page=manage_user_refresh&cusID=<= $customer_ID ?>" id="" class="manage-user__btn">
                                    <i class="manage-user__icon fa-solid fa-refresh"></i>    
                                </a>
                            </td> -->

                            <td id="" class="manage-user__td">
                                <div onclick="onClickDelete(this.id)" id="<?= $customer_ID ?>" class="manage-user__btn">
                                    <i class="manage-user__icon fa-solid fa-trash"></i>
                                </div>
                            </td>
    
                        </tr>                   
                    <?php
                        }
                        
                    ?>
                    <input type="hidden" id="manage-lock-btn" name="manage-lock-btn" value="">
                </tbody>
            </table>

            <div onclick="onClickModal(this.id)" id="modal" class="modal d-none"></div>
            <!-- delete response -->
            <div id="delete-res" class="delete-res d-none">
                <h1 id="delete-res__title" class="delete-res__title"></h1>
                <div class="delete-res__site">
                    <a id="delete-res__link" class="delete-res__items" href="">Đồng ý</a>
                    <a class="delete-res__items" href="?page=manage_user">Không đồng ý</a>
                </div>
            </div>

        <!-- </form> -->
    </div>
</body>
<script>
    searchFilm();
</script>