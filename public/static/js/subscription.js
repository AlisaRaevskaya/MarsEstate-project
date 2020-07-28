let sub_form = document.forms.sub_Form;

sub_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/subscription/", {//обработчик action
            method: 'POST', 
            body: new FormData(sub_form)
        });
        const answer = await response.text(); // .json();
        console.log("ответ сервера " + answer);
        console.log(responseHandler(answer));
    } catch (error) {
        console.log("ошибка", error);
    }
});


const SUB_SUCCESS="Подписка успешна";
const EMPTY_FIELD ='Поле не может быть пустым';
const EMAIL_ERROR="Invalid email format";

let sub = document.querySelector('.sub_input');
console.log(sub);


function responseHandler(answer){
 if(answer === EMPTY_FIELD){
    sub.nextElementSibling.innerText = answer;}
if(answer === EMAIL_ERROR){
        sub.nextElementSibling.innerText = answer;}
if(answer === SUB_SUCCESS{
    sub.nextElementSibling.innerText = answer;
    }    
}