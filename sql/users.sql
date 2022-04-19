-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2022 at 06:17 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `contact_number`, `country`,  `email`, `pass`, `card_number`, `exp_month`, `exp_year`, `cvv`, `reg_date`) VALUES
(1, 'Reeve', 'Fernandes', 'hellothere@gmail.com', 'bb68fd7328ac93af1b9bc6b13eba0934575a35e5874e205e01da209624f89807', '10101010', '12', 23, 456, '2021-10-14 08:46:13'),
(2, 'Ed', 'Sheeran', 'ed@gmail.com', '0ffe1abd1a08215353c233d6e009613e95eec4253832a761af28ff37ac5a150c', '2222', '12', 23, 888, '2021-10-14 09:02:38'),
(3, 'Sharon', 'Martin', 'sm@sm.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1111222233334444', '11', 22, 333, '2021-11-18 15:08:14'),
(4, 'sean', 'fernandes', 'sean@gmail.com', '6629ddae3736e894e89cb4a1300a9d2c5c0fad418f8ea06a341b81f2a98bb491', '1111222233334444', '12', 12, 123, '2021-12-09 08:10:37'),
(5, 'sea', 'fernandes', 'sea@gmail.com', '6629ddae3736e894e89cb4a1300a9d2c5c0fad418f8ea06a341b81f2a98bb491', '1111222233334444', '12', 12, 123, '2021-12-09 08:16:12'),
(6, 'k', 'm', '123@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '321321', '32', 32, 32, '2021-12-09 14:43:04'),
(8, 'Sourav', 'Yadav', 'souravyd2000@yahoo.co.uk', '4e44fcc1480a7fb28f71dc3e3680be0daf51ff89336b0e59492a66e979929278', '765914328907', '06', 24, 951, '2021-12-12 18:49:13'),
(10, 'AGNIS', 'MASCARENHAS', 'agnismhs06@gmail.com', 'd9feda7775e29c14bc2cb241b20a818d85d65dc757f10a1021c5af0e91ebf97b', '298378961234', '12', 24, 568, '2021-12-12 19:01:38'),
(11, 'Sourav', 'Yadav', 'souravyd2000@gmail.com', '0e1a5a785140c34c7fc92aab54b59eff0c38182c5272978c8a7b0187c6d6c726', '111188885555', '06', 26, 567, '2021-12-13 15:10:31'),
(12, 'Test', 'Test', '1@2.3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1111222233334444', '11', 22, 123, '2022-01-08 17:08:36'),
(13, 'Reeve', 'Fernandes', 'fire@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1011010101', '07', 2025, 567, '2022-04-14 15:11:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
