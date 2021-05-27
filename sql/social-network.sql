-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2021 at 09:07 PM
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
(1, 2, 3, 3, 'salut ça va ?', '2021-05-20 18:22:59', 0),
(2, 2, 3, 2, 'oui et toi ?', '2021-05-20 18:23:15', 0),
(3, 3, 2, 2, 'sinon quoi de neuf ?', '2021-05-20 19:11:48', 0),
(6, 2, 4, 4, 'Salut alex', '2021-05-21 11:53:03', 0),
(7, 5, 2, 5, 'hello la forme ?', '2021-05-21 11:54:41', 0),
(8, 5, 2, 5, 'et je t\'ai pas dit ', '2021-05-21 11:56:41', 0),
(9, 2, 3, 2, 'sdsdfc', '2021-05-21 19:43:27', 0),
(10, 3, 2, 3, 'salut', '2021-05-21 19:53:20', 0),
(11, 3, 2, 3, 'ça va ?', '2021-05-21 19:53:33', 0),
(12, 3, 2, 3, 't\'es la ?', '2021-05-21 19:53:45', 0),
(13, 2, 3, 2, 'oui', '2021-05-21 19:53:50', 0),
(14, 2, 3, 2, 't\'es la ?', '2021-05-21 21:42:43', 0),
(15, 2, 3, 2, 'fgh', '2021-05-21 21:49:48', 0),
(16, 2, 3, 2, 'fghfgh', '2021-05-21 21:54:16', 0),
(17, 2, 3, 2, 'dshtrh', '2021-05-21 21:54:21', 0),
(18, 2, 3, 2, 'fgh', '2021-05-21 21:54:23', 0),
(19, 2, 3, 2, 'coucou', '2021-05-21 21:54:33', 0),
(20, 2, 3, 2, 'fghfgh', '2021-05-27 15:10:02', 0),
(21, 2, 3, 2, 'alors ?????????', '2021-05-27 15:25:23', 0),
(22, 2, 3, 2, 'yo', '2021-05-27 15:27:34', 0),
(23, 2, 5, 2, 'non quoi ?', '2021-05-27 15:28:53', 1),
(24, 3, 2, 3, 'oui quoi ?', '2021-05-27 16:30:34', 0),
(25, 2, 3, 2, 'ha ça va ?', '2021-05-27 16:30:41', 0),
(26, 3, 2, 3, 'yes et toi ?', '2021-05-27 16:30:47', 0),
(27, 3, 4, 3, 'bonjour', '2021-05-27 16:30:54', 0),
(28, 4, 3, 4, 'salut', '2021-05-27 20:52:35', 0),
(29, 3, 4, 3, 'comment ça va ?', '2021-05-27 20:52:51', 0);

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
(34, 'champion');

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
(25, 2, 33, 'gfh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `connecte` int(11) NOT NULL,
  `nom` varchar(155) NOT NULL,
  `avatar` varchar(155) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `mdp` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `prenom`, `mail`, `connecte`, `nom`, `avatar`, `hobbies`, `mdp`) VALUES
(2, 'alex', 'a@a.a', 0, '', '', '', 'mdp'),
(3, 'boris', 'b@b.b', 0, '', '', '', 'mdp'),
(4, 'jean', 'c@c.c', 0, '', '', '', 'mdp'),
(5, 'roger', 'd@d.d', 0, '', '', '', ''),
(6, 'rafa', 'e@e.e', 0, '', '', '', ''),
(7, 'uri', 'f@f.f', 0, '', '', '', '');

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
(26, 1, 2, 0),
(27, 1, 3, 0),
(28, 24, 2, 0),
(29, 24, 4, 0),
(30, 1, 4, 0),
(31, 1, 5, 1),
(32, 33, 3, 0),
(33, 33, 4, 0),
(34, 33, 2, 0),
(35, 34, 5, 0),
(36, 34, 6, 0),
(37, 34, 7, 0),
(38, 34, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_prive`
--
ALTER TABLE `chat_prive`
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
-- AUTO_INCREMENT for table `chat_prive`
--
ALTER TABLE `chat_prive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages_chat_groupe`
--
ALTER TABLE `messages_chat_groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_dans_groupe`
--
ALTER TABLE `users_dans_groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
