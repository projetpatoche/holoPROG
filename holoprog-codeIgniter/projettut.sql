
-- dans application/config/congig.php
-- $config['sess_use_database']	= TRUE;
-- si autre table $config['sess_table_name']		= 'ci_sessions';

Drop table if exists solution_exo ;
DROP TABLE if exists eleve;
DROP TABLE if exists classe ;
Drop Table if exists professeur;
Drop Table if exists connexion;
drop TABLE if exists exercice ;




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
  `identifiant` int(11) AUTO_INCREMENT,
  `pass` varchar(30) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `droit` int(11) NOT NULL,
  PRIMARY KEY (`identifiant`)
) ENGINE=InnoDB;

INSERT INTO `connexion` VALUES(null, '1234', 'alex', 1);
INSERT INTO `connexion` VALUES(null, '0000', 'quentin', 1);
INSERT INTO `connexion` VALUES(null, '99999', 'corentin', 1);
INSERT INTO `connexion` VALUES(null, 'hello', 'loan', 1);
INSERT INTO `connexion` VALUES(null, 'azerty', 'BERNARD', 2);
INSERT INTO `connexion` VALUES(null, '5555', 'HENRY', 2);
INSERT INTO `connexion` VALUES(null, 'hello', 'thomas', 1);
insert into connexion values(null,'mdp','wgilbert',1);
insert into connexion values(null,'mdp','jhelhoussine',1);
insert into connexion values(null,'mdp','smorel',1);
insert into connexion values(null,'mdp','vwilliam',1);
insert into connexion values(null,'mdp','ypeslier',1);
insert into connexion values(null,'mdp','cravier',1);
insert into connexion values(null,'mdp','awolkz',1);
insert into connexion values(null,'mdp','kbougetoucha',1);



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
nbr_eleve INT, 
id_professeur INT NOT NULL,
Foreign key (id_professeur) references professeur(id_professeur),
PRIMARY KEY (id_classe) ) ENGINE=InnoDB;

INSERT INTO `classe`
VALUES (null,"A1",30,1);

INSERT INTO `classe` 
VALUES (null,"A2",30,1);

INSERT INTO `classe`
VALUES (null,"B1",30,2);



CREATE TABLE IF NOT EXISTS `eleve` (
  `id_eleve` int NOT NULL AUTO_INCREMENT,
  `nom_eleve` varchar(30),
  `prenom_eleve` varchar(30),
  `niveau_atteint` int,
  `moyenne_eleve` float(4,2),
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
moyenne_exo float(4,2),
exo_fait int,
Foreign key (id_exercice) references exercice(id_exercice),
Foreign key (id_eleve) references eleve(id_eleve),
PRIMARY KEY (id_eleve,id_exercice) 
) ENGINE=InnoDB; 



insert into eleve values(null,'Gilbert','William',2,15,'1995-08-24',1,8);
insert into eleve values(null,'E Houssine','Jawad',1,18,'1995-05-24',1,9);
insert into eleve values(null,'Morel','Sylvain',1,3,'1995-05-24',1,10);
insert into eleve values(null,'Viennet','William',1,14,'1995-05-24',1,11);
insert into eleve values(null,'Peslier','Yoan',2,7,'1995-08-24',1,12);
insert into eleve values(null,'Ravier','Clément',2,2,'1995-08-24',1,13);
insert into eleve values(null,'Wolkz','Aurélien',1,8,'1995-08-24',1,14);
insert into eleve values(null,'Bougetoucha','Khaled',1,9,'1995-08-24',1,15);


