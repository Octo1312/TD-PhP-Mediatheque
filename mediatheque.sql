-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 jan. 2026 à 08:58
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `fiche_film`
--

DROP TABLE IF EXISTS `fiche_film`;
CREATE TABLE IF NOT EXISTS `fiche_film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `realisateur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `duree` int NOT NULL,
  `synopsis` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiche_film`
--

INSERT INTO `fiche_film` (`id`, `titre`, `realisateur`, `genre`, `duree`, `synopsis`, `img_path`, `userid`) VALUES
(1, 'Jurassic park', 'Spielberg', 'Aventure', 120, 'Plongez dans l\'aventure', '', 0),
(3, 'Saw', 'Jackie Chan', 'Horreur', 90, 'Sanglant', '', 0),
(4, 'Pulp Fiction', 'Tarantino', 'Comédie', 110, 'Love', '', 0),
(6, 'Anaconda', 'Jack Black', 'Aventure', 120, 'Plongez dans l\'aventure', 'assets/img/img_695d147f9e5309.07358938.jpg', 16);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mdp`, `username`) VALUES
(1, 'Martin', 'Léo', '', ''),
(2, 'Brasiers ', 'Mylan', '', ''),
(6, 'Michel', 'Bajoue', '', ''),
(16, 'Octo', 'Uck', '$argon2i$v=19$m=65536,t=4,p=1$MS9HeWozNkRSUEZwcHFncg$ZdUSf7vT9NZP3gkKUehMWva5vPIYM8QR2F3Fx1jcyjI', 'Octo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
