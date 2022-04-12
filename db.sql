-- phpMyAdmin SQL Dump
-- version 4.7.4
-- SQLINES DEMO *** admin.net/
--
-- Hôte : 127.0.0.1
-- SQLINES DEMO *** en. 13 août 2021 à 16:34
-- SQLINES DEMO *** r :  10.1.30-MariaDB
-- SQLINES DEMO ***  7.2.1
begin;
set transaction read write;
alter database d4bocphvnml258 set default_transaction_read_only = off;
commit;
START TRANSACTION;


/* SQLINES DEMO *** ARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/* SQLINES DEMO *** ARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/* SQLINES DEMO *** LLATION_CONNECTION=@@COLLATION_CONNECTION */;
/* SQLINES DEMO *** tf8mb4 */;

--
-- SQLINES DEMO *** :  hopital
--

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able assoc_compte_and_menu
--

CREATE TYPE statut AS ENUM ('Actif','Inactif');
CREATE TYPE del AS ENUM ('0','1');
CREATE TYPE yesno AS ENUM ('Non','Oui');
CREATE TYPE sexe AS ENUM ('-','M','F');

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE assoc_compte_and_menu (
  id_compte_fk_assoc_compte_and_menu int NOT NULL,
  id_menu_fk_assoc_compte_and_menu int NOT NULL,
  statut_assoc_compte_and_menu  statut NOT NULL,
  date_create_assoc_compte_and_menu timestamp(0) ,
  user_create_assoc_compte_and_menu text NOT NULL,
  date_last_modif_assoc_compte_and_menu timestamp(0) ,
  user_last_modif_assoc_compte_and_menu text NOT NULL,
  date_del_assoc_compte_and_menu timestamp(0) ,
  user_del_assoc_compte_and_menu text
);

--
-- SQLINES DEMO ***  données de la table assoc_compte_and_menu
--

