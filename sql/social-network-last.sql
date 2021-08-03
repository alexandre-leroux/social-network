-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 août 2021 à 09:15
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

DROP TABLE IF EXISTS `aime`;
CREATE TABLE IF NOT EXISTS `aime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `aime`
--

INSERT INTO `aime` (`id`, `id_post`, `id_user`) VALUES
(1, 1, 1),
(2, 2, 1),
(4, 20, 7),
(5, 18, 7),
(6, 20, 14);

-- --------------------------------------------------------

--
-- Structure de la table `chat_prive`
--

DROP TABLE IF EXISTS `chat_prive`;
CREATE TABLE IF NOT EXISTS `chat_prive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_user_1` int(11) NOT NULL,
  `fk_id_user_2` int(11) NOT NULL,
  `fk_id_auteur_message` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `non_lu` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat_prive`
--

INSERT INTO `chat_prive` (`id`, `fk_id_user_1`, `fk_id_user_2`, `fk_id_auteur_message`, `message`, `date`, `non_lu`) VALUES
(34, 1, 6, 1, 'zefzef', '2021-06-01 08:23:11', 0),
(35, 1, 6, 1, 'zefzef', '2021-06-01 08:23:25', 0),
(37, 1, 15, 3, 'zefzef', '2021-06-01 08:23:31', 0),
(38, 6, 1, 6, 'hey', '2021-06-02 19:49:28', 0),
(39, 1, 6, 1, 'oui?', '2021-06-02 19:49:43', 0),
(40, 6, 1, 6, 'arrete', '2021-06-02 19:50:04', 0),
(41, 15, 1, 15, 'j;hj;', '2021-06-03 10:15:48', 0),
(51, 1, 7, 1, 'gfdg', '2021-06-03 13:38:15', 0),
(52, 1, 8, 1, 'dbfb', '2021-06-03 13:39:42', 1),
(53, 1, 10, 1, 'coucou', '2021-06-03 17:29:23', 1),
(54, 2, 1, 2, 'sde', '2021-06-04 09:14:19', 0),
(55, 2, 6, 2, 'zef', '2021-06-04 09:14:24', 1),
(56, 2, 10, 2, 'zef', '2021-06-04 09:14:30', 1),
(57, 2, 12, 2, 'aaa', '2021-06-04 09:14:35', 1),
(58, 2, 14, 2, 'azd', '2021-06-04 09:14:42', 1),
(59, 2, 17, 2, 'dza', '2021-06-04 09:14:47', 1),
(60, 2, 16, 2, 'azd', '2021-06-04 09:14:52', 1),
(61, 2, 11, 2, 'aaaaa', '2021-06-04 09:15:02', 0),
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
(143, 1, 2, 1, 'bfdgfdg', '2021-06-04 13:56:28', 1),
(144, 1, 2, 1, 'pokoiujio', '2021-06-07 09:41:17', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_comment` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `user_id`, `comment`, `date_comment`) VALUES
(1, 19, 7, 'stylé ', '2021-08-03'),
(2, 19, 7, 'de ouf ! ', '2021-08-03'),
(3, 18, 7, 's<dg', '2021-08-03');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_du_groupe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
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
-- Structure de la table `messages_chat_groupe`
--

DROP TABLE IF EXISTS `messages_chat_groupe`;
CREATE TABLE IF NOT EXISTS `messages_chat_groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages_chat_groupe`
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
(22, 1, 1, 'rfgerg'),
(23, 1, 1, 'ezfdze'),
(24, 1, 7, 'àoloiàk,'),
(25, 8, 3, 'Yo '),
(26, 7, 3, 'dfgdfg'),
(27, 7, 3, 'dhgjhgd'),
(28, 7, 3, 'hgj'),
(29, 7, 3, 'ghf'),
(30, 7, 3, 'hgjf'),
(31, 7, 3, 'jhgf'),
(32, 7, 3, 'gjh'),
(33, 7, 3, 'gfh'),
(34, 7, 3, 'ghf'),
(35, 7, 3, 'j'),
(36, 7, 3, 'fgh'),
(37, 7, 3, 'j'),
(38, 7, 3, 'gfhj'),
(39, 7, 3, 'hgfj'),
(40, 7, 3, 'fghjfg'),
(41, 7, 3, 'gfhj'),
(42, 7, 3, 'gfhj'),
(43, 7, 3, 'ioù'),
(44, 7, 3, 'oipùpoùi');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date_post` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `users_id`, `texte`, `date_post`) VALUES
(1, 17, 'Eh ! ', '2021-08-02 00:00:00'),
(2, 17, 'Salut ! ', '2021-08-02 10:19:07'),
(3, 17, 'Ice cream oat cake cake soufflé sweet. Cupcake cookie apple pie jelly-o tart cupcake bonbon powder. Croissant danish candy canes carrot cake donut pastry brownie chocolate marzipan.', '2021-08-02 11:01:14'),
(4, 18, 'Liquorice muffin sweet icing cotton candy oat cake. Danish muffin tootsie roll macaroon biscuit icing sweet roll icing chocolate bar. Topping liquorice muffin gummies caramels icing.', '2021-08-02 11:03:08'),
(5, 11, 'Muffin liquorice powder carrot cake marzipan cookie. Tootsie roll tootsie roll liquorice pudding croissant cotton candy tart pastry cupcake. Lemon drops biscuit carrot cake sweet cake cake.', '2021-08-02 11:04:09'),
(6, 19, 'Cotton candy gingerbread jujubes soufflé marzipan marshmallow jelly muffin sesame snaps. Halvah cotton candy sugar plum tiramisu topping. Lollipop sweet chocolate muffin cake.', '2021-08-02 11:05:20'),
(7, 8, 'Pudding dragée chocolate bar wafer danish. Tiramisu jujubes jelly beans marzipan toffee. Wafer candy cake gummi bears sweet roll danish marshmallow carrot cake. Dragée shortbread cookie pudding halvah gummi bears bonbon tootsie roll.', '2021-08-02 11:06:02'),
(17, 8, 'yoo', '2021-08-02 16:24:46'),
(18, 8, 'Salut ! ', '2021-08-02 16:52:46'),
(19, 8, 'Eh ! ', '2021-08-02 16:53:56'),
(20, 8, 'Salut ! ghfhgfjhjgfhgjf', '2021-08-02 16:54:43'),
(21, 7, 'Apple pie liquorice candy gingerbread toffee pudding topping shortbread. Dessert cheesecake topping shortbread tootsie roll toffee. Bonbon ice cream jelly-o jelly beans cheesecake lollipop carrot cake cake.', '2021-08-03 09:53:29'),
(22, 7, 'Ice cream oat cake cake soufflé sweet. Cupcake cookie apple pie jelly-o tart cupcake bonbon powder. Croissant danish candy canes carrot cake donut pastry brownie chocolate marzipan.', '2021-08-03 10:09:33');

-- --------------------------------------------------------

--
-- Structure de la table `post_image`
--

DROP TABLE IF EXISTS `post_image`;
CREATE TABLE IF NOT EXISTS `post_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `img_post` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post_image`
--

INSERT INTO `post_image` (`id`, `post_id`, `id_user`, `img_post`) VALUES
(1, 19, 8, '19-0.jpg'),
(2, 20, 8, '20-0.jpg'),
(3, 20, 8, '20-1.jpg'),
(4, 21, 7, '21-0.png'),
(5, 21, 7, '21-1.png'),
(6, 22, 7, '22-0.png'),
(7, 22, 7, '22-1.jpg'),
(8, 22, 7, '22-2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `connecte` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
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
(14, 'patrick', 'patrick@laplateforme.io', 1, 'sebastien', '14.jpg', 'humour\nchanson', 'Azer-1234'),
(15, 'didier', 'didier@laplateforme.io', 0, 'super', '15.jpg', 'chanson\ntexte', 'Azer-1234'),
(16, 'gargamel', 'gargamel@laplateforme.io', 0, 'garga', '16.jpg', 'schtroumph\nmagie', 'Azer-1234'),
(17, 'gandalf', 'gandalf@laplateforme.io', 0, 'legris', '17.jpg', 'joaillerie\nvoyage', 'Azer-1234'),
(18, 'jacques', 'jacques@laplateforme.io', 0, 'chirac', '18.jpg', 'politique\nfraude', 'Azer-1234'),
(19, 'dieu', 'dieu@laplateforme.io', 0, 'letoutpuissant', '19.jpg', 'dieu', 'Azer-1234');

-- --------------------------------------------------------

--
-- Structure de la table `users_dans_groupe`
--

DROP TABLE IF EXISTS `users_dans_groupe`;
CREATE TABLE IF NOT EXISTS `users_dans_groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `new_message` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_dans_groupe`
--

INSERT INTO `users_dans_groupe` (`id`, `id_groupe`, `id_user`, `new_message`) VALUES
(1, 1, 2, 1),
(2, 1, 6, 1),
(3, 1, 1, 0),
(4, 2, 2, 0),
(5, 2, 6, 0),
(6, 2, 1, 0),
(7, 3, 7, 0),
(8, 3, 8, 1),
(9, 3, 10, 1),
(10, 3, 1, 1),
(11, 4, 1, 0),
(12, 4, 6, 1),
(13, 4, 7, 0),
(14, 4, 2, 0),
(15, 5, 7, 0),
(16, 5, 8, 0),
(17, 5, 2, 0),
(18, 6, 7, 0),
(19, 6, 9, 0),
(20, 6, 2, 0),
(21, 7, 2, 1),
(22, 7, 6, 1),
(23, 7, 7, 1),
(24, 7, 8, 0),
(25, 7, 9, 1),
(26, 7, 10, 1),
(27, 7, 11, 0),
(28, 7, 12, 1),
(29, 7, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
