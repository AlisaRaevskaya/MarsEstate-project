let auth_form = document.forms.auth;

console.log(auth_form);

auth_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/authorisation/", {//обработчик action
            method: 'POST', 
            body: new FormData(auth_form)
        });
        let answer = await response.json();
          answer = JSON.parse(answer);
        console.log("ответ сервера " + answer);
        responseHandler(answer);
    }catch (error) {
        console.log("ошибка", error);
    }
});

const EMAIL_ERROR ='Пользователь с таким email не зарегистрирован';
const AUTH_SUCCESS ='Авторизация успешна';
const AUTH_PWD_ERROR='Неверный пароль';//ошибка несовпадени в бд
const EMPTY_FIELD='Поле не может быть пустым';
const EMAIL_FAIL='Неверный формат email';

let span_password_error = document.querySelector('.auth_password_error');
let span_email_error = document.querySelector('.auth_email_error');
let input_pass = auth_form.elements.email;
let input_for_pass = document.querySelector('.input_for_pass');

function responseHandler(answer){
    if(answer === AUTH_SUCCESS){
        alert(AUTH_SUCCESS);
        window.location.replace('/');
    }else if(answer === EMAIL_FAIL){
        span_email_error.innerHTML= EMAIL_FAIL;
    }else if(answer === EMAIL_ERROR){
        span_email_error.innerHTML= EMAIL_ERROR;
    }else if(answer === AUTH_PWD_ERROR){
        span_email_error.innerHTML = AUTH_PWD_ERROR;
    }else{
    for (let key in answer){
        if (key =='password'){
            span_password_error.innerHTML = answer.key;
        }else if((key =='email'){
            span_email_error.innerHTML = answer.key;
        }
    }
    }
}

