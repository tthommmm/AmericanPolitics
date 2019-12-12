ORACLE
Create table `Category` (
	cat_ID INT(4) PRIMARY KEY NOT NULL,
	title varchar(25),
	body varchar(200),
	ttl_topics INT(5)
);
Create table `Topic`	 (
	topic_ID INT (4) PRIMARY KEY NOT NULL,
	cat_ID INT(4),
	title varchar(25),
	body varchar(200),
	ttl_posts INT(5)
	Check(ttl_posts > 0);
);
Create table `Post` (
	post_ID INT (4) PRIMARY KEY NOT NULL,
	topic_ID INT(4),
	title varchar(25),
	body varchar(25),
	ttl_replies INT(5)
);
Create table `Reply`(
	reply_ID INT(4) PRIMARY KEY NOT NULL,
	post_ID INT(4),
	user_ID INT(4),
	title varchar(25),
	body varchar(200),
	ttl_upvotes INT(5)

);



PHPMYADMIN
CREATE TABLE `SQL_final` . `Category` 
( `cat_ID` INT(4) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(25) NOT NULL ,
  `body` VARCHAR(200) NOT NULL ,
  `ttl_topics` INT(5) NOT NULL ,
  PRIMARY KEY (`cat_ID`));
  
 CREATE TABLE `sql_final`. `Topic`
( `topic_ID` INT(4) NOT NULL AUTO_INCREMENT ,
  `cat_ID` INT(4) NOT NULL ,
  `title` VARCHAR(25) NOT NULL ,
  `body` VARCHAR(250) NOT NULL ,
  `ttl_posts` INT(5) NOT NULL ,
  PRIMARY KEY (`topic_ID`));
 
 CREATE TABLE `sql_final`. `Post` 
( `post_ID` INT(4) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `topic_ID` INT(4) NOT NULL ,
  `title` VARCHAR(25) NOT NULL , 
  `body` VARCHAR(250) NOT NULL , 
  `ttl_replies` INT(5) NOT NULL ,
  PRIMARY KEY (`post_ID`));
  
  CREATE TABLE `sql_final`. `Reply`
( `reply_ID` INT(4) UNSIGNED NOT NULL AUTO_INCREMENT , 
  `post_ID` INT(4) NOT NULL ,
  `user_ID` INT(4) NOT NULL ,
  `title` VARCHAR(25) NOT NULL ,
  `body` VARCHAR(250) NOT NULL , `ttl_replies` INT(5) NOT NULL ,
  PRIMARY KEY (`reply_ID`));
  
  CREATE TABLE `sql_final`.`User`
( `user_ID` INT(4) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(15) NOT NULL ,
  `password` VARCHAR(30) NOT NULL , 
  `email` VARCHAR(45) NOT NULL , 
  `birthdate` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `ttl_posts` INT(5) NULL ,
  PRIMARY KEY (`user_ID`), UNIQUE (`username`));

alter table topic ADD CONSTRAINT CHK_PersonAge CHECK (ttl_posts > 0)