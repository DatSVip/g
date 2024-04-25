window.onload = () => {
    
}

// ===================================<<Main page>>========================================
let scrollPositionLeft = 0;
function onClickFilmMainLeft(){
    let film_main_list = document.getElementById('film-main__inner-list');
    
    // let leftClick = document.getElementById('film-main__click--left');
    // let rightClick = document.getElementById('film-main__click--right');

    if(scrollPositionLeft < 0){
        // film_main_list.style.transform = `translateX(0px)`;
        scrollPositionLeft += 100;
        film_main_list.style.transform = `translateX(${scrollPositionLeft}px)`;
        film_main_list.style.transition = 'transform linear 0.3s';

    }else{
        film_main_list.style.transform = `translateX(0px)`;
    }
}

let scrollPositionRight = 0;
function onClickFilmMainRight(){
    let film_main_list = document.getElementById('film-main__inner-list');
    
    let itemsWidth = 159;
    let containerWidth = 795;
    // console.log(film_main_list.offsetWidth)
    let maxScrollPos = film_main_list.offsetWidth - containerWidth;

    // scrollPosition -= itemsWidth;
    if(scrollPositionRight < maxScrollPos){
        scrollPositionRight += itemsWidth;
        film_main_list.style.transform = `translateX(-${scrollPositionRight}px)`;
        film_main_list.style.transition = 'transform linear 0.3s';
        // film_main_list.style.animation = 'moveLinearLeft linear 1s'
    }else{
        scrollPositionRight = 0;
        film_main_list.style.transform = `translateX(-${scrollPositionRight}px)`;
        film_main_list.style.transition = 'transform linear 0.3s';
    }
}

// ===================================<<main_page>>=================================
// ==============<<slider>>=============
let slideIndex = 0

function nextImg(){
    if(slideIndex >= document.getElementsByClassName('slide-show__img').length - 1){
        slideIndex = -1
    }

    let imgItems = document.getElementsByClassName('slide-show__img')[++slideIndex];
    // console.log(imgItems)

    for(let i = 0; i < document.getElementsByClassName('slide-show__img').length; i++){
        let imgD_none = document.getElementsByClassName('slide-show__img')[i];
        if(!imgD_none.classList.contains('d-none')){
            imgD_none.classList.add('d-none');
        }
    }
    
    if(imgItems.classList.contains('d-none')){
        imgItems.classList.remove('d-none');
    }
    
}

function backImg(){
    if(slideIndex <= 0){
        slideIndex = document.getElementsByClassName('slide-show__img').length;
    }

    let backImgItems = document.getElementsByClassName('slide-show__img')[--slideIndex];

    for(let i = 0; i < document.getElementsByClassName('slide-show__img').length; i++){
        let imgD_none = document.getElementsByClassName('slide-show__img')[i];
        if(!imgD_none.classList.contains('d-none')){
            imgD_none.classList.add('d-none');
        }
    }

    if(backImgItems.classList.contains('d-none')){
        backImgItems.classList.remove('d-none');
    }
    
}

function setIntervalSlider(){
    return setInterval(()=>{
        nextImg()
    }, 3000)
}


// =====================================<<Booking - Describe>>==========================================
var onClickToSearchInBooking = 0;
function onClickToSearch(){
    // let btnChooseCluster = document.getElementById('booking-site__btn--choose-cluster');
    // let areaVal = document.getElementById('booking-site__choice--area').value;
    // let clusterClass = 'booking-site__choice--cluster-'+ areaVal;

    // let clusterItems = document.getElementsByClassName(clusterClass);
    // console.log(clusterItems);
    let areaChoice = document.getElementById('booking-site__choice--area');
    let typeChoice = document.getElementById('booking-site__choice--type');
    let dateChoice = document.getElementById('booking-site__choice--date-select');

    let clusterDiv = document.getElementById('booking-site__choice--cluster');
    if(clusterDiv.classList.contains('d-none')){
        clusterDiv.classList.remove('d-none');
        onClickToSearchInBooking = 1;
        areaChoice.disabled = true;
        typeChoice.disabled = true;
        dateChoice.disabled = true
    }

}

