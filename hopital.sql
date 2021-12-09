-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 13 août 2021 à 16:34
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hopital`
--

-- --------------------------------------------------------

--
-- Structure de la table `assoc_compte_and_menu`
--

CREATE TABLE `assoc_compte_and_menu` (
  `id_compte_fk_assoc_compte_and_menu` int(11) NOT NULL,
  `id_menu_fk_assoc_compte_and_menu` int(11) NOT NULL,
  `statut_assoc_compte_and_menu` enum('Actif','Inactif') NOT NULL,
  `date_create_assoc_compte_and_menu` datetime NOT NULL,
  `user_create_assoc_compte_and_menu` text NOT NULL,
  `date_last_modif_assoc_compte_and_menu` datetime NOT NULL,
  `user_last_modif_assoc_compte_and_menu` text NOT NULL,
  `date_del_assoc_compte_and_menu` datetime NOT NULL,
  `user_del_assoc_compte_and_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assoc_compte_and_menu`
--

INSERT INTO `assoc_compte_and_menu` (`id_compte_fk_assoc_compte_and_menu`, `id_menu_fk_assoc_compte_and_menu`, `statut_assoc_compte_and_menu`, `date_create_assoc_compte_and_menu`, `user_create_assoc_compte_and_menu`, `date_last_modif_assoc_compte_and_menu`, `user_last_modif_assoc_compte_and_menu`, `date_del_assoc_compte_and_menu`, `user_del_assoc_compte_and_menu`) VALUES
(1, 1, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 2, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 3, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 4, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 5, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 6, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 7, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 8, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 9, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 10, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 11, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 12, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 13, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 14, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 15, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 16, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 2, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 4, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 10, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 13, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `assoc_departement_and_personnel`
--

CREATE TABLE `assoc_departement_and_personnel` (
  `id_departement_fk_assoc_departement_and_personnel` int(11) NOT NULL,
  `id_personnel_fk_assoc_departement_and_personnel` int(11) NOT NULL,
  `date_create_assoc_departement_and_personnel` datetime NOT NULL,
  `user_create_assoc_departement_and_personnel` text NOT NULL,
  `date_last_modif_assoc_departement_and_personnel` datetime NOT NULL,
  `user_last_modif_assoc_departement_and_personnel` text NOT NULL,
  `del_assoc_departement_and_personnel` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_assoc_departement_and_personnel` datetime NOT NULL,
  `user_del_assoc_departement_and_personnel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assoc_departement_and_personnel`
--

INSERT INTO `assoc_departement_and_personnel` (`id_departement_fk_assoc_departement_and_personnel`, `id_personnel_fk_assoc_departement_and_personnel`, `date_create_assoc_departement_and_personnel`, `user_create_assoc_departement_and_personnel`, `date_last_modif_assoc_departement_and_personnel`, `user_last_modif_assoc_departement_and_personnel`, `del_assoc_departement_and_personnel`, `date_del_assoc_departement_and_personnel`, `user_del_assoc_departement_and_personnel`) VALUES
(1, 12, '2021-08-09 15:43:08', 'GANDONOU Johanu', '2021-08-10 00:25:12', 'GANDONOU Johanu', '1', '2021-08-10 00:59:26', 'GANDONOU Johanu'),
(6, 10, '2021-08-10 00:25:36', 'GANDONOU Johanu', '2021-08-10 00:59:08', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(6, 12, '2021-08-09 15:43:08', 'GANDONOU Johanu', '2021-08-10 00:59:26', 'GANDONOU Johanu', '0', '2021-08-10 00:08:28', 'GANDONOU Johanu'),
(7, 12, '2021-08-10 00:24:54', 'GANDONOU Johanu', '2021-08-10 00:24:54', 'GANDONOU Johanu', '1', '2021-08-10 00:59:26', 'GANDONOU Johanu');

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `id_batiment` int(11) NOT NULL,
  `nom_batiment` text NOT NULL,
  `desc_batiment` text NOT NULL,
  `photo_batiment` text NOT NULL,
  `statut_batiment` enum('Actif','Inactif') NOT NULL,
  `date_create_batiment` datetime NOT NULL,
  `user_create_batiment` text NOT NULL,
  `date_last_modif_batiment` datetime NOT NULL,
  `user_last_modif_batiment` text NOT NULL,
  `del_batiment` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_batiment` datetime NOT NULL,
  `user_del_batiment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`id_batiment`, `nom_batiment`, `desc_batiment`, `photo_batiment`, `statut_batiment`, `date_create_batiment`, `user_create_batiment`, `date_last_modif_batiment`, `user_last_modif_batiment`, `del_batiment`, `date_del_batiment`, `user_del_batiment`) VALUES
