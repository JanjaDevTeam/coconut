# GRANT ALL PRIVILEGES ON Coconut.* TO 'janjaCoconut'@'localhost' IDENTIFIED BY 'janjaCoconut';

DROP DATABASE IF EXISTS Coconut;

CREATE DATABASE Coconut DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE Coconut;

CREATE TABLE log (
	id INT NOT NULL AUTO_INCREMENT,
    tag CHAR(16) NOT NULL,
    log TEXT NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

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

CREATE TABLE recuperar_senha (
	id INT NOT NULL AUTO_INCREMENT,
	id_user INT NOT NULL,
	tolken CHAR(32),
	data_registro DATETIME,
	PRIMARY KEY(id),
	FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE RESTRICT
)ENGINE=InnoDB;


CREATE TABLE categoria (
	id INT NOT NULL AUTO_INCREMENT,
	categoria CHAR(32),
	PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE projeto (
	id INT NOT NULL AUTO_INCREMENT,
	proponente INT NOT NULL,
	id_categoria INT NOT NULL,
	data_registro DATETIME,
	valor DECIMAL(10,2) NOT NULL,
	estado CHAR(1) NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (proponente) REFERENCES user(id) ON DELETE RESTRICT,
	FOREIGN KEY (id_categoria) REFERENCES categoria(id) ON DELETE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE cotas (
	id INT NOT NULL AUTO_INCREMENT,
	id_projeto INT NOT NULL,
	valor DECIMAL(10,2) NOT NULL,
	descricao TEXT NOT NULL,
	quantidade INT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (id_projeto) REFERENCES projeto(id) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE user_cotas (
	id INT NOT NULL AUTO_INCREMENT,
	id_user INT NOT NULL,
	id_cotas INT NOT NULL,
	quantidade INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE RESTRICT,
	FOREIGN KEY (id_cotas) REFERENCES cotas(id) ON DELETE RESTRICT
)ENGINE=InnoDB;


# INSERTS
INSERT INTO user_level (level) VALUES ('Administrator');
INSERT INTO user_level (level) VALUES ('Common');
INSERT INTO user_level (level) VALUES ('Developer');
