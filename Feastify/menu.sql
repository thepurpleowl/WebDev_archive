-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2015 at 06:00 PM
-- Server version: 5.5.28
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feastifydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` varchar(10) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `menu_price` decimal(10,2) NOT NULL,
  `res_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_price`, `res_id`) VALUES
('m1', 'pasta', '555.00', 'r1'),
('m1', 'Roti', '70.00', 'r2'),
('m2', 'Chutney', '110.00', 'r2'),
('m3', 'Pisto', '180.00', 'r3'),
('m3', 'Paella', '220.00', 'r3'),
('m4', 'Flamiche', '160.00', 'r3'),
('m4', 'Ratatouille', '135.00', 'r3'),
('m4', 'Fried Milk', '240.00', 'r4'),
('m1', 'Palak Paneer', '70.00', 'r1'),
('m2', 'Samvar Vada', '40.00', 'r1'),
('m3', 'French  Onion Soup', '60.00', 'r1'),
('m4', 'Sphaggetti', '120.00', 'r1'),
('m5', 'Schezwan Vegetable', '100.00', 'r1'),
('m1', 'Butter Naan', '20.00', 'r2'),
('m2', 'Masala Dosa', '70.00', 'r2'),
('m3', 'Dragon Chicken Soup', '85.00', 'r2'),
('m4', 'Crispy Corn', '40.00', 'r2'),
('m5', 'Veg. Bullets', '65.00', 'r2'),
('m1', 'Dal', '30.00', 'r3'),
('m2', 'Idli', '25.00', 'r3'),
('m3', 'Chilly Gobi', '95.00', 'r3'),
('m4', 'aragon', '85.00', 'r3'),
('m5', 'Peperonata', '50.00', 'r3'),
('m1', 'Chilli Paneer', '75.00', 'r4'),
('m2', 'Lemon Rice', '40.00', 'r4'),
('m4', 'Pinchitos', '150.00', 'r4'),
('m1', 'Mushroom Masala', '85.00', 'r5'),
('m2', 'Upma', '40.00', 'r5'),
('m3', 'Buckwheat CrÃªpes', '120.00', 'r5'),
('m4', 'Tortell', '200.00', 'r5'),
('m5', 'Pazenella', '180.00', 'r5'),
('m1', 'Dal Makhani', '40.00', 'r6'),
('m3', 'Sole MeuniÃ¨re', '230.00', 'r6'),
('m4', 'Teja', '130.00', 'r6'),
('m5', 'Bruschetta', '170.00', 'r6'),
('m1', 'Tadka', '60.00', 'r7'),
('m2', 'Rava Dosa', '50.00', 'r7'),
('m3', 'Hachis Parmentier', '150.00', 'r7'),
('m4', 'Panellets', '150.00', 'r7'),
('m5', 'Focaccia Bread', '200.00', 'r7'),
('m1', 'Roti', '10.00', 'r8'),
('m2', 'chutney', '30.00', 'r8'),
('m4', 'Frangolio', '140.00', 'r8'),
('m5', 'Pasta Carbonara', '240.00', 'r8'),
('m1', 'Paneer 65', '100.00', 'r9'),
('m2', 'Masala Dosa', '80.00', 'r9'),
('m3', 'Steak Tartare', '260.00', 'r9'),
('m4', 'Croquettes', '200.00', 'r9'),
('m5', 'Margherita Pizza', '300.00', 'r9'),
('m1', 'paratha', '120.00', 'r2'),
('m1', 'dahi', '230.00', 'r2'),
('m1', 'paja', '130.00', 'r2'),
('m1', 'tadka65', '200.00', 'r2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
