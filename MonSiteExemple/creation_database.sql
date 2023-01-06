CREATE DATABASE `monSiteExemple`;
CREATE TABLE `monSiteExemple`.`author_table` ( 
    `author_id` INT NOT NULL AUTO_INCREMENT , 
    `author_fullname` VARCHAR(256) NOT NULL , 
    `author_birth` DATE NOT NULL , 
    `author_site` TEXT NOT NULL , 
    `author_email` VARCHAR(256) NOT NULL , 
    `author_password` VARCHAR(256) NOT NULL , 
    PRIMARY KEY (`author_id`)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8;
    
CREATE TABLE `monSiteExemple`.`books_table` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_author` varchar(256) NOT NULL,
  `book_title` varchar(256) NOT NULL,
  `book_year` int(11) NOT NULL,
  `book_summary` text NOT NULL,
  `book_text` text NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `monSiteExemple`.`messages_table` ( 
  `message_id` INT NOT NULL AUTO_INCREMENT , 
  `identity` VARCHAR(256) NOT NULL , 
  `email` VARCHAR(256) NOT NULL , 
  `message` TEXT NOT NULL , 
  PRIMARY KEY (`message_id`)
  ) ENGINE = InnoDB;