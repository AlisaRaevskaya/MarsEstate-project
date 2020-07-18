<?php
namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;

class IndexController extends Controller
{
    public function indexAction(){
        // должен отработать по запросу главной страницы /
        $template = 'template.php';
        $content = 'main.php';
        $data = ['page_title'=>'Главная',
                 'path_css'=>'main',
                 'preloader'=>'preloader'
                ];

        return $this->generateResponse($content, $data);
    }
}
