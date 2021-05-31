-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 31 mai 2021 à 13:38
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `social-network`
--

-- --------------------------------------------------------

--
-- Structure de la table `aime`
--

CREATE TABLE `aime` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aime` tinyint(4) NOT NULL,
  `pas_aime` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chat_prive`
--

CREATE TABLE `chat_prive` (
  `id` int(11) NOT NULL,
  `fk_id_user_1` int(11) NOT NULL,
  `fk_id_user_2` int(11) NOT NULL,
  `fk_id_auteur_message` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `non_lu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat_prive`
--

INSERT INTO `chat_prive` (`id`, `fk_id_user_1`, `fk_id_user_2`, `fk_id_auteur_message`, `message`, `date`, `non_lu`) VALUES
(1, 2, 3, 3, 'salut ça va ?', '2021-05-20 18:22:59', 0),
(2, 2, 3, 2, 'oui et toi ?', '2021-05-20 18:23:15', 0),
(3, 3, 2, 2, 'sinon quoi de neuf ?', '2021-05-20 19:11:48', 0),
(6, 2, 4, 4, 'Salut alex', '2021-05-21 11:53:03', 0),
(7, 5, 2, 5, 'hello la forme ?', '2021-05-21 11:54:41', 0),
(8, 5, 2, 5, 'et je t\'ai pas dit ', '2021-05-21 11:56:41', 0),
(9, 3, 2, 3, 'coucou', '2021-05-25 07:10:41', 0),
(10, 2, 3, 2, 'ça va?', '2021-05-25 07:10:55', 0),
(11, 4, 3, 4, 'hello', '2021-05-25 07:11:43', 0),
(12, 4, 3, 4, 't\'es là ?', '2021-05-25 07:12:26', 0),
(13, 4, 4, 4, 'coucou', '2021-05-25 07:23:28', 0),
(14, 4, 2, 4, 'hey', '2021-05-25 07:23:56', 0),
(15, 2, 4, 2, 'ca va?', '2021-05-25 07:24:04', 0),
(16, 4, 2, 4, 'oui et toi', '2021-05-25 07:24:23', 0),
(17, 2, 4, 2, 'ouio', '2021-05-25 07:24:36', 0),
(18, 2, 4, 2, 'coucou', '2021-05-25 07:28:04', 0),
(19, 4, 2, 4, 'ca av', '2021-05-25 07:28:09', 0),
(20, 2, 4, 2, 'zedfzef', '2021-05-25 07:28:14', 0),
(21, 4, 6, 4, 'sdsdv', '2021-05-25 07:28:33', 0),
(22, 2, 4, 2, 'ddd', '2021-05-25 07:28:36', 0),
(23, 4, 2, 4, 'eeee', '2021-05-25 07:28:49', 0),
(24, 2, 4, 2, 'eeeee', '2021-05-25 07:28:53', 0),
(25, 4, 2, 4, 'fvdfvd', '2021-05-25 07:30:27', 0),
(26, 2, 4, 2, 'ttttttttt', '2021-05-25 07:30:31', 0),
(27, 2, 4, 2, 'ergerg', '2021-05-25 07:30:41', 0),
(28, 4, 2, 4, 'erf', '2021-05-25 07:30:49', 0),
(29, 2, 4, 2, 'ererf', '2021-05-25 07:30:51', 0);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_comment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom_du_groupe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom_du_groupe`) VALUES
(1, 'test'),
(24, 'test numéro 2'),
(25, 'Le cub'),
(26, 'ergerg'),
(27, 'efzefzef'),
(28, 'zefzefzef'),
(29, 'qsqs'),
(30, 'zef'),
(31, 'sdqsd'),
(32, 'zefzef'),
(33, 'efzef'),
(34, 'champion'),
(35, 'ianefianzf'),
(36, 'test'),
(37, 'test numéro 2'),
(38, 'efzef'),
(39, 'efzef'),
(40, 'ianefianzf');

-- --------------------------------------------------------

--
-- Structure de la table `messages_chat_groupe`
--

CREATE TABLE `messages_chat_groupe` (
  `id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages_chat_groupe`
--

INSERT INTO `messages_chat_groupe` (`id`, `id_auteur`, `id_groupe`, `message`) VALUES
(1, 2, 1, 'ceci est un test'),
(2, 3, 1, 'réponse au test'),
(3, 2, 1, 'new mess'),
(4, 2, 24, 'y\'a quelqu\'un ?'),
(5, 2, 1, 'ecnnnn'),
(6, 2, 1, 'salut'),
(7, 2, 24, 'alors ??????'),
(8, 2, 1, 't\'es la ?'),
(9, 2, 1, '??'),
(10, 2, 1, 'yo'),
(11, 3, 1, 'oui?'),
(12, 3, 1, 'heeeee'),
(13, 2, 1, 'oui quoi ?'),
(14, 2, 1, 'sdf'),
(15, 2, 1, 'sdf'),
(16, 2, 1, 'sdf'),
(17, 2, 1, 'sdf'),
(18, 2, 1, 'coucou'),
(19, 2, 1, 'hoho'),
(20, 2, 1, 'dfg'),
(21, 4, 1, 'coucou'),
(22, 4, 1, 'qq?'),
(23, 4, 1, 'yes'),
(24, 2, 33, 'yo'),
(25, 2, 33, 'gfh'),
(26, 2, 1, 'therterth'),
(27, 2, 1, 'dfhdfgh');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post_image`
--

CREATE TABLE `post_image` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `image_4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `connecte` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `mail`, `connecte`, `nom`, `avatar`, `hobbies`, `mdp`) VALUES
(1, 'Alexandre', 'alex@laplateforme.io', 0, 'Leroux', '1.png', 'chat\npneu\ntélé', 'Azer-1234'),
(2, 'boris', 'boris@laplateforme.io', 0, 'becker', '2.png', 'tennis\nsculpture sur blé', 'Azer-1234'),
(6, 'rafa', 'rafa@laplateforme.io', 0, 'nadal', '2.png', 'tennis\npetanque', 'Azer-1234');

-- --------------------------------------------------------

--
-- Structure de la table `users_dans_groupe`
--

CREATE TABLE `users_dans_groupe` (
  `id` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `new_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_dans_groupe`
--

INSERT INTO `users_dans_groupe` (`id`, `id_groupe`, `id_user`, `new_message`) VALUES
(26, 1, 2, 0),
(27, 1, 3, 1),
(28, 24, 2, 0),
(29, 24, 4, 0),
(30, 1, 4, 1),
(31, 1, 5, 1),
(32, 33, 3, 0),
(33, 33, 4, 0),
(34, 33, 2, 0),
(35, 34, 5, 0),
(36, 34, 6, 0),
(37, 34, 7, 0),
(38, 34, 3, 0),
(39, 35, 2, 0),
(40, 35, 4, 0),
(41, 35, 5, 0),
(42, 35, 3, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aime`
--
ALTER TABLE `aime`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chat_prive`
--
ALTER TABLE `chat_prive`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages_chat_groupe`
--
ALTER TABLE `messages_chat_groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_image`
--
ALTER TABLE `post_image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_dans_groupe`
--
ALTER TABLE `users_dans_groupe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aime`
--
ALTER TABLE `aime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chat_prive`
--
ALTER TABLE `chat_prive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `messages_chat_groupe`
--
ALTER TABLE `messages_chat_groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post_image`
--
ALTER TABLE `post_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users_dans_groupe`
--
ALTER TABLE `users_dans_groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
