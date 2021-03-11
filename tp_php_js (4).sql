-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 10 mars 2021 à 22:48
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_php_js`
--

-- --------------------------------------------------------

--
-- Structure de la table `combatmonstre`
--

DROP TABLE IF EXISTS `combatmonstre`;
CREATE TABLE IF NOT EXISTS `combatmonstre` (
  `idMonstre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(11) NOT NULL,
  `classe` varchar(11) NOT NULL,
  `vie` int(11) NOT NULL,
  `attaque` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  PRIMARY KEY (`idMonstre`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `combatmonstre`
--

INSERT INTO `combatmonstre` (`idMonstre`, `nom`, `classe`, `vie`, `attaque`, `defense`) VALUES
(1, 'Vaudou', 'Monstre', 100, 60, 10),
(2, 'Cafetière', 'Monstre', 100, 10, 60),
(3, 'Coucou', 'Monstre', 100, 40, 30),
(4, 'Charette', 'Monstre', 100, 20, 50),
(5, 'Gros Chien', 'Monstre', 100, 35, 35),
(6, 'Loli', 'Monstre', 100, 50, 20),
(7, 'Bob', 'Monstre', 100, 25, 45),
(8, 'Délégué', 'Monstre', 100, 45, 25),
(9, 'Bloc On Map', 'Monstre', 100, 5, 65),
(10, 'UwU', 'Monstre', 100, 55, 15),
(11, 'Kangoo Bleu', 'Monstre', 100, 65, 5);

-- --------------------------------------------------------

--
-- Structure de la table `combatperso`
--

DROP TABLE IF EXISTS `combatperso`;
CREATE TABLE IF NOT EXISTS `combatperso` (
  `idCombatPerso` int(11) NOT NULL AUTO_INCREMENT,
  `classe` varchar(11) NOT NULL,
  `vie` int(11) NOT NULL,
  `attaque` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  PRIMARY KEY (`idCombatPerso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `combatperso`
--

INSERT INTO `combatperso` (`idCombatPerso`, `classe`, `vie`, `attaque`, `defense`) VALUES
(1, 'Guerrier', 100, 20, 50),
(2, 'Mage', 100, 50, 20),
(3, 'Eclaireur', 100, 35, 35);

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

DROP TABLE IF EXISTS `monstre`;
CREATE TABLE IF NOT EXISTS `monstre` (
  `idMonstre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(11) NOT NULL,
  `classe` varchar(11) NOT NULL,
  `vie` int(11) NOT NULL,
  `attaque` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  PRIMARY KEY (`idMonstre`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `monstre`
--

INSERT INTO `monstre` (`idMonstre`, `nom`, `classe`, `vie`, `attaque`, `defense`) VALUES
(1, 'Vaudou', 'Monstre', 100, 60, 10),
(2, 'Cafetière', 'Monstre', 100, 10, 60),
(3, 'Coucou', 'Monstre', 100, 40, 30),
(4, 'Charette', 'Monstre', 100, 20, 50),
(5, 'Gros Chien', 'Monstre', 100, 35, 35),
(6, 'Loli', 'Monstre', 100, 50, 20),
(7, 'Bob', 'Monstre', 100, 25, 45),
(8, 'Délégué', 'Monstre', 100, 45, 25),
(9, 'Bloc On Map', 'Monstre', 100, 5, 65),
(10, 'UwU', 'Monstre', 100, 55, 15),
(11, 'Kangoo Bleu', 'Monstre', 100, 65, 5);

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

DROP TABLE IF EXISTS `personnage`;
CREATE TABLE IF NOT EXISTS `personnage` (
  `idPerso` int(11) NOT NULL AUTO_INCREMENT,
  `classe` varchar(30) NOT NULL,
  `vie` int(11) NOT NULL,
  `attaque` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  PRIMARY KEY (`idPerso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`idPerso`, `classe`, `vie`, `attaque`, `defense`) VALUES
(1, 'Guerrier', 100, 20, 50),
(2, 'Mage', 100, 50, 20),
(3, 'Eclaireur', 100, 35, 35);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `idPerso` int(11) NOT NULL,
  `idCombatPerso` int(11) NOT NULL,
  `photoProfil` blob NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `point` int(11) NOT NULL,
  `victoire` int(11) NOT NULL,
  `defaite` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idPerso` (`idPerso`),
  KEY `idCombatPerso` (`idCombatPerso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `idPerso`, `idCombatPerso`, `photoProfil`, `pseudo`, `mdp`, `point`, `victoire`, `defaite`) VALUES
(1, 1, 1, '', 'Clerclem', '123', 0, 0, 0),
(2, 2, 2, '', 'Lucide', '456', 0, 0, 0),
(3, 3, 3, '', 'Délégué', '789', 0, 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idPerso`) REFERENCES `personnage` (`idPerso`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`idCombatPerso`) REFERENCES `combatperso` (`idCombatPerso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
