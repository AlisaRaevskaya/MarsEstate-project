<?php

namespace Alisa\MarsEstate\Models;
use Alisa\MarsEstate\Base\Service;


class ReviewService extends Service{
  
        //// возвращает набор строк. каждая строка - это ассоциативный массив с именами столбцов и значений.
        // если выборка ничего не вернёт, то будет получен пустой массив.
    
        public function getAllReviews(){//массив со всеми новостями
            $sql ='SELECT * FROM reviews ;';
            $result= $this->dbConnection->queryAll($sql);
            if (!$result){
                return 'Error: , $mysqli->error' ;
            }
             return $result;
        }
        
         public function getReviewById($id){
            $sql = 'SELECT * FROM reviews WHERE id_reviews=:id';
             $params=[
                 'id'=> $id
             ];
            $reviewById =$this->dbConnection->execute($sql, $params, false);
            return $reviewById;
         }
    
         
         public function getReviews(){//массив со всеми новостями
            $sql ='SELECT * FROM reviews LIMIT 3';
            $result= $this->dbConnection->queryAll($sql);
            if (!$result){
                return 'Error: , $mysqli->error' ;
            }
             return $result;
        }
    }