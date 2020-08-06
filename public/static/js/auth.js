let auth_form = document.forms.auth;
let auth_password = auth_form.elements.password;
let auth_email= auth_form.elements.email;

console.log(auth_form);

auth_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    if (!validateAuth(this)){
      return; }
    try {
        const response = await fetch("/authorisation/", {//обработчик action
            method: 'POST', 
            body: new FormData(auth_form)
        });
        let answer = await response.json();
        console.log("ответ сервера " + answer);
        responseHandler(answer);
    }catch (error) {
        console.log("ошибка", error);
    }
});



function validateAuth(auth_form){
    // проверка пользовательского ввода
    if(auth_form){
        auth_password.onfocus = function(){
          this.type="text";
        }
        if(validateEmail(auth_email)&& validatePassword(auth_password)) return true;
    }
};

const EMAIL_ERROR ='Пользователь с таким email не зарегистрирован';
const AUTH_SUCCESS ='Авторизация успешна';
const AUTH_PWD_ERROR='Неверный пароль';//ошибка несовпадени в бд
const EMPTY_FIELD='Поле не может быть пустым';
const EMAIL_FAIL='Неверный формат email';

let span_password_error = document.querySelector('.auth_password_error');
let span_email_error = document.querySelector('.auth_email_error');
let input_pass = auth_form.elements.email;
let auth_result = document.querySelector('.auth_result');

function responseHandler(answer){
    if(answer === AUTH_SUCCESS){
      alert(AUTH_SUCCESS);
      window.location.replace('/');
    }else if(answer === EMAIL_FAIL){
        span_email_error.innerHTML= EMAIL_FAIL;
    }else if(answer === EMAIL_ERROR){
        span_email_error.innerHTML= EMAIL_ERROR;
    }else if(answer === AUTH_PWD_ERROR){
        span_password_error.innerHTML = AUTH_PWD_ERROR;
    }else{
    for (let key in answer){
        if (key =='password'){
            span_password_error.innerHTML = answer.key;
        }else if(key =='email'){
            span_email_error.innerHTML = answer.key;
        }
    }
    }
}






let reg_form = document.forms['regForm'];

reg_form.addEventListener('submit', async(event)=>{
// async позволяет использовать await
    event.preventDefault();
    if (!validate_Reg(this)){
      // span_auth.innerText= AUTH_ERROR;
      return; }
    try {
        const response = await fetch("/registration/", {//обработчик action
            method: 'POST', 
            body: new FormData(reg_form)
        });
        let answer = await response.json();
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
let password = reg_form.elements.password;
let email =reg_form.elements.email;
let re_password =reg_form.elements.re_password;
let checkbox = reg_form.elements.checkRules;
let name = reg_form.elements.name;
    
    

function validate_Reg(reg_form) {
    // проверка пользовательского ввода
    if(reg_form){
    if(validateName(name)
    && validateEmail(email)
    && validatePassword(password)
     && confirmPassword(password, re_password)
      && validateCheckbox(checkbox)){
        return true;
      }
    }
  };

const REG_SUCCESS='Регистрация успешна!';
const INSERT_ERROR='Данные не добавились';
const USER_EXISTS='Такой пользователь уже существует';


const NAME_CHARACTER_FAIL="Имя пользователя может содержать буквы и цифры, первый символ обязательно буква";
const CHECKBOX_FAIL='Необходимо согласиться с правилами';
const PASS_FAIL="Пароль должен содержать строчные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов";
const PASS_NOT_SAME='Пароли не совпадают';

/// errors[$key] = $message;
//errors [name]=NAME_CHARACTER_FAIL;

function regResponseHandler(answer){
if(answer === USER_EXISTS){
span_email.innerHTML= USER_EXISTS;
}if (answer === INSERT_ERROR){
reg_result.innerHTML= INSERT_ERROR;
}if(answer === REG_SUCCESS){
reg_result.innerHTML= REG_SUCCESS;
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
// Utility functions
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
  
  // Validators
  function validateName(name) {
  if (checkIfEmpty(name)) return;
    // is if it has only letters
    if (!containsCharacters(name, 1)){
      return;
    } 
    return true;
  };
  
  function validatePassword(elem) {
    // Empty check
    if (checkIfEmpty(elem)) return;
    // Must of in certain length
    if (!containsCharacters(elem, 4)) return;
    return true;
  }
  const CONFIRM_PASS_ERROR ="Пароли должны соответствовать";
  
  function confirmPassword(pass, re_pass){
    if (pass.className !== 'valid') {
      setInvalid(re_pass, 'Password must be valid');
      return;
    }
    if(pass.value !== re_pass.value){
      setInvalid(re_pass, "Пароли должны соответствовать");
      return;
    }else{
      setValid(re_pass);
    }
    return true;
  };
  
  
  function validateEmail(elem) {
    if (checkIfEmpty(elem))return;
    if (!containsCharacters(elem, 5)) return;
    setValid(elem);
    return true;
  }
  
  
  function validateCheckbox(checkbox){
    if (checkbox.checked){
      setValid(checkbox);
      return true;
    }else{
      setInvalid(checkbox, "Checkbox must be checked");
    };
  }
  
  
  //characters
  
  function containsCharacters(field, code) {
    let regEx;
    switch (code) {
      case 1:
        // letters
        regEx = /[A-Za-zА-Яа-яЁё]\D$/u;
        return matchWithRegEx(regEx, field, 'Поле должно содержать только буквы');
      case 2:
        // первая буква строки должна быть в верхнем регистре, а все остальные в нижнем:
        regEx = /^([А-ЯЁ]{1}[а-яё]{3-20})|([A-Z]{1}[a-z]{3-20})$/u;
        return matchWithRegEx(
          regEx,
          field,
          'Должно начинаться со строчной буквы, содержать латинские буквы или кириллицу, '
        );
      case 3:
        // uppercase, lowercase and number
        regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
        return matchWithRegEx(
          regEx,
          field,
          'Must contain at least one uppercase, one lowercase letter and one number'
        );
      case 4://pass
        // 8 to 15 characters which contain at least one lowercase letter,
        // one uppercase letter, one numeric digit, and one special character
        regEx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
        return matchWithRegEx(
          regEx,
          field,
          'Пароль содержит заглавные и строчные буквы латинского алфавита, цифры, специальный символ'
        );
      case 5:
        // Email pattern
        regEx = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
        return matchWithRegEx(regEx, field, 'Must be a valid email address');
  
      default:
        return false;
    }
  }

  function matchWithRegEx(regEx, field, message) {
    if (field.value.match(regEx)){
      setValid(field);
      return true;
    } else {
      setInvalid(field, message);
      return false;
    }
  }
  