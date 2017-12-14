-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 14 Décembre 2017 à 10:45
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `demenagement`
--

-- --------------------------------------------------------

--
-- Structure de la table `piece_of_furniture`
--

CREATE TABLE `piece_of_furniture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_furniture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `piece_of_furniture`
--

INSERT INTO `piece_of_furniture` (`id`, `name`, `type_furniture_id`) VALUES
(1, 'grand carton', 1),
(2, 'petit carton', 1),
(3, 'canapé 2 places', 2),
(4, 'canapé 3 places', 2),
(5, 'canapé d\'angle', 2),
(6, 'clic-clac', 2),
(7, 'banc', 3),
(8, 'chaise', 3),
(9, 'chaise de bureau', 3),
(10, 'chaise haute/chaise bébé', 3),
(11, 'chaise pliante', 3),
(12, 'chaise pvc/extérieur', 3),
(13, 'fauteuil/méridienne', 3),
(14, 'pouf', 3),
(15, 'tabouret', 3),
(16, 'guéridon/table d\'appoint', 4),
(17, 'table 2-4 personnes', 4),
(18, 'table 6-8 personnes', 4),
(19, 'table monastère en chêne', 4),
(20, 'table pliante', 4),
(21, 'table ronde', 4),
(22, 'halogène', 5),
(23, 'lampe à abat-jour', 5),
(24, 'lustre', 5),
(25, 'aquarium', 6),
(26, 'miroir', 6),
(27, 'tableau/cadre', 6),
(28, 'tapis', 6),
(29, 'armoire 1 porte', 7),
(30, 'armoire 2 portes', 7),
(31, 'armoire 3 portes', 7),
(32, 'armoire 4 portes/dressing', 7),
(33, 'bar', 7),
(34, 'bibliothèque', 7),
(35, 'bibliothèque lourde', 7),
(36, 'buffet 2 corps', 7),
(37, 'buffet bas', 7),
(38, 'bureau', 7),
(39, 'caisson de bureau', 7),
(40, 'coffre fort (max 200kg)', 7),
(41, 'commode', 7),
(42, 'console', 7),
(43, 'desserte de cuisine', 7),
(44, 'élément 1 porte', 7),
(45, 'élément 2 portes', 7),
(46, 'étagère basse', 7),
(47, 'étagère haute', 7),
(48, 'horloge comtoise', 7),
(49, 'meuble à chaussures', 7),
(50, 'meuble tv bas', 7),
(51, 'meuble tv haut', 7),
(52, 'plan de travail/planches', 7),
(53, 'plateau de verre', 7),
(54, 'porte-manteaux', 7),
(55, 'secrétaire', 7),
(56, 'semainier', 7),
(57, 'table à langer', 7),
(58, 'table basse', 7),
(59, 'table de chevet', 7),
(60, 'vaisselier', 7),
(61, 'vitrine', 7),
(62, 'chaine hi-fi / home cinéma', 8),
(63, 'enceinte hi-fi', 8),
(64, 'ordinateur', 8),
(65, 'petite imprimante', 8),
(66, 'photocopieur bureau', 8),
(67, 'tv', 8),
(68, 'aspirateur', 9),
(69, 'cave à vin', 9),
(70, 'climatiseur', 9),
(71, 'congélateur', 9),
(72, 'cuisinière', 9),
(73, 'four', 9),
(74, 'four micro-onde', 9),
(75, 'frigo américain', 9),
(76, 'hotte', 9),
(77, 'lave-linge', 9),
(78, 'lave-vaisselle', 9),
(79, 'machine/table à coudre', 9),
(80, 'petit électroménager', 9),
(81, 'radiateur', 9),
(82, 'réfrigérateur top/cave à vin', 9),
(83, 'réfrigérateur-grand', 9),
(84, 'sèche-linge', 9),
(85, 'table à repasser', 9),
(86, 'ventilateur', 9),
(87, 'barbecue', 10),
(88, 'brouette', 10),
(89, 'caisse à outils', 10),
(90, 'chaise longue', 10),
(91, 'chaise pvc/extérieur', 10),
(92, 'cheminée', 10),
(93, 'escabeau/échelle', 10),
(94, 'établi', 10),
(95, 'grande plante', 10),
(96, 'jardinière x 4', 10),
(218, 'Nettoyeur haute pression', 10),
(219, 'outillage jardin', 10),
(220, 'parasol', 10),
(221, 'petite plante', 10),
(222, 'piano droit', 10),
(223, 'pneus de voiture', 10),
(224, 'siège auto', 10),
(225, 'table de jardin', 10),
(226, 'toboggan', 10),
(227, 'tondeuse', 10),
(228, 'vélo', 10),
(229, 'arbre à chats', 11),
(230, 'babyfoot', 11),
(231, 'balancelle', 11),
(232, 'banc/appareil musculation', 11),
(233, 'billard', 11),
(234, 'canne à pêche', 11),
(235, 'flipper', 11),
(236, 'guitare', 11),
(237, 'harpe', 11),
(238, 'matériel de ski', 11),
(239, 'moto/scooter', 11),
(240, 'moto side-car', 11),
(241, 'piano droit', 11),
(242, 'piano numérique', 11),
(243, 'piano quart de queue', 11),
(244, 'planche de surf', 11),
(245, 'quad', 11),
(246, 'synthétiseur', 11),
(247, 'table de ping pong', 11),
(248, 'tapis de course', 11),
(249, 'vélo d\'appartement', 11),
(250, 'bac de rangement (50*50*40 cm maximum)', 12),
(251, 'coffre/malle/cantine', 12),
(252, 'pack 10 bouteilles', 12),
(253, 'penderie 50 cm linéaire', 12),
(254, 'poubelle', 12),
(255, 'poussette', 12),
(256, 'sèche linge pliable', 12),
(257, 'valise', 12),
(258, 'chauffeuse', 13),
(259, 'lit 1 place', 13),
(260, 'li 2 places', 13),
(261, 'lit bébé', 13),
(262, 'lit mezzanine', 13),
(263, 'lit pliable', 13),
(264, 'matelas double', 13),
(265, 'matelas simple', 13),
(266, 'sommier double', 13),
(267, 'sommier simple', 13),
(268, 'tete de lit', 13);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `room`
--

INSERT INTO `room` (`id`, `name`) VALUES
(1, 'cuisine'),
(2, 'salon'),
(3, 'salle à manger'),
(4, 'salle de bain'),
(5, 'wc'),
(6, 'chambre 1'),
(7, 'chambre 2'),
(8, 'chambre 3'),
(9, 'garage'),
(10, 'entrée'),
(11, 'chambre 4');

-- --------------------------------------------------------

--
-- Structure de la table `type_furniture`
--

CREATE TABLE `type_furniture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `type_furniture`
--

INSERT INTO `type_furniture` (`id`, `name`) VALUES
(1, 'cartons'),
(2, 'canapés'),
(3, 'sièges'),
(4, 'tables'),
(5, 'luminaires'),
(6, 'décorations'),
(7, 'meubles'),
(8, 'high-tech'),
(9, 'electroménager'),
(10, 'extérieur'),
(11, 'loisirs'),
(12, 'rangements'),
(13, 'literie'),
(14, 'autres');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `piece_of_furniture`
--
ALTER TABLE `piece_of_furniture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A013480748173FC6` (`type_furniture_id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_furniture`
--
ALTER TABLE `type_furniture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `piece_of_furniture`
--
ALTER TABLE `piece_of_furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;
--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `type_furniture`
--
ALTER TABLE `type_furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `piece_of_furniture`
--
ALTER TABLE `piece_of_furniture`
  ADD CONSTRAINT `FK_A013480748173FC6` FOREIGN KEY (`type_furniture_id`) REFERENCES `type_furniture` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
