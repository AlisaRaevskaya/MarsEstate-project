CREATE SCHEMA IF NOT EXISTS `mars_web` DEFAULT CHARACTER SET utf8 ;
Use `mars_web`;

CREATE TABLE IF NOT EXISTS `subscription`(
`id_subscription` INT NOT NULL auto_increment PRIMARY KEY,
`email` NVARCHAR(45) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `news`(
`id_news`INT NOT NULL auto_increment PRIMARY KEY,
`img` VARCHAR(255) NOT NULL,
`title` VARCHAR(45) NOT NULL,
`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`desc` TINYTEXT NOT NULL,
`text` LONGTEXT NOT NULL
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `properties`(
`id_property`INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(45) NOT NULL,
`description` VARCHAR(45) NOT NULL,
`location` VARCHAR(45) NOT NULL,
`for_rent` ENUM ('false', 'true'),
`for_sell` ENUM ('false', 'true'),
`img_property`  int not null,
CONSTRAINT `fk_img_property` 
FOREIGN KEY (`img_property`)
REFERENCES `img_properties`(`image_id`),
`id_type_property` INT NOT NULL,
CONSTRAINT `fk_id_type` 
FOREIGN KEY (`id_type_property`)
REFERENCES `types`(`id_type`)
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

create table if not exists `img_properties`(
    image_id        int not null,
    image_type      varchar(25) not null default '',
    image           blob not null,
    image_size      varchar(25) not null default '',
    image_ctgy      varchar(25) not null default '',
    image_name      varchar(50) not null default ''
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `types`(
`id_type`INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`type_name`VARCHAR(45) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `user_role`(
`id_user` INT NOT NULL PRIMARY KEY, -- insert id
`name` VARCHAR(45) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4; 

INSERT INTO `user_role`(`id_user`,`name`)
VALUES (1, 'Admin'); 
INSERT INTO `user_role`(`id_user`,`name`)
VALUES (10, 'User'); 


CREATE TABLE IF NOT EXISTS `user_info`(
`id_users` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`login` VARCHAR(45) NOT NULL,
`password` NVARCHAR(45) NOT NULL,
`email` NVARCHAR(45) NOT NULL,
`first_name` VARCHAR(45) NOT NULL,
`last_name` VARCHAR(45) NOT NULL,
`country`VARCHAR(45) NOT NULL,
`created at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`id_user_role` INT NOT NULL,
CONSTRAINT fk_user_role 
FOREIGN KEY(`id_user_role`)
REFERENCES `user_role`(`id_user`)
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `permissions`(
`id_permit` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`description` VARCHAR(45) NOT NULL,
`state` ENUM('true','false') NOT NULL default 'false'
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO `permissions`(`description`,`state`)
VALUE ('delete', 'true');-- 1
INSERT INTO `permissions`(`id`,`description`,`state`)
VALUE ('edit', 'true');-- 2
INSERT INTO `permissions`(`description`,`state`)
VALUE ('add_user', 'true' );-- 3
INSERT INTO `permissions`( `description`,`state`)
VALUE ('del_user', 'true');-- 4
INSERT INTO `permissions`( `description`,`state`)
VALUE ('view', 'true');-- 5
INSERT INTO `permissions`( `description`,`state`)
VALUE ('watch_additional_info', 'true');-- 6
INSERT INTO `permissions`( `description`,`state`)
VALUE ('comment_news', 'true');-- 7


CREATE TABLE IF NOT EXISTS `user_role_permissions`(
`user_id` INT NOT NULL ,
`permit_id` INT NOT NULL,
CONSTRAINT `user_fk` 
FOREIGN KEY (`user_id`)
REFERENCES `user_role`(`id_user`),
CONSTRAINT `permit_fk` 
FOREIGN KEY (`permit_id`)
REFERENCES `permissions`(`id_permit`)
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;
