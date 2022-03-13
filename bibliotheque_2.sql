-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 13 mars 2022 à 21:51
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`id`, `libelle`) VALUES
(1, 'ajouter'),
(2, 'modifier'),
(3, 'supprimer'),
(4, 'clôturer');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom_de_plume` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `nom_de_plume`, `adresse`, `ville`, `code_postal`, `mail`, `numero`, `photo`) VALUES
(1, 'Rowling ', 'Joanne', 'J. K. Rowling', '246 Rue d\'angleterre', 'Yate', '01454', 'Rowling@bilbiotheque.fr', '0102030405', 'J._K._Rowling.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `auteur_livre`
--

DROP TABLE IF EXISTS `auteur_livre`;
CREATE TABLE IF NOT EXISTS `auteur_livre` (
  `id_auteur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  KEY `id_auteur` (`id_auteur`),
  KEY `id_livre_auteur` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur_livre`
--

INSERT INTO `auteur_livre` (`id_auteur`, `id_livre`, `date`) VALUES
(1, 1, NULL),
(1, 2, NULL),
(1, 3, NULL),
(1, 4, NULL),
(1, 5, NULL),
(1, 6, NULL),
(1, 7, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Horreur'),
(2, 'Roman'),
(3, 'Action'),
(4, 'Jeunesse'),
(5, 'Société'),
(6, 'Romance'),
(7, 'Cuisine'),
(8, 'Science-fiction'),
(9, 'Manga'),
(10, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_livre`
--

DROP TABLE IF EXISTS `categorie_livre`;
CREATE TABLE IF NOT EXISTS `categorie_livre` (
  `id_categorie` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  KEY `id_categorie` (`id_categorie`),
  KEY `id_livre_categorie` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_livre`
--

INSERT INTO `categorie_livre` (`id_categorie`, `id_livre`) VALUES
(4, 1),
(8, 1),
(4, 2),
(8, 2),
(4, 3),
(8, 3),
(4, 4),
(8, 4),
(4, 5),
(8, 5),
(4, 6),
(8, 6),
(4, 7),
(8, 7);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `denomination` varchar(255) NOT NULL,
  `siret` varchar(14) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numero_tel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id`, `denomination`, `siret`, `adresse`, `ville`, `code_postal`, `mail`, `numero_tel`) VALUES
(1, 'Bloomsbury Publishing', '12345678998741', '147 Rue des editeurs', 'Londres', '01020', 'Bloomsbury-Publishing@bibliotheque.fr', '0504030201');

-- --------------------------------------------------------

--
-- Structure de la table `editeur_livre`
--

