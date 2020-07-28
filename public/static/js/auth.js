let auth_form = document.forms.auth;

auth_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/authorisation/", {//обработчик action
            method: 'POST', 
            body: new FormData(auth_form)
        });
        const answer = await response.text(); // .json();
        console.log("ответ сервера " + answer);
        console.log(responseHandler(answer));
    } catch (error) {
        console.log("ошибка", error);
    }
});
let reg_form = document.forms.regForm;

reg_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/registration/", {//обработчик action
            method: 'POST', 
            body: new FormData(reg_form)
        });
        const answer = await response.text(); // .json();
        console.log("ответ сервера " + answer);
        console.log(responseHandler(answer));
    } catch (error) {
        console.log("ошибка", error);
    }
});



const REG_ERROR='Ошибка регистрации';
const REG_SUCCESS='Регистрация успешна!';
const AUTH_ERROR ='Ошибка авторизации';
const AUTH_SUCCESS ='Авторизация успешна';
const AUTH_PWD_ERROR='Неверный пароль';

function responseHandler(answer){
if(answer === AUTH_ERROR){
    alert(answer);
} if(answer === AUTH_PWD_ERROR){
    alert(answer);}
 if(answer === AUTH_SUCCESS){
    window.location.replace('/');
}if(answer === REG_ERROR){
    alert(answer);
 if(answer === REG_SUCCESS){
    window.location.replace('/');
}
