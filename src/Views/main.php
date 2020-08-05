<div class="mainbox">

<section class="text-center info">
        <h1 class="container">Станьте владельцем земли на Марсе сегодня!</h1>
         <p class="container"> Компания HomeMars является самым признанным в мире агентством по небесной недвижимости и на протяжении десятилетий занимается продажей земли на планете Марс.</p>
        <p class="container"> Homemars - одна из ПЕРВЫХ компаний в мире, имеющая ТОРГОВЫЙ МАРК и АВТОРСКИЕ ПРАВА для продажи внеземного имущества в пределах нашей солнечной системы. </p>
</section>

<section class="services container">

    <div class="text-center container service-text">
    
        <div>
            <h3>НАШИ УСЛУГИ</h3>
        </div>
        <div>
            <p> Компания Homemars готова оказать нашим клиентам комплексные услуги, связанные с покупкой и арендой недвижимости, а также её обслуживанием.</p>
            <p> Мы всегда готовы помочь во всём, что связано с жизнью и отдыхом на Марсе.</p>
        </div>
    
        <div class="flex-row container space-between">
    
        <div class ="text-center service">
        <div>
            <p>ПОКУПКА</p>
            <p>Земельного участка</p>
        </div>
        <div>
          <img src="/static/img/land.jpg" class="hidden">
        </div>
         <div>
         <?foreach ($allLand as $land):?><?endforeach?>
            <p>На Марсе огромное количество свободной земли.</p>
            <p>У нас вы можете выбрать и купить участок любого метража.</p>
        </div>
        <div>
        <a href="/services/<?echo $land['name']?>"class="a_button">Подробнее>>></a>
        </div>

        </div>
    
        <div class="service text-center">
        <div>
            <p>ПОКУПКА</p>
            <p>Домов</p>
        </div>
      <div>
            <img src="/static/img/land1.jpg" class="imgscene">
      </div>
      <div>
        <p>У нас вы можете выбрать и купить квартиру, дом, виллу на Марсе.</p>
        <p> Помощь в оформлении и содержании.</p>
    </div>
    <?foreach ($allHouses as $house):?><?endforeach?>
    <div class="a_button" >
    <a href="/services/<?echo $house['name']?>"> Подробнее>>></a>
    </div>
  </div>
  
  <div class="service text-center">
    <div>
      <p>АРЕНДА</p>
      <p>Квартир на Марсе</p>
    </div>
    <div>
      <img src="/static/img/pic3.jpg" class="imgscene">
    </div>
    <div>
      <p>Поможем снять квартиру, дом, виллу на любой срок по цене от €20</p>
      <p>Это быстро, выгодно, надёжно!</p>
    </div>
    <div class="a_button">
    <? foreach ($allFlats as $flat):?><?endforeach?>
    <a href="/services/<?echo $flat['name']?>">Подробнее>>></a>
  </div>

  </div>

</div>
</section>

<div>
    <img src="/static/img/bigpicture1.jpg" alt="Marsscene">
</div>

<section class="container benefits_container flex-column space-around">

    <div class="flex-m-column text-benefits">
        <h3 class="text-center">Наши преимущества</h3>
        <p class="text-center">Как ведущие уполномоченные агенты Международной ассоциации исследования планет IAOHPE), 
            наша команда профессионалов стремится сделать вашу покупку недвижимости на Марсе максимально приятной и полезной.</p>
    </div>


    <div class="flex-column space-between benefits m-center">

        <div class="flex-row space-between flex-m-column m-center row-1">
    
        <div class="flex-4 item" >
        <span class="icon-like center"></span> 
        <h4>БОЛЬШОЙ ВЫБОР</h4>
        <p>Огромная, актуальная и постоянно пополняемая база вариантов.
        Тщательно отбираем базу объектов, проверяем документы на юридическую чистоту.</p>
        </div>

        <div class="flex-4 item" >
         <span class="icon-lock center"></span>   
        <h4>БЕЗОПАСНОСТЬ СДЕЛКИ</h4>
        <p>Защитим вашу сделку своими средствами в случае потери права собственности.
        Все консультации и сервисы компании бесплатны.</p>
        </div>

        <div class="flex-4 item">
         <span class="icon-briefcase center"></span> 
        <h4>ПРАВОВОЕ СОПРОВОЖДЕНИЕ</h4>
        <p>Наши сделки – юридически безупречны.
        Все варианты  в нашей базе данных отсеяны от сомнительных и ненадежных предложений.</P>
        </div>

        <div class="flex-4 item">
            <span class="icon-clock center"></span> 
            <h4>ЭКОНОМИЯ ВРЕМЕНИ</h4>
            <p>Экономим ваше время: берём всю рутину на себя, вам не нужно тратить время, чтобы разбираться.</p>
        </div>
    </div>

   

<div class="flex-row space-around flex-m-column m-center row-1" >
        <div class="flex-4 item">
            <span class="icon-user-following "></span> 
            <h4>ИНДИВИДУАЛЬНЫЙ ПОДХОД </h4>
            <p> Каждый обратившийся к нам гарантированно получает все необходимые консультации, советы и поддержку в любом объеме, 
             и в любое время суток.</p>
            </div>
        <div class="flex-4 item">
                <span class="icon-trophy "></span> 
                <h4>БОЛЬШОЙ ОПЫТ И ПРАКТИКА</h4>
                <p> Наши сотрудники – это Профессионалы с большой буквы.
                Их накопленный опыт и знания позволяют решать не только обычные, но и самые нестандартные задачи.</p>
                </div>
        <div class="flex-4 item" >
            <span class="icon-calculator"></span> 
            <h4>ФИНАНСОВАЯ ПРОЗРАЧНОСТЬ</h4>
            <p>Все финансовые условия, размеры комиссионных, схема оплаты и другие важные нюансы обсуждаются еще до заключения договора. </p>
            </div>

        <div class="flex-4 item">
                <span class="icon-rocket"></span> 
                <h4>СКОРОСТЬ И ТЕХНОЛОГИИ</h4>
                <p>Наши риелторы имеют современное техническое оборудование и программное обеспечение и работают по утвержденным корпоративным стандартам.</p>
            </div>
    </div>  
