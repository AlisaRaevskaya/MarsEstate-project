<?php
namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Models\SubService;

use Alisa\MarsEstate\Models\Validator;
use Alisa\MarsEstate\Base\Controller;


class IndexController extends Controller
{
    private $subService;
    // private $request;
    public $validator;

    public function __construct(){
    $this->validator = new Validator();//new DB object
    $this->subService = new SubService();
    // $this->request = new Request();
    }

    public function indexAction(){
        // должен отработать по запросу главной страницы /
        

        $content = 'main.php';
        $data = ['page_title'=>'Главная',
                 'path_css'=>'main',
                 'preloader'=>'preloader'
                ];

        return $this->generateResponse($content, $data);
    }

    public function subscription($request){
     
    $sub_data =$request->post();
    $result = $this->subService->subscribe($sub_data);

    return $this->ajaxResponse($result);//возвращает клиенту строчку

}



}
