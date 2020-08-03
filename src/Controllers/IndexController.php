<?php
namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Models\SubService;
use Alisa\MarsEstate\Models\PropertyService;

use Alisa\MarsEstate\Models\Validator;
use Alisa\MarsEstate\Base\Controller;


class IndexController extends Controller
{
    private $subService;
    // private $request;
    public $validator;
    private $propertyService;


    public function __construct(){
    $this->validator = new Validator();//new DB object
    $this->subService = new SubService();
    $this->propertyService = new PropertyService();
    // $this->request = new Request();
    }

    public function indexAction(){
        // должен отработать по запросу главной страницы /
        $props = $this->propertyService->getallProperties();
        foreach($props as $key => $value){
            $allHouses = $props[0];
            $allFlats= $props[1];
            $allLand = $props[2];
        }
        
        $content = 'main.php';
        $data = ['page_title'=>'Главная',
                 'path_css'=>'main',
                 'preloader'=>'preloader',
                 'mainjs'=>'main',
                 'allHouses'=>$allHouses,
                'allFlats'=>$allFlats,
                'allLand'=>$allLand
                ];

        return $this->generateResponse($content, $data);
    }

    public function subscription($request){
     
    $sub_data =$request->post();
    $result = $this->subService->subscribe($sub_data);

    return $this->ajaxResponse($result);//возвращает клиенту строчку

}



}
