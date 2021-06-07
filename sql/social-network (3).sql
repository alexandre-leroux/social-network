-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2021 at 02:53 PM
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
(53, 1, 10, 1, 'coucou', '2021-06-03 17:29:23', 1),
(54, 2, 1, 2, 'sde', '2021-06-04 09:14:19', 0),
(55, 2, 6, 2, 'zef', '2021-06-04 09:14:24', 1),
(56, 2, 10, 2, 'zef', '2021-06-04 09:14:30', 1),
(57, 2, 12, 2, 'aaa', '2021-06-04 09:14:35', 1),
(58, 2, 14, 2, 'azd', '2021-06-04 09:14:42', 1),
(59, 2, 17, 2, 'dza', '2021-06-04 09:14:47', 1),
(60, 2, 16, 2, 'azd', '2021-06-04 09:14:52', 1),
(61, 2, 11, 2, 'aaaaa', '2021-06-04 09:15:02', 1),
(62, 2, 18, 2, 'azdazd', '2021-06-04 09:15:16', 1),
(63, 2, 8, 2, 'zefzef', '2021-06-04 09:15:33', 1),
(64, 2, 9, 2, 'zefzef', '2021-06-04 09:15:40', 0),
(65, 2, 13, 2, 'sefsef', '2021-06-04 09:15:49', 1),
(66, 2, 19, 2, 'zefzef', '2021-06-04 09:15:55', 1),
(67, 2, 1, 2, 'fdsfdsf', '2021-06-04 09:28:12', 0),
(68, 9, 2, 9, 'vgfdeg', '2021-06-04 09:39:58', 0),
(69, 1, 2, 1, 'ghfhfgh', '2021-06-04 09:53:49', 0),
(70, 1, 2, 1, 'rthrthrthrth', '2021-06-04 09:53:55', 0),
(71, 2, 1, 2, 'hey', '2021-06-04 10:08:37', 0),
(72, 2, 1, 2, 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2021-06-04 10:09:40', 0),
(73, 2, 1, 2, 'non ?', '2021-06-04 10:10:21', 0),
(74, 1, 2, 1, 'Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2021-06-04 10:30:44', 0),
(75, 1, 2, 1, 'efzef', '2021-06-04 12:12:51', 1),
(76, 1, 2, 1, 'fezfzef', '2021-06-04 12:13:52', 1),
(77, 1, 2, 1, 'fsdfsdf', '2021-06-04 12:14:33', 1),
(78, 1, 2, 1, 'ergerg', '2021-06-04 12:20:34', 1),
(79, 1, 2, 1, 'ergezrg', '2021-06-04 12:20:37', 1),
(80, 1, 2, 1, 'ergterg', '2021-06-04 12:20:44', 1),
(81, 1, 2, 1, 'htrhreh', '2021-06-04 12:20:48', 1),
(82, 1, 2, 1, 'ilui', '2021-06-04 12:20:51', 1),
(83, 1, 2, 1, 'ergqrgergr', '2021-06-04 12:20:57', 1),
(84, 1, 2, 1, 'ergerg', '2021-06-04 12:21:00', 1),
(85, 1, 2, 1, 'erherherherh', '2021-06-04 12:21:41', 1),
(86, 1, 2, 1, 'erhfdfgdfg', '2021-06-04 12:21:45', 1),
(87, 1, 2, 1, 'test', '2021-06-04 12:26:02', 1),
(88, 1, 2, 1, 'fdsfdsf', '2021-06-04 12:26:06', 1),
(89, 1, 2, 1, 'dfvdfv', '2021-06-04 12:26:10', 1),
(90, 1, 2, 1, 'gfdgfdg', '2021-06-04 12:27:09', 1),
(91, 1, 2, 1, 'fdsgfdsfgfh', '2021-06-04 12:27:13', 1),
(92, 1, 2, 1, 'vfdsgvsdfvsd', '2021-06-04 12:27:17', 1),
(93, 1, 2, 1, 'tttttttttttttttttttttt', '2021-06-04 12:27:22', 1),
(94, 1, 2, 1, 'gggggggggggggggg', '2021-06-04 12:28:22', 1),
(95, 1, 2, 1, '', '2021-06-04 12:28:25', 1),
(96, 1, 2, 1, '', '2021-06-04 12:28:28', 1),
(97, 1, 2, 1, '', '2021-06-04 12:28:28', 1),
(98, 1, 2, 1, '', '2021-06-04 12:28:28', 1),
(99, 1, 2, 1, '', '2021-06-04 12:28:28', 1),
(100, 1, 2, 1, '', '2021-06-04 12:28:29', 1),
(101, 1, 2, 1, 'gerg', '2021-06-04 12:28:32', 1),
(102, 1, 2, 1, 'ergerg', '2021-06-04 12:28:37', 1),
(103, 1, 2, 1, 'ergerg', '2021-06-04 12:28:44', 1),
(104, 1, 2, 1, 'ergergerg', '2021-06-04 12:28:47', 1),
(105, 1, 2, 1, 'ergergerg', '2021-06-04 12:29:01', 1),
(106, 1, 2, 1, 'ggggggggggggg', '2021-06-04 12:29:06', 1),
(107, 1, 2, 1, '', '2021-06-04 12:29:07', 1),
(108, 1, 2, 1, 'ergerg', '2021-06-04 12:29:19', 1),
(109, 1, 2, 1, '', '2021-06-04 12:29:20', 1),
(110, 1, 2, 1, '', '2021-06-04 12:29:20', 1),
(111, 1, 2, 1, '', '2021-06-04 12:29:21', 1),
(112, 1, 2, 1, 'erg', '2021-06-04 12:29:28', 1),
(113, 1, 2, 1, 'ergerg', '2021-06-04 12:29:30', 1),
(114, 1, 2, 1, 'ngngn', '2021-06-04 12:29:32', 1),
(115, 1, 2, 1, '', '2021-06-04 12:30:52', 1),
(116, 1, 2, 1, '', '2021-06-04 12:31:36', 1),
(117, 1, 2, 1, '', '2021-06-04 12:31:49', 1),
(118, 1, 2, 1, '', '2021-06-04 12:32:06', 1),
(119, 1, 2, 1, '', '2021-06-04 12:32:08', 1),
(120, 1, 2, 1, 'sdcsdc', '2021-06-04 12:32:34', 1),
(121, 1, 2, 1, 'nnnnnnnnn', '2021-06-04 12:32:37', 1),
(122, 1, 2, 1, 'dfgdfgdfg', '2021-06-04 12:33:54', 1),
(123, 1, 2, 1, 'ffff', '2021-06-04 12:40:06', 1),
(124, 1, 2, 1, 'kjhkhjk', '2021-06-04 12:41:29', 1),
(125, 1, 2, 1, 'yyyyyyyyyyyyyyyyyyy', '2021-06-04 12:41:42', 1),
(126, 1, 2, 1, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2021-06-04 12:42:41', 1),
(127, 1, 2, 1, 'bbbbbbbbbbbbbbbbbbbbbbb', '2021-06-04 12:42:56', 1),
(128, 1, 2, 1, 'hgnghjghjghj', '2021-06-04 12:43:54', 1),
(129, 1, 2, 1, 'hfhfgh', '2021-06-04 12:44:08', 1),
(130, 1, 2, 1, 'rth', '2021-06-04 12:44:10', 1),
(131, 1, 2, 1, 'tyjut', '2021-06-04 12:44:33', 1),
(132, 1, 2, 1, 'tyj', '2021-06-04 12:44:53', 1),
(133, 1, 2, 1, 'tyjtyj', '2021-06-04 12:45:12', 1),
(134, 1, 2, 1, 'tyj', '2021-06-04 12:45:14', 1),
(135, 1, 2, 1, 'tyjtyj', '2021-06-04 12:45:26', 1),
(136, 1, 2, 1, 'ergerger', '2021-06-04 12:45:34', 1),
(137, 1, 2, 1, 'ghghj', '2021-06-04 12:45:47', 1),
(138, 1, 2, 1, 'fdsf', '2021-06-04 12:48:39', 1),
(139, 1, 2, 1, 'fdsfsdf', '2021-06-04 12:49:09', 1),
(140, 1, 2, 1, 'hfgh', '2021-06-04 12:56:24', 1),
(141, 1, 2, 1, 'fghfgh', '2021-06-04 12:56:26', 1),
(142, 1, 2, 1, 'tgdgh', '2021-06-04 12:56:35', 1),
(143, 1, 2, 1, 'bfdgfdg', '2021-06-04 13:56:28', 1);

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
(3, 'parmesan'),
(4, 'oh my god'),
(5, 'fsdfsdf'),
(6, 'ezfef'),
(7, 'sympa');

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
(3, 1, 3, 'hello'),
(4, 2, 1, 'oui ???'),
(5, 2, 4, 'frefg'),
(6, 1, 4, 'fdgsdgf'),
(8, 1, 1, ''),
(9, 1, 1, ''),
(10, 1, 1, ''),
(11, 1, 1, 'dfdfb'),
(12, 1, 1, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.'),
(13, 1, 1, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.'),
(14, 1, 1, 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n\'a pas fait que survivre cinq siècles, mais s\'est aussi adapté à la bureautique informatique, sans que son contenu n\'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.'),
(15, 1, 1, 'rthghfgh'),
(16, 1, 1, 'rthrth'),
(17, 1, 1, 'tgyjtyj'),
(18, 1, 1, 'tyjtyj'),
(19, 1, 1, 'hfghfgh'),
(20, 1, 1, 'fgh'),
(21, 1, 1, 'fgbnfgnbbv'),
(22, 1, 1, 'rfgerg');

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
(10, 3, 1, 0),
(11, 4, 1, 0),
(12, 4, 6, 1),
(13, 4, 7, 1),
(14, 4, 2, 0),
(15, 5, 7, 0),
(16, 5, 8, 0),
(17, 5, 2, 0),
(18, 6, 7, 0),
(19, 6, 9, 0),
(20, 6, 2, 0),
(21, 7, 2, 0),
(22, 7, 6, 0),
(23, 7, 7, 0),
(24, 7, 8, 0),
(25, 7, 9, 0),
(26, 7, 10, 0),
(27, 7, 11, 0),
(28, 7, 12, 0),
(29, 7, 1, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages_chat_groupe`
--
ALTER TABLE `messages_chat_groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
