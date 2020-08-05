
let feedback_form = document.forms['feedback_form'];
console.log(feedback_form);


feedback_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    if(!validateFeedBack(this)){
      return;
    }
    try {
        const response = await fetch("/feedback/", {//обработчик action
            method: 'POST', 
            body: new FormData(feedback_form)
        });
        const answer = await response.json(); // .json();
        console.log("ответ сервера " + answer);
        responseHandler(answer);
    } catch (error) {
        console.log("ошибка", error);
    }
});

let result = document.querySelector(".for_send_result");

const F_SUCCESS="Данные успешно отправлены";
const INSERT_FAIL ="Данные не добавлены";
let span_name = document.querySelector(".error_name");
let span_email = document.querySelector(".error_email");
let span_subject= document.querySelector(".error_subject");
let span_textarea=document.querySelector(".error_textarea");

function responseHandler(answer){
    if (answer === F_SUCCESS){
      result.innerText = F_SUCCESS;
    }if (answer === INSERT_FAIL){
      result.innerText = INSERT_FAIL;
    }else{ 
      for (let key in answer){
      if (key =='subject'){
          span_subject.innerHTML = answer.key;
          }
      if (key =='email'){
          span_email.innerHTML = answer.key;
              }
      if (key =='subject'){
          span_name.innerHTML = answer.key;
                      } 
      if (key =='textarea'){
          span_textarea.innerHTML = answer.key;
      } 
  }
  }                     
}

let name= feedback_form.elements.name;
let email= feedback_form.elements.email;

function validateFeedBack(feedback_form){
    if(feedback_form){
      if (validateEmail(email) && validateName(name)){
        return true;
      }
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
    function validateName(elem) {
        if (checkIfEmpty(elem)) return;
          // is if it has only letters
          if (!containsCharacters(elem, 1)) return;
          return true;
        };

    function validateEmail(elem) {
            if (checkIfEmpty(elem))return;
            if (!containsCharacters(elem, 5)) return;
            return true;
          }