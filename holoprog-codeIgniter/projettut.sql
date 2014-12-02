
-- dans application/config/congig.php
-- $config['sess_use_database']	= TRUE;
-- si autre table $config['sess_table_name']		= 'ci_sessions';

Drop table solution_exo ;
DROP TABLE eleve;
DROP TABLE classe ;
Drop Table professeur;
Drop Table connexion;
drop TABLE exercice ;


Drop table Solution_exo ;
DROP TABLE Eleve;
DROP TABLE Classe ;
Drop Table Professeur;
Drop Table Connexion;
drop TABLE Exercice ;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `connexion` (
  `identifiant` int(11) NOT NULL AUTO_INCREMENT,
  `pass` varchar(30) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `droit` int(11) NOT NULL,
  PRIMARY KEY (`identifiant`)
) ENGINE=InnoDB;

INSERT INTO `connexion` (`identifiant`, `pass`, `login`, `droit`) VALUES(1, '1234', 'alex', 1);
INSERT INTO `connexion` (`identifiant`, `pass`, `login`, `droit`) VALUES(2, '0000', 'quentin', 1);
INSERT INTO `connexion` (`identifiant`, `pass`, `login`, `droit`) VALUES(3, '99999', 'corentin', 1);
INSERT INTO `connexion` (`identifiant`, `pass`, `login`, `droit`) VALUES(4, 'hello', 'loan', 1);

INSERT INTO `connexion` (`identifiant`, `pass`, `login`, `droit`) VALUES(5, 'azerty', 'BERNARD', 2);
INSERT INTO `connexion` (`identifiant`, `pass`, `login`, `droit`) VALUES(6, '5555', 'HENRY', 2);

INSERT INTO `connexion` (`identifiant`, `pass`, `login`, `droit`) VALUES(7, 'hello', 'thomas', 1);


Drop Table professeur;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_professeur` varchar(30) DEFAULT NULL,
  `prenom_professeur` varchar(30) DEFAULT NULL,
  `identifiant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_professeur`),
  Foreign key (identifiant) references connexion(identifiant)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `identifiant`) 
VALUES(1, 'BERNARD', 'henry', 5);
INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `identifiant`) 
VALUES(2, 'HENRY', 'J-P', 6);





CREATE TABLE classe (
id_classe int  AUTO_INCREMENT NOT NULL,
nom_classe varchar(30), 
moyenne_classe float(4,2), 
best_eleve INT, 
worst_eleve INT, 
nbr_eleve INT, 
id_professeur INT NOT NULL,
Foreign key (id_professeur) references professeur(id_professeur),
PRIMARY KEY (id_classe) ) ENGINE=InnoDB;

INSERT INTO `classe`(`id_classe`, `nom_classe`, `moyenne_classe`, `best_eleve`, `worst_eleve`, `nbr_eleve`, `id_professeur`) 
VALUES (null,"A1",12.5,2,1,30,1);

INSERT INTO `classe`(`id_classe`, `nom_classe`, `moyenne_classe`, `best_eleve`, `worst_eleve`, `nbr_eleve`, `id_professeur`) 
VALUES (null,"A2",11.4,3,3,30,1);

INSERT INTO `classe`(`id_classe`, `nom_classe`, `moyenne_classe`, `best_eleve`, `worst_eleve`, `nbr_eleve`, `id_professeur`) 
VALUES (null,"B1",11.4,5,5,30,2);



CREATE TABLE IF NOT EXISTS `eleve` (
  `id_eleve` int NOT NULL AUTO_INCREMENT,
  `nom_eleve` varchar(30),
  `prenom_eleve` varchar(30),
  `niveau_atteint` int,
  `moyenne_eleve` int,
  `date_de_naissance` date,
  `id_classe` int,
  `identifiant` int,
  PRIMARY KEY (`id_eleve`),
  Foreign key (identifiant) references connexion(identifiant),
  Foreign key (id_classe) references classe(id_classe)
) ENGINE=InnoDB ;

INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(1, 'sauner', 'alexandre', 1, 10, '1994-10-04', 1, 1);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(2, 'perez', 'quentin', 2, 10, '1994-08-03', 1, 2);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(3, 'rousselet', 'corentin', 1, 13, '1995-08-03', 2, 3);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(4, 'guyon', 'loan', 2, 9, '1994-06-03', 1, 4);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(5, 'vallet', 'thomas', 2, 9, '1995-06-03', 3, 7);



CREATE TABLE exercice (
id_exercice INT  AUTO_INCREMENT NOT NULL,
correction_exercice varchar(30),
taille_exo int,
PRIMARY KEY (id_exercice) 
) ENGINE=InnoDB; 

INSERT INTO `exercice`
(`id_exercice`,`correction_exercice`, `taille_exo`) 
VALUES (null,'1-2-3-4-5',5);
INSERT INTO `exercice`
(`id_exercice`, `correction_exercice`, `taille_exo`) 
VALUES (null,'1-3-3-3-3-3',6);

CREATE TABLE solution_exo (
id_exercice INT,
id_eleve INT,
erreur_exo varchar(30),
nb_essais int,
Foreign key (id_exercice) references exercice(id_exercice),
Foreign key (id_eleve) references eleve(id_eleve),
PRIMARY KEY (id_eleve,id_exercice) 
) ENGINE=InnoDB; 


