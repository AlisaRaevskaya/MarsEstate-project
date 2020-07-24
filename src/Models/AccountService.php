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
    const RULE_ERROR='Необходимо дать согласие с правилами сайта';
    const AUTH_PWD_ERROR='Неверный пароль';

    private $dbConnection;

    public function __construct(){

    $this->dbConnection= DBConnection::getInstance();//new DB object
    }

//контроллер передает данные из post

    public function addUser(array $reg_data){
       
        $email = $reg_data['email'];
        //проверка полей на уже имеющийся email в бд
        if ($this->getUser($email)) return self::USER_EXISTS;

        $pwd = $reg_data['password'];
        $re_pwd = $reg_data['re_password'];
        //проверка полей на cопадение паролей
        if($this->getPassword($pwd) !== $re_pwd) return self::PASS_NOT_SAME;
        //зашифровка пароля
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);

        $checkbox = $reg_data['checkRules'];
        //проверка checkbox
        if(!$checkbox) return self::RULE_ERROR;

        $name = $reg_data['name'];
        

        //запись данных в бд user_info
        $sql ="INSERT INTO user_info 
        (user_id, name, password, re_password, email, checkRules)
        VALUES(:id, :user_name, :user_pwd, :user_re_pass,:user_email, :checkRules);";
        $params=[
            'id'=>$this->dbConnection->getConnection()->lastInsertId(),
            'user_name'=>$name,
            'user_pwd'=>$pwd,
            'user_re_pass'=>$re_pwd,
            'user_email'=>$email, 
            'checkRules'=>$checkbox 
        ];
        return $this->dbConnection->executeSql($sql, $params)? self:: REG_SUCCESS : self::INSERT_ERROR;
    }

    public function authUser($auth_data){

    $password = $auth_data['auth_password'];
    $email = $auth_data['auth_email'];
    //валидация
    //обращаемся к бд, ищем соотвествия, если да, возвращаем ответ

        $user =$this->getUser($email);
        if(!$user)return self::AUTH_ERROR;
        if(!password_verify($password, $user['password'])){
            return self::AUTH_PWD_ERROR;
        }
        return self::AUTH_SUCCESS;
    }

        //получаем email из бд
    private function getUser($email){

        $sql = 'SELECT * FROM user_info Where email=:email;';
        $params = [
            'email' => $email
        ];
        $user = $this->dbConnection->execute($sql, $params, false);
        //если флаг false-1 запись
        return $user;//соединяемся с бд и вызываем метод 
    }

        //получаем password из бд
    private function getPassword($password){

            $sql = 'SELECT * FROM user_info Where password=:password;';
            $params = [
                'password'=>$password
            ];
            $user_password = $this->dbConnection->execute($sql, $params, false);
            return $user_password;
    }
    
}