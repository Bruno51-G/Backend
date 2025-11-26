DROP DATABASE IF EXISTS guide;

CREATE DATABASE IF NOT EXISTS guide;

USE guide;

DROP TABLE IF EXISTS restaurants


/* Liste de la structure de la table guide. restaurants. */
CREATE TABLE IF NOT EXISTS restaurants (
	id INT NOT NULL AUTO_INCREMENT,
	nom VARCHAR(100) NOT NULL,
	adresse VARCHAR(250) NOT NULL,
	prix DECIMAL(8,2) NOT NULL,
	commentaire MEDIUMTEXT NOT NULL,
	note DOUBLE NOT NULL,
	visite DATE NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT ck_note CHECK ((note BETWEEN 0 AND 10))
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=UTF8MB4 COLLATE=utf8mb4_0900_ai_ci;

/* Liste des données de la table guide.restaurants : environ 2 rows */

INSERT INTO `restaurants` (`id`, `nom`, `adresse`, `prix`, `commentaire`, `note`, `visite`) VALUES
	(1, 'JEAN-YVES SCHILLINGER', 
	'17 Rue de la Poissonnerie, 68000 Colmar', 50.56, 
	'Le JY\'S est un restaurant différent des autres avec un décor cosy et résolument contemporain qui attire une\r\ntrès belle clientèle cosmopolite. 
	Jean-Yves Schillinger est un chef doublement étoilé créatif qui vous entraînera\r\ndans une ronde dépaysante à souhait où la cuisine du monde est à 
	l\'honneurLe chef décline la cuisine fusion à\r\nsa façon. Une carte régulièrement renouvelée s\'égaye de créations audacieuses et de plats revisités 
	avec\r\nmodernité et pertinence.', 9, '2019-12-05'),
	(2, 'L’ADRIATICO', '6 route de Neuf Brisach, 68000, Colmar, France', 25.75, 
	'Une des meilleurs pizzeria de la région Service très agréable, efficace et souriant Salle principale un peu\r\nbruyante mais cela donne un côté italien je recommande', 8, '2020-02-04');