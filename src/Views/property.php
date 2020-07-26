<div>
                    <div class="screen_container">
                         <h2><? echo $property['property_name'] ?></h2>
                        <div class="screen">
                            <img src="/static/img/<?echo  $property['img_property']?>" alt="house" class="transition" >
                        </div>
                        <h4>Район:<?echo  $property['location']?></h4>
                        <div class="description">
                            <h5>Общая площадь</h5>
                            <p>S общ. / жил. — <?echo $property['s_main']?>м2</p>
                            <p>S кухни — <?echo $property['s_kitchen']?>м2</p>
                            <p>S прихожей — <?echo $property['s_corridor']?>м2</p>
                            <p>Цена:<?echo $property['price']?>рублей</p>
                            <p><?echo $property['description']?></p>
                        </div>
                    </div>
                <div>