DROP TABLE IF EXISTS `editeur_livre`;
CREATE TABLE IF NOT EXISTS `editeur_livre` (
  `id_editeur` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `nb_exemplaire` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  KEY `id_editeur` (`id_editeur`),
  KEY `id_livre_editeur` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur_livre`
--

INSERT INTO `editeur_livre` (`id_editeur`, `id_livre`, `nb_exemplaire`, `date`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(1, 5, NULL, NULL),
(1, 6, NULL, NULL),
(1, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `libelle`) VALUES
(1, 'Neuf'),
(2, 'Bon'),
(3, 'Moyen'),
(4, 'Détérioré');

-- --------------------------------------------------------

--
-- Structure de la table `etat_livre`
--

DROP TABLE IF EXISTS `etat_livre`;
CREATE TABLE IF NOT EXISTS `etat_livre` (
  `id_livre` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  KEY `id_etat` (`id_etat`),
  KEY `id_livre` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat_livre`
--

INSERT INTO `etat_livre` (`id_livre`, `id_etat`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_ISBN` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `illustration` varchar(255) DEFAULT NULL,
  `resume` longtext NOT NULL,
  `prix` double NOT NULL,
  `nb_pages` int(11) NOT NULL,
  `date_achat` date NOT NULL,
  `disponibilite` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `num_ISBN`, `titre`, `illustration`, `resume`, `prix`, `nb_pages`, `date_achat`, `disponibilite`) VALUES
(1, '123-456-778', 'Harry Potter à l\'école des sorciers', 'hp1.jpg', 'Après la mort de ses parents (Lily et James Potter), Harry Potter est recueilli par sa tante maternelle Pétunia et son oncle Vernon à l\'âge d\'un an. Ces derniers, animés depuis toujours d\'une haine féroce envers les parents du garçon qu\'ils qualifient de gens « bizarres », voire de « monstres », traitent froidement leur neveu et demeurent indifférents aux humiliations que leur fils Dudley lui fait subir. Harry ignore tout de l\'histoire de ses parents, si ce n\'est qu\'ils ont été, semble-t-il, tués dans un accident de voiture. Cependant, le jour des onze ans de Harry, un demi-géant du nom de Rubeus Hagrid vient le chercher pour l\'informer de son inscription à Poudlard, une école de sorcellerie où il est inscrit depuis sa naissance, et lui remettre sa lettre. Il lui révèle qu’il a toujours été un sorcier, tout comme l\'étaient ses parents, tués en réalité par le plus puissant mage noir du monde de la sorcellerie.', 9.99, 305, '2008-03-13', 0),
(2, '222-555-888', 'Harry Potter et la Chambre des secrets', 'hp2.jpg', 'Fin juillet, Harry reçoit la visite de Dobby, un elfe de maison, qui le met en garde et lui conseille de ne pas retourner à Poudlard où un dangereux complot se préparerait. Mais Harry choisit d\'ignorer cet avertissement. En réponse, Dobby provoque un incident dans la cuisine des Dursley. Furieux, l\'oncle Vernon enferme Harry dans sa chambre en lui interdisant de retourner à Poudlard. Ron et ses deux frères Fred et George viennent donc le libérer à l\'aide d\'une vieille voiture volante, empruntée à leur père, et Harry rejoint le Terrier, la maison familiale des Weasley, pour y passer le restant de l\'été. ', 19.99, 364, '2002-02-05', 0),
(3, '333-555-777', 'Harry Potter et le Prisonnier d\'Azkaban', 'hp3.jpg', 'Au cours de l\'été, les informations télévisées du monde non magique annoncent l\'évasion d\'un très dangereux prisonnier du nom de Sirius Black8. En parallèle, Harry se rend responsable d\'un incident magique avec la tante Marge, la sœur de Vernon, et s\'enfuit de la maison de son oncle et sa tante. Il rencontre dans la rue une sorte de chien errant caché dans la pénombre, avec de grands yeux scintillants. Dans sa panique, il fait apparaître le Magicobus par erreur, et en profite pour demander à être conduit au Chaudron Baveur, à Londres. Dans le bus, Harry apprend que Sirius Black était un fidèle partisan de lord Voldemort. Peu avant la rentrée, Harry surprend une conversation entre Mr et Mrs. Weasley, les parents de Ron, et est surpris d\'apprendre que Black s\'est en réalité échappé d\'Azkaban pour le retrouver, persuadé que tuer Harry permettrait à Voldemort de retrouver son pouvoir.', 20.99, 474, '2021-11-03', 0),
(4, '555-666-444', 'Harry Potter et la Coupe de feu', 'hp4.jpg', 'De mystérieux meurtres ont été perpétrés dans la maison des Jedusor il y a cinquante ans1. Franck Bryce, un vieil homme moldu qui continue à entretenir le jardin de la demeure, avait été accusé de ces meurtres1 puis relâché faute de preuves. La maison des Jedusor, quant à elle, s\'est dégradée par manque d\'entretien. Un soir, Frank surprend une sinistre réunion entre Voldemort et Peter Pettigrow. Il est assassiné alors qu\'il espionne Voldemort1 et entend de vagues fragments d\'informations. Harry se réveille après avoir vu la scène de l\'assassinat dans son cauchemar et sa cicatrice le brûle. Il décide d\'écrire une lettre à Sirius Black, son parrain, pour l’en avertir. ', 24.99, 656, '2022-03-09', 0),
(5, '444-555-777', 'Harry Potter et l\'Ordre du Phénix', 'hp5.jpg', 'Harry reçoit en fin d\'été une convocation disciplinaire du ministère de la magie pour avoir fait usage de la magie à Little Whinging en présence de son cousin moldu10. En attendant l\'audience, il passe le reste de ses vacances au Square Grimmaurd avec Sirius Black, Hermione, Remus Lupin et la famille Weasley à l\'endroit où est installé le QG11 de l\'Ordre du Phénix, dont les membres tentent d\'éveiller les consciences chez les autres sorciers et faire connaître publiquement le retour de Voldemort12. Les charges pesant contre Harry durant son audience sont finalement abandonnées, grâce au témoignage de Mrs Figg13, membre de l\'Ordre et voisine des Dursley, et à l\'intervention d\'Albus Dumbledore. ', 29.99, 984, '2022-03-09', 0),
(6, '123-456-778', 'Harry Potter et le Prince de sang-mêlé', 'hp6.jpg', 'Rufus Scrimgeour a remplacé Cornelius Fudge au poste de Ministre de la Magie.\r\nSeverus Rogue fait le serment Inviolable envers Narcissa Malefoy: ce serment engage Rogue à aider Drago Malefoy (le fils de Narcissa) à accomplir la mission que Voldemort lui a confiée.\r\nHarry est en vacances chez les Dursley depuis peu lorsque Dumbledore vient le chercher3 pour l\'emmener passer le reste de ses vacances chez les Weasley. En chemin, Dumbledore et Harry rendent visite à Horace Slughorn, un ancien professeur de potions et directeur de la maison de Serpentard. Dumbledore lui demande de reprendre son poste d\'enseignant à Poudlard. Slughorn accepte la proposition.̩\r\nLors de courses au Chemin de Traverse, Harry, Ron et Hermione surprennent Drago Malefoy dans l\'allée des Embrumes, allée entièrement dédiée à la magie noire. Harry pense que Drago est devenu un Mangemort. ', 34.99, 720, '2021-07-22', 0),
(7, '222-555-888', 'Harry Potter et les Reliques de la Mort', 'hp7.jpg', 'Cette année, Harry a 17 ans et ne retourne pas à l\'école de Poudlard après la mort de Dumbledore. Avec Ron et Hermione il se consacre à la dernière mission confiée par Dumbledore, la chasse aux Horcruxes. Mais le Seigneur des Ténèbres règne en maître et traque les trois fidèles amis qui seront réduits à la clandestinité. D\'épreuves en révélations, le courage, les choix et les sacrifices de Harry seront déterminants dans la lutte contre les forces du Mal.', 39.99, 816, '2022-03-17', 0);

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usager` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime DEFAULT NULL,
  `etat_debut` int(11) NOT NULL,
  `etat_retour` int(11) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_livre_location` (`id_livre`),
  KEY `id_usager_location` (`id_usager`),
  KEY `id_etat_avant` (`etat_debut`),
  KEY `id_etat_apres` (`etat_retour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'Admin'),
(2, 'Salarié');

-- --------------------------------------------------------

--
-- Structure de la table `role_utilisateur`
--

DROP TABLE IF EXISTS `role_utilisateur`;
CREATE TABLE IF NOT EXISTS `role_utilisateur` (
  `id_role` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  KEY `id_role` (`id_role`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role_utilisateur`
--

INSERT INTO `role_utilisateur` (`id_role`, `id_utilisateur`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`id`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `mail`) VALUES
(1, 'Michel', 'Jean', '123 rue des usagers', 'Dax', '40100', 'jm@bibliotheque.fr');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `num_telephone` varchar(10) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `pseudo`, `mail`, `mot_de_passe`, `num_telephone`, `avatar`, `adresse`, `ville`, `code_postal`) VALUES
(1, 'Root', 'Admin', 'le patron', 'admin@bibliotheque.fr', '$2y$10$udC/ykKMfbo/.Gh9bawkKOZMNWydzyVzTgsXztVJFcKwGxwfQ7f26', '0102030405', 'user2.png', '123 rue des lilas', 'Bayonne', '64100');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_action`
--

DROP TABLE IF EXISTS `utilisateur_action`;
CREATE TABLE IF NOT EXISTS `utilisateur_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utillisateur` int(11) NOT NULL,
  `id_usager` int(11) DEFAULT NULL,
  `id_livre` int(11) DEFAULT NULL,
  `id_contact` int(11) DEFAULT NULL,
  `id_editeur` int(11) DEFAULT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_etat` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_action` int(11) NOT NULL,
  `id_location` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usager_action` (`id_usager`),
  KEY `id_contact_action` (`id_contact`),
  KEY `id_editeur_action` (`id_editeur`),
  KEY `id_auteur_action` (`id_auteur`),
  KEY `id_livre_action_user` (`id_livre`),
  KEY `id_cat_action` (`id_categorie`),
  KEY `id_etat_action` (`id_etat`),
  KEY `id_location_action` (`id_location`),
  KEY `id_role_action` (`id_role`),
  KEY `id_action_action` (`id_action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteur_livre`
--
ALTER TABLE `auteur_livre`
  ADD CONSTRAINT `id_auteur` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id`),
  ADD CONSTRAINT `id_livre_auteur` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `categorie_livre`
--
ALTER TABLE `categorie_livre`
  ADD CONSTRAINT `id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `id_livre_categorie` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `editeur_livre`
--
ALTER TABLE `editeur_livre`
  ADD CONSTRAINT `id_editeur` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id`),
  ADD CONSTRAINT `id_livre_editeur` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `etat_livre`
--
ALTER TABLE `etat_livre`
  ADD CONSTRAINT `id_etat` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `id_livre` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `id_etat_apres` FOREIGN KEY (`etat_retour`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `id_etat_avant` FOREIGN KEY (`etat_debut`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `id_livre_location` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`),
  ADD CONSTRAINT `id_usager_location` FOREIGN KEY (`id_usager`) REFERENCES `usager` (`id`);

--
-- Contraintes pour la table `role_utilisateur`
--
ALTER TABLE `role_utilisateur`
  ADD CONSTRAINT `id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `utilisateur_action`
--
ALTER TABLE `utilisateur_action`
  ADD CONSTRAINT `id_action_action` FOREIGN KEY (`id_action`) REFERENCES `action` (`id`),
  ADD CONSTRAINT `id_auteur_action` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id`),
  ADD CONSTRAINT `id_cat_action` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `id_editeur_action` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id`),
  ADD CONSTRAINT `id_etat_action` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `id_livre_action_user` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`),
  ADD CONSTRAINT `id_location_action` FOREIGN KEY (`id_location`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `id_role_action` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `id_usager_action` FOREIGN KEY (`id_usager`) REFERENCES `usager` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
