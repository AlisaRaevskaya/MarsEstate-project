<?php

namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;
use Alisa\MarsEstate\Models\FeedbackService;


class ContactsController extends Controller{
    
    private $feedbackService;

    public function __construct(){

        $this->feedbackService = new FeedbackService();

    }
    
    public function contacts(){
        $content = 'contacts.php';
        $data = ['page_title'=>'Контакты',
                'path_css'=>'contacts'
                ];
        
        return $this->generateResponse($content, $data);
    }

    public function feedSend($request){
        $feed_data =$request->post();

        $result=$this->feedbackService->checkFeedback($feed_data);
        
        var_dump($result);

        $result =json_encode($result, JSON_UNESCAPED_UNICODE);

        return $this->ajaxResponse($result);
    }

}
