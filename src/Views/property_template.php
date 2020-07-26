
<div class="container flex-row space-around flex-sm-column flex-s-column wrap">
<?php foreach ($properties as $prop):?>
                <div class="screen_container">
                    <h2><? echo $prop['property_name'] ?></h2>
                    <div class="screen">
                        <img src="/static/img/<?echo $prop['img_property']?>" alt="house" class="transition" >
                    </div>
                    <h4>Район:<?echo $prop['location']?></h4>
                    <div class="description">
                        <p>S общ. / жил.—  <?echo $prop['s_main']?> м2 </p>
                        <p>S кухни — <?echo $prop['s_kitchen']?> м2 </p>
                        <p>S прихожей—  <?echo $prop['s_corridor']?> м2 </p>
                        <p>Цена:<?echo $prop['price']?> рублей</p>
                    </div>
                    <div>
                        <p><?$prop['description']?></p>
                    </div>
                </div>
            <?php endforeach;?>
</div>