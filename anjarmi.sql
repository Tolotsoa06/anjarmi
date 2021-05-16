-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 15 fév. 2021 à 14:31
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `anjarmi`
--

-- --------------------------------------------------------

--
-- Structure de la table `acceuil`
--

CREATE TABLE `acceuil` (
  `id_accueil` int(11) NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `acceuil`
--

INSERT INTO `acceuil` (`id_accueil`, `text`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'L\'ONG ANJARMI est un ong qui aide les gens dans la compagne pour le develeopement de fianarantsoa', '1613109453_39023f3fc89af2a36c4e.jpg', '2021-02-12 05:57:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'L\'ONG ANJARMI est un ong qui aide les gens dans la compagne pour le develeopement de fianarantsoa', '1613109455_cab872be0e4799f84996.jpg', '2021-02-12 05:57:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `id_activite` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `titre`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Environnement', 'Fanampiana ireo mpiara belona eo amin\'ny fambolena hazo ary fanentanana ny hafa mba tsy handoro ny ala', '1613110187_4ac632214e3964e07661.jpg', '2021-02-12 06:09:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Education et formation', 'Fanampiana ireo ankizy eo amin\'ny lafiny fampianarana ary hiany koa fampiofanana azy ireo amin\'ny resaka asa', '1613110324_22431e34d8e7d45bca1e.jpg', '2021-02-12 06:12:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Agriculture et élévage', 'Fanampiana ireo tantsaha amin\'ny sehatra fambolena sy fampivoarana azy eo amin\'ny resak fiompiana', '1613110441_fc3f25bffa058bf8c52f.jpg', '2021-02-12 06:14:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Aproche basé sur les humains', 'Fanakekezana ireo mpiara belona mba ho fampandrosoana ny tsirairay', '1613111124_9a2ee3377be32236f104.jpg', '2021-02-12 06:25:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actualte` int(11) NOT NULL,
  `activite` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_event` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actualte`, `activite`, `description`, `image`, `date_event`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Reboisement', 'une evenement pour la manifestation contre la reboisement dans la region sud de Fianarantsoa', '1613382259_be9a48dfc405222f0bcd.jpg', '2021-02-15 21:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `apropos`
--

CREATE TABLE `apropos` (
  `id_apropos` int(11) NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `apropos`
--

INSERT INTO `apropos` (`id_apropos`, `text`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'L\'ONG ANJARMI est un ong qui aide les gens dans la compagne pour le develeopement de fianarantsoa surtout dans les zones rural de fianaranrsoa et il aide aussi les jeune sur le domaine de recherche et surtout sur le service de travail', '1613210402_289395ce77ab65aaab40.jpg', '2021-02-13 10:00:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'L\'ONG ANJARMI est un ong qui aide les gens dans la compagne pour le develeopement de fianarantsoa surtout dans les zones rural de fianaranrsoa et il aide aussi les jeune sur le domaine de recherche et surtout sur le service de travail', '1613211364_6ab470526cc2e7c0c432.jpg', '2021-02-13 10:16:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

CREATE TABLE `don` (
  `id_don` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type_don` varchar(255) NOT NULL,
  `type_payement` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `don`
--

INSERT INTO `don` (`id_don`, `nom`, `adresse`, `telephone`, `email`, `type_don`, `type_payement`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tolotsoa RAZAFIMIADANA', 'Sahalava', '0209452180', 'razafimiadanatolotsoa@gmail.com', 'mensuel', 'compte', '2021-02-14 09:10:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Tolotsoa RAZAFIMIADANA', 'Sahalava', '0209452180', 'razafimiadanatolotsoa@gmail.com', 'journaliaire', 'mobile money', '2021-02-14 09:12:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Albain ', 'Ambodirano', '0343456478', 'albain@gmail.com', 'annuel', 'mobile money', '2021-02-14 10:31:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `sujet` text NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `date_forum` date NOT NULL DEFAULT current_timestamp(),
  `heure` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id_forum`, `sujet`, `lieu`, `date_forum`, `heure`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lutte contre la reboisement', 'Capre Mahamanina', '2021-02-12', '14:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Developpement dans la vie quotidienne', 'Capre Mahamanina', '2021-02-13', '12:15:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id_partenaire`, `nom`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Chambre d\'haute Fianarantsoa', '1613213128_44c2795e61570238cf21.png', '2021-02-13 10:45:28', '0000-00-00 00:00:00'),
(2, 'CA2E Andrainjato', '1613213156_a738996df8d344c90872.png', '2021-02-13 10:45:56', '0000-00-00 00:00:00'),
(3, 'Radio Rofia', '1613213174_5933d565528ab15f17bd.jpg', '2021-02-13 10:46:14', '0000-00-00 00:00:00'),
(5, 'Dio', '1613213215_dfce2288f5221ec1f9d7.png', '2021-02-13 10:46:55', '0000-00-00 00:00:00'),
(6, 'Universite de Fianarantsoa', '1613213242_d9b92556ee8465693cd7.png', '2021-02-13 10:47:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `personne_don`
--

CREATE TABLE `personne_don` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ville` text NOT NULL,
  `adresse` text NOT NULL,
  `email` text NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `id_site` int(11) NOT NULL,
  `zone` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`id_site`, `zone`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Maharombo', '1613226623_808107c915103ea24dab.jpg', '2021-02-13 14:30:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Antsakaviro Manga', '1613226670_390870c47a698ec47054.jpg', '2021-02-13 14:31:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Dans les zone de Fenoarivo Est', '1613226704_29518192b023fa56e737.jpg', '2021-02-13 14:31:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nom_users` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `nom_users`, `username`, `password`, `profile_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Paul Francki', 'Francki', '6c63212ab48e8401eaf6b59b95d816a9', '1611349309_b6fa7e94949da11862cb.csv', '2021-01-22 21:01:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Razafimiadana Tolotsoa', 'Tolotsoa', '8775848a62885241724bfd9e42a862f3', '1611349337_dee707cf9f63cb551571.jpg', '2021-01-22 21:02:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Nomenjahanary Mamy', 'Nomena', '8775848a62885241724bfd9e42a862f3', '1611349620_e9b5455a30788244beaf.jpg', '2021-01-22 21:07:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Paul Francki', 'Francki', '6c63212ab48e8401eaf6b59b95d816a9', '1612158474_ecae3fc1d56445c036fd.png', '2021-02-01 05:47:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Nomenjahanary Mamy', 'Nomena', '8775848a62885241724bfd9e42a862f3', '1613388868_925497540080e7f94f26.csv', '2021-02-15 11:34:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acceuil`
--
ALTER TABLE `acceuil`
  ADD PRIMARY KEY (`id_accueil`);

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id_activite`);

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id_actualte`);

--
-- Index pour la table `apropos`
--
ALTER TABLE `apropos`
  ADD PRIMARY KEY (`id_apropos`);

--
-- Index pour la table `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`id_don`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`);

--
-- Index pour la table `personne_don`
--
ALTER TABLE `personne_don`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id_site`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acceuil`
--
ALTER TABLE `acceuil`
  MODIFY `id_accueil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `id_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actualte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `apropos`
--
ALTER TABLE `apropos`
  MODIFY `id_apropos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `don`
--
ALTER TABLE `don`
  MODIFY `id_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `personne_don`
--
ALTER TABLE `personne_don`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `id_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