function onClickToReset(){
    let areaChoice = document.getElementById('booking-site__choice--area');
    let typeChoice = document.getElementById('booking-site__choice--type');
    let dateChoice = document.getElementById('booking-site__choice--date-select');
    
    let clusterDiv = document.getElementById('booking-site__choice--cluster');
    if(!clusterDiv.classList.contains('d-none')){
        clusterDiv.classList.add('d-none');
        onClickToSearchInBooking = 0;
        areaChoice.disabled = false;
        typeChoice.disabled = false;
        dateChoice.disabled = false;
    }
}

// ==============================<<Booking>>============================
// <========================= check lại nên bỏ hay ko ==========================
function onClickArea(id){
    // console.log(id);
    let clusterID = id + "-cluster";

    for(let i = 0; i < document.getElementsByClassName('booking-site--items-cluster'); i++){
        let allCluster = document.getElementsByClassName('booking-site--items-cluster')[i];
        if(!allCluster.classList.contains('d-none')){
            allCluster.classList.add('d-none');
        }
    }

    for(let i = 0; i < document.getElementsByClassName(clusterID).length; i++){
        let cluster = document.getElementsByClassName(clusterID)[i];
        if(cluster.classList.contains('d-none')){
            cluster.classList.remove('d-none');
        }
    }
}
// <===============================================================

// ok
function ajaxInBookingTicket(){
    $().ready(()=>{
        $('#booking-site__btn--choose-search').click(()=>{
            $.ajax({
                url: '/page/customer/booking_model/booking_ticket.php',
                type: 'post',
                data: {
                    filmID: $('#filmID').val(),
                    areaID: $('#booking-site__choice--area').val(),
                    typeFilm: $('#booking-site__choice--type').val(),
                    Date: $('#booking-site__choice--date-select').val()
                },
                
            }).done( function(result){
                $('#booking-site__choice--cluster').html(result);
            })
        })
    })
}
// ok
function ajaxInBookingTicketInCluster(){
    $().ready(()=>{
        $('#booking-site__btn--choose-search').click(()=>{
            $.ajax({
                url: '/page/customer/booking_model/booking_in_cluster.php',
                type: 'post',
                data: {
                    clusterID: $('#input__cluster').val(),
                    // areaID: $('#booking-site__choice--area').val(),
                    typeFilm: $('#booking-site__choice--type').val(),
                    Date: $('#booking-site__choice--date-select').val(),
                },
                
            }).done( function(result){
                $('#booking-site__choice--film').html(result);
            })
        })
    })
}

// ==================================<<Booking seat>>==============================
function onClickSeat(id){
    let seatIsChoosing = document.getElementById(id);
    let trSeatID = "booking-seat-tr__"+id;
    let trSeat = document.getElementById(trSeatID);

    let input_SeatID_Atrr = "input-seat__"+id;
    let input_TrSeatID = document.getElementById(input_SeatID_Atrr);
    let input_TrSeatName = trSeatID;

    let seatPriceID = "booking-seat__content--td-seat-price_"+id
    let seatPrice = document.getElementById(seatPriceID);
    // console.log(seatPrice);

    
    if(seatIsChoosing.classList.contains('choosing-seat') && !trSeat.classList.contains('d-none')){
        seatIsChoosing.classList.remove('choosing-seat');
        trSeat.classList.add('d-none');
        input_TrSeatID.removeAttribute("name", input_TrSeatName);
        seatPrice.classList.remove('choosing-ticket');
        
    }else{
        if(!seatIsChoosing.classList.contains('choosing-seat') && trSeat.classList.contains('d-none')){
            seatIsChoosing.classList.add('choosing-seat');
            trSeat.classList.remove('d-none');
            input_TrSeatID.setAttribute("name", input_TrSeatName);
            seatPrice.classList.add('choosing-ticket');
        }
    }

    let btnPurchase = document.getElementById('booking-seat__btn-pay');
    // console.log(btnPurchase)
    // let isTrue = false;
    let count = 0;
    for(let i = 0; i < document.getElementsByClassName('booking-seat__content--seat-items').length; i++){
        let seatItems = document.getElementsByClassName('booking-seat__content--seat-items')[i];
        if(seatItems.classList.contains('choosing-seat')){
            count++
        }
    }
    // console.log(count);
    if(count > 0){
        if(btnPurchase.classList.contains('disabled-tag')){
            btnPurchase.classList.remove('disabled-tag');
        }
    }else if(count == 0){
        if(!btnPurchase.classList.contains('disabled-tag')){
            btnPurchase.classList.add('disabled-tag');
        }
    }
    
    let totalPrice = 0;
    for(let i = 0; i < document.getElementsByClassName('booking-seat__content--td-seat-price').length; i++){
        let seatPriceItems = document.getElementsByClassName('booking-seat__content--td-seat-price')[i];
        if(seatPriceItems.classList.contains('choosing-ticket')){
            totalPrice += parseInt(seatPriceItems.innerHTML);
        }
    }

    let screenPrice = document.getElementById('booking-seat__content--ticket-price');
    screenPrice.innerHTML = totalPrice+"";
}                 

