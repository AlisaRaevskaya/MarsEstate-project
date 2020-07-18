<?php
namespace Alisa\MarsEstate\Controllers;
use Alisa\MarsEstate\Base\Controller;


class ServicesController extends Controller{

public function services(){
$template='template.php';
$content ="services.php";
$data=['page_title'=>"Наши услуги",
        'path_css'=>'services'
];
return $this->generateResponse($content, $data);

    }
}