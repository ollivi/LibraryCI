-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Juin 2015 à 19:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `eval`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `temp_name` varchar(265) NOT NULL,
  `file_name` varchar(265) NOT NULL,
  `url` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `user_id`, `temp_name`, `file_name`, `url`) VALUES
(1, 17, '8491433958128canda.jpg', 'canda.jpg', 'C:/wamp/www/libraryci/public/uploads/8491433958128canda.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(265) NOT NULL,
  `password` varchar(365) NOT NULL,
  `email` varchar(265) NOT NULL,
  `nom` varchar(265) NOT NULL,
  `prenom` varchar(265) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nom`, `prenom`) VALUES
(1, 'okokokok', 'adf4661fe6715ed47954193e68b63036', 'ok@ok.ok', 'okokok', 'okokok'),
(2, 'kasi', 'b68fcc3e90e4fecf7182587472526728', 'kasimaru@kasimaru.fr', 'kasi', 'kasi'),
(3, 'plpl', '0ad7769f602705d0703a3685f5768c7b', 'pl@pl.pl', 'plpl', 'plpl'),
(4, 'mlml', '68b8016ea7f5d48a5da241d6de64e4ce', 'test@test.fr', 'test', 'test'),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.test', 'test', 'test'),
(7, 'azer', '13085a63a2b3e4beb7ab10ee395aefe4', 'az@az.az', 'azer', 'azer'),
(8, 'okii', 'c1ca4844ef163ebf0df0fda6859ae920', 'lk@lk.lk', 'okii', 'okii'),
(9, 'hool', 'c1ca4844ef163ebf0df0fda6859ae920', 'lk@lk.ol', 'okii', 'okii'),
(10, 'hooli', 'c1ca4844ef163ebf0df0fda6859ae920', 'lk@lk.pl', 'okii', 'okii'),
(11, 'poik', 'abc775f0b1bdce880185d3a6c1042ed7', 'po@po.po', 'poik', 'poik'),
(12, 'mlmlp', '68b8016ea7f5d48a5da241d6de64e4ce', 'kasimaru@kasimaru.fr', 'mlml', 'mlml'),
(13, 'okli', '20978b92c3954e90259cbd5afc3b55eb', 'okli@ok.ok', 'okli', 'okli'),
(14, 'okklm', 'e581f4d049a9563a2bb53b6b13f25ab3', 'ryoko15@hotmail.com', 'oklm', 'oklm'),
(15, 'oooo', 'ce7ce9108ae218e4ee612b0b36e3ed1d', 'oo@oo.oo', 'oooo', 'oooo'),
(16, 'oklm', 'sau/RE9B82xNU', 'oklm@ok.ok', 'oklm', 'oklm'),
(17, 'poiu', 'sevREdcjHJO5o', 'poi@po.po', 'poiu', 'poiu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
