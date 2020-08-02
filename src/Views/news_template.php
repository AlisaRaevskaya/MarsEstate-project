

<section class="for_news_by_id flex-column space-around container">
<div class="img_for_news_by_id">
<img src="/static/img/<?echo $newsById['img']?>">
</div>
<div class ="text_for_news">
<h2><?echo $newsById ['title']?></h2>
<p><?echo $newsById ['date']?></p>
<p><?echo  $newsById ['text']?></p>
</div>
<a href="/news/all" class="text-center button_back">Назад</a>
</section>
<script src="/static/css/news.css"></script>