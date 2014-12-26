
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
INSERT INTO `connexion` VALUES(1, '1004', 'DArmin', 1);
INSERT INTO `connexion` VALUES(2, '0803', 'ATolga', 1);
INSERT INTO `connexion` VALUES(3, '1110', 'SRaphael', 1);
INSERT INTO `connexion` VALUES(4, '0110', 'RRomain', 1);
INSERT INTO `connexion` VALUES(5, '1212', 'DHenry', 1);
INSERT INTO `connexion` VALUES(6, '0304', 'ZOmar', 1);
INSERT INTO `connexion` VALUES(7, '0408', 'VThibaut', 1);
INSERT INTO `connexion` VALUES(8, '1020', 'LSylvain', 1);
INSERT INTO `connexion` VALUES(9, '0612', 'MVictor', 1);
INSERT INTO `connexion` VALUES(10, '0701', 'AMarc', 1);
INSERT INTO `connexion` VALUES(11, '0523', 'FJonathan', 1);
INSERT INTO `connexion` VALUES(12, '1116', 'TGael', 1);
/*A2*/
INSERT INTO `connexion` VALUES(13, '1003', 'BMaxime', 1);
INSERT INTO `connexion` VALUES(14, '0603', 'BAnthony', 1);
INSERT INTO `connexion` VALUES(15, '1113', 'BMathieu', 1);
INSERT INTO `connexion` VALUES(16, '0821', 'CAntoine', 1);
INSERT INTO `connexion` VALUES(17, '0608', 'GValentin', 1);
INSERT INTO `connexion` VALUES(18, '1103', 'GSebastien', 1);
INSERT INTO `connexion` VALUES(19, '0120', 'GAnthony', 1);
INSERT INTO `connexion` VALUES(20, '0730', 'GYannis', 1);
INSERT INTO `connexion` VALUES(21, '0216', 'MAymeric', 1);
INSERT INTO `connexion` VALUES(22, '0203', 'SCorentin', 1);
INSERT INTO `connexion` VALUES(23, '0514', 'SCharles', 1);
INSERT INTO `connexion` VALUES(24, '0721', 'BChloé', 1);
INSERT INTO `connexion` VALUES(25, '0830', 'YCharlesAntoine', 1);
INSERT INTO `connexion` VALUES(26, '1231', 'KAlexandre', 1);
INSERT INTO `connexion` VALUES(27, '1010', 'AWalid', 1);
/*B1*/
INSERT INTO `connexion` VALUES(28, '1023', 'BMaxime', 1);
INSERT INTO `connexion` VALUES(29, '0209', 'GRaphael', 1);
INSERT INTO `connexion` VALUES(30, '0307', 'BKhaled', 1);
INSERT INTO `connexion` VALUES(31, '0707', 'CLucas', 1);
INSERT INTO `connexion` VALUES(32, '1228', 'FStephane', 1);
INSERT INTO `connexion` VALUES(33, '0929', 'GSimon', 1);
INSERT INTO `connexion` VALUES(34, '0813', 'LBenjamin', 1);
INSERT INTO `connexion` VALUES(35, '0726', 'TCorentin', 1);
INSERT INTO `connexion` VALUES(36, '1024', 'GThomas', 1);
INSERT INTO `connexion` VALUES(37, '1101', 'MSimon', 1);
INSERT INTO `connexion` VALUES(38, '0123', 'MClement', 1);
INSERT INTO `connexion` VALUES(39, '0910', 'MNicolas', 1);
INSERT INTO `connexion` VALUES(40, '1105', 'PMaxime', 1);
INSERT INTO `connexion` VALUES(41, '0402', 'BFlorian', 1);
INSERT INTO `connexion` VALUES(42, '0424', 'BQuentin', 1);
/*B2*/
INSERT INTO `connexion` VALUES(43, '0802', 'RCorentin', 1);
INSERT INTO `connexion` VALUES(44, '0704', 'GLoan', 1);
INSERT INTO `connexion` VALUES(45, '0103', 'VThomas', 1);
INSERT INTO `connexion` VALUES(46, '0904', 'EJawad', 1);
INSERT INTO `connexion` VALUES(47, '0512', 'PQuentin', 1);
INSERT INTO `connexion` VALUES(48, '0617', 'GWilliam', 1);
INSERT INTO `connexion` VALUES(49, '0307', 'VWilliam', 1);
INSERT INTO `connexion` VALUES(50, '0416', 'MSylvain', 1);
INSERT INTO `connexion` VALUES(51, '1223', 'SAlexandre', 1);
INSERT INTO `connexion` VALUES(52, '0722', 'CBerenice', 1);
INSERT INTO `connexion` VALUES(53, '0305', 'WAurelien', 1);
INSERT INTO `connexion` VALUES(54, '0419', 'RClement', 1);
INSERT INTO `connexion` VALUES(55, '0723', 'PYohann', 1);


