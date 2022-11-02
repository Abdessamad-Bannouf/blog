-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 02 nov. 2022 à 18:46
-- Version du serveur : 8.0.23
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE IF NOT EXISTS `commentary` (
  `commentary_id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `is_valid` tinyint NOT NULL,
  PRIMARY KEY (`commentary_id`),
  KEY `user.user_id_idx` (`user_id`),
  KEY `post.post_id_idx` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`commentary_id`, `content`, `date`, `user_id`, `post_id`, `is_valid`) VALUES
(128, 'com', '2022-10-29', 29, 120, 1),
(130, 'test', '2022-10-29', 29, 120, 0);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `chapo` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post.author_idx` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`post_id`, `title`, `chapo`, `image`, `content`, `author`, `date`) VALUES
(120, 'totoo', 'tataa', 'image_un.jpg', 'titii', 29, '2022-10-29');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  `isAdmin` tinyint NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `lastName`, `firstName`, `mail`, `password`, `token`, `isAdmin`) VALUES
(29, 'Bannouf', 'Abdessamad', 'abdessamad.bannouf@laposte.net', '$2y$10$RoglVhUU7dHT8ZpTRJftIeoRXmHUI4CBSjiLhOZK3XBtmzsIfw4kW', 'NULL', 1),
(77, 'Admin', 'Admin', 'admin@test.com', '$2y$10$5XVQMwQapT1SaBInHqzrCuFxrttYkouHMhqLUrg/78SF0wF.bMzlK', 'NULL', 1),
(78, 'User', 'User', 'user@test.com', '$2y$10$xQaCgBh.wUeKSiFBzUCD9.5b7/yYpY4DGrtDeuUaHd7nIp6QwcH9.', 'NULL', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `post.post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `user.user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post.author` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
