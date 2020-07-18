<?php

namespace Alisa\MarsEstate\Models;
use PDO;

class News{
    private $server = 'localhost';
    // $port = 'port', если используется не порт по умолчанию
    private $username = 'alisa_web';
    private $pwd = 'root_web2020';
    private $db_name = 'mysql';
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

    ];


    public function getallNews(){
        $sql ='SELECT * FROM news';
        $connection =
            new PDO("mysql:host=$this->server;dbname=$this->db_name",
                $this->username, $this->pwd, $this->options);
        $statement = $connection->query($sql);
        return $statement->fetchAll(PDO:ASSOC);//массив с данными
    }
    
     public function getNewsById(){
        $sql = 'SELECT * FROM book WHERE id=:idNews;';
         $params[
             'idNews' => $id_news,
         ];
         $connection =
            new PDO("mysql:host=$this->server;dbname=$this->db_name",
                $this->username, $this->pwd, $this->options);
        $statement =$connection->prepare($sql);
        $statement->execute($params);
         //ключ-имя параметра из запроса
         //значение-то,что мы хотим вставить вместо параметров
         return $statement->fetch(PDO:ASSOC);

     }
}