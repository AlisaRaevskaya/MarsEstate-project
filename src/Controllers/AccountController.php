<?php

namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;
use Alisa\MarsEstate\Models\AccountService;
use Alisa\MarsEstate\Models\Validator;

class AccountController extends Controller
{
    private $accountService;
    // private $request;
    public $validator;

    public function __construct(){
    $this->validator = new Validator();//new DB object
    $this->accountService = new AccountService();
    // $this->request = new Request();
    }


    // // метод, отвечающий за отображение страницы с регистрацией
    // // /registration GET

    public function showForm(){
        $content = 'registration_form.php';
        $data = [
            'page_title'=>'Регистрация',
            'path_css' => 'form'
        ];
        return $this->generateResponse($content, $data);
    }

    // // метод, реагирующий на отправку формы, отвечающий за
    // // региcтрацию пользователя /registration POST


    public function regUser($request){
       $reg_data= $request->post();

       if (isset($reg_data)){
        $this->validator->setData($reg_data);
        $errors =$this->validator->validateForm();
       }

       $result=$this->accountService->addUser($reg_data);
    //    if ($result === AccountService::REG_SUCCESS){
    //     $_SESSION['email'] = $reg_data['email'];
    // }
    //     return $this->ajaxResponse($result);

       $content ='registration_form.php';
       $data=[
           'page_title'=>'Регистрация',
           'path_css' => 'form',
           'reg_result'=>$result,
           'errors'=>$errors
       ];
       return $this->generateResponse($content,$data);//возвращает html
    }

    public function authUser($request){
        
        $auth_data = $request->post();

        if (isset($auth_data)){
            $this->validator->setData($auth_data);
            $errors =$this->validator->validateForm();
           }

        $result =$this->accountService->authUser($auth_data);
        if ($result === AccountService::AUTH_SUCCESS){
            $_SESSION['email'] = $auth_data['email'];
        }
        return $this->ajaxResponse($result);//возвращает клиенту строчку
    }
    
    
    // // добавить страницу account - личный кабинет пользователя
    public function account(){
        if(!isset($_SESSION['email']))header('Location:/registration_form/');
        $content = 'account.php';
        $data = [
            'page_title'=>'Личный кабинет'
        ];
        return $this->generateResponse($content,$data);
    }

    public function logout() {
        $_SESSION=[];
        header('Location: /');
    }

}