<?php
namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;
use Alisa\MarsEstate\Models\PropertyService;
use Alisa\MarsEstate\Base\Request;

class PropertiesController extends Controller{
    
    private $propertyService;

    public function __construct(){
        $this->propertyService = new PropertyService();
    }

    public function services(){
    $props = $this->propertyService->getallProperties();
    var_dump($props);
    $content ="services.php";
    $data=['page_title'=>"Наши услуги",
            'path_css'=>'services',
            'props'=>$props
    ];
    return $this->generateResponse($content, $data);
        }

        public function showCategory(Request $request) {

            // var_dump($request->params());
            // 'category' => string 'dogs' (length=4)
            // ключи массива - в конфиге в фигурных скобках
            // значение - то что пришло в запросе
            $category = $request->params()['category'];
            $animals = $this->animalService->getPropertiesByCategory($category);
            $content ="services.php";
            $data=['page_title'=>"Наши услуги",
                    'path_css'=>'services'
                    // 'props'=>$props
        
            ];
            return $this->generateResponse($content, $data);
    
        }

}