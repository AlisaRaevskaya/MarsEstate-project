
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
      // span_auth.innerText= AUTH_SUCCESS;
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
    // span.innerText= REG_ERROR;
    return;
    }
    // span.innerText= REG_SUCCESS;
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