// <=========================bỏ=====================
const seatChecking = [];
function clickSeatAjax(id){    

    if(!seatChecking.includes(id)){
        seatChecking.push(id);
        let input_ID = "#SID_"+id;
        // console.log(input_ID);
        // console.log(id)
        $().ready(()=>{
            $.ajax({
                url: '/page/customer/booking_seat_table.php',
                type: 'post',
                data: {
                    seat_ID: $(input_ID).val(),
                    film_Name: $('#film_name').val(),
                    date: $('#date').val(),
                    film_Type: $('#film_type').val(),
                    sht_Time: $('#time').val(),
                    area_Name: $('#area_Name').val(),
                    cluster_Name: $('#cluster_Name').val(),
                    room_ID: $('#room_ID').val(),

                },
                
            }).done( function(result){
                $('#tbody').append(result);
            })
        })
    }

    // css when choosing
    let seatIsChoosing = document.getElementById(id);
    // let trSeatID = "booking-seat-tr__"+id;
    // let trSeat = document.getElementById(trSeatID);
    
    if(seatIsChoosing.classList.contains('choosing-seat')){
        seatIsChoosing.classList.remove('choosing-seat');

        // remove array
        let trSeatID = '#booking-seat-tr__'+id;

        let index_seat_number = seatChecking.indexOf(id);
        if (index_seat_number !== -1) {
            seatChecking.splice(index_seat_number, 1);
        }

        // remove tag
        $.ajax({
            url: '/page/customer/booking_seat_table.php',

            success: function(data) {
                $(trSeatID).remove();
            }
        })
        
    }else{
        if(!seatIsChoosing.classList.contains('choosing-seat')){
            seatIsChoosing.classList.add('choosing-seat');
        }
    }

    // disabled btn when no items is choosed
    let btnPurchase = document.getElementById('booking-seat__btn-pay');
    // console.log(btnPurchase)
    let count = 0;
    for(let i = 0; i < document.getElementsByClassName('booking-seat__content--seat-items').length; i++){
        let seatItems = document.getElementsByClassName('booking-seat__content--seat-items')[i];
        if(seatItems.classList.contains('choosing-seat')){
            count++
        }
    }
    // console.log(count);
    if(count > 0){
        if(btnPurchase.classList.contains('disabled-tag')){
            btnPurchase.classList.remove('disabled-tag');
        }
    }else if(count == 0){
        if(!btnPurchase.classList.contains('disabled-tag')){
            btnPurchase.classList.add('disabled-tag');
        }
    }   
}
// ==============================================>

// =============================<<Booking - Cluster>>========================
function onClickNextBtn(){
    let nextBtn = document.getElementById('booking-seat__btn-next');
    let resetBtn = document.getElementById('booking-seat__btn-reset');

    

    if(!nextBtn.classList.contains('d-none')){
        nextBtn.classList.add('d-none');
    }
    if(resetBtn.classList.contains('d-none')){
        resetBtn.classList.remove('d-none');
    }

    for(let i = 0; i < document.getElementsByClassName('booking-seat__content--seat-items').length; i++){
        let seatItems = document.getElementsByClassName('booking-seat__content--seat-items')[i];
        // console.log(seatItems);
        if(!seatItems.classList.contains('disabled-tag')){
            seatItems.classList.add('disabled-tag');
        }
    }
}

