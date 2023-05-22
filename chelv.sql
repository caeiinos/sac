-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 mai 2023 à 19:20
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
-- Base de données : `chelv`
--

-- --------------------------------------------------------

--
-- Structure de la table `chelv__binders`
--

CREATE TABLE `chelv__binders` (
  `binder__id` int(63) NOT NULL,
  `binder__name` varchar(255) NOT NULL,
  `binder__description` text NOT NULL,
  `binder__owner` int(63) NOT NULL,
  `binder__creation` datetime NOT NULL,
  `binder__opened` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `explorer__base` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chelv__binders`
--

INSERT INTO `chelv__binders` (`binder__id`, `binder__name`, `binder__description`, `binder__owner`, `binder__creation`, `binder__opened`, `explorer__base`) VALUES
(3, 'learn Mysql', 'je dois apprendre mysql', 2, '2023-05-01 21:15:14', '2023-05-04 12:46:04', 3);

-- --------------------------------------------------------

--
-- Structure de la table `chelv__chapters`
--

CREATE TABLE `chelv__chapters` (
  `chapter__id` int(63) NOT NULL,
  `chapter__name` varchar(255) NOT NULL,
  `chapter__binder` varchar(255) NOT NULL,
  `chapter__layer` varchar(255) NOT NULL,
  `chapter__owner` int(63) NOT NULL,
  `chapter__creation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `chapter__opened` datetime NOT NULL,
  `explorer__base` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chelv__chapters`
--

INSERT INTO `chelv__chapters` (`chapter__id`, `chapter__name`, `chapter__binder`, `chapter__layer`, `chapter__owner`, `chapter__creation`, `chapter__opened`, `explorer__base`) VALUES
(1, 'apprentissage', '3', '1', 2, '2023-05-04 11:02:23', '2023-05-04 10:07:07', 3);

-- --------------------------------------------------------

--
-- Structure de la table `chelv__documents`
--

CREATE TABLE `chelv__documents` (
  `document__id` int(63) NOT NULL,
  `document__name` varchar(255) NOT NULL,
  `document__version` varchar(255) NOT NULL DEFAULT 'default',
  `document__binder` varchar(255) NOT NULL,
  `document__layer` varchar(255) NOT NULL,
  `document__haschapter` tinyint(1) NOT NULL,
  `document__chapter` varchar(255) NOT NULL,
  `document__owner` int(63) NOT NULL,
  `document__creation` datetime NOT NULL,
  `document__opened` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `explorer__base` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chelv__documents`
--

INSERT INTO `chelv__documents` (`document__id`, `document__name`, `document__version`, `document__binder`, `document__layer`, `document__haschapter`, `document__chapter`, `document__owner`, `document__creation`, `document__opened`, `explorer__base`) VALUES
(1, 'chelv sql', 'default', '3', '1', 0, '', 2, '2023-05-04 10:29:57', '2023-05-04 11:03:34', 3),
(2, 'w3school', 'default', '3', '1', 1, '1', 2, '2023-05-04 10:50:07', '2023-05-04 11:03:38', 3);

-- --------------------------------------------------------

--
-- Structure de la table `chelv__layers`
--

CREATE TABLE `chelv__layers` (
  `layer__id` int(63) NOT NULL,
  `layer__name` varchar(255) NOT NULL,
  `layer__binder` varchar(255) NOT NULL,
  `layer__owner` int(63) NOT NULL,
  `layer__creation` datetime NOT NULL,
  `layer__opened` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `explorer__base` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chelv__layers`
--

INSERT INTO `chelv__layers` (`layer__id`, `layer__name`, `layer__binder`, `layer__owner`, `layer__creation`, `layer__opened`, `explorer__base`) VALUES
(1, 'tutoriel', '3', 2, '2023-05-02 15:05:25', '2023-05-04 11:03:58', 3);

-- --------------------------------------------------------

--
-- Structure de la table `chelv__notes`
--

CREATE TABLE `chelv__notes` (
  `note__id` int(63) NOT NULL,
  `note__name` varchar(255) NOT NULL,
  `note__description` text NOT NULL,
  `note__document` varchar(255) NOT NULL,
  `note__owner` int(63) NOT NULL,
  `note__creation` datetime NOT NULL,
  `note__opened` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chelv__notes`
--

INSERT INTO `chelv__notes` (`note__id`, `note__name`, `note__description`, `note__document`, `note__owner`, `note__creation`, `note__opened`) VALUES
(2, 'google sheet', 'j\'ai fait un google sheet pour résumé ce que j\'ai appris sur w3school', '2', 2, '2023-05-04 11:50:25', '2023-05-04 09:50:25'),
(3, 'google sheet', 'j\'ai fait un google sheet pour résumé ce que j\'ai appris sur w3school', '2', 2, '2023-05-04 11:51:26', '2023-05-04 09:51:26');

-- --------------------------------------------------------

--
-- Structure de la table `chelv__users`
--

CREATE TABLE `chelv__users` (
  `user__id` int(63) NOT NULL,
  `user__name` varchar(255) NOT NULL,
  `user__email` varchar(255) NOT NULL,
  `user__password` text NOT NULL,
  `user__creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chelv__users`
--

INSERT INTO `chelv__users` (`user__id`, `user__name`, `user__email`, `user__password`, `user__creation`) VALUES
(2, 'Tyranno', 'jeanderoy2001@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2023-05-01 18:46:11'),
(3, 'test', 'test@test.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2023-05-01 18:52:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chelv__binders`
--
ALTER TABLE `chelv__binders`
  ADD PRIMARY KEY (`binder__id`),
  ADD UNIQUE KEY `binder__name` (`binder__name`);

--
-- Index pour la table `chelv__chapters`
--
ALTER TABLE `chelv__chapters`
  ADD PRIMARY KEY (`chapter__id`),
  ADD UNIQUE KEY `UNIQUE` (`chapter__name`);

--
-- Index pour la table `chelv__documents`
--
ALTER TABLE `chelv__documents`
  ADD PRIMARY KEY (`document__id`),
  ADD UNIQUE KEY `document__name` (`document__name`);

--
-- Index pour la table `chelv__layers`
--
ALTER TABLE `chelv__layers`
  ADD PRIMARY KEY (`layer__id`),
  ADD UNIQUE KEY `layer__name` (`layer__name`);

--
-- Index pour la table `chelv__notes`
--
ALTER TABLE `chelv__notes`
  ADD PRIMARY KEY (`note__id`);

--
-- Index pour la table `chelv__users`
--
ALTER TABLE `chelv__users`
  ADD PRIMARY KEY (`user__id`),
  ADD UNIQUE KEY `user__name` (`user__name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chelv__binders`
--
ALTER TABLE `chelv__binders`
  MODIFY `binder__id` int(63) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `chelv__chapters`
--
ALTER TABLE `chelv__chapters`
  MODIFY `chapter__id` int(63) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `chelv__documents`
--
ALTER TABLE `chelv__documents`
  MODIFY `document__id` int(63) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `chelv__layers`
--
ALTER TABLE `chelv__layers`
  MODIFY `layer__id` int(63) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `chelv__notes`
--
ALTER TABLE `chelv__notes`
  MODIFY `note__id` int(63) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `chelv__users`
--
ALTER TABLE `chelv__users`
  MODIFY `user__id` int(63) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
