-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 08 déc. 2022 à 16:50
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
                                                               (1, 32),
                                                               (1, 33),
                                                               (1, 34),
                                                               (1, 35),
                                                               (1, 36),
                                                               (1, 37),
                                                               (2, 0),
                                                               (2, 26),
                                                               (2, 27),
                                                               (2, 28),
                                                               (2, 29),
                                                               (2, 30),
                                                               (2, 31),
                                                               (2, 32),
                                                               (2, 33),
                                                               (2, 34),
                                                               (2, 35),
                                                               (2, 36),
                                                               (2, 37),
                                                               (2, 38),
                                                               (2, 39),
                                                               (2, 40);

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
                                                                                                                                                                                                                                      (31, 'A', 'A', 'A', 'A', 'A', 'A@A.COM', 'A', 'A', '2022-10-07', 'aerbv', '01', '2022-09-23'),
                                                                                                                                                                                                                                      (32, 'erbae', 'aergba', 'aerb', 'rbaerb', 'aerbaerb', 'contact@lyceep.fr', 'argbvaerb', 'aerbaerb', '2022-10-28', 'aerbvaerb', '01', '2022-10-20'),
                                                                                                                                                                                                                                      (33, 'erbae', 'aergba', 'aerb', 'rbaerb', 'aerbaerb', 'contact@lyceep.fr', 'argbvaerb', 'aerbaerb', '2022-10-28', 'aerbvaerb', '01', '2022-10-20'),
                                                                                                                                                                                                                                      (34, 'erbae', 'aergba', 'aerb', 'rbaerb', 'aerbaerb', 'contact@lyceep.fr', 'argbvaerb', 'aerbaerb', '2022-10-28', 'aerbvaerb', '01', '2022-10-20'),
                                                                                                                                                                                                                                      (35, 'erbae', 'aergba', 'aerb', 'rbaerb', 'aerbaerb', 'contact@lyceep.fr', 'argbvaerb', 'aerbaerb', '2022-10-28', 'aerbvaerb', '01', '2022-10-20'),
                                                                                                                                                                                                                                      (36, 'erbae', 'aergba', 'aerb', 'rbaerb', 'aerbaerb', 'contact@lyceep.fr', 'argbvaerb', 'aerbaerb', '2022-10-28', 'aerbvaerb', '01', '2022-10-20'),
                                                                                                                                                                                                                                      (37, 'erbae', 'aergba', 'aerb', 'rbaerb', 'aerbaerb', 'contact@lyceep.fr', 'argbvaerb', 'aerbaerb', '2022-10-28', 'aerbvaerb', '01', '2022-10-20'),
                                                                                                                                                                                                                                      (38, 'aervbaervb', 'aerbaer', 'aerbaerb', 'aerbb', 'aerbaer', 'aerb@arbaerb.com', 'aerbaerb', 'aerbvaerb', '2022-10-13', 'aerbaerb', '01', '2022-10-20'),
                                                                                                                                                                                                                                      (39, 'zerb', 'gaer', 'arbe', 'aerg', 'aerg', 'aergaergaerg@xn--gae-j50a.om', 'aerg', 'g', '2022-11-02', 'aergaerg', '01', '2022-10-20'),
                                                                                                                                                                                                                                      (40, 'aervbaervb', 'aerbaer', 'aerbaerb', 'aerbb', 'aerbaer', 'aerb@arbaerb.com', 'aerbaerb', 'aerbvaerb', '2022-10-13', 'aerbaerb', '01', '2022-10-21'),
                                                                                                                                                                                                                                      (41, '\'\"g', 'rg\'a', 'aergaerg', 'aergaerg', 'aergaerg', 'contact@lyceep.fr', 'aergaerg', 'aergaerg', '2022-11-24', 'aerbaerb', '01', '2022-11-10'),
