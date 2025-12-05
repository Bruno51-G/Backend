CREATE DATABASE foire68;

CREATE TABLE IF NOT EXISTS candidats (
id_user INT UNSIGNED NOT NULL AUTO_INCREMENT,
lastname_user varchar(50) NOT NULL,
firstname_user varchar(50) NOT NULL,
mail_user varchar(150) NOT NULL,
pass_user varchar(500) NOT NULL,
departement_user int UNSIGNED NOT NULL,
age_user tinyint UNSIGNED NOT NULL,
PRIMARY KEY (id_user)
) ENGINE=INNODB ;

/* Contrainte de type check : */
ALTER TABLE candidats ADD CONSTRAINT ck_age CHECK (age_user >= 18);
ALTER TABLE candidats ADD CONSTRAINT ck_formatmail CHECK (mail_user LIKE "%__@_%");
ALTER TABLE candidats ADD CONSTRAINT fk_deptuser FOREIGN KEY (departement_user) REFERENCES departements(id_dep);

ALTER TABLE candidats ADD archive_user TINYINT NOT NULL;
ALTER TABLE candidats ADD CONSTRAINT ck_archive CHECK(archive_user IN(0,1));
/* ALTER TABLE candidats ADD CONSTRAINT UK_verifmail UNIQUE(mail_user); */

DELIMITER |
CREATE TRIGGER before_delete_candidat BEFORE DELETE 
ON candidats FOR EACH ROW 
BEGIN
IF OLD.archive_user <>1
THEN
-- candidatscandidatsSET OLD.archive_user=1;
INSERT INTO Erreur (erreur) VALUES ('Le candidtas doit être archivé.');
END IF;
END|
DELIMITER ;

CREATE TABLE Erreur(
id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
erreur VARCHAR(300) UNIQUE);

INSERT INTO Erreur (erreur) VALUES
('Le candidtas doit être archivé.');

DELETE FROM candidats WHERE lastname_user="Haddock";

INSERT INTO candidats VALUES (id_user, "Haddock", "Archibald", "Ahaddock@test.fr", "admin1234", 68, 50, 0);

CREATE TABLE `departements` (
`id_dep` INT UNSIGNED NOT NULL PRIMARY KEY,
`Name` varchar(50) NOT NULL,
`dep_actif` INT UNSIGNED NOT NULL,
`dep_taux` decimal(5,2) NOT NULL
) ENGINE=InnoDB ;