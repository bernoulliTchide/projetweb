--ma base de donné AS
CREATE DATABASE banque;

--la premiere table pour les donné personnel des abonné
CREATE TABLE abonne(
	id integer NOT NULL AUTO_INCREMENT,
	nom VARCHAR(30),
	tel integer,
	sex CHAR(1),
	email VARCHAR(30),
	password VARCHAR(30),
	solde integer,
	PRIMARY KEY(id),
);

--faissons quelque insertion par defaut
INSERT INTO abonne(id,nom,tel,sex,email,password,solde)VALUES(NULL,'Fotsing tchide',674323641,'m','tchide@gmail.com','devoir1',16900);

--table pour les operation de depot

CREATE TABLE operation(
	id integer NOT NULL AUTO_INCREMENT,
	id_destinataire integer NOT NULL,
	message VARCHAR(255),
	date DATETIME,
	id_recepteur integer,
	montant integer,
	message_recpt VARCHAR(255),
	PRIMARY KEY(id),
	FOREIGN KEY(id_destinataire) REFERENCES abonne(id),
	FOREIGN KEY(id_recepteur) REFERENCES abonne(id)
);


--table pour les operation de retrait.

CREATE TABLE retrait(
	id integer NOT NULL AUTO_INCREMENT,
	id_abonne integer NOT NULL,
	date DATETIME,
	montant integer,
	message VARCHAR(255),
	PRIMARY KEY(id),
	FOREIGN KEY(id_abonne) REFERENCES abonne(id)
);
