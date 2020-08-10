<?php
//регистрация, авторизация

namespace Alisa\MarsEstate\Models;

use Alisa\MarsEstate\Models\Validator;
use Alisa\MarsEstate\Controllers\AccountController;
use Alisa\MarsEstate\Base\DBConnection;


class AccountService{

    const USER_EXISTS='Такой пользователь уже существует';
    const PASS_NOT_SAME='Пароли не совпадают';
    const REG_SUCCESS='Регистрация успешна!';
    const INSERT_ERROR='Данные не добавились';
    const EMAIL_ERROR ='Пользователь с таким email не зарегистрирован';
    const AUTH_SUCCESS ='Авторизация успешна';
    const RULE_ERROR='Необходимо дать согласие с правилами сайта';
    const AUTH_PWD_ERROR='Неверный пароль';

    public $validator;
    private $dbConnection;


    public function __construct(){
    $this->validator = new Validator();
    $this->dbConnection = DBConnection::getInstance();//new DB object
    }

//контроллер передает данные из post

    public function addUser(array $reg_data){

        if (isset($reg_data))
        {$this->validator->setData($reg_data);
        $errors=$this->validator->validateForm();
        }

        if(!empty($errors)) return $errors;

        //если пустой массив и нет ошибок, объявляем переменные полей
         $checkbox = $reg_data['checkRules'];
         $name = $reg_data['name'];
         $pwd = $reg_data['password'];
         $re_pwd = $reg_data['re_password'];
        $email = $reg_data['email'];

        //проверка на уже имеющийся email в бд
        if ($this->getUser($email)) return self::USER_EXISTS;
        //шифрование пароля
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        //запись данных в бд user_info
        $sql ="INSERT INTO user_info 
        (user_id, name, password, email, checkRules)
        VALUES(:id, :user_name, :user_pwd,:user_email, :checkRules);";
        $params=[
            'id'=>$this->dbConnection->getConnection()->lastInsertId(),
            'user_name'=>$name,
            'user_pwd'=>$pwd,
            'user_email'=>$email, 
            'checkRules'=>$checkbox 
        ];
        return $this->dbConnection->executeSql($sql, $params)? self:: REG_SUCCESS : self::INSERT_ERROR;  
    }

    public function authUser($auth_data){

        if (isset($auth_data)){
            $this->validator->setData($auth_data);
            $errors =$this->validator->validateAuthForm();
           }

           if(!empty($errors)) return $errors;

        $password = $auth_data['password'];
        $email = $auth_data['email'];
        
        //обращаемся к бд, ищем соотвествия, если да, возвращаем ответ

            $user =$this->getUser($email);
            if(!$user)return self::EMAIL_ERROR;

            if(!password_verify($password, $user['password'])){
                return self::AUTH_PWD_ERROR;
            }
            return self::AUTH_SUCCESS;
        }

       //получаем email из бд
        private function getUser($email){
            $sql = 'select * from user_info where email = :email';
            $user = $this->dbConnection->execute($sql, ['email' => $email], false);
            return $user;
        }
    
}