/*Professeur*/
INSERT INTO `connexion` VALUES(56, 'JC1415', 'JCouchot', 2);
INSERT INTO `connexion` VALUES(57, 'CG1617', 'CGuyeux', 2);
INSERT INTO `connexion` VALUES(58, 'AM1819', 'AMillet', 2);





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
VALUES (1,"A1",12,1);

INSERT INTO `classe` 
VALUES (2,"A2",15,1);

INSERT INTO `classe`
VALUES (3,"B1",14,2);

INSERT INTO `classe`
VALUES (4, "B2",13,3);



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
VALUES(1, 'Dervisagic', 'Armin',null,null, '1995-10-04', 1, 1);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(2, 'Aypeck', 'Tolga',null,null, '1995-08-03', 1, 2);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(3, 'Sabbagh', 'Raphael',null,null, '1995-11-10', 1, 3);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(4, 'Rodriguez', 'Romain',null,null, '1996-01-10', 1, 4);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(56, 'Dabere', 'Henry',null,null, '1995-12-12', 1, 5);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(57, 'Zerouali Bardai', 'Omar',null,null, '1995-03-04', 1, 6);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(58, 'Voinot', 'Thibaut',null,null, '1995-04-08', 1, 7);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(8, 'Lambert', 'Sylvain',null,null, '1994-10-20', 1, 8);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(9, 'Michel', 'Victor',null,null, '1995-06-12', 1, 9);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(10, 'Amatory', 'Marc',null,null, '1995-07-01', 1, 10);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(11, 'Ferreira', 'Jonathan',null,null, '1995-05-23', 1, 11);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(12, 'Trahin', 'Gael',null,null, '1995-11-16', 1, 12);
/*A2*/
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(13, 'Bauer', 'Maxime',null,null, '1995-10-03', 2, 13);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(14, 'Billote', 'Anthony',null,null, '1994-06-03', 2, 14);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(15, 'Burger', 'Mathieu',null,null, '1995-11-13', 2, 15);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(16, 'Castalan', 'Antoine',null,null, '1995-08-21', 2, 16);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(17, 'Garet', 'Valentin',null,null, '1994-06-08', 2, 17);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(18, 'Gunther', 'Sebastien',null,null, '1996-11-03', 2, 18);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(19, 'Gussy', 'Anthony',null,null, '1995-01-20', 2, 19);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(20, 'Guyot', 'Yannis',null,null, '1994-07-30', 2, 20);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(21, 'Mengel', 'Aymeric',null,null, '1995-02-16', 2, 21);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(22, 'Servette', 'Corentin',null,null, '1995-02-03', 2, 22);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(23, 'Socie', 'Charles',null,null, '1994-05-14', 2, 23);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(24, 'Beaufils', 'Chloé',null,null, '1995-07-21', 2, 24);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(25, 'Yangni-Angate', 'Charles-Antoine',null,null, '1994-08-30', 2, 25);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(26, 'Koperez', 'Alexandre',null,null, '1993-12-31', 2, 26);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(27, 'Ait Ouaarab', 'Walid',null,null, '1995-10-10', 2, 27);
/*B1*/
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(41, 'Benatti', 'Maxime',null,null, '1995-10-23', 3, 28);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(42, 'Gauthier', 'Raphael',null,null, '1994-02-09', 3, 29);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(43, 'Boughettoucha', 'Khaled',null,null, '1995-03-07', 3, 30);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(44, 'Corailler', 'Lucas',null,null, '1995-07-07', 3, 31);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(45, 'Franjaud', 'Stephane',null,null, '1993-12-28', 3, 32);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(46, 'Gourdeau', 'Simon',null,null, '1995-09-29', 3, 33);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(47, 'Lefort', 'Benjamin',null,null, '1995-08-13', 3, 34);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(48, 'Tournoux', 'Corentin',null,null, '1995-07-26', 3, 35);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(49, 'Giros', 'Thomas',null,null, '1995-10-24', 3, 36);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(50, 'Maillot', 'Simon',null,null, '1993-11-01', 3, 37);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(51, 'Marin', 'Clement',null,null, '1994-01-23', 3, 38);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(52, 'Minet', 'Nicolas',null,null, '1995-09-10', 3, 39);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(53, 'Perraud', 'Maxime',null,null, '1995-11-05', 3, 40);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(54, 'Bergeret', 'Florian',null,null, '1995-04-02', 3, 41);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(55, 'Blanchard', 'Quentin',null,null, '1995-04-24', 3, 42);
/*B2*/
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(28, 'Rousselet', 'Corentin',null,null, '1995-08-02', 4, 43);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(29, 'Guyon', 'Loan',null,null, '1994-07-04', 4, 44);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(30, 'Vallet', 'Thomas',null,null, '1995-01-03', 4, 45);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(31, 'El Houssine', 'Jawad',null,null, '1993-09-04', 4, 46);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(32, 'Perez', 'Quentin',null,null, '1995-05-12', 4, 47);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(33, 'Gilbert', 'William',null,null, '1995-06-17', 4, 48);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(34, 'Viennet', 'William',null,null, '1995-03-07', 4, 49);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(35, 'Morel', 'Sylvain',null,null, '1993-04-16', 4, 50);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(36, 'Sauner', 'Alexandre',null,null, '1994-12-23', 4, 51);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(37, 'Caly', 'Berenice',null,null, '1994-07-22', 4, 52);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(38, 'Wolz', 'Aurelien',null,null, '1995-03-05', 4, 53);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(39, 'Ravier', 'Clement',null,null, '1995-04-19', 4, 54);
INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `niveau_atteint`, `moyenne_eleve`, `date_de_naissance`, `id_classe`, `identifiant`) 
VALUES(40, 'Peslier', 'Yohann',null,null, '1995-07-23', 4, 55);



CREATE TABLE exercice (
id_exercice INT  AUTO_INCREMENT NOT NULL,
correction_exercice varchar(30),
taille_exo int,
PRIMARY KEY (id_exercice) 
) ENGINE=InnoDB; 

INSERT INTO `exercice`
(`id_exercice`,`correction_exercice`, `taille_exo`) 
VALUES (null,'1-2-1-3-2',5);
INSERT INTO `exercice`
(`id_exercice`, `correction_exercice`, `taille_exo`) 
VALUES (null,'1-3-3-3-3-3',6);

CREATE TABLE solution_exo (
id_exercice INT,
id_eleve INT,
erreur_exo varchar(60),
nb_essais int,
moyenne_exo float(4,2),
exo_fait int,
Foreign key (id_exercice) references exercice(id_exercice),
Foreign key (id_eleve) references eleve(id_eleve),
PRIMARY KEY (id_eleve,id_exercice) 
) ENGINE=InnoDB; 






