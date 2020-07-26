CREATE SCHEMA IF NOT EXISTS `mars_web` DEFAULT CHARACTER SET utf8 ;
Use `mars_web`;

CREATE TABLE IF NOT EXISTS `mars_web`.`subscription`(
`id_subscription` INT NOT NULL auto_increment PRIMARY KEY,
`email` NVARCHAR(45) NOT NULL
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO subscription(`email`)VALUES
('12ru@mail.ru'),
('gkbsk@yandex.ru');

DROP TABLE `news`;
SELECT * FROM `news`;

CREATE TABLE IF NOT EXISTS `mars_web`.`news`(
`id_news`INT NOT NULL auto_increment PRIMARY KEY,
`img` VARCHAR(45) NOT NULL,
`title` VARCHAR(255) NOT NULL,
`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`desc` VARCHAR(255) NOT NULL,
`text` LONGTEXT NOT NULL
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

select version();

INSERT INTO news(`img`, `title`, `desc`, `text`)VALUES
('mushroom.jpg','Эксперты NASA предложили строить дома на Марсе из грибов','description','text'),
('mushroom.jpg','Эксперты NASA предложили строить дома на Марсе из грибов','description','text');

SELECT * FROM `properties`;

DROP TABLE `properties`;

CREATE TABLE IF NOT EXISTS `properties`(
`id_property`INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`property_name` VARCHAR(45) NOT NULL,
`location` VARCHAR(45) NOT NULL,
`img_property` VARCHAR(45) not null,
`s_main`INT NOT NULL,
`s_kitchen`INT,
`s_corridor`INT,
`price` INT NOT NULL,
`utilities` VARCHAR(45),
`description` longtext NOT NULL,
`category_id` INT NOT NULL,
CONSTRAINT `fk_prop_category`
FOREIGN KEY (`category_id`)
REFERENCES `category` (`id_category`)
ON DELETE NO ACTION
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;


insert into properties(`property_name`,`location`,`img_property`,`s_main`,`s_kitchen`,`s_corridor`,`price`,`description`,`category_id`)
VALUES
('Дом 1 этаж','Восточный район','house1.jpg',56,5.60,4.80,35000000,'Описание', 1),
('Дом 2 этажа', 'Северо-Западный район','house2.jpg', 86, 7.60 , 6.80 ,70000000,'Дача 2 этажа, везде пластиковые окна, подключен свет, проведена вся разводка электричества, стяжка пола под плитку или ламинат, от шпаклевана под поклейку или покраску, перегородки на 1 этаже с шумоизоляцией, потолок обит евро вагонкой, крыша металлочерепица-утеплена в 3 слоя, железная дверь, на втором этаже положена шумоизоляция под доску пола. Свободная планировка. Имеется  баня недостроенная 5 на 4, крыша перекрыта, залита стяжка в предбаннике и отштукатурена внутри. Год постройки 2017. Имеется вода, парковка 4-5 машин.', 1),
('Дом 3 этажа', 'Центральный район','house3.jpg', 300, 31, 4.80, 150000000 ,'Коттедж с шикарным панорамным видом на реку в близости 5 минут от центра города.Развитая инфраструктура района.Потрясающая кирпичная кладка в стиле лофт в гостиной, есть возможность сделать террасу с выходом на улицу. Удачный участок, есть возможно сделать бассейн.В доме полностью сделана вентиляция, разводка сантехники, отопление, полы, звукоизоляция по всему периметру дома. Установлен мощный газовый котёл.', 1);

insert into properties(`property_name`,`img_property`,`location`,`s_main`,`s_kitchen`,`s_corridor`,`price`,`description`,`category_id`)
VALUES
('Квартира 2 комнаты','room1.jpg','Центральный район', 48, 10 , 6, 20000000, 'Описание',2),
('Квартира 1 комната','room2.jpg', 'Центральный район', 30, 7 , 4, 10000000, 'Описание',2),
('Квартира 3 комнаты','room3.jpg', 'Центральный район', 60, 15, 10, 30000000, 'Описание', 2);

insert into `properties`(`category_id`,`property_name`,`location`,`img_property`,`s_main`,`price`,`description`, `utilities` )
VALUES
(3,'Земельный участок','Центальный район','earth.jpg',10, 6500000 , 'Описание', 'Водопровод,газ,электричество'),
(3,'Земельный участок','ЦЕНТР','earth2.jpg',8, 7500000, 'Описание','Водопровод,электричество'),
(3,'Земельный участок','ЦЕНТР','earth4.jpg',4, 4500000, 'Описание','Водопровод'); 

select * from properties p
left join category c
on p.category_id = c.id_category
where c.name = "house" 
and p.id =1;
 -- p>Удаленность: 75 км</p>
--  <p>Черта города</p>

select p.`property_name`, p.`location`, p.`img_property`, p.`description`, c.`name`
from `properties` p
left join `category` c
on p.`category_id` = c.`id_category`
where c.`name` = 'land';

drop table `category`;

CREATE TABLE IF NOT EXISTS `category`(
`id_category` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(45) NOT NULL,
`c_description` VARCHAR(45) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

insert into category(`id_category`,`name`,`c_description`)
VALUES
(1, 'house', 'Дома'),
(2, 'flats','Квартиры'),
(3, 'land','Земельные участки');

SELECT *
FROM `properties` p 
LEFT JOIN  `category` c
ON c.`id_category` = p.`category_id`
WHERE c.`name` = 'house';


DROP TABLE `user_info`;
CREATE TABLE IF NOT EXISTS `user_info`(
`user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(45) NOT NULL,
`password` NVARCHAR(45) NOT NULL,
`re_password` NVARCHAR(45) NOT NULL,
`email` NVARCHAR(45) NOT NULL,
`user_role`VARCHAR(45) default 'user',
`checkRules`ENUM ('true', 'false')NOT NULL default 'true',
`created at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;


