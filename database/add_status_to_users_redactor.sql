ALTER TABLE `project`.`users` 
CHANGE COLUMN `status` `status` ENUM('U', 'A', 'R') NOT NULL DEFAULT 'U' ;
