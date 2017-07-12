﻿-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 14 Janvier 2014 à 16:12
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `tab_actionnaire`
--

INSERT INTO `tab_actionnaire` (`ACTIONNAIRE_ID`, `ACTIONNAIRE_NOM`, `ACTIONNAIRE_PART`, `ACTIONNAIRE_POURCENTAGE`, `ENTREPRISE_ID`) VALUES
(17, 'Rakotoarison jean', '3', '50', 4),
(19, 'Ravao arisoa', '2', '15', 4),
(20, 'Nomenjanahary', '6', '85', 4),
(21, 'Bernard Daufin', '5', '40', 2),
(23, 'Sao Bernardette', '2', '30', 3),
(24, 'Phikipinn Diagos', '12', '60', 2),
(25, 'Betrosa jean', '6', '30', 3),
(36, 'Paul gerard', '1', '50', 42),
(37, 'Lemborky', '1', '50', 42),
(38, 'Rakoto', '1', '33', 43),
(39, 'Rasoa', '1', '33', 43),
(41, 'Zeze Marque', '1', '60', 44),
(43, 'D', 'A', '50', 45),
(44, 'R', 'R', '50', 45);

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
  `BALANCE_GENERAL_COMPTE_CONCERNE` varchar(25) NOT NULL,
  `BALANCE_GENERAL_GROUPES` varchar(255) NOT NULL,
  `BALANCE_GENERAL_CYCLE` varchar(11) NOT NULL,
  `BALANCE_GENERAL_PCG` int(5) NOT NULL,
  PRIMARY KEY (`BALANCE_GENERAL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `tab_balance_general`
--

INSERT INTO `tab_balance_general` (`BALANCE_GENERAL_ID`, `BALANCE_GENERAL_COMPTE_CONCERNE`, `BALANCE_GENERAL_GROUPES`, `BALANCE_GENERAL_CYCLE`, `BALANCE_GENERAL_PCG`) VALUES
(1, '101 Ã  109999', 'Capital', 'A-', 2),
(2, '111 &agrave 119', 'Report  &agrave; nouveau', 'A-', 2),
(3, '121 &agrave 129', 'Resultat', 'A-', 2),
(4, '131 &agrave 139', 'Produits et charges diff&eacute;r&eacute;s', 'A-', 2),
(5, '151 &agrave 159', 'Provisions pour charges', 'A-', 2),
(7, '161 &agrave 169', 'Emprunts et dettes assimil&eacute;s', 'A-', 2),
(8, '171 &agrave 179', 'Dettes rattach&eacute;s &agrave des participations', 'A-', 2),
(9, '181 &agrave 189', 'Comptes de liaisons', 'A-', 2),
(10, '201  &agrave 209', 'Immobilisations incorporelles', 'D-', 2),
(11, '211  &agrave 219', 'Immobilisations corporelles', 'B-', 2),
(12, '221  &agrave 229', 'Immobilisations mises en concessions', 'B-', 2),
(13, '231  &agrave 239', 'Immobilisations en-cours', 'B-', 2),
(14, '241  &agrave 249', 'Autres immobilisations', 'B-', 2),
(15, '251  &agrave 259', 'Autres immobilisations', 'B-', 2),
(17, '261  &agrave 269', 'Participations et cr&eacute;ances rattach&eacute;es &agrave; des participations', 'B-', 2),
(18, '271  &agrave 279', 'Autres imobilisations financi&egrave;res', 'B-', 2),
(19, '281  &agrave 285', 'Amortissements', 'B-', 2),
(20, '290  &agrave 295', 'Pertes de valeurs sur immobilisations', 'B-', 2),
(21, '296  &agrave 297', 'Pertes de valeurs sur immobilisations', 'B-', 2),
(22, '301  &agrave 381', 'Stocks', 'C-', 2),
(23, '391  &agrave 399', 'Provisions pour cr&eacute;ances rattach&eacute;es &agrave; des participations de stocks', 'C-', 2),
(25, '401  &agrave 409', 'Fournisseurs et comptes rattach&eacute;s', 'D-', 2),
(26, '411  &agrave 419', 'Clients et comptes rattach&eacute;s', 'D-', 2),
(27, '421  &agrave 429', 'Personnel et comptes rattach&eacute;s', 'D-', 2),
(28, '431  &agrave 439', 'Organismes sociaux et comptes rattach&eacute;s', 'D-', 2),
(29, '440', 'Etats, collectivit&eacute;s publiques, organismes  internationaux et comptes rattach&eacute;s', 'D-', 2),
(30, '441', 'Acomptes IR / IR d&ucirc; ', 'D-', 2),
(31, '442', 'IRSA', 'D-', 2),
(32, '445', 'TVA', 'D-', 2),
(33, '451  &agrave 459', 'Groupes et associ&eacute;s', 'D-', 2),
(34, '461  &agrave 469', 'D&eacute;biteurs et cr&eacute;diteurs divers', 'D-', 2),
(35, '471  &agrave 479', 'Comptes d''attente', 'D-', 2),
(36, '486', 'Charges constat&eacute;es d''avance', 'D-', 2),
(37, '487', 'Produits constat&eacute;s d''avances', 'D-', 2),
(38, '491', 'Provisions pour comptes clients', 'D-', 2),
(39, '496', 'Provisions pour comptes d&eacute;biteurs & cr&eacute;diteurs divers', 'D-', 2),
(40, '501  &agrave 509', 'Tr&eacute;soreries', 'E-', 2),
(41, '601  &agrave 602', 'Achats consomm&eacute;s', 'F-', 2),
(42, '603  &agrave 609', 'Variation de stocks', 'F-', 0),
(43, '603  &agrave 609', 'Variation de stocks', 'F-', 2),
(44, '611  &agrave 619', 'Services ext&eacute;rieurs', 'F-', 2),
(45, '621  &agrave 629', 'Services ext&eacute;rieurs', 'F-', 2),
(46, '631  &agrave 639', 'Imp&ocirc;ts et taxes', 'F-', 2),
(47, '641  &agrave 649', 'Charges de personnel', 'F-', 2),
(48, '651  &agrave 659', 'Autres charges d''exploitation', 'F-', 2),
(49, '661  &agrave 669', 'Charges financi&egrave;res', 'F-', 2),
(50, '671  &agrave 679', 'El&eacute;ments extraordinaires', 'F-', 2),
(51, '661  &agrave 669', 'Int&eacute;recirc;ts des emprunts', 'F-', 2),
(52, '681  &agrave 682', 'Dotations aux amortissements', 'F-', 2),
(53, '683  &agrave 684', 'Dotations aux provisionspour stock', 'F-', 2),
(54, '686', 'Dotation provisions cr&eacute;ances diverses', 'F-', 2),
(55, '685', 'Dotations aux provisions clients', 'F-', 2),
(56, '691  &agrave 699', 'Imp&ocirc;ts sur les b&eacute;n&eacute;fices', 'F-', 2),
(57, '701  &agrave 709', 'Ventes de produits, marchandises, prestation de services et produits annexes', 'G-', 2),
(58, '713  &agrave 719', 'Variation de stocks / Production stock&eacute;es', 'G-', 2),
(59, '721  &agrave 729', 'Production immobilis&eacute;e', 'G-', 2),
(60, '731  &agrave 739', 'Production stock&eacute;e', 'G-', 2),
(61, '741  &agrave 749', 'Subvention d''exploitation', 'G-', 2),
(62, '751  &agrave 759', 'Autres produits op&eacute;rationnels', 'G-', 2),
(63, '761  &agrave 769', 'Produits financiers', 'G-', 2),
(64, '771  &agrave 786', 'El&eacutements extraordinaires', 'G-', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tab_conclusion`
--

CREATE TABLE IF NOT EXISTS `tab_conclusion` (
  `CONCLUSION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CONCLUSION_COMMENTAIRE` varchar(255) NOT NULL,
  `CONCLUSION_RISQUE` varchar(255) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  `CYCLE_ACHAT_ID` int(11) NOT NULL,
  PRIMARY KEY (`CONCLUSION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_conclusion`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_cycle`
--

CREATE TABLE IF NOT EXISTS `tab_cycle` (
  `id_cycle` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tache` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cycle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Contenu de la table `tab_cycle`
--

INSERT INTO `tab_cycle` (`id_cycle`, `nom_tache`) VALUES
(2, 'Joindre documents statutaires e/se'),
(6, 'Importer documents de base mission'),
(8, 'RSCI Achats'),
(9, 'RSCI Immobilisations'),
(10, 'RSCI Stocks'),
(11, 'RSCI Paie'),
(14, 'RSCI Ventes'),
(17, 'RDC Fonds propres'),
(18, 'Revue analytique des fonds propres'),
(25, 'RDC Immo corporelles et incorp.'),
(26, 'Revue analytique des immobilisations corporelles et incorporelles'),
(32, 'Revue des principes de comptabilisation'),
(40, 'Revues des comptes de stocks'),
(42, 'RDC Stocks: examen des ratios'),
(43, 'RDC Stocks: analyse des taux moyens de provisions'),
(58, 'Analyse de la marge brute'),
(62, 'Suivi circularisations comptes fournisseurs'),
(70, 'Suivi des circularisations clients'),
(75, 'Revue des comptes paie et personnel'),
(76, 'Revue analytique des comptes paie et personnel'),
(77, 'Rapprochement des charges depersonnel avec le budget'),
(78, 'Rapprochement des soldes Grand Livre / Balance'),
(83, 'Rapprochements de salaires bruts IRSA/CNaPS'),
(93, 'Rapprochement des soldes Grand Livre / Balance des comptes DCD'),
(94, 'Justification des soldes et apurements des comptes DCD'),
(100, 'Planification cycle fonds propres'),
(101, 'Planification cycle immobilisations'),
(103, 'Planification cycle stocks'),
(105, 'Planification cycle charges-fournisseurs'),
(106, 'Planification cycle produits-clients'),
(107, 'Planification cycle paie-personnel'),
(112, 'Circularisation avocat'),
(114, 'Circularisation banques'),
(115, 'Suivi circularisations comptes fournisseurs'),
(116, 'Circularisation clients'),
(121, 'Gestion de feuille de temps');

-- --------------------------------------------------------

--
-- Structure de la table `tab_cycle_achat`
--

CREATE TABLE IF NOT EXISTS `tab_cycle_achat` (
  `CYCLE_ACHAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CYCLE_ACHAT_STATUS` varchar(255) NOT NULL,
  `CYCLE_ACHAT_LIBELLE` varchar(255) NOT NULL,
  PRIMARY KEY (`CYCLE_ACHAT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tab_cycle_achat`
--

INSERT INTO `tab_cycle_achat` (`CYCLE_ACHAT_ID`, `CYCLE_ACHAT_STATUS`, `CYCLE_ACHAT_LIBELLE`) VALUES
(1, 'A', 'ACHAT'),
(2, 'B', 'ACHAT');

-- --------------------------------------------------------

--
-- Structure de la table `tab_distribution_tache`
--

CREATE TABLE IF NOT EXISTS `tab_distribution_tache` (
  `DISTRIBUTION_TACHE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tache` varchar(255) NOT NULL,
  `UTIL_ID` int(11) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  PRIMARY KEY (`DISTRIBUTION_TACHE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `tab_distribution_tache`
--

INSERT INTO `tab_distribution_tache` (`DISTRIBUTION_TACHE_ID`, `nom_tache`, `UTIL_ID`, `MISSION_ID`) VALUES
(1, 'Joindre documents statutaires e/se', 41, 5),
(2, 'Importer documents de base mission', 41, 5),
(3, 'RSCI Achats', 41, 5),
(4, 'RSCI Paie', 20, 5),
(5, 'RSCI Ventes', 20, 5),
(6, 'RDC Fonds propres', 20, 5),
(7, 'Revues des comptes de stocks', 21, 5),
(8, 'RDC Stocks: examen des ratios', 21, 5),
(9, 'RDC Stocks: analyse des taux moyens de provisions', 21, 5),
(10, 'Analyse de la marge brute', 21, 5),
(11, 'Joindre documents statutaires e/se', 18, 6),
(12, 'Importer documents de base mission', 18, 6),
(13, 'RSCI Achats', 18, 6),
(14, 'RSCI Immobilisations', 18, 6),
(15, 'RSCI Stocks', 18, 6),
(16, 'RSCI Paie', 1, 6),
(17, 'RSCI Ventes', 1, 6),
(18, 'RDC Fonds propres', 1, 6),
(19, 'Revue analytique des fonds propres', 1, 6),
(20, 'RDC Immo corporelles et incorp.', 1, 6),
(21, 'Revue analytique des immobilisations corporelles et incorporelles', 1, 6),
(22, 'Revue des principes de comptabilisation', 1, 6),
(23, 'Revues des comptes de stocks', 1, 6),
(24, 'RDC Stocks: examen des ratios', 1, 6),
(25, 'RDC Stocks: analyse des taux moyens de provisions', 1, 6),
(26, 'Analyse de la marge brute', 1, 6),
(27, 'Suivi circularisations comptes fournisseurs', 1, 6),
(28, 'Suivi des circularisations clients', 1, 6),
(29, 'Revue des comptes paie et personnel', 1, 6),
(30, 'Revue analytique des comptes paie et personnel', 1, 6),
(31, 'Rapprochement des charges depersonnel avec le budget', 1, 6),
(32, 'Rapprochement des soldes Grand Livre / Balance', 20, 6),
(33, 'Rapprochements de salaires bruts IRSA/CNaPS', 20, 6),
(34, 'Rapprochement des soldes Grand Livre / Balance des comptes DCD', 20, 6),
(35, 'Justification des soldes et apurements des comptes DCD', 20, 6),
(36, 'Planification cycle fonds propres', 39, 6),
(37, 'Planification cycle immobilisations', 39, 6),
(38, 'Planification cycle stocks', 39, 6),
(39, 'Planification cycle charges-fournisseurs', 39, 6),
(40, 'Planification cycle produits-clients', 39, 6),
(41, 'Planification cycle paie-personnel', 40, 6),
(42, 'Circularisation avocat', 40, 6),
(43, 'Circularisation banques', 40, 6),
(44, 'Circularisation clients', 40, 6),
(45, 'Gestion de feuille de temps', 40, 6);

-- --------------------------------------------------------

--
-- Structure de la table `tab_entreprise`
--

CREATE TABLE IF NOT EXISTS `tab_entreprise` (
  `ENTREPRISE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ENTREPRISE_DENOMINATION_SOCIAL` varchar(255) NOT NULL,
  `ENTREPRISE_CONTACT` varchar(255) NOT NULL,
  `ENTREPRISE_CAPITAL_SOCIAL` varchar(255) NOT NULL,
  `ENTREPRISE_NIF` varchar(255) NOT NULL,
  `ENTREPRISE_STAT` varchar(255) NOT NULL,
  `ENTREPRISE_REG_COM` int(11) NOT NULL,
  `ENTREPRISE_RAISON_SOCIAL` varchar(255) NOT NULL,
  `ENTREPRISE_ADRESSE` varchar(255) NOT NULL,
  `ENTREPRISE_MAIL` varchar(255) NOT NULL,
  `ENTREPRISE_CODE` varchar(255) NOT NULL,
  `ENTREPRISE_SECTEUR_ACTIVITE` varchar(255) NOT NULL,
  `ENTREPRISE_DATE_CREATION` varchar(255) NOT NULL,
  `ENTREPRISE_DURE_SOCIETE` varchar(255) NOT NULL,
  `ENTREPRISE_ACTIVITE` varchar(255) NOT NULL,
  `ENTREPRISE_NOMBRE_SALARIE` varchar(255) NOT NULL,
  `ENTREPRISE_EXO_COMPTABLE` varchar(255) NOT NULL,
  `ENTREPRISE_VALORISATION_STOCK` varchar(255) NOT NULL,
  `ENTREPRISE_SITE_INTERNET` varchar(255) NOT NULL,
  `ENTREPRISE_NOMBRE_ACTION` int(11) NOT NULL,
  `ENTREPRISE_VALEUR_NOMINAL` varchar(255) NOT NULL,
  `ENTREPRISE_NBR_ACTIONNAIR` int(11) DEFAULT NULL,
  PRIMARY KEY (`ENTREPRISE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `tab_entreprise`
--

INSERT INTO `tab_entreprise` (`ENTREPRISE_ID`, `ENTREPRISE_DENOMINATION_SOCIAL`, `ENTREPRISE_CONTACT`, `ENTREPRISE_CAPITAL_SOCIAL`, `ENTREPRISE_NIF`, `ENTREPRISE_STAT`, `ENTREPRISE_REG_COM`, `ENTREPRISE_RAISON_SOCIAL`, `ENTREPRISE_ADRESSE`, `ENTREPRISE_MAIL`, `ENTREPRISE_CODE`, `ENTREPRISE_SECTEUR_ACTIVITE`, `ENTREPRISE_DATE_CREATION`, `ENTREPRISE_DURE_SOCIETE`, `ENTREPRISE_ACTIVITE`, `ENTREPRISE_NOMBRE_SALARIE`, `ENTREPRISE_EXO_COMPTABLE`, `ENTREPRISE_VALORISATION_STOCK`, `ENTREPRISE_SITE_INTERNET`, `ENTREPRISE_NOMBRE_ACTION`, `ENTREPRISE_VALEUR_NOMINAL`, `ENTREPRISE_NBR_ACTIONNAIR`) VALUES
(2, 'CDG', '22xxxxxx', '10 000 000', '145840', '030171 1990 0001', 0, 'SARL', 'Antananarivo', 'cdg@cgd.mg', 'CDG', 'Tertiaire', '24/04/2009', '99 ans', 'Restauration', '50', '31/12', 'CMUP', '', 500, '20 000', 0),
(3, 'INFRA', '22xxxxxx', '50 000 000', '123456', '030171 1990 00025', 0, 'SA', 'Antananarivo', 'infra@infra.mg', 'INF', 'Tertiaire', '01/01/1999', '99', '30', '30', '30/06', 'CMUP', '', 20, '30', 0),
(4, 'PFOI', '020xxxxxx', '10 000 000', '555555', '5555555', 5555555, 'SARL', 'Antananarivo', 'pfoi@pfoi.com', 'PFOI', 'Tiertiaire', '2012/02/02', '99', 'PÃªche', '30', '31/12', 'UMP', '', 35, '500', 0),
(42, 'WIFI', '22xxxxxx', '20 000 000', '456852', '46548652', 444444, 'SARL', 'Antsakaviro bleuline', 'wifi@gmail.com', 'WIF', 'Connexion ', '01/01/2004', '10', 'internet', '10', '10/01/2014', '20', '', 2, '2', NULL),
(43, 'ZEND', '22xxxxxxxx', '20 000 000', '258789', '888888564', 54545, 'SA', 'Ambatovy Toamasina', 'Zend@trav.pro', 'ZND', 'Fibre', '01/01/2014', '10', 'Fibre', '60', '01/01/2014', '20', '', 3, '50', NULL),
(44, 'GARNIER', '22xxxxxx', '10 000 000', '852456', '55588456', 456852211, '789789', 'Antanimamy ', 'email@pro.pro', 'GRN', 'Savonnerie', '01/01/2014', '22', '20', '20', '01/01/2014', '20', '', 2, '20000', NULL),
(45, '1', '1', '1', '1', '1', 1, '1', '1', '1', '1', 'az', '07/01/2014', '99', 'az', '10', '01/01/2014', '2', '2', 2, '20000', NULL);

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
-- Structure de la table `tab_fonction_achat_a`
--

CREATE TABLE IF NOT EXISTS `tab_fonction_achat_a` (
  `FONCT_ACHAT_A_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FONCT_ACHAT_A_LIGNE` int(3) NOT NULL,
  `FONCT_ACHAT_A_RESULT` int(11) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  `POSTE_CYCLE_ID` int(11) NOT NULL,
  PRIMARY KEY (`FONCT_ACHAT_A_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Contenu de la table `tab_fonction_achat_a`
--

INSERT INTO `tab_fonction_achat_a` (`FONCT_ACHAT_A_ID`, `FONCT_ACHAT_A_LIGNE`, `FONCT_ACHAT_A_RESULT`, `MISSION_ID`, `POSTE_CYCLE_ID`) VALUES
(88, 1, 1, 3, 3),
(89, 3, 1, 3, 4);

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
-- Structure de la table `tab_importer`
--

CREATE TABLE IF NOT EXISTS `tab_importer` (
  `IMPORT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IMPORT` varchar(255) NOT NULL,
  PRIMARY KEY (`IMPORT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tab_importer`
--

INSERT INTO `tab_importer` (`IMPORT_ID`, `IMPORT`) VALUES
(1, 'MAMA'),
(2, 'DADA');

-- --------------------------------------------------------

--
-- Structure de la table `tab_mail`
--

CREATE TABLE IF NOT EXISTS `tab_mail` (
  `MAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MAIL` varchar(255) NOT NULL,
  `MAIL_VERIFE` int(2) NOT NULL,
  PRIMARY KEY (`MAIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `tab_mail`
--

INSERT INTO `tab_mail` (`MAIL_ID`, `MAIL`, `MAIL_VERIFE`) VALUES
(14, 'fdsf@sdfd', 1),
(15, 'sdfsds@dfgff', 1),
(16, 'wxffdfg@dfhdf', 1),
(17, 'ADMI@JKL', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tab_mission`
--

CREATE TABLE IF NOT EXISTS `tab_mission` (
  `MISSION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MISSION_DATE_DEBUT` varchar(255) NOT NULL,
  `MISSION_DATE_CLOTURE` varchar(255) NOT NULL,
  `MISSION_ANNEE` int(11) NOT NULL,
  `MISSION_TYPE` varchar(255) NOT NULL,
  `ENTREPRISE_ID` int(11) NOT NULL,
  PRIMARY KEY (`MISSION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tab_mission`
--

INSERT INTO `tab_mission` (`MISSION_ID`, `MISSION_DATE_DEBUT`, `MISSION_DATE_CLOTURE`, `MISSION_ANNEE`, `MISSION_TYPE`, `ENTREPRISE_ID`) VALUES
(1, '01/01/2012', '30/12/2012', 2012, 'IntÃ©rimaires', 2),
(2, '01/01/2011', '31/12/2011', 2011, 'Final', 3),
(3, '01/01/2012', '31/12/2012', 2012, 'Final', 4),
(4, '1/01/2014', '25/01/2014', 1999, 'Final', 2),
(5, '', '', 1999, 'Final', 3),
(6, '', '', 1999, 'Final', 2);

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
-- Structure de la table `tab_niveau_risque_a`
--

CREATE TABLE IF NOT EXISTS `tab_niveau_risque_a` (
  `NIVEAU_RISQUE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NIVEAU_RISQUE_NOM` varchar(255) NOT NULL,
  `POSTE_CYCLE_ID` int(11) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  PRIMARY KEY (`NIVEAU_RISQUE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tab_niveau_risque_a`
--

INSERT INTO `tab_niveau_risque_a` (`NIVEAU_RISQUE_ID`, `NIVEAU_RISQUE_NOM`, `POSTE_CYCLE_ID`, `MISSION_ID`) VALUES
(3, 'moyen', 3, 3),
(4, 'eleve', 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tab_objectif`
--

CREATE TABLE IF NOT EXISTS `tab_objectif` (
  `OBJECTIF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `OBJECTIF_COMMENTAIRE` varchar(255) NOT NULL,
  `OBJECTIF_QCM` varchar(3) NOT NULL,
  `CYCLE_ACHAT_ID` int(11) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  `QUESTION_ID` int(11) NOT NULL,
  PRIMARY KEY (`OBJECTIF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_objectif`
--


-- --------------------------------------------------------

--
-- Structure de la table `tab_operant`
--

CREATE TABLE IF NOT EXISTS `tab_operant` (
  `ID_OPERANT` int(11) NOT NULL AUTO_INCREMENT,
  `UTIL_NOM` varchar(255) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID_OPERANT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_operant`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `tab_personnel`
--

INSERT INTO `tab_personnel` (`PERSONNEL_ID`, `PERSONNEL_FONCTION`, `ENTREPRISE_ID`) VALUES
(1, 'PDG', 0),
(2, 'DG', 0),
(5, 'DSI', 0),
(11, 'ING', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tab_poste_cle`
--

CREATE TABLE IF NOT EXISTS `tab_poste_cle` (
  `POSTE_CLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `POSTE_CLE_NOM` varchar(255) NOT NULL,
  `POSTE_CLE_TITULAIRE` varchar(255) NOT NULL,
  `ENTREPRISE_ID` int(11) NOT NULL,
  PRIMARY KEY (`POSTE_CLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `tab_poste_cle`
--

INSERT INTO `tab_poste_cle` (`POSTE_CLE_ID`, `POSTE_CLE_NOM`, `POSTE_CLE_TITULAIRE`, `ENTREPRISE_ID`) VALUES
(1, 'DG', 'Marque', 4),
(2, 'DG', 'Bernard', 4),
(3, 'PDG', 'Dadabe', 42),
(4, 'DG', 'Gustave', 42),
(8, 'PDG', 'Renaud francko', 1),
(9, 'DG', 'Claude FranÃ§ois', 44),
(10, 'RAF', 'Neny soa', 2),
(11, 'DSI', 'Lucie vaosoa', 44),
(12, 'dg', 'dada', 45);

-- --------------------------------------------------------

--
-- Structure de la table `tab_poste_cycle`
--

CREATE TABLE IF NOT EXISTS `tab_poste_cycle` (
  `POSTE_CYCLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `POSTE_CYCLE_NOM` varchar(255) NOT NULL,
  `POSTE_CLE_ID` int(11) NOT NULL,
  PRIMARY KEY (`POSTE_CYCLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tab_poste_cycle`
--

INSERT INTO `tab_poste_cycle` (`POSTE_CYCLE_ID`, `POSTE_CYCLE_NOM`, `POSTE_CLE_ID`) VALUES
(6, 'achat', 10);

-- --------------------------------------------------------

--
-- Structure de la table `tab_question`
--

CREATE TABLE IF NOT EXISTS `tab_question` (
  `QUESTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `QUESTION_LIBELLE` varchar(255) NOT NULL,
  `QUESTION_COEF` int(2) NOT NULL,
  `QUESTION_CYCLE_ACHAT` int(11) NOT NULL,
  PRIMARY KEY (`QUESTION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Contenu de la table `tab_question`
--

INSERT INTO `tab_question` (`QUESTION_ID`, `QUESTION_LIBELLE`, `QUESTION_COEF`, `QUESTION_CYCLE_ACHAT`) VALUES
(1, '1.	Toutes les marchandises re&ccedil;ues sont-elles enregistr&eacute;es : <br/>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;a)	sur des documents standard ?', 1, 2),
(2, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)pr&eacute;numerot&eacute;s ?', 1, 2),
(3, '2.	Tous les services re&ccedil;us sont-ils enregistr&eacute;s : <br/>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;	a)	sur des documents standard ?', 1, 2),
(4, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)pr&eacute;numerot&eacute;s ?', 1, 2),
(5, '3.Toutes les marchandises retourn&eacute;es et les reclamations effectu&eacute;es sont enregistr&eacute;es sur des documents :<br/> &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;a)	standard ?', 1, 2),
(6, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)	pr&eacute;numerot&eacute;s ?', 1, 2),
(7, '4.Le service comptable verifie-t-il la sequence numerique des :<br/>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; a)	bons de r&eacute;c&eacute;ption ?', 2, 2),
(8, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)	bons de retour ou de reclamation pour s''assurer qu''il les re&ccedil;oit tous ?', 2, 2),
(9, '5.Le service comptable tient-il un registre des receptions et des retours ou reclamations pour lesquels les factures et avoirs n''ont pas ete recus ?', 3, 2),
(10, '6.Ce registre :<br/>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; a)	fait-il l''objet d''une revue particuliere pour identifier la cause des retards ?', 2, 2),
(11, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)	sert-il a &eacute;valuer les provisions pour factures et avoirs a r&eacute;cevoir ?', 3, 2),
(12, '7.Le journal des achats est-il rapproche de la liste des r&eacute;c&eacute;ptions retours ou r&eacute;clamations pour s''assurer que toutes les factures et tous les avoirs sont comptabilis&eacute;s ?', 3, 2),
(13, '8.Les produits afferents aux achats (ristournes) sont-ils identifi&eacute;s au fur et a mesure des r&eacute;c&eacute;ptions pour permettre de verifier que : <br/>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;a)	les avoirs sont re&ccedil;us ?', 2, 2),
(14, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)	les avoirs sont comptabilit&eacute;s ?', 2, 2),
(15, '9.Les charges afferentes aux achats (frais de transport) sont-elles identifi&eacute;es au fur et a m&eacute;sure des r&eacute;c&eacute;ptions pour permettre de v&eacute;rifier que : <br/>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; a)	les fac', 2, 2),
(16, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)	les factures sont comptabilis&eacute;es ?', 3, 2),
(17, '10.	Lorsque les factures et avoirs sont envoy&eacute;s dans les services pour controle, le service comptable garde-t-il la trace de ces envois ? <br/>	&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;a)	pour suivre les retours ?', 1, 2),
(18, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)	identifier les factures non enregistr&eacute;es ?', 2, 2),
(19, '11.Les comptes fournisseurs sont-ils regulierement rapproch&eacute;s : <br/>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;a)	du compte g&eacute;n&eacute;ral ?', 2, 2),
(20, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)	des r&eacute;l&eacute;v&eacute;s fournisseurs ?', 2, 2),
(21, '12.Lorsque le systeme prevoit le rejet d''op&eacute;rations non conformes, ces rejets sont-ils :<br/>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;a)	list&eacute;s ?', 3, 2),
(22, '&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;b)	suivis pour v&eacute;rifier qu''ils sont tous recycl&eacute;s ?', 3, 2),
(23, '1.Les factures et avoirs re&ccedil;us ne peuvent-ils &acirc; tre enregistr&eacute;s que s''ils sont rapproch&eacute;s d''un bon de r&eacute;ception, retour ou r&eacute;clamation ? (ou autre justificatif pour les services).', 2, 3),
(24, '2.Les bons de r&eacute;ception, retour ou r&eacute;clamation sont-ils accroch&eacute;s aux factures et avoirs pour &eacute;viter leur utilisation multiple ?', 3, 3),
(25, '3.Les factures et avoirs enregistr&eacute;s sont-ils annul&eacute;s pour &eacute;viter leur enregistrement multiple ?', 3, 3),
(26, '4.Les doubles de factures et avoirs sont-ils identifi&eacute;s d&egrave;s r&eacute;ception pour &eacute;viter leur comptabilisation ?', 3, 3),
(27, '5.La comptabilisation de duplicata est-elle interdite ou soumise &agrave; autorisation particuli&egrave;re ?', 3, 3),
(28, '6.Les factures et avoirs sont-ils rapproch&eacute;s des bons de livraison, de retour ou r&eacute;clamation et des bons de commande pour &eacute;viter les erreurs de facturation ?', 2, 3),
(29, '7.La liste des fournisseurs autoris&eacute;s est-elle r&eacute;guli&egrave;rement mise &agrave; jour et contr&ocirc;l&eacute;e ?', 1, 3),
(30, '8.Le fichier fournisseur est-il r&eacute;guli&egrave;rement rapproch&eacute; de la liste &eacute;tablie en 7 ?', 1, 3),
(31, '9.L''ouverture d''un nouveau compte fournisseur est-elle soumise &agrave; autorisation ?', 2, 3),
(32, '10.Existe-t-il une liste des personnes habilit&eacute;es &agrave; engager la soci&eacute;t&eacute; (&eacute;ventuellement avec des plafonds) ?', 2, 3),
(33, '11.Les op&eacute;rations diverses relatives aux op&eacute;rations d''achat sont-elles soumises &agrave;  autorisation avant enregistrement ?', 1, 3),
(34, '1.Les factures et avoirs re&ccedil;us sont-ils v&eacute;rifi&eacute;s quant aux : <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	quantit&eacute;s ?', 2, 4),
(35, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)	prix unitaires ?', 2, 4),
(36, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c)	calculs ?', 2, 4),
(37, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d)	TVA ?', 2, 4),
(38, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e)	autres d&eacute;ductions ou charges ?', 2, 4),
(39, '2.Si ces contr&ocirc;les sont faits par informatique, les rejets font-ils l objet d un suivi ?', 3, 4),
(40, '3.L''&eacute;valuation des provisions pour factures et avoirs &agrave; recevoir est-elle : <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	v&eacute;rifi&eacute;e par une personne ind&eacute;pendante de celle qui l''&eacute;tablit ?', 3, 4),
(41, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)	rapproch&eacute;s des factures et avoirs r&eacute;els ult&eacute;rieurement ?', 3, 4),
(42, '4.Lorsque des achats sont effectu&eacute;s en devises &eacute;trang&egrave;res :<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a)	les personnes charg&eacute;es de la comptabilisation sont-elles r&eacute;guli&egrave;rement inform&eacute', 2, 4),
(43, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)	les montants concern&eacute;s sont-ils facilement identifiables pour permettre l''actualisation des taux en fin de p&eacute;riode ?', 2, 4),
(44, '5.Les bons de commande non honor&eacute;s sont-ils : <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	chiffr&eacute;s ? ', 2, 4),
(45, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)	totalis&eacute;s ?', 2, 4),
(46, '1.En fin de p&eacute;riode, la comptabilit&eacute; utilise-t-elle : <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	la liste des bons de livraison non factur&eacute;s ?', 3, 5),
(47, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)	la liste des bons de retour et de r&eacute;clamation dans avoir ?', 3, 5),
(48, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c)	la liste des factures connexes (frais de transport) ?', 3, 5),
(49, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d)	la liste des produits aff&eacute;rents aux achats (voir B8) ?', 3, 5),
(50, '2.La comptabilit&eacute; est-elle inform&eacute;e des derniers num&eacute;ros de s&eacute;quence des documents ci-dessus pour pouvoir v&eacute;rifier la coh&eacute;rence des dates d arr&ecirc; t&eacute;s ?', 1, 5),
(51, '3.L apurement des provisions ainsi constat&eacute;es d''une p&eacute;riode sur l''autre est-elle v&eacute;rifi&eacute;e par une personne ind&eacute;pendante ?', 2, 5),
(52, '4.Pour les charges r&eacute;currentes (loyers, assurances...) s assure-t-on que le montant pass&eacute; en charge correspond &agrave; la p&eacute;riode ?', 2, 5),
(53, '5.Pour les charges sp&eacute;cifiques (publicit&eacute;, honoraires...) la comptabilit&eacute; a-t-elle les moyens : <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	d obtenir les informations n&eacute;cessaires &agrave; l &eacute;valu', 2, 5),
(54, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)	au contr&ocirc; le du bien-fond&eacute; des montants concern&eacute;s ?', 2, 5);

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
-- Structure de la table `tab_structure_pcg_ra`
--

CREATE TABLE IF NOT EXISTS `tab_structure_pcg_ra` (
  `STRUCTURE_PCG_ID_RA` int(11) NOT NULL AUTO_INCREMENT,
  `STRUCTURE_DOMAINE_RA` varchar(255) NOT NULL,
  `STRUCTURE_CARACTERE_SIGNIFICATION_FONCTION_RA` varchar(25) NOT NULL,
  `STRUCTURE_EXHAUSTIVITE_RA` varchar(25) NOT NULL,
  `STRUCTURE_REALITE_RA` varchar(25) NOT NULL,
  `STRUCTURE_PROPRIETE_RA` varchar(25) NOT NULL,
  `STRUCTURE_EVALUATION_CORRECTE_RA` varchar(25) NOT NULL,
  `STRUCTURE_ENREGISTREMENT_BONNE_PERIODE_RA` varchar(25) NOT NULL,
  `STRUCTURE_IMPUTATION_CORRECTE_RA` varchar(25) NOT NULL,
  `STRUCTURE_TOTALISATION_RA` varchar(25) NOT NULL,
  `STRUCTURE_BONNE_INFORMATION_RA` varchar(25) NOT NULL,
  `STRUCTURE_RISK_GLOBAL_FONCTION_RA` varchar(25) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  PRIMARY KEY (`STRUCTURE_PCG_ID_RA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `tab_structure_pcg_ra`
--

INSERT INTO `tab_structure_pcg_ra` (`STRUCTURE_PCG_ID_RA`, `STRUCTURE_DOMAINE_RA`, `STRUCTURE_CARACTERE_SIGNIFICATION_FONCTION_RA`, `STRUCTURE_EXHAUSTIVITE_RA`, `STRUCTURE_REALITE_RA`, `STRUCTURE_PROPRIETE_RA`, `STRUCTURE_EVALUATION_CORRECTE_RA`, `STRUCTURE_ENREGISTREMENT_BONNE_PERIODE_RA`, `STRUCTURE_IMPUTATION_CORRECTE_RA`, `STRUCTURE_TOTALISATION_RA`, `STRUCTURE_BONNE_INFORMATION_RA`, `STRUCTURE_RISK_GLOBAL_FONCTION_RA`, `MISSION_ID`) VALUES
(9, '', '2', '', '', '', '', '', '', '', '', '', 2),
(10, '', '2', '1', '0', '2', '1', '2', '2', '', '', '', 1),
(11, '', '1', '1', '1', '1', '1', '1', '1', '', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tab_superviseur`
--

CREATE TABLE IF NOT EXISTS `tab_superviseur` (
  `SUPERVISEUR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUPERVISEUR_NOM` varchar(255) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  PRIMARY KEY (`SUPERVISEUR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Contenu de la table `tab_superviseur`
--

INSERT INTO `tab_superviseur` (`SUPERVISEUR_ID`, `SUPERVISEUR_NOM`, `MISSION_ID`) VALUES
(1, 'Rodin', 6),
(2, 'Rodin', 7),
(3, 'Rodin', 8),
(4, 'Rodin', 9),
(5, 'Rodin', 10),
(6, 'Rodin', 11),
(7, 'Eddy', 12),
(8, 'Eddy', 13),
(9, 'Eddy', 14),
(10, 'Eddy', 15),
(11, 'Rodin', 16),
(12, 'Rodin', 17),
(13, 'Rodin', 18),
(14, 'Rodin', 19),
(15, 'Rodin', 20),
(16, 'Rodin', 21),
(17, 'Rodin', 22),
(18, 'Rodin', 23),
(19, 'Rodin', 24),
(20, 'Rodin', 25),
(21, 'Rodin', 26),
(22, 'Rodin', 27),
(23, 'Rodin', 28),
(24, 'Rodin', 29),
(25, 'Rodin', 30),
(26, 'Rodin', 31),
(27, 'Rodin', 32),
(28, 'Rodin', 33),
(29, 'Rodin', 34),
(30, 'Rodin', 35),
(31, 'Rodin', 36),
(32, 'Rodin', 1),
(33, 'Rodin', 2),
(34, '', 3),
(35, '', 4),
(36, '', 5),
(37, '', 6),
(38, '', 7),
(39, '', 8),
(40, '', 9),
(41, '', 10),
(42, '', 11),
(43, '', 12),
(44, '', 13),
(45, '', 14),
(46, '', 15),
(47, '', 16),
(48, '', 17),
(49, '', 18),
(50, '', 19),
(51, '', 20),
(52, '', 21),
(53, '', 22),
(54, '', 23),
(55, '', 24),
(56, '', 25),
(57, '', 26),
(58, '', 27),
(59, '', 28),
(60, '', 1),
(61, '', 2),
(62, '', 3),
(63, '', 4),
(64, '', 5),
(65, '', 6),
(66, '', 7),
(67, '', 1),
(68, '', 2),
(69, '', 3),
(70, '', 4),
(71, '', 5),
(72, '', 6),
(73, '', 1),
(74, '', 2),
(75, '', 3),
(76, '', 4),
(77, '', 1),
(78, 'Rodin', 1),
(79, 'Rodin', 2),
(80, '', 3),
(81, '', 4),
(82, '', 5),
(83, 'Rodin', 1),
(84, '', 2),
(85, '', 3),
(86, '', 4),
(87, '', 5),
(88, '', 6),
(89, '', 7),
(90, '', 8),
(91, '', 9),
(92, '', 10),
(93, '', 11),
(94, '', 12),
(95, '', 13),
(96, '', 14),
(97, '', 15),
(98, '', 16),
(99, '', 17),
(100, '', 18),
(101, '', 19),
(102, '', 20),
(103, '', 22),
(104, '', 22),
(105, 'Rodin', 23),
(106, '', 24),
(107, '', 25),
(108, 'Lolita Rakotomamonjy', 1),
(109, '', 2),
(110, '', 3),
(111, '', 4),
(112, '', 5),
(113, 'Lolita Rakotomamonjy', 1),
(114, 'ravao randrianera', 2),
(115, 'Rodin', 3);

-- --------------------------------------------------------

--
-- Structure de la table `tab_synthese`
--

CREATE TABLE IF NOT EXISTS `tab_synthese` (
  `SYNTHESE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SYNTHESE_COMMENTAIRE` varchar(255) NOT NULL,
  `SYNTHESE_RISQUE` varchar(255) NOT NULL,
  `SCORE` int(11) NOT NULL,
  `CYCLE_ACHAT_ID` int(11) NOT NULL,
  `MISSION_ID` int(11) NOT NULL,
  PRIMARY KEY (`SYNTHESE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tab_synthese`
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
  `UTIL_ACTIF` varchar(255) NOT NULL,
  PRIMARY KEY (`UTIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `tab_utilisateur`
--

INSERT INTO `tab_utilisateur` (`UTIL_ID`, `UTIL_NOM`, `UTIL_LOGIN`, `UTIL_MDP`, `UTIL_STATUT`, `UTIL_ACTIF`) VALUES
(1, 'Niry Aina', 'eddy@tms-consulting.pro', '123456', 2, 'Actif'),
(18, 'Esoahare Renaud', 'esoahary@gmail.com', 'renaud', 1, 'Non actif'),
(19, 'maherisoa jean de Dieu', 'mahery@yahoo.fr', 'mahery', 1, 'actif'),
(20, 'mahorisoa mark', 'mahory@yahoo.fr', 'mahory', 0, 'actif'),
(21, 'tonton', 'tontonsola@gmail.com', 'tonton', 0, 'Non actif'),
(39, 'lala', ' lala@gmail.com', 'lala', 0, 'Actif'),
(40, 'Mamy', 'mamy@tms-consulting.pro', '1234', 0, 'Actif'),
(41, 'Randriananja', 'randriananja@gmail.com', 'vero', 1, 'Actif'),
(42, 'Diddier Maradona', 'maradona@yahoo.fr ', 'maradona', 0, 'Non actif'),
(43, 'esoahare', 'michel@gmail.com', '12345', 0, 'Actif'),
(44, 'Ravaonary bienaimÃ©', 'bien@yahoo.fr', '456789', 0, 'Non actif'),
(45, 'dada', 'dada@dada.pro', 'dada', 0, 'Actif'),
(46, 'sysyt d''information', 'aaa@aaa', 'aaa', 0, 'Actif');

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
