window.onload = ()=>{

}

function onClickSignUpNow(){
    let form_log_in = document.getElementById('sign-in__form-move');
    let form_sign_up = document.getElementById('sign-up__form-move');  

    if(form_sign_up.classList.contains('d-none')){
        form_sign_up.classList.remove('d-none');
    }

    if(!form_log_in.classList.contains('d-none')){
        form_log_in.classList.add('d-none')
    }
}

function onClickSignInNow(){
    let form_log_in = document.getElementById('sign-in__form-move');
    let form_sign_up = document.getElementById('sign-up__form-move'); 

    if(form_log_in.classList.contains('d-none')){
        form_log_in.classList.remove('d-none');
    }
    if(!form_sign_up.classList.contains('d-none')){
        form_sign_up.classList.add('d-none');
    }
}

