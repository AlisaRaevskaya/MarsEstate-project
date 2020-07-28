<section class ="authorisation">
    <div class="dws-wrapper">
    <div class="dws-form">
    
    <label title="Вкладка 1"class="tab">Авторизация</label>
    <label title="Вкладка 2"class="tab">Регистрация</label>
    
    <form class="tab-form" autocomplete="on" name="auth" >

        <div class="inputBox">
    
        <label for="login" class="labelText">Ваш email</label>
        <input required type="email" id="login"name="email" class="userInput">
        <span class ="error"></span>
       </div>
       <div class="inputBox">
        <label for="pass"class="labelText">Ваш пароль</label> 
        <input required type="password" id="pass"name="password" class="userInput">
        <span></span>
       </div>
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
        <a class="close-modal" href="#0">+</a>
    
    </form>
    
    <form class="tab-form" action="/registration/" method="post" autocomplete="on" name="regForm">
    <span class="text-error"><?echo $reg_result?></span>

    <div class="inputBox">
    <label for="name_reg" class="labelText">Ваше имя</label>
    <input required type="text" id="name_reg" name="name" class="userInput" value="<?echo htmlspecialchars($_POST["name"]) ?? ''?>">
    <span class ="error"><?php echo $errors["name"]?></span>
    
   </div>
        <div class="inputBox">
        <label for="email"class="labelText">Ваш email</label>
        <input required type="email" id="email"name="email" class="userInput">
        <span class ="error"> <?php echo $errors["email"]?></span>
        </div>
    
        <div class="inputBox">
        <label for="pass2"class="labelText">Ваш пароль</label> 
        <input required type="password" id ="pass2"name="password" class="userInput">
        <span class ="error"><?php echo $errors["password"] ?? ''?></span>
        
        </div>
        <div class="inputBox">
        <label for="repeat_pass"class="labelText">Повторите пароль</label> 
        <input required type="password" id ="repeat_pass" name="re_password" class="userInput">
        <span class ="error"> <?php echo $errors["re_password"] ?? ''?></span>
       
        </div>
        
        <div class="recover">
        <input required checked type="checkbox" id="rules_ok" name="checkRules" value=1>
        <span></span>
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
<script src="/static/js/validator.js"></script>
<script src="/static/js/auth.js"></script>