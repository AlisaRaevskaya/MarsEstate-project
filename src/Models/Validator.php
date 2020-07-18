<?php

class Validator(){
public $email;
public $email;

public function getUserEmail($email){
    
    $sql = 'SELECT * FROM users_info Where email=:email;';
    $params = [
        'email' => $email;
    ];
    $user_email = $this->dbconnection->execute($sql, $params, false);
    //если флаг false-1 запись
    return $user_email;//соединяемся с бд и вызываем метод 
    }
public function getUserPassword($password){
        $sql = 'SELECT * FROM users_info Where password=:password;';
        
        $user_password = $this->dbconnection->execute($sql, ['password'=>$password;], false);
        
        return $user_password;
        
        }
public function getUserName($name){
            $sql= 'SELECT * FROM users_info Where name=:name';   
            }
            
public function CheckPassword($password, $re_password){
           
            }

}