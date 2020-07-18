
/* <div class="inputBox">
    <label for="email_reg"class="labelText">Ваш email</label>
    <input type="email" id="email_reg"name="email" class="userInput">
    </div>

    <div class="inputBox">
    <label for="pass_reg"class="labelText">Ваш пароль</label> 
    <input type="password" id ="pass_reg"name="password" class="userInput">
    </div>
    <div class="inputBox">
    <label for="repeat_pass"class="labelText">Повторите пароль</label> 
    <input type="password" id ="repeat_pass" name="password" class="userInput">
    </div>
    <input type="submit" class="reg_button" value="Зарегистрироваться">

    <div class="recover">
    <input type="checkbox" id="rules_ok">
    <label for="rules_ok">Ознакомлен(-а) и принимаю 
    <br><a href="#" class="terms">условия регистрации</a></br></label>
    </div>
} */

//input fields 

let form = document.forms.authForm;
let form_reg = document.forms.regForm;
let submitButton = document.querySelector("input[type='submit']")
let password =form.elements.password;
let confirmPassword =form.elements.re_password;
let text_error= document.querySelector(".text_invalid");
let login=form.element.login;
let email=form.element.email;
let userInput=document.querySelector(".userInput");//input


//colors
const GREEN = '#4CAF50';
const RED ="#F44336";

form.addEventListener('submit', submitButtonFunction);

function submitButtonFunction(event){
    event.preventDefault();
    if (!validate(this)) return;

    console.log("Отправка на сервер");
    this.submit();
}


function validate(form) {
    // проверка пользовательского ввода
    return true;
}

//validators
function confirmPassword(){
    // Empty check
    if (checkIfEmpty(password)) return;
    // Must of in certain length
    if (!meetLength(password, 4, 100)) return;
    // check password against our character set
    // 1- a
    // 2- a 1
    // 3- A a 1
    // 4- A a 1 @
    //   if (!containsCharacters(password, 4)) return;
    return true;

};
function validateEmail(email){
    if (checkIfEmpty(email)) return;
    if(!checkEmail(email)) return;
    if (!meetLength(email, 4, 100)) return;
    if (!containsCharacters(email, 5)) return;
    return true;
};
function validatePassword(password) {
    // Empty check
    if (checkIfEmpty(password)) return;
    // Must of in certain length
    if (!meetLength(password, 4, 100)) return;
    // check password against our character set
    // 1- a
    // 2- a 1
    // 3- A a 1
    // 4- A a 1 @
    //   if (!containsCharacters(password, 4)) return;
    return true;
}  
   
   
    function validateEmail(email) {
        if (checkIfEmpty(email)) return;
        if (!containsCharacters(email, 5)) return;
        return true;

      }


      function checkEmail(email) 
      {
    let re= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       if (re.test(email.value.trim()))
        {
          return (true);
        }
          alert("You have entered an invalid email address!")
          return (false);
      }

//valid//invalid
function setVaild(elem){
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
        //return false;
    }
    else{
        setVaild(elem);
        //return true;
    }
};
//characters

function ifonlyLowercase(elem){
if(elem.value.trim()===elem.value.trim().toLowerCase()){
    setInvald(elem, 'Пароль должен содержать минимум 1 заглавную букву');
    return false;
}else{
setValid(elem);
return true;
}
};

function IfonlyUppercase(elem){
if(elem.value.trim()=== elem.value.trim().toUpperCase()){
    setInvald(elem, 'Пароль должен содержать минимум 1 букву низкого регистра')
    return false;
}else{
setValid(elem)
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
    if(elem.value.trim().length>elem.minlength && elem.value.length<elem.maxlength){
        setValid(elem)
        return true;
    }
    else if(elem.value.trim()< elem.minlength){
        setInvalid(elem, `${elem.name} должен содеражать от ${elem.minLength} знаков`);
        return false;
    }else{
        setInvalid(elem, `${elem.name} должен содеражать до ${elem.maxLength} знаков`);
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