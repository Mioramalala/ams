-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 06 Décembre 2013 à 13:03
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `data_ams`
--
CREATE DATABASE `data_ams` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `data_ams`;

-- --------------------------------------------------------

--
-- Structure de la table `tab_achat`
--

CREATE TABLE IF NOT EXISTS `tab_achat` (
  `ACHAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACHAT_CONCLUSION` varchar(255) NOT NULL,
  `ACHAT_NIVEAU_RISQUE` varchar(255) NOT NULL,
  `ACHAT_NOTE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`ACHAT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_achat`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_actionnaire`
--

CREATE TABLE IF NOT EXISTS `tab_actionnaire` (
  `ACTIONNAIRE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACTIONNAIRE_NOM` varchar(255) NOT NULL,
  `ACTIONNAIRE_PART` varchar(255) NOT NULL,
  `ACTIONNAIRE_POURCENTAGE` varchar(255) NOT NULL,
  `ENTREPRISE_ID` int(11) NOT NULL,
  PRIMARY KEY (`ACTIONNAIRE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_actionnaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_balance_auxiliaire`
--

CREATE TABLE IF NOT EXISTS `tab_balance_auxiliaire` (
  `BALANCE_AUXILIAIRE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BALANCE_AUXILIAIRE_COMPTE` int(11) NOT NULL,
  `BALANCE_AUXILIAIRE_DEBIT` int(11) NOT NULL,
  `BALANCE_AUXILIAIRE_CREDIT` int(11) NOT NULL,
  `BALANCE_AUXILIAIRE_SOLDE` int(11) NOT NULL,
  PRIMARY KEY (`BALANCE_AUXILIAIRE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_balance_auxiliaire`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_balance_general`
--

CREATE TABLE IF NOT EXISTS `tab_balance_general` (
  `BALANCE_GENERAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BALANCE_GENERAL_COMPTE` int(11) NOT NULL,
  `BALANCE_GENERAL_DEBIT` int(11) NOT NULL,
  `BALANCE_GENERAL_CREDIT` int(11) NOT NULL,
  `BALANCE_GENERAL_SOLDE` int(11) NOT NULL,
  PRIMARY KEY (`BALANCE_GENERAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_balance_general`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_entreprise`
--

CREATE TABLE IF NOT EXISTS `tab_entreprise` (
  `ENTREPRISE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ENTREPRISE_DENOMINATION_SOCIAL` varchar(255) NOT NULL,
  `ENTREPRISE_CONTACT` varchar(255) NOT NULL,
  `ENTREPRISE_CAPITAL_SOCIAL` varchar(255) NOT NULL,
  `ENTREPRISE_RC` varchar(255) NOT NULL,
  `ENTREPRISE_NIF` varchar(255) NOT NULL,
  `ENTREPRISE_STAT` varchar(255) NOT NULL,
  `ENTREPRISE_RAISON_SOCIAL` varchar(255) NOT NULL,
  `ENTREPRISE_ADRESSE` varchar(255) NOT NULL,
  `ENTREPRISE_MAIL` varchar(255) NOT NULL,
  PRIMARY KEY (`ENTREPRISE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_entreprise`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_envi_control`
--

CREATE TABLE IF NOT EXISTS `tab_envi_control` (
  `ENVI_CONTROL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ENVI_CONTROL_CONCLUSION` varchar(255) NOT NULL,
  `ENVI_CONTROL_NIVEAU_RISQUE` varchar(255) NOT NULL,
  `ENVI_CONTROL_NOTE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`ENVI_CONTROL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_envi_control`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_grand_livre`
--

CREATE TABLE IF NOT EXISTS `tab_grand_livre` (
  `GRAND_LIVRE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GRAND_LIVRE_COMPTE` int(11) NOT NULL,
  `GRAND_LIVRE_DATE` date NOT NULL,
  `GRAND_LIVRE_JOURNAL` varchar(255) NOT NULL,
  `GRAND_LIVRE_REFERENCE` varchar(255) NOT NULL,
  `GRAND_LIVRE_LIBELLE` varchar(255) NOT NULL,
  `GRAND_LIVRE_DEBIT` double NOT NULL,
  `GRAND_LIVRE_CREDIT` double NOT NULL,
  `GRAND_LIVRE_PIECE_JUSTIFICATIVE` varchar(255) NOT NULL,
  PRIMARY KEY (`GRAND_LIVRE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_grand_livre`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_immo`
--

CREATE TABLE IF NOT EXISTS `tab_immo` (
  `IMMO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IMMO_CONCLUSION` varchar(255) NOT NULL,
  `IMMO_NIVEAU_RISQUE` varchar(255) NOT NULL,
  `IMMO_NOTE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`IMMO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_immo`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_mail`
--

CREATE TABLE IF NOT EXISTS `tab_mail` (
  `MAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MAIL` varchar(255) NOT NULL,
  `MAIL_VERIFE` int(2) NOT NULL,
  PRIMARY KEY (`MAIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `tab_mail`
--

INSERT INTO `tab_mail` (`MAIL_ID`, `MAIL`, `MAIL_VERIFE`) VALUES
(14, 'fdsf@sdfd', 1),
(15, 'sdfsds@dfgff', 1),
(16, 'wxffdfg@dfhdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tab_mission`
--

CREATE TABLE IF NOT EXISTS `tab_mission` (
  `MISSION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MISSION_DATE_DEBUT` date NOT NULL,
  `MISSION_DATE_CLOTURE` date NOT NULL,
  `MISSION_ANNEE` int(11) NOT NULL,
  `MISSION_TYPE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  `ENTREPRISE_ID` int(11) NOT NULL,
  PRIMARY KEY (`MISSION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_mission`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_mission_question_b`
--

CREATE TABLE IF NOT EXISTS `tab_mission_question_b` (
  `MISSION_QUESTION_B_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MISSION_ID` int(11) NOT NULL,
  `MISSION_QUESTION_B_OUI_NON` varchar(255) NOT NULL,
  `MISSION_QUESTION_B_COMMENTAIRE` varchar(255) NOT NULL,
  `QUESTION_ACHAT_B_ID` int(11) NOT NULL,
  PRIMARY KEY (`MISSION_QUESTION_B_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `tab_mission_question_b`
--

INSERT INTO `tab_mission_question_b` (`MISSION_QUESTION_B_ID`, `MISSION_ID`, `MISSION_QUESTION_B_OUI_NON`, `MISSION_QUESTION_B_COMMENTAIRE`, `QUESTION_ACHAT_B_ID`) VALUES
(1, 1, 'OUI', 'azertyui', 1),
(2, 1, 'NON', 'qsdfghjklm', 2),
(5, 1, 'NON', 'qsezdrtyhuikoljjh', 3),
(6, 1, 'OUI', 'nbvcxwqsdfghytrezaazertyuiopmlkjhgfdsqwxcvbnkjhgfdsqazertyuiopmlkh', 4),
(7, 1, 'OUI', 'Quelle est la question', 5),
(8, 1, 'OUI', 'Telle est la question', 6),
(9, 1, 'NON', 'Votre question', 21),
(10, 1, 'OUI', 'Quelle est votre question', 22),
(11, 1, 'OUI', 'Choix de question', 23),
(12, 1, 'NON', 'La question qui se pose', 24),
(13, 1, 'OUI', 'La question', 25),
(14, 1, 'NON', 'Votre commetaire', 26),
(15, 1, 'OUI', 'Votre commentaire', 27),
(16, 1, 'NON', 'Quelle est votre commentaire', 28),
(17, 1, 'NON', 'Votre choix de commentaire', 29),
(18, 1, 'OUI', 'Votre vrai commentaire', 30),
(19, 1, 'NON', 'Choix difficile', 31),
(20, 1, 'OUI', 'Le commentaire necessaire', 32),
(21, 1, 'OUI', 'La commentaire exacte', 33),
(22, 1, 'NON', 'Votre question', 34);

-- --------------------------------------------------------

--
-- Structure de la table `tab_paie`
--

CREATE TABLE IF NOT EXISTS `tab_paie` (
  `PAIE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAIE_CONCLUSION` varchar(255) NOT NULL,
  `PAIE_NIVEAU_RISQUE` varchar(255) NOT NULL,
  `PAIE_NOTE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`PAIE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_paie`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_personnel`
--

CREATE TABLE IF NOT EXISTS `tab_personnel` (
  `PERSONNEL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERSONNEL_FONCTION` varchar(255) NOT NULL,
  `ENTREPRISE_ID` int(11) NOT NULL,
  PRIMARY KEY (`PERSONNEL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tab_personnel`
--

INSERT INTO `tab_personnel` (`PERSONNEL_ID`, `PERSONNEL_FONCTION`, `ENTREPRISE_ID`) VALUES
(1, 'PDG', 0),
(2, 'DG', 0),
(3, 'ING', 0),
(4, 'DP', 0),
(5, 'DSI', 0),
(6, 'DAF', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_question_achat_b`
--

CREATE TABLE IF NOT EXISTS `tab_question_achat_b` (
  `QUESTION_ACHAT_B_ID` int(11) NOT NULL AUTO_INCREMENT,
  `QUESTION_ACHAT_B` varchar(255) NOT NULL,
  `COEF` int(2) NOT NULL,
  PRIMARY KEY (`QUESTION_ACHAT_B_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `tab_question_achat_b`
--

INSERT INTO `tab_question_achat_b` (`QUESTION_ACHAT_B_ID`, `QUESTION_ACHAT_B`, `COEF`) VALUES
(1, '1.	Toutes les marchandises recues sont-elles enregistrees : 	a)	sur des documents standard ?', 1),
(2, '1.	Toutes les marchandises recues sont-elles enregistrees : b)	prenumerotes ?', 1),
(3, '2.	Tous les services recus sont-ils enregistres : 	a)	sur des documents standard ?', 1),
(4, '2.	Tous les services recus sont-ils enregistres : b)	prenumerotes ?', 1),
(5, 'Toutes les marchandises retournees et les reclamations effectuees sont enregistrees sur des documents : a)	standard ?', 1),
(6, '3.	Toutes les marchandises retournees et les reclamations effectuees sont enregistrees sur des documents :b)	prenumerotes ?', 1),
(7, 'Le service comptable verifie-t-il la sequence numerique des : a)	bons de reception ?', 2),
(8, 'Le service comptable verifie-t-il la sequence numerique des :b)	bons de retour ou de reclamation pour s''assurer qu''il les reçoit tous ?', 2),
(21, 'Le service comptable tient-il un registre des receptions et des retours ou reclamations pour lesquels les factures et avoirs n''ont pas ete recus ?', 3),
(22, 'Ce registre : a)	fait-il l''objet d''une revue particuliere pour identifier la cause des retards ?', 2),
(23, 'Ce registre :b)	sert-il a evaluer les provisions pour factures et avoirs a recevoir ?', 3),
(24, 'Le journal des achats est-il rapproche de la liste des receptions retours ou reclamations pour s''assurer que toutes les factures et tous les avoirs sont comptabilises ?', 3),
(25, 'Les produits afferents aux achats (ristournes) sont-ils identifies au fur et a mesure des receptions pour permettre de verifier que : a)	les avoirs sont recus ?', 2),
(26, '8.	Les produits afferents aux achats (ristournes) sont-ils identifies au fur et a mesure des receptions pour permettre de verifier que :b)	les avoirs sont comptabilites ?', 2),
(27, 'Les charges afferentes aux achats (frais de transport) sont-elles identifiees au fur et a mesure des receptions pour permettre de verifier que :  a)	les factures sont recues ?', 2),
(28, 'Les charges afferentes aux achats (frais de transport) sont-elles identifiees au fur et a mesure des receptions pour permettre de verifier que : b)	les factures sont comptabilisees ?', 3),
(29, '10.	Lorsque les factures et avoirs sont envoyes dans les services pour controle, le service comptable garde-t-il la trace de ces envois ? 	a)	pour suivre les retours ?', 1),
(30, '10.	Lorsque les factures et avoirs sont envoyes dans les services pour controle, le service comptable garde-t-il la trace de ces envois ?b)	identifier les factures non enregistrees ?', 2),
(31, 'Les comptes fournisseurs sont-ils regulierement rapproches : a)	du compte general ?', 2),
(32, 'Les comptes fournisseurs sont-ils regulierement rapproches :b)	des releves fournisseurs ?', 2),
(33, 'Lorsque le systeme prevoit le rejet d''operations non conformes, ces rejets sont-ils : a)	listes ?', 3),
(34, 'Lorsque le systeme prevoit le rejet d''operations non conformes, ces rejets sont-ils :b)	suivis pour verifier qu''ils sont tous recycles ?', 3);

-- --------------------------------------------------------

--
-- Structure de la table `tab_resume`
--

CREATE TABLE IF NOT EXISTS `tab_resume` (
  `RESUME_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GRAND_LIVRE_ID` int(11) NOT NULL,
  `BALANCE_GENERAL_ID` int(11) NOT NULL,
  PRIMARY KEY (`RESUME_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_resume`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_resume_frns`
--

CREATE TABLE IF NOT EXISTS `tab_resume_frns` (
  `RESUME_FRNS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GRAND_LIVRE_ID` int(11) NOT NULL,
  `BALANCE_AUXILIAIRE_ID` int(11) NOT NULL,
  PRIMARY KEY (`RESUME_FRNS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_resume_frns`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_souvenir`
--

CREATE TABLE IF NOT EXISTS `tab_souvenir` (
  `SOUVENIR_ID` int(2) NOT NULL AUTO_INCREMENT,
  `SOUVENIR_LOGIN` varchar(255) NOT NULL,
  PRIMARY KEY (`SOUVENIR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_souvenir`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_stock`
--

CREATE TABLE IF NOT EXISTS `tab_stock` (
  `STOCK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STOCK_CONCLUSION` varchar(255) NOT NULL,
  `STOCK_NIVEAU_RISQUE` varchar(255) NOT NULL,
  `STOCK_NOTE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`STOCK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_stock`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_treso_dep`
--

CREATE TABLE IF NOT EXISTS `tab_treso_dep` (
  `TRESO_DEP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRESO_DEP_CONCLUSION` varchar(255) NOT NULL,
  `TRESO_DEP_NIVEAU_RISQUE` varchar(255) NOT NULL,
  `TRESO_DEP_NOTE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`TRESO_DEP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_treso_dep`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_treso_rec`
--

CREATE TABLE IF NOT EXISTS `tab_treso_rec` (
  `TRESO_REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRESO_REC_CONCLUSION` varchar(255) NOT NULL,
  `TRESO_REC_NIVEAU_RISQUE` varchar(255) NOT NULL,
  `TRESO_REC_NOTE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`TRESO_REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_treso_rec`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_utilisateur`
--

CREATE TABLE IF NOT EXISTS `tab_utilisateur` (
  `UTIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTIL_NOM` varchar(255) NOT NULL,
  `UTIL_LOGIN` varchar(255) NOT NULL,
  `UTIL_MDP` varchar(255) NOT NULL,
  `UTIL_STATUT` int(2) NOT NULL,
  PRIMARY KEY (`UTIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tab_utilisateur`
--

INSERT INTO `tab_utilisateur` (`UTIL_ID`, `UTIL_NOM`, `UTIL_LOGIN`, `UTIL_MDP`, `UTIL_STATUT`) VALUES
(1, 'Eddy', 'Eddy', '1234', 3),
(2, 'Rodin', 'Rodin', '1234', 2),
(3, 'Enoch', 'Enoch', '1234', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tab_vente`
--

CREATE TABLE IF NOT EXISTS `tab_vente` (
  `VENTE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VENTE _CONCLUSION` varchar(255) NOT NULL,
  `VENTE _NIVEAU_RISQUE` varchar(255) NOT NULL,
  `VENTE _NOTE` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  PRIMARY KEY (`VENTE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_vente`
--

