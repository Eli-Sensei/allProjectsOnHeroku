-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 oct. 2020 à 10:10
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
-- Structure de la table `tbl_article`
--

CREATE TABLE `tbl_article` (
  `id_art` int(10) UNSIGNED NOT NULL,
  `id_cat` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `published` tinyint(4) NOT NULL DEFAULT 1,
  `id_author` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_article`
--

INSERT INTO `tbl_article` (`id_art`, `id_cat`, `title`, `content`, `created_at`, `published`, `id_author`) VALUES
(7, 1, 'sek', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consequatur debitis, deleniti dolor dolorem doloremque eius error iste laudantium officiis provident sapiente unde voluptate! Debitis eius numquam officia quae ut. Porro reprehenderit saepe vero voluptatum! A aperiam asperiores atque deserunt distinctio ea et eveniet expedita facere harum ipsum magnam mollitia optio pariatur perferendis possimus quia quibusdam quos, unde voluptate voluptatum? Accusantium aliquid beatae blanditiis corporis cupiditate delectus earum ex exercitationem facilis fuga id labore laboriosam, laudantium magnam non obcaecati, officiis optio perspiciatis, quasi quod recusandae ullam vel voluptates voluptatibus voluptatum. Adipisci aliquid ea esse explicabo magni voluptatum? Amet aspernatur corporis cum doloribus ex ipsum iste minus molestiae quisquam velit! Blanditiis dignissimos facere fuga fugiat harum itaque magni quae tempore voluptatibus.', '2020-09-24 08:07:31', 1, 1),
(8, 2, 'Korn', 'yee', '2020-09-24 08:19:30', 1, 1),
(11, 2, 'hthththththththt', 'tth', '2020-09-30 13:14:18', 1, 1),
(13, 2, 'GRRROROO TEST', 'ereteetetee', '2020-10-01 07:33:30', 1, 1),
(14, 1, 'nopnopnopnopn', 'rgrgrgr', '2020-10-01 07:35:04', 1, 1),
(15, 1, 'Slipkno', 'Wallah c trop bien', '2020-10-01 07:38:30', 1, 3),
(19, 1, 'test', 'yes', '2020-10-01 08:11:09', 1, 1),
(20, 1, 'salut', '&lt;script&gt; alert(123) &lt;/script&gt;', '2020-10-01 09:21:57', 1, 1),
(27, 2, 'ouioui', 'oououuouououou', '2020-10-01 09:52:13', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_authors`
--

CREATE TABLE `tbl_authors` (
  `id_author` int(10) UNSIGNED NOT NULL,
  `name_author` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `citizenship` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_authors`
--

INSERT INTO `tbl_authors` (`id_author`, `name_author`, `birthdate`, `citizenship`) VALUES
(1, 'Jack Lecomte', '2003-03-12', 'Versailles'),
(3, 'Jean Couscous', '1980-09-12', 'Norway');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_cat` int(11) UNSIGNED NOT NULL,
  `name_cat` char(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_category`
--

INSERT INTO `tbl_category` (`id_cat`, `name_cat`) VALUES
(2, 'musique'),
(1, 'sports');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id_comment` int(10) UNSIGNED NOT NULL,
  `pseudo` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_art` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id_comment`, `pseudo`, `text`, `created_at`, `id_art`) VALUES
(4, 'zeb', 'c nul', '2020-09-25 09:23:42', 8),
(5, 'nique', 'ta mere', '2020-09-25 09:35:25', 7),
(47, 'ok', '&lt;script&gt;alert(123) &lt;/script&gt;', '2020-09-30 12:17:09', 8),
(48, 'ok', '&lt;script&gt;alert(123) &lt;/script&gt;', '2020-09-30 12:20:53', 8),
(49, 'TouKhen', 'yea', '2020-09-30 12:56:16', 8),
(50, 'TouKTouK', 'salut', '2020-10-01 09:24:25', 20);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `email`, `password`, `active`, `created_at`, `avatar`) VALUES
(2, 'j@j.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1, '0000-00-00', ''),
(3, 'k@k.com', '1bfbdf35b1359fc6b6f93893874cf23a50293de5', 1, '2020-09-23', 'http://www.google.com'),
(5, 'jack.lecomtes@gmail.com', 'ba1d3fc34dafb56083b8e27e38c209fc94ae7b8e', 1, '2020-09-25', 'http://www.google.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `fk_id_cat` (`id_cat`),
  ADD KEY `fk_id_author` (`id_author`);

--
-- Index pour la table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  ADD PRIMARY KEY (`id_author`);

--
-- Index pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `name_cat` (`name_cat`);

--
-- Index pour la table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_id_art` (`id_art`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_article`
--
ALTER TABLE `tbl_article`
  MODIFY `id_art` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  MODIFY `id_author` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_cat` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id_comment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD CONSTRAINT `fk_id_author` FOREIGN KEY (`id_author`) REFERENCES `tbl_authors` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `tbl_category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `fk_id_art` FOREIGN KEY (`id_art`) REFERENCES `tbl_article` (`id_art`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
