-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 oct. 2020 à 08:42
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hhva_team2020_5`
--

-- --------------------------------------------------------

--
-- Structure de la table `coiffeur_periode`
--

DROP TABLE IF EXISTS `coiffeur_periode`;
CREATE TABLE IF NOT EXISTS `coiffeur_periode` (
  `PER_ID` int(20) NOT NULL,
  `COI_ID` int(2) NOT NULL,
  `CP_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`COI_ID`),
  KEY `COI_ID` (`COI_ID`),
  KEY `PER_ID` (`PER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `elv_image`
--

DROP TABLE IF EXISTS `elv_image`;
CREATE TABLE IF NOT EXISTS `elv_image` (
  `IMG_ID` int(6) NOT NULL AUTO_INCREMENT,
  `ART_ID` int(3) NOT NULL,
  `IMG_CHEMIN` varchar(500) NOT NULL,
  `IMG_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`IMG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `elv_image`
--

INSERT INTO `elv_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_STATUT`) VALUES
(14, 9, 'Ressources/Boutique/1600864555-Garnier Ultra Doux-1.jpg', 'ACTIF'),
(15, 9, 'Ressources/Boutique/1600864555-Garnier Ultra Doux-2.jpeg', 'ACTIF'),
(16, 11, 'Ressources/Boutique/1600864571-Total Washing-1.jpg', 'ACTIF'),
(17, 11, 'Ressources/Boutique/1600864571-Total Washing-2.jpg', 'ACTIF'),
(18, 12, 'Ressources/Boutique/1600864581-Mythic Oil-1.jpg', 'ACTIF'),
(19, 13, 'Ressources/Boutique/1600864589-Matrix Shampong-1.jpg', 'ACTIF'),
(20, 14, 'Ressources/Boutique/1600864612-Aloe Vera-1.jpg', 'ACTIF'),
(21, 14, 'Ressources/Boutique/1600864612-Aloe Vera-2.jpg', 'ACTIF'),
(22, 14, 'Ressources/Boutique/1600864612-Aloe Vera-3.jpeg', 'ACTIF'),
(23, 15, 'Ressources/Boutique/1601456469-3-1.jpg', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_article`
--

DROP TABLE IF EXISTS `ely_article`;
CREATE TABLE IF NOT EXISTS `ely_article` (
  `ART_ID` int(3) NOT NULL AUTO_INCREMENT,
  `ART_NOM` varchar(30) NOT NULL,
  `ART_PRIX` int(5) NOT NULL,
  `ART_MARQUE` varchar(25) NOT NULL,
  `ART_QTE_STOCK` int(5) NOT NULL,
  `ART_DESCRIPTION` varchar(500) NOT NULL,
  `ART_CATEGORIE` varchar(50) NOT NULL,
  `ART_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`ART_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_article`
--

INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(9, 'Garnier Ultra Doux', 20, 'Garnier', 10, 'A base d\'avocat, parfait pour le guacalmole', 'Shampooing', 'INACTIF'),
(11, 'Total Washing', 200, 'Total', 20, 'Parfait pour les cheveux', 'Teinture', 'ACTIF'),
(12, 'Mythic Oil', 2000, 'Oil', 20, 'Parfait pour tous', 'Shampooing', 'ACTIF'),
(13, 'Matrix Shampong', 20, 'Matrix', 20, 'Nettoie bien les cheveux', 'Teinture', 'INACTIF'),
(14, 'Aloe Vera', 20, 'Urtekam', 20, 'A base d\'aloe vera', 'Teinture', 'INACTIF'),
(15, '3', 13, '3', 3, '2', 'Teinture', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_client`
--

DROP TABLE IF EXISTS `ely_client`;
CREATE TABLE IF NOT EXISTS `ely_client` (
  `CLI_ID` int(9) NOT NULL AUTO_INCREMENT,
  `CLI_NOM` varchar(30) NOT NULL,
  `CLI_PRENOM` varchar(30) NOT NULL,
  `CLI_EMAIL` varchar(70) DEFAULT NULL,
  `CLI_TEL` varchar(20) NOT NULL,
  `CLI_DESCRIPTION` varchar(500) DEFAULT NULL,
  `CLI_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`CLI_ID`),
  UNIQUE KEY `CLI_TEL` (`CLI_TEL`),
  UNIQUE KEY `CLI_EMAIL` (`CLI_EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_client`
--

INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES
(1, 'Assimua2', 'Jarod2', 'Jarod@togomail.mail2', '+1 46 343 34 342', 'Vive Wejdene22', 'ACTIF'),
(2, 'John', 'KSSB', 'john@gmail.com', '079 123 12 12', 'Wejdene', 'ACTIF'),
(3, 'Musk', 'Elon', 'Musk@space.x', '078 123 12 32', 'Space X', 'ACTIF'),
(4, 'Luther King', 'Martin', NULL, '+1 343 3434 35', '', 'ACTIF'),
(5, 'Maxime', 'Perrod', 'elv-maxime.prrd@eduge.ch', '123', NULL, 'ACTIF'),
(7, '123', '123', 'ewe@gmal.com', '234', NULL, 'INACTIF'),
(8, 'Maxime', 'Perrod', 'elv-maxime.prrd@eduge.ch2', 'asdsad', NULL, 'INACTIF'),
(9, 'Maxime', 'Perrod', NULL, '123125215235', NULL, 'INACTIF'),
(10, 'Maxime', 'Perrod', NULL, '7896796', NULL, 'INACTIF'),
(11, '789879879', '789879780', NULL, '780780', NULL, 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_coiffeur`
--

DROP TABLE IF EXISTS `ely_coiffeur`;
CREATE TABLE IF NOT EXISTS `ely_coiffeur` (
  `COI_ID` int(2) NOT NULL AUTO_INCREMENT,
  `COI_NOM` varchar(30) NOT NULL,
  `COI_PRENOM` varchar(30) NOT NULL,
  `COI_MAIL` varchar(70) NOT NULL,
  `COI_MDP` varchar(50) NOT NULL,
  `COI_NUMTEL` varchar(20) NOT NULL,
  `COI_PHOTO` varchar(500) DEFAULT NULL,
  `COI_POSTE` varchar(25) DEFAULT NULL,
  `COI_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`COI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_coiffeur`
--

INSERT INTO `ely_coiffeur` (`COI_ID`, `COI_NOM`, `COI_PRENOM`, `COI_MAIL`, `COI_MDP`, `COI_NUMTEL`, `COI_PHOTO`, `COI_POSTE`, `COI_STATUT`) VALUES
(1, 'Perrod', 'Maxime', 'elv-maxime.prrd@eduge.ch', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '07812912818', 'Ressources/Photo de profil/1601456350-Perrod.jpg', 'Patronne', 'INACTIF'),
(2, 'De Sousaaaaa', 'Victor', 'victor.dss@eduge.ch', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '791234567', 'Ressources/Photo de profil/1600865702-De Sousa.jpg', 'Coiffeur superieur', 'ACTIF'),
(3, 'Komivi Manuel Jarod', 'Assiamua', 'jarodmanuel5@gmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '791234567', 'Ressources/Photo de profil/1600865711-Komivi Manuel Jarod.jpg', 'Coiffeur', 'ACTIF'),
(4, 'ESIG', '2020', '2020-esig-team5@yopmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '0771234567', 'Ressources/Photo de profil/1600865728-ESIG.jpg', 'Coiffeur', 'INACTIF'),
(5, 'Limeng', 'PetitChinois', 'petitchinoisss@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '87458622500', NULL, 'Coiffeur', 'ACTIF'),
(6, 'Alessio', 'Nocera', 'Alessio@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '014484896448', NULL, 'Coiffeur', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_diplome`
--

DROP TABLE IF EXISTS `ely_diplome`;
CREATE TABLE IF NOT EXISTS `ely_diplome` (
  `DIP_ID` int(3) NOT NULL AUTO_INCREMENT,
  `COI_ID` int(2) NOT NULL,
  `DIP_NOM` varchar(30) NOT NULL,
  `DIP_DATE_OBTENTION` date NOT NULL,
  `DIP_PHOTO` varchar(500) NOT NULL,
  `DIP_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`DIP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_diplome`
--

INSERT INTO `ely_diplome` (`DIP_ID`, `COI_ID`, `DIP_NOM`, `DIP_DATE_OBTENTION`, `DIP_PHOTO`, `DIP_STATUT`) VALUES
(11, 1, 'Certificat - Jungle fever', '2012-05-21', 'Ressources/Diplome/1600239901-Certificat - Jungle fever.jpg', 'ACTIF'),
(12, 1, 'Diplome Dudenko', '2001-08-17', 'Ressources/Diplome/1600239926-Diplome Dudenko.jpg', 'ACTIF'),
(13, 1, 'Diplome Painting Spotlight', '2015-09-11', 'Ressources/Diplome/1600239952-Diplome Painting Spotlight.jpg', 'ACTIF'),
(14, 1, '123', '2020-10-08', 'Ressources/Diplome/1601555894-123.jpg', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_para_descrip`
--

DROP TABLE IF EXISTS `ely_para_descrip`;
CREATE TABLE IF NOT EXISTS `ely_para_descrip` (
  `DES_ID` int(5) NOT NULL AUTO_INCREMENT,
  `COI_ID` int(2) NOT NULL,
  `DES_TITRE` varchar(25) NOT NULL,
  `DES_TEXTE` varchar(500) NOT NULL,
  `DES_ORDRE` int(2) NOT NULL,
  `DES_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`DES_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_para_descrip`
--

INSERT INTO `ely_para_descrip` (`DES_ID`, `COI_ID`, `DES_TITRE`, `DES_TEXTE`, `DES_ORDRE`, `DES_STATUT`) VALUES
(2, 1, 'Mes techniques', 'Spï¿½cialisï¿½ dans la coloration', 3, 'ACTIF'),
(3, 1, 'Ma carriï¿½re', 'J\'ai coiffï¿½ Micheal Jackson, Obama et Lincoln ', 1, 'ACTIF'),
(27, 1, 'La passion du Rousseaux', '...', 2, 'ACTIF'),
(31, 2, 'J\'adore la moustache', 'Je coupe des moustaches avec grande passion\r\n', 1, 'ACTIF'),
(32, 3, 'asd', 'asd', 1, 'ACTIF'),
(33, 2, 'Monde sans coiffeur', 'Bonjour je suis l auteur du monde sans coiffeur', 2, 'ACTIF'),
(34, 1, '3', '3', 4, 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_pause_periode`
--

DROP TABLE IF EXISTS `ely_pause_periode`;
CREATE TABLE IF NOT EXISTS `ely_pause_periode` (
  `PER_ID` int(255) NOT NULL,
  `COI_ID` int(255) NOT NULL,
  `PAU_DESCRIPTION` varchar(50) NOT NULL,
  `PAU_STATUT` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_pause_periode`
--

INSERT INTO `ely_pause_periode` (`PER_ID`, `COI_ID`, `PAU_DESCRIPTION`, `PAU_STATUT`) VALUES
(3, 1, 'Absent', 'ACTIF'),
(4, 1, 'Absent', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_periode`
--

DROP TABLE IF EXISTS `ely_periode`;
CREATE TABLE IF NOT EXISTS `ely_periode` (
  `PER_ID` int(20) NOT NULL AUTO_INCREMENT,
  `PER_DATE` date NOT NULL,
  `PER_HEURE_MIN_DEBUT` time NOT NULL,
  `PER_HEURE_MIN_FIN` time NOT NULL,
  `PER_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`PER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_periode`
--

INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES
(1, '2020-10-05', '08:30:00', '09:30:00', 'ACTIF'),
(2, '2020-10-05', '09:45:00', '10:30:00', 'ACTIF'),
(3, '2020-10-06', '09:30:00', '10:45:00', 'ACTIF'),
(4, '2020-10-05', '10:30:00', '11:30:00', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_recupmdp`
--

DROP TABLE IF EXISTS `ely_recupmdp`;
CREATE TABLE IF NOT EXISTS `ely_recupmdp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_recupmdp`
--

INSERT INTO `ely_recupmdp` (`id`, `mail`, `code`, `confirme`) VALUES
(16, 'jarodmanuel5@gmail.com', 151049774, 1),
(15, 'elv-maxime.prrd@eduge.ch', 455420302, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ely_rendezvous`
--

DROP TABLE IF EXISTS `ely_rendezvous`;
CREATE TABLE IF NOT EXISTS `ely_rendezvous` (
  `RDV_ID` int(10) NOT NULL AUTO_INCREMENT,
  `COI_ID` int(2) NOT NULL,
  `CLI_ID` int(6) NOT NULL,
  `RDV_DESCRIPTION` varchar(500) NOT NULL,
  `RDV_PRIX` int(5) NOT NULL,
  `RDV_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`RDV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_rendezvous`
--

INSERT INTO `ely_rendezvous` (`RDV_ID`, `COI_ID`, `CLI_ID`, `RDV_DESCRIPTION`, `RDV_PRIX`, `RDV_STATUT`) VALUES
(1, 1, 1, '123123212', 1232, 'ACTIF'),
(2, 1, 1, 'TEST', 21, 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_service`
--

DROP TABLE IF EXISTS `ely_service`;
CREATE TABLE IF NOT EXISTS `ely_service` (
  `SER_ID` int(3) NOT NULL AUTO_INCREMENT,
  `SER_NOM` varchar(100) NOT NULL,
  `SER_TYPE` varchar(50) DEFAULT NULL,
  `SER_PRIX` int(5) NOT NULL,
  `SER_DESCRIPTION` varchar(500) NOT NULL,
  `SER_TEMPS_ESTIMATION` int(5) NOT NULL,
  `SER_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`SER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_service`
--

INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(1, 'Femme', 'Coupe', 85, 'Coupe de cheveux pour les femmes', 100, 'ACTIF'),
(2, 'Homme', 'Coupe', 45, 'Coupe de cheveux pour les hommes', 30, 'INACTIF'),
(3, 'Enfant', 'Coupe', 30, 'Coupe de cheveu pour enfant', 30, 'ACTIF'),
(4, 'Coloration des racines', 'Beaute des cheveux', 80, 'Coloration des racines', 120, 'ACTIF'),
(5, 'Meche', 'Beaute des cheveux', 150, '', 120, 'ACTIF'),
(6, 'Balayage', 'Beaute des cheveux', 150, '', 120, 'ACTIF'),
(9, 'Shatush', 'Beaute des cheveux', 150, '', 120, 'ACTIF'),
(11, 'Nika', 'Autre', 100, '', 120, 'ACTIF'),
(12, 'Pastel', 'Beaute des cheveux', 60, '', 120, 'ACTIF'),
(14, 'Lebel', 'Soin', 100, '', 120, 'ACTIF'),
(15, 'Joyko', 'Soin', 50, '', 100, 'ACTIF'),
(17, '2', 'Soin', 2, '2', 2, 'INACTIF'),
(18, '1', 'Coupe', 1, '1', 1, 'INACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_trancheshoraires`
--

DROP TABLE IF EXISTS `ely_trancheshoraires`;
CREATE TABLE IF NOT EXISTS `ely_trancheshoraires` (
  `tra_id` int(10) NOT NULL AUTO_INCREMENT,
  `coi_id` int(11) NOT NULL,
  `tra_jour` varchar(255) NOT NULL,
  `tra_heureDebutMatin` time DEFAULT NULL,
  `tra_heureFinMatin` time DEFAULT NULL,
  `tra_heureDebutAprem` time DEFAULT NULL,
  `tra_heureFinAprem` time DEFAULT NULL,
  PRIMARY KEY (`tra_id`),
  KEY `coi_id` (`coi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_trancheshoraires`
--

INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES
(1, 1, 'Lundi', '08:00:00', '12:30:00', '13:00:00', '17:00:00'),
(2, 1, 'Mardi', '09:00:00', '13:00:00', NULL, NULL),
(3, 1, 'Jeudi', '08:00:00', '11:30:00', '13:30:00', '20:00:00'),
(4, 1, 'Vendredi', '08:00:00', '12:00:00', '13:00:00', '17:00:00'),
(5, 1, 'Samedi', NULL, NULL, '12:00:00', '18:00:00'),
(6, 1, 'Dimanche', NULL, NULL, NULL, NULL),
(7, 1, 'Mercredi', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rdv_periode`
--

DROP TABLE IF EXISTS `rdv_periode`;
CREATE TABLE IF NOT EXISTS `rdv_periode` (
  `RDV_ID` int(10) NOT NULL,
  `PER_ID` int(20) NOT NULL,
  PRIMARY KEY (`RDV_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv_periode`
--

INSERT INTO `rdv_periode` (`RDV_ID`, `PER_ID`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rdv_service`
--

DROP TABLE IF EXISTS `rdv_service`;
CREATE TABLE IF NOT EXISTS `rdv_service` (
  `SER_ID` int(3) NOT NULL,
  `RDV_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv_service`
--

INSERT INTO `rdv_service` (`SER_ID`, `RDV_ID`) VALUES
(15, 1),
(12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `service_coiffeur`
--

DROP TABLE IF EXISTS `service_coiffeur`;
CREATE TABLE IF NOT EXISTS `service_coiffeur` (
  `COI_ID` int(2) NOT NULL,
  `SER_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service_coiffeur`
--

INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES
(2, 65),
(3, 3),
(1, 4),
(1, 5),
(2, 5),
(3, 5),
(3, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(1, 3),
(2, 3),
(4, 3),
(3, 6),
(2, 9),
(1, 12),
(3, 11),
(4, 11),
(2, 14),
(3, 14),
(1, 15),
(2, 1),
(1, 17),
(1, 1),
(1, 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
