 
let auth_form = document.forms.auth;

const AUTH_ERROR ='Ошибка авторизации';
const AUTH_SUCCESS ='Авторизация успешна';

function responseHandler(answer){
    if(answer === AUTH_ERROR){
    alert(answer);
} if(answer === AUTH_SUCCESS){
    window.location.replace('/account');
}
}


let form_reg = document.forms.regForm;


let text_error= document.querySelector(".text_invalid");
let userInput=document.querySelector(".userInput");//input
let submitButton = document.querySelector("input[type='submit']");
const CONFIRM_PASS_ERROR ="Пароли должны соответствовать";
const AUTH_OK = "Авторизация прошла успешно";

//colors
const GREEN = '#4CAF50';
const RED ="#F44336";

form.addEventListener('submit', submitButtonFunction);

function submitButtonFunction(event){
    event.preventDefault();
    if (!validateAuth(this)) return;
    $span = document.getElementById("#auth_result");
    $span.innerText= AUTH_OK;
    console.log("Отправка на сервер");
    this.submit();
}

form_reg.addEventListener('submit', submitButtonFunctionReg);

function submitButtonFunctionReg(event){
    event.preventDefault();
    if (!validate_Reg(this)) return;
    console.log("Отправка на сервер");
    this.submit();
}



function validateAuth(form){
    // проверка пользовательского ввода
    let auth_email= form.element.auth_email;
    let auth_password = form.elements.auth_password;
    if(validateEmail(auth_email) && validatePassword(auth_password)) {
      return true;}
};



function validate_Reg(form_reg) {
  // проверка пользовательского ввода
  let password =form_reg.elements.password;
  let email =form_reg.elements.email;
  let re_password =form_reg.elements.re_password;
  let checkbox = form_reg.elements.checkRules;
  let name = form_reg.element.name;

  if(validateEmail(email) && validatePassword(password) && confirmPassword(password, re_password) && validateName(name)&& validateCheckbox(checkbox))
  return true;
};

//validators

function validateEmail(email){
    if (!checkIfEmpty(email)
     && checkEmail(email) && meetLength(email, 4, 100) && containsCharacters(email, 5)) {
      setValid(email);
      return true;
    }
      return false;
    };

function validatePassword(password) {
   
    if (!checkIfEmpty(password) && meetLength(password, 8, 100) && containsCharacters(password, 4)){
      setValid(password);
      return true;
    }
    return false;
} 

function confirmPassword(password, re_password){
    if(password ===re_password){
      setValid(re_password);
    return true;}
    {
      setInvalid(re_password, CONFIRM_PASS_ERROR);
    }
};

function validateName(name){

}

function validateCheckbox(checkbox){
  if (checkbox.checked){
    setValid(checkbox);
    return true;
  }
  return false;
}



//valid//invalid
function setValid(elem){
  elem.className = 'valid';
//   elem.nextElementSibling.innerHTML = '';
  elem.style.borderBottom="1px solid green";
//   elem.nextElementSibling.innerText = green;
};

function setInvalid(elem, message) {
    elem.className = 'invalid';
    elem.style.borderBottom="1px solid red";
    elem.nextElementSibling.innerHTML = message;
    elem.nextElementSibling.style.color = red;
  };


//empty
function CheckIfEmpty(elem){
    if (elem.value.trim() === ''){///length==0
    setInvalid(elem, 'Поле не может быть пустым');
        return true;
    }
};
//characters

function ifonlyLowercase(elem){
if(elem.value.trim()===elem.value.trim().toLowerCase()){
setInvalid(elem, 'Пароль должен содержать минимум 1 заглавную букву');
    return true;
}
};

function IfonlyUppercase(elem){
if(elem.value.trim()=== elem.value.trim().toUpperCase()){
    setInvalid(elem, 'Пароль должен содержать минимум 1 букву низкого регистра')
    return true;
}
};

function containOnlyNumbers(elem){
    let numbers = /^[0-9]+$/;
    if(elem.value.trim().match(numbers)){
    setInvalid(elem,"Пароль должен содержать минимум 1 букву")
    return false;
}else{
    setValid(elem);
    return true;
}
};

//length
function meetLength(elem, minlength, maxlength){
    if(elem.value.trim().length>minlength && elem.value.length<maxlength){
        setValid(elem)
        return true;
    }
    else if(elem.value.trim()< elem.minlength){
        setInvalid(elem, `${name} должен содержать от ${minLength} знаков`);
        return false;
    }else{
        setInvalid(elem, `${name} должен содержать до ${maxLength} знаков`);
        return false;
    }
    };


function containsCharacters(field, code) {
  let regEx;
  switch (code) {
    case 1:
      // letters
      regEx = /(?=.*[a-zA-Z])/;
      return matchWithRegEx(regEx, field, 'Must contain at least one letter');
    case 2:
      // letter and numbers
      regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one letter and one number'
      );
    case 3:
      // uppercase, lowercase and number
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one uppercase, one lowercase letter and one number'
      );
    case 4:
      // uppercase, lowercase, number and special char
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one uppercase, one lowercase letter, one number and one special character'
      );
    case 5:
      // Email pattern
      regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return matchWithRegEx(regEx, field, 'Must be a valid email address');

    default:
      return false;
  }
}
function matchWithRegEx(regEx, field, message) {
  if (field.value.match(regEx)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, message);
    return false;
  }
}
    //   function checkEmail(email) 
    //   {
    // let re= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //    if (re.test(email.value.trim()))
    //     {
    //       return (true);
    //     }
    //       alert("You have entered an invalid email address!")
    //       return (false);
    //   }