let auth_form = document.forms.auth;

auth_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        // await заставляет ждать, пока код функции (промиса)
        // после него (в данном случае fetch) не выполнится
        const response = await fetch("/authorisation/", {//на обработчик action
            method: 'POST', 
            body: new FormData(auth_form)
        });
        const answer = await response.text(); // .json();
        console.log("ответ сервера " + answer);
        responseHandler(answer);
    } catch (error) {
        console.log("ошибка", error);
    }
});

const AUTH_ERROR ='Ошибка авторизации';
const AUTH_SUCCESS ='Авторизация успешна';

function responseHandler(answer){
    if(answer === AUTH_ERROR){
    alert(answer);
} if(answer === AUTH_SUCCESS){
    window.location.replace('/account');
}
}
