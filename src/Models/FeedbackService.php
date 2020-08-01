<?
namespace Alisa\MarsEstate\Models;

use Alisa\MarsEstate\Models\Validator;
use Alisa\MarsEstate\Controllers\FeedBackController;
use Alisa\MarsEstate\Base\DBConnection;


class FeedbackService{

    public $validator;
    private $dbConnection;


    public function __construct(){
    $this->validator = new Validator();
    $this->dbConnection = DBConnection::getInstance();
    //new DB object
 }

 public function checkFeedback($feed_data){

    if (isset($feed_data)){//валидация
        $this->validator->setData($reg_data);
        $errors=$this->validator->validateFeedBackForm();
       }
    //получаем массив с ошибками  $errors
    //если в $errors не пустой массив, возвращаем его в функции addUSer  
    if($errors !== []) return $errors;
    //если пустой массив и нет ошибок, объявляем переменные полей
    $name = $feed_data['name'];
    $pwd = $feed_data['password'];
    $email = $feed_data['email'];
  
    //запись данных в бд
    $sql ="SELECT * FROM 'feedback_info'(id, name, email, subject, textarea)
    VALUES(:id, :name, :user_email, :subject, :textarea);";
    $params=[
        'id'=>$this->dbConnection->getConnection()->lastInsertId(),
        'user_name'=>$name,
        'user_pwd'=>$pwd,
        'user_email'=>$email, 
        
    ];
    return $this->dbConnection->executeSql($sql, $params)? self:: REG_SUCCESS : self::INSERT_ERROR;  
}

}