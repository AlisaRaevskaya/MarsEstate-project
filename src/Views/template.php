<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="/static/css/simple-line-icons.css">
    <link rel="shortcut icon" href="/static/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/static/css/<?echo $preloader;?>.css">
    <link rel="stylesheet" href="/static/css/<?echo $path_css;?>.css">
    <link rel="stylesheet" href="/static/css/<?echo $form_css;?>.css">
    <link rel="stylesheet" href="/static/css/slick.css"/>
    <link rel="stylesheet" href="/static/slick/slick.css"/>
    <link rel="stylesheet" href="/static/slick/slick-theme.css"/>
    <title><?echo $page_title; ?></title>
    <!--общие библиотек-->
    <script src="/static/js/libs/common.js"></script> 

</head>
<header class="general">
<div class="absolute">
    <div class="firstheader flex-row flex-end">
            <h4>marshome@gmail.com</h4>
    </div>    
    <div class="flex-row secondheader">
    
            <div class="flex-row logo">
                <img src="/static/img/icon81.png" alt="Logo" id ="logo">
                <h2>HomeMars Estate</h2>
            </div>
    
    <div class="container">
    <nav class="menu">
    <ul class="flex-row nodecoration space-around flex-s-column">
        <li>
            <a href="/">Главная</a>
        </li>
        <li>
            <a href="/about/">О нас</a>
            <ul class="submenu">
            <li><a href="/about/faq/;">FAQ</a></li>
            <li><a href="/about/facts/">Факты о марсе</a></li>
            <li><a href="/about/press/">Пресса о нас</a></li>
        </ul> 
        </li>
        <li>
            <a href="/services/">Наши услуги</a>
        </li>
        <li>
            <a href="/contacts/">Контакты</a>
        </li>
    </ul>
    </nav>
    </div>
    <div class="forlogin">
        <a href="#auth" class="icon-login"></a>
    </div>
</div>
</div>
</header>

<body>

<main><?include_once $content ?></main>

<footer class="flex-row space-around">

<div class="flex-4 address">

 <div class="flex-row logo">
     <div><img src="static/img/icon81.png"></div>
    <div><h2>HomeMars Estate</h2></div>
  </div>

  <div>
    <p>Наш офис находится в самом центре Санкт-Петербурга.</p>
    <h5>HomeMars Estate</h5>
    <h5>Невский проспект 180б, офис 300/h5>
    <h5>Санкт-Петербург</h5>
    <h5>195114</h5>
  </div>
  <div>
 <h4>marshome@gmail.com</h4> 
 <p>© HomeMars Estate (Ru) Ltd - зарегистрирована в г.Санкт-Петербург, No. 7956131.</p>
</div>
</div>

<div class="footer2 flex-4">
  <h3> О нас</h3>
  <p>Компания HomeMars является самым признанным в мире агентством по небесной недвижимости и на протяжении 
      десятилетий занимается продажей земли на планете Марc.</p> 
  <p>Home Planet Mars стремится держать вас в курсе самой последней информации о вашей покупке, 
      а также о специальных предложениях, предлагаемых вам только HomeMars.com.</p>
 <p>Homemars - одна из ПЕРВЫХ компаний в мире, имеющая ТОРГОВЫЙ МАРК и АВТОРСКИЕ ПРАВА для продажи внеземного имущества в пределах нашей солнечной системы</p>
</div>

<div class="flex-4 quickreferance">
  <h3>Наши Услуги</h3>
      <ul>
      <li><a href="<?php echo '/serices/service1'; ?>">Управление и обслуживание недвижимости;</a> </li>
      <li><a href="<?php echo '/serices/service2'; ?>">Полное юридическое сопровождение сделок;</a> </li>
      <li><a href="<?php echo '/serices/service3'; ?>">Релокационный сервис.</a> </li>
      <li><a href="<?php echo '/serices/service4'; ?>">Подбор объекта</a> </li>
      <li><a href="<?php echo '/serices/service5'; ?>">Оценка недвижимости</a> </li>
      <li><a href="<?php echo '/serices/service6'; ?>">Обмен недвижимости;</a> </li>
      <li><a href="<?php echo '/serices/service7'; ?>">Помощь в сьеме жилья.</a> </li>
  </ul>
</div> 

<div class="flex-4 social">
<h3>Наши контакты:</h3>
        <a href="#" class="facebook"></a>
        <a href="#" class="twitter"></a>
        <a href="#" class="youtube"></a>
        <a href="#" class="instagram"></a>
<h4>marshome@gmail.com</h4>
<h4>тел.8800231562</h4>
</div>
</footer>

<section class ="authorisation">
    <div class="dws-wrapper" id="auth">
    <div class="dws-form">
    
    <label title="Вкладка 1"class="tab">Авторизация</label>
    <label title="Вкладка 2"class="tab">Регистрация</label>
    
    <form class="tab-form" action="/authorisation" method="post" autocomplete="on" name="auth" >

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
    
    <form class="tab-form" action="/registration/" method="post" autocomplete="on" >

    <div class="inputBox">
    <span> 
    <label for="name_reg" class="labelText">Ваше имя</label>
    <input type="text" id="name_reg" name="name" class="userInput">
   </div>
        <div class="inputBox">
        <label for="email"class="labelText">Ваш email</label>
        <input type="email" id="email"name="email" class="userInput">
        </div>
    
        <div class="inputBox">
        <label for="pass"class="labelText">Ваш пароль</label> 
        <input type="password" id ="pass"name="password" class="userInput">
        </div>
        <div class="inputBox">
        <label for="repeat_pass"class="labelText">Повторите пароль</label> 
        <input type="password" id ="repeat_pass" name="re_password" class="userInput">
        </div>
        
        <div class="recover">
        <input type="checkbox" id="rules_ok" name="checkRules">
        <label for="rules_ok">Ознакомлен(-а) и принимаю 
        <br><a href="#" class="terms">условия регистрации</a></br></label>
        </div>
        <input type="submit" class="reg_button" value="Зарегистрироваться">
        <a class="close-modal" href="#0">+</a>
    </form>
    </div>
    </div>
</section>
<script src="/static/js/auth.js"></script>
<script src="/static/js/form.js"></script>
<script src="/static/js/general.js"></script>
<script src="/static/js/jqueri-1.11.0.min.js"></script>
<script src="/static/js/jquery-migrate-1.2.1min.js"></script>
<script src="/static/slick/slick.min.js"></script>
<script src="/static/js/slick.js"></script> 	
<script src="/static/js/slider.js"></script> 
</body>
</html>