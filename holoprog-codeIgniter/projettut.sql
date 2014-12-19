
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
  `identifiant` int(200) AUTO_INCREMENT,
  `pass` varchar(30) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `droit` int(11) NOT NULL,
  PRIMARY KEY (`identifiant`)
) ENGINE=InnoDB;

/*Pass: MM-JJ Login: NPrénom*/

/*A1*/
INSERT INTO `connexion` VALUES(null, '1004', 'DArmin', 1);
INSERT INTO `connexion` VALUES(null, '0803', 'ATolga', 1);
INSERT INTO `connexion` VALUES(null, '1110', 'SRaphael', 1);
INSERT INTO `connexion` VALUES(null, '0110', 'RRomain', 1);
INSERT INTO `connexion` VALUES(null, '1212', 'DHenry', 1);
INSERT INTO `connexion` VALUES(null, '0304', 'ZOmar', 1);
INSERT INTO `connexion` VALUES(null, '0408', 'VThibaut', 1);
INSERT INTO `connexion` VALUES(null, '1020', 'LSylvain', 1);
INSERT INTO `connexion` VALUES(null, '0612', 'MVictor', 1);
INSERT INTO `connexion` VALUES(null, '0701', 'AMarc', 1);
INSERT INTO `connexion` VALUES(null, '0523', 'FJonathan', 1);
INSERT INTO `connexion` VALUES(null, '1116', 'TGael', 1);
/*A2*/
INSERT INTO `connexion` VALUES(null, '1003', 'BMaxime', 1);
INSERT INTO `connexion` VALUES(null, '0603', 'BAnthony', 1);
INSERT INTO `connexion` VALUES(null, '1113', 'BMathieu', 1);
INSERT INTO `connexion` VALUES(null, '0821', 'CAntoine', 1);
INSERT INTO `connexion` VALUES(null, '0608', 'GValentin', 1);
INSERT INTO `connexion` VALUES(null, '1103', 'GSebastien', 1);
INSERT INTO `connexion` VALUES(null, '0120', 'GAnthony', 1);
INSERT INTO `connexion` VALUES(null, '0730', 'GYannis', 1);
INSERT INTO `connexion` VALUES(null, '0216', 'MAymeric', 1);
INSERT INTO `connexion` VALUES(null, '0203', 'SCorentin', 1);
INSERT INTO `connexion` VALUES(null, '0514', 'SCharles', 1);
INSERT INTO `connexion` VALUES(null, '0721', 'BChloé', 1);
INSERT INTO `connexion` VALUES(null, '0830', 'YCharlesAntoine', 1);
INSERT INTO `connexion` VALUES(null, '1231', 'KAlexandre', 1);
INSERT INTO `connexion` VALUES(null, '1010', 'AWalid', 1);
/*B1*/
INSERT INTO `connexion` VALUES(null, '1023', 'BMaxime', 1);
INSERT INTO `connexion` VALUES(null, '0209', 'GRaphael', 1);
INSERT INTO `connexion` VALUES(null, '0307', 'BKhaled', 1);
INSERT INTO `connexion` VALUES(null, '0707', 'CLucas', 1);
INSERT INTO `connexion` VALUES(null, '1228', 'FStephane', 1);
INSERT INTO `connexion` VALUES(null, '0929', 'GSimon', 1);
INSERT INTO `connexion` VALUES(null, '0813', 'LBenjamin', 1);
INSERT INTO `connexion` VALUES(null, '0726', 'TCorentin', 1);
INSERT INTO `connexion` VALUES(null, '1024', 'GThomas', 1);
INSERT INTO `connexion` VALUES(null, '1101', 'MSimon', 1);
INSERT INTO `connexion` VALUES(null, '0123', 'MClement', 1);
INSERT INTO `connexion` VALUES(null, '0910', 'MNicolas', 1);
INSERT INTO `connexion` VALUES(null, '1105', 'PMaxime', 1);
INSERT INTO `connexion` VALUES(null, '0402', 'BFlorian', 1);
INSERT INTO `connexion` VALUES(null, '0424', 'BQuentin', 1);
/*B2*/
INSERT INTO `connexion` VALUES(null, '0802', 'RCorentin', 1);
INSERT INTO `connexion` VALUES(null, '0704', 'GLoan', 1);
INSERT INTO `connexion` VALUES(null, '0103', 'VThomas', 1);
INSERT INTO `connexion` VALUES(null, '0904', 'EJawad', 1);
INSERT INTO `connexion` VALUES(null, '0512', 'PQuentin', 1);
INSERT INTO `connexion` VALUES(null, '0617', 'GWilliam', 1);
INSERT INTO `connexion` VALUES(null, '0307', 'VWilliam', 1);
INSERT INTO `connexion` VALUES(null, '0416', 'MSylvain', 1);
INSERT INTO `connexion` VALUES(null, '1223', 'SAlexandre', 1);
INSERT INTO `connexion` VALUES(null, '0722', 'CBerenice', 1);
INSERT INTO `connexion` VALUES(null, '0305', 'WAurelien', 1);
INSERT INTO `connexion` VALUES(null, '0419', 'RClement', 1);
INSERT INTO `connexion` VALUES(null, '0723', 'PYohann', 1);


