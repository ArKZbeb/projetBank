-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 20 jan. 2023 à 19:23
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zebank`
--

-- --------------------------------------------------------

--
-- Structure de la table `bankaccount`
--

CREATE TABLE `bankaccount` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `somme_compte_cheque` int(11) DEFAULT NULL,
  `somme_compte_livretA` int(11) DEFAULT NULL,
  `somme_compte_zebitcoin` int(11) DEFAULT NULL,
  `somme_compte_bitcoin` int(11) DEFAULT NULL,
  `somme_compte_eth` int(11) DEFAULT NULL,
  `compte_euro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bankaccount`
--

INSERT INTO `bankaccount` (`id`, `id_user`, `somme_compte_cheque`, `somme_compte_livretA`, `somme_compte_zebitcoin`, `somme_compte_bitcoin`, `somme_compte_eth`, `compte_euro`) VALUES
(1, 3, 1000, 20000, 1, 3, 45, 997),
(4, 4, NULL, NULL, NULL, NULL, NULL, 7003);

-- --------------------------------------------------------

--
-- Structure de la table `depot`
--

CREATE TABLE `depot` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `somme` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `depot`
--

INSERT INTO `depot` (`id`, `id_user`, `somme`, `date`) VALUES
(1, 3, 200, '2023-01-20 13:52:54'),
(2, 3, 200, '2023-01-20 13:53:25'),
(3, 3, 200, '2023-01-20 13:55:02'),
(4, 3, 200, '2023-01-20 13:55:26'),
(30, 6, 3000, '2023-01-20 14:38:32'),
(31, 4, 5000, '2023-01-20 15:13:13'),
(32, 3, 4000, '2023-01-20 18:55:08');

-- --------------------------------------------------------

--
-- Structure de la table `retrait`
--

CREATE TABLE `retrait` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `retrait`
--

INSERT INTO `retrait` (`id`, `id_user`, `montant`, `date`) VALUES
(1, 3, 200, '2023-01-20 13:50:07'),
(2, 3, 200, '2023-01-20 16:58:57'),
(3, 3, 200, '2023-01-20 16:59:35'),
(4, 3, 200, '2023-01-20 16:59:57'),
(5, 3, 200, '2023-01-20 17:02:12'),
(6, 3, 200, '2023-01-20 18:50:45'),
(7, 3, 200, '2023-01-20 18:51:09'),
(8, 3, 200, '2023-01-20 18:51:23');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_receiver` int(11) DEFAULT NULL,
  `somme` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `devise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id`, `id_user`, `id_receiver`, `somme`, `date`, `devise`) VALUES
(1, 3, NULL, 200, '2023-01-20 13:55:02', 'euro'),
(2, 3, NULL, 200, '2023-01-20 13:55:26', 'euro'),
(3, 3, 1, 300, '2023-01-20 13:58:04', 'euro'),
(4, 3, 1, 300, '2023-01-20 13:59:03', 'zebitcoin'),
(5, 3, NULL, 300, '2023-01-20 15:01:50', 'zebitcoin'),
(6, 3, NULL, 3003, '2023-01-20 15:02:17', 'bitcoin'),
(7, 3, NULL, 3003, '2023-01-20 15:03:37', 'bitcoin'),
(8, 3, 2, 3003, '2023-01-20 15:04:22', 'bitcoin'),
(9, 3, 6, 4000, '2023-01-20 15:07:10', 'ETH'),
(10, 4, 3, -300, '2023-01-20 15:16:19', 'euro'),
(11, 3, 4, 3003, '2023-01-20 16:26:10', 'euro'),
(12, 3, 4, 3003, '2023-01-20 16:27:13', 'euro'),
(13, 3, 4, 3003, '2023-01-20 16:33:33', 'euro'),
(14, 3, 4, 3003, '2023-01-20 16:40:41', 'euro'),
(15, 3, 4, 3003, '2023-01-20 16:41:50', 'euro'),
(16, 4, 3, 3003, '2023-01-20 16:41:50', 'euro'),
(17, 3, 4, 3003, '2023-01-20 16:42:15', 'euro'),
(18, 4, 3, 3003, '2023-01-20 16:42:15', 'euro'),
(19, 3, 4, 3003, '2023-01-20 18:55:57', 'euro'),
(20, 4, 3, 3003, '2023-01-20 18:55:57', 'euro');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'client',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `telephone`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Turgy', 'Tirstan', 987654321, 'test@gmail.com', 'test', 'client', '2023-01-18 11:38:32'),
(3, 'admin', 'admin', 987654321, 'admin@test.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'admin', '2023-01-20 13:29:16'),
(4, 'aidouni', 'aya', 987654321, 'aya.aidouni@edu.esiee.fr', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'banned', '2023-01-20 15:10:41');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Index pour la table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `retrait`
--
ALTER TABLE `retrait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bankaccount`
--
ALTER TABLE `bankaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `depot`
--
ALTER TABLE `depot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `retrait`
--
ALTER TABLE `retrait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
