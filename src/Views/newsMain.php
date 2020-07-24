<title> <?echo $page_title?> </title>
<?foreach ($allNews as $news):?>
<div>
<img src="static/img/<?echo $news['img']?>">
<h2><?echo $news['title']?></h2>
<p><?echo $news['date']?></p>
<p><?echo  $news['text']?></p>
<a href="/news/<?echo $news['id_news']?> class='button'">>>Подробнее</a>
<? endforeach;?>
</div>