INSERT INTO assoc_compte_and_menu (id_compte_fk_assoc_compte_and_menu, id_menu_fk_assoc_compte_and_menu, statut_assoc_compte_and_menu, date_create_assoc_compte_and_menu, user_create_assoc_compte_and_menu, date_last_modif_assoc_compte_and_menu, user_last_modif_assoc_compte_and_menu, date_del_assoc_compte_and_menu, user_del_assoc_compte_and_menu) VALUES
(1, 1, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 2, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 3, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 4, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 5, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 6, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 7, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 8, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 9, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 10, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 11, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 12, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 13, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 14, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 15, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(1, 16, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(2, 2, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(2, 4, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(2, 10, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(2, 13, 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able assoc_departement_and_personnel
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE assoc_departement_and_personnel (
  id_departement_fk_assoc_departement_and_personnel int NOT NULL,
  id_personnel_fk_assoc_departement_and_personnel int NOT NULL,
  date_create_assoc_departement_and_personnel timestamp(0) ,
  user_create_assoc_departement_and_personnel text NOT NULL,
  date_last_modif_assoc_departement_and_personnel timestamp(0) ,
  user_last_modif_assoc_departement_and_personnel text NOT NULL,
  del_assoc_departement_and_personnel  del NOT NULL DEFAULT '0',
  date_del_assoc_departement_and_personnel timestamp(0) ,
  user_del_assoc_departement_and_personnel text
);

--
-- SQLINES DEMO ***  données de la table assoc_departement_and_personnel
--

INSERT INTO assoc_departement_and_personnel (id_departement_fk_assoc_departement_and_personnel, id_personnel_fk_assoc_departement_and_personnel, date_create_assoc_departement_and_personnel, user_create_assoc_departement_and_personnel, date_last_modif_assoc_departement_and_personnel, user_last_modif_assoc_departement_and_personnel, del_assoc_departement_and_personnel, date_del_assoc_departement_and_personnel, user_del_assoc_departement_and_personnel) VALUES
(1, 12, '2021-08-09 15:43:08', 'GANDONOU Johanu', '2021-08-10 00:25:12', 'GANDONOU Johanu', '1', '2021-08-10 00:59:26', 'GANDONOU Johanu'),
(6, 10, '2021-08-10 00:25:36', 'GANDONOU Johanu', '2021-08-10 00:59:08', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(6, 12, '2021-08-09 15:43:08', 'GANDONOU Johanu', '2021-08-10 00:59:26', 'GANDONOU Johanu', '0', '2021-08-10 00:08:28', 'GANDONOU Johanu'),
(7, 12, '2021-08-10 00:24:54', 'GANDONOU Johanu', '2021-08-10 00:24:54', 'GANDONOU Johanu', '1', '2021-08-10 00:59:26', 'GANDONOU Johanu');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able batiment
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE batiment (
  id_batiment SERIAL NOT NULL,
  nom_batiment text NOT NULL,
  desc_batiment text NOT NULL,
  photo_batiment text NOT NULL,
  statut_batiment  statut NOT NULL,
  date_create_batiment timestamp(0) ,
  user_create_batiment text NOT NULL,
  date_last_modif_batiment timestamp(0) ,
  user_last_modif_batiment text NOT NULL,
  del_batiment  del NOT NULL DEFAULT '0',
  date_del_batiment timestamp(0) ,
  user_del_batiment text,
  CONSTRAINT id_batiment_pk PRIMARY KEY(id_batiment)
);

--
-- SQLINES DEMO ***  données de la table batiment
--

INSERT INTO batiment (id_batiment, nom_batiment, desc_batiment, photo_batiment, statut_batiment, date_create_batiment, user_create_batiment, date_last_modif_batiment, user_last_modif_batiment, del_batiment, date_del_batiment, user_del_batiment) VALUES
(4, 'GANDONOU10', 'rtyujiklm', 'default_shop.png', 'Actif', '2021-08-04 12:33:04', 'GANDONOU Johanu', '2021-08-04 12:53:16', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(5, 'dfghjklm', 'fghujikop', 'default_shop.png', 'Actif', '2021-08-04 12:34:01', 'GANDONOU Johanu', '2021-08-04 12:34:01', 'GANDONOU Johanu', '1', '2021-08-04 12:35:09', 'GANDONOU Johanu'),
(6, 'Johanu1', 'sdfghjk', 'raw (8).jpg', 'Actif', '2021-03-11 12:48:04', 'GANDONOU Johanu', '2021-08-04 12:53:25', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(7, 'qsdfghjk', '', 'raw (8).jpg', 'Inactif', '2021-08-06 21:16:55', 'GANDONOU Johanu', '2021-08-06 21:16:55', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(8, 'sdfghjk', '', 'raw (9).jpg', 'Actif', '2021-08-06 21:26:08', 'GANDONOU Johanu', '2021-08-06 21:26:08', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(9, 'qsdfghjkl', '', 'raw (9).jpg', 'Actif', '2021-08-06 21:33:09', 'GANDONOU Johanu', '2021-08-06 21:33:09', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able compte
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE compte (
  id_compte SERIAL NOT NULL,
  mdp_compte text NOT NULL,
  statut_compte  statut NOT NULL,
  date_create_compte timestamp(0) ,
  user_create_compte text NOT NULL,
  date_last_modif_compte timestamp(0) ,
  user_last_modif_compte text NOT NULL,
  date_del_compte timestamp(0) ,
  user_del_compte text,
  id_personne_fk_compte int NOT NULL,
  id_type_compte_fk_compte int NOT NULL,
  CONSTRAINT id_compte_pk PRIMARY KEY(id_compte)
);

--
-- SQLINES DEMO ***  données de la table compte
--

INSERT INTO compte (id_compte, mdp_compte, statut_compte, date_create_compte, user_create_compte, date_last_modif_compte, user_last_modif_compte, date_del_compte, user_del_compte, id_personne_fk_compte, id_type_compte_fk_compte) VALUES
(1, '1234', 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 1),
(2, '4321', 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 30, 3);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able departement
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE departement (
  id_departement SERIAL NOT NULL,
  nom_departement text NOT NULL,
  desc_departement text NOT NULL,
  statut_departement  statut NOT NULL,
  date_create_departement timestamp(0) ,
  user_create_departement text NOT NULL,
  date_last_modif_departement timestamp(0) ,
  user_last_modif_departement text NOT NULL,
  del_departement  del NOT NULL DEFAULT '0',
  date_del_departement timestamp(0) ,
  user_del_departement text,
  id_batiment_fk_departement int NOT NULL,
  CONSTRAINT id_departement_pk PRIMARY KEY(id_departement)
);

--
-- SQLINES DEMO ***  données de la table departement
--

INSERT INTO departement (id_departement, nom_departement, desc_departement, statut_departement, date_create_departement, user_create_departement, date_last_modif_departement, user_last_modif_departement, del_departement, date_del_departement, user_del_departement, id_batiment_fk_departement) VALUES
(1, 'Biologie', 'dfghjkl fghjklm rtyuiop cvbn.', 'Actif', '2021-07-28 00:00:00', '', '2021-07-30 16:11:34', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4),
(5, 'Bilogie', 'rftgyui fghjkler', 'Actif', '2021-07-30 16:16:15', 'GANDONOU Johanu', '2021-07-31 10:07:46', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4),
(6, 'Ophtalmologie', 'dfghj', 'Actif', '2021-08-02 12:58:45', 'GANDONOU Johanu', '2021-08-02 12:58:45', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4),
(7, 'GANDONOU', '', 'Actif', '2021-08-02 22:19:19', 'GANDONOU Johanu', '2021-08-02 22:19:19', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4),
(9, 'azertyui', 'azertyuio', 'Actif', '2021-08-13 12:10:29', 'GANDONOU Johanu', '2021-08-13 12:25:14', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4),
(10, 'nbnbbn11', '', 'Actif', '2021-08-13 12:13:11', 'GANDONOU Johanu', '2021-08-13 12:25:46', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able depense
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE depense (
  id_depense SERIAL NOT NULL,
  nom_depense text NOT NULL,
  date_depense date,
  montant_depense text NOT NULL,
  notes_depense text NOT NULL,
  statut_depense  statut NOT NULL,
  date_create_depense timestamp(0) ,
  user_create_depense text NOT NULL,
  date_last_modif_depense timestamp(0) ,
  user_last_modif_depense text NOT NULL,
  del_depense  del NOT NULL DEFAULT '0',
  date_del_depense timestamp(0) ,
  user_del_depense text,
  id_departement_fk_depense int NOT NULL,
  CONSTRAINT id_depense_pk PRIMARY KEY(id_depense)
);

--
-- SQLINES DEMO ***  données de la table depense
--

INSERT INTO depense (id_depense, nom_depense, date_depense, montant_depense, notes_depense, statut_depense, date_create_depense, user_create_depense, date_last_modif_depense, user_last_modif_depense, del_depense, date_del_depense, user_del_depense, id_departement_fk_depense) VALUES
(2, 'kscnksnkc', '2021-08-05', '100000', '', 'Inactif', '2021-08-03 13:33:40', 'GANDONOU Johanu', '2021-08-03 13:59:51', 'GANDONOU Johanu', '1', '2021-08-03 14:11:06', 'GANDONOU Johanu', 6),
(3, 'qsdfghjk', '2021-08-04', '5000', '', 'Actif', '2021-08-06 21:15:46', 'GANDONOU Johanu', '2021-08-06 21:15:46', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6),
(4, 'sdfghjk', '2021-08-05', '10000', '', 'Actif', '2021-08-06 21:24:58', 'GANDONOU Johanu', '2021-08-06 21:24:58', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1),
(5, 'sdfghjk', '2021-08-05', '20000', '', 'Actif', '2021-08-06 21:32:06', 'GANDONOU Johanu', '2021-08-06 21:32:06', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able docteur
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE docteur (
  id_docteur SERIAL NOT NULL,
  date_prise_fonction_docteur date,
  notes_docteur text NOT NULL,
  statut_docteur  statut NOT NULL DEFAULT 'Actif',
  id_personne_fk_docteur int NOT NULL,
  id_specialite_fk_docteur int NOT NULL,
  id_departement_fk_docteur int NOT NULL,
  CONSTRAINT id_docteur_pk PRIMARY KEY(id_docteur)
);

--
-- SQLINES DEMO ***  données de la table docteur
--

INSERT INTO docteur (id_docteur, date_prise_fonction_docteur, notes_docteur, statut_docteur, id_personne_fk_docteur, id_specialite_fk_docteur, id_departement_fk_docteur) VALUES
(3, '2021-07-16', 'Rien', 'Inactif', 18, 1, 1),
(13, '2021-07-16', 'Rien', 'Actif', 28, 1, 1),
(21, '2021-07-20', 'dfghjk dfghjk fghjkl', 'Actif', 36, 1, 1),
(24, '2021-07-29', 'qsdfg', 'Actif', 45, 8, 1),
(25, '2021-07-29', 'qsdfg', 'Actif', 46, 8, 1),
(27, '2021-07-23', 'qjcbkxxcxv1', 'Actif', 49, 18, 5),
(28, '2021-07-23', 'ikopoiu', 'Actif', 51, 8, 1),
(29, '2021-07-30', '', 'Actif', 60, 8, 6);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able equipement
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE equipement (
  id_equipement SERIAL NOT NULL,
  nom_equipement text NOT NULL,
  desc_equipement text NOT NULL,
  photo_equipement text NOT NULL,
  notes_equipement text NOT NULL,
  stored_equipement  yesno NOT NULL,
  id_magasin_fk_equipement int DEFAULT '0',
  statut_equipement  statut NOT NULL,
  date_create_equipement timestamp(0) ,
  user_create_equipement text NOT NULL,
  date_last_modif_equipement timestamp(0) ,
  user_last_modif_equipement text NOT NULL,
  del_equipement  del NOT NULL DEFAULT '0',
  date_del_equipement timestamp(0) ,
  user_del_equipement text,
  id_departement_fk_equipement int NOT NULL,
  CONSTRAINT id_equipement_pk PRIMARY KEY(id_equipement)
);

--
-- SQLINES DEMO ***  données de la table equipement
--

INSERT INTO equipement (id_equipement, nom_equipement, desc_equipement, photo_equipement, notes_equipement, stored_equipement, id_magasin_fk_equipement, statut_equipement, date_create_equipement, user_create_equipement, date_last_modif_equipement, user_last_modif_equipement, del_equipement, date_del_equipement, user_del_equipement, id_departement_fk_equipement) VALUES
(16, 'Johanu', '', 'default_shop.png', '', 'Non', 0, 'Inactif', '2021-08-04 23:27:43', 'GANDONOU Johanu', '2021-08-04 23:37:56', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6),
(17, 'Johanu', '', 'default_shop.png', '', 'Non', 0, 'Actif', '2021-08-04 23:28:01', 'GANDONOU Johanu', '2021-08-04 23:34:55', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1),
(18, 'Johanu', '', 'default_shop.png', 'fghjkl', 'Oui', 3, 'Actif', '2021-08-04 23:28:19', 'GANDONOU Johanu', '2021-08-04 23:40:54', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6),
(19, 'ertyuio', '', '461-lamborghini-terzo-millennio.jpg', '', 'Oui', 4, 'Actif', '2021-08-06 21:17:38', 'GANDONOU Johanu', '2021-08-06 21:17:38', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1),
(20, 'sdfghjk', '', '466-hennessey-venom-f5 (2).jpg', '', 'Oui', 5, 'Actif', '2021-08-06 21:26:43', 'GANDONOU Johanu', '2021-08-06 21:26:43', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6),
(21, 'qsdfghj', '', '466-hennessey-venom-f5 (2).jpg', '', 'Oui', 5, 'Actif', '2021-08-06 21:33:40', 'GANDONOU Johanu', '2021-08-06 21:33:40', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able magasin
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE magasin (
  id_magasin SERIAL NOT NULL,
  nom_magasin text NOT NULL,
  desc_magasin text NOT NULL,
  photo_magasin text NOT NULL,
  statut_magasin  statut NOT NULL,
  date_create_magasin timestamp(0) ,
  user_create_magasin text NOT NULL,
  date_last_modif_magasin timestamp(0) ,
  user_last_modif_magasin text NOT NULL,
  del_magasin  del NOT NULL DEFAULT '0',
  date_del_magasin timestamp(0) ,
  user_del_magasin text,
  CONSTRAINT id_magasin_pk PRIMARY KEY(id_magasin)
);

--
-- SQLINES DEMO ***  données de la table magasin
--

INSERT INTO magasin (id_magasin, nom_magasin, desc_magasin, photo_magasin, statut_magasin, date_create_magasin, user_create_magasin, date_last_modif_magasin, user_last_modif_magasin, del_magasin, date_del_magasin, user_del_magasin) VALUES
(1, 'azertyu1', 'kjhgfds11', 'default_shop.png', 'Inactif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', '2021-08-04 12:08:08', 'GANDONOU Johanu', '1', '2021-08-04 12:16:31', 'GANDONOU Johanu'),
(2, 'wxcvbn,nbvcx', 'vbvb', 'raw (16).jpg', 'Actif', '2021-08-04 11:50:46', 'GANDONOU Johanu', '2021-08-04 12:53:51', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(3, 'jnkdnvknkdv', ' kxnvknkxvnvknxv', 'default_shop.png', 'Inactif', '2021-08-04 12:16:44', 'GANDONOU Johanu', '2021-08-04 12:53:40', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(4, 'sedrtyuiop', 'qsdfghjkl', 'raw.jpg', 'Actif', '2021-08-06 21:16:20', 'GANDONOU Johanu', '2021-08-06 21:16:20', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(5, 'sdfghjkl', 'dfghjkl', 'raw (2).jpg', 'Actif', '2021-08-06 21:25:25', 'GANDONOU Johanu', '2021-08-06 21:25:25', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(6, 'sdfghjk', '', 'raw (14).jpg', 'Actif', '2021-08-06 21:32:37', 'GANDONOU Johanu', '2021-08-06 21:32:37', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able menu
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE menu (
  id_menu SERIAL NOT NULL,
  lib_menu text NOT NULL,
  statut_menu  statut NOT NULL,
  CONSTRAINT id_menu_pk PRIMARY KEY(id_menu)
);

--
-- SQLINES DEMO ***  données de la table menu
--

INSERT INTO menu (id_menu, lib_menu, statut_menu) VALUES
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
(13, 'tableau_de_bord', 'Actif'),
(14, 'recette', 'Actif'),
(15, 'magasins', 'Actif'),
(16, 'batiments', 'Actif');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able patient
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE patient (
  id_patient SERIAL NOT NULL,
  notes_patient text NOT NULL,
  id_personne_fk_patient int NOT NULL,
  CONSTRAINT id_patient_pk PRIMARY KEY(id_patient)
);

--
-- SQLINES DEMO ***  données de la table patient
--

INSERT INTO patient (id_patient, notes_patient, id_personne_fk_patient) VALUES
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

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able personne
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE personne (
  id_personne SERIAL NOT NULL,
  nom_personne text NOT NULL,
  prenom_personne text NOT NULL,
  email_personne text NOT NULL,
  tel_personne text NOT NULL,
  adresse_personne text NOT NULL,
  sexe_personne  sexe NOT NULL,
  date_naissance_personne date,
  photo_personne text NOT NULL,
  statut_personne  statut NOT NULL,
  date_create_personne timestamp(0) ,
  user_create_personne text NOT NULL,
  date_last_modif_personne timestamp(0) ,
  user_last_modif_personne text NOT NULL,
  del_personne  del NOT NULL DEFAULT '0',
  date_del_personne timestamp(0) ,
  user_del_personne text,
  CONSTRAINT id_personne_pk PRIMARY KEY(id_personne)
);

--
-- SQLINES DEMO ***  données de la table personne
--

INSERT INTO personne (id_personne, nom_personne, prenom_personne, email_personne, tel_personne, adresse_personne, sexe_personne, date_naissance_personne, photo_personne, statut_personne, date_create_personne, user_create_personne, date_last_modif_personne, user_last_modif_personne, del_personne, date_del_personne, user_del_personne) VALUES
(1, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '+22961149072', 'Abomey-Calavi', 'M', '2021-07-14', '1.jpeg', 'Actif', '2021-07-27 00:00:00', '', '2021-07-27 00:00:00', '', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(8, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:39:00', 'GANDONOUJohanu', '2021-07-28 05:39:00', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(9, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:39:29', 'GANDONOUJohanu', '2021-07-28 05:39:29', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(10, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:40:18', 'GANDONOUJohanu', '2021-07-28 05:40:18', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(11, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:40:42', 'GANDONOUJohanu', '2021-07-28 05:40:42', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(12, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 05:41:14', 'GANDONOUJohanu', '2021-07-28 05:41:14', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(13, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-14', 'user1.jpg', 'Actif', '2021-07-28 11:07:58', 'GANDONOUJohanu', '2021-07-28 11:07:58', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(14, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-15', 'user1.jpg', 'Actif', '2021-07-28 11:09:09', 'GANDONOUJohanu', '2021-07-28 11:09:09', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(15, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-15', 'user1.jpg', 'Actif', '2021-07-28 11:10:42', 'GANDONOUJohanu', '2021-07-28 11:10:42', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(16, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-15', 'user1.jpg', 'Actif', '2021-07-28 11:18:18', 'GANDONOUJohanu', '2021-07-28 11:18:18', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(18, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-15', 'user1.jpg', 'Actif', '2021-07-28 11:21:12', 'GANDONOUJohanu', '2021-07-28 11:21:12', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(28, 'GANDONOU', 'Johanu1', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-07', 'user.jpg', 'Actif', '2021-07-28 12:53:18', 'GANDONOU Johanu', '2021-07-28 12:53:18', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(30, 'ZINSOU', 'Marcelin', 'marcelin@gmail.com', '61149070', 'porto-novo', 'M', '2021-07-16', 'default.jpg', 'Actif', '2021-07-28 14:57:07', 'GANDONOU Johanu', '2021-07-28 15:25:53', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(36, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61444555', 'porto-novo', 'M', '2021-07-16', 'user1.jpg', 'Inactif', '2021-07-28 18:19:17', 'GANDONOU Johanu', '2021-07-28 18:19:17', 'GANDONOUJohanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(38, 'GANDONOU', 'John', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-22', 'user2.jpg', 'Inactif', '2021-07-28 19:31:40', 'GANDONOU Johanu', '2021-07-28 19:59:57', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(40, 'GANDONOU', 'Jeannette', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-13', 'user3.jpg', 'Actif', '2021-07-28 20:51:31', 'GANDONOU Johanu', '2021-07-28 20:51:31', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(44, 'GANDONOU', 'Reine', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-06', 'user3.jpg', 'Actif', '2021-07-30 11:02:48', 'GANDONOU Johanu', '2021-07-30 11:02:48', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(45, 'GANDONOU', 'Johan', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-16', 'user.jpg', 'Actif', '2021-07-30 11:07:39', 'GANDONOU Johanu', '2021-07-30 11:07:39', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(46, 'GANDONOU', 'Johan', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-16', 'user.jpg', 'Actif', '2021-07-30 11:11:15', 'GANDONOU Johanu', '2021-08-09 13:27:59', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(49, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-29', 'register-bg.jpg', 'Actif', '2021-07-31 10:20:37', 'GANDONOU Johanu', '2021-08-09 13:24:22', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(50, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-06', 'portfolio-8.jpg', 'Actif', '2021-05-12 10:44:57', 'GANDONOU Johanu', '2021-07-31 10:44:57', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(51, '61149072', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-22', 'default.jpg', 'Actif', '2021-07-31 16:24:08', 'GANDONOU Johanu', '2021-07-31 16:34:10', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(52, 'GANDONOU100', 'Johanu100', 'johanugandonou100@gmail.com', '61149072', 'Calavi', 'M', '2021-08-18', '', 'Actif', '2021-08-02 00:53:45', 'GANDONOU Johanu', '2021-08-02 00:53:45', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(53, 'GANDONOU100', 'Johanu100', 'johanugandonou100@gmail.com', '61149072', 'Calavi', 'M', '2021-08-26', 'portfolio-1.jpg', 'Inactif', '2021-08-02 00:59:05', 'GANDONOU Johanu', '2021-08-02 00:59:05', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(54, 'GANDONOU100', 'Johanu100', 'johanugandonou100@gmail.com', '61149072', 'Calavi', 'M', '2021-08-26', 'portfolio-1.jpg', 'Inactif', '2021-05-05 00:59:53', 'GANDONOU Johanu', '2021-08-02 00:59:53', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(55, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-12', 'portfolio-5.jpg', 'Actif', '2021-08-02 01:01:19', 'GANDONOU Johanu', '2021-08-02 01:01:19', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(56, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-27', 'portfolio-6.jpg', 'Actif', '2021-08-02 01:11:02', 'GANDONOU Johanu', '2021-08-02 01:11:02', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(57, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-08-28', '5.jpg', 'Actif', '2021-08-02 01:14:16', 'GANDONOU Johanu', '2021-08-02 01:14:16', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(58, 'André', 'Pierre', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', '3.jpg', 'Actif', '2021-08-02 13:05:21', 'GANDONOU Johanu', '2021-08-02 13:05:21', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(59, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-21', 'default.jpg', 'Actif', '2021-08-02 22:27:48', 'GANDONOU Johanu', '2021-08-02 22:27:48', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(60, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-12', 'default.jpg', 'Actif', '2021-08-02 22:30:36', 'GANDONOU Johanu', '2021-08-02 22:30:55', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(61, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-27', '4.jpg', 'Actif', '2021-08-02 22:33:34', 'GANDONOU Johanu', '2021-08-06 20:03:11', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(62, 'Johanu', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-08-20', 'user1.jpg', 'Inactif', '2021-08-06 19:14:37', 'GANDONOU Johanu', '2021-08-06 19:46:10', 'GANDONOU Johanu', '1', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(63, 'sdfghjkl', 'ertyuio', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:19:10', 'GANDONOU Johanu', '2021-08-06 21:19:10', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(64, 'sdfghjkl', 'ertyuio', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:21:05', 'GANDONOU Johanu', '2021-08-06 21:21:05', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(65, 'sdfghjkl', 'ertyuio', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:22:05', 'GANDONOU Johanu', '2021-08-06 21:22:05', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(66, 'sdfghjkl', 'ertyuiop', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:27:45', 'GANDONOU Johanu', '2021-08-06 21:28:12', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(67, 'sdfghjkl', 'ertyui', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-26', 'default.jpg', 'Actif', '2021-08-06 21:34:44', 'GANDONOU Johanu', '2021-08-06 21:42:57', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(68, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-12', 'default.jpg', 'Actif', '2021-08-09 11:24:44', 'GANDONOU Johanu', '2021-08-09 11:24:44', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(69, '61149072', 'Johan', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-08-14', 'default.jpg', 'Actif', '2021-08-09 11:29:40', 'GANDONOU Johanu', '2021-08-09 11:29:40', 'GANDONOU Johanu', '1', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(70, 'GANDONOU', 'John', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-27', 'default.jpg', 'Actif', '2021-08-09 11:39:26', 'GANDONOU Johanu', '2021-08-09 11:39:26', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(71, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-27', 'default.jpg', 'Actif', '2021-08-09 11:40:52', 'GANDONOU Johanu', '2021-08-09 11:40:52', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(72, 'knknknk', 'qsdfg', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-07-27', 'default.jpg', 'Actif', '2021-08-09 11:41:30', 'GANDONOU Johanu', '2021-08-10 00:59:08', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(73, '61149072', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'F', '2021-08-13', 'default.jpg', 'Actif', '2021-08-09 15:28:45', 'GANDONOU Johanu', '2021-08-09 15:28:45', 'GANDONOU Johanu', '1', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(74, 'GANDONOU', 'Johanu', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-07-27', 'user2.jpg', 'Actif', '2021-08-09 15:43:08', 'GANDONOU Johanu', '2021-08-10 00:59:26', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(75, '61149072', 'GANDONOU', 'johanugandonou@gmail.com', '61149072', 'porto-novo', 'M', '2021-08-12', '0d09cdd75f014342bcea41f158627173.jpg', 'Actif', '2021-08-12 20:46:04', 'GANDONOU Johanu', '2021-08-12 20:46:04', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able personnel
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE personnel (
  id_personnel SERIAL NOT NULL,
  categorie_personnel text NOT NULL,
  date_prise_fonction_personnel date,
  notes_personnel text NOT NULL,
  id_personne_fk_personnel int NOT NULL,
  CONSTRAINT id_personnel_pk PRIMARY KEY(id_personnel)
);

--
-- SQLINES DEMO ***  données de la table personnel
--

INSERT INTO personnel (id_personnel, categorie_personnel, date_prise_fonction_personnel, notes_personnel, id_personne_fk_personnel) VALUES
(1, 'Agents d entretien', '2021-08-10', 'dfghjkl', 61),
(2, 'Aide-Soignant', '2021-08-13', 'zertyuio', 62),
(3, 'Aide-Soignant', '2021-07-28', 'ertyuio', 65),
(4, 'Agents d entretien', '2021-08-04', '', 66),
(5, 'Aide-Soignant', '2021-08-04', '', 67),
(6, 'Infimier', '2021-08-11', '', 68),
(7, 'Aide-Soignant', '2021-08-12', '', 69),
(8, 'Aide-Soignant', '2021-08-04', '', 70),
(9, 'Infimier', '2021-08-02', '', 71),
(10, 'Aide-Soignant', '2021-08-07', '', 72),
(11, 'Infimier', '2021-08-04', '', 73),
(12, 'Infimier', '2021-07-27', '', 74);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able planning
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE planning (
  id_planning SERIAL NOT NULL,
  planning text NOT NULL,
  date_create_planning timestamp(0) ,
  user_create_planning text NOT NULL,
  date_last_modif_planning timestamp(0) ,
  user_last_modif_planning text NOT NULL,
  del_planning  del NOT NULL DEFAULT '0',
  date_del_planning timestamp(0) ,
  user_del_planning text,
  id_docteur_fk_planning int NOT NULL,
  CONSTRAINT id_planning_pk PRIMARY KEY(id_planning)
);

--
-- SQLINES DEMO ***  données de la table planning
--

INSERT INTO planning (id_planning, planning, date_create_planning, user_create_planning, date_last_modif_planning, user_last_modif_planning, del_planning, date_del_planning, user_del_planning, id_docteur_fk_planning) VALUES
(1, 'Lundi-Mardi, 10h-15h', '2021-08-02 10:16:56', 'GANDONOU Johanu', '2021-08-02 10:16:56', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 21),
(2, 'Mardi-Mercredi, 10h-15h', '2021-08-02 10:43:54', 'GANDONOU Johanu', '2021-08-02 10:43:54', 'GANDONOU Johanu', '1', '2021-08-02 11:04:43', 'GANDONOU Johanu', 27),
(3, 'Mardi-Mercredi, 10h-15h', '2021-08-02 10:44:56', 'GANDONOU Johanu', '2021-08-02 10:57:35', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 25),
(4, 'Lundi-Mardi, 10h-15h', '2021-08-02 11:05:48', 'GANDONOU Johanu', '2021-08-02 11:05:48', 'GANDONOU Johanu', '1', '2021-08-02 11:05:55', 'GANDONOU Johanu', 21),
(5, 'Lundi-Mardi, 10h-15h', '2021-08-02 12:52:05', 'GANDONOU Johanu', '2021-08-02 12:52:05', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 3),
(6, 'Mardi-Mercredi, 10h-15h', '2021-08-02 23:11:32', 'GANDONOU Johanu', '2021-08-02 23:52:08', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 27),
(7, 'Lundi-Mardi, 10h-15h', '2021-08-02 23:45:18', 'GANDONOU Johanu', '2021-08-02 23:45:18', 'GANDONOU Johanu', '1', '2021-08-02 23:46:02', 'GANDONOU Johanu', 24);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able prestation
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE prestation (
  id_prestation SERIAL NOT NULL,
  nom_prestation text NOT NULL,
  montant_prestation text NOT NULL,
  notes_prestation text NOT NULL,
  statut_prestation  statut NOT NULL,
  date_create_prestation date,
  user_create_prestation text NOT NULL,
  date_last_modif_prestation date,
  user_last_modif_prestation text NOT NULL,
  del_prestation  del NOT NULL DEFAULT '0',
  date_del_prestation date,
  user_del_prestation text,
  id_departement_fk_prestation int NOT NULL,
  CONSTRAINT id_prestation_pk PRIMARY KEY(id_prestation)
);

--
-- SQLINES DEMO ***  données de la table prestation
--

INSERT INTO prestation (id_prestation, nom_prestation, montant_prestation, notes_prestation, statut_prestation, date_create_prestation, user_create_prestation, date_last_modif_prestation, user_last_modif_prestation, del_prestation, date_del_prestation, user_del_prestation, id_departement_fk_prestation) VALUES
(1, 'zertyuio', '50000', 'dfghjkl', 'Inactif', '2021-06-08', '', '2021-08-02', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1),
(3, 'fghjklmù', '20000', 'rftgyhujikolpm', 'Actif', '2021-08-02', 'GANDONOU Johanu', '2021-08-02', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 5),
(4, 'Consultation', '10000', 'fghj', 'Actif', '2020-11-10', 'GANDONOU Johanu', '2021-08-02', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6),
(5, 'Johanu', '20000', '', 'Inactif', '2021-08-02', 'GANDONOU Johanu', '2021-08-02', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6),
(6, 'sdfghjk', '5000', '', 'Actif', '2021-08-12', 'GANDONOU Johanu', '2021-08-12', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6),
(7, 'zertyuiomertyuiop', '74520', 'dtyuiop', 'Actif', '2021-01-13', '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 6);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able recette
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE recette (
  id_recette SERIAL NOT NULL,
  date_recette date,
  patient_assure_recette  yesno NOT NULL,
  assureur_recette text NOT NULL,
  montant_paye_par_assureur_recette text NOT NULL,
  notes_recette text NOT NULL,
  statut_recette  statut NOT NULL,
  date_create_recette timestamp(0) ,
  user_create_recette text NOT NULL,
  date_last_modif_recette timestamp(0) ,
  user_last_modif_recette text NOT NULL,
  del_recette  del NOT NULL,
  date_del_recette timestamp(0) ,
  user_del_recette text,
  id_prestation_fk_recette int NOT NULL,
  id_patient_fk_recette int NOT NULL,
  CONSTRAINT id_recette_pk PRIMARY KEY(id_recette)
);

--
-- SQLINES DEMO ***  données de la table recette
--

INSERT INTO recette (id_recette, date_recette, patient_assure_recette, assureur_recette, montant_paye_par_assureur_recette, notes_recette, statut_recette, date_create_recette, user_create_recette, date_last_modif_recette, user_last_modif_recette, del_recette, date_del_recette, user_del_recette, id_prestation_fk_recette, id_patient_fk_recette) VALUES
(1, '2021-08-17', 'Non', '', '', 'cfghjklm', 'Actif', '2021-04-06 00:00:00', '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 6),
(2, '2021-08-06', 'Oui', 'zertyuio', '1000', 'dfghjklm', 'Actif', '2021-08-02 00:49:02', 'GANDONOU Johanu', '2021-08-02 00:49:02', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 2),
(5, '2021-08-07', 'Oui', 'sdfghjkl', '1000', 'dfghjkl', 'Actif', '2021-08-02 00:59:53', 'GANDONOU Johanu', '2021-08-02 00:59:53', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 11),
(6, '2021-08-12', 'Non', '', '', 'poiuytrez', 'Inactif', '2021-08-02 01:01:20', 'GANDONOU Johanu', '2021-08-02 01:01:20', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 12),
(7, '2021-08-14', 'Non', '', '', 'vbnjk;', 'Actif', '2021-08-02 01:08:12', 'GANDONOU Johanu', '2021-08-02 01:08:12', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 2),
(8, '2021-08-07', 'Non', '', '', 'dfghjklmù', 'Inactif', '2021-08-02 01:11:02', 'GANDONOU Johanu', '2021-08-02 01:11:02', 'GANDONOU Johanu', '1', '2021-08-02 02:10:26', 'GANDONOU Johanu', 1, 13),
(9, '2021-08-04', 'Non', '', '', 'sdfghjk', 'Actif', '2021-08-02 01:13:22', 'GANDONOU Johanu', '2021-08-02 01:13:22', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 6),
(10, '2021-08-02', 'Non', '', '', 'qsdfghjk', 'Actif', '2021-08-02 01:14:17', 'GANDONOU Johanu', '2021-08-02 01:14:17', 'GANDONOU Johanu', '1', '2021-08-02 02:07:56', 'GANDONOU Johanu', 1, 14),
(11, '2021-08-02', 'Non', '', '', 'qsdfghjk', 'Inactif', '2021-08-02 01:34:21', 'GANDONOU Johanu', '2021-08-02 01:34:21', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 4),
(12, '2021-08-07', 'Non', '', '', 'dfghjkl111222', 'Actif', '2021-08-02 01:34:48', 'GANDONOU Johanu', '2021-08-02 01:57:06', 'GANDONOU Johanu', '1', '2021-08-02 02:07:23', 'GANDONOU Johanu', 1, 6),
(14, '2021-08-02', 'Non', '', '', 'zertyu', 'Actif', '2021-08-02 13:02:28', 'GANDONOU Johanu', '2021-08-02 13:02:28', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4, 4),
(15, '2021-08-02', 'Oui', 'NCA', '15000', 'dfghjk', 'Actif', '2021-08-02 13:05:22', 'GANDONOU Johanu', '2021-08-02 13:05:22', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4, 15),
(16, '2021-08-27', 'Non', '', '', '', 'Actif', '2021-08-02 22:26:43', 'GANDONOU Johanu', '2021-08-02 22:27:06', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4, 6),
(17, '2021-08-07', 'Oui', 'NCA', '15000', '', 'Actif', '2021-07-13 22:27:49', 'GANDONOU Johanu', '2021-08-03 00:23:22', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 1, 16),
(18, '2021-08-20', 'Oui', 'NCA', '', '', 'Actif', '2021-08-03 00:17:54', 'GANDONOU Johanu', '2021-08-03 00:17:54', 'GANDONOU Johanu', '1', '2021-08-03 00:18:13', 'GANDONOU Johanu', 4, 4);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able rendez_vous
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE rendez_vous (
  id_rendez_vous SERIAL NOT NULL,
  date_rendez_vous timestamp(0) ,
  symptomes_rendez_vous text NOT NULL,
  date_debut_symptome_rendez_vous date,
  notes_rendez_vous text NOT NULL,
  paiement_rendez_vous  yesno NOT NULL,
  montant_paye_rendez_vous int NOT NULL DEFAULT '0',
  statut_rendez_vous  statut NOT NULL,
  date_create_rendez_vous timestamp(0) ,
  user_create_rendez_vous text NOT NULL,
  date_last_modif_rendez_vous timestamp(0) ,
  user_last_modif_rendez_vous text NOT NULL,
  del_rendez_vous  del NOT NULL DEFAULT '0',
  date_del_rendez_vous timestamp(0) ,
  user_del_rendez_vous text,
  id_patient_fk_rendez_vous int NOT NULL,
  id_specialite_fk_rendez_vous int NOT NULL,
  CONSTRAINT id_rendez_vous_pk PRIMARY KEY(id_rendez_vous)
);

--
-- SQLINES DEMO ***  données de la table rendez_vous
--

INSERT INTO rendez_vous (id_rendez_vous, date_rendez_vous, symptomes_rendez_vous, date_debut_symptome_rendez_vous, notes_rendez_vous, paiement_rendez_vous, montant_paye_rendez_vous, statut_rendez_vous, date_create_rendez_vous, user_create_rendez_vous, date_last_modif_rendez_vous, user_last_modif_rendez_vous, del_rendez_vous, date_del_rendez_vous, user_del_rendez_vous, id_patient_fk_rendez_vous, id_specialite_fk_rendez_vous) VALUES
(2, '2021-08-03 16:00:00', '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 'Non', 0, 'Inactif', '2021-08-02 15:00:33', 'GANDONOU Johanu', '2021-08-02 15:00:33', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 2, 1),
(3, '2021-07-28 14:03:00', '', '2021-08-13', '', 'Oui', 1000, 'Actif', '2021-08-02 15:03:56', 'GANDONOU Johanu', '2021-08-02 21:03:23', 'GANDONOU Johanu', '1', '2021-08-02 21:49:46', 'GANDONOU Johanu', 4, 1),
(4, '2021-08-13 19:48:00', '', '2021-07-28', '', 'Non', 0, 'Actif', '2021-08-02 20:48:17', 'GANDONOU Johanu', '2021-08-02 20:48:17', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 11, 8),
(5, '2021-08-02 21:23:00', '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 'Non', 0, 'Actif', '2021-08-02 21:19:40', 'GANDONOU Johanu', '2021-08-02 21:22:44', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 8, 5),
(6, '2021-08-02 23:00:00', 'zertyui', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), 'qsdfghjk', 'Non', 0, 'Inactif', '2021-08-02 21:20:40', 'GANDONOU Johanu', '2021-08-06 21:15:14', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', 4, 14),
(7, '2021-08-21 20:14:00', '', '2021-08-04', '', 'Oui', 10000, 'Actif', '2021-08-06 21:14:29', 'GANDONOU Johanu', '2021-08-06 21:14:29', 'GANDONOU Johanu', '1', '2021-08-06 21:14:59', 'GANDONOU Johanu', 4, 8),
(8, '2021-08-20 20:23:00', '', '2021-08-03', 'sdfghjklm', 'Oui', 10000, 'Actif', '2021-08-06 21:23:46', 'GANDONOU Johanu', '2021-08-06 21:24:24', 'GANDONOU Johanu', '1', '2021-08-06 21:24:32', 'GANDONOU Johanu', 15, 8),
(9, '2021-08-19 20:30:00', '', '2021-07-27', '', 'Oui', 10000, 'Actif', '2021-08-06 21:31:04', 'GANDONOU Johanu', '2021-08-06 21:31:22', 'GANDONOU Johanu', '1', '2021-08-06 21:31:44', 'GANDONOU Johanu', 6, 8);

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able specialite
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE specialite (
  id_specialite SERIAL NOT NULL,
  nom_specialite text NOT NULL,
  desc_specialite text NOT NULL,
  statut_specialite  statut NOT NULL,
  date_create_specialite timestamp(0) ,
  user_create_specialite text NOT NULL,
  date_last_modif_specialite timestamp(0) ,
  user_last_modif_specialite text NOT NULL,
  del_specialite  del NOT NULL DEFAULT '0',
  date_del_specialite timestamp(0) ,
  user_del_specialite text,
  CONSTRAINT id_specialite_pk PRIMARY KEY(id_specialite)
);

--
-- SQLINES DEMO ***  données de la table specialite
--

INSERT INTO specialite (id_specialite, nom_specialite, desc_specialite, statut_specialite, date_create_specialite, user_create_specialite, date_last_modif_specialite, user_last_modif_specialite, del_specialite, date_del_specialite, user_del_specialite) VALUES
(1, 'Généraliste', 'hjklkjh ghjiopoiu hjkoiu', 'Actif', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(4, 'AAA', 'vbnfghjk fghjkl vbn', 'Actif', '2019-06-04 01:01:50', 'GANDONOU Johanu', '2021-07-29 01:01:50', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(5, 'GANDONOU', 'vbnfghjk fghjkl vbn', 'Actif', '2021-07-29 01:02:09', 'GANDONOU Johanu', '2021-07-29 01:02:09', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(6, 'ZINSOU', 'vbnfghjk fghjkl vbn', 'Actif', '2021-05-05 01:12:17', 'GANDONOU Johanu', '2021-07-29 01:12:17', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(7, 'GANDONOU', 'vbnfghjk fghjkl vbn', 'Actif', '2021-07-29 01:23:39', 'GANDONOU Johanu', '2021-07-29 01:24:02', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(8, 'Dentiste', 'fghjkl tyuiop vgbnhjkl', 'Actif', '2021-07-29 01:35:48', 'GANDONOU Johanu', '2021-07-29 01:35:48', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(9, 'Dentiste', 'fghjkl tyuiop vgbnhjkl', 'Actif', '2021-06-09 01:37:03', 'GANDONOU Johanu', '2021-07-29 01:37:03', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(10, 'Dentiste', 'fghjkl tyuiop vgbnhjkl', 'Actif', '2021-07-29 01:39:56', 'GANDONOU Johanu', '2021-07-29 01:39:56', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(14, 'zertyuik', 'ghjklghjkjjk', 'Inactif', '2021-07-30 14:59:15', 'GANDONOU Johanu', '2021-07-30 16:23:43', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(15, 'Dentiste', 'sncksnknosnof', 'Actif', '2021-07-31 09:57:19', 'GANDONOU Johanu', '2021-07-31 09:57:19', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(16, 'Dentiste', 'sdjozjoscs', 'Actif', '2021-02-11 09:58:26', 'GANDONOU Johanu', '2021-07-31 09:58:26', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(17, 'Dentiste', 'sdjozjoscs', 'Actif', '2021-07-31 09:58:56', 'GANDONOU Johanu', '2021-07-31 09:58:56', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(18, 'Dentiste1', 'sdjozjoscs', 'Actif', '2021-07-31 10:03:01', 'GANDONOU Johanu', '2021-07-31 10:03:01', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(19, 'Dentiste2', 'sdjozjoscs', 'Actif', '2021-07-31 10:03:32', 'GANDONOU Johanu', '2021-07-31 10:03:32', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), ''),
(20, 'Dentiste1111', '', 'Actif', '2021-08-02 22:37:09', 'GANDONOU Johanu', '2021-08-02 22:37:09', 'GANDONOU Johanu', '0', NULLIF('0000-00-00 00:00:00','0000-00-00 00:00:00')::timestamp(0), '');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** able type_compte
--

-- SQLINES DEMO *** OR EVALUATION USE ONLY
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE type_compte (
  id_type_compte SERIAL NOT NULL,
  lib_type_compte text NOT NULL,
  statut_type_compte  statut NOT NULL,
  CONSTRAINT id_type_compte_pk PRIMARY KEY(id_type_compte)
);

--
-- SQLINES DEMO ***  données de la table type_compte
--

INSERT INTO type_compte (id_type_compte, lib_type_compte, statut_type_compte) VALUES
(1, 'Super Admin', 'Actif'),
(2, 'Admin', 'Actif'),
(3, 'Editeur', 'Actif'),
(4, 'Auteur', 'Actif'),
(5, 'Lecteur', 'Actif');


--
-- SQLINES DEMO *** ur les tables déchargées
--

--
-- SQLINES DEMO *** les tables déchargées
--

--
-- SQLINES DEMO *** la table assoc_compte_and_menu
--
ALTER TABLE assoc_compte_and_menu
  ADD CONSTRAINT id_compte_fk_assoc_compte_and_menu FOREIGN KEY (id_compte_fk_assoc_compte_and_menu) REFERENCES compte (id_compte),
  ADD CONSTRAINT id_menu_fk_assoc_compte_and_menu FOREIGN KEY (id_menu_fk_assoc_compte_and_menu) REFERENCES menu (id_menu);

--
-- SQLINES DEMO *** la table assoc_departement_and_personnel
--
ALTER TABLE assoc_departement_and_personnel
  ADD CONSTRAINT assoc_departement_and_personnel_ibfk_1 FOREIGN KEY (id_departement_fk_assoc_departement_and_personnel) REFERENCES departement (id_departement),
  ADD CONSTRAINT assoc_departement_and_personnel_ibfk_2 FOREIGN KEY (id_personnel_fk_assoc_departement_and_personnel) REFERENCES personnel (id_personnel);

--
-- SQLINES DEMO *** la table compte
--
ALTER TABLE compte
  ADD CONSTRAINT id_personne_fk_compte FOREIGN KEY (id_personne_fk_compte) REFERENCES personne (id_personne),
  ADD CONSTRAINT id_type_compte_fk_compte FOREIGN KEY (id_type_compte_fk_compte) REFERENCES type_compte (id_type_compte);

--
-- SQLINES DEMO *** la table departement
--
ALTER TABLE departement
  ADD CONSTRAINT departement_ibfk_1 FOREIGN KEY (id_batiment_fk_departement) REFERENCES batiment (id_batiment);

--
-- SQLINES DEMO *** la table depense
--
ALTER TABLE depense
  ADD CONSTRAINT id_departement_fk_depense FOREIGN KEY (id_departement_fk_depense) REFERENCES departement (id_departement);

--
-- SQLINES DEMO *** la table docteur
--
ALTER TABLE docteur
  ADD CONSTRAINT id_departement_fk_docteur FOREIGN KEY (id_departement_fk_docteur) REFERENCES departement (id_departement),
  ADD CONSTRAINT id_personne_fk_docteur FOREIGN KEY (id_personne_fk_docteur) REFERENCES personne (id_personne),
  ADD CONSTRAINT id_specialite_fk_docteur FOREIGN KEY (id_specialite_fk_docteur) REFERENCES specialite (id_specialite);

--
-- SQLINES DEMO *** la table equipement
--
ALTER TABLE equipement
  ADD CONSTRAINT id_departement_fk_equipement FOREIGN KEY (id_departement_fk_equipement) REFERENCES departement (id_departement);

--
-- SQLINES DEMO *** la table patient
--
ALTER TABLE patient
  ADD CONSTRAINT id_personne_fk_patient FOREIGN KEY (id_personne_fk_patient) REFERENCES personne (id_personne);

--
-- SQLINES DEMO *** la table personnel
--
ALTER TABLE personnel
  ADD CONSTRAINT id_personne_fk_personnel FOREIGN KEY (id_personne_fk_personnel) REFERENCES personne (id_personne);

--
-- SQLINES DEMO *** la table planning
--
ALTER TABLE planning
  ADD CONSTRAINT id_docteur_fk_planning FOREIGN KEY (id_docteur_fk_planning) REFERENCES docteur (id_docteur);

--
-- SQLINES DEMO *** la table prestation
--
ALTER TABLE prestation
  ADD CONSTRAINT id_specialite_fk_prestation FOREIGN KEY (id_departement_fk_prestation) REFERENCES departement (id_departement);

--
-- SQLINES DEMO *** la table recette
--
ALTER TABLE recette
  ADD CONSTRAINT id_patient_fk_recette FOREIGN KEY (id_patient_fk_recette) REFERENCES patient (id_patient),
  ADD CONSTRAINT id_prestation_fk_recette FOREIGN KEY (id_prestation_fk_recette) REFERENCES prestation (id_prestation);

--
-- SQLINES DEMO *** la table rendez_vous
--
ALTER TABLE rendez_vous
  ADD CONSTRAINT id_patient_fk_rendez_vous FOREIGN KEY (id_patient_fk_rendez_vous) REFERENCES patient (id_patient),
  ADD CONSTRAINT id_specialite_fk_rendez_vous FOREIGN KEY (id_specialite_fk_rendez_vous) REFERENCES specialite (id_specialite);
COMMIT;