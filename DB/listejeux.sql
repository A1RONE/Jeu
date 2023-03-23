-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 19 mars 2023 à 18:13
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `listejeux`
--

-- --------------------------------------------------------

--
-- Structure de la table `console`
--


CREATE TABLE `console` (
  `c_name` varchar(50) NOT NULL,
  `c_picture` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `console`
--

INSERT INTO `console` (`c_name`, `c_picture`) VALUES
('steam', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Steam_icon_logo.svg/640px-Steam_icon_logo.svg.png'),
('switch', 'https://fs-prod-cdn.nintendo-europe.com/media/images/08_content_images/systems_5/nintendo_switch_3/not_approved_1/NSwitchTop.png'),
('xbox one', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1nxuYHRVDHxrPdFERaxm17U7PyPOxcS1Lk38MoK4Jnbdbe_hXMlT-ltnMbgji_464PWQ&usqp=CAU');

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `c_name` varchar(50) NOT NULL,
  `g_name` varchar(50) NOT NULL,
  `g_picture` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`c_name`, `g_name`, `g_picture`) VALUES
('steam', 'Hollow Knight', 'https://hb.imgix.net/d73d29a560b20cb200d6f6d7daf935043b6edd8a.jpeg?auto=compress,format&fit=crop&h=353&w=616&s=24ed82654ecaa67252feccb8e64f3ee5'),
('switch', 'Animal Crossing New Horizons', 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/software/switch/70010000027619/9989957eae3a6b545194c42fec2071675c34aadacd65e6b33fdfe7b3b6a86c3a'),
('switch', 'Captain Toad', 'https://s3.gaming-cdn.com/images/products/4187/orig/captain-toad-treasure-tracker-episode-special-switch-switch-jeu-nintendo-eshop-europe-cover.jpg?v=1666177042'),
('switch', 'Hollow Knight', 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/fr_CA/games/switch/h/hollow-knight-switch/hero'),
('switch', 'Kirby Star Allies', 'https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_KirbyStarAllies_image1600w.jpg'),
('switch', 'Luigi\'s Mansion 3', 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/software/switch/70010000001620/2b166fb3197dacfde1d939acd6a976b9fbe3b1a32c54f9f0d2c8d23efb22412d'),
('switch', 'Mario Tennis Aces', 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/software/switch/70010000003889/7d4bb0a9ace1fb56a41aae8ef0d4ee806419e6187afdb4697a598458f02cd8e7'),
('switch', 'Zelda BOTW', 'http://geektest.fr/wp-content/uploads/2017/05/BOTW-Share_icon.jpg'),
('xbox one', 'Hollow Knight', 'https://hb.imgix.net/d73d29a560b20cb200d6f6d7daf935043b6edd8a.jpeg?auto=compress,format&fit=crop&h=353&w=616&s=24ed82654ecaa67252feccb8e64f3ee5'),
('xbox one', 'Minecraft', 'https://s3.gaming-cdn.com/images/products/2369/orig/minecraft-xbox-one-xbox-series-x-s-xbox-one-xbox-series-x-s-jeu-microsoft-store-cover.jpg?v=1677838142');

-- --------------------------------------------------------

--
-- Structure de la table `posses`
--

CREATE TABLE `posses` (
  `user_id` int(11) NOT NULL,
  `g_name` varchar(50) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `finished` int(11) DEFAULT NULL,
  `succes` varchar(10) DEFAULT NULL,
  `playtime` time DEFAULT NULL,
  `objectives` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posses`
--

INSERT INTO `posses` (`user_id`, `g_name`, `c_name`, `finished`, `succes`, `playtime`, `objectives`) VALUES
(1, 'Hollow Knight', 'steam', 1, NULL, NULL, NULL),
(1, 'Hollow Knight', 'switch', 1, NULL, NULL, NULL),
(1, 'Luigi\'s Mansion 3', 'switch', 2, NULL, '49:10:03', NULL),
(1, 'Mario Tennis Aces', 'switch', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`) VALUES
(1, 'AIRONE'),
(2, 'Lucilink'),
(3, 'Hoek');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`c_name`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`c_name`,`g_name`);

--
-- Index pour la table `posses`
--
ALTER TABLE `posses`
  ADD PRIMARY KEY (`user_id`,`g_name`,`c_name`),
  ADD KEY `c_name` (`c_name`,`g_name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posses`
--
ALTER TABLE `posses`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`c_name`) REFERENCES `console` (`c_name`);

--
-- Contraintes pour la table `posses`
--
ALTER TABLE `posses`
  ADD CONSTRAINT `posses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posses_ibfk_2` FOREIGN KEY (`c_name`,`g_name`) REFERENCES `games` (`c_name`, `g_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
