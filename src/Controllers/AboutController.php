<?php

namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;

class AboutController extends Controller
{
    public function about(){
        $template = 'template.php';
        $content = 'about_main.php';
        $data = [
            'page_title' => 'О нас',
            'path_css' => 'about'
            ];
            return $this->generateResponse($content, $data);
    }
}
    