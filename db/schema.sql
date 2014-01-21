# GRANT ALL PRIVILEGES ON Coconut.* TO 'janjaCoconut'@'localhost' IDENTIFIED BY 'janjaCoconut';

DROP DATABASE IF EXISTS Coconut;

CREATE DATABASE Coconut DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE Coconut;


CREATE TABLE user_level (
	id INT NOT NULL AUTO_INCREMENT,
    level CHAR(32) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE user (
	id INT NOT NULL AUTO_INCREMENT,
	name CHAR(64) NOT NULL,
	email CHAR(16) NOT NULL,
	password CHAR(32) NOT NULL,
    level INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (level) REFERENCES user_level(id) ON DELETE RESTRICT
)ENGINE=InnoDB;


# INSERTS
INSERT INTO user_level (level) VALUES ('Administrator');
INSERT INTO user_level (level) VALUES ('Common');
INSERT INTO user_level (level) VALUES ('Developer');
