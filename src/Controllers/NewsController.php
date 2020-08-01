<?php
namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;
use Alisa\MarsEstate\Models\NewsService;
use Alisa\MarsEstate\Base\Request;


class NewsController extends Controller{

private $newsService;

public function __construct(){

    $this->newsService = new NewsService();
}

public function showAllNews(){
   $allNews = $this->newsService->getAllNews();
   $content="newsMain.php";
   $data = [
       'page_title'=>'Все новости',
       'path_css'=>'news',
       'allNews'=> $allNews
   ];
   return $this->generateResponse($content, $data);
    }
 
    public function showNewsByID(Request $request){
        $id = $request->params()['id_news'];
        $newsById = $this->newsService->getNewsById($id);
        $content ='news_template.php';
        $data = [
            'page_title' => $news['title'],
            'newsById' => $newsById,
            'path_css'=>'news'
        ];
        return $this->generateResponse($content, $data);

    }

}
// $category = $request->params()['category'];

    // $animal= $this->animalService = getAnimalsByCategory($category);
    // $content = 'animalsByCategory.php';
    //     $data = [
    //         'page_title' => ?$animals[0]['description'];
    //         'animals'=>$animals
    //     ];
    // $this->generateResponse($content,$data);
    // var_dump($animal);

        // $id_animal=$request->params()['id'];
    // $animal= $this->animalService = getAnimalsById($id);
    // $content = 'animal.php';
    //     $data = [
    //         'page_title' => ?$animals[0]['description'];
    //         'animals'=>$animals
    //     ];
    // $this->generateResponse($content,$data);

    // var_dump($request->params());