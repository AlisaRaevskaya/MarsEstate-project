let feedback_form = document.forms.feedback_form;

feedback_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/feedback/", {//обработчик action
            method: 'POST', 
            body: new FormData(feedback_form)
        });
        const answer = await response.text(); // .json();
        console.log("ответ сервера " + answer);
        console.log(responseHandler(answer));
    } catch (error) {
        console.log("ошибка", error);
    }
});

let result = document.querySelector(".for_send_result")
const SEND_OK="Ваша форма отправлена";
const SEND_ERROR ="Форма не отправлена"
function responseHandler(answer){
    if (answer === SEND_OK){
result.innerText ="SEND_OK";
    }
}