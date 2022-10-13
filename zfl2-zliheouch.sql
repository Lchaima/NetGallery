-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 27 avr. 2022 à 23:33
-- Version du serveur :  10.3.9-MariaDB-log
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zfl2-zliheouch`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire_cmt`
--

CREATE TABLE `t_commentaire_cmt` (
  `cmt_id` int(11) NOT NULL,
  `cmt_date_heure` datetime NOT NULL,
  `cmt_texte` varchar(300) NOT NULL,
  `vis_id` int(11) NOT NULL,
  `cmt_etat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_commentaire_cmt`
--

INSERT INTO `t_commentaire_cmt` (`cmt_id`, `cmt_date_heure`, `cmt_texte`, `vis_id`, `cmt_etat`) VALUES
(2, '2022-01-29 14:45:10', 'c\'était trés intéressant', 2, 'P'),
(3, '2022-01-29 11:32:45', 'It was inspiring, i really liked it ', 3, 'P'),
(4, '2022-02-16 13:28:11', 'une découverte ! je n\'étais  pas interessée par la mode avant mais maintenant, jai plus d\'envie à découvrir ce monde ', 6, 'P'),
(5, '2022-03-02 13:12:10', 'it was amazing ', 7, 'P'),
(6, '2022-02-27 16:55:23', 'it was one of my favourite expo i have ever been', 8, 'P'),
(7, '2022-04-26 14:37:16', 'wow', 11, 'P'),
(8, '2022-04-26 15:27:56', 'test en cours', 12, 'P');

-- --------------------------------------------------------

--
-- Structure de la table `t_compte_cpt`
--

CREATE TABLE `t_compte_cpt` (
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cpt_mot_de_passe` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_compte_cpt`
--

INSERT INTO `t_compte_cpt` (`cpt_pseudo`, `cpt_mot_de_passe`) VALUES
('Admin1', 'c9d44d50bcd358be99323258e379f1b6'),
('Admin2', 'ac40edd51e7000e6ca9531cf8a23bcd4'),
('Admin3', '2b2be8a94223764c4cc744b3a983af5a'),
('centre_pompidou', '545762f7fe5977f5d51083d6ea2cdb48'),
('gEstionnaire', '98abb15e560057e55e4e99187702ed4e'),
('institut_mode_Paris', '659058138fcf71526f4ac2863e70a67d'),
('ministere_culture', '308f09b210ed13662a24601b9a191868'),
('sasa00', 'cf2307acbf88eb0ea6fc63935fa20768');

-- --------------------------------------------------------

--
-- Structure de la table `t_configuration_con`
--

CREATE TABLE `t_configuration_con` (
  `con_intitule` varchar(80) NOT NULL,
  `con_date_debut` datetime NOT NULL,
  `con_date_fin` datetime NOT NULL,
  `con_presentation` varchar(80) NOT NULL,
  `con_lieu` varchar(60) NOT NULL,
  `con_date_vernissage` datetime NOT NULL,
  `con_txt_bienvenue` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_configuration_con`
--

INSERT INTO `t_configuration_con` (`con_intitule`, `con_date_debut`, `con_date_fin`, `con_presentation`, `con_lieu`, `con_date_vernissage`, `con_txt_bienvenue`) VALUES
('La mode féminine au XXe siècle', '2022-02-02 09:00:00', '2022-05-01 17:00:00', 'des oeuvres de différents créateurs de mode seront exposées à la galerie', 'Le centre national d’art et de culture Georges-Pompidou', '2022-02-01 11:00:00', 'on attend votre visite!');

-- --------------------------------------------------------

--
-- Structure de la table `t_exposant_exp`
--

CREATE TABLE `t_exposant_exp` (
  `exp_id` int(11) NOT NULL,
  `exp_nom` varchar(80) NOT NULL,
  `exp_prenom` varchar(80) NOT NULL,
  `exp_text_biographique` varchar(300) NOT NULL,
  `exp_mail` varchar(100) DEFAULT NULL,
  `exp_URL` varchar(200) DEFAULT NULL,
  `exp_image` varchar(150) DEFAULT NULL,
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_exposant_exp`
--

INSERT INTO `t_exposant_exp` (`exp_id`, `exp_nom`, `exp_prenom`, `exp_text_biographique`, `exp_mail`, `exp_URL`, `exp_image`, `cpt_pseudo`) VALUES
(50, 'Poiret', 'Paul', 'Paul Poiret est un grand couturier et parfumeur français, né le 20 avril 1879 à Paris, où il est mort le 30 avril 1944. Connu pour ses audaces, il est considéré comme un précurseur du style Art déco. Il crée la maison de couture qui porte son nom en 1903', NULL, NULL, 'poiret.jpg', 'gEstionnaire'),
(51, 'Chasnel', 'Gabrielle', 'Coco Chanel, est une créatrice de mode, modiste et grande couturière française, née le 19 août 1883 à Saumur et morte le 10 janvier 1971 à l\'hôtel Ritz de Paris.Célèbre pour ses créations de haute couture, elle est à l\'origine de la maison Chanel, « symbole de l\'élégance française', NULL, 'https://www.chanel.com', 'chanel.jpg', 'gEstionnaire'),
(52, 'Azzedine', 'Alaia', '\'Azzedine Alaïa, né le 26 février 1935 à Tunis et mort le 18 novembre 2017 à Paris 10ᵉ, est un styliste et grand couturier franco-tunisien.Durant sa jeunesse à Tunis, il suit brièvement des études de sculpture mais il décide de changer de voie, en abordant la couture.\'', NULL, 'https://www.maison-alaia.com', 'alaia.jpg', 'institut_mode_Paris'),
(53, 'Versace', 'Giovanni Maria', 'Giovanni Maria Versace, dit Gianni Versace, né le 2 décembre 1946 à Reggio de Calabre et mort le 15 juillet 1997 à Miami Beach, est un styliste italien et le fondateur de la marque Versace, réputée internationalement pour ses créations vestimentaires et cosmétiques.', NULL, 'https://www.versace.com', 'versace.jpg', 'ministere_culture'),
(54, 'Lagerfeld', 'Karl Otto', 'Karl Otto Lagerfeld, né le 10 septembre 1933 à Hambourg et mort le 19 février 2019 à Neuilly-sur-Seine, est un grand couturier et styliste allemand, également photographe, dessinateur, designer, réalisateur et éditeur.', NULL, 'https://www.karl.com', 'karl.jpg', 'Admin1'),
(55, 'Kirkland', 'Douglas', 'Douglas Kirkland est né à Toronto au Canada. Il a rejoint Look Magazine au début de la vingtaine, puis Life Magazine. Parmi ses missions figuraient des travaux sur la mode et les célébrités, photographiant Marilyn Monroe, Elizabeth Taylor et Marlene Dietrich, entre autres.', 'info@douglaskirkland.com', 'http://www.douglaskirkland.com/', 'douglas_kirkland.jpg', 'centre_pompidou'),
(56, 'Avedon', 'Richard', 'Richard Avedon (né le 15 mai 1923 à New York et mort le 1er octobre 20041 à San Antonio au Texas) est un photographe de mode puis un portraitiste américain ayant travaillé ou collaboré avec les magazines Harper\'s Bazaar, Life et Vogue pendant 25 ans.', NULL, NULL, 'richard_avedon.jpg', 'centre_pompidou'),
(57, 'Iribe', 'Paul', 'Joseph-Paul Iribe né le 8 juin 1883 à Angoulême et mort le 21 septembre 1935 à Roquebrune est un dessinateur, illustrateur de mode, affichiste, patron de presse, réalisateur et décorateur français', NULL, NULL, 'paul_Iribe.jpg', 'institut_mode_Paris');

-- --------------------------------------------------------

--
-- Structure de la table `t_news_new`
--

CREATE TABLE `t_news_new` (
  `new_id` int(11) NOT NULL,
  `new_titre` varchar(50) NOT NULL,
  `new_texte` varchar(300) NOT NULL,
  `new_date` date NOT NULL,
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_news_new`
--

INSERT INTO `t_news_new` (`new_id`, `new_titre`, `new_texte`, `new_date`, `cpt_pseudo`) VALUES
(1, 'Welcome at the Net\'Gallery', 'l\'expo Net\'Gallery ouvre ses portes le 28-01-2022 à Paris', '2022-01-30', 'gEstionnaire'),
(2, 'Net\'Gallery? qu\'est ce que c\'est ?', ' Net\'Gallery est une exposition sur l\'évolution de la mode féminine au 20ième siècles , nous vous présentons les oeuvres les plus marquantes du monde de la mode. Des oeuvres réalisées par des créateurs qui ont révolutionné le domaine de Fashion design', '2022-01-30', 'Admin1'),
(3, 'CHANEL à Net\'Gallery', 'les oeuvres de chanel sont dans notre expo !', '2022-02-21', 'Admin1'),
(4, '3D show: Gianni Versace', '20 minutes dans le monde de Gianni Versace pour en savoir plus sur l\'évolution de la marque Versace', '2022-02-24', 'centre_pompidou');

-- --------------------------------------------------------

--
-- Structure de la table `t_oeuvre_oev`
--

CREATE TABLE `t_oeuvre_oev` (
  `oev_id` int(11) NOT NULL,
  `oev_intitule` varchar(50) NOT NULL,
  `oev_date` year(4) NOT NULL,
  `oev_description` varchar(300) NOT NULL,
  `oev_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_oeuvre_oev`
--

INSERT INTO `t_oeuvre_oev` (`oev_id`, `oev_intitule`, `oev_date`, `oev_description`, `oev_image`) VALUES
(1, 'robe d\'été', 1912, 'robe d\'été fleurie de la collection d\'été 1912 fait par le créateur de mode Paul Poiret.\r\nc\'est une robe en mousseline de coton : un tissu léger et fluide.on notera la présence d\'une broderie de coton au point de tige et de noeud ainsi l\'application de croquet.', 'robe_ete_paul_poiret_1912.jpg'),
(2, 'Garden Party Dress', 1911, 'cette robe est créée pour être portée sans corset. elle est caractérisée par sa taille haute et sa silhouette cintrée qui rappellent le \"style Empire\".\r\nLe corsage et l\'ourlet de la jupe sont décorés par des motifs de roses préférés de Poiret.', 'garden_dress.jpg'),
(3, 'le tailleur Tweed', 1954, 'un vêtement inspiré du vestiaire masculin est à la fois simple et élégant.Un tailleur en tweed de laine caractérisé par la présence de quatre véritables poches, d’une ganse ton sur ton ou contrastée, d’une boutonnière, de boutons frappés des symboles de la maison.', 'tailleur_tweed.jpg'),
(4, 'evening ensemble', 1935, 'c\'est une tenue de soirée glamour entièrement ornée de paillettes appliquées sur un champs uniforme ce qui mettait en valeur l\'austérité monochromatique d\'un vêtement ainsi que sa silhouette droite, généralement tubulaire.', 'evening_ensemble.jpg'),
(5, 'COCO chanel', 1962, 'c\'est un portrait de la grande créatrice de mode Gabrielle CHANEL de la série photographique \"coco Chanel\" qui capture le monde de cette icône.', 'kirkland-chanel.jpg'),
(6, 'House of chanel', 1962, 'Il s\'agit d\'une photographie de la série \"coco chanel\" mettant en scène des mannequins habillés par Gabrielle chanel.', 'kirkland-chanel-1.jpg'),
(7, 'Fall/Winter compaign', 1992, 'une photographie de la campagne automne/hiver 1992.\r\nnotez la présence d\'imprimés accrocheurs tels que Malabar dans différentes couleurs, les tissus de soie et les pantalons en cuir.\r\nla maison italienne Versace incarne une féminité assumée grâce à des silhouettes légèrement provocantes.', 'versace_90s.jpg'),
(8, 'ensemble en cuir', 1992, 'il est de la collection \"Miss S&M\" Automne/Hiver 1992 de Gianni Versace.\r\nmettant des motifs emblématiques de la marque en plusieurs couleurs et les ceintures chaines qui ont apporté le pouvoir et la culture pop sur le podium bien avant tout le monde.', 'versace_Avedon.jpg'),
(9, 'evening ensemble Fall/Winter 1990-1991', 1990, 'Lagerfeld, qui a pris le 18ème siècle comme motif de sa mode,est inspiré de la de la robe de cour, s\'ouvrant sur le devant central. Pour Lagerfeld, la robe est à la fois Versailles et danseur, aristocratie et vulgarité. cette robe est l\'une des références de Lagerfeld pour Chanel au 18ème siècle.', 'lagrefed_chanel.jpg'),
(10, 'Robe de cocktail \"Angkor\" ', 1983, 'Il s\'agit d\'une robe fait en crêpe et organza noir avec des broderie de tubes en verre, perles dorés, filé or et strass montés à griffes.une robe à découpe sur les 2 cotés qui montre l\'approche unique et moderne de Lagerfeld.', 'lagerfeld.jpg'),
(11, 'Dress spring/summer', 1994, 'Azzedine Alaïa est connu pour son association de techniques de couture traditionnelles. Ici, une alternance de bandes de maille noire et blanche souligne les contours de la silhouette.Les mailles d\'Alaïa sculptent subtilement le corps en créant des tensions variées dans des zones précises.', 'azzaidin_alaia_dress.jpg'),
(12, 'Iribe illustration des modes par Paul Poiret', 1908, 'c\'est une de planche de l\'album fait par Paul Iribe qui représente les principales créations de Paul Poiret .Présentées dans une mise en page influencée par les estampes japonaises, les robes droites, à taille très haute, s’inspirent de la ligne Directoire. ', 'Iribe_Paul_Poiret.jpg'),
(13, 'alaiaXtati', 1991, 'c\'est une combinaison de la collaboration de la maison alaia avec la marque de distribution TATI. la pièce est faite de tissu avec un gros motif pied-de-coq rose et blanc célèbre de la marque Tati.Ce motif, associé à certains quartiers populaires où la vie de la rue était vivante et animée.', 'alaia-tati.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_presentation_pre`
--

CREATE TABLE `t_presentation_pre` (
  `exp_id` int(11) NOT NULL,
  `oev_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_presentation_pre`
--

INSERT INTO `t_presentation_pre` (`exp_id`, `oev_id`) VALUES
(50, 1),
(50, 2),
(50, 12),
(51, 3),
(51, 4),
(51, 6),
(51, 9),
(52, 11),
(52, 13),
(53, 7),
(53, 8),
(54, 9),
(54, 10),
(55, 5),
(55, 6),
(56, 8),
(57, 12);

-- --------------------------------------------------------

--
-- Structure de la table `t_profil_pfl`
--

CREATE TABLE `t_profil_pfl` (
  `pfl_nom` varchar(80) NOT NULL,
  `pfl_prenom` varchar(80) NOT NULL,
  `pfl_email` varchar(100) NOT NULL,
  `pfl_role` char(1) NOT NULL,
  `pfl_validite` char(1) NOT NULL,
  `pfl_date` date DEFAULT NULL,
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_profil_pfl`
--

INSERT INTO `t_profil_pfl` (`pfl_nom`, `pfl_prenom`, `pfl_email`, `pfl_role`, `pfl_validite`, `pfl_date`, `cpt_pseudo`) VALUES
('Thomas', 'Paul', 'ThomasPaul@gmail.com', 'A', 'A', '2021-12-15', 'Admin1'),
('Dubois', 'Sarah', 'Dubois.sarah@gmail.com', 'A', 'A', '2021-12-15', 'Admin2'),
('Liheouel', 'Mourad', 'Lmourad67@gmail.com', 'A', 'D', '2022-02-24', 'Admin3'),
('Louis', 'Christelle', 'Louis.Christelle@pompidou.fr', 'O', 'A', '2022-01-29', 'centre_pompidou'),
('Durand', 'Camille', 'Durand.Camille@gmail.com', 'A', 'A', '2021-12-05', 'gEstionnaire'),
('Lambert', 'Marie', 'Marie.Lambert@institut-mode-paris.fr', 'O', 'A', '2022-01-23', 'institut_mode_Paris'),
('Robert', 'Clement', 'Clement.Robert@ministere-culture.fr', 'O', 'A', '2022-01-15', 'ministere_culture'),
('le billon', 'sarrah', 'sarrah@gmail.com', 'O', 'A', '2022-04-26', 'sasa00');

-- --------------------------------------------------------

--
-- Structure de la table `t_visiteur_vis`
--

CREATE TABLE `t_visiteur_vis` (
  `vis_id` int(11) NOT NULL,
  `vis_mot_de_passe` char(15) NOT NULL,
  `vis_date` datetime NOT NULL,
  `vis_nom` varchar(80) DEFAULT NULL,
  `vis_prenom` varchar(80) DEFAULT NULL,
  `vis_mail` varchar(80) DEFAULT NULL,
  `cpt_pseudo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_visiteur_vis`
--

INSERT INTO `t_visiteur_vis` (`vis_id`, `vis_mot_de_passe`, `vis_date`, `vis_nom`, `vis_prenom`, `vis_mail`, `cpt_pseudo`) VALUES
(2, 'vis112_exp2022!', '2022-01-29 12:00:10', 'Amine', 'Aicha', 'Amine.aicha@gmail.com', 'Admin1'),
(3, 'vis113_exp2022!', '2022-01-29 10:45:30', 'ghorbel', 'Hani', 'Ghorbel.hani@gmail.com', 'Admin2'),
(4, 'vis114_exp2022!', '2022-02-08 16:00:02', NULL, NULL, NULL, 'centre_pompidou'),
(5, 'vis115_exp2022!', '2022-02-11 15:16:02', NULL, NULL, NULL, 'centre_pompidou'),
(6, 'vis116_exp2022!', '2022-02-16 11:35:56', 'Martin', 'Camille', 'Camille1997M@gmail.com', 'gEstionnaire'),
(7, 'vis117_exp2022!', '2022-03-02 10:41:32', 'Richard', 'steven', 'richard_1991@gmail.com', 'Admin1'),
(8, 'vis118_exp2022!', '2022-02-27 15:26:30', 'Joundy', 'Janet', 'J.Janet2001@gmail.com', 'Admin3'),
(9, 'vis119_exp2022!', '2022-04-19 13:31:45', NULL, NULL, NULL, 'ministere_culture'),
(10, 'vis121_exp2022!', '2022-04-20 14:20:43', NULL, NULL, NULL, 'Admin2'),
(11, 'vis715_exp2022!', '2022-04-26 14:27:35', 'Abdelhedi', 'Zouhour', 'adlehedi@gmail.com', 'Admin1'),
(12, 'vis332_exp2022!', '2022-04-26 15:26:55', 'm', 'v', 'v@gmail.com', 'sasa00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_commentaire_cmt`
--
ALTER TABLE `t_commentaire_cmt`
  ADD UNIQUE KEY `t_commentaire_cmt_PK` (`cmt_id`),
  ADD KEY `t_cmt_t_vis_FK` (`vis_id`);

--
-- Index pour la table `t_compte_cpt`
--
ALTER TABLE `t_compte_cpt`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_exposant_exp`
--
ALTER TABLE `t_exposant_exp`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `t_exp_t_cpt_FK` (`cpt_pseudo`);

--
-- Index pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `t_new_t_cpt_FK` (`cpt_pseudo`);

--
-- Index pour la table `t_oeuvre_oev`
--
ALTER TABLE `t_oeuvre_oev`
  ADD PRIMARY KEY (`oev_id`);

--
-- Index pour la table `t_presentation_pre`
--
ALTER TABLE `t_presentation_pre`
  ADD PRIMARY KEY (`exp_id`,`oev_id`),
  ADD KEY `fk_pre_oev` (`oev_id`);

--
-- Index pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD PRIMARY KEY (`cpt_pseudo`);

--
-- Index pour la table `t_visiteur_vis`
--
ALTER TABLE `t_visiteur_vis`
  ADD PRIMARY KEY (`vis_id`),
  ADD KEY `t_vis_t_cpt_FK` (`cpt_pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_commentaire_cmt`
--
ALTER TABLE `t_commentaire_cmt`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_exposant_exp`
--
ALTER TABLE `t_exposant_exp`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_oeuvre_oev`
--
ALTER TABLE `t_oeuvre_oev`
  MODIFY `oev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_visiteur_vis`
--
ALTER TABLE `t_visiteur_vis`
  MODIFY `vis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commentaire_cmt`
--
ALTER TABLE `t_commentaire_cmt`
  ADD CONSTRAINT `t_cmt_t_vis_FK` FOREIGN KEY (`vis_id`) REFERENCES `t_visiteur_vis` (`vis_id`);

--
-- Contraintes pour la table `t_exposant_exp`
--
ALTER TABLE `t_exposant_exp`
  ADD CONSTRAINT `t_exp_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_news_new`
--
ALTER TABLE `t_news_new`
  ADD CONSTRAINT `t_new_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_presentation_pre`
--
ALTER TABLE `t_presentation_pre`
  ADD CONSTRAINT `fk_pre_exp` FOREIGN KEY (`exp_id`) REFERENCES `t_exposant_exp` (`exp_id`),
  ADD CONSTRAINT `fk_pre_oev` FOREIGN KEY (`oev_id`) REFERENCES `t_oeuvre_oev` (`oev_id`);

--
-- Contraintes pour la table `t_profil_pfl`
--
ALTER TABLE `t_profil_pfl`
  ADD CONSTRAINT `t_pfl_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);

--
-- Contraintes pour la table `t_visiteur_vis`
--
ALTER TABLE `t_visiteur_vis`
  ADD CONSTRAINT `t_vis_t_cpt_FK` FOREIGN KEY (`cpt_pseudo`) REFERENCES `t_compte_cpt` (`cpt_pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
