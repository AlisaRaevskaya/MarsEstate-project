<section class ="authorisation">
        <div class="dws-wrapper">
        <div class="dws-form">
        
        <label title="Вкладка 1"class="tab">Авторизация</label>
        <label title="Вкладка 2"class="tab">Регистрация</label>
        
        <form class="tab-form" action="/authorisation/" method="post"autocomplete="on" name="auth" >
    
            <div class="inputBox">
        
            <label for="login" class="labelText">Ваш email</label>
            <input required type="email" id="login" name="email" class="userInput" minlength="5">
            <span class ="auth_email_error "></span>
           </div>
           <div class="inputBox input_for_pass">
            <label for="pass"class="labelText">Ваш пароль</label> 
            <input required type="password" id="pass"name="password" class="userInput"minlength="8" maxlength ="15" >
            <span class ="auth_password_error"></span>
           </div>
           <span class="auth_result"></span>
           <input type="submit" value="Войти" class="button "/>
           
            <div class="fa_accounts flex-row space-between">
                <div><a href="#"><i class="fa fa-facebook"></i></a></div>
                <div><a href="#"><i class="fa fa-twitter"></i></a></div>
                <div><a href="#"><i class="fa fa-instagram"></i></a></div>
                <div><a href="#"><i class="fa fa-vk"></i></a></div>
                <div><a href="#"><i class="fa fa-youtube"></i></a></div>
                </div>
            <a href ="#"class="forget">Забыли пароль?</a>
            <span id="auth_result"></span>
            <a class="close-modal" href="/">+</a>
        
        </form>
        
        <form class="tab-form" autocomplete="on" name="regForm">
    
        <div class="inputBox">
        <label for="name_reg" class="labelText">Ваше имя</label>
        <input required type="text" id="name_reg" name="name" class="userInput" minlength="2" maxlength ="20">
        <span class ="name_error"></span>
       </div>
        
            <div class="inputBox">
            <label for="email"class="labelText">Ваш email</label>
            <input required type="email" id="email"name="email" class="userInput">
            <span class ="email_error"> </span>
            </div>
        
            <div class="inputBox">
            <label for="pass2"class="labelText">Ваш пароль</label> 
            <input required type="password" id ="pass2"name="password" class="userInput"minlength="8" maxlength ="15"  >
            <span class ="pass_error"></span>
            
            </div>
            <div class="inputBox">
            <label for="repeat_pass"class="labelText">Повторите пароль</label> 
            <input required type="password" id ="repeat_pass" name="re_password" class="userInput" minlength="8" maxlength ="15"  >
            <span class ="cpass_error"> </span>
            </div>
            
            <div class="recover">
            <input required checked type="checkbox" id="rules_ok" name="checkRules" value=1>
            <label for="rules_ok">Ознакомлен(-а) и принимаю 
            <br><a href="#"class="terms">условия регистрации</a></br></label>
            </div>
            <span class="reg_result block"><?echo $reg_result?></span>
            <input type="submit" class="reg_button" value="Зарегистрироваться">
            <a class="close-modal" href="/">+</a>
        </form>
        </div>
        </div>
    </section>
<script src="/static/js/validator.js"></script>
<script src="/static/js/auth.js"></script>
<script src="/static/js/form.js"></script>
