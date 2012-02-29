CREATE TABLE  `grcms`.`tbl_users` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 55 ) NOT NULL ,
`email` VARCHAR( 100 ) NOT NULL ,
`password` VARCHAR( 100 ) NOT NULL ,
`block` TINYINT( 4 ) NOT NULL ,
`registerDate` DATETIME NOT NULL ,
`lastvisitDate` DATETIME NOT NULL ,
`params` TEXT NOT NULL ,
UNIQUE (
`email`
)
) ENGINE = INNODB;