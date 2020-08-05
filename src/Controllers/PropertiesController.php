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


    foreach($props as $key => $value){
        $allHouses = $props[0];
        $allFlats= $props[1];
        $allLand = $props[2];
    }

    $content ="services.php";
    $data=['page_title'=>"Наши услуги",
            'path_css'=>'services',
            'allHouses'=>$allHouses,
            'allFlats'=>$allFlats,
            'allLand'=>$allLand
    ];
    return $this->generateResponse($content, $data);
        }

        public function showPropById(Request $request){
            $category = $request->params()['category'];
            $id_property=$request->params()['id'];
            $property = $this->propertyService->getPropertiesById($category, $id_property);
            $content ="property.php";
            $data=['page_title'=>$property['c_description'],
                    'path_css'=>'services',
                    'property'=>$property
        
            ];
            return $this->generateResponse($content, $data);
        }

        public function showCategory(Request $request) {

            // 'category' => string 'dogs' (length=4)
            // ключи массива - в конфиге в фигурных скобках{category}
            // значение - то что пришло в запросе
            $categoryName = $request->params()['category'];
            $properties = $this->propertyService->getPropertiesByCategory($categoryName);
            $content ="property_template.php";
            $data=['page_title'=>$properties[0]['c_description'],
                    'path_css'=>'services',
                    'properties'=>$properties
        
            ];
            return $this->generateResponse($content, $data);
        }

}