(42, 'a\"\'rga\"r\'g', 'a\"r\'ga\"\'rg', 'are\"ga\"rg', '25660', 'Saone', 'JBA@CLIENT.fr', 'Aubry', 'Jean-Baptiste', '2022-12-02', 'aergvaerb', '01', '2022-11-10'),
(43, 'a\"\'rga\"r\'g', 'a\"r\'ga\"\'rg', 'are\"ga\"rg', '25660', 'Saone', 'JBA@CLIENT.fr', 'Aubry', 'Jean-Baptiste', '2022-12-02', 'aergvaerb', '01', '2022-11-10'),
(44, 'a\"\'rga\"r\'g', 'a\"r\'ga\"\'rg', 'are\"ga\"rg', '25660', 'Saone', 'JBA@CLIENT.fr', 'Aubry', 'Jean-Baptiste', '2022-12-02', 'aergvaerb', '01', '2022-11-10'),
(45, 'a\"\'rga\"r\'g', 'a\"r\'ga\"\'rg', 'are\"ga\"rg', '25660', 'Saone', 'JBA@CLIENT.fr', 'Aubry', 'Jean-Baptiste', '2022-12-02', 'aergvaerb', '01', '2022-11-10'),
(46, 'a\"\'rga\"r\'g', 'a\"r\'ga\"\'rg', 'are\"ga\"rg', '25660', 'Saone', 'JBA@CLIENT.fr', 'Aubry', 'Jean-Baptiste', '2022-12-02', 'aergvaerb', '01', '2022-11-10'),
(47, 'a\"\'rga\"r\'g', 'a\"r\'ga\"\'rg', 'are\"ga\"rg', '25660', 'Saone', 'JBA@CLIENT.fr', 'Aubry', 'Jean-Baptiste', '2022-12-02', 'aergvaerb', '01', '2022-11-10'),
(48, 'AERGAERG', 'AERGZERG', 'AERGAZERG', 'AERGAERG', 'AERGAERG', 'JBA@CLIENT.fr', 'AREGAERGAERGAERG', 'AERGAERG', '1111-11-11', 'AERG', '01', '2022-11-24');

-- --------------------------------------------------------

--
-- Structure de la table `jeton`
--

CREATE TABLE `jeton` (
  `id` int(11) NOT NULL,
  `valeurUnique` text NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idUsage` int(11) NOT NULL,
  `idObjet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jeton`
--

INSERT INTO `jeton` (`id`, `valeurUnique`, `idUtilisateur`, `idUsage`, `idObjet`) VALUES
(9, 'RjpzBu4mJhG0xVY6KWuBG/DkC3zKBpjupjPImr2wJE8T7wvgt5d8ZSXlG9iDnvgINj7hOz7xfHIcsGEsnaCpOJCz1h3uFR1Qsdx03YEo5hdym2n7jjPW539uqVG2GZkDl/k1YOnofbIBG65p1OQAUsFDed1Nhxz8zrCoxS4nlnNvT5F2jWiBuzv6A5tolSo/u6YK42TN8J0IHM+tHvgmrGe18KVd8uttkRC+VtgA6fzKFjmrmcCZPaX96Yx7IC3Kh21PGY2ffJirXbNkeAqt6vnTY24cVVuNGrg++cM7cMs/FkNZXDtM5RudzzcDvD1eiyXQmGb602Quvl2Khv8ZWA==', 5, 1, -1);

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
(2, 'Arabica2', 'Arabica d', 20, 0.021, 3),
(6, 'Papouasie', 'Café de Papouasie', 10, 0.021, 3),
(7, 'Papouasie', 'Café de Papouasie', 10, 0.021, 3),
(8, 'Papouasie', 'Café de Papouasie', 10, 0.021, 3),
(9, 'Papouasie', 'Café de Papouasie', 10, 0.021, 3);

-- --------------------------------------------------------

--
-- Structure de la table `usage_jeton`
--

CREATE TABLE `usage_jeton` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `usage_jeton`
--

INSERT INTO `usage_jeton` (`id`, `type`) VALUES
(1, 'renouveler MDP');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `mail` text NOT NULL,
  `motDePasse` text NOT NULL,
  `typeUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mail`, `motDePasse`, `typeUtilisateur`) VALUES
(5, 'JBA@CLIENT.fr', '$2y$10$8oyzQkQ8KS9KMJSYcKqYuu/bnpbpMMG8cNsZH7SdlHtRDQsIz8zti', 1),
(6, 'JBA@CLIENT.fr', '$2y$10$bPOmPeZm9g1lGj6NolcyVetN6bYXbH5EWzdb/BViKNe4s5nf9T3ju', 1);

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
-- Index pour la table `jeton`
--
ALTER TABLE `jeton`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usage_jeton`
--
ALTER TABLE `usage_jeton`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `jeton`
--
ALTER TABLE `jeton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `usage_jeton`
--
ALTER TABLE `usage_jeton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
