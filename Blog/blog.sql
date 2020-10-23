-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 oct. 2020 à 14:30
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_article`
--

CREATE TABLE `table_article` (
  `id_art` int(10) UNSIGNED NOT NULL,
  `id_cat` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `id_author` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `table_article`
--

INSERT INTO `table_article` (`id_art`, `id_cat`, `title`, `content_text`, `created_at`, `published`, `id_author`) VALUES
(2, 4, 'Le Beau Jack', 'Mechant d\'un jeu', '2020-09-24 08:10:26', 1, 1),
(3, 4, 'Artcile de test', 'Rien ici prout', '2020-09-24 08:10:26', 0, 1),
(4, 3, 'FOOT', 'football c pas ouf', '2020-09-24 09:11:43', 1, 1),
(6, 3, 'Le saviez Vous ? poisson', 'Il existe un poisson farceur appelé :\r\n\r\n\"poisson clown\", il a la capacité spécial de faire rire les autre poisson, c\'est extraordinaire,\r\n\r\n\r\nGayyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', '2020-09-24 14:37:43', 1, 1),
(7, 6, 'MEGA PET', 'KILO MEGA GIGA TERA PETA\r\n\r\npet flatulence gaz prout', '2020-09-24 14:59:19', 1, 1),
(8, 8, 'Fleure Noire', 'Bonjour je suis Pissenlipe, et je viens vous parlez de la fleure noire que j\'ai trouvé dans mon jardin ce week-end :0 ', '2020-09-24 15:01:50', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `table_authors`
--

CREATE TABLE `table_authors` (
  `id_author` int(10) UNSIGNED NOT NULL,
  `name_author` char(20) NOT NULL,
  `birthdate` date NOT NULL,
  `citizenship` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `table_authors`
--

INSERT INTO `table_authors` (`id_author`, `name_author`, `birthdate`, `citizenship`) VALUES
(1, 'MrsBean', '2020-09-01', 'Melun'),
(2, 'Pissenlipe', '2020-07-04', 'Lieux-Saint');

-- --------------------------------------------------------

--
-- Structure de la table `table_category`
--

CREATE TABLE `table_category` (
  `id_cat` int(10) UNSIGNED NOT NULL,
  `name_cat` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `table_category`
--

INSERT INTO `table_category` (`id_cat`, `name_cat`) VALUES
(1, 'anime'),
(7, 'Informatique'),
(5, 'Insolite'),
(4, 'Jeux'),
(8, 'Nature'),
(3, 'sport'),
(6, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `table_comments`
--

CREATE TABLE `table_comments` (
  `id_comment` int(10) UNSIGNED NOT NULL,
  `id_art` int(10) UNSIGNED NOT NULL,
  `pseudo` char(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `table_comments`
--

INSERT INTO `table_comments` (`id_comment`, `id_art`, `pseudo`, `text`, `created_at`) VALUES
(5, 6, 'L\'homme au premier com', 'PROUT PROUT PROUT ', '2020-09-30 07:33:13'),
(6, 6, '2EME HOMME', 'TESTE DU TESTE TESTIF', '2020-09-30 07:33:13'),
(7, 6, 'L\'homme au premier com', 'PROUT PROUT PROUT ', '2020-09-30 07:34:22'),
(8, 6, '2EME HOMME', 'TESTE DU TESTE TESTIF', '2020-09-30 07:34:22'),
(9, 6, 'Mathias', 'ZE BEE LA MOUCHE', '2020-09-30 08:03:50'),
(10, 7, 'CACA', 'rererere', '2020-09-30 08:14:28'),
(11, 7, 'PETTTTTTTTTTt', 'LOOOOOOOOOOOOOOOOOOOO', '2020-09-30 08:14:41'),
(12, 7, 'PETTTTTTTTTTt', 'LOOOOOOOOOOOOOOOOOOOO', '2020-09-30 08:17:03'),
(13, 7, 'PETTTTTTTTTTt', 'LOOOOOOOOOOOOOOOOOOOO', '2020-09-30 08:18:10'),
(14, 7, 'XxDARKxX', 'noob', '2020-09-30 08:19:00');

-- --------------------------------------------------------

--
-- Structure de la table `table_users`
--

CREATE TABLE `table_users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `table_users`
--

INSERT INTO `table_users` (`id_user`, `email`, `password`, `active`, `created_at`, `avatar`) VALUES
(1, 'Thomas@gmail.com', 'Thomas', 1, '2020-09-21 11:58:56', 'https://logos.flamingtext.com/Name-Logos/Thomas-design-amped-name.webp'),
(2, 'mepereiradebarros@edenschool.fr', 'a16358be6e2306b153b1f071477e68837266075e', 1, '2020-09-23 14:04:34', 'http://www.google.fr'),
(4, 'mepereiradebarros@caca', '5683b32d9da3fe83cef1e284dc210e768d02b7cf', 1, '2020-09-23 14:05:06', 'http://www.google.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `table_article`
--
ALTER TABLE `table_article`
  ADD PRIMARY KEY (`id_art`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `fk_id_cat` (`id_cat`),
  ADD KEY `fk_id_author` (`id_author`);

--
-- Index pour la table `table_authors`
--
ALTER TABLE `table_authors`
  ADD PRIMARY KEY (`id_author`);

--
-- Index pour la table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `name_cat` (`name_cat`);

--
-- Index pour la table `table_comments`
--
ALTER TABLE `table_comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_id_art` (`id_art`);

--
-- Index pour la table `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `table_article`
--
ALTER TABLE `table_article`
  MODIFY `id_art` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `table_authors`
--
ALTER TABLE `table_authors`
  MODIFY `id_author` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `id_cat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `table_comments`
--
ALTER TABLE `table_comments`
  MODIFY `id_comment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `table_users`
--
ALTER TABLE `table_users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `table_article`
--
ALTER TABLE `table_article`
  ADD CONSTRAINT `fk_id_author` FOREIGN KEY (`id_author`) REFERENCES `table_authors` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `table_category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `table_comments`
--
ALTER TABLE `table_comments`
  ADD CONSTRAINT `fk_id_art` FOREIGN KEY (`id_art`) REFERENCES `table_article` (`id_art`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
