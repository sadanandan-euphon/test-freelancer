-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2013 at 06:14 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `localstylehunter`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `idbrand` int(11) NOT NULL AUTO_INCREMENT,
  `namebrand` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idbrand`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`idbrand`, `namebrand`) VALUES
(1, 'Nike'),
(2, 'Puma'),
(3, 'adidas'),
(4, 'Prada');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `namecategory` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idcategory`),
  UNIQUE KEY `idcategory_UNIQUE` (`idcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idcategory`, `namecategory`) VALUES
(1, 'Kleider'),
(2, 'Oberteile'),
(3, 'Röcke'),
(4, 'Jacken'),
(5, 'Hosen'),
(6, 'Schuhe'),
(7, 'Accessories'),
(8, 'Taschen'),
(9, 'Schmuck'),
(10, 'Beauty'),
(11, 'Bademode');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `idcity` int(11) NOT NULL AUTO_INCREMENT,
  `namecity` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idcity`),
  UNIQUE KEY `idcity_UNIQUE` (`idcity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`idcity`, `namecity`) VALUES
(1, 'Frankfurt'),
(2, 'Düsseldorf'),
(3, 'Berlin'),
(4, 'München'),
(5, 'Hamburg'),
(6, 'Köln');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `idcolor` int(11) NOT NULL AUTO_INCREMENT,
  `namecolor` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `hexcolor` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idcolor`),
  UNIQUE KEY `idcolor_UNIQUE` (`idcolor`),
  UNIQUE KEY `hexcolor_UNIQUE` (`hexcolor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`idcolor`, `namecolor`, `hexcolor`) VALUES
