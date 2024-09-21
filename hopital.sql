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
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `lib_menu` text NOT NULL,
  `statut_menu` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `notes_patient` text NOT NULL,
  `id_personne_fk_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
-- Structure de la table `type_compte`
--

CREATE TABLE `type_compte` (
  `id_type_compte` int(11) NOT NULL,
  `lib_type_compte` text NOT NULL,
  `statut_type_compte` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------


--
-- Déchargement des données de la table `assoc_departement_and_personnel`
--

INSERT INTO `assoc_departement_and_personnel` 
(`id_departement_fk_assoc_departement_and_personnel`, `id_personnel_fk_assoc_departement_and_personnel`, `date_create_assoc_departement_and_personnel`, `user_create_assoc_departement_and_personnel`, `date_last_modif_assoc_departement_and_personnel`, `user_last_modif_assoc_departement_and_personnel`, `del_assoc_departement_and_personnel`, `date_del_assoc_departement_and_personnel`, `user_del_assoc_departement_and_personnel`) 
VALUES
(7, 1, '2024-05-12 14:23:45', 'DUPONT Marie', '2024-05-13 09:18:22', 'DUPONT Marie', '1', '2024-05-14 10:27:11', 'DUPONT Marie'),
(1, 1, '2024-03-18 16:30:50', 'BERNARD Thomas', '2024-03-19 08:45:09', 'BERNARD Thomas', '0', '0000-00-00 00:00:00', ''),
(5, 9, '2024-06-25 11:12:06', 'LEGRAND Sophie', '2024-06-26 12:30:31', 'LEGRAND Sophie', '0', '2024-06-27 09:44:18', 'LEGRAND Sophie'),
(9, 5, '2024-07-10 14:52:09', 'MARTIN Pierre', '2024-07-10 15:22:34', 'MARTIN Pierre', '1', '2024-07-11 13:38:45', 'MARTIN Pierre');


-- --------------------------------------------------------


--
-- Déchargement des données de la table `compte`
--
INSERT INTO `compte` 
(`id_compte`, `mdp_compte`, `statut_compte`, `date_create_compte`, `user_create_compte`, `date_last_modif_compte`, `user_last_modif_compte`, `date_del_compte`, `user_del_compte`, `id_personne_fk_compte`, `id_type_compte_fk_compte`) 
VALUES
(1, '$2y$10$8yrdsGkmdGiOB823RjH6zuShg13KzD0e923UUwHRQiLdAtlUYfipy', 'Actif', '2024-09-05 08:15:00', 'DUPONT Alex', '2024-09-05 10:30:00', 'DUPONT Alex', '0000-00-00 00:00:00', '', 1, 0),
(2, '$2y$10$8yrdsGkmdGiOB823RjH6zuShg13KzD0e923UUwHRQiLdAtlUYfipy', 'Actif', '2024-09-05 09:45:00', 'LEGRAND Paul', '2024-09-05 11:00:00', 'LEGRAND Paul', '0000-00-00 00:00:00', '', 2, 1);


-- --------------------------------------------------------

--
-- Déchargement des données de la table `departement`
--
INSERT INTO `departement` 
(`id_departement`, `nom_departement`, `desc_departement`, `statut_departement`, `date_create_departement`, `user_create_departement`, `date_last_modif_departement`, `user_last_modif_departement`, `del_departement`, `date_del_departement`, `user_del_departement`, `id_batiment_fk_departement`) 
VALUES
(1, 'Biologie', 'Département dédié à l’étude de la biologie et de ses applications.', 'Actif', '2024-07-28 00:00:00', 'DUPONT Marie', '2024-07-30 16:11:34', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 4),
(5, 'Génétique', 'Recherche sur la génétique et les mutations.', 'Actif', '2024-07-30 16:16:15', 'DUPONT Marie', '2024-07-31 10:07:46', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 4),
(6, 'Ophtalmologie', 'Département spécialisé en ophtalmologie.', 'Actif', '2024-08-02 12:58:45', 'DUPONT Marie', '2024-08-02 12:58:45', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 4),
(7, 'Cardiologie', 'Département de recherche et de soins en cardiologie.', 'Actif', '2024-08-02 22:19:19', 'DUPONT Marie', '2024-08-02 22:19:19', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 4),
(9, 'Neurologie', 'Département consacré aux études neurologiques.', 'Actif', '2024-08-13 12:10:29', 'DUPONT Marie', '2024-08-13 12:25:14', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 4),
(10, 'Oncologie', 'Département spécialisé dans le traitement du cancer.', 'Actif', '2024-08-13 12:13:11', 'DUPONT Marie', '2024-08-13 12:25:46', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 6);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `depense`
--
INSERT INTO `depense` 
(`id_depense`, `nom_depense`, `date_depense`, `montant_depense`, `notes_depense`, `statut_depense`, `date_create_depense`, `user_create_depense`, `date_last_modif_depense`, `user_last_modif_depense`, `del_depense`, `date_del_depense`, `user_del_depense`, `id_departement_fk_depense`) 
VALUES
(2, 'Fournitures Bureau', '2024-08-05', '100000', 'Achat de fournitures pour le bureau.', 'Inactif', '2024-08-03 13:33:40', 'DUPONT Marie', '2024-08-03 13:59:51', 'DUPONT Marie', '1', '2024-08-03 14:11:06', 'DUPONT Marie', 6),
(3, 'Maintenance Equipement', '2024-08-04', '5000', 'Réparation d’équipements.', 'Actif', '2024-08-06 21:15:46', 'DUPONT Marie', '2024-08-06 21:15:46', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 6),
(4, 'Formation Personnel', '2024-08-05', '10000', 'Formation pour le personnel.', 'Actif', '2024-08-06 21:24:58', 'DUPONT Marie', '2024-08-06 21:24:58', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 1),
(5, 'Consultation Externe', '2024-08-05', '20000', 'Consultations avec des experts externes.', 'Actif', '2024-08-06 21:32:06', 'DUPONT Marie', '2024-08-06 21:32:06', 'DUPONT Marie', '0', '0000-00-00 00:00:00', '', 6);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `docteur`
--
INSERT INTO `docteur` 
(`id_docteur`, `date_prise_fonction_docteur`, `notes_docteur`, `statut_docteur`, `id_personne_fk_docteur`, `id_specialite_fk_docteur`, `id_departement_fk_docteur`) 
VALUES
(3, '2024-07-16', 'Aucune', 'Inactif', 8, 1, 1),
(13, '2024-07-16', 'Aucune', 'Actif', 1, 1, 1),
(21, '2024-07-20', 'Consultations régulières', 'Actif', 2, 1, 1),
(24, '2024-07-29', 'Spécialiste en cardiologie', 'Actif', 10, 8, 1),
(25, '2024-07-29', 'Spécialiste en neurologie', 'Actif', 10, 8, 1),
(27, '2024-07-23', 'Expert en médecine interne', 'Actif', 5, 15, 5),
(28, '2024-07-23', 'Médecin généraliste', 'Actif', 6, 8, 1),
(29, '2024-07-30', 'Nouveau recrutement', 'Actif', 1, 8, 6);


-- --------------------------------------------------------

--
-- Déchargement des données de la table `equipement`
--
INSERT INTO `equipement` 
(`id_equipement`, `nom_equipement`, `desc_equipement`, `photo_equipement`, `notes_equipement`, `stored_equipement`, `id_magasin_fk_equipement`, `statut_equipement`, `date_create_equipement`, `user_create_equipement`, `date_last_modif_equipement`, `user_last_modif_equipement`, `del_equipement`, `date_del_equipement`, `user_del_equipement`, `id_departement_fk_equipement`) 
VALUES
(16, 'Ultrasound Machine', 'Équipement médical', 'default_shop.png', "Prêt à l'utilisation", 'Non', 1, 'Inactif', '2024-08-04 23:27:43', 'Doe Jane', '2024-08-04 23:37:56', 'Doe Jane', '0', '0000-00-00 00:00:00', '', 6),
(17, 'MRI Scanner', 'Scanner de haute résolution', 'default_shop.png', 'Fonctionnel', 'Non', 1, 'Actif', '2024-08-04 23:28:01', 'Doe Jane', '2024-08-04 23:34:55', 'Doe Jane', '0', '0000-00-00 00:00:00', '', 1),
(18, 'Blood Pressure Monitor', 'Appareil de mesure de pression artérielle', 'default_shop.png', 'Nouveau modèle', 'Oui', 3, 'Actif', '2024-08-04 23:28:19', 'Doe Jane', '2024-08-04 23:40:54', 'Doe Jane', '0', '0000-00-00 00:00:00', '', 6),
(19, 'ECG Machine', 'Machine pour électrocardiogramme', '461-lamborghini-terzo-millennio.jpg', 'Bien entretenu', 'Oui', 4, 'Actif', '2024-08-06 21:17:38', 'Doe Jane', '2024-08-06 21:17:38', 'Doe Jane', '0', '0000-00-00 00:00:00', '', 1),
(20, 'X-Ray Machine', 'Appareil de radiographie', '466-hennessey-venom-f5 (2).jpg', 'Utilisé régulièrement', 'Oui', 5, 'Actif', '2024-08-06 21:26:43', 'Doe Jane', '2024-08-06 21:26:43', 'Doe Jane', '0', '0000-00-00 00:00:00', '', 6),
(21, 'Defibrillator', 'Défibrillateur cardiaque', '466-hennessey-venom-f5 (2).jpg', 'Nouvel ajout', 'Oui', 5, 'Actif', '2024-08-06 21:33:40', 'Doe Jane', '2024-08-06 21:33:40', 'Doe Jane', '0', '0000-00-00 00:00:00', '', 6);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `magasin`
--
INSERT INTO `magasin` 
(`id_magasin`, `nom_magasin`, `desc_magasin`, `photo_magasin`, `statut_magasin`, `date_create_magasin`, `user_create_magasin`, `date_last_modif_magasin`, `user_last_modif_magasin`, `del_magasin`, `date_del_magasin`, `user_del_magasin`) 
VALUES
(1, 'PharmaStore', 'Équipements médicaux divers', 'raw (16).jpg', 'Inactif', '0000-00-00 00:00:00', '', '2024-08-04 12:08:08', 'Doe Jane', '1', '2024-08-04 12:16:31', 'Doe Jane'),
(2, 'MedEquip Central', 'Matériel de soins', 'raw (9).jpg', 'Actif', '2024-08-04 11:50:46', 'Doe Jane', '2024-08-04 12:53:51', 'Doe Jane', '0', '0000-00-00 00:00:00', ''),
(3, 'HealthMart', 'Fournitures médicales', 'raw (16).jpg', 'Inactif', '2024-08-04 12:16:44', 'Doe Jane', '2024-08-04 12:53:40', 'Doe Jane', '0', '0000-00-00 00:00:00', ''),
(4, 'Medical Supply Hub', 'Matériel de haute qualité', 'raw.jpg', 'Actif', '2024-08-06 21:16:20', 'Doe Jane', '2024-08-06 21:16:20', 'Doe Jane', '0', '0000-00-00 00:00:00', ''),
(5, 'EquipCenter', 'Équipements spécialisés', 'raw (8).jpg', 'Actif', '2024-08-06 21:25:25', 'Doe Jane', '2024-08-06 21:25:25', 'Doe Jane', '0', '0000-00-00 00:00:00', ''),
(6, 'MedSupply Depot', "Dépot d'équipements médicaux", 'raw (14).jpg', 'Actif', '2024-08-06 21:32:37', 'Doe Jane', '2024-08-06 21:32:37', 'Doe Jane', '0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

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
(8, 'salaires', 'Inactif'),
(9, 'equipements', 'Actif'),
(10, 'personnels', 'Actif'),
(11, 'depenses', 'Actif'),
(12, 'journaux', 'Inactif'),
(13, 'tableau_de_bord', ''),
(14, 'recette', 'Actif'),
(15, 'magasins', 'Actif'),
(16, 'batiments', 'Actif');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `patient`
--
INSERT INTO `patient` 
(`id_patient`, `notes_patient`, `id_personne_fk_patient`) 
VALUES
(2, 'Patient suivi pour hypertension, traitement en cours.', 8),
(4, 'Contrôles réguliers nécessaires pour diabète de type 2.', 4),
(6, 'Suivi post-opératoire pour chirurgie orthopédique.', 4),
(8, 'Evaluation pour troubles de l’anxiété.', 5),
(9, 'Patient avec antécédents de migraines chroniques.', 2),
(10, 'Suivi en oncologie après traitement du cancer.', 3),
(11, 'Consultation pour troubles respiratoires persistants.', 4),
(12, 'Suivi d’un diabète gestationnel.', 5),
(13, 'Evaluation pré-opératoire pour chirurgie cardiaque.', 6),
(14, 'Consultation pour syndrome de fatigue chronique.', 7),
(15, 'Suivi après fracture du tibia, réhabilitation en cours.', 8),
(16, 'Évaluation pour perte de poids inexpliquée.', 9),
(17, 'Suivi pour maladie auto-immune.', 1),
(18, 'Consultation pour troubles gastro-intestinaux.', 10);


-- --------------------------------------------------------

--
-- Déchargement des données de la table `personne`
--
INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `email_personne`, `tel_personne`, `adresse_personne`, `sexe_personne`, `date_naissance_personne`, `photo_personne`, `statut_personne`, `date_create_personne`, `user_create_personne`, `date_last_modif_personne`, `user_last_modif_personne`, `del_personne`, `date_del_personne`, `user_del_personne`) VALUES
(1, 'Dupont', 'Claire', 'claire.dupont@example.com', '+33123456789', 'Paris', 'F', '1990-05-14', '3.jpg', 'Actif', '2024-01-10 09:00:00', 'admin', '2024-01-10 09:00:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(2, 'Martin', 'Lucas', 'lucas.martin@example.com', '+33234567890', 'Lyon', 'M', '1985-08-22', '4.jpg', 'Actif', '2024-01-15 10:30:00', 'admin', '2024-01-15 10:30:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(3, 'Dubois', 'Sophie', 'sophie.dubois@example.com', '+33345678901', 'Marseille', 'F', '1992-11-10', 'user1.jpg', 'Actif', '2024-02-01 11:45:00', 'admin', '2024-02-01 11:45:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(4, 'Lemoine', 'Jean', 'jean.lemoine@example.com', '+33456789012', 'Toulouse', 'M', '1980-12-30', 'user2.jpg', 'Actif', '2024-02-15 14:00:00', 'admin', '2024-02-15 14:00:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(5, 'Moreau', 'Alice', 'alice.moreau@example.com', '+33567890123', 'Nice', 'F', '1988-03-25', 'user3.jpg', 'Actif', '2024-03-05 15:30:00', 'admin', '2024-03-05 15:30:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(6, 'Girard', 'Julien', 'julien.girard@example.com', '+33678901234', 'Nantes', 'M', '1995-07-18', 'user.jpg', 'Actif', '2024-03-20 16:45:00', 'admin', '2024-03-20 16:45:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(7, 'Lefebvre', 'Marie', 'marie.lefebvre@example.com', '+33789012345', 'Bordeaux', 'F', '1991-09-12', '4.jpg', 'Actif', '2024-04-10 08:30:00', 'admin', '2024-04-10 08:30:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(8, 'Roux', 'Antoine', 'antoine.roux@example.com', '+33890123456', 'Strasbourg', 'M', '1987-10-01', '3.jpg', 'Actif', '2024-04-25 09:15:00', 'admin', '2024-04-25 09:15:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(9, 'Collet', 'Emma', 'emma.collet@example.com', '+33901234567', 'Lille', 'F', '1994-02-28', 'user.jpg', 'Actif', '2024-05-10 11:00:00', 'admin', '2024-05-10 11:00:00', 'admin', '0', '0000-00-00 00:00:00', ''),
(10, 'Deschamps', 'Pierre', 'pierre.deschamps@example.com', '+33112345678', 'Paris', 'M', '1982-04-22', 'user1.jpg', 'Actif', '2024-05-25 12:30:00', 'admin', '2024-05-25 12:30:00', 'admin', '0', '0000-00-00 00:00:00', '');












-- --------------------------------------------------------

--
-- Déchargement des données de la table `personnel`
--
INSERT INTO `personnel` (`id_personnel`, `categorie_personnel`, `date_prise_fonction_personnel`, `notes_personnel`, `id_personne_fk_personnel`) VALUES
(1, "Agents d'entretien", '2024-08-10', 'Remarque sur la performance', 1),
(2, 'Aide-Soignant', '2024-08-13', 'Formation complétée', 2),
(3, 'Aide-Soignant', '2024-07-28', 'Bon travail', 5),
(4, "Agents d'entretien", '2024-08-04', 'Remarque sur la ponctualité', 6),
(5, 'Aide-Soignant', '2024-08-04', 'Bonne gestion des tâches', 6),
(6, 'Infirmier', '2024-08-11', 'Nouveau poste', 8),
(7, 'Aide-Soignant', '2024-08-12', 'Excellente attitude', 9),
(8, 'Aide-Soignant', '2024-08-04', "Besoin d'amélioration", 7),
(9, 'Infirmier', '2024-08-02', 'Bonnes compétences cliniques', 1),
(10, 'Aide-Soignant', '2024-08-07', 'Très motivé', 2),
(11, 'Infirmier', '2024-08-04', 'Compétences en gestion', 3),
(12, 'Infirmier', '2024-07-27', 'Compétences exceptionnelles', 10);



-- --------------------------------------------------------

--
-- Déchargement des données de la table `planning`
--
INSERT INTO `planning` (`id_planning`, `planning`, `date_create_planning`, `user_create_planning`, `date_last_modif_planning`, `user_last_modif_planning`, `del_planning`, `date_del_planning`, `user_del_planning`, `id_docteur_fk_planning`) VALUES
(1, 'Lundi-Mardi, 09h-17h', '2024-01-15 08:30:00', 'DUPONT Alice', '2024-01-15 08:30:00', 'DUPONT Alice', '0', '0000-00-00 00:00:00', '', 13),
(2, 'Mercredi-Jeudi, 13h-18h', '2024-02-20 09:00:00', 'LEGRAND Marc', '2024-02-20 09:00:00', 'LEGRAND Marc', '0', '0000-00-00 00:00:00', '', 21),
(3, 'Vendredi, 08h-12h', '2024-03-10 11:45:00', 'MARTIN Claire', '2024-03-10 11:45:00', 'MARTIN Claire', '1', '2024-03-11 14:30:00', 'MARTIN Claire', 3),
(4, 'Lundi-Mardi, 10h-16h', '2024-04-05 14:00:00', 'DURAND Sophie', '2024-04-05 14:00:00', 'DURAND Sophie', '0', '0000-00-00 00:00:00', '', 24),
(5, 'Jeudi-Vendredi, 11h-17h', '2024-05-12 10:30:00', 'ROUSSEAU Pierre', '2024-05-12 10:30:00', 'ROUSSEAU Pierre', '0', '0000-00-00 00:00:00', '', 25),
(6, 'Lundi-Mercredi, 09h-14h', '2024-06-22 13:15:00', 'FONTAINE Laura', '2024-06-22 13:15:00', 'FONTAINE Laura', '1', '2024-06-22 16:00:00', 'FONTAINE Laura', 28),
(7, 'Mardi-Jeudi, 08h-12h', '2024-07-30 15:00:00', 'MOREAU Jacques', '2024-07-30 15:00:00', 'MOREAU Jacques', '0', '0000-00-00 00:00:00', '', 27);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id_prestation`, `nom_prestation`, `montant_prestation`, `notes_prestation`, `statut_prestation`, `date_create_prestation`, `user_create_prestation`, `date_last_modif_prestation`, `user_last_modif_prestation`, `del_prestation`, `date_del_prestation`, `user_del_prestation`, `id_departement_fk_prestation`) VALUES
(1, 'Consultation Générale', '45000', 'Examen complet', 'Actif', '2024-01-15', 'LECLERC Marie', '2024-01-15', 'LECLERC Marie', '0', '0000-00-00', '', 1),
(2, 'Soin Spécialisé', '30000', 'Soin dermatologique', 'Inactif', '2024-02-20', 'GIRARD Paul', '2024-02-20', 'GIRARD Paul', '1', '2024-03-10', 'GIRARD Paul', 5),
(3, 'Chirurgie Mineure', '150000', 'Intervention sur la peau', 'Actif', '2024-03-10', 'PARENT Lucie', '2024-03-10', 'PARENT Lucie', '0', '0000-00-00', '', 6),
(4, 'Consultation Cardiaque', '80000', 'Examen du cœur', 'Actif', '2024-04-01', 'DUPUIS Laurent', '2024-04-01', 'DUPUIS Laurent', '0', '0000-00-00', '', 6),
(5, 'Rééducation Post-Opératoire', '20000', 'Séances de réhabilitation', 'Actif', '2024-05-15', 'LEFEBVRE Sophie', '2024-05-15', 'LEFEBVRE Sophie', '0', '0000-00-00', '', 5),
(6, 'Soin d’Urgence', '60000', 'Intervention urgente', 'Inactif', '2024-06-20', 'MARTIN Claire', '2024-06-20', 'MARTIN Claire', '1', '2024-07-10', 'MARTIN Claire', 6),
(7, 'Échographie Abdominale', '120000', 'Examen complet de l’abdomen', 'Actif', '2024-07-25', 'BERTIER Alain', '2024-07-25', 'BERTIER Alain', '0', '0000-00-00', '', 7);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `recette`
--
INSERT INTO `recette` (`id_recette`, `date_recette`, `patient_assure_recette`, `assureur_recette`, `montant_paye_par_assureur_recette`, `notes_recette`, `statut_recette`, `date_create_recette`, `user_create_recette`, `date_last_modif_recette`, `user_last_modif_recette`, `del_recette`, `date_del_recette`, `user_del_recette`, `id_prestation_fk_recette`, `id_patient_fk_recette`) VALUES
(1, '2024-01-15', 'Non', '', '', 'Paiement en attente', 'Actif', '2024-01-15 10:00:00', 'LECLERC Marie', '2024-01-15 10:00:00', 'LECLERC Marie', '0', '0000-00-00 00:00:00', '', 1, 2),
(2, '2024-02-20', 'Oui', 'AssurancePlus', '12000', 'Paiement complet reçu', 'Actif', '2024-02-20 11:30:00', 'DUPUIS Laurent', '2024-02-20 11:30:00', 'DUPUIS Laurent', '0', '0000-00-00 00:00:00', '', 2, 2),
(3, '2024-03-10', 'Oui', 'MedAssure', '8000', 'Remboursement partiel', 'Actif', '2024-03-10 14:20:00', 'PARENT Lucie', '2024-03-10 14:20:00', 'PARENT Lucie', '0', '0000-00-00 00:00:00', '', 3, 4),
(4, '2024-04-01', 'Non', '', '', 'Paiement différé', 'Actif', '2024-04-01 12:45:00', 'DURAND Sophie', '2024-04-01 12:45:00', 'DURAND Sophie', '0', '0000-00-00 00:00:00', '', 4, 4),
(5, '2024-05-15', 'Oui', 'SantéGlobal', '5000', 'Paiement en attente', 'Actif', '2024-05-15 09:15:00', 'LEFEBVRE Sophie', '2024-05-15 09:15:00', 'LEFEBVRE Sophie', '0', '0000-00-00 00:00:00', '', 5, 6),
(6, '2024-06-20', 'Non', '', '', 'Paiement refusé', 'Inactif', '2024-06-20 15:30:00', 'MARTIN Claire', '2024-06-20 15:30:00', 'MARTIN Claire', '1', '2024-07-10 10:00:00', 'MARTIN Claire', 6, 6),
(7, '2024-07-25', 'Oui', 'Medicare', '9000', 'Paiement validé', 'Actif', '2024-07-25 16:45:00', 'MOREAU Jacques', '2024-07-25 16:45:00', 'MOREAU Jacques', '0', '0000-00-00 00:00:00', '', 7, 9);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id_rendez_vous`, `date_rendez_vous`, `symptomes_rendez_vous`, `date_debut_symptome_rendez_vous`, `notes_rendez_vous`, `paiement_rendez_vous`, `montant_paye_rendez_vous`, `statut_rendez_vous`, `date_create_rendez_vous`, `user_create_rendez_vous`, `date_last_modif_rendez_vous`, `user_last_modif_rendez_vous`, `del_rendez_vous`, `date_del_rendez_vous`, `user_del_rendez_vous`, `id_patient_fk_rendez_vous`, `id_specialite_fk_rendez_vous`) VALUES
(1, '2024-01-10 09:00:00', 'Fièvre et toux', '2024-01-08', 'Consultation générale', 'Oui', 500, 'Actif', '2024-01-10 08:45:00', 'DUPUIS Marie', '2024-01-10 08:45:00', 'DUPUIS Marie', '0', '0000-00-00 00:00:00', '', 2, 3),
(2, '2024-01-15 11:30:00', 'Douleur abdominale', '2024-01-10', 'Consultation gastro-entérologique', 'Non', 0, 'Inactif', '2024-01-15 11:00:00', 'LECLERC Sophie', '2024-01-15 11:30:00', 'LECLERC Sophie', '0', '0000-00-00 00:00:00', '', 4, 1),
(3, '2024-02-05 14:00:00', '', '0000-00-00', 'Suivi post-opératoire', 'Oui', 1000, 'Actif', '2024-02-05 13:45:00', 'MARTIN Claire', '2024-02-05 14:00:00', 'MARTIN Claire', '0', '0000-00-00 00:00:00', '', 6, 2),
(4, '2024-03-02 16:00:00', 'Éruption cutanée', '2024-02-25', 'Consultation dermatologique', 'Oui', 800, 'Actif', '2024-03-02 15:45:00', 'BERTIER Alain', '2024-03-02 16:00:00', 'BERTIER Alain', '0', '0000-00-00 00:00:00', '', 6, 5),
(5, '2024-03-15 09:30:00', 'Vertiges', '2024-03-10', 'Consultation neurologique', 'Non', 0, 'Inactif', '2024-03-15 09:15:00', 'LECLERC Sophie', '2024-03-15 09:30:00', 'LECLERC Sophie', '0', '0000-00-00 00:00:00', '', 8, 4),
(6, '2024-04-10 13:00:00', 'Fatigue persistante', '2024-04-01', 'Consultation de médecine interne', 'Oui', 1500, 'Actif', '2024-04-10 12:45:00', 'DUPUIS Marie', '2024-04-10 13:00:00', 'DUPUIS Marie', '0', '0000-00-00 00:00:00', '', 8, 6),
(7, '2024-05-22 17:00:00', '', '2024-05-15', 'Suivi régulier', 'Non', 0, 'Actif', '2024-05-22 16:45:00', 'MARTIN Claire', '2024-05-22 17:00:00', 'MARTIN Claire', '0', '0000-00-00 00:00:00', '', 9, 7),
(8, '2024-06-30 10:00:00', 'Maux de tête', '2024-06-25', 'Consultation spécialisée', 'Oui', 1200, 'Actif', '2024-06-30 09:45:00', 'BERTIER Alain', '2024-06-30 10:00:00', 'BERTIER Alain', '0', '0000-00-00 00:00:00', '', 10, 8);

-- --------------------------------------------------------

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
(2, 1, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 2, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 3, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 4, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 5, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 6, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 7, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 8, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 9, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 10, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 11, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 12, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 13, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 14, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 15, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 16, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `batiment`
--
INSERT INTO `batiment` 
(`id_batiment`, `nom_batiment`, `desc_batiment`, `photo_batiment`, `statut_batiment`, `date_create_batiment`, `user_create_batiment`, `date_last_modif_batiment`, `user_last_modif_batiment`, `del_batiment`, `date_del_batiment`, `user_del_batiment`) 
VALUES
(4, 'Louvre', "Grand musée d'art", 'default_shop.png', 'Actif', '2024-08-04 12:33:04', 'DUPONT Alex', '2024-08-04 12:53:16', 'DUPONT Alex', '0', '0000-00-00 00:00:00', ''),
(5, 'Eiffel Tower', 'Monument emblématique de Paris', 'default_shop.png', 'Actif', '2024-08-04 12:34:01', 'DUPONT Alex', '2024-08-04 12:34:01', 'DUPONT Alex', '1', '2024-08-04 12:35:09', 'DUPONT Alex'),
(6, 'Château de Versailles', 'Palais royal historique', 'raw (8).jpg', 'Actif', '2024-03-11 12:48:04', 'MARTIN Sophie', '2024-08-04 12:53:25', 'MARTIN Sophie', '0', '0000-00-00 00:00:00', ''),
(7, 'Mont Saint-Michel', '', 'raw (8).jpg', 'Inactif', '2024-08-06 21:16:55', 'MARTIN Sophie', '2024-08-06 21:16:55', 'MARTIN Sophie', '0', '0000-00-00 00:00:00', ''),
(8, 'Cathédrale Notre-Dame', '', 'raw (9).jpg', 'Actif', '2024-08-06 21:26:08', 'LEGRAND Paul', '2024-08-06 21:26:08', 'LEGRAND Paul', '0', '0000-00-00 00:00:00', ''),
(9, 'Pont du Gard', '', 'raw (9).jpg', 'Actif', '2024-08-06 21:33:09', 'LEGRAND Paul', '2024-08-06 21:33:09', 'LEGRAND Paul', '0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------
--
-- Déchargement des données de la table `specialite`
--
INSERT INTO `specialite` (`id_specialite`, `nom_specialite`, `desc_specialite`, `statut_specialite`, `date_create_specialite`, `user_create_specialite`, `date_last_modif_specialite`, `user_last_modif_specialite`, `del_specialite`, `date_del_specialite`, `user_del_specialite`) VALUES
(1, 'Généraliste', 'Médecine générale pour les consultations de routine.', 'Actif', '2024-01-01 10:00:00', 'DUPUIS Marie', '2024-01-01 10:00:00', 'DUPUIS Marie', '0', '0000-00-00 00:00:00', ''),
(2, 'Cardiologie', 'Spécialisation dans les maladies du cœur et des vaisseaux sanguins.', 'Actif', '2024-01-05 09:00:00', 'LECLERC Sophie', '2024-01-05 09:00:00', 'LECLERC Sophie', '0', '0000-00-00 00:00:00', ''),
(3, 'Dermatologie', 'Consultations et traitements des maladies de la peau.', 'Actif', '2024-02-01 11:00:00', 'MARTIN Claire', '2024-02-01 11:00:00', 'MARTIN Claire', '0', '0000-00-00 00:00:00', ''),
(4, 'Neurologie', 'Spécialisation dans les troubles du système nerveux.', 'Actif', '2024-02-10 14:00:00', 'BERTIER Alain', '2024-02-10 14:00:00', 'BERTIER Alain', '0', '0000-00-00 00:00:00', ''),
(5, 'Pédiatrie', 'Soins médicaux pour les enfants et les adolescents.', 'Actif', '2024-03-01 15:00:00', 'DUPUIS Marie', '2024-03-01 15:00:00', 'DUPUIS Marie', '0', '0000-00-00 00:00:00', ''),
(6, 'Orthopédie', 'Traitement des affections du système musculo-squelettique.', 'Actif', '2024-03-15 16:00:00', 'LECLERC Sophie', '2024-03-15 16:00:00', 'LECLERC Sophie', '0', '0000-00-00 00:00:00', ''),
(7, 'Ophtalmologie', 'Soins et traitements des maladies oculaires.', 'Actif', '2024-04-01 17:00:00', 'MARTIN Claire', '2024-04-01 17:00:00', 'MARTIN Claire', '0', '0000-00-00 00:00:00', ''),
(8, 'ORL', 'Spécialisation dans les troubles des oreilles, du nez et de la gorge.', 'Actif', '2024-04-10 10:00:00', 'BERTIER Alain', '2024-04-10 10:00:00', 'BERTIER Alain', '0', '0000-00-00 00:00:00', ''),
(9, 'Rhumatologie', 'Traitement des maladies des articulations et des tissus conjonctifs.', 'Actif', '2024-05-01 11:00:00', 'DUPUIS Marie', '2024-05-01 11:00:00', 'DUPUIS Marie', '0', '0000-00-00 00:00:00', ''),
(10, 'Médecine interne', 'Soins des maladies internes complexes et des maladies chroniques.', 'Actif', '2024-05-15 12:00:00', 'LECLERC Sophie', '2024-05-15 12:00:00', 'LECLERC Sophie', '0', '0000-00-00 00:00:00', ''),
(11, 'Gynécologie', 'Soins médicaux liés à la santé reproductive féminine.', 'Actif', '2024-06-01 13:00:00', 'MARTIN Claire', '2024-06-01 13:00:00', 'MARTIN Claire', '0', '0000-00-00 00:00:00', ''),
(12, 'Chirurgie générale', 'Interventions chirurgicales pour diverses pathologies.', 'Actif', '2024-06-10 14:00:00', 'BERTIER Alain', '2024-06-10 14:00:00', 'BERTIER Alain', '0', '0000-00-00 00:00:00', ''),
(13, 'Médecine du sport', 'Soins et réhabilitation pour les blessures sportives.', 'Actif', '2024-07-01 15:00:00', 'DUPUIS Marie', '2024-07-01 15:00:00', 'DUPUIS Marie', '0', '0000-00-00 00:00:00', ''),
(14, 'Hématologie', 'Spécialisation dans les maladies du sang.', 'Actif', '2024-07-15 16:00:00', 'LECLERC Sophie', '2024-07-15 16:00:00', 'LECLERC Sophie', '0', '0000-00-00 00:00:00', ''),
(15, 'Urologie', 'Soins et traitements des troubles urinaires et génitaux.', 'Actif', '2024-08-01 17:00:00', 'MARTIN Claire', '2024-08-01 17:00:00', 'MARTIN Claire', '0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `type_compte`
--

INSERT INTO `type_compte` (`id_type_compte`, `lib_type_compte`, `statut_type_compte`) VALUES
(0, 'Super Admin', 'Actif'),
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
