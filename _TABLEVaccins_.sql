-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 14, 2018 at 09:02 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yjlv_p1_carnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `yjlv_vaccins`
--

CREATE TABLE `yjlv_vaccins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `type_vaccin` enum('obligatoire','facultatif','conseillé') NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yjlv_vaccins`
--

INSERT INTO `yjlv_vaccins` (`id`, `name`, `description`, `type_vaccin`, `created_at`, `modified_at`) VALUES
(1, 'ACT-HIB', 'Vaccin Haemophilus influenzae type b conjugué\r\n', 'obligatoire', '2018-11-13 00:00:00', NULL),
(2, 'AVAXIM 160 U\r\n', 'Vaccin contre l\'hépatite A (inactivé, adsorbé)\r\n', 'conseillé', '2018-11-13 00:00:00', NULL),
(3, 'BEXSERO', 'Vaccin méningococcique groupe B (ADNr, composant, adsorbé)\r\n', 'conseillé', '2018-11-13 00:00:00', NULL),
(4, 'DUKORAL', 'Vaccin cholérique recombinant\r\n', 'conseillé', '2018-11-13 00:00:00', NULL),
(5, 'ENCEPUR', 'Vaccin de l\'encéphalite à tiques (inactivé adsorbé)\r\n', 'conseillé', '2018-11-13 00:00:00', NULL),
(6, 'ENGERIX B 10 µg', 'Vaccin de l\'hépatite B recombinant adsorbé', 'obligatoire', '2018-11-13 00:00:00', NULL),
(7, 'Ebola rVSV-ZEBOV', 'Vaccin expérimental contre le virus Ebola\r\n', 'conseillé', '2018-11-13 00:00:00', NULL),
(8, 'GARDASIL', 'Vaccin papillomavirus humain [types 6, 11, 16, 18] (recombinant, adsorbé)', 'conseillé', '2018-11-13 00:00:00', NULL),
(9, 'IXIARO', 'Vaccin contre l\'encéphalite japonaise (inactivé, adsorbé)', 'conseillé', '2018-11-13 00:00:00', NULL),
(10, 'Influvac Tetra', 'Vaccin quadrivalent à antigènes de surface contre la grippe saisonnière\r\n', 'conseillé', '2018-11-13 00:00:00', NULL),
(11, 'M-M-RVAXPRO', 'Vaccin rougeoleux, des oreillons et rubéoleux (vivant)', 'obligatoire', '2018-11-13 00:00:00', NULL),
(12, 'MENINGITEC', 'Vaccin méningococcique du sérogroupe C oligosidique conjugué (adsorbé)\r\n', 'obligatoire', '2018-11-13 00:00:00', NULL),
(13, 'MOSQUIRIX', 'Vaccin contre le paludisme et l\'hépatite B', 'conseillé', '2018-11-13 00:00:00', NULL),
(14, 'PNEUMOVAX', 'Vaccin pneumococcique polyosidique', 'obligatoire', '2018-11-13 00:00:00', NULL),
(15, 'RABIPUR', 'Vaccin rabique pour usage humain, préparé sur cultures cellulaires\r\n', 'conseillé', '2018-11-13 00:00:00', NULL),
(16, 'STAMARIL', 'Vaccin contre la fièvre jaune (vivant)\r\n', 'conseillé', '2018-11-13 00:00:00', NULL),
(17, 'TYPHIM VI', 'Vaccin typhoïdique polyosidique.', 'conseillé', '2018-11-13 00:00:00', NULL),
(18, 'VACCIN BCG BIOMED-LUBLIN', 'Vaccin contre la tuberculose', 'conseillé', '2018-11-13 00:00:00', NULL),
(19, 'VARILRIX', 'Vaccin varicelleux vivant.', 'conseillé', '2018-11-13 00:00:00', NULL),
(20, 'ZOSTAVAX', 'Vaccin zona (vivant atténué)', 'conseillé', '2018-11-13 00:00:00', NULL),
(21, 'TETRAVAC-ACELLULAIRE', 'Vaccin diphtérique, tétanique, coquelucheux acellulaire, poliomyélitique (inactivé, adsorbé)', 'obligatoire', '2018-11-13 00:00:00', NULL),
(22, 'jwdhjw', 'je suis super cool lalalalalallalalalala', 'obligatoire', '2018-11-14 09:59:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yjlv_vaccins`
--
ALTER TABLE `yjlv_vaccins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `yjlv_vaccins`
--
ALTER TABLE `yjlv_vaccins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
