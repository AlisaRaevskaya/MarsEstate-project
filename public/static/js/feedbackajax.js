
let feedback_form = document.forms['feedback_form'];
console.log(feedback_form);


feedback_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    try {
        const response = await fetch("/feedback/", {//обработчик action
            method: 'POST', 
            body: new FormData(feedback_form)
        });
        const answer = await response.json(); // .json();
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

function validateFeedBack(feedback_form){
    let name=feedback_form.elements.name;
    let email = feedback_form.elements.email;

    if (validateEmail(email) && validateName(name)){
        return true;
    }
}

function checkIfEmpty(field) {
    if (isEmpty(field.value.trim())) {
      // set field invalid
      setInvalid(field, 'Поле не может быть пустым');
      return true;
    } else {
      // set field valid
      setValid(field);
      return false;
    }
  }
  function isEmpty(value) {
    if (value === '') return true;
    return false;
  }
  
  function setInvalid(field, message) {
    field.className = 'invalid';
    field.nextElementSibling.innerHTML = message;
    field.style.borderBottom = "1px solid red"
    field.nextElementSibling.style.color = "whitesmoke";
  }
  function setValid(field) {
    field.className = 'valid';
    field.nextElementSibling.innerHTML = '';
    field.style.borderBottom = "1px solid green"
  }

function containsCharacters(field, code) {
    let regEx;
    switch (code) {
      case 1:
        // letters
        regEx = /[A-Za-zА-Яа-яЁё]\D$/u;
        return matchWithRegEx(regEx, field, 'Поле должно содержать только буквы');
    case 2:
      // Email pattern
      regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return matchWithRegEx(regEx, field, 'Must be a valid email address');
    }
}
      function matchWithRegEx(regEx, field, message) {
        if (regEx.test(field.value)){
          setValid(field);
          return true;
        } else {
          setInvalid(field, message);
          return false;
        }
    }
    function validateName(name) {
        if (checkIfEmpty(name)) return;
          // is if it has only letters
          if (!containsCharacters(name, 1)){
            return;
          } 
          return true;
        };
        function validateEmail(elem) {
            if (checkIfEmpty(elem))return;
            if (!containsCharacters(elem, 5)) return;
            setValid(elem);
            return true;
          }