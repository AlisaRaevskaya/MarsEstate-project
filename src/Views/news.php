<h3>Главная страница</h3>
<?php foreach ($news as $one_news):?>
<h4><? echo $one_news['title'] ?></h4>
<p><? echo $one_news['text'] ?></p>
<img src ="static/img<?echo $one_news['img']?>">
<p><? echo $one_news['text'] ?>
<?endforeach;?>