function onClickResetBtn(){
    let nextBtn = document.getElementById('booking-seat__btn-next');
    let resetBtn = document.getElementById('booking-seat__btn-reset');

    if(!resetBtn.classList.contains('d-none')){
        resetBtn.classList.add('d-none');
    }
    if(nextBtn.classList.contains('d-none')){
        nextBtn.classList.remove('d-none');
    }

    for(let i = 0; i < document.getElementsByClassName('booking-seat__content--seat-items').length; i++){
        let seatItems = document.getElementsByClassName('booking-seat__content--seat-items')[i];
        // console.log(seatItems);
        if(seatItems.classList.contains('disabled-tag')){
            seatItems.classList.remove('disabled-tag');
        }
    }
    
}

// =====================================<<payment page>>===============================
// ok
function onClickAjaxApplyVoucher(){
    $().ready(()=>{
    $('#payment-voucher__btn').click(()=>{
        $.ajax({
            url: '/page/customer/payment_model/apply_voucher.php',
            type: 'post',
            data: {
                voucherID: $('#payment-voucher__inp').val(), 
            },
            
        }).done( function(result){
            $('#payment-total-voucher__sale').html(result);
        })
    })
})
}
// ok
function calPriceAjax(){
    $().ready(()=>{
        $('#payment-voucher__btn').click(()=>{
            $.ajax({
                url: '/page/customer/payment_model/cal_price_booking.php',
                type: 'post',
                data: {
                    voucherID: $('#payment-voucher__inp').val(), 
                    priceTicket: $('#ticket-price').val(),
                },
                
            }).done( function(result){
                $('#payment-total--price').html(result);
            })
        })
    })
}

function checkClickPaymentMethod(){
    let momoInput = document.getElementById('payment-method__inp-Momo');
    let zaloInput = document.getElementById('payment-method__inp-Zalopay');
    let vnInput = document.getElementById('payment-method__inp-VNPay');
    let noCheck =document.getElementById('no-check__para');
    if(momoInput.checked || zaloInput.checked || vnInput.checked){
        // window.location.href = '?page=user_account&user=myticket'
    }else{
        noCheck.innerHTML = 'Please choose your payment method';
    }
}

function onClickVNPay(){

    let func = document.getElementById('function');
    let purchase_btn =document.getElementById('purchase__btn');

    if(!func.classList.contains('d-none')){
        func.classList.add('d-none');
    }
    purchase_btn.href = '/vnpay_php/';
    
}

function onClickOrder(){
    let func = document.getElementById('function');

    if(func.classList.contains('d-none')){
        func.classList.remove('d-none');
    }
    let purchase_btn =document.getElementById('purchase__btn');
    purchase_btn.href = '';
}

// ====================================<<Film>>==============================
function onClickShowTimeFilmChoice(){
    let showTimeFilmChoice = document.getElementById('films__choice--show-time');
    let upcomingFilmChoice = document.getElementById('films__choice--upcoming');
    
    let filmShowTime = document.getElementById('films__showtime');
    let filmUpcoming = document.getElementById('films__upcoming');
    showTimeFilmChoice.style.backgroundColor = '#ccc';
    showTimeFilmChoice.style.color = '#000';
    if(filmShowTime.classList.contains('d-none')){
        filmShowTime.classList.remove('d-none');
    }

    if(!filmUpcoming.classList.contains('d-none')){
        filmUpcoming.classList.add('d-none');
    }
    // upcomingFilmChoice.style.textDecoration = 'none';
    upcomingFilmChoice.style.backgroundColor = 'transparent';
    upcomingFilmChoice.style.color = 'var(--text-in-grid)';
}

function onClickUpcomingFilmChoice(){
    let showTimeFilmChoice = document.getElementById('films__choice--show-time');
    let upcomingFilmChoice = document.getElementById('films__choice--upcoming');
    
    let filmShowTime = document.getElementById('films__showtime');
    let filmUpcoming = document.getElementById('films__upcoming');
    upcomingFilmChoice.style.backgroundColor = '#ccc';
    upcomingFilmChoice.style.color = '#000';
    if(filmUpcoming.classList.contains('d-none')){
        filmUpcoming.classList.remove('d-none');
    }

    if(!filmShowTime.classList.contains('d-none')){
        filmShowTime.classList.add('d-none');
    }
    // showTimeFilmChoice.style.textDecoration = 'none';
    showTimeFilmChoice.style.backgroundColor = 'transparent';
    showTimeFilmChoice.style.color = 'var(--text-in-grid)';
}