/*Professeur*/
INSERT INTO `connexion` VALUES(null, 'JC1415', 'JCouchot', 2);
INSERT INTO `connexion` VALUES(null, 'CG1617', 'CGuyeux', 2);
INSERT INTO `connexion` VALUES(null, 'AM1819', 'AMillet', 2);





CREATE TABLE IF NOT EXISTS `professeur` (
  `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_professeur` varchar(30) DEFAULT NULL,
  `prenom_professeur` varchar(30) DEFAULT NULL,
  `identifiant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_professeur`),
  Foreign key (identifiant) references connexion(identifiant)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `identifiant`) 
VALUES(1, 'Couchot', 'Jean-Francois', 56);
INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `identifiant`) 
VALUES(2, 'Guyeux', 'Christophe', 57);
INSERT INTO `professeur` (`id_professeur`, `nom_professeur`, `prenom_professeur`, `identifiant`) 
VALUES(3, 'Millet', 'Alain', 58);





CREATE TABLE classe (
id_classe int  AUTO_INCREMENT NOT NULL,
nom_classe varchar(30), 
nbr_eleve INT, 
id_professeur INT NOT NULL,
Foreign key (id_professeur) references professeur(id_professeur),
PRIMARY KEY (id_classe) ) ENGINE=InnoDB;

INSERT INTO `classe`
VALUES (null,"A1",12,1);

INSERT INTO `classe` 
VALUES (null,"A2",15,1);

INSERT INTO `classe`
VALUES (null,"B1",14,2);

INSERT INTO `classe`
VALUES (null, "B2",13,3);



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

