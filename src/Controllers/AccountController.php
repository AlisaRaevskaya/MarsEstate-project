<?php

namespace Alisa\MarsEstate\Controllers;

use Alisa\MarsEstate\Base\Controller;
use Alisa\MarsEstate\Models\AccountService;
use Alisa\MarsEstate\Base\Request;

class AccountController extends Controller
{
    private $accountService;
    // private $request;

    public function __construct()
    {
        $this->accountService = new AccountService();
    // $this->request = new Request();
    }


    // // метод, отвечающий за отображение страницы с регистрацией
    // // /registration GET

    // public function showRegForm(){
    //     $content = 'registration_form.php';
    //     $data = [
    //         'page_title'=>'Регистрация',
    //         'path_css' => 'form',
    //         'form_css'=>'style'
    //     ];
    //     return $this->generateResponse($content, $data);
    // }

    // // метод, реагирующий на отправку формы, отвечающий за
    // // региcтрацию пользователя /registration POST
    // public function regUser(Request $request){
    //     //var_dump($request->post())

    public function authUser($request){
        $auth_data = $request->post();

    }

    public function regUser($request){
       $reg_data= $request->post();
       $result=$this->accountService->addUser($reg_data);
    //    $data=[
    //        'reg_result'=>$result
           
    //    ];
       return $this->generateResponse($data);
    }

   

    
    // // добавить страницу account - личный кабинет пользователя
    // public function account(){
    //     $content = 'account.php';
    //     $data = [
    //         'page_title'=>'Личный кабинет'
    //     ];
    //     return $this->generateResponse($content,$data);
    // }

    // public function login(Request $request){
    //     $auth_data =$request->post;
    //     //валидация
    // }
}