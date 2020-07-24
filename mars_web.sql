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

SELECT * FROM `category`;

DROP TABLE `properties`;

CREATE TABLE IF NOT EXISTS `properties`(
`id_property`INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`property_name` VARCHAR(45) NOT NULL,
`location` VARCHAR(45) NOT NULL,
`img_property` VARCHAR(45) not null,
`short_description`VARCHAR(255) NOT NULL,
`description` longtext NOT NULL,
`category_id` INT NOT NULL,
CONSTRAINT `fk_prop_category`
FOREIGN KEY (`category_id`)
REFERENCES `category` (`id_category`)
ON DELETE NO ACTION
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

insert into `properties`(`property_name`,`img_property`,`location`,`short_description`,`description`,`category_id`)
VALUES
('ДОМ','house1.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',1),
('ДОМ','house2.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',1),
('ДОМ','house3.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',1),
('КВАРТИРА','room1.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',2),
('КВАРТИРА','room2.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',2),
('КВРАТИРА','room3.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',2),
('ЗЕМЕЛЬНЫЙ УЧАСТОК','land1.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',3),
('ЗЕМЕЛЬНЫЙ УЧАСТОК','land2.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',3),
('ЗЕМЕЛЬНЫЙ УЧАСТОК','land3.jpg', 'ЦЕНТР', ' Дом 2 этажа S общ. / жил. — 86 м2 / м2 S кухни — 5.60 м2 S прихожей — 4.80 м2', 'Описание',3); 

CREATE TABLE IF NOT EXISTS `category`(
`id_category` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(45) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

insert into category(`id_category`,`name`)
VALUES
(1, 'Дома'),
(2, 'Квартиры'),
(3, 'Земельные участки');





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


