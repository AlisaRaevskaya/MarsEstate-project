let auth_form = document.forms.auth;

auth_form.addEventListener('submit', async(event)=>
// async позволяет использовать await
    event.preventDefault();
    try {
        // await заставляет ждать, пока код функции (промиса)
        // после него (в данном случае fetch) не выполнится
        const response = await fetch('/authorisation', {//на обраюотчик action
            method: 'POST', // PUT
            body: new FormData(auth_form)
        });
        const answer = await response.text(); // .json();
        console.log("ответ сервера " + answer);
        responseHandler(answer);
    } catch (error) {
        console.log("ошибка", error);
    }
});