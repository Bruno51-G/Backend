DROP DATABASE IF EXISTS guide;

CREATE DATABASE IF NOT EXISTS guide;

USE guide;

DROP TABLE IF EXISTS restaurants;


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

ALTER TABLE restaurants ADD CONSTRAINT CK_note CHECK (note BETWEEN 0 AND 10);


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
	
INSERT INTO `restaurants` (`id`, `nom`, `adresse`, `prix`, `commentaire`, `note`, `visite`) VALUES
(3, 'Le Coin des Saveurs', '12 Avenue des Lilas, 68100 Mulhouse', 32.90, 'Cuisine française généreuse, service impeccable et cadre chaleureux.', 7, '2021-04-12'),
(4, 'Chez Marcelin', '78 Rue de Belfort, 68200 Mulhouse', 42.00, 'Ambiance familiale, produits locaux et plats du terroir revisités.', 5, '2022-02-27'),
(5, 'L\'âtre des Amis', '45 Boulevard de la République, 68000 Colmar', 27.50, 'Bonne adresse pour les repas conviviaux, spécialités alsaciennes excellentes.', 9, '2020-07-15'),
(6, 'Bistro du Clocher', '3 Place du Clocher, 68240 Kaysersberg', 35.20, 'Petit bistrot charmant, carte variée mais service parfois lent.', 4, '2021-10-02'),
(7, 'La Table Étoilée', '21 Rue des Étoiles, 68130 Altkirch', 60.10, 'Expérience gastronomique raffinée, chef créatif et carte renouvelée.', 10, '2022-12-05'),
(8, 'Maison de Lumière', '9 Chemin du Canal, 68870 Bartenheim', 25.80, 'Un décor moderne et lumineux, plats simples mais savoureux.', 6, '2021-08-19'),
(9, 'Café des Rosiers', '15 Rue des Rosiers, 68300 Saint-Louis', 19.60, 'Petit déjeuner copieux, pâtisseries maison et terrasse agréable.', 8, '2021-03-11'),
(10, 'Chez Bastien', '66 Route de Strasbourg, 67210 Obernai', 53.25, 'Les poissons y sont cuisinés à la perfection, service attentionné.', 9, '2019-11-21'),
(11, 'Le Relais d\'Azur', '2 Allée de la Plage, 68128 Village-Neuf', 38.80, 'Fruits de mer frais, belle vue et ambiance détendue.', 5, '2021-06-30'),
(12, 'Balcon de Montmartre', '17 Rue du Balcon, 75018 Paris', 49.99, 'Restaurant romantique avec vue exceptionnelle, cuisine fine et inventive.', 7, '2022-05-14');