</section>

<section class="forvideo flex-column center">
        <div class="whyMars">
            <h3>Почему Марс?</h3>
        </div>
        <div class="container flex-row space-around aligncenter video_container">
                
            <div class="video">   
                <video controls>
                <source src="/static/video/marslife3.mp4" type="video/mp4">
                </video>
            </div>
    
            <div class="text-for-video">
               
                <p>Что такое Марс для нас? 
                Марс является символом надежды, романтики, достижений и перемен, все в одном лице.
                </p> 
                <p>Нет ничего более символического и романтичного на Земле, что можно подарить любимому человеку.Это не причуда, с которой мы можем играть, это не то, что когда-либо потеряет свою привлекательность.
                Когда вы покупаете вашу собственность на Марсе или на любой другой планете, пожалуйста, наслаждайтесь ею, потому что это то, что на самом деле круто!
                </p>
                <p>Вы можете посмотреть в ночное небо и сказать: «У меня есть часть этого!»</p>
            </div>
    
        </div>
</section>



<section>
    <div class="flex-row space-around container block-concept flex-m-column">
    
    <div class="text_concept flex-6 ">
        <h2 class="text-center">КОНЦЕПЦИЯ-</h2>
        <h3 class="text-center">ПРАВИЛЬНЫЙ ВЫБОР</h3>
        <p> Имея богатый опыт работы на рынке недвижимости, наша компания знает что необходимо учесть при покупке квартиры в новом доме.
        Район, качество строительства,транспортная доступность, планировка, репутация и надежность застройщика – все должно быть идеально и правильно.</p>
        <p>Именно поэтому в основе нашей деятельности лежит концепция Правильный выбор. </p>
        <p>Мы тщательно отбираем дома, которые отвечают самым взыскательным требованиям, чтобы, покупая квартиры у нас, вы сделали свой 
        Правильный выбор.</p>
    </div>
    
    <div class="flex-6 marsmap">
            <img src="/static/img/fmhome23.png" alt="Marsmap" class="imgscene">
    </div>
    
    </div>
</section>

<section class="s-stats">

    <div class="flex-row center container stats-container">
    
        <div class="flex-column text-center space-between">
            <div class="stats_count_contract">0</div>
            <p>Успешных сделок</p>
        </div>
    
        <div class="flex-column text-center">
            <div class="stats_count_years text-center">0</div>
            <p>лет на рынке</p>
        </div>
        <div class="flex-column text-center">
            <div class="stats_count_agents text-center">0</div>
            <p>Профессиональных агентов</p>
        </div>
        <div class="flex-column text-center">
            <div class="stats_count_clients text-center">0</div>
            <p>Довольных клиентов</p>
        </div>
    
    </div> 
    </section> 

<section>
    <div class="famous container">
        <h2 class="text-center">Знаменитости,которые приобрели Внеземную Землю!</h2>
        <div>
            <div class="flex-row space-between nowrap xm-scroll flex-m-column container m-space-between">
            <img src="/static/img/fam1.jpg">
            <img src="/static/img/fam2.jpg">
            <img src="/static/img/fam3.jpg">
            <img src="/static/img/fam4.jpg">
            <img src="/static/img/fam5.jpg">
            </div>
            <div class="flex-row space-around nowrap xm-scroll flex-m-column container m-space-between" >
            <img src="/static/img/fam6.jpg">
            <img src="/static/img/fam7.jpg">
            <img src="/static/img/fam8.jpg">
            <img src="/static/img/fam9.jpg">
            <img src="/static/img/fam10.jpg">  
            </div>
        </div>
    </div>
</section>

<section class="feedback">
    <div class="container">
        <div class="text-center">
        <h2>Отзывы наших клиентов</h2>
        <p>Вам нужно больше информации? Проверьте, что другие люди говорят о нашем продукте.</p>
        </div>

     <div class="flex-row space-around flex-m-column">
     <?foreach ($reviews as $rev):?>
            <div class="flex-4">
                <img src="/static/img/<?echo $rev['img']?>"id="round">
                <p><strong><?echo $rev['author']?></strong></p>
                <p><?echo $rev['text']?></p>
            </div>
    <?endforeach;?>       
    </div>
    </div>
    </section>

    <section class ="subscription container text-center">
        <div>
           <p>Станьте одним из первых владельцев земли на других планетах и лунах, 
               подпишитесь на нашу рассылку в нижней части этой страницы. </p>
           <p>Мы будем держать вас в курсе самой последней информации о вашей покупке,
           а также о специальных предложениях, предлагаемых вам только HomeMars.com.</p>
       </div>
       <div><form action= "/subscription/" method="POST" name="sub_Form">
               <input required type ="email" name="sub_email" placeholder ="Ваш email" class ="sub_input">
               <input type ="submit" class ="sub_button" value="Подписаться" name="submit">
               <span class="email_exists block"></span>
               </form>
       </div>
           </section>
            <script src="/static/js/<?echo $mainjs;?>.js"></script>
            
           <script src="static/js/subscription.js"></script>