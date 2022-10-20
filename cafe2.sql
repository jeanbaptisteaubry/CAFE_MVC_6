-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 oct. 2022 à 13:47
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cafe2`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir_centreinteret`
--

CREATE TABLE `avoir_centreinteret` (
  `idCI` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avoir_centreinteret`
--

INSERT INTO `avoir_centreinteret` (`idCI`, `idEntreprise`) VALUES
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(2, 0),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(3, 'Café', 'Blo n'),
(4, 'Café', 'Bon café'),
(5, 'Thé', 'Bon thé');

-- --------------------------------------------------------

--
-- Structure de la table `centreinteret`
--

CREATE TABLE `centreinteret` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `centreinteret`
--

INSERT INTO `centreinteret` (`id`, `libelle`) VALUES
(1, 'Sport'),
(2, 'Livre'),
(3, 'Cinema');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `denominationSociale` text NOT NULL,
  `raisonSociale` text NOT NULL,
  `Adresse` text NOT NULL,
  `CP` text NOT NULL,
  `Ville` text NOT NULL,
  `mailContact` text NOT NULL,
  `nomGerant` text NOT NULL,
  `prenomGerant` text NOT NULL,
  `dateNaissanceGerant` date NOT NULL,
  `lieuNaissanceGerant` text NOT NULL,
  `departement` text NOT NULL,
  `dateAcceptationRGPD` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `denominationSociale`, `raisonSociale`, `Adresse`, `CP`, `Ville`, `mailContact`, `nomGerant`, `prenomGerant`, `dateNaissanceGerant`, `lieuNaissanceGerant`, `departement`, `dateAcceptationRGPD`) VALUES
(25, 'A1', '2', '3', '4', '5', 'A@A.COM6', 'A', 'A', '2022-10-07', 'aerbv', '01', '2022-09-23'),
(26, 'A', 'A', 'A', 'A', 'A', 'A@A.COM', 'A', 'A', '2022-10-07', 'aerbv', '01', '2022-09-23'),
(27, 'A', 'A', 'A', 'A', 'A', 'A@A.COM', 'A', 'A', '2022-10-07', 'aerbv', '01', '2022-09-23'),
(28, 'A', 'A', 'A', 'A', 'A', 'A@A.COM', 'A', 'A', '2022-10-07', 'aerbv', '01', '2022-09-23'),
(29, 'A', 'A', 'A', 'A', 'A', 'A@A.COM', 'A', 'A', '2022-10-07', 'aerbv', '01', '2022-09-23'),
(30, 'A', 'A', 'A', 'A', 'A', 'A@A.COM', 'A', 'A', '2022-10-07', 'aerbv', '01', '2022-09-23'),
(31, 'A', 'A', 'A', 'A', 'A', 'A@A.COM', 'A', 'A', '2022-10-07', 'aerbv', '01', '2022-09-23');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `PUHT` float NOT NULL,
  `TxTVA` float NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `PUHT`, `TxTVA`, `idCategorie`) VALUES
(1, 'Arabi millinium', 'Arabica 3000', 200, 0.2, 0),
(2, 'Arabica', 'Arabica d\'Arabie', 20, 0, 3),
(3, 'Arabica', 'Arabica d\'Arabie', 20, 0, 3),
(4, 'Brésil', 'Du Brésil', 15, 0.021, 3),
(5, 'Brésil', 'Du Brésil', 15, 0.021, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avoir_centreinteret`
--
ALTER TABLE `avoir_centreinteret`
  ADD PRIMARY KEY (`idCI`,`idEntreprise`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `centreinteret`
--
ALTER TABLE `centreinteret`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `centreinteret`
--
ALTER TABLE `centreinteret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
