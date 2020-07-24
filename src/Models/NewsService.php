<?php

namespace Alisa\MarsEstate\Models;

use Alisa\MarsEstate\Base\Service;
use Alisa\MarsEstate\Controllers\NewsController;


class NewsService extends Service{

    //// возвращает набор строк. каждая строка - это ассоциативный массив с именами столбцов и значений.
    // если выборка ничего не вернёт, то будет получен пустой массив.

    public function getAllNews(){//массив со всеми новостями
        $sql ='SELECT * FROM news;';
        $result=$this->dbConnection->queryAll($sql);
        if (!$result){
            return 'Error: , $mysqli->error' ;
        }
         return $result;
        
    }
    
     public function getNewsById($id){
        $sql = 'SELECT * FROM news WHERE id=:idNews;';
         $params=[
             'idNews'=> $id
         ];
        $newsById =$this->dbConnection->execute($sql, $params, false);
        return $newsById;
     }

     public function getConnection($settings)

     { 
         $dblink= $this->dbConnection->initConnection($settings);
        if($dblink)
        return'Соединение установлено.';
        else
        return('Ошибка подключения к серверу баз данных.');
     }
}