<?php
namespace Alisa\MarsEstate\Models;

use Alisa\MarsEstate\Models\Validator;
use Alisa\MarsEstate\Controllers\IndexController;
use Alisa\MarsEstate\Base\DBConnection;


class SubService{ 
    const SUB_SUCCESS="Подписка успешна";
    const EMAIL_EXISTS="На данный email уже оформлена подписка";

    public $validator;
    private $dbConnection;


    public function __construct(){
    $this->validator = new Validator();
    $this->dbConnection = DBConnection::getInstance();//new DB object
    }


    public function subscribe($sub_data ){
  //валидация[]
        $sub_email=  $sub_data ['sub_email'];  

        if (isset($sub_data)){
            $this->validator->setData($sub_data);
            $errors =$this->validator->validateSubForm();
           }
        var_dump($this->getEmail($sub_email));
        //бд
        if ($this->getEmail($sub_email)) return self::EMAIL_EXISTS;

        //запись в бд
        $sql ="INSERT INTO subscription (id_subscription,email) VALUES(:id, :email);";
        $params=[
            'id'=>$this->dbConnection->getConnection()->lastInsertId(),
            'email'=>$sub_email
        ];
        return $this->dbConnection->executeSql($sql, $params)? self::SUB_SUCCESS : self::$errors[0];

        //отправка подтверждения

    }

 //получаем email из бд
 private function getEmail($email){
    $sql = 'select * from subscription where email = :email';
    $user = $this->dbConnection->execute($sql, ['email' => $email], false);
    return $user;
}

}