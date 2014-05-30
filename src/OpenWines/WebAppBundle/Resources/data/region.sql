-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2014 at 07:22 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `openwines`
--

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `more` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `description`, `more`, `created_at`) VALUES
(1, 'Alsace', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_d%27Alsace', '2014-05-30 00:00:00'),
(2, 'Beaujolais', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_du_Beaujolais', '2014-05-30 00:00:00'),
(3, 'Bordeaux', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_de_Bordeaux', '2014-05-30 00:00:00'),
(4, 'Bourgogne', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_de_Bourgogne', '2014-05-30 00:00:00'),
(5, 'Champagne', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_de_Champagne', '2014-05-30 00:00:00'),
(6, 'Corse', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_de_Corse', '2014-05-30 00:00:00'),
(7, 'Jura', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_du_Jura', '2014-05-30 00:00:00'),
(8, 'Languedoc', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_du_Languedoc-Roussillon', '2014-05-30 00:00:00'),
(9, 'Roussillon', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_du_Languedoc-Roussillon', '2014-05-30 00:00:00'),
(10, 'Provence', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_de_Provence', '2014-05-30 00:00:00'),
(11, 'Savoie', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_de_Savoie', '2014-05-30 00:00:00'),
(12, 'Sud-Ouest', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_du_Sud-Ouest', '2014-05-30 00:00:00'),
(13, 'Loire', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_de_la_vall%C3%A9e_de_la_Loire', '2014-05-30 00:00:00'),
(14, 'Rhône', 'grand terroir', 'http://fr.wikipedia.org/wiki/Vignoble_de_la_vall%C3%A9e_du_Rh%C3%B4ne', '2014-05-30 00:00:00'),
(15, 'Bugey', 'terroir de petite taille', 'http://fr.wikipedia.org/wiki/Vignoble_du_Bugey', '2014-05-30 00:00:00'),
(16, 'Lorraine', 'terroir de petite taille', 'http://fr.wikipedia.org/wiki/Vignoble_de_Lorraine', '2014-05-30 00:00:00'),
(17, 'Lyonnais', 'terroir de petite taille', 'http://fr.wikipedia.org/wiki/Coteaux-du-lyonnais', '2014-05-30 00:00:00'),
(18, 'Normandie', 'terroir de petite taille', 'http://fr.wikipedia.org/wiki/Vignoble_de_Normandie', '2014-05-30 00:00:00'),
(19, 'La Réunion', 'terroir de petite taille', 'http://fr.wikipedia.org/wiki/Cilaos_(IGP)', '2014-05-30 00:00:00'),
(20, 'Tahiti', 'terroir de petite taille', 'http://www.vindetahiti.com/', '2014-05-30 00:00:00'),
(21, 'Camargue', 'terroir de petite taille', 'http://fr.wikipedia.org/wiki/Viticulture_en_Camargue', '2014-05-30 00:00:00'),
(22, 'Île-de-France', 'terroir de petite taille', 'http://fr.wikipedia.org/wiki/Vignoble_d%27%C3%8Ele-de-France', '2014-05-30 00:00:00'),
(23, 'Limousin', 'terroir disparu', 'http://fr.wikipedia.org/wiki/Vignoble_du_Limousin', '2014-05-30 00:00:00'),
(24, 'Picardie', 'terroir disparu', 'http://fr.wikipedia.org/wiki/Vignoble_de_Picardie', '2014-05-30 00:00:00'),
(25, 'Normandie', 'terroir  disparu', 'http://fr.wikipedia.org/wiki/Vignoble_de_Normandie', '2014-05-30 00:00:00'),
(26, 'Bretagne', 'terroir disparu', 'http://fr.wikipedia.org/wiki/Vignoble_de_Bretagne', '2014-05-30 00:00:00'),
(27, 'Nord-Pas-de-Calais', 'terroir disparu', 'http://fr.wikipedia.org/wiki/Vignoble_du_Nord-Pas-de-Calais', '2014-05-30 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `region`
--
ALTER TABLE `region`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
