-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 20 mai 2021 à 22:56
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `rang` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `nom` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`nom`, `image`) VALUES
('pizza', '');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `rang` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idCategorie` int(11) NOT NULL,
  `rang` varchar(30) NOT NULL,
  `dateN` date NOT NULL,
  `rib` int(11) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idCategorie`, `rang`, `dateN`, `rib`) VALUES
(21, 'client', '2021-05-28', 1481115151);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `adresse` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `num` int(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `matricule` int(30) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`adresse`, `nom`, `num`, `mail`, `matricule`) VALUES
('aouina', 'bombay', 12345678, 'bombay@gmail.com', 34),
('sfax', 'papillon', 24191425, 'papillon@gmail.com', 36),
('tunis', 'delice', 12121212, 'delice@gmail.com', 37),
('aouina', 'hachem', 11111111, 'benarabsamir.58@gmail.com', 38);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `quantite` int(20) NOT NULL,
  `prix` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `nom`, `type`, `quantite`, `prix`) VALUES
(42, 'mayonnaise', 'Sucré', 150, '10'),
(43, 'jambon', 'Sucré', 100, '3500'),
(44, 'chocolat', 'sucré', 44, '12'),
(45, 'champignon', 'Sucré', 55, '120'),
(46, 'hrisa', 'salé', 55, '121'),
(47, 'test', 'sucré', 111, '111');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_livreur` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `etat` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_livreur` (`id_livreur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `id_livreur`, `id_commande`, `etat`) VALUES
(3, 1548, 5, 1),
(4, 154845, 151, 0),
(6, 54, 14, 0);

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cin` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cin` (`cin`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`id`, `cin`, `nom`, `prenom`, `email`, `numero`) VALUES
(3, 1548, 'chouchane', 'zahra carthage', 'zcarthage@gmail.com', '23239924'),
(8, 54, 'zahra', 'hc', 'zcarthage@gmail.com', 'zcarthage@gmail.com'),
(9, 159855, 'elyes', 'fessi', 'zcarthage@gmail.com', '56914545'),
(10, 12827488, 'zahra', 'hc', 'zcarthage@gmail.com', '5858'),
(11, 128274847, 'zahra', 'hc', 'zcarthage@gmail.com', 'zcarthage@gmail.com'),
(12, 4544847, 'zahra', 'hc', 'zcarthage@gmail.com', '8588'),
(14, 78, 'chouchane', 'zahra', 'zcarthage@gmail.com', 'zcarthage@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `libelle`, `image`, `id_restaurant`) VALUES
(1, 'aza', 'qt-bg.jpg', 5),
(2, 'zz', 'qt-bg.jpg', 11),
(6, 'menu4', 'img-04.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `menu_plats`
--

DROP TABLE IF EXISTS `menu_plats`;
CREATE TABLE IF NOT EXISTS `menu_plats` (
  `id_menu` int(11) NOT NULL,
  `id_plats` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`,`id_plats`),
  KEY `fk_plats` (`id_plats`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menu_plats`
--

INSERT INTO `menu_plats` (`id_menu`, `id_plats`) VALUES
(1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `prix` float NOT NULL,
  `description` varchar(200) NOT NULL,
  `imgPlats` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plats_categorie` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `libelle`, `categorie`, `prix`, `description`, `imgPlats`) VALUES
(11, 'lablebi', 'pizza', 7.5, 'azds', 'slider-02.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `Id` int(30) NOT NULL AUTO_INCREMENT,
  `Nbre_Personnes` int(30) NOT NULL,
  `DateR` date NOT NULL,
  `idTable` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`Id`, `Nbre_Personnes`, `DateR`, `idTable`, `idCompte`) VALUES
(28, 5, '2021-05-21', 7, 0),
(30, 3, '2021-05-27', 12, 0),
(52, 3, '2021-05-18', 10, 13),
(54, 2, '2021-05-18', 11, 13);

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `idCategorie` int(11) NOT NULL,
  `rang` varchar(30) NOT NULL,
  `catg` varchar(20) NOT NULL,
  `matricule_f` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`idCategorie`, `rang`, `catg`, `matricule_f`) VALUES
(10, 'manager', 'Epicé', '159159');

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `idr` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`idr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `restaurants`
--

INSERT INTO `restaurants` (`idr`, `nom`) VALUES
('15', 'baguette&baguette'),
('159', 'KFC'),
('99', 'Chillis');

-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `idTable` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `idResto` varchar(30) NOT NULL,
  `occupied` varchar(3) NOT NULL,
  PRIMARY KEY (`idTable`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tables`
--

INSERT INTO `tables` (`idTable`, `num`, `idResto`, `occupied`) VALUES
(6, 1, '99', 'no'),
(7, 2, '99', 'no'),
(8, 3, '99', 'no'),
(9, 3, '159', 'no'),
(10, 2, '159', 'no'),
(11, 1, '159', 'no'),
(12, 3, '15', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idCompte` int(20) NOT NULL AUTO_INCREMENT,
  `nomCompte` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `passwordd` varchar(20) NOT NULL,
  `tel` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `dateCreation` date NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idCompte`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idCompte`, `nomCompte`, `email`, `passwordd`, `tel`, `adresse`, `dateCreation`, `idCategorie`) VALUES
(13, 'zied mabrouk', 'zied.mabrouk@esprit.tn', 'a', 26225978, 'Ariana', '2021-05-27', 10),
(25, 'Hachem Ben Arab', 'hachem.benarab@esprit.tn', 'z', 82875285, 'Aouina', '2021-05-15', 21);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `menu_plats`
--
ALTER TABLE `menu_plats`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_plats` FOREIGN KEY (`id_plats`) REFERENCES `plats` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `plats`
--
ALTER TABLE `plats`
  ADD CONSTRAINT `fk_plats_categorie` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`nom`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
