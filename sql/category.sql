-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2022 at 12:27 PM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(20) NOT NULL,
  `category_title` varchar(30) NOT NULL,
  `info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_title`, `info`) VALUES
(1, 'Action', 'Action film is a film genre in which the protagonist is thrust into a series of events that typically involve violence and physical feats.'),
(3, 'Science fiction', 'Science fiction is a film genre that uses speculative, fictional science-based depictions of phenomena that are not fully accepted by mainstream science, such as extraterrestrial lifeforms, spacecraft, robots, cyborgs, interstellar travel or other technologies.'),
(4, 'Musical', 'Musical film is a film genre in which songs by the characters are interwoven into the narrative, sometimes accompanied by singing and dancing.'),
(5, 'Animation', 'Animation is a method in which figures are manipulated to appear as moving images.'),
(6, 'Adventure', 'An adventure film is form of adventure fiction, and is a genre of film. '),
(7, 'Fantasy', 'Fantasy is a genre of speculative fiction involving magical elements, typically set in a fictional universe and sometimes inspired by mythology and folklore. '),
(8, 'Mystery', 'A mystery film is a genre of film that revolves around the solution of a problem or a crime.'),
(2, 'comedy', 'A comedy film is a category of film which emphasizes humor. These films are designed to make the audience laugh through amusement.'),
(9, 'horror', 'ja');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
