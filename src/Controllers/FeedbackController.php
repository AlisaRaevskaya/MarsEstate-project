<?php 

namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;
use Alisa\MarsEstate\Models\Validator;

class FeedbackController extends Controller{
private $feedbackService;

public function __construct(){
    $this->feedbackService = new FeedbackService(); 

public function feedSend($request){
    $feed_data =$request->post();

    $result=$this->feedbackService->checkFeedback($feed_data);
    if ($result === AccountService::REG_SUCCESS){
     $_SESSION['email'] = $reg_data['email'];
 }
     return $this->ajaxResponse($result);

    $content ='contacts.php';
    $data=[
        'page_title'=>'Контак',
        'path_css' => 'form',
        'reg_result'=>$result,
        'errors'=>$errors
    ];
}
}