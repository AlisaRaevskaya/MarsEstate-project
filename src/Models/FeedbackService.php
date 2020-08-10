<?
namespace Alisa\MarsEstate\Models;

use Alisa\MarsEstate\Models\Validator;
use Alisa\MarsEstate\Controllers\ContactsController;
use Alisa\MarsEstate\Base\DBConnection;


class FeedbackService{

    const F_SUCCESS="Ваша информация принята";
    const INSERT_FAIL ="Данные не добавлены";

    public $validator;
    private $dbConnection;


    public function __construct(){
    $this->validator = new Validator();
    $this->dbConnection = DBConnection::getInstance();
    //new DB object
 }

 public function checkFeedback($feed_data){

    if (isset($feed_data)){
        $this->validator->setData($feed_data);
        $errors=$this->validator->validateFeedBackForm();
       }
    //получаем массив с ошибками  $errors
    //если в $errors не пустой массив, возвращаем его в функции  
    if(!empty($errors)) return $errors;

    //если пустой массив и нет ошибок, объявляем переменные полей
    $name = $feed_data['name'];
    $subject = $feed_data['subject'];
    $email = $feed_data['email'];
    $text = $feed_data['textarea'];

    //запись данных в бд
    $sql ='INSERT INTO feedback_info (id, name, email, subject, textarea)
    VALUES(:id, :user_name, :user_email, :subject, :textarea);';
    $params=[
        'id'=>$this->dbConnection->getConnection()->lastInsertId(),
        'user_name'=>$name,
        'subject'=>$subject,
        'textarea'=>$text,
        'user_email'=>$email 
    ];
    return $this->dbConnection->executeSql($sql, $params)? self:: F_SUCCESS : self::INSERT_FAIL;  
}

}