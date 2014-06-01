-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2014 at 11:25 PM
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
-- Table structure for table `AOC`
--

CREATE TABLE IF NOT EXISTS `AOC` (
`id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `AOC`
--

INSERT INTO `AOC` (`id`, `region_id`, `name`, `type`, `created_at`) VALUES
(1, 7, 'Château-chalon', 'géographique', '2014-06-02 00:00:00'),
(2, 7, 'Arbois', 'géographique', '2014-06-02 00:00:00'),
(3, 7, 'l’Étoile', 'géographique', '2014-06-02 00:00:00'),
(4, 7, 'Côtes-du-jura', 'géographique', '2014-06-02 00:00:00'),
(5, 7, 'Crémant du Jura', 'produit', '2014-06-02 00:00:00'),
(6, 7, 'Macvin du Jura', 'produit', '2014-06-02 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AOC`
--
ALTER TABLE `AOC`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_162D7D0598260155` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AOC`
--
ALTER TABLE `AOC`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `AOC`
--
ALTER TABLE `AOC`
ADD CONSTRAINT `FK_162D7D0598260155` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
