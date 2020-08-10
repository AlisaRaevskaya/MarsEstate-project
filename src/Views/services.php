<div class="flex-column space-around container">

    <article class="text-center container">
        <h2>Наши услуги</h2>  
        <p> Компания Homemars готова оказать нашим клиентам комплексные услуги, связанные с покупкой и арендой недвижимости, а также её обслуживанием.</p>
        <p> Мы всегда готовы помочь во всём, что связано с жизнью и отдыхом на Марсе.</p>
    </article>
    <hr>

    <section>
        <article class="text-center container">
            <h1>ПРОДАЖА ДОМОВ</h1>
            <p>Собственный частный дом или коттедж – это и показатель благосостояния человека, и конечный итог стремления к спокойствию и надёжности.</p> 
            <p>Сегодня жители густонаселенных городов, уставшие от постоянной спешки и шума, начинают активно выбирать и приобретать загородную недвижимость, расположенную на Марсе. </p>
        </article>

        <div class=" flex-row space-around flex-sm-column flex-s-column wrap">
        
            <?php foreach ($allHouses as $house):?>
                <div class="screen_container">
                    <h2><? echo $house['property_name'] ?></h2>
                    <div class="screen">
                        <img src="/static/img/<?echo $house['img_property']?>" alt="house" class="transition" >
                    </div>
                    <h4>Район:<?echo $house['location']?></h4>
                    <div class="description">
                        <p>S общ. / жил.—  <?echo $house['s_main']?> м2 </p>
                        <p>S кухни — <?echo $house['s_kitchen']?> м2 </p>
                        <p>S прихожей—  <?echo $house['s_corridor']?> м2 </p>
                        <p>Цена:<?echo $house['price']?> рублей</p>
                    </div>
                    <div>
                        <a href="/services/<?echo $house['name']?>/<?echo $house['id_property']?>"class="button">Подробнее...</a>
                    </div>
                </div>
            <?php endforeach;?>
            <div class = "container button_all">
            <a href="/services/<?echo $house['name']?>" class="button">Посмотреть все дома</a>
            </div>
        </div>
    </section>
    <hr> 

    <section>
            <article class="text-center container" >
                <h1>ПРОДАЖИ КВАРТИР</h1>
                <p>Собственный частный дом или коттедж – это и показатель благосостояния человека, и конечный итог стремления к спокойствию и надёжности. 
                    Сегодня жители густонаселенных городов, уставшие от постоянной спешки и шума, начинают активно выбирать и приобретать загородную недвижимость, расположенную на Марсе. </p>
            </article>

            <div class=" flex-row space-around flex-sm-column flex-s-column wrap">
                <?php foreach ($allFlats as $flat):?>
                    <div class="screen_container">
                        <h2><? echo $flat['property_name'] ?></h2>
                        <div class="screen">
                            <img src="/static/img/<?echo $flat['img_property']?>" alt="house" class="transition" >
                        </div>
                        <h4>Район:<?echo $flat['location']?></h4>
                        <div class="description">
                            <h5>Общая площадь</h5>
                            <p>S общ. / жил. — <?echo $flat['s_main']?>м2</p>
                            <p>S кухни — <?echo $flat['s_kitchen']?>м2</p>
                            <p>S прихожей — <?echo $flat['s_corridor']?>м2</p>
                            <p>Цена:<?echo $flat['price']?>рублей</p>
                        </div>
                        <div>
                        <a href="/services/<?echo $flat['name']?>/<?echo $flat['id_property']?>"class="button">Подробнее...</a>
                        </div>
                    </div>
                <?php endforeach;?>

                <div class ="container button_all">
            <a href="/services/<?echo $flat['name']?>" class="button">Посмотреть все квартиры</a>
            </div>
            </div>
    </section>
    <hr>
        

    <section>
        <article class="text-center container ">
            <h1>ЗЕМЕЛЬНЫЕ УЧАСТКИ</h1>
            <p>Если вы хотите купить земельный участок под строительство дома, то на сайте Homestars легко сможете найти подходящий вариант,
             поскольку здесь сформирован и регулярно обновляется каталог объявлений о продаже земли на Марсе </p>
        </article>

        <div class="container flex-row space-around flex-sm-column flex-s-column wrap">

            <?php foreach ($allLand as $land):?>
                <div class="screen_container">
                    <h2><? echo $land['property_name']?></h2>
                    <div class="screen land_img">
                        <img src="/static/img/<?echo $land['img_property']?>" alt="house" class="transition" >
                    </div>

                    <h4>Район:<?echo $land['location']?></h4>

                    <div class="description">
                        <h5>Общая площадь</h5>
                        <p>S общ. / жил. — <?echo $land['s_main']?> сот.</p>
                        <p>Удобства: <?echo $land['utilities']?></p>
                        <p>Цена:<?echo $land['price']?> рублей</p>
                    </div>
                    <div>
                        <a href="/services/<?echo $land['name']?>/<?echo $land['id_property']?>"class="button">Подробнее...</a>
                    </div>
                </div>
            <?php endforeach;?>

            <div class = "container button_all">
            <a href="/services/<?echo $land['name']?>"class="button">Посмотреть все участки</a>
            </div>
            </div>


    </section>

</div>
</div>