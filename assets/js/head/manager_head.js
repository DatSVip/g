window.onload = () =>{

}

function onClickBtnSetting(){
    let btnSetting = document.getElementById('header__setting--manager');

    // open
    if(btnSetting.classList.contains('click_setting-off')){
        btnSetting.style.transform = "rotate(90deg)";
        btnSetting.style.transition = 'transform 0.6s';
        btnSetting.classList.add('click_setting-on');
        btnSetting.classList.remove('click_setting-off');

    }

    // close
    else if(btnSetting.classList.contains('click_setting-on')){
        btnSetting.style.transform = "rotate(0deg)";
        btnSetting.style.transition = 'transform 0.6s';
        btnSetting.classList.add('click_setting-off');
        btnSetting.classList.remove('click_setting-on');
    }

}
// ============================<<Manage User>>===========================
function onClickDelete(id){
    let inputDel = document.getElementById('manage-lock-btn');
    inputDel.setAttribute("value", id);

    let delTitle = document.getElementById('delete-res__title');

    let delLink = document.getElementById('delete-res__link');

    let modal = document.getElementById('modal');
    let delSite = document.getElementById('delete-res');
    if(modal.classList.contains('d-none') && delSite.classList.contains('d-none')){
        modal.classList.remove('d-none');
        delSite.classList.remove('d-none');
        delSite.classList.add('translate-down');
        delTitle.innerHTML = 'Are you sure to delete '+id;
        delLink.href = '?page=manage_user_delete&cusID='+id;
    }
}

function onClickModal(id){
    let modal = document.getElementById(id);
    let delSite = document.getElementById('delete-res');
    if(!modal.classList.contains('d-none') && !delSite.classList.contains('d-none')){
        modal.classList.add('d-none');
        delSite.classList.add('d-none');
    }
}

// =================================<<Manage film>>===========================
function searchFilm(){
    let input = document.getElementById('search-input');
    let list = document.getElementById('table');

    input.addEventListener('input', function() {
        let query = input.value.toLowerCase();
        let items = list.getElementsByClassName('manage-film__tr');

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

function onClickDeleteFilm(id){

    let delTitle = document.getElementById('delete-res__title');

    let delLink = document.getElementById('delete-res__link');

    let modal = document.getElementById('modal');
    let delSite = document.getElementById('delete-res');
    if(modal.classList.contains('d-none') && delSite.classList.contains('d-none')){
        modal.classList.remove('d-none');
        delSite.classList.remove('d-none');
        delSite.classList.add('translate-down');
        delTitle.innerHTML = 'Are you sure to delete '+id;
        delLink.href = '?page=manage_film_delete&filmID='+id;
    }
}

function onClickAddFilmType(id){

    let inputDel = document.getElementById('manage-lock-btn');
    inputDel.setAttribute("value", id);

    let delTitle = document.getElementById('add-type__title');

    // let delLink = document.getElementById('add-type__link');

    let modal = document.getElementById('modal-add-type');
    let delSite = document.getElementById('add-type');
    if(modal.classList.contains('d-none') && delSite.classList.contains('d-none')){
        modal.classList.remove('d-none');
        delSite.classList.remove('d-none');
        delSite.classList.add('translate-down');
        delTitle.innerHTML = 'Which film type do you want to add for '+id;
        // delLink.href = '?page=manage_film_add_type&filmID='+id;
    }
}

function addFilmTypeAjax(){
    $().ready(()=>{
        $('#add-type__link').click(()=>{
            $.ajax({
                url: '/page/manager/manage_film_model/manage_film_add_type.php',
                type: 'post',
                data: {
                    type: $('#select-type').val(),
                    filmID: $('#manage-lock-btn').val()
                },
                
            })
        })

    })
}

function onClickModalAddType(id){
    let modal = document.getElementById(id);
    let delSite = document.getElementById('add-type');
    if(!modal.classList.contains('d-none') && !delSite.classList.contains('d-none')){
        modal.classList.add('d-none');
        delSite.classList.add('d-none');
    }
}

function onClickYes(){
    // let yesBtn = document.getElementById('add-type__link');
    let modal = document.getElementById('modal-add-type');
    let delSite = document.getElementById('add-type');
    let doneTitle = document.getElementById('add-type__title');
    doneTitle.innerHTML = 'Add Film Type Successfully';
    setTimeout(()=>{
        if(!modal.classList.contains('d-none') && !delSite.classList.contains('d-none')){
            modal.classList.add('d-none');
            delSite.classList.add('d-none');
        }
    }, 3000)
}

// ==========================<<manage - showtime>>=======================

function onClickDeleteShowtime(id){
    // let inputDel = document.getElementById('manage-lock-btn');
    // inputDel.setAttribute("value", id);

    let delTitle = document.getElementById('delete-res__title');

    let delLink = document.getElementById('delete-res__link');

    let modal = document.getElementById('modal');
    let delSite = document.getElementById('delete-res');
    if(modal.classList.contains('d-none') && delSite.classList.contains('d-none')){
        modal.classList.remove('d-none');
        delSite.classList.remove('d-none');
        delSite.classList.add('translate-down');
        delTitle.innerHTML = 'Are you sure to delete '+id;
        delLink.href = '?page=manage_sht_delete&shtID='+id;
    }
}

function onClickChangeRoomAjaxFirst(){
    $().ready(()=>{
        $.ajax({
            url: '/page/manager/manage_sht_model/edit_room.php',
            type: 'post',
            data: {
                shtID: $('#sht_id').val(),
                film_ID: $('#film_id').val(),

            },
            
        }).done( function(result){
            $('#room_id').html(result);
        })
    })
}

function onClickChangeRoomAjaxChange(){
    $().ready(()=>{
        $('#film_id').change(()=>{
            $.ajax({
                url: '/page/manager/manage_sht_model/edit_room.php',
                type: 'post',
                data: {
                    shtID: $('#sht_id').val(),
                    film_ID: $('#film_id').val(),
                },
                
            }).done( function(result){
                $('#room_id').html(result);
            })
        })
    })
}

function onClickChangeTypeAjaxFirst(){
    $().ready(()=>{
        $.ajax({
            url: '/page/manager/manage_sht_model/edit_type.php',
            type: 'post',
            data: {
                shtID: $('#sht_id').val(),
                film_ID: $('#film_id').val(),

            },
            
        }).done( function(result){
            $('#sht_type').html(result);
        })
    })
}

function onClickChangeTypeAjaxChange(){
    $().ready(()=>{
        $('#film_id').change(()=>{
            $.ajax({
                url: '/page/manager/manage_sht_model/edit_type.php',
                type: 'post',
                data: {
                    shtID: $('#sht_id').val(),
                    film_ID: $('#film_id').val(),

                },
                
            }).done( function(result){
                $('#sht_type').html(result);
            })
        })
    })
}
