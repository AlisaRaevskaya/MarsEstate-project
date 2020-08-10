<?php

namespace Alisa\MarsEstate\Controllers;
use Alisa\MarsEstate\Models\NewsService;
use Alisa\MarsEstate\Base\Controller;

class AboutController extends Controller
{
    private $newsService;

    public function __construct(){
    
    $this->newsService = new NewsService();
    }
    

    public function about($request){
        $allNews = $this->newsService->getNews();
        
        $content = 'about_main.php';
        $data = [
            'page_title' => 'О нас',
            'path_css' => 'about',
            'allNews'=>$allNews
            ];
            return $this->generateResponse($content, $data);
    }
}
    