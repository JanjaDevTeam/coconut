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



CREATE TABLE user (
	id INT NOT NULL AUTO_INCREMENT,
	fbid INT NOT NULL,
	fbuname CHAR(64) NOT NULL,
	fbfullname CHAR(64) NOT NULL,
	fbemail CHAR(64) NOT NULL,
	ativo INT(1) NOT NULL,
	dataRegistro TIMESTAMP NOT NULL DEFAULT NOW(),
	dataAcesso TIMESTAMP NOT NULL,
	PRIMARY KEY(id)
)ENGINE=InnoDB;



CREATE TABLE categoria (
	id INT NOT NULL AUTO_INCREMENT,
	categoria CHAR(32),
	PRIMARY KEY(id)
)ENGINE=InnoDB;


CREATE TABLE projeto (
	id INT NOT NULL AUTO_INCREMENT,
	idUser INT NOT NULL,
	idCategoria INT NOT NULL,
	nome VARCHAR(256) NOT NULL,
	descricao TEXT NOT NULL,
	frase VARCHAR(140) NOT NULL,
	valor DECIMAL(10,2) NOT NULL,
	valorArrecadado DECIMAL(10,2) NOT NULL,
	prazo INT NOT NULL,
	video VARCHAR(256) NOT NULL,
	links VARCHAR(256) NULL,
	dataRegistro TIMESTAMP NOT NULL DEFAULT NOW(),
	ativo INT(1) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (idUser) REFERENCES user(id) ON DELETE RESTRICT,
	FOREIGN KEY (idCategoria) REFERENCES categoria(id) ON DELETE RESTRICT
)ENGINE=InnoDB;


CREATE TABLE colaboracao (
	id INT NOT NULL AUTO_INCREMENT,
	idProjeto INT NOT NULL,
	valor DECIMAL(10,2) NOT NULL,
	descricao TEXT NOT NULL,
	qtdTotal INT NOT NULL,
	qtdComprada INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (idProjeto) REFERENCES projeto(id) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE user_colaboracao (
	id INT NOT NULL AUTO_INCREMENT,
	idUser INT NOT NULL,
	idColaboracao INT NOT NULL,
	quantidade INT NOT NULL,
	dataRegistro TIMESTAMP NOT NULL DEFAULT NOW(),
	PRIMARY KEY(id),
	FOREIGN KEY (idUser) REFERENCES user(id) ON DELETE RESTRICT,
	FOREIGN KEY (idColaboracao) REFERENCES colaboracao(id) ON DELETE RESTRICT
)ENGINE=InnoDB;


# INSERTS


INSERT INTO categoria (categoria) VALUES ('agricultura sustentável');
INSERT INTO categoria (categoria) VALUES ('permacultura');
INSERT INTO categoria (categoria) VALUES ('educação');
INSERT INTO categoria (categoria) VALUES ('educação e sociabilidade');
INSERT INTO categoria (categoria) VALUES ('energia limpa');
INSERT INTO categoria (categoria) VALUES ('cidade e sustentabilidade');
INSERT INTO categoria (categoria) VALUES ('gênero');
INSERT INTO categoria (categoria) VALUES ('direitos humanos');
INSERT INTO categoria (categoria) VALUES ('direitos animais');
INSERT INTO categoria (categoria) VALUES ('acesso à informação');
INSERT INTO categoria (categoria) VALUES ('economia criativa');
INSERT INTO categoria (categoria) VALUES ('economia solidária');
INSERT INTO categoria (categoria) VALUES ('saúde');
INSERT INTO categoria (categoria) VALUES ('saúde primária');
INSERT INTO categoria (categoria) VALUES ('saúde e bem estar');
INSERT INTO categoria (categoria) VALUES ('mobilidade urbana');
INSERT INTO categoria (categoria) VALUES ('intervenção urbana');
INSERT INTO categoria (categoria) VALUES ('arte de rua');
INSERT INTO categoria (categoria) VALUES ('inclusão social');
