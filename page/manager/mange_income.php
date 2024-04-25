<body>
<div class="manage-user">
        <!-- <form onsubmit="" action="" method="post"> -->

        <h1 class="manage-user__title">QUẢN LÝ THU NHẬP</h1>

        <input placeholder="Tìm vé trong tất cả" type="text" name="" id="search-input" class="manage-income__search manage-film__input">

        <div class="manage-income__navbar">
    
            <div class="manage-income__date">
                <div class="manage-income__select--choice">

                    <select class="manage-income__select" name="select-room" id="select-room">
                        <option value="none">Phòng chiếu</option>
                        <?php
                            foreach(getAllRoom() as $row){
                                $room_ID = $row['room_ID'];
                                ?>
                                    <option value="<?= $room_ID ?>"><?= $room_ID ?></option>
                                
                                <?php
                            }
                        ?>
                    </select>
    
                    <select class="manage-income__select" name="select-choice" id="select-choice">
                        <option value="none">Lựa chọn</option>
                        <option value="monthly_ticket">
                            Vé trong tháng
                        </option>
                        <option value="monthly_money">
                            Tính tiền trong tháng
                        </option>
                        <option value="seat_book_in_month">
                            Ghế ngồi được đặt trong tháng
                        </option>
                        <option value="film_hot">
                            Phim phổ biến trong tháng
                        </option>
                    </select>
                    
                    <select class="manage-income__select" name="select-date" id="select-date">
                        <option value="none">Tháng</option>
                        <?php
                            for($i = 1; $i <= 12; $i++){
                                ?>
                                <option value="<?= $i ?>">
                                    <?= getMonth($i) ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <button id="manage-income__btn" class="manage-income__btn">Tính toán</button>
                <div id="manage-income__result" class="manage-income__result">
                    
                </div>
            </div>
        </div>

        <table id="table" class="manage-user__table">
            <tbody class="manage-user__tbody">
                <tr class="manage-user__tr">
                    <th class="manage-user__th">ID Vé</th>
                    <th class="manage-user__th">ID Tài khoản</th>
                    <th class="manage-user__th">ID Danh mục/th>
                    <!-- <th class="manage-user__th">Cus_Password</th> -->
                    <th class="manage-user__th">ID Phim</th>
                    <th class="manage-user__th">Thể loại phim</th>
                    <th class="manage-user__th">ID Thời lượng</th>
                    <th class="manage-user__th">ID Vị trí ngồi/th>
                    <th class="manage-user__th">ID Phòng chiếu</th>
                    <!-- <th class="manage-user__th">Reset Password</th> -->
                    <!-- <th class="manage-user__th">Edit</th> -->
                    <th class="manage-user__th">Mã khuyến mãi</th>
                    <th class="manage-user__th">Gói</th>
                    <th class="manage-user__th">Giá vé</th>
                    <th class="manage-user__th">Ngày thanh toán</th>
                    <!-- <th class="manage-user__th">Reset Password</th> -->
                </tr>

                <?php
                    foreach (getAllTicket() as $row){
                        $ticket_ID = $row['ticket_ID'];
                        $acc_ID = $row['acc_ID'];
                        $cluster_ID = $row['cluster_ID'];
                        $film_ID = $row['film_ID'];
                        $type_Name = $row['type_Name'];
                        $sht_ID = $row['sht_ID'];
                        $seat_ID = $row['seat_ID'];
                        $room_ID = $row['room_ID'];
                        $voucher_ID = $row['voucher_ID'];
                        $ticket_Price = $row['ticket_Price'];
                        $ticket_Date = $row['ticket_Date'];
                ?>
                    <tr class="manage-film__tr">
                        <td class="manage-user__td"><?= $ticket_ID ?></td>
                        <td class="manage-user__td"><?= $acc_ID ?></td>
                        <td class="manage-user__td"><?= $cluster_ID ?></td>
                        <td class="manage-user__td"><?= $film_ID ?></td>
                        <td class="manage-user__td"><?= $type_Name ?></td>
                        <td class="manage-user__td"><?= $sht_ID ?></td>
                        <td class="manage-user__td"><?= $seat_ID ?></td>
                        <td class="manage-user__td"><?= $room_ID ?></td>
                        <td class="manage-user__td"><?= $voucher_ID ?></td>
                        <td class="manage-user__td"><?= getComboNameByTicketID($ticket_ID) ?></td>
                        <td class="manage-user__td"><?= $ticket_Price ?></td>
                        <td class="manage-user__td"><?= dayReverse($ticket_Date) ?></td>

                    </tr>                   
                <?php
                    }
                    
                ?>
                <input type="hidden" id="manage-lock-btn" name="manage-lock-btn" value="">
            </tbody>
        </table>
</body>
<script>
    function onClickIncomeMonthly(){
        $().ready(()=>{
        $('#manage-income__btn').click(()=>{
            $.ajax({
                url: '/page/manager/manage_income_model/manage_income_monthly.php',
                type: 'post',
                data: {
                    choice: $('#select-choice').val(),
                    month: $('#select-date').val(),
                    room: $('#select-room').val(),
                },
                
            }).done( function(result){
                $('#manage-income__result').html(result);
            })
        })
    })
    }
    
    onClickIncomeMonthly();

    searchFilm()
</script>