<h1 class="text-center">Наши новости<h1>
<?foreach ($allNews as $news):?>

<div class="container">

<section class="news_item container grid_four">
    <div class="news_img">
        <img src="/static/img/<?echo $news['img']?>">
    </div>
    <div>
        <h4><?echo $news['title']?></h4>
        <p><?echo $news['desc']?></p>
        <a href="/news/<?echo $news['id_news']?>" class="button">>>Подробнее</a>
    </div>
    
</section>

<? endforeach;?>
</div>
