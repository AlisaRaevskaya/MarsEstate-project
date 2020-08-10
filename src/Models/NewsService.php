<?php

namespace Alisa\MarsEstate\Models;

use Alisa\MarsEstate\Controllers\NewsController;
use Alisa\MarsEstate\Base\DBConnection;

class NewsService{
    private $dbConnection;


    public function __construct(){
    $this->dbConnection = DBConnection::getInstance();//new DB object
    }


    //// возвращает набор строк. каждая строка - это ассоциативный массив с именами столбцов и значений.
    // если выборка ничего не вернёт, то будет получен пустой массив.

    public function getAllNews(){//массив со всеми новостями
        $sql ='SELECT * FROM news ;';
        $result= $this->dbConnection->queryAll($sql);
        if (!$result){
            return 'Error: , $mysqli->error' ;
        }
         return $result;
    }
    
     public function getNewsById($id){
        $sql = 'SELECT * FROM news WHERE id_news=:idNews;';
         $params=[
             'idNews'=> $id
         ];
        $newsById =$this->dbConnection->execute($sql, $params, false);
        return $newsById;
     }

     
     public function getNews(){//массив со всеми новостями
        $sql ='SELECT * FROM news LIMIT 4';
        $result= $this->dbConnection->queryAll($sql);
        if (!$result){
            return 'Error: , $mysqli->error' ;
        }
         return $result;
    }
}