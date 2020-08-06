<div class="contacts">

    <h1 class="text-center">Наши Контакты</h1>
   

<div class="flex-row space-around">
        <div>
            <div>
                <h2>HomeMars Estate</h2>
            </div>
            <h2>Наш Адрес:</h2>
            <h4>Невский проспект 180б, офис 300</h4>
            <h4>Санкт-Петербург</h4>
            <h4>195114</h4>

            <h2>Мы работаем для Вас</h2>
            <h3>ПН-ПТ с 9 до 21.00 без перерыва</h3>
            <h3>СБ,BC-выходные</h3>

            <p> Вы можете обратиться к нашим специалистам по телефонам:</p>
            <h3>(4852) 932-532, +79023332532</h3> 
            <p>Viber, WhatsApp:</p><h3>89023332532</h3> 
            <p>или написать на электронную почту </p>
            <h3>marshome@gmail.com</h3>
            <div class="flex-4 social">
                <h3>Наши контакты в социальных сетях:</h3>
                        <a href="#" class="facebook"></a>
                        <a href="#" class="twitter"></a>
                        <a href="#" class="youtube"></a>
                        <a href="#" class="instagram"></a>
            </div>
        </div>
        <div>
            <img src="/static/img/astro2.png">
        </div>
    </div>
</div>

    <div id="form_message" >
        <div>
            <h4 class ="head_fb">Также Вы можете оставить обратную связь и обязательно с Вами свяжемся!</h4>
        </div>

        <form name="feedback_form">
            <h2>Форма обратной связи.</h2>

            <div class="titles">Ваше имя*</div>
            <input required class="input" name="name"/> 
            <span class="error_name"></span>

            <div class="titles">Электронная почта*</div>
            <input required class="input" name="email" />
            <span class="error_email"></span>
            
            <div class="titles">Тема сообщения*:</div>
            <input required class="input" name="subject" /> 
            <span class="error_subject"></span>
            
            <div class="titles">Текст сообщения*:</div>
            <textarea name="textarea" cols="22" rows="5"></textarea>
            <span class="error_textarea"></span>

            <span class ="for_send_result"></span>
            <div><input id="submit" value="Отправить" type="submit" /></div>
        </form>
    </div>
</div>

<script src="/static/js/fb_ajax.js"></script>