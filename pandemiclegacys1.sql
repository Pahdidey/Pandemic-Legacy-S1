-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2021 at 09:02 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeudistance`
--

-- --------------------------------------------------------

--
-- Table structure for table `pandemiclegacys1_cartes`
--

CREATE TABLE `pandemiclegacys1_cartes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` enum('Ville','Evenement') NOT NULL DEFAULT 'Ville',
  `etat` enum('Disponible','Non disponible') NOT NULL DEFAULT 'Non disponible',
  `id_joueur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pandemiclegacys1_cartes`
--

INSERT INTO `pandemiclegacys1_cartes` (`id`, `nom`, `type`, `etat`, `id_joueur`) VALUES
(1, '1', 'Ville', 'Disponible', NULL),
(2, '2', 'Ville', 'Disponible', NULL),
(3, '3', 'Ville', 'Disponible', NULL),
(4, '4', 'Ville', 'Disponible', NULL),
(5, '5', 'Ville', 'Disponible', NULL),
(6, '6', 'Ville', 'Disponible', NULL),
(7, '7', 'Ville', 'Non disponible', 3),
(8, '8', 'Ville', 'Disponible', NULL),
(9, '9', 'Ville', 'Disponible', NULL),
(10, '10', 'Ville', 'Non disponible', 3),
(11, '11', 'Ville', 'Disponible', NULL),
(12, '12', 'Ville', 'Disponible', NULL),
(13, '13', 'Ville', 'Disponible', NULL),
(14, '14', 'Ville', 'Disponible', NULL),
(15, '15', 'Ville', 'Disponible', NULL),
(16, '16', 'Ville', 'Disponible', NULL),
(17, '17', 'Ville', 'Disponible', NULL),
(18, '18', 'Ville', 'Disponible', NULL),
(19, '19', 'Ville', 'Disponible', NULL),
(20, '20', 'Ville', 'Disponible', NULL),
(21, '21', 'Ville', 'Non disponible', 2),
(22, '22', 'Ville', 'Non disponible', 2),
(23, '23', 'Ville', 'Disponible', NULL),
(24, '24', 'Ville', 'Disponible', NULL),
(25, '25', 'Ville', 'Non disponible', 1),
(26, '26', 'Ville', 'Disponible', NULL),
(27, '27', 'Ville', 'Disponible', NULL),
(28, '28', 'Ville', 'Disponible', NULL),
(29, '29', 'Ville', 'Disponible', NULL),
(30, '30', 'Ville', 'Disponible', NULL),
(31, '31', 'Ville', 'Disponible', NULL),
(32, '32', 'Ville', 'Disponible', NULL),
(33, '33', 'Ville', 'Non disponible', 3),
(34, '34', 'Ville', 'Disponible', NULL),
(35, '35', 'Ville', 'Disponible', NULL),
(36, '36', 'Ville', 'Disponible', NULL),
(37, '37', 'Ville', 'Disponible', NULL),
(38, '38', 'Ville', 'Disponible', NULL),
(39, '39', 'Ville', 'Non disponible', 3),
(40, '40', 'Ville', 'Disponible', NULL),
(41, '41', 'Ville', 'Disponible', NULL),
(42, '42', 'Ville', 'Disponible', NULL),
(43, '43', 'Ville', 'Disponible', NULL),
(44, '44', 'Ville', 'Non disponible', 1),
(45, '45', 'Ville', 'Non disponible', 2),
(46, '46', 'Ville', 'Non disponible', 2),
(47, '47', 'Ville', 'Disponible', NULL),
(48, '48', 'Ville', 'Disponible', NULL),
(49, 'aide-flexible', 'Evenement', 'Non disponible', NULL),
(50, 'aide-gouvernementale', 'Evenement', 'Non disponible', NULL),
(51, 'base-eloignee', 'Evenement', 'Non disponible', NULL),
(52, 'nouvelles-fonctions', 'Evenement', 'Non disponible', NULL),
(53, 'par-une-nuit-tranquille', 'Evenement', 'Non disponible', NULL),
(54, 'pont-aerien', 'Evenement', 'Non disponible', NULL),
(55, 'population-resiliente', 'Evenement', 'Non disponible', NULL),
(56, 'prevision', 'Evenement', 'Non disponible', NULL),
(57, 'temps-emprunte', 'Evenement', 'Non disponible', NULL),
(58, 'traitement-a-distance', 'Evenement', 'Non disponible', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pandemiclegacys1_joueurs`
--

CREATE TABLE `pandemiclegacys1_joueurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `maladie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pandemiclegacys1_joueurs`
--

INSERT INTO `pandemiclegacys1_joueurs` (`id`, `nom`, `maladie`) VALUES
(1, 'Pahdidey', 'C0dA'),
(2, 'Marshkalk', 'C0dA'),
(3, 'Aelendris', 'C0dA'),
(4, 'Papatte', 'C0dA');

-- --------------------------------------------------------

--
-- Table structure for table `pandemiclegacys1_roles`
--

CREATE TABLE `pandemiclegacys1_roles` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `id_joueur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pandemiclegacys1_roles`
--

INSERT INTO `pandemiclegacys1_roles` (`id`, `nom`, `fichier`, `id_joueur`) VALUES
(1, 'Chercheuse', 'chercheuse', NULL),
(2, 'Expert aux opérations', 'expert-operations', 1),
(3, 'Généraliste', 'generaliste', NULL),
(4, 'Médecin', 'medecin', 3),
(5, 'Répartiteur', 'repartiteur', NULL),
(6, 'Scientifique', 'scientifique', 2),
(7, 'Spécialiste en mise en quarantaine', 'specialiste-quarantaine', NULL),
(8, 'Colonel', 'colonel', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pandemiclegacys1_cartes`
--
ALTER TABLE `pandemiclegacys1_cartes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pandemiclegacys1_joueurs`
--
ALTER TABLE `pandemiclegacys1_joueurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_joueur` (`nom`);

--
-- Indexes for table `pandemiclegacys1_roles`
--
ALTER TABLE `pandemiclegacys1_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pandemiclegacys1_cartes`
--
ALTER TABLE `pandemiclegacys1_cartes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pandemiclegacys1_joueurs`
--
ALTER TABLE `pandemiclegacys1_joueurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pandemiclegacys1_roles`
--
ALTER TABLE `pandemiclegacys1_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
