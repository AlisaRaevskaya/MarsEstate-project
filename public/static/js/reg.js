let reg_form = document.forms.regForm;

reg_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/registration/", {//обработчик action
            method: 'POST', 
            body: new FormData(reg_form)
        });
        let answer = await response.json();
            answer = JSON.parse(answer);
        console.log("ответ сервера " + answer);
        regResponseHandler(answer);
    } catch (error) {
        console.log("ошибка", error);
    }
});

let span_name =document.querySelector('.name_error');
let span_email=document.querySelector('.email_error');
let span_pass=document.querySelector('.pass_error');
let reg_result =document.querySelector('.reg_result');
let span_cpass=document.querySelector('.cpass_error');


const REG_SUCCESS='Регистрация успешна!';
const INSERT_ERROR='Данные не добавились';
const USER_EXISTS='Такой пользователь уже существует';

const EMAIL_FAIL='Неверный формат email';
const NAME_CHARACTER_FAIL="Имя пользователя может содержать буквы и цифры, первый символ обязательно буква";
const CHECKBOX_FAIL='Необходимо согласиться с правилами';
const PASS_FAIL="Пароль должен содержать строчные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов";
const PASS_NOT_SAME='Пароли не совпадают';

/// errors[$key] = $message;
//errors [name]=NAME_CHARACTER_FAIL;

function regResponseHandler(answer){
if(answer === USER_EXISTS){
span_email.innerHTML= USER_EXISTS;
}if (answer = INSERT_ERROR){
reg_result.innerHTML= INSERT_ERROR;
}if(answer === REG_SUCCESS){
reg_result.innerHTML= REG_RESULT;
        window.location.replace('/');
}else{ 
    for (let key in answer){
    if (key =='password'){
        span_pass.innerHTML = answer.key;
        }
    if (key =='email'){
        span_email.innerHTML = answer.key;
            }
    if (key =='name'){
        span_name.innerHTML = answer.key;
                    } 
    if (key =='re_password'){
        span_cpass.innerHTML = answer.key;
    } 
}
}                     
} 