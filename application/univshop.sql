-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 24 juin 2019 à 12:49
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `univshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce_cours`
--

DROP TABLE IF EXISTS `annonce_cours`;
CREATE TABLE IF NOT EXISTS `annonce_cours` (
  `id_cours` int(32) NOT NULL AUTO_INCREMENT,
  `id_prof` int(32) NOT NULL,
  `id_matiere` int(32) NOT NULL,
  `prix` int(32) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lundi` tinyint(1) NOT NULL,
  `mardi` tinyint(1) NOT NULL,
  `mercredi` tinyint(1) NOT NULL,
  `jeudi` tinyint(1) NOT NULL,
  `vendredi` tinyint(1) NOT NULL,
  `samedi` tinyint(1) NOT NULL,
  `dimanche` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cours`),
  KEY `id_prof` (`id_prof`),
  KEY `id_matiere` (`id_matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce_cours`
--

INSERT INTO `annonce_cours` (`id_cours`, `id_prof`, `id_matiere`, `prix`, `titre`, `description`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `samedi`, `dimanche`) VALUES
(3, 4, 1, 30, 'Fabiola la best', 'test', 1, 1, 1, 0, 0, 1, 1),
(4, 1, 4, 20, 'Cours HISTOIRE 2', 'Test Test', 1, 1, 1, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cours_valide`
--

DROP TABLE IF EXISTS `cours_valide`;
CREATE TABLE IF NOT EXISTS `cours_valide` (
  `id_cours_valide` int(32) NOT NULL AUTO_INCREMENT,
  `id_cours` int(32) NOT NULL,
  `id_eleve` int(32) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `nb_heure` int(32) NOT NULL,
  `eleve` tinyint(1) NOT NULL,
  `prof` tinyint(1) NOT NULL,
  `eleveA` tinyint(1) NOT NULL DEFAULT '0',
  `profA` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cours_valide`),
  KEY `id_cours` (`id_cours`),
  KEY `id_eleve` (`id_eleve`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours_valide`
--

INSERT INTO `cours_valide` (`id_cours_valide`, `id_cours`, `id_eleve`, `date`, `heure`, `nb_heure`, `eleve`, `prof`, `eleveA`, `profA`) VALUES
(1, 3, 1, '2019-06-02', '00:00:00', 2, 1, 1, 0, 0),
(2, 3, 1, '2019-06-02', '16:59:00', 1, 1, 0, 0, 1),
(3, 3, 1, '2019-06-05', '10:00:00', 2, 1, 1, 0, 0),
(4, 4, 4, '2019-06-24', '13:00:00', 3, 1, 1, 0, 0),
(5, 4, 4, '2019-06-12', '10:00:00', 2, 1, 1, 0, 0),
(6, 4, 4, '2019-06-12', '00:00:00', 1, 1, 0, 0, 0),
(7, 3, 1, '2019-06-22', '08:00:00', 3, 1, 1, 0, 1),
(8, 3, 1, '2019-06-18', '21:00:00', 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etat_annonce`
--

DROP TABLE IF EXISTS `etat_annonce`;
CREATE TABLE IF NOT EXISTS `etat_annonce` (
  `id_etat_annonce` int(32) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etat_annonce`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etat_annonce`
--

INSERT INTO `etat_annonce` (`id_etat_annonce`, `libelle`) VALUES
(1, 'Disponible'),
(2, 'Vendu'),
(3, 'Réservé'),
(4, 'Prêté');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int(32) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `libelle`) VALUES
(1, 'Mathématiques'),
(2, 'Français'),
(3, 'Philosophie'),
(4, 'Histoire'),
(5, 'Géographie'),
(6, 'Sciences et vie de la terre'),
(7, 'Physique'),
(8, 'Chimie'),
(9, 'Physique-Chimie'),
(10, 'Economie'),
(11, 'Finance'),
(12, 'Droit'),
(13, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id_note` int(32) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  `id_type` int(32) NOT NULL,
  `id_notee` int(32) NOT NULL,
  `id_noteur` int(32) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_note`),
  KEY `id_notee` (`id_notee`),
  KEY `id_noteur` (`id_noteur`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_note`, `note`, `id_type`, `id_notee`, `id_noteur`, `description`) VALUES
(1, 5, 3, 1, 1, 'Test'),
(2, 4, 3, 1, 1, 'test'),
(3, 4, 2, 1, 1, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `id_support` int(32) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `prix` int(32) NOT NULL,
  `id_vendeur` int(32) NOT NULL,
  `id_acheteur` int(32) DEFAULT NULL,
  `id_type` int(32) NOT NULL,
  `id_etat` int(32) NOT NULL,
  `date_annonce` date NOT NULL,
  `duree_pret` int(32) DEFAULT NULL,
  `date_pret` date NOT NULL,
  `date_retour` date NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `annee_edition` varchar(255) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `id_matiere` int(32) NOT NULL,
  PRIMARY KEY (`id_support`),
  KEY `support_acheteur` (`id_acheteur`),
  KEY `support_vendeur` (`id_vendeur`),
  KEY `support_etat` (`id_etat`),
  KEY `support_type` (`id_type`),
  KEY `id_matiere` (`id_matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `support`
--

INSERT INTO `support` (`id_support`, `titre`, `prix`, `id_vendeur`, `id_acheteur`, `id_type`, `id_etat`, `date_annonce`, `duree_pret`, `date_pret`, `date_retour`, `image`, `description`, `annee_edition`, `editeur`, `auteur`, `id_matiere`) VALUES
(3, 'Livre test', 25, 1, NULL, 1, 1, '2019-04-30', NULL, '0000-00-00', '0000-00-00', 'LrjHTbpuTc.gif', 'Test !!\r\nTest !!', '1999', 'Inconnu', 'Inconnu', 4),
(4, 'Mon livre de maths bon état', 18, 1, NULL, 1, 1, '2019-04-30', NULL, '0000-00-00', '0000-00-00', 'QhGwVS5t2m.gif', 'dshfkzfbsf\r\nfjzfk\r\n', '2018', 'Multiple', 'Inconnu', 1),
(5, 'Livre Maths', 90, 1, NULL, 1, 1, '2019-04-30', NULL, '0000-00-00', '0000-00-00', 'eFknIdWZAv.gif', 'fgdgd', 'bfdshg', '', '', 12),
(6, 'Livre Yoda', 25, 1, NULL, 1, 1, '2019-04-30', NULL, '0000-00-00', '0000-00-00', '5mckWmSxQy.jpg', 'jfhshfbgjhs', '', '', '', 1),
(7, 'Livre Maths 2', 20, 1, NULL, 1, 1, '2019-05-06', NULL, '0000-00-00', '0000-00-00', 'klWEOr51Um.jpg', 'Gfegsdgfsj', '2012', '', '', 3),
(9, 'Pret', 1, 1, NULL, 2, 1, '2019-06-05', 2, '0000-00-00', '0000-00-00', '1lRFvTY373.gif', 'fn,dbebjb', '1999', 'Hachette', 'Dumas', 1),
(10, 'Test Titre', 20, 1, NULL, 1, 1, '2019-06-05', NULL, '0000-00-00', '0000-00-00', 'b5PZfEpyGs.gif', 'dgehfeb\r\n', '2014', 'rterte', 'ert', 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_annonce`
--

DROP TABLE IF EXISTS `type_annonce`;
CREATE TABLE IF NOT EXISTS `type_annonce` (
  `id_type_annonce` int(32) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_annonce`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_annonce`
--

INSERT INTO `type_annonce` (`id_type_annonce`, `libelle`) VALUES
(1, 'Vente'),
(2, 'Prêt');

-- --------------------------------------------------------

--
-- Structure de la table `type_note`
--

DROP TABLE IF EXISTS `type_note`;
CREATE TABLE IF NOT EXISTS `type_note` (
  `id_type_note` int(32) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type_note`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_note`
--

INSERT INTO `type_note` (`id_type_note`, `libelle`) VALUES
(1, 'Vendeur'),
(2, 'Acheteur'),
(3, 'Prof'),
(4, 'Élève');

-- --------------------------------------------------------

--
-- Structure de la table `university`
--

DROP TABLE IF EXISTS `university`;
CREATE TABLE IF NOT EXISTS `university` (
  `id_univ` int(32) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_univ`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `university`
--

INSERT INTO `university` (`id_univ`, `libelle`) VALUES
(1, 'Université Paris 1 - Panthéon Sorbonne'),
(2, 'Université Paris Est Créteil');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `id_univ` int(32) NOT NULL,
  `password` varchar(512) NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `username` (`username`),
  KEY `user_ibfk_1` (`id_univ`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nom`, `prenom`, `mail`, `id_univ`, `password`, `photo`) VALUES
(1, 'flav_rz', 'Rizoulieres', 'Flavien', 'rizoulieresflavien@live.fr', 1, 'fa7acc7a0134a6d28234335ae101748feff43e49', '1.jpg'),
(2, 'test', 'test', 'test', 'test.test@test.com', 2, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', ''),
(3, 'test2', 'test', 'test', 'testtetete@test.com', 1, 'e795db4a3d723c7a16cd0b9e31e5f93b5bcfc780', ''),
(4, 'fabiola', 'MORRONE', 'Fabiola', 'hfze@fhbdh.fr', 2, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '4.gif');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce_cours`
--
ALTER TABLE `annonce_cours`
  ADD CONSTRAINT `annonce_cours_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `annonce_cours_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `cours_valide`
--
ALTER TABLE `cours_valide`
  ADD CONSTRAINT `cours_valide_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `annonce_cours` (`id_cours`),
  ADD CONSTRAINT `cours_valide_ibfk_2` FOREIGN KEY (`id_eleve`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_notee`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_noteur`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `notes_ibfk_3` FOREIGN KEY (`id_type`) REFERENCES `type_note` (`id_type_note`);

--
-- Contraintes pour la table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_acheteur` FOREIGN KEY (`id_acheteur`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `support_etat` FOREIGN KEY (`id_etat`) REFERENCES `etat_annonce` (`id_etat_annonce`),
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `support_type` FOREIGN KEY (`id_type`) REFERENCES `type_annonce` (`id_type_annonce`),
  ADD CONSTRAINT `support_vendeur` FOREIGN KEY (`id_vendeur`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_univ`) REFERENCES `university` (`id_univ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
