<?php

namespace Alisa\MarsEstate\Models;
use Alisa\MarsEstate\Base\Service;


class PropertyService extends Service{


    public function getallProperties(){
        //массив со всеми объектами
        $result = [];

        $sql_house = 'SELECT *
        from properties p
        left join category c
        on p.category_id = c.id_category
        where c.name = "house"
        limit 3;';

        $sql_flats = 'SELECT *
        from properties p
        left join category c
        on p.category_id = c.id_category
        where c.name = "flats";';

        $sql_land = 'SELECT *
        from properties p
        left join category c
        on p.category_id = c.id_category
        where c.name = "land";';
        
        $allHouses=$this->dbConnection->queryAll($sql_house);
        $allFlats=$this->dbConnection->queryAll($sql_flats);
        $allLand=$this->dbConnection->queryAll($sql_land);
        if (!$allHouses){
            return 'Error: , $mysqli->error' ;
        }
       $result= array($allHouses,$allFlats, $allLand);
     return $result;
    }


    public function getPropertiesByCategory($categoryName){

        $sql = 'SELECT *
        from properties p
        left join category c
        on p.category_id = c.id_category
        where c.name = :category;';

        $params = ['category' => $categoryName];

        $result= $this->dbConnection->execute($sql, $params);
        if (!$result){
            return 'Error: , $mysqli->error' ;
        }
         return $result;
    }
    public function getPropertiesById($category, $id_property){

        $sql = 'SELECT *
        from properties p
        left join category c
        on p.category_id = c.id_category
        where c.name = :category 
        and p.id_property =:id_property';

        $params = ['category' => $category,
        'id_property'=>$id_property];

        $result= $this->dbConnection->execute($sql, $params,false);

        if (!$result){
            return 'Error: , $mysqli->error' ;
        }
         return $result;
    }


}