-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2021 at 09:35 PM
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
(19, 2, 3, 2, 'coucou', '2021-05-21 21:54:33', 0);

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
(3, 'de'),
(4, 'de'),
(5, 'dsz'),
(6, 'esfesf'),
(7, 'teeeeeee'),
(8, 'desssssss'),
(9, 'dsrrrr'),
(10, 'voila'),
(11, 'fdsf'),
(12, 'zadzad'),
(13, 'ffffffffffffff');

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
(3, 'boris', 'b@b.b', 1, '', '', '', 'mdp'),
(4, 'jean', 'c@c.c', 0, '', '', '', ''),
(5, 'roger', 'd@d.d', 0, '', '', '', ''),
(6, 'rafa', 'e@e.e', 0, '', '', '', ''),
(7, 'uri', 'f@f.f', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_dans_groupe`
--

CREATE TABLE `users_dans_groupe` (
  `id_groupe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_dans_groupe`
--

INSERT INTO `users_dans_groupe` (`id_groupe`, `id_user`) VALUES
(13, 2),
(13, 3),
(13, 4);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_prive`
--
ALTER TABLE `chat_prive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
