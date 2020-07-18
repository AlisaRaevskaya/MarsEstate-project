<section class ="authorisation">
    <div class="dws-wrapper" id="auth">
    <div class="dws-form">
    
    <label title="Вкладка 1"class="tab">Авторизация</label>
    <label title="Вкладка 2"class="tab">Регистрация</label>
    
    <form class="tab-form" action="/authorisation/" method="post" autocomplete="on" >

        <div class="inputBox">
    
        <label for="login" class="labelText">Ваш email</label>
        <input type="text" id="login"name="email" class="userInput">
       </div>
       <div class="inputBox">
        <label for="pass"class="labelText">Ваш пароль</label> 
        <input type="password" id="pass"name="password" class="userInput">
       </div>
       <input type="submit" value="Войти" class="button"/>
       
        <div class="fa_accounts flex-row space-between">
            <div><a href="#"><i class="fa fa-facebook"></i></a></div>
            <div><a href="#"><i class="fa fa-twitter"></i></a></div>
            <div><a href="#"><i class="fa fa-instagram"></i></a></div>
            <div><a href="#"><i class="fa fa-vk"></i></a></div>
            <div><a href="#"><i class="fa fa-youtube"></i></a></div>
            </div>
        <a href ="#"class="forget">Забыл пароль?</a>
        <a class="close-modal" href="#0">+</a>
    
    </form>
    
    <form class="tab-form" action="/registration_form/" method="post" autocomplete="on" >

    <div class="inputBox">
    <span><?echo $reg_result?></span>
    <label for="name_reg" class="labelText">Ваше имя</label>
    <input type="text" id="name_reg" name="name" class="userInput">
   </div>
        <div class="inputBox">
        <label for="email"class="labelText">Ваш email</label>
        <input type="email" id="email"name="email" class="userInput">
        </div>
    
        <div class="inputBox">
        <label for="pass2"class="labelText">Ваш пароль</label> 
        <input type="password" id ="pass2"name="password" class="userInput">
        </div>
        <div class="inputBox">
        <label for="repeat_pass"class="labelText">Повторите пароль</label> 
        <input type="password" id ="repeat_pass" name="re_password" class="userInput">
        </div>
        
        <div class="recover">
        <input type="checkbox" id="rules_ok">
        <label for="rules_ok">Ознакомлен(-а) и принимаю 
        <br><a href="#"class="terms">условия регистрации</a></br></label>
        </div>
        <input type="submit" class="reg_button" value="Зарегистрироваться">
        <a class="close-modal" href="#0">+</a>
    </form>
    </div>
    </div>
</section>

<script src="/static/js/form.js"></script>
<script src="/static/js/general.js"></script>