(4, 'GANDONOU10', 'rtyujiklm', 'default_shop.png', 'Actif', '2021-08-04 12:33:04', 'GANDONOU Johanu', '2021-08-04 12:53:16', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(5, 'dfghjklm', 'fghujikop', 'default_shop.png', 'Actif', '2021-08-04 12:34:01', 'GANDONOU Johanu', '2021-08-04 12:34:01', 'GANDONOU Johanu', '1', '2021-08-04 12:35:09', 'GANDONOU Johanu'),
(6, 'Johanu1', 'sdfghjk', 'raw (8).jpg', 'Actif', '2021-03-11 12:48:04', 'GANDONOU Johanu', '2021-08-04 12:53:25', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(7, 'qsdfghjk', '', 'raw (8).jpg', 'Inactif', '2021-08-06 21:16:55', 'GANDONOU Johanu', '2021-08-06 21:16:55', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(8, 'sdfghjk', '', 'raw (9).jpg', 'Actif', '2021-08-06 21:26:08', 'GANDONOU Johanu', '2021-08-06 21:26:08', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(9, 'qsdfghjkl', '', 'raw (9).jpg', 'Actif', '2021-08-06 21:33:09', 'GANDONOU Johanu', '2021-08-06 21:33:09', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `mdp_compte` text NOT NULL,
  `statut_compte` enum('Actif','Inactif') NOT NULL,
  `date_create_compte` datetime NOT NULL,
  `user_create_compte` text NOT NULL,
  `date_last_modif_compte` datetime NOT NULL,
  `user_last_modif_compte` text NOT NULL,
  `date_del_compte` datetime NOT NULL,
  `user_del_compte` text NOT NULL,
  `id_personne_fk_compte` int(11) NOT NULL,
  `id_type_compte_fk_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `mdp_compte`, `statut_compte`, `date_create_compte`, `user_create_compte`, `date_last_modif_compte`, `user_last_modif_compte`, `date_del_compte`, `user_del_compte`, `id_personne_fk_compte`, `id_type_compte_fk_compte`) VALUES
(1, '1234', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 1, 1),
(2, '4321', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 30, 3);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `nom_departement` text NOT NULL,
  `desc_departement` text NOT NULL,
  `statut_departement` enum('Actif','Inactif') NOT NULL,
  `date_create_departement` datetime NOT NULL,
  `user_create_departement` text NOT NULL,
  `date_last_modif_departement` datetime NOT NULL,
  `user_last_modif_departement` text NOT NULL,
  `del_departement` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_departement` datetime NOT NULL,
  `user_del_departement` text NOT NULL,
  `id_batiment_fk_departement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `nom_departement`, `desc_departement`, `statut_departement`, `date_create_departement`, `user_create_departement`, `date_last_modif_departement`, `user_last_modif_departement`, `del_departement`, `date_del_departement`, `user_del_departement`, `id_batiment_fk_departement`) VALUES
(1, 'Biologie', 'dfghjkl fghjklm rtyuiop cvbn.', 'Actif', '2021-07-28 00:00:00', '', '2021-07-30 16:11:34', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4),
(5, 'Bilogie', 'rftgyui fghjkler', 'Actif', '2021-07-30 16:16:15', 'GANDONOU Johanu', '2021-07-31 10:07:46', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4),
(6, 'Ophtalmologie', 'dfghj', 'Actif', '2021-08-02 12:58:45', 'GANDONOU Johanu', '2021-08-02 12:58:45', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4),
(7, 'GANDONOU', '', 'Actif', '2021-08-02 22:19:19', 'GANDONOU Johanu', '2021-08-02 22:19:19', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4),
(9, 'azertyui', 'azertyuio', 'Actif', '2021-08-13 12:10:29', 'GANDONOU Johanu', '2021-08-13 12:25:14', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4),
(10, 'nbnbbn11', '', 'Actif', '2021-08-13 12:13:11', 'GANDONOU Johanu', '2021-08-13 12:25:46', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 6);

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE `depense` (
  `id_depense` int(11) NOT NULL,
  `nom_depense` text NOT NULL,
  `date_depense` date NOT NULL,
  `montant_depense` text NOT NULL,
  `notes_depense` text NOT NULL,
  `statut_depense` enum('Actif','Inactif') NOT NULL,
  `date_create_depense` datetime NOT NULL,
  `user_create_depense` text NOT NULL,
  `date_last_modif_depense` datetime NOT NULL,
  `user_last_modif_depense` text NOT NULL,
  `del_depense` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_depense` datetime NOT NULL,
  `user_del_depense` text NOT NULL,
  `id_departement_fk_depense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id_depense`, `nom_depense`, `date_depense`, `montant_depense`, `notes_depense`, `statut_depense`, `date_create_depense`, `user_create_depense`, `date_last_modif_depense`, `user_last_modif_depense`, `del_depense`, `date_del_depense`, `user_del_depense`, `id_departement_fk_depense`) VALUES
(2, 'kscnksnkc', '2021-08-05', '100000', '', 'Inactif', '2021-08-03 13:33:40', 'GANDONOU Johanu', '2021-08-03 13:59:51', 'GANDONOU Johanu', '1', '2021-08-03 14:11:06', 'GANDONOU Johanu', 6),
(3, 'qsdfghjk', '2021-08-04', '5000', '', 'Actif', '2021-08-06 21:15:46', 'GANDONOU Johanu', '2021-08-06 21:15:46', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 6),
(4, 'sdfghjk', '2021-08-05', '10000', '', 'Actif', '2021-08-06 21:24:58', 'GANDONOU Johanu', '2021-08-06 21:24:58', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1),
(5, 'sdfghjk', '2021-08-05', '20000', '', 'Actif', '2021-08-06 21:32:06', 'GANDONOU Johanu', '2021-08-06 21:32:06', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 6);

-- --------------------------------------------------------

--
-- Structure de la table `docteur`
--

CREATE TABLE `docteur` (
  `id_docteur` int(11) NOT NULL,
  `date_prise_fonction_docteur` date NOT NULL,
  `notes_docteur` text NOT NULL,
  `statut_docteur` enum('Actif','Inactif') NOT NULL DEFAULT 'Actif',
  `id_personne_fk_docteur` int(11) NOT NULL,
  `id_specialite_fk_docteur` int(11) NOT NULL,
  `id_departement_fk_docteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `docteur`
--

INSERT INTO `docteur` (`id_docteur`, `date_prise_fonction_docteur`, `notes_docteur`, `statut_docteur`, `id_personne_fk_docteur`, `id_specialite_fk_docteur`, `id_departement_fk_docteur`) VALUES
(3, '2021-07-16', 'Rien', 'Inactif', 18, 1, 1),
(13, '2021-07-16', 'Rien', 'Actif', 28, 1, 1),
(21, '2021-07-20', 'dfghjk dfghjk fghjkl', 'Actif', 36, 1, 1),
(24, '2021-07-29', 'qsdfg', 'Actif', 45, 8, 1),
(25, '2021-07-29', 'qsdfg', 'Actif', 46, 8, 1),
(27, '2021-07-23', 'qjcbkxxcxv1', 'Actif', 49, 18, 5),
(28, '2021-07-23', 'ikopoiu', 'Actif', 51, 8, 1),
(29, '2021-07-30', '', 'Actif', 60, 8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id_equipement` int(11) NOT NULL,
  `nom_equipement` text NOT NULL,
  `desc_equipement` text NOT NULL,
  `photo_equipement` text NOT NULL,
  `notes_equipement` text NOT NULL,
  `stored_equipement` enum('Non','Oui') NOT NULL,
  `id_magasin_fk_equipement` int(11) DEFAULT '0',
  `statut_equipement` enum('Actif','Inactif') NOT NULL,
  `date_create_equipement` datetime NOT NULL,
  `user_create_equipement` text NOT NULL,
  `date_last_modif_equipement` datetime NOT NULL,
  `user_last_modif_equipement` text NOT NULL,
  `del_equipement` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_equipement` datetime NOT NULL,
  `user_del_equipement` text NOT NULL,
  `id_departement_fk_equipement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id_equipement`, `nom_equipement`, `desc_equipement`, `photo_equipement`, `notes_equipement`, `stored_equipement`, `id_magasin_fk_equipement`, `statut_equipement`, `date_create_equipement`, `user_create_equipement`, `date_last_modif_equipement`, `user_last_modif_equipement`, `del_equipement`, `date_del_equipement`, `user_del_equipement`, `id_departement_fk_equipement`) VALUES
(16, 'Johanu', '', 'default_shop.png', '', 'Non', 0, 'Inactif', '2021-08-04 23:27:43', 'GANDONOU Johanu', '2021-08-04 23:37:56', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 6),
(17, 'Johanu', '', 'default_shop.png', '', 'Non', 0, 'Actif', '2021-08-04 23:28:01', 'GANDONOU Johanu', '2021-08-04 23:34:55', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1),
(18, 'Johanu', '', 'default_shop.png', 'fghjkl', 'Oui', 3, 'Actif', '2021-08-04 23:28:19', 'GANDONOU Johanu', '2021-08-04 23:40:54', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 6),
(19, 'ertyuio', '', '461-lamborghini-terzo-millennio.jpg', '', 'Oui', 4, 'Actif', '2021-08-06 21:17:38', 'GANDONOU Johanu', '2021-08-06 21:17:38', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1),
(20, 'sdfghjk', '', '466-hennessey-venom-f5 (2).jpg', '', 'Oui', 5, 'Actif', '2021-08-06 21:26:43', 'GANDONOU Johanu', '2021-08-06 21:26:43', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 6),
(21, 'qsdfghj', '', '466-hennessey-venom-f5 (2).jpg', '', 'Oui', 5, 'Actif', '2021-08-06 21:33:40', 'GANDONOU Johanu', '2021-08-06 21:33:40', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 6);

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

CREATE TABLE `magasin` (
  `id_magasin` int(11) NOT NULL,
  `nom_magasin` text NOT NULL,
  `desc_magasin` text NOT NULL,
  `photo_magasin` text NOT NULL,
  `statut_magasin` enum('Actif','Inactif') NOT NULL,
  `date_create_magasin` datetime NOT NULL,
  `user_create_magasin` text NOT NULL,
  `date_last_modif_magasin` datetime NOT NULL,
  `user_last_modif_magasin` text NOT NULL,
  `del_magasin` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_magasin` datetime NOT NULL,
  `user_del_magasin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `magasin`
--

INSERT INTO `magasin` (`id_magasin`, `nom_magasin`, `desc_magasin`, `photo_magasin`, `statut_magasin`, `date_create_magasin`, `user_create_magasin`, `date_last_modif_magasin`, `user_last_modif_magasin`, `del_magasin`, `date_del_magasin`, `user_del_magasin`) VALUES
(1, 'azertyu1', 'kjhgfds11', 'default_shop.png', 'Inactif', '0000-00-00 00:00:00', '', '2021-08-04 12:08:08', 'GANDONOU Johanu', '1', '2021-08-04 12:16:31', 'GANDONOU Johanu'),
(2, 'wxcvbn,nbvcx', 'vbvb', 'raw (16).jpg', 'Actif', '2021-08-04 11:50:46', 'GANDONOU Johanu', '2021-08-04 12:53:51', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(3, 'jnkdnvknkdv', ' kxnvknkxvnvknxv', 'default_shop.png', 'Inactif', '2021-08-04 12:16:44', 'GANDONOU Johanu', '2021-08-04 12:53:40', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(4, 'sedrtyuiop', 'qsdfghjkl', 'raw.jpg', 'Actif', '2021-08-06 21:16:20', 'GANDONOU Johanu', '2021-08-06 21:16:20', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(5, 'sdfghjkl', 'dfghjkl', 'raw (2).jpg', 'Actif', '2021-08-06 21:25:25', 'GANDONOU Johanu', '2021-08-06 21:25:25', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(6, 'sdfghjk', '', 'raw (14).jpg', 'Actif', '2021-08-06 21:32:37', 'GANDONOU Johanu', '2021-08-06 21:32:37', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `lib_menu` text NOT NULL,
  `statut_menu` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `lib_menu`, `statut_menu`) VALUES
(1, 'prestations', 'Actif'),
(2, 'docteurs', 'Actif'),
(3, 'patients', 'Actif'),
(4, 'rendez_vous', 'Actif'),
(5, 'planning_des_docteurs', 'Actif'),
(6, 'specialites', 'Actif'),
(7, 'departements', 'Actif'),
(8, 'salaires', 'Actif'),
(9, 'equipements', 'Actif'),
(10, 'personnels', 'Actif'),
(11, 'depenses', 'Actif'),
(12, 'journaux', 'Actif'),
(13, 'tableau_de_bord', ''),
(14, 'recette', 'Actif'),
(15, 'magasins', 'Actif'),
(16, 'batiments', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `notes_patient` text NOT NULL,
  `id_personne_fk_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `notes_patient`, `id_personne_fk_patient`) VALUES
(2, 'ghjkd knnvkdnv knvdv', 38),
(4, 'hjkghjk fghjkghj cvbn,fghjk', 40),
(6, 'zertyu dfghj', 44),
(8, 'fghjk', 50),
(9, 'sdfghjkl', 52),
(10, ',ll,,l,l,l,knkjbjb', 53),
(11, ',ll,,l,l,l,knkjbjb', 54),
(12, 'sdftgyhujikop', 55),
(13, 'dfghjklm', 56),
(14, 'sdfghjk', 57),
(15, 'tyuio', 58),
(16, '', 59),
(17, 'rftgyhujikolp', 61),
(18, '4551122ijik', 75);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom_personne` text NOT NULL,
  `prenom_personne` text NOT NULL,
  `email_personne` text NOT NULL,
  `tel_personne` text NOT NULL,
  `adresse_personne` text NOT NULL,
  `sexe_personne` enum('-','M','F') NOT NULL,
  `date_naissance_personne` date NOT NULL,
  `photo_personne` text NOT NULL,
  `statut_personne` enum('Actif','Inactif') NOT NULL,
  `date_create_personne` datetime NOT NULL,
  `user_create_personne` text NOT NULL,
  `date_last_modif_personne` datetime NOT NULL,
  `user_last_modif_personne` text NOT NULL,
  `del_personne` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_personne` datetime NOT NULL,
  `user_del_personne` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `email_personne`, `tel_personne`, `adresse_personne`, `sexe_personne`, `date_naissance_personne`, `photo_personne`, `statut_personne`, `date_create_personne`, `user_create_personne`, `date_last_modif_personne`, `user_last_modif_personne`, `del_personne`, `date_del_personne`, `user_del_personne`) VALUES
(1, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '+22961149072', 'Abomey-Calavi', 'M', '2021-07-14', '1.jpeg', 'Actif', '2021-07-27 00:00:00', '', '2021-07-27 00:00:00', '', '0', '0000-00-00 00:00:00', ''),
(8, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:39:00', 'GANDONOUJohanu', '2021-07-28 05:39:00', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(9, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:39:29', 'GANDONOUJohanu', '2021-07-28 05:39:29', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(10, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:40:18', 'GANDONOUJohanu', '2021-07-28 05:40:18', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(11, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:40:42', 'GANDONOUJohanu', '2021-07-28 05:40:42', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(12, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:41:14', 'GANDONOUJohanu', '2021-07-28 05:41:14', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(13, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 11:07:58', 'GANDONOUJohanu', '2021-07-28 11:07:58', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(14, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-15', 'user1.jpg', 'Actif', '2021-07-28 11:09:09', 'GANDONOUJohanu', '2021-07-28 11:09:09', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(15, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-15', 'user1.jpg', 'Actif', '2021-07-28 11:10:42', 'GANDONOUJohanu', '2021-07-28 11:10:42', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(16, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-15', 'user1.jpg', 'Actif', '2021-07-28 11:18:18', 'GANDONOUJohanu', '2021-07-28 11:18:18', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(18, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-15', 'user1.jpg', 'Actif', '2021-07-28 11:21:12', 'GANDONOUJohanu', '2021-07-28 11:21:12', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(28, 'GANDONOU', 'Johanu1', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-07', 'user.jpg', 'Actif', '2021-07-28 12:53:18', 'GANDONOU Johanu', '2021-07-28 12:53:18', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(30, 'ZINSOU', 'Marcelin', 'marcelin@gmail.com', '61149070', 'porto-novo', 'M', '2021-07-16', 'default.jpg', 'Actif', '2021-07-28 14:57:07', 'GANDONOU Johanu', '2021-07-28 15:25:53', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(36, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61444555', 'porto-novo', 'M', '2021-07-16', 'user1.jpg', 'Inactif', '2021-07-28 18:19:17', 'GANDONOU Johanu', '2021-07-28 18:19:17', 'GANDONOUJohanu', '0', '0000-00-00 00:00:00', ''),
(38, 'GANDONOU', 'John', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-22', 'user2.jpg', 'Inactif', '2021-07-28 19:31:40', 'GANDONOU Johanu', '2021-07-28 19:59:57', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(40, 'GANDONOU', 'Jeannette', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-13', 'user3.jpg', 'Actif', '2021-07-28 20:51:31', 'GANDONOU Johanu', '2021-07-28 20:51:31', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(44, 'GANDONOU', 'Reine', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-06', 'user3.jpg', 'Actif', '2021-07-30 11:02:48', 'GANDONOU Johanu', '2021-07-30 11:02:48', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(45, 'GANDONOU', 'Johan', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-16', 'user.jpg', 'Actif', '2021-07-30 11:07:39', 'GANDONOU Johanu', '2021-07-30 11:07:39', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(46, 'GANDONOU', 'Johan', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-16', 'user.jpg', 'Actif', '2021-07-30 11:11:15', 'GANDONOU Johanu', '2021-08-09 13:27:59', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(49, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-29', 'register-bg.jpg', 'Actif', '2021-07-31 10:20:37', 'GANDONOU Johanu', '2021-08-09 13:24:22', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(50, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-06', 'portfolio-8.jpg', 'Actif', '2021-05-12 10:44:57', 'GANDONOU Johanu', '2021-07-31 10:44:57', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(51, '61149072', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-22', 'default.jpg', 'Actif', '2021-07-31 16:24:08', 'GANDONOU Johanu', '2021-07-31 16:34:10', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(52, 'GANDONOU100', 'Johanu100', 'johanugandonou100@gmail.com', '61149072', 'Calavi', 'M', '2021-08-18', '', 'Actif', '2021-08-02 00:53:45', 'GANDONOU Johanu', '2021-08-02 00:53:45', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(53, 'GANDONOU100', 'Johanu100', 'johanugandonou100@gmail.com', '61149072', 'Calavi', 'M', '2021-08-26', 'portfolio-1.jpg', 'Inactif', '2021-08-02 00:59:05', 'GANDONOU Johanu', '2021-08-02 00:59:05', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(54, 'GANDONOU100', 'Johanu100', 'johanugandonou100@gmail.com', '61149072', 'Calavi', 'M', '2021-08-26', 'portfolio-1.jpg', 'Inactif', '2021-05-05 00:59:53', 'GANDONOU Johanu', '2021-08-02 00:59:53', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(55, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-12', 'portfolio-5.jpg', 'Actif', '2021-08-02 01:01:19', 'GANDONOU Johanu', '2021-08-02 01:01:19', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(56, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-27', 'portfolio-6.jpg', 'Actif', '2021-08-02 01:11:02', 'GANDONOU Johanu', '2021-08-02 01:11:02', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(57, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-08-28', '5.jpg', 'Actif', '2021-08-02 01:14:16', 'GANDONOU Johanu', '2021-08-02 01:14:16', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(58, 'André', 'Pierre', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', '3.jpg', 'Actif', '2021-08-02 13:05:21', 'GANDONOU Johanu', '2021-08-02 13:05:21', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(59, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-21', 'default.jpg', 'Actif', '2021-08-02 22:27:48', 'GANDONOU Johanu', '2021-08-02 22:27:48', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(60, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-12', 'default.jpg', 'Actif', '2021-08-02 22:30:36', 'GANDONOU Johanu', '2021-08-02 22:30:55', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(61, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-27', '4.jpg', 'Actif', '2021-08-02 22:33:34', 'GANDONOU Johanu', '2021-08-06 20:03:11', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(62, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-08-20', 'user1.jpg', 'Inactif', '2021-08-06 19:14:37', 'GANDONOU Johanu', '2021-08-06 19:46:10', 'GANDONOU Johanu', '1', '0000-00-00 00:00:00', ''),
(63, 'sdfghjkl', 'ertyuio', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:19:10', 'GANDONOU Johanu', '2021-08-06 21:19:10', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(64, 'sdfghjkl', 'ertyuio', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:21:05', 'GANDONOU Johanu', '2021-08-06 21:21:05', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(65, 'sdfghjkl', 'ertyuio', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:22:05', 'GANDONOU Johanu', '2021-08-06 21:22:05', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(66, 'sdfghjkl', 'ertyuiop', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:27:45', 'GANDONOU Johanu', '2021-08-06 21:28:12', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(67, 'sdfghjkl', 'ertyui', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:34:44', 'GANDONOU Johanu', '2021-08-06 21:42:57', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(68, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-12', 'default.jpg', 'Actif', '2021-08-09 11:24:44', 'GANDONOU Johanu', '2021-08-09 11:24:44', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(69, '61149072', 'Johan', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-08-14', 'default.jpg', 'Actif', '2021-08-09 11:29:40', 'GANDONOU Johanu', '2021-08-09 11:29:40', 'GANDONOU Johanu', '1', '0000-00-00 00:00:00', ''),
(70, 'GANDONOU', 'John', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-27', 'default.jpg', 'Actif', '2021-08-09 11:39:26', 'GANDONOU Johanu', '2021-08-09 11:39:26', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(71, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-27', 'default.jpg', 'Actif', '2021-08-09 11:40:52', 'GANDONOU Johanu', '2021-08-09 11:40:52', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(72, 'knknknk', 'qsdfg', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-27', 'default.jpg', 'Actif', '2021-08-09 11:41:30', 'GANDONOU Johanu', '2021-08-10 00:59:08', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(73, '61149072', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-08-13', 'default.jpg', 'Actif', '2021-08-09 15:28:45', 'GANDONOU Johanu', '2021-08-09 15:28:45', 'GANDONOU Johanu', '1', '0000-00-00 00:00:00', ''),
(74, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-27', 'user2.jpg', 'Actif', '2021-08-09 15:43:08', 'GANDONOU Johanu', '2021-08-10 00:59:26', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(75, '61149072', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-12', '0d09cdd75f014342bcea41f158627173.jpg', 'Actif', '2021-08-12 20:46:04', 'GANDONOU Johanu', '2021-08-12 20:46:04', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id_personnel` int(11) NOT NULL,
  `categorie_personnel` text NOT NULL,
  `date_prise_fonction_personnel` date NOT NULL,
  `notes_personnel` text NOT NULL,
  `id_personne_fk_personnel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id_personnel`, `categorie_personnel`, `date_prise_fonction_personnel`, `notes_personnel`, `id_personne_fk_personnel`) VALUES
(1, 'Agents d\'entretien', '2021-08-10', 'dfghjkl', 61),
(2, 'Aide-Soignant', '2021-08-13', 'zertyuio', 62),
(3, 'Aide-Soignant', '2021-07-28', 'ertyuio', 65),
(4, 'Agents d\'entretien', '2021-08-04', '', 66),
(5, 'Aide-Soignant', '2021-08-04', '', 67),
(6, 'Infimier', '2021-08-11', '', 68),
(7, 'Aide-Soignant', '2021-08-12', '', 69),
(8, 'Aide-Soignant', '2021-08-04', '', 70),
(9, 'Infimier', '2021-08-02', '', 71),
(10, 'Aide-Soignant', '2021-08-07', '', 72),
(11, 'Infimier', '2021-08-04', '', 73),
(12, 'Infimier', '2021-07-27', '', 74);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `id_planning` int(11) NOT NULL,
  `planning` text NOT NULL,
  `date_create_planning` datetime NOT NULL,
  `user_create_planning` text NOT NULL,
  `date_last_modif_planning` datetime NOT NULL,
  `user_last_modif_planning` text NOT NULL,
  `del_planning` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_planning` datetime NOT NULL,
  `user_del_planning` text NOT NULL,
  `id_docteur_fk_planning` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`id_planning`, `planning`, `date_create_planning`, `user_create_planning`, `date_last_modif_planning`, `user_last_modif_planning`, `del_planning`, `date_del_planning`, `user_del_planning`, `id_docteur_fk_planning`) VALUES
(1, 'Lundi-Mardi, 10h-15h', '2021-08-02 10:16:56', 'GANDONOU Johanu', '2021-08-02 10:16:56', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 21),
(2, 'Mardi-Mercredi, 10h-15h', '2021-08-02 10:43:54', 'GANDONOU Johanu', '2021-08-02 10:43:54', 'GANDONOU Johanu', '1', '2021-08-02 11:04:43', 'GANDONOU Johanu', 27),
(3, 'Mardi-Mercredi, 10h-15h', '2021-08-02 10:44:56', 'GANDONOU Johanu', '2021-08-02 10:57:35', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 25),
(4, 'Lundi-Mardi, 10h-15h', '2021-08-02 11:05:48', 'GANDONOU Johanu', '2021-08-02 11:05:48', 'GANDONOU Johanu', '1', '2021-08-02 11:05:55', 'GANDONOU Johanu', 21),
(5, 'Lundi-Mardi, 10h-15h', '2021-08-02 12:52:05', 'GANDONOU Johanu', '2021-08-02 12:52:05', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 3),
(6, 'Mardi-Mercredi, 10h-15h', '2021-08-02 23:11:32', 'GANDONOU Johanu', '2021-08-02 23:52:08', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 27),
(7, 'Lundi-Mardi, 10h-15h', '2021-08-02 23:45:18', 'GANDONOU Johanu', '2021-08-02 23:45:18', 'GANDONOU Johanu', '1', '2021-08-02 23:46:02', 'GANDONOU Johanu', 24);

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `id_prestation` int(11) NOT NULL,
  `nom_prestation` text NOT NULL,
  `montant_prestation` text NOT NULL,
  `notes_prestation` text NOT NULL,
  `statut_prestation` enum('Actif','Inactif') NOT NULL,
  `date_create_prestation` date NOT NULL,
  `user_create_prestation` text NOT NULL,
  `date_last_modif_prestation` date NOT NULL,
  `user_last_modif_prestation` text NOT NULL,
  `del_prestation` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_prestation` date NOT NULL,
  `user_del_prestation` text NOT NULL,
  `id_departement_fk_prestation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id_prestation`, `nom_prestation`, `montant_prestation`, `notes_prestation`, `statut_prestation`, `date_create_prestation`, `user_create_prestation`, `date_last_modif_prestation`, `user_last_modif_prestation`, `del_prestation`, `date_del_prestation`, `user_del_prestation`, `id_departement_fk_prestation`) VALUES
(1, 'zertyuio', '50000', 'dfghjkl', 'Inactif', '2021-06-08', '', '2021-08-02', 'GANDONOU Johanu', '0', '0000-00-00', '', 1),
(3, 'fghjklmù', '20000', 'rftgyhujikolpm', 'Actif', '2021-08-02', 'GANDONOU Johanu', '2021-08-02', 'GANDONOU Johanu', '0', '0000-00-00', '', 5),
(4, 'Consultation', '10000', 'fghj', 'Actif', '2020-11-10', 'GANDONOU Johanu', '2021-08-02', 'GANDONOU Johanu', '0', '0000-00-00', '', 6),
(5, 'Johanu', '20000', '', 'Inactif', '2021-08-02', 'GANDONOU Johanu', '2021-08-02', 'GANDONOU Johanu', '0', '0000-00-00', '', 6),
(6, 'sdfghjk', '5000', '', 'Actif', '2021-08-12', 'GANDONOU Johanu', '2021-08-12', 'GANDONOU Johanu', '0', '0000-00-00', '', 6),
(7, 'zertyuiomertyuiop', '74520', 'dtyuiop', 'Actif', '2021-01-13', '', '0000-00-00', '', '0', '0000-00-00', '', 6);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id_recette` int(11) NOT NULL,
  `date_recette` date NOT NULL,
  `patient_assure_recette` enum('Non','Oui') NOT NULL,
  `assureur_recette` text NOT NULL,
  `montant_paye_par_assureur_recette` text NOT NULL,
  `notes_recette` text NOT NULL,
  `statut_recette` enum('Actif','Inactif') NOT NULL,
  `date_create_recette` datetime NOT NULL,
  `user_create_recette` text NOT NULL,
  `date_last_modif_recette` datetime NOT NULL,
  `user_last_modif_recette` text NOT NULL,
  `del_recette` enum('0','1') NOT NULL,
  `date_del_recette` datetime NOT NULL,
  `user_del_recette` text NOT NULL,
  `id_prestation_fk_recette` int(11) NOT NULL,
  `id_patient_fk_recette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id_recette`, `date_recette`, `patient_assure_recette`, `assureur_recette`, `montant_paye_par_assureur_recette`, `notes_recette`, `statut_recette`, `date_create_recette`, `user_create_recette`, `date_last_modif_recette`, `user_last_modif_recette`, `del_recette`, `date_del_recette`, `user_del_recette`, `id_prestation_fk_recette`, `id_patient_fk_recette`) VALUES
(1, '2021-08-17', 'Non', '', '', 'cfghjklm', 'Actif', '2021-04-06 00:00:00', '', '0000-00-00 00:00:00', '', '0', '0000-00-00 00:00:00', '', 1, 6),
(2, '2021-08-06', 'Oui', 'zertyuio', '1000', 'dfghjklm', 'Actif', '2021-08-02 00:49:02', 'GANDONOU Johanu', '2021-08-02 00:49:02', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1, 2),
(5, '2021-08-07', 'Oui', 'sdfghjkl', '1000', 'dfghjkl', 'Actif', '2021-08-02 00:59:53', 'GANDONOU Johanu', '2021-08-02 00:59:53', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1, 11),
(6, '2021-08-12', 'Non', '', '', 'poiuytrez', 'Inactif', '2021-08-02 01:01:20', 'GANDONOU Johanu', '2021-08-02 01:01:20', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1, 12),
(7, '2021-08-14', 'Non', '', '', 'vbnjk;', 'Actif', '2021-08-02 01:08:12', 'GANDONOU Johanu', '2021-08-02 01:08:12', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1, 2),
(8, '2021-08-07', 'Non', '', '', 'dfghjklmù', 'Inactif', '2021-08-02 01:11:02', 'GANDONOU Johanu', '2021-08-02 01:11:02', 'GANDONOU Johanu', '1', '2021-08-02 02:10:26', 'GANDONOU Johanu', 1, 13),
(9, '2021-08-04', 'Non', '', '', 'sdfghjk', 'Actif', '2021-08-02 01:13:22', 'GANDONOU Johanu', '2021-08-02 01:13:22', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1, 6),
(10, '2021-08-02', 'Non', '', '', 'qsdfghjk', 'Actif', '2021-08-02 01:14:17', 'GANDONOU Johanu', '2021-08-02 01:14:17', 'GANDONOU Johanu', '1', '2021-08-02 02:07:56', 'GANDONOU Johanu', 1, 14),
(11, '2021-08-02', 'Non', '', '', 'qsdfghjk', 'Inactif', '2021-08-02 01:34:21', 'GANDONOU Johanu', '2021-08-02 01:34:21', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1, 4),
(12, '2021-08-07', 'Non', '', '', 'dfghjkl111222', 'Actif', '2021-08-02 01:34:48', 'GANDONOU Johanu', '2021-08-02 01:57:06', 'GANDONOU Johanu', '1', '2021-08-02 02:07:23', 'GANDONOU Johanu', 1, 6),
(14, '2021-08-02', 'Non', '', '', 'zertyu', 'Actif', '2021-08-02 13:02:28', 'GANDONOU Johanu', '2021-08-02 13:02:28', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4, 4),
(15, '2021-08-02', 'Oui', 'NCA', '15000', 'dfghjk', 'Actif', '2021-08-02 13:05:22', 'GANDONOU Johanu', '2021-08-02 13:05:22', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4, 15),
(16, '2021-08-27', 'Non', '', '', '', 'Actif', '2021-08-02 22:26:43', 'GANDONOU Johanu', '2021-08-02 22:27:06', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4, 6),
(17, '2021-08-07', 'Oui', 'NCA', '15000', '', 'Actif', '2021-07-13 22:27:49', 'GANDONOU Johanu', '2021-08-03 00:23:22', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 1, 16),
(18, '2021-08-20', 'Oui', 'NCA', '', '', 'Actif', '2021-08-03 00:17:54', 'GANDONOU Johanu', '2021-08-03 00:17:54', 'GANDONOU Johanu', '1', '2021-08-03 00:18:13', 'GANDONOU Johanu', 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id_rendez_vous` int(11) NOT NULL,
  `date_rendez_vous` datetime NOT NULL,
  `symptomes_rendez_vous` text NOT NULL,
  `date_debut_symptome_rendez_vous` date NOT NULL,
  `notes_rendez_vous` text NOT NULL,
  `paiement_rendez_vous` enum('Non','Oui') NOT NULL,
  `montant_paye_rendez_vous` int(11) NOT NULL DEFAULT '0',
  `statut_rendez_vous` enum('Actif','Inactif') NOT NULL,
  `date_create_rendez_vous` datetime NOT NULL,
  `user_create_rendez_vous` text NOT NULL,
  `date_last_modif_rendez_vous` datetime NOT NULL,
  `user_last_modif_rendez_vous` text NOT NULL,
  `del_rendez_vous` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_rendez_vous` datetime NOT NULL,
  `user_del_rendez_vous` text NOT NULL,
  `id_patient_fk_rendez_vous` int(11) NOT NULL,
  `id_specialite_fk_rendez_vous` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id_rendez_vous`, `date_rendez_vous`, `symptomes_rendez_vous`, `date_debut_symptome_rendez_vous`, `notes_rendez_vous`, `paiement_rendez_vous`, `montant_paye_rendez_vous`, `statut_rendez_vous`, `date_create_rendez_vous`, `user_create_rendez_vous`, `date_last_modif_rendez_vous`, `user_last_modif_rendez_vous`, `del_rendez_vous`, `date_del_rendez_vous`, `user_del_rendez_vous`, `id_patient_fk_rendez_vous`, `id_specialite_fk_rendez_vous`) VALUES
(2, '2021-08-03 16:00:00', '', '0000-00-00', '', 'Non', 0, 'Inactif', '2021-08-02 15:00:33', 'GANDONOU Johanu', '2021-08-02 15:00:33', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 2, 1),
(3, '2021-07-28 14:03:00', '', '2021-08-13', '', 'Oui', 1000, 'Actif', '2021-08-02 15:03:56', 'GANDONOU Johanu', '2021-08-02 21:03:23', 'GANDONOU Johanu', '1', '2021-08-02 21:49:46', 'GANDONOU Johanu', 4, 1),
(4, '2021-08-13 19:48:00', '', '2021-07-28', '', 'Non', 0, 'Actif', '2021-08-02 20:48:17', 'GANDONOU Johanu', '2021-08-02 20:48:17', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 11, 8),
(5, '2021-08-02 21:23:00', '', '0000-00-00', '', 'Non', 0, 'Actif', '2021-08-02 21:19:40', 'GANDONOU Johanu', '2021-08-02 21:22:44', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 8, 5),
(6, '2021-08-02 23:00:00', 'zertyui', '0000-00-00', 'qsdfghjk', 'Non', 0, 'Inactif', '2021-08-02 21:20:40', 'GANDONOU Johanu', '2021-08-06 21:15:14', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '', 4, 14),
(7, '2021-08-21 20:14:00', '', '2021-08-04', '', 'Oui', 10000, 'Actif', '2021-08-06 21:14:29', 'GANDONOU Johanu', '2021-08-06 21:14:29', 'GANDONOU Johanu', '1', '2021-08-06 21:14:59', 'GANDONOU Johanu', 4, 8),
(8, '2021-08-20 20:23:00', '', '2021-08-03', 'sdfghjklm', 'Oui', 10000, 'Actif', '2021-08-06 21:23:46', 'GANDONOU Johanu', '2021-08-06 21:24:24', 'GANDONOU Johanu', '1', '2021-08-06 21:24:32', 'GANDONOU Johanu', 15, 8),
(9, '2021-08-19 20:30:00', '', '2021-07-27', '', 'Oui', 10000, 'Actif', '2021-08-06 21:31:04', 'GANDONOU Johanu', '2021-08-06 21:31:22', 'GANDONOU Johanu', '1', '2021-08-06 21:31:44', 'GANDONOU Johanu', 6, 8);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id_specialite` int(11) NOT NULL,
  `nom_specialite` text NOT NULL,
  `desc_specialite` text NOT NULL,
  `statut_specialite` enum('Actif','Inactif') NOT NULL,
  `date_create_specialite` datetime NOT NULL,
  `user_create_specialite` text NOT NULL,
  `date_last_modif_specialite` datetime NOT NULL,
  `user_last_modif_specialite` text NOT NULL,
  `del_specialite` enum('0','1') NOT NULL DEFAULT '0',
  `date_del_specialite` datetime NOT NULL,
  `user_del_specialite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id_specialite`, `nom_specialite`, `desc_specialite`, `statut_specialite`, `date_create_specialite`, `user_create_specialite`, `date_last_modif_specialite`, `user_last_modif_specialite`, `del_specialite`, `date_del_specialite`, `user_del_specialite`) VALUES
(1, 'Généraliste', 'hjklkjh ghjiopoiu hjkoiu', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0', '0000-00-00 00:00:00', ''),
(4, 'AAA', 'vbnfghjk fghjkl vbn', 'Actif', '2019-06-04 01:01:50', 'GANDONOU Johanu', '2021-07-29 01:01:50', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(5, 'GANDONOU', 'vbnfghjk fghjkl vbn', 'Actif', '2021-07-29 01:02:09', 'GANDONOU Johanu', '2021-07-29 01:02:09', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(6, 'ZINSOU', 'vbnfghjk fghjkl vbn', 'Actif', '2021-05-05 01:12:17', 'GANDONOU Johanu', '2021-07-29 01:12:17', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(7, 'GANDONOU', 'vbnfghjk fghjkl vbn', 'Actif', '2021-07-29 01:23:39', 'GANDONOU Johanu', '2021-07-29 01:24:02', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(8, 'Dentiste', 'fghjkl tyuiop vgbnhjkl', 'Actif', '2021-07-29 01:35:48', 'GANDONOU Johanu', '2021-07-29 01:35:48', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(9, 'Dentiste', 'fghjkl tyuiop vgbnhjkl', 'Actif', '2021-06-09 01:37:03', 'GANDONOU Johanu', '2021-07-29 01:37:03', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(10, 'Dentiste', 'fghjkl tyuiop vgbnhjkl', 'Actif', '2021-07-29 01:39:56', 'GANDONOU Johanu', '2021-07-29 01:39:56', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(14, 'zertyuik', 'ghjklghjkjjk', 'Inactif', '2021-07-30 14:59:15', 'GANDONOU Johanu', '2021-07-30 16:23:43', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(15, 'Dentiste', 'sncksnknosnof', 'Actif', '2021-07-31 09:57:19', 'GANDONOU Johanu', '2021-07-31 09:57:19', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(16, 'Dentiste', 'sdjozjoscs', 'Actif', '2021-02-11 09:58:26', 'GANDONOU Johanu', '2021-07-31 09:58:26', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(17, 'Dentiste', 'sdjozjoscs', 'Actif', '2021-07-31 09:58:56', 'GANDONOU Johanu', '2021-07-31 09:58:56', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(18, 'Dentiste1', 'sdjozjoscs', 'Actif', '2021-07-31 10:03:01', 'GANDONOU Johanu', '2021-07-31 10:03:01', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(19, 'Dentiste2', 'sdjozjoscs', 'Actif', '2021-07-31 10:03:32', 'GANDONOU Johanu', '2021-07-31 10:03:32', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', ''),
(20, 'Dentiste1111', '', 'Actif', '2021-08-02 22:37:09', 'GANDONOU Johanu', '2021-08-02 22:37:09', 'GANDONOU Johanu', '0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `type_compte`
--

CREATE TABLE `type_compte` (
  `id_type_compte` int(11) NOT NULL,
  `lib_type_compte` text NOT NULL,
  `statut_type_compte` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_compte`
--

INSERT INTO `type_compte` (`id_type_compte`, `lib_type_compte`, `statut_type_compte`) VALUES
(1, 'Super Admin', 'Actif'),
(2, 'Admin', 'Actif'),
(3, 'Editeur', 'Actif'),
(4, 'Auteur', 'Actif'),
(5, 'Lecteur', 'Actif');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assoc_compte_and_menu`
--
ALTER TABLE `assoc_compte_and_menu`
  ADD PRIMARY KEY (`id_compte_fk_assoc_compte_and_menu`,`id_menu_fk_assoc_compte_and_menu`),
  ADD KEY `id_menu_fk_assoc_compte_and_menu` (`id_menu_fk_assoc_compte_and_menu`);

--
-- Index pour la table `assoc_departement_and_personnel`
--
ALTER TABLE `assoc_departement_and_personnel`
  ADD PRIMARY KEY (`id_departement_fk_assoc_departement_and_personnel`,`id_personnel_fk_assoc_departement_and_personnel`),
  ADD KEY `id_personnel_fk_assoc_departement_and_personnel` (`id_personnel_fk_assoc_departement_and_personnel`);

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`id_batiment`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`),
  ADD KEY `id_personne_fk_compte` (`id_personne_fk_compte`),
  ADD KEY `id_type_compte_fk_compte` (`id_type_compte_fk_compte`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`),
  ADD KEY `id_batiment_fk_departement` (`id_batiment_fk_departement`);

--
-- Index pour la table `depense`
--
ALTER TABLE `depense`
  ADD PRIMARY KEY (`id_depense`),
  ADD KEY `id_service_fk_depense` (`id_departement_fk_depense`);

--
-- Index pour la table `docteur`
--
ALTER TABLE `docteur`
  ADD PRIMARY KEY (`id_docteur`),
  ADD KEY `id_personne_fk_docteur` (`id_personne_fk_docteur`),
  ADD KEY `id_specialite_fk_docteur` (`id_specialite_fk_docteur`),
  ADD KEY `id_departement_fk_docteur` (`id_departement_fk_docteur`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id_equipement`),
  ADD KEY `id_departement_fk_equipement` (`id_departement_fk_equipement`),
  ADD KEY `id_magasin_fk_equipement` (`id_magasin_fk_equipement`);

--
-- Index pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD PRIMARY KEY (`id_magasin`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`),
  ADD KEY `id_personne_fk_patient` (`id_personne_fk_patient`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id_personnel`),
  ADD KEY `id_personne_fk_personnel` (`id_personne_fk_personnel`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id_planning`),
  ADD KEY `id_docteur_fk_planning` (`id_docteur_fk_planning`);

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`id_prestation`),
  ADD KEY `id_service_fk_prestation` (`id_departement_fk_prestation`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id_recette`),
  ADD KEY `id_prestation_fk_recette` (`id_prestation_fk_recette`),
  ADD KEY `id_patient_fk_recette` (`id_patient_fk_recette`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id_rendez_vous`),
  ADD KEY `id_patient_fk_rendez_vous` (`id_patient_fk_rendez_vous`),
  ADD KEY `id_specialite_fk_rendez_vous` (`id_specialite_fk_rendez_vous`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id_specialite`);

--
-- Index pour la table `type_compte`
--
ALTER TABLE `type_compte`
  ADD PRIMARY KEY (`id_type_compte`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `id_batiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `id_depense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `docteur`
--
ALTER TABLE `docteur`
  MODIFY `id_docteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id_equipement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `magasin`
--
ALTER TABLE `magasin`
  MODIFY `id_magasin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id_personnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id_planning` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `id_prestation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id_rendez_vous` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id_specialite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `type_compte`
--
ALTER TABLE `type_compte`
  MODIFY `id_type_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assoc_compte_and_menu`
--
ALTER TABLE `assoc_compte_and_menu`
  ADD CONSTRAINT `id_compte_fk_assoc_compte_and_menu` FOREIGN KEY (`id_compte_fk_assoc_compte_and_menu`) REFERENCES `compte` (`id_compte`),
  ADD CONSTRAINT `id_menu_fk_assoc_compte_and_menu` FOREIGN KEY (`id_menu_fk_assoc_compte_and_menu`) REFERENCES `menu` (`id_menu`);

--
-- Contraintes pour la table `assoc_departement_and_personnel`
--
ALTER TABLE `assoc_departement_and_personnel`
  ADD CONSTRAINT `assoc_departement_and_personnel_ibfk_1` FOREIGN KEY (`id_departement_fk_assoc_departement_and_personnel`) REFERENCES `departement` (`id_departement`),
  ADD CONSTRAINT `assoc_departement_and_personnel_ibfk_2` FOREIGN KEY (`id_personnel_fk_assoc_departement_and_personnel`) REFERENCES `personnel` (`id_personnel`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `id_personne_fk_compte` FOREIGN KEY (`id_personne_fk_compte`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `id_type_compte_fk_compte` FOREIGN KEY (`id_type_compte_fk_compte`) REFERENCES `type_compte` (`id_type_compte`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`id_batiment_fk_departement`) REFERENCES `batiment` (`id_batiment`);

--
-- Contraintes pour la table `depense`
--
ALTER TABLE `depense`
  ADD CONSTRAINT `id_departement_fk_depense` FOREIGN KEY (`id_departement_fk_depense`) REFERENCES `departement` (`id_departement`);

--
-- Contraintes pour la table `docteur`
--
ALTER TABLE `docteur`
  ADD CONSTRAINT `id_departement_fk_docteur` FOREIGN KEY (`id_departement_fk_docteur`) REFERENCES `departement` (`id_departement`),
  ADD CONSTRAINT `id_personne_fk_docteur` FOREIGN KEY (`id_personne_fk_docteur`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `id_specialite_fk_docteur` FOREIGN KEY (`id_specialite_fk_docteur`) REFERENCES `specialite` (`id_specialite`);

--
-- Contraintes pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD CONSTRAINT `id_departement_fk_equipement` FOREIGN KEY (`id_departement_fk_equipement`) REFERENCES `departement` (`id_departement`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `id_personne_fk_patient` FOREIGN KEY (`id_personne_fk_patient`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `id_personne_fk_personnel` FOREIGN KEY (`id_personne_fk_personnel`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `id_docteur_fk_planning` FOREIGN KEY (`id_docteur_fk_planning`) REFERENCES `docteur` (`id_docteur`);

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `id_specialite_fk_prestation` FOREIGN KEY (`id_departement_fk_prestation`) REFERENCES `departement` (`id_departement`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `id_patient_fk_recette` FOREIGN KEY (`id_patient_fk_recette`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `id_prestation_fk_recette` FOREIGN KEY (`id_prestation_fk_recette`) REFERENCES `prestation` (`id_prestation`);

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `id_patient_fk_rendez_vous` FOREIGN KEY (`id_patient_fk_rendez_vous`) REFERENCES `patient` (`id_patient`),
  ADD CONSTRAINT `id_specialite_fk_rendez_vous` FOREIGN KEY (`id_specialite_fk_rendez_vous`) REFERENCES `specialite` (`id_specialite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
