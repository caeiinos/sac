-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 27 mars 2023 à 10:48
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sac`
--

-- --------------------------------------------------------

--
-- Structure de la table `mychapters`
--

CREATE TABLE `mychapters` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `parent` varchar(63) NOT NULL,
  `fullname` varchar(63) NOT NULL,
  `modified` date NOT NULL,
  `base` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mychapters`
--

INSERT INTO `mychapters` (`id`, `title`, `parent`, `fullname`, `modified`, `base`) VALUES
(13, 'un chapitre', 'un projet_Une intercalaire', 'un projet_Une intercalaire__un chapitre', '2023-03-22', 'un projet');

-- --------------------------------------------------------

--
-- Structure de la table `mydocuments`
--

CREATE TABLE `mydocuments` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `parent` varchar(63) NOT NULL,
  `fullname` varchar(1023) NOT NULL,
  `modified` date NOT NULL,
  `base` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mydocuments`
--

INSERT INTO `mydocuments` (`id`, `title`, `parent`, `fullname`, `modified`, `base`) VALUES
(7, 'un document dans un chapitre', 'un projet_Une intercalaire__un chapitre', 'un projet_Une intercalaire__un chapitre__un document dans un chapitre', '2023-03-22', 'un projet');

-- --------------------------------------------------------

--
-- Structure de la table `myexams`
--

CREATE TABLE `myexams` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `parent` varchar(63) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `modified` date NOT NULL,
  `base` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `myexams`
--

INSERT INTO `myexams` (`id`, `title`, `parent`, `fullname`, `modified`, `base`) VALUES
(21, 'un document dans une intercalaire', 'un projet_Une intercalaire', 'un projet_Une intercalaire__un document dans une intercalaire', '2023-03-22', 'un projet'),
(22, 'le futur', 'un projet_Une intercalaire', 'un projet_Une intercalaire__le futur', '2023-03-22', 'un projet');

-- --------------------------------------------------------

--
-- Structure de la table `mylayers`
--

CREATE TABLE `mylayers` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `parent` varchar(63) NOT NULL,
  `fullname` varchar(63) NOT NULL,
  `modified` date NOT NULL,
  `base` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mylayers`
--

INSERT INTO `mylayers` (`id`, `title`, `parent`, `fullname`, `modified`, `base`) VALUES
(6, 'Une intercalaire', 'un projet', 'un projet_Une intercalaire', '2023-03-22', 'un projet'),
(7, 'design', 'un projet', 'un projet_design', '2023-03-22', 'un projet'),
(11, 'dev', 'un projet', 'un projet_dev', '2023-03-22', 'un projet');

-- --------------------------------------------------------

--
-- Structure de la table `mynotes`
--

CREATE TABLE `mynotes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1023) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `creation` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mynotes`
--

INSERT INTO `mynotes` (`id`, `title`, `content`, `parent`, `creation`, `modified`) VALUES
(12, 'une note', 'Ici ce sont les notes ', 'un projet_Une intercalaire__un chapitre__un document dans un chapitre', '2023-03-22', '2023-03-22'),
(13, 'image mentale', 'Tout le projet est basé sur une image mentale le concept du sac décole est utilisé pour un gestionnaire de projet', 'un projet_Une intercalaire__un chapitre__un document dans un chapitre', '2023-03-22', '2023-03-22'),
(16, 'longlet explorer', 'longlet explorer sera fait pour naviquer dans le projet actif', 'un projet_Une intercalaire__le futur', '2023-03-22', '2023-03-22'),
(17, 'la nav', 'il y a plein de fonctionnalitées ou de moyen de tri que je dois ajouter', 'un projet_Une intercalaire__le futur', '2023-03-22', '2023-03-22');

-- --------------------------------------------------------

--
-- Structure de la table `myprojects`
--

CREATE TABLE `myprojects` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `description` varchar(255) NOT NULL,
  `favorite` tinyint(1) NOT NULL,
  `creation` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `myprojects`
--

INSERT INTO `myprojects` (`id`, `title`, `description`, `favorite`, `creation`, `modified`) VALUES
(19, 'un projet', 'ceci est un projet dans lequel je vais te montrer comment utiliser SAC !!! PAS de GUILLEMETS ça bug et je nai pas eu le temps de regarder pourquoi', 0, '2023-03-22', '2023-03-22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mychapters`
--
ALTER TABLE `mychapters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mydocuments`
--
ALTER TABLE `mydocuments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `myexams`
--
ALTER TABLE `myexams`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mylayers`
--
ALTER TABLE `mylayers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mynotes`
--
ALTER TABLE `mynotes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `myprojects`
--
ALTER TABLE `myprojects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mychapters`
--
ALTER TABLE `mychapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `mydocuments`
--
ALTER TABLE `mydocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `myexams`
--
ALTER TABLE `myexams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `mylayers`
--
ALTER TABLE `mylayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `mynotes`
--
ALTER TABLE `mynotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `myprojects`
--
ALTER TABLE `myprojects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
