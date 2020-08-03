
const AUTH_ERROR ='Ошибка авторизации';
const AUTH_SUCCESS ='Авторизация успешна';

let auth_form = document.forms.auth;
console.log(auth_form);
auth_form.addEventListener('submit', submitButtonFunctionAuth);

function submitButtonFunctionAuth(event){

    event.preventDefault();
    let span_auth = document.querySelector(".auth_result");
    if (!validateAuth(this)){
      // span_auth.innerText= AUTH_ERROR;
      return; }
      span_auth.innerText= AUTH_SUCCESS;
      console.log("Отправка на сервер");
      this.submit();
      };

      function validateAuth(auth_form){
        // проверка пользовательского ввода
        let auth_password = auth_form.elements.password;
        let auth_email= auth_form.elements.email;
        auth_password.onfocus = function(){
          this.type="text";
        }
        if(validateEmail(auth_email)) return true;
    };

      
let form_reg = document.forms.regForm;

const REG_SUCCESS ='Успешная регистрация';
const REG_ERROR ='Ошибка регистрации';

form_reg.addEventListener('submit', submitButtonFunctionReg);

function submitButtonFunctionReg(event){
    event.preventDefault();
    let span = document.querySelector(".reg_result");
    if (!validate_Reg(this)){
    span.innerText= REG_ERROR;
    return;
    }
    span.innerText= REG_SUCCESS;
    console.log("Отправка на сервер");
    this.submit();
}


function validate_Reg(form_reg) {
  // проверка пользовательского ввода
  let password = form_reg.elements.password;
  let email =form_reg.elements.email;
  let re_password =form_reg.elements.re_password;
  let checkbox = form_reg.elements.checkRules;
  let name = form_reg.elements.name;
  
  password.onfocus = function(){
    this.type="text";
  }

  if(validateName(name)
  && validateEmail(email)
  && validatePassword(password)
   && confirmPassword(password, re_password)
    && validateCheckbox(checkbox)){
      return true;
    }
};

//
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
      regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return matchWithRegEx(regEx, field, 'Must be a valid email address');

    default:
      return false;
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
