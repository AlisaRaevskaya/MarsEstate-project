<?php

namespace Alisa\MarsEstate\Models;
use Alisa\MarsEstate\Base\Service;


class PropertyService extends Service{


    // CREATE TABLE IF NOT EXISTS `properties`(
    //     `id_property`INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    //     `property_name` VARCHAR(45) NOT NULL,
    //     `location` VARCHAR(45) NOT NULL,
    //     `img_property` VARCHAR(45) not null,
    //     `short_description`VARCHAR(255) NOT NULL,
    //     `description` longtext NOT NULL,
    //     `category_id` INT NOT NULL,
    //     CONSTRAINT `fk_prop_category`
    //     FOREIGN KEY (`category_id`)
    //     REFERENCES `category` (`id_category`)
    //     ON DELETE NO ACTION
    //     )ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;
        
        
    //     CREATE TABLE IF NOT EXISTS `category`(
    //     `id_category` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    //     `name` VARCHAR(45) NOT NULL
    //     )ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;


    public function getallProperties(){
        //массив со всеми объектами
    
        $sql ='SELECT * FROM properties,category 
        where properties.category_id = category.id_category;';
        $result=$this->dbConnection->queryAll($sql);
        if (!$result){
            return 'Error: , $mysqli->error' ;
        }
         return $result;
    }


    public function getPropertiesByCategory($categoryName){

        $sql = 'select p.property_name, p.location,
         p.img_property, p.short_description,p.description,c.name,
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

}