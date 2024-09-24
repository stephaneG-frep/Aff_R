-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 24 sep. 2024 à 09:43
-- Version du serveur : 5.7.24
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aff_r`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`) VALUES
(1, 'Voyage', 'bi-luggage-fill'),
(2, 'Travail', 'bi-person-workspace'),
(3, 'Courses', 'bi-cart-check'),
(4, 'Emails', 'bi bi-at'),
(5, 'Ecole', 'bi bi-backpack4-fill'),
(6, 'Réveil', 'bi bi-alarm'),
(7, 'Prendre RDV', 'bi bi-alarm-fill'),
(8, 'Anniversaires', 'bi bi-cake2'),
(9, 'Renouvellements', 'bi bi-arrow-counterclockwise'),
(10, 'Annulations', 'bi bi-backspace-reverse'),
(11, 'Soins', 'bi bi-bandaid-fill'),
(12, 'Recharger', 'bi bi-battery-charging'),
(13, 'Sport', 'bi bi-bicycle'),
(14, 'Colis', 'bi bi-box-fill'),
(15, 'Poubelles', 'bi bi-trash3-fill'),
(16, 'Loyer', 'bi bi-card-headin'),
(17, 'Enregistrements (tv,podcasts,...)', 'bi bi-cassette-fil'),
(18, 'Factures', 'bi bi-envelope-check-fill'),
(19, 'Bricolages', 'bi bi-wrench-adjustable'),
(20, 'Mises a jours', 'bi bi-windows'),
(21, 'Répondre, écrire a..', 'bi bi-vector-pen'),
(22, 'Week-end, balades', 'bi bi-tree-fill'),
(23, 'Horaires (trains,avions, ...)', 'bi bi-train-front-fill'),
(24, 'Cinéma', 'bi bi-ticket-perforated-fill'),
(25, 'Téléphoner', 'bi bi-telephone-outbound'),
(26, 'Pizzas, resto', 'bi bi-shop-window'),
(27, 'Imprimer', 'bi bi-printer-fill'),
(28, 'Banque', 'bi bi-piggy-bank-fill'),
(29, 'Etudes', 'bi bi-mortarboard-fill'),
(30, 'Courrier', 'bi bi-mailbox-flag'),
(31, 'Essence', 'bi bi-fuel-pump-diesel-fill'),
(32, 'Chauffage', 'bi bi-fire'),
(33, 'Lessive', 'bi bi-fan'),
(34, 'Gouters', 'bi bi-emoji-grin-fill'),
(35, 'Ménage, nettoyage', 'bi bi-bucket-fill');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `list_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id`, `name`, `status`, `list_id`) VALUES
(1, 'Préparer l\'itinéraire avec le guide du routare', 0, 1),
(2, 'Préparer le sac', 0, 1),
(3, 'regarder les cours 6,7,8..', 1, 6),
(4, 'test1', 1, 1),
(5, 'le jeudi', 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `list`
--

CREATE TABLE `list` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `list`
--

INSERT INTO `list` (`id`, `title`, `user_id`, `category_id`) VALUES
(1, 'Voyage en italie', 1, 1),
(2, 'Voyage a rome', 1, 1),
(3, 'Faire le code php du site ', 1, 2),
(5, 'Faire des courses', 1, 3),
(6, 'Session 6,7 et 8 PHP', 1, 2),
(7, 'Une semaine a Cabourg', 1, 1),
(8, 'Session 6,7 et 8 PHP et JS', 1, 2),
(9, 'Session 6,7 et 8 PHP', 1, 2),
(10, 'sortir les poubelles verte', 10, 15);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nickname`, `email`, `password`, `token`) VALUES
(1, 'John_Doe', 'exemple@yahoo.fr', '$2y$10$G/5.9ruh2mwPIs4RbEcJVudGUbCW5T6H6P5RGRRudpbmp0SOW9hCK', NULL),
(4, 'tataouine', 'exemple@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', NULL),
(5, 'choubacka', 'etoiledelamort@jedi.fr', '21232f297a57a5a743894a0e4a801fc3', NULL),
(6, 'yoda-da', 'yoda.jedi@laforce.com', '21232f297a57a5a743894a0e4a801fc3', NULL),
(7, 'homer', 'homer@homer.com', '21232f297a57a5a743894a0e4a801fc3', NULL),
(9, 'jesapelgroud', 'jesapelgroud@exemple.com', '$2y$10$dH.FpO/.CwzvCsCII9iId.qGtxkQI.oPPdKrp84GZuYIvFLJVgn5q', NULL),
(10, 'stephane gaillet', 'hoopscmoi@gmail.com', '$2y$10$fX/HykEPzxrVP9pcCG75m.2KMJs9kbxb1dcIHZoiyj8xRmpBqQ0JC', NULL),
(11, 'stephane gaillet', 'weshsteff@yahoo.fr', '$2y$10$FhnM1KWgiZoWOj5482kfHe/U/4eRHNP.azdJ1.i/4cT3PeIPCJ/TO', NULL),
(14, 'marge', 'margesims@gmail.com', '$2y$10$tipBH2jmHtwMaK8jMHFBD.Vu26vJglr60DF9Jz8uRZZQOcDSrfl8.', NULL),
(15, 'misterT', 'mister@T.com', '$2y$10$yZAeGkXjCbPqiCTPJfEcyetmbZ60at7bmnxeQ.8rl8Yg9uh/7AJNi', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_ibfk_1` (`list_id`);

--
-- Index pour la table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_ibfk_1` (`category_id`),
  ADD KEY `list_ibfk_2` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
