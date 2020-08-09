<?php

namespace Alisa\MarsEstate\Models;


class Validator{

private $data;
private $errors=[];

// private static $fields = ['name','email', 'password','re_password','checkbox'];
// private static $auth_fields = ['email', 'password'];
const EMPTY_FIELD='Поле не может быть пустым';
const EMAIL_FAIL='Неверный формат email';
const NAME_CHARACTER_FAIL="Имя пользователя может содержать буквы и цифры, первый символ обязательно буква";
const CHECKBOX_FAIL='Необходимо согласиться с правилами';
const PASS_FAIL="Пароль должен содержать строчные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов";
const PASS_NOT_SAME='Пароли не совпадают';
const LENGTH_FAIL="Поле должно содержать меньше букв";

public function setData($post_data){
 $this->data = $post_data;
}

public function getData(){
 return $this->data;
 }

public function validateForm(){

  $this-> validateEmail();
  $this-> validatePassword();
  $this-> validateName();
  $this-> validateCheckbox();
  $this->validateCPassword();
  
  return $this->errors;
}

public function validateAuthForm(){
  $this-> validateEmail();
  $this-> validatePassword();
  return $this->errors;
}

public function validateSubForm(){
  $this->validateSubEmail();
  return $this->errors;
}


public function validateFeedBackForm(){
  $this->validateName();
  $this->validateEmail();
  return $this->errors;
}


public function addError($key, $message){
  $this->errors[$key] = $message;
}

public function validateName(){
  $val =trim($this->data['name']);
  if(empty($val)){
    $this->addError('name', self::EMPTY_FIELD);
  }else{
    if(!preg_match("/[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/", $val)) {
      $this->addError( 'name', self::NAME_CHARACTER_FAIL);
  }
}
}


public function validateEmail(){
  $val =trim($this->data['email']);
  if(empty($val)){
    $this->addError('email', self::EMPTY_FIELD);
  }else{
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)){
      $this->addError( 'email', self::EMAIL_FAIL);
  }
  }
}
function validateSubEmail(){
  $val = trim($this->data['email']);
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]$/",$val)){
      $this->addError('email', self::EMAIL_FAIL);
    }
}


public function validateCheckbox(){
  $val =$this->data['checkRules'];
  
if (empty($this->data['checkRules'])){
    $val = 0;
    $this->addError( 'checkRules',self::CHECKBOX_FAIL);
  }
}


public function validatePassword(){
  $val =trim($this->data['password']);
  if(empty($val)){
    $this->addError('password',self::EMPTY_FIELD);
  }else{
    if(!preg_match('/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,15}/', $val)){
      $this->addError( 'password', self::PASS_FAIL);
  }
  }
}

public function validateCPassword(){
  $val =trim($this->data['re_password']);
  $pass =trim($this->data['password']);
  if(empty($val)){
    $this->addError('re__password', self::EMPTY_FIELD);
  }else{
    if($pass !== $val){
    $this->addError('re_password',self::PASS_NOT_SAME);
    }
  }
}

public function validateTextArea(){
    $limit = 300;
    $val =trim($this->data['textarea']);
    if(empty($val)){
      $this->addError('textarea',self::EMPTY_FIELD);
    }else{
      if(strlen($val)>$limit){
      $this->addError('textarea',self::LENGTH_FAIL);
      }
    }
}

public function validateSubjectArea(){
    $limit = 50;
    $val = trim($this->data['subject']);
    if(empty($val)){
      $this->addError('subject',self::EMPTY_FIELD);
    }else{
        if(strlen($val)>$limit){
        $this->addError('subject',self::LENGTH_FAIL);
        }
      }
    }

}

  