ALTER TABLE `project`.`news_comments` 
DROP FOREIGN KEY `fk_news_comments_users1`;
ALTER TABLE `project`.`news_comments` 
CHANGE COLUMN `users_id` `users_id` INT(11) NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`id`);
ALTER TABLE `project`.`news_comments` 
ADD CONSTRAINT `fk_news_comments_users1`
  FOREIGN KEY (`users_id`)
  REFERENCES `project`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;