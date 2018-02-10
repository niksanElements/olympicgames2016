--change the property on userID 
--to have psible value null


ALTER TABLE `project`.`post_comments` 
DROP FOREIGN KEY `users_id`;
ALTER TABLE `project`.`post_comments` 
CHANGE COLUMN `users_id` `users_id` INT(11) NULL ;
ALTER TABLE `project`.`post_comments` 
ADD CONSTRAINT `users_id`
  FOREIGN KEY (`users_id`)
  REFERENCES `project`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
