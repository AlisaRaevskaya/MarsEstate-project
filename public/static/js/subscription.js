let sub_form = document.forms.sub_Form;
let sub = document.querySelector('.email_exists');

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
        responseHandler(answer, sub);
    } catch (error) {
        console.log("ошибка", error);
    }
});


const SUB_SUCCESS="Подписка успешна";
const EMAIL_EXISTS="На данный email уже оформлена подписка";
const EMPTY_FIELD='Поле не может быть пустым';
const EMAIL_FAIL='Неверный формат email';


console.log(sub);


function responseHandler(answer, sub){
if(answer === SUB_SUCCESS){
sub.innerText = SUB_SUCCESS;}      
if(answer === EMAIL_FAIL){
    sub.innerText = answer;}
if(answer === EMAIL_EXISTS){
     sub.innerText = EMAIL_EXISTS;}
  
if(answer === EMPTY_FIELD){
sub.innerText = answer;}
   
}