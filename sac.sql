-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 mars 2023 à 15:16
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

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
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mychapters`
--

INSERT INTO `mychapters` (`id`, `title`, `parent`, `fullname`, `modified`) VALUES
(5, 'caca', 'tregrfre_design', 'tregrfre_design__caca', '2023-03-19'),
(6, 'caca', 'tregrfre_design', 'tregrfre_design__caca', '2023-03-19'),
(7, 'rzezr', 'tregrfre_design', 'tregrfre_design__rzezr', '2023-03-19'),
(8, 'rzezr', 'tregrfre_design', 'tregrfre_design__rzezr', '2023-03-19'),
(9, 'caca', 'tregrfre_design', 'tregrfre_design__caca', '2023-03-19'),
(10, 'crotte', 'tregrfre_design', 'tregrfre_design__crotte', '2023-03-19'),
(11, 'dzd', 'tregrfre_design', 'tregrfre_design__dzd', '2023-03-19'),
(12, 'pourqoui', 'tregrfre_design', 'tregrfre_design__pourqoui', '2023-03-19');

-- --------------------------------------------------------

--
-- Structure de la table `mydocuments`
--

CREATE TABLE `mydocuments` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `parent` varchar(63) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mydocuments`
--

INSERT INTO `mydocuments` (`id`, `title`, `parent`, `fullname`, `modified`) VALUES
(1, 'zte', 'tregrfre_design__caca', 'tregrfre_design__caca__zte', '2023-03-19'),
(2, 'tertre', 'tregrfre_design__caca', 'tregrfre_design__caca__tertre', '2023-03-19'),
(3, 'dedzedz', 'tregrfre_design__caca', 'tregrfre_design__caca__dedzedz', '2023-03-19'),
(4, 'dedzedz', 'tregrfre_design__crotte', 'tregrfre_design__crotte__dedzedz', '2023-03-19'),
(5, 'zte', 'tregrfre_design__crotte', 'tregrfre_design__crotte__zte', '2023-03-19'),
(6, 'zte', 'tregrfre_design__crotte', 'tregrfre_design__crotte__zte', '2023-03-19');

-- --------------------------------------------------------

--
-- Structure de la table `myexams`
--

CREATE TABLE `myexams` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `parent` varchar(63) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `myexams`
--

INSERT INTO `myexams` (`id`, `title`, `parent`, `fullname`, `modified`) VALUES
(7, 'ddd', 'tregrfre_design', 'tregrfre_design__ddd', '2023-03-19'),
(8, 'ddd', 'tregrfre_design', 'tregrfre_design__ddd', '2023-03-19'),
(11, '', '', '__', '2023-03-19'),
(12, '', '', '__', '2023-03-19'),
(13, 'salut', 'tregrfre_design', 'tregrfre_design__salut', '2023-03-19'),
(14, 'salut', 'tregrfre_design', 'tregrfre_design__salut', '2023-03-19'),
(15, 'efzefezfz', 'tregrfre_design', 'tregrfre_design__efzefezfz', '2023-03-19'),
(16, 'efzefezfz', 'tregrfre_design', 'tregrfre_design__efzefezfz', '2023-03-19'),
(17, 'bébou', 'tregrfre_design', 'tregrfre_design__bébou', '2023-03-19'),
(18, 'bébou', 'tregrfre_design', 'tregrfre_design__bébou', '2023-03-19'),
(19, 'benzema', 'tregrfre_design', 'tregrfre_design__benzema', '2023-03-19'),
(20, 'medium', 'tregrfre_design', 'tregrfre_design__medium', '2023-03-19');

-- --------------------------------------------------------

--
-- Structure de la table `mylayers`
--

CREATE TABLE `mylayers` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `parent` varchar(63) NOT NULL,
  `fullname` varchar(63) NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mylayers`
--

INSERT INTO `mylayers` (`id`, `title`, `parent`, `fullname`, `modified`) VALUES
(1, 'design', 'tregrfre', 'tregrfre_design', '2023-03-19'),
(2, 'dev', 'tregrfre', 'tregrfre_dev', '2023-03-19'),
(3, 'leanstartup', 'tregrfre', 'tregrfre_leanstartup', '2023-03-19'),
(4, 'suivis', 'tregrfre', 'tregrfre_suivis', '2023-03-19'),
(5, 'design2', 'tregrfre', 'tregrfre_design2', '2023-03-19');

-- --------------------------------------------------------

--
-- Structure de la table `mynotes`
--

CREATE TABLE `mynotes` (
  `id` int(11) NOT NULL,
  `title` varchar(63) NOT NULL,
  `content` varchar(255) NOT NULL,
  `parent` varchar(63) NOT NULL,
  `creation` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mynotes`
--

INSERT INTO `mynotes` (`id`, `title`, `content`, `parent`, `creation`, `modified`) VALUES
(3, 'llmlmlmlmlm', 'lmlmlmlmlmlmlm', 'tregrfre_design__caca__zte', '2023-03-19', '2023-03-19'),
(4, 'zdzedzz', 'lmlmlmlmlmlmlm', 'tregrfre_design__caca__zte', '2023-03-19', '2023-03-19');

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
(1, 'tregrfre', 'geeregrgreg', 0, '2023-03-17', '2023-03-17'),
(2, 'learn MySQL', 'je dois apprendre MySQL', 0, '2023-03-17', '2023-03-17'),
(3, 'learn MySQL', '', 0, '2023-03-20', '2023-03-20'),
(4, 'learn MySQL', '', 0, '2023-03-20', '2023-03-20');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `mydocuments`
--
ALTER TABLE `mydocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `myexams`
--
ALTER TABLE `myexams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `mylayers`
--
ALTER TABLE `mylayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `mynotes`
--
ALTER TABLE `mynotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `myprojects`
--
ALTER TABLE `myprojects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
