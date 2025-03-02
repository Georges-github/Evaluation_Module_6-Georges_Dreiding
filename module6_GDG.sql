-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 02 mars 2025 à 20:48
-- Version du serveur : 10.3.39-MariaDB-0ubuntu0.20.04.2
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `module6_GDG`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cv` mediumtext NOT NULL DEFAULT 'CV de l\'étdudiant',
  `dt_naissance` date DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `dt_mise_a_jour` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `prenom`, `nom`, `email`, `cv`, `dt_naissance`, `isAdmin`, `dt_mise_a_jour`) VALUES
(1, 'Édith', 'Piaf', 'edith.piaf1925@email.com', 'CV de l\'étudiant.', '1915-12-19', 0, '2025-03-02 20:45:31'),
(2, 'Josephine', 'Baker', 'josephine.baker1925@email.com', 'CV de l\'étudiant', '1906-06-03', 0, '2025-02-20 10:10:23'),
(3, 'Charles', 'Trenet', 'charles.trenet1925@email.com', 'CV de l\'étudiant', '1913-05-18', 0, '2025-02-20 10:11:27'),
(4, 'Maurice', 'Chevalier', 'maurice.chevalier1925@email.com', 'CV de l\'étudiant', '1888-12-09', 0, '2025-02-20 10:12:29'),
(5, 'Georges', 'Brassens', 'georges.brassens1925@email.com', 'CV de l\'étudiant', '1921-10-22', 0, '2025-03-02 20:45:39'),
(6, 'Bing', 'Crosby', 'bing.crosby1925@email.com', 'CV de l\'étudiant', '1903-05-03', 0, '2025-02-20 10:16:54'),
(7, 'Louis', 'Armstrong', 'louis.armstrong1925@email.com', 'CV de l\'étudiant', '1901-08-04', 0, '2025-02-20 10:18:27'),
(8, 'Clara', 'Smith', 'clara.smith1925@email.com', 'CV de l\'étudiant', '1894-04-23', 0, '2025-02-20 10:19:33'),
(9, 'Jimmie', 'Rodgers', 'jimmie.rodgers1925@email.com', 'CV de l\'étudiant', '1897-09-08', 0, '2025-02-20 10:20:19'),
(10, 'Al', 'Jolson', 'al.jolson1925@email.com', 'CV de l\'étudiant', '1886-05-26', 0, '2025-02-20 10:21:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
