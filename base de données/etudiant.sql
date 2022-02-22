-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 05 oct. 2021 à 16:07
-- Version du serveur :  8.0.21
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `etudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `preinscription`
--

DROP TABLE IF EXISTS `preinscription`;
CREATE TABLE IF NOT EXISTS `preinscription` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `annee` varchar(10) NOT NULL,
  `motivation` varchar(255) NOT NULL,
  `filiere` varchar(100) NOT NULL,
  `quartier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `preinscription`
--

INSERT INTO `preinscription` (`id`, `nom`, `prenom`, `email`, `telephone`, `serie`, `annee`, `motivation`, `filiere`, `quartier`) VALUES
(1, 'Traoré', 'Tidiane', 'pispadesign10@gmail.com', '0567890989', 'TSECO', '', 'BIEN', 'IG', ''),
(5, 'CISSE', 'Oumar', 'pispadesign9@gmail.com', '+22372461122', 'TSECO', '2017', 'J\'aime beaucoup cette filière.', 'Finance Comptabilité', 'Bamako');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
