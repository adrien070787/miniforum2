-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 20 Novembre 2018 à 16:00
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `miniforum2`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `comment` text NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `answer`
--

INSERT INTO `answer` (`id`, `date`, `comment`, `id_subject`, `id_member`) VALUES
(1, '2018-11-17 11:00:00', 'Super j''adore le Python', 2, 2),
(2, '2018-11-18 13:00:00', 'Ok c''est très bien alors', 2, 1),
(3, '2018-11-19 14:49:29', 'Test', 2, 3),
(4, '2018-11-19 14:49:46', 'aaaaa', 2, 1),
(5, '2018-11-19 14:50:33', 'testttt', 2, 3),
(6, '2018-11-19 14:51:19', 'aaa', 2, 3),
(9, '2018-11-19 14:53:14', 'test\r\nzzzz\r\nzzzz', 1, 2),
(10, '2018-11-19 14:54:37', 'salut<br />\r\nzzzz<br />\r\neeee<br />\r\nttt', 1, 2),
(11, '2018-11-20 14:21:56', 'ee<br />\r\nee', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profil_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`id`, `name`, `firstname`, `login`, `password`, `profil_pic`) VALUES
(1, 'REBIBO', 'Adrien', 'adrien', 'adrien', 'profil.png'),
(2, 'HADIDA', 'Rudy', 'rudy', 'rudy', 'toto.png');

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE `subject` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `question` text NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `subject`
--

INSERT INTO `subject` (`id`, `title`, `date`, `question`, `id_member`) VALUES
(1, 'Cours sur PHP', '2018-11-06 14:00:00', 'Vous trouverez ici le fil de discussion pour les cours de PHP', 1),
(2, 'Cours sur Python', '2018-11-09 10:15:00', 'Vous trouverez ici le fil de discussion pour les cours de Python', 1),
(3, 'Autre sujet', '2018-11-21 00:00:00', 'Voici ma question', 1),
(4, 'Test Adrien', '2018-11-20 14:21:31', 'Bonjour\r\nsss', 1),
(5, 'qzzzz', '2018-11-20 14:22:05', 'ddd<br />\r\nfff', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