/*A1*/
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(1, 'Dervisagic', 'Armin', 1, 10, '1995-10-04', 1, 1);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(2, 'Aypeck', 'Tolga', 2, 15, '1995-08-03', 1, 2);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(3, 'Sabbagh', 'Raphael', 3, 18, '1995-11-10', 1, 3);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(4, 'Rodriguez', 'Romain', 1, 08, '1996-01-10', 1, 4);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(56, 'Dabere', 'Henry', 2, 12, '1995-12-12', 1, 56);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(57, 'Zerouali Bardai', 'Omar', 3, 20, '1995-03-04', 1, 57);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(58, 'Voinot', 'Thibaut', 1, 05, '1995-04-08', 1, 58);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(8, 'Lambert', 'Sylvain', 2, 11, '1994-10-20', 1, 8);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(9, 'Michel', 'Victor', 3, 19, '1995-06-12', 1, 9);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(10, 'Amatory', 'Marc', 1, 02, '1995-07-01', 1, 10);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(11, 'Ferreira', 'Jonathan', 2, 10, '1995-05-23', 1, 11);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(12, 'Trahin', 'Gael', 3, 16, '1995-11-16', 1, 12);
/*A2*/
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(13, 'Bauer', 'Maxime', 1, 10, '1995-10-03', 2, 13);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(14, 'Billote', 'Anthony', 2, 11, '1994-06-03', 2, 14);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(15, 'Burger', 'Mathieu', 3, 15, '1995-11-13', 2, 15);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(16, 'Castalan', 'Antoine', 1, 03, '1995-08-21', 2, 16);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(17, 'Garet', 'Valentin', 2, 10, '1994-06-08', 2, 17);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(18, 'Gunther', 'Sebastien', 3, 19, '1996-11-03', 2, 18);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(19, 'Gussy', 'Anthony', 1, 01, '1995-01-20', 2, 19);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(20, 'Guyot', 'Yannis', 2, 12, '1994-07-30', 2, 20);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(21, 'Mengel', 'Aymeric', 3, 17, '1995-02-16', 2, 21);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(22, 'Servette', 'Corentin', 1, 04, '1995-02-03', 2, 22);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(23, 'Socie', 'Charles', 2, 13, '1994-05-14', 2, 23);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(24, 'Beaufils', 'Chloé', 3, 18, '1995-07-21', 2, 24);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(25, 'Yangni-Angate', 'Charles-Antoine', 1, 10, '1994-08-30', 2, 25);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(26, 'Koperez', 'Alexandre', 2, 14, '1993-12-31', 2, 26);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(27, 'Ait Ouaarab', 'Walid', 3, 20, '1995-10-10', 2, 27);
/*B1*/
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(41, 'Benatti', 'Maxime', 1, 01, '1995-10-23', 3, 42);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(42, 'Gauthier', 'Raphael', 2, 10, '1994-02-09', 3, 42);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(43, 'Boughettoucha', 'Khaled', 3, 19, '1995-03-07', 3, 43);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(44, 'Corailler', 'Lucas', 1, 03, '1995-07-07', 3, 44);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(45, 'Franjaud', 'Stephane', 2, 11, '1993-12-28', 3, 45);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(46, 'Gourdeau', 'Simon', 3, 19, '1995-09-29', 3, 46);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(47, 'Lefort', 'Benjamin', 1, 07, '1995-08-13', 3, 47);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(48, 'Tournoux', 'Corentin', 2, 10, '1995-07-26', 3, 48);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(49, 'Giros', 'Thomas', 3, 16, '1995-10-24', 3, 49);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(50, 'Maillot', 'Simon', 1, 09, '1993-11-01', 3, 50);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(51, 'Marin', 'Clement', 2, 12, '1994-01-23', 3, 51);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(52, 'Minet', 'Nicolas', 3, 18, '1995-09-10', 3, 52);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(53, 'Perraud', 'Maxime', 1, 02, '1995-11-05', 3, 53);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(54, 'Bergeret', 'Florian', 2, 13, '1995-04-02', 3, 54);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(55, 'Blanchard', 'Quentin', 3, 20, '1995-04-24', 3, 55);
/*B2*/
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(28, 'Rousselet', 'Corentin', 1, 04, '1995-08-02', 4, 28);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(29, 'Guyon', 'Loan', 2, 10, '1994-07-04', 4, 29);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(30, 'Vallet', 'Thomas', 3, 19, '1995-01-03', 4, 30);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(31, 'El Houssine', 'Jawad', 1, 03, '1993-09-04', 4, 31);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(32, 'Perez', 'Quentin', 2, 11, '1995-05-12', 4, 32);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(33, 'Gilbert', 'William', 3, 16, '1995-06-17', 4, 33);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(34, 'Viennet', 'William', 1, 08, '1995-03-07', 4, 34);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(35, 'Morel', 'Sylvain', 2, 11, '1993-04-16', 4, 35);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(36, 'Sauner', 'Alexandre', 3, 18, '1994-12-23', 4, 36);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(37, 'Caly', 'Berenice', 1, 06, '1994-07-22', 4, 37);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(38, 'Wolz', 'Aurelien', 2, 15, '1995-03-05', 4, 38);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(39, 'Ravier', 'Clement', 3, 20, '1995-04-19', 4, 39);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(40, 'Peslier', 'Yohann', 1, 09, '1995-07-23', 4, 40);



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






