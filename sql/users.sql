-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2022 at 12:28 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNCNETSA6`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `date_birth` varchar(20) NOT NULL,
  `contact_number` int(20) NOT NULL,
  `country` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `exp_month` varchar(2) NOT NULL,
  `exp_year` int(4) NOT NULL,
  `cvv` int(3) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `date_birth`, `contact_number`, `country`, `email`, `pass`, `card_number`, `exp_month`, `exp_year`, `cvv`, `reg_date`) VALUES
(15, 'Reeve', 'Fernandes', '06/10/2000', 71010120, 'United Kingdom', 'fire@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '10101010', '12', 2024, 987, '2022-04-18 19:59:57'),
(18, 'Agnis', 'Mascarenhas', '06/10/1999', 700000, 'United Kingdom', 'fire5@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '010101010101', '12', 2028, 555, '2022-04-25 16:47:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