function onClickBooking(){
    // let clickBookingBtn = document.getElementById(id);
    let booking_site = document.getElementById('booking-ticket');

    if(booking_site.classList.contains('d-none')){
        booking_site.classList.remove('d-none');
    }
}

// ===========================<<Describe>>=========================
function onClickMovieTrailer(){
    let btnMovieTrailer = document.getElementById('btnMovieTrailer');
    let btnMoviePoster = document.getElementById('btnMoviePoster');
    let film_describe_img = document.getElementById('film__describe--img');
    let film_describe_video = document.getElementById('film__describe--video');

    // poster -> video
    if(film_describe_video.classList.contains('d-none')){
        film_describe_video.classList.remove('d-none');
    }
    if(!film_describe_img.classList.contains('d-none')){
        film_describe_img.classList.add('d-none');
    }

    if(btnMoviePoster.classList.contains('d-none')){
        btnMoviePoster.classList.remove('d-none');
    }
    if(!btnMovieTrailer.classList.contains('d-none')){
        btnMovieTrailer.classList.add('d-none');
    }

}

function onClickMoviePoster(){
    let btnMovieTrailer = document.getElementById('btnMovieTrailer');
    let btnMoviePoster = document.getElementById('btnMoviePoster');
    let film_describe_img = document.getElementById('film__describe--img');
    let film_describe_video = document.getElementById('film__describe--video');

    // video -> poster
    if(film_describe_img.classList.contains('d-none')){
        film_describe_img.classList.remove('d-none');
    }
    if(!film_describe_video.classList.contains('d-none')){
        film_describe_video.classList.add('d-none');
    }

    if(btnMovieTrailer.classList.contains('d-none')){
        btnMovieTrailer.classList.remove('d-none');
    }
    if(!btnMoviePoster.classList.contains('d-none')){
        btnMoviePoster.classList.add('d-none');
    }
}

// ==============================<<Other>>============================

// <========================= xem xét nên bỏ hay ko==========================
function getMonthAndYear(month){
    console.log(month);
    let Mon = '';
    let today = new Date();
    let Yea = today.getFullYear();
    let monthAndYear = document.getElementById('booking-site__choice--month-year');
        switch(month){
            case '01': Mon = 'Jan';
                break;
            case '02': Mon = 'Feb';
                break;
            case '03': Mon = 'Mar';
                break;
            case '04': Mon = 'Apr';
                break;
            case '05': Mon = 'May';
                break;
            case '06': Mon = 'Jun';
                break;
            case '07': Mon = 'Jul';
                break;
            case '08': Mon = 'Aug';
                break;
            case '09': Mon = 'Sep';
                break;
            case '10': Mon = 'Oct';
                break;
            case '11': Mon = 'Nov';
                break;
            case '12': Mon = 'Dec';
                break;
        }
    monthAndYear.innerHTML = Mon + " " + Yea;
}
// =================================================================>


// ===============================<<Cluster>>===================================
function onClickCluster(id){
    let bookingTicket = document.getElementById('booking-ticket');
    let bgOutSide = document.getElementById('bg--outside__cluster');

    for(let i = 0; i < document.getElementsByClassName('cluster').length; i++){
        let clusterClass = document.getElementsByClassName('cluster')[i];
        if(clusterClass.classList.contains('cluster-click')){
            clusterClass.classList.remove('cluster-click');
        }
    }

    let clusterID = document.getElementById(id);
    if(!clusterID.classList.contains('cluster-click')){
        clusterID.classList.add('cluster-click');
    }

    let inputCluster = document.getElementById('input__cluster');
    inputCluster.setAttribute("value", id);
    if(bookingTicket.classList.contains('d-none')){
        bookingTicket.classList.remove('d-none');
        bgOutSide.style.height = 'auto';
    }
}

