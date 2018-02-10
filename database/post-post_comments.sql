-- Create post table
-- Canect post_comments with post


CREATE TABLE `project`.`post` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `body` TEXT NOT NULL,
  `Date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `user_id_idx` (`user_id` ASC),
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `project`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

	
	ALTER TABLE `project`.`post_comments` 
DROP PRIMARY KEY,
ADD PRIMARY KEY (`id`);
ALTER TABLE `project`.`post_comments` 
ADD CONSTRAINT `users_id`
  FOREIGN KEY (`users_id`)
  REFERENCES `project`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `posts_id`
  FOREIGN KEY (`posts_id`)
  REFERENCES `project`.`post` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  ALTER TABLE `project`.`post` 
CHANGE COLUMN `user_id` `user_id` INT(11) NOT NULL AFTER `body`;
