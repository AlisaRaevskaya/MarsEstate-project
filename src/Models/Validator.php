<?php

namespace Alisa\MarsEstate\Models;

use Alisa\MarsEstate\Base\Request;

class Validator{

private $data;
private $errors=[];
private static $fields =['name','email', 'password','checkbox'];

public function __constructor(){
  $this->data = request->post();

  
}
public function validateForm(){
  foreach(self::$fields as $field){
    if(!array_key_exists($field, $this->data)){
      trigger_error("Поля нет в форме");
      return;
    }
  }
  $this->  validateEmail();
  $this->  validatePassword();
  $this->  validateName();
  $this-> validateCheckbox()
  return $this->errors;
}

public function validateName(){
  $val =trim($this->data['name']);
  if(empty($val)){
    $this->addError('name','поле не может быть пустым')
  }else {
    if(!preg_match("^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$", $val)) {
      $this->addError( 'name',"Имя пользователя может содержать буквы и цифры, первый символ обязательно буква):";
  }
}
}



public function validateEmail(){
  $val =trim($this->data['email']);
  if(empty($val)){
    $this->addError('email','поле не может быть пустым')
  }else{
    if (!filter_var($val, FILTER_VALIDATE_EMAIL)){
      $this->addError( 'email',"Invalid email format");
  }
 
  }
}


public function validateCheckbox(){
  $val =trim($this->data['checkRules']);
  if (!{filter_var($val, FILTER_VALIDATE_BOOLEAN)){
    $this->addError( 'checkRules',"Must be checked");
  };
}

public function addError($key, $message){
  $this->errors[$key] = $message;
}

public function validatePassword(){
  $val =trim($this->data['password']);
  if(empty($val)){
    $this->addError('password','поле не может быть пустым')
  }else{
    if(!preg_match("?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$", $val)) {
      $this->addError( 'password',"Строчные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов";
  }
   
  }
}



  
 //Check the name and make sure that it isn't a blank/empty string.
 if(strlen(trim($name)) === 0){
  //Blank string, add error to $errors array.
  $errors[] = "You must enter your name!";
}