var onClickToSearchInBookingCluster = 0;
function onClickToSearchInCluster(){
    let typeChoice = document.getElementById('booking-site__choice--type');
    let dateChoice = document.getElementById('booking-site__choice--date-select');

    let filmDiv = document.getElementById('booking-site__choice--film');
    if(filmDiv.classList.contains('d-none')){
        filmDiv.classList.remove('d-none');
        onClickToSearchInBookingCluster = 1;
        typeChoice.disabled = true;
        dateChoice.disabled = true
    }
}

function onClickToResetInCluster(){
    let typeChoice = document.getElementById('booking-site__choice--type');
    let dateChoice = document.getElementById('booking-site__choice--date-select');
    
    let filmDiv = document.getElementById('booking-site__choice--film');
    if(!filmDiv.classList.contains('d-none')){
        filmDiv.classList.add('d-none');
        onClickToSearchInBookingCluster = 0;
        typeChoice.disabled = false;
        dateChoice.disabled = false;
    }
}

function ajaxInBookingTicketCluster(){
    $().ready(()=>{
        $('#booking-site__btn--choose-search').click(()=>{
            $.ajax({
                url: '/page/customer/booking_ticket.php',
                type: 'post',
                data: {
                    filmID: $('#filmID').val(),
                    areaID: $('#booking-site__choice--area').val(),
                    typeFilm: $('#booking-site__choice--type').val(),
                    Date: $('#booking-site__choice--date-select').val(),
                },
                
            }).done( function(result){
                $('#booking-site__choice--cluster').html(result);
            })
        })
    })
}

// =====================================<<User Account>>===============================

function onClickChangePassword(){
    let inputPass = document.getElementById('account-content__account--inp-pass');
    let newPass = document.getElementById('account-content__new-pass');
    let newRePass = document.getElementById('account-content__re-new--pass');

    let inputNewPass = document.getElementById('account__new-pass');
    let inputReNewPass = document.getElementById('account__re-new-pass');
    if(newRePass.classList.contains('d-none') && newPass.classList.contains('d-none')){
        // curPass.classList.remove('d-none');
        inputPass.value = '';
        newPass.classList.remove('d-none');
        newRePass.classList.remove('d-none');
        inputNewPass.setAttribute('name', 'account__new-pass');
        inputReNewPass.setAttribute('name', 'account__re-new-pass');
    } else if(!newRePass.classList.contains('d-none') && !newPass.classList.contains('d-none')){
        // curPass.classList.add('d-none');
        inputPass.value = '1234567890';
        newPass.classList.add('d-none');
        newRePass.classList.add('d-none');
        inputNewPass.removeAttribute('name', 'account__new-pass');
        inputReNewPass.removeAttribute('name', 'account__re-new-pass');
    }
    
}

function searchFilm(){
    let input = document.getElementById('search-input');
    let list = document.getElementById('table');

    input.addEventListener('input', function() {
        let query = input.value.toLowerCase();
        let items = list.getElementsByClassName('myticket-tr');

        for (let i = 0; i < items.length; i++) {
            let item = items[i];
            let text = item.textContent.toLowerCase();
            // let trID = 'manage-booking__tr--'+item.id;
            // console.log(item);
            // let tr = document.getElementById(trID);

            if (text.includes(query)) {
                if(item.classList.contains('d-none')){
                    item.classList.remove('d-none');
                }
            } else {
                if(!item.classList.contains('d-none')){
                    item.classList.add('d-none');
                }
            }
        }
    });
}

// ====================================<<Anh>>==================================
// =======================================<<Clusters>>===================================
function showClusters(clicked) {
    for (var i = 0; i < document.getElementsByClassName("cluster").length; i++){
        document.getElementsByClassName("cluster")[i].style.display = "none";
    }
    for (var i = 0; i < document.getElementsByClassName(clicked).length; i++){
        document.getElementsByClassName(clicked)[i].style.display = "inline-block";
    }
    for (var i = 0; i < document.getElementsByClassName("area").length; i++){
        document.getElementsByClassName("area")[i].style.color = "white";
    }
    document.getElementById(clicked).style.color = "red";
}