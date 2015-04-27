-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Avril 2015 à 10:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ex4_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `animateurs`
--

CREATE TABLE IF NOT EXISTS `animateurs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Contenu de la table `animateurs`
--

INSERT INTO `animateurs` (`id`, `nom`, `prenom`) VALUES
(111, 'SAIGNE', 'Jean');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenom`) VALUES
(1, 'ENSTAGE', 'Jesus');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(120) NOT NULL,
  `duree_jours` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id`, `intitule`, `duree_jours`) VALUES
(20, 'Formation PHP/SQL', 20);

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions_session_eleves`
--

CREATE TABLE IF NOT EXISTS `inscriptions_session_eleves` (
  `ie_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `eleve_id` int(5) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `inscriptions_session_eleves`
--

INSERT INTO `inscriptions_session_eleves` (`ie_id`, `session_id`, `eleve_id`, `date_inscription`) VALUES
(9, 51, 1, '2015-04-23 14:12:10');

-- --------------------------------------------------------

--
-- Structure de la table `sessions_formations`
--

CREATE TABLE IF NOT EXISTS `sessions_formations` (
  `sf_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `formation` int(11) NOT NULL,
  `date_debut` text NOT NULL,
  `date_fin` text NOT NULL,
  `animateur_id` int(5) NOT NULL,
  PRIMARY KEY (`sf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `sessions_formations`
--

INSERT INTO `sessions_formations` (`sf_id`, `formation`, `date_debut`, `date_fin`, `animateur_id`) VALUES
(51, 20, '20/04/2015', '24/04/2015', 111),
(52, 20, 'jhghj', 'ghjghjghj', 111);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
