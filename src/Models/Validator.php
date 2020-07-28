<?php

namespace Alisa\MarsEstate\Models;


class Validator{

private $data;
private $errors=[];

// private static $fields = ['name','email', 'password','re_password','checkbox'];
// private static $auth_fields = ['email', 'password'];

public function setData($post_data){
 $this->data = $post_data;
}

public function getData(){
 return $this->data;
 }

public function validateForm(){

  $this->  validateEmail();
  $this->  validatePassword();
  $this->  validateName();
  $this-> validateCheckbox();
  $this->validateCPassword();
  
  return $this->errors;
}

public function validateSubForm(){

  $this->validateEmail();
  
  return $this->errors;
}



public function addError($key, $message){
  $this->errors[$key] = $message;
}


public function validateName(){
  $val =trim($this->data['name']);
  if(empty($val)){
    $this->addError('name','поле не может быть пустым');
  }else {
    if(!preg_match("/[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/", $val)) {
      $this->addError( 'name',"Имя пользователя может содержать буквы и цифры, первый символ обязательно буква");
  }
}
}



public function validateEmail(){
  $val =trim($this->data['email']);
  if(empty($val)){
    $this->addError('email','Поле не может быть пустым');
  }else{
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)){
      $this->addError( 'email',"Invalid email format");
  }
  }
}

public function validateCheckbox(){
  $val =$this->data['checkRules'];
  
if (!isset($this->data['checkRules'])){
    $val = 0;
    $this->addError( 'checkRules',"Необходимо согласиться с правилами");
  };
}


public function validatePassword(){
  $val =trim($this->data['password']);
  if(empty($val)){
    $this->addError('password','поле не может быть пустым');
  }else{
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $val)){
      $this->addError( 'password',"Строчные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов");
  }
  }
}
public function validateCPassword(){
  $val =trim($this->data['re_password']);
  $pass =trim($this->data['password']);
  if(empty($val)){
    $this->addError('password','поле не может быть пустым');
  }else{
    if($pass !== $val){
    $this->addError('re_password',"Пароли не совпадают");
  }
  }
}





}

  