(2, 'Schwarz', '#000000'),
(3, 'Dunkelgrün', '#019F13'),
(4, 'Blau', '#2C2CD1'),
(5, 'Tuerkis', '#2DCFCD'),
(6, 'Silber', '#77858E'),
(7, 'Hellgruen', '#7CFE6F'),
(8, 'Braun', '#ba541d'),
(9, 'Hellblau', '#C4E1FC'),
(10, 'Lila', '#C61CD1'),
(11, 'Grau', '#D4D4D4'),
(12, 'Beige', '#E7DB9C'),
(13, 'Gold', '#F4CB62'),
(14, 'Gelb', '#F7FE2E'),
(15, 'Rot', '#FF0000'),
(16, 'Pink', '#FF59AD'),
(17, 'Orange', '#FFC600'),
(18, 'Rosa', '#FFDFEF');

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE IF NOT EXISTS `pic` (
  `idpic` int(11) NOT NULL AUTO_INCREMENT,
  `pathpic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idpic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`idpic`, `pathpic`) VALUES
(1, '../files/images/51f6a5aba8d112.18429288.jpg'),
(2, '../files/images/51f6a62becfc91.37918694.jpg'),
(3, '../files/images/51f6a70fce3027.81091701.jpg'),
(4, '../files/images/51f6a7b3b6f730.35942896.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `picoverview`
--

CREATE TABLE IF NOT EXISTS `picoverview` (
  `idoverview` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `picpath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idcategory` int(11) NOT NULL,
  `idcity` int(11) NOT NULL,
  `idcolor` int(11) NOT NULL,
  `idshop` int(11) NOT NULL,
  `idsubcategory` int(11) DEFAULT NULL,
  `idbrand` int(11) DEFAULT NULL,
  `idprice` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idpic` int(11) DEFAULT NULL,
  PRIMARY KEY (`idoverview`),
  KEY `idcategory_idx` (`idcategory`),
  KEY `idcity_idx` (`idcity`),
  KEY `idcolor_idx` (`idcolor`),
  KEY `idshop_idx` (`idshop`),
  KEY `idsubcatgory_idx` (`idsubcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `picoverview`
--

INSERT INTO `picoverview` (`idoverview`, `iduser`, `picpath`, `idcategory`, `idcity`, `idcolor`, `idshop`, `idsubcategory`, `idbrand`, `idprice`, `timestamp`, `idpic`) VALUES
(6, 1, '../files/images/51ed1df7c59218.43016552.jpg', 1, 1, 2, 2, 5, 3, 7, '2013-07-22 11:56:39', NULL),
(7, 1, '../files/images/51f6a5aba8d112.18429288.jpg', 6, 3, 2, 2, 9, 2, 6, '2013-07-29 17:26:03', 0),
(8, 1, '../files/images/51f6a62becfc91.37918694.jpg', 6, 3, 2, 2, 9, 2, 6, '2013-07-29 17:28:11', 0),
(9, 1, '../files/images/51f6a70fce3027.81091701.jpg', 6, 3, 2, 2, 9, 2, 6, '2013-07-29 17:31:59', 0),
(10, 1, '../files/images/51f6a7b3b6f730.35942896.jpg', 6, 3, 2, 2, 9, 2, 6, '2013-07-29 17:34:43', 4);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `idprice` int(11) NOT NULL AUTO_INCREMENT,
  `nameprice` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idprice`),
  UNIQUE KEY `idprice_UNIQUE` (`idprice`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`idprice`, `nameprice`) VALUES
(1, '0 - 20 €'),
(2, '20 - 40 €'),
(3, '40 - 70 €'),
(4, '70 - 100 €'),
(5, '100 - 150 €'),
(6, '150 - 250 €'),
(7, '250 - 500 €'),
(8, '> 500 €');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `idshop` int(11) NOT NULL AUTO_INCREMENT,
  `nameshop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idshop`),
  UNIQUE KEY `idshop_UNIQUE` (`idshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`idshop`, `nameshop`) VALUES
(1, 'Urban Outfiters'),
(2, 'Peek & Cloppenburg'),
(3, 'Primark'),
(4, 'H&M');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `idsubcategory` int(11) NOT NULL AUTO_INCREMENT,
  `namesubcategory` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsubcategory`),
  UNIQUE KEY `idsubcategory_UNIQUE` (`idsubcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`idsubcategory`, `namesubcategory`, `idcategory`) VALUES
(1, 'Etuikleid', 1),
(2, 'Abendkleider', 1),
(3, 'Casual Kleider', 1),
(4, 'Bustierkleider', 1),
(5, 'Maxikleider', 1),
(6, 'Minikleider', 1),
(7, 'Partykleider', 1),
(8, 'Strickkleider', 1),
(9, 'Tops', 2),
(10, 'T-Shirts', 2),
(11, 'Blusen', 2),
(12, 'Pullover', 2),
(13, 'Cardigans', 2),
(14, 'Westen', 2),
(15, 'Longsleeves', 2),
(16, 'Kapuzenpullover', 2),
(17, 'Tuniken', 2),
(18, 'Jeans', 5),
(19, 'Chino Hosen', 5),
(20, 'Stoffhosen', 5),
(21, 'Caprihosen', 5),
(22, 'Shorts & Bermudas', 5),
(23, 'Leggings', 5),
(24, 'Overalls', 5),
(25, 'Kurze Röcke', 3),
(26, 'Mittellange Röcke', 3),
(27, 'Lange Röcke', 3),
(28, 'Jacken', 4),
(29, 'Mäntel', 4),
(30, 'Blazer', 4),
(31, 'Ballerinas', 6),
(32, 'Pumps', 6),
(33, 'Schnürschuhe', 6),
(34, 'Sneaker', 6),
(35, 'Stiefel', 6),
(36, 'Sandalen', 6),
(37, 'Ankle Boots', 6),
(38, 'Overknees', 6),
(39, 'Stiefeletten', 6),
(40, 'Handtaschen', 8),
(41, 'Umhängetaschen', 8),
(42, 'Etuis & Geldbörsen', 8),
(43, 'Rucksäcke', 8),
(44, 'Clutches', 8),
(45, 'Gürtel', 7),
(46, 'Sonnenbrillen', 7),
(47, 'Schals', 7),
(48, 'Tücher', 7),
(49, 'Hüte & Caps', 7),
(50, 'Handschuhe', 7),
(51, 'Strümpfe/Strumpfhosen', 7),
(52, 'Sonstiges', 7),
(53, 'Armschmuck', 9),
(54, 'Halsketten', 9),
(55, 'Ohrringe', 9),
(56, 'Ringe', 9),
(57, 'Uhren', 9),
(58, 'Anhänger', 9),
(59, 'Lippenstift', 10),
(60, 'Augen Make-Up', 10),
(61, 'Make-Up', 10),
(62, 'Nagellack', 10),
(63, 'Parfum', 10),
(64, 'Körperpflege', 10),
(65, 'Haarpflege', 10),
(66, 'Gesichtpflege', 10),
(67, 'Sonnenpflege', 10),
(68, 'Bikinis', 11),
(69, 'Bikinis-Tops', 11),
(70, 'Pants', 11),
(71, 'Badeanzüge', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activated` bit(1) DEFAULT NULL,
  `activationkey` varchar(100) DEFAULT NULL,
  `usergroup` varchar(10) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `password`, `email`, `activated`, `activationkey`, `usergroup`, `id`) VALUES
('Stephan', '5703982f188221cf02876debcc9b8f40', 'stephan.hoepfl@gmail.com', '1', '8449314214a7d40b8aa14fec8c53fcb0', 'user', 2),
('anton', '5703982f188221cf02876debcc9b8f40', 'anton@web.de', '1', '9120e1204fdfc395793fecc5680c5cf1', 'user', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `picoverview`
--
ALTER TABLE `picoverview`
  ADD CONSTRAINT `idcategory` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idshop` FOREIGN KEY (`idshop`) REFERENCES `shop` (`idshop`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
