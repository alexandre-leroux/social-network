-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2021 at 08:45 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social-network`
--

-- --------------------------------------------------------

--
-- Table structure for table `aime`
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
-- Table structure for table `chat_prive`
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
-- Dumping data for table `chat_prive`
--

INSERT INTO `chat_prive` (`id`, `fk_id_user_1`, `fk_id_user_2`, `fk_id_auteur_message`, `message`, `date`, `non_lu`) VALUES
(34, 1, 6, 1, 'zefzef', '2021-06-01 08:23:11', 0),
(35, 1, 6, 1, 'zefzef', '2021-06-01 08:23:25', 0),
(37, 1, 15, 3, 'zefzef', '2021-06-01 08:23:31', 0),
(38, 6, 1, 6, 'hey', '2021-06-02 19:49:28', 0),
(39, 1, 6, 1, 'oui?', '2021-06-02 19:49:43', 0),
(40, 6, 1, 6, 'arrete', '2021-06-02 19:50:04', 0),
(41, 15, 1, 15, 'j;hj;', '2021-06-03 10:15:48', 0),
(51, 1, 7, 1, 'gfdg', '2021-06-03 13:38:15', 1),
(52, 1, 8, 1, 'dbfb', '2021-06-03 13:39:42', 1),
(53, 1, 10, 1, 'coucou', '2021-06-03 17:29:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
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
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom_du_groupe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id`, `nom_du_groupe`) VALUES
(1, 'tennis'),
(2, 'natation'),
(3, 'parmesan');

-- --------------------------------------------------------

--
-- Table structure for table `messages_chat_groupe`
--

CREATE TABLE `messages_chat_groupe` (
  `id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages_chat_groupe`
--

INSERT INTO `messages_chat_groupe` (`id`, `id_auteur`, `id_groupe`, `message`) VALUES
(1, 1, 1, 'prout'),
(2, 1, 1, 'fesf'),
(3, 1, 3, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post_image`
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
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `prenom`, `mail`, `connecte`, `nom`, `avatar`, `hobbies`, `mdp`) VALUES
(1, 'Alexandre', 'alex@laplateforme.io', 1, 'Leroux', '1.png', 'chat\npneu\ntélé', 'Azer-1234'),
(2, 'boris', 'boris@laplateforme.io', 0, 'becker', '2.jpg', 'tennis\nsculpture sur blé', 'Azer-1234'),
(6, 'rafa', 'rafa@laplateforme.io', 0, 'nadal', '6.jpg', 'tennis\npetanque', 'Azer-1234'),
(7, 'John', 'John@laplateforme.io', 0, 'Snow', '7.jpg', 'hiver*\nmarcheur blanc', 'Azer-1234'),
(8, 'El', 'elprofesseur@laplateforme.io', 0, 'Professeur', '8.jpg', 'braquage\nvin', 'Azer-1234'),
(9, 'Roger', 'roger@laplateforme.io', 0, 'Federer', '9.jpg', 'tennis\ngagner', 'Azer-1234'),
(10, 'Jean', 'jean@laplateforme.io', 0, 'De Florette', '10.jpg', 'source', 'Azer-1234'),
(11, 'leonardo', 'leonardo@laplateforme.io', 0, 'Dicaprio', '11.jpg', 'film', 'Azer-1234'),
(12, 'brad', 'brad@laplateforme.io', 0, 'pitt', '12.jpg', 'cinema\nfilms', 'Azer-1234'),
(13, 'stephen', 'stephen@laplateforme.io', 0, 'king', '13.jpg', 'film\nhorreur', 'Azer-1234'),
(14, 'patrick', 'patrick@laplateforme.io', 0, 'sebastien', '14.jpg', 'humour\nchanson', 'Azer-1234'),
(15, 'didier', 'didier@laplateforme.io', 0, 'super', '15.jpg', 'chanson\ntexte', 'Azer-1234'),
(16, 'gargamel', 'gargamel@laplateforme.io', 0, 'garga', '16.jpg', 'schtroumph\nmagie', 'Azer-1234'),
(17, 'gandalf', 'gandalf@laplateforme.io', 0, 'legris', '17.jpg', 'joaillerie\nvoyage', 'Azer-1234'),
(18, 'jacques', 'jacques@laplateforme.io', 0, 'chirac', '18.jpg', 'politique\nfraude', 'Azer-1234'),
(19, 'dieu', 'dieu@laplateforme.io', 0, 'letoutpuissant', '19.jpg', 'dieu', 'Azer-1234');

-- --------------------------------------------------------

--
-- Table structure for table `users_dans_groupe`
--

CREATE TABLE `users_dans_groupe` (
  `id` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `new_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_dans_groupe`
--

INSERT INTO `users_dans_groupe` (`id`, `id_groupe`, `id_user`, `new_message`) VALUES
(1, 1, 2, 1),
(2, 1, 6, 1),
(3, 1, 1, 0),
(4, 2, 2, 0),
(5, 2, 6, 0),
(6, 2, 1, 0),
(7, 3, 7, 1),
(8, 3, 8, 1),
(9, 3, 10, 1),
(10, 3, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aime`
--
ALTER TABLE `aime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_prive`
--
ALTER TABLE `chat_prive`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_chat_groupe`
--
ALTER TABLE `messages_chat_groupe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_image`
--
ALTER TABLE `post_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_dans_groupe`
--
ALTER TABLE `users_dans_groupe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aime`
--
ALTER TABLE `aime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_prive`
--
ALTER TABLE `chat_prive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages_chat_groupe`
--
ALTER TABLE `messages_chat_groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_image`
--
ALTER TABLE `post_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_dans_groupe`
--
ALTER TABLE `users_dans_groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
