-- phpMyAdmin SQL Dump
-- version 4.1.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2014 at 04:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.18

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
-- Table structure for table `appellation`
--

CREATE TABLE IF NOT EXISTS `appellation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vignoble_id` int(11) DEFAULT NULL,
  `appelation_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` int(11) DEFAULT NULL COMMENT 'hectares',
  `production` int(11) DEFAULT NULL COMMENT 'hectolitres',
  `soil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wine_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `more` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9EE6D44F5C794B00` (`vignoble_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `appellation`
--

INSERT INTO `appellation` (`id`, `vignoble_id`, `appelation_type`, `name`, `area`, `production`, `soil`, `wine_type`, `description`, `more`, `created_at`, `updated_at`) VALUES
(1, 7, 'AOC', 'Château-chalon', NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-02 00:00:00', '2014-06-02 00:00:00'),
(2, 7, 'AOC', 'Arbois', NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-02 00:00:00', '2014-06-02 00:00:00'),
(3, 7, 'AOC', 'l’Étoile', NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-02 00:00:00', '2014-06-02 00:00:00'),
(4, 7, 'AOC', 'Côtes-du-jura', NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-02 00:00:00', '2014-06-02 00:00:00'),
(5, 7, 'AOC', 'Crémant du Jura', NULL, NULL, NULL, NULL, NULL, NULL, '2014-06-02 00:00:00', '2014-06-02 00:00:00'),
(6, 7, 'AOC', 'Macvin du Jura', NULL, NULL, NULL, NULL, NULL, 'http://www.jura-vins.com/aoc-macvin-du-jura.htm', '2014-06-02 00:00:00', '2014-06-02 00:00:00'),
(7, 13, 'AOC', 'crémant de Loire', NULL, NULL, NULL, NULL, NULL, 'http://fr.wikipedia.org/wiki/Cr%C3%A9mant_de_Loire_(Appellation)', '2014-06-05 00:00:00', '2014-06-05 00:00:00'),
(8, 13, 'AOC', 'rosé de Loire', NULL, NULL, NULL, NULL, NULL, 'http://fr.wikipedia.org/wiki/Ros%C3%A9_de_loire_(Appellation)', '2014-06-05 00:00:00', '2014-06-05 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appellation`
--
ALTER TABLE `appellation`
  ADD CONSTRAINT `FK_9EE6D44F5C794B00` FOREIGN KEY (`vignoble_id`) REFERENCES `vignoble` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
