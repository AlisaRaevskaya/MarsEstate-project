<?php
//регистрация, авторизация

namespace Alisa\MarsEstate\Models;

use Alisa\MarsEstate\Base\DBConnection;
use Alisa\MarsEstate\Base\Validator;
use Alisa\MarsEstate\Controllers\AccountController;



class AccountService {
    const USER_EXISTS='Такой пользователь уже существует';
    const EMAIL_EXISTS='Email уже существует';
    const PASS_NOT_SAME='Пароли не совпадают';
    const REG_SUCCESS='Регистрация успешна!';
    const INSERT_ERROR='Ошибка добавления';
    const AUTH_SUCCESS='Авторизация успешна!';
    const AUTH_ERROR='Ошибка Авторизации!';
    const RULE_ERROR='Необходимо дать согласие с правилами сайта'

private $dbconnection;

public function __construct(){

$this->dbconnection= DBConnection::getInstance();//new DB
}

//контроллер передает данные из post
public function addUser(array $reg_data){

//получаем данные
$pwd = $reg_data['password'];
$email = $reg_data['email'];
$name = $reg_data['name'];
$re_pwd = $reg_data['re_password'];
$checkbox = $reg_data['checkRules'];


//проверка полей на имеющиеся email
if ($this->getUserEmail($email)) return self::EMAIL_EXISTS;
//проверка полей на cопадение паролей
if($this->getPassword($password) !== $re_pwd) return self::PASS_NOT_SAME;
//проверка checkbox
if(!$checkbox) return self::RULE_ERROR;

//зашифровка пароля
$pwd = password_hash($pwd, PASSWORD_DEFAULT);

//запись данных в бд user_info

$sql ="INSERT INTO user_info (name, email, password, re_password, agreement){//названия столбцов
    VALUES(:user_name,:user_email, :user_pwd, :user_re_pass, :agreement);";//
$params=[
    'user_id'=>$this->dbconnection->getConnection()->lastInsertId(),
    'user_name'=>$name,
    'user_email'=>$email, 
    'user_pwd'=>$pwd,
    'user_re_pass'=>$re_pwd,
    'agreement'=>$checkbox
];
return $this->dbconnection->executeSql($sql, $params)? self:: REG_SUCCESS: self::INSERT_ERROR;

}

public function authUser($auth_data){
    $pwd = $reg_data['password'];
    $email = $reg_data['email'];
    //валидация

    
}

//получаем email из бд
private function getUserEmail($email){

$sql = 'SELECT * FROM users_info Where email=:email;';
$params = [
    'email' => $email
];
$user_email = $this->dbconnection->execute($sql, $params, false);
//если флаг false-1 запись
return $user_email;//соединяемся с бд и вызываем метод 
}

//получаем password из бд
private function getPassword($password){
    $sql = 'SELECT * FROM users_info Where password=:pwd;';
    $params = [
        'password'=>$pwd
    ];
    $user_password =$this->dbconnection->execute($sql, $params, false);
    return $user_password;
        }

}