-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2022 at 02:29 PM
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
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(20) NOT NULL,
  `category_title` varchar(200) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `release_year` int(20) NOT NULL,
  `language` varchar(100) NOT NULL,
  `info` varchar(500) NOT NULL,
  `img` varchar(30) NOT NULL,
  `preview` varchar(300) NOT NULL,
  `full_movie` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `category_title`, `movie_title`, `release_year`,`language`,`info`, `img`, `preview`, `full_movie`) VALUES
(1, 'Mystery, Action, Adventure, Animation, Fantasy ',  'Kena- Bridge of Spirits', '2021','English', 'A young spirit guide named Kena (Dewa Ayu Dewi Larassanti) travels to an abandoned village in search of the sacred Mountain Shrine. She collects small companions called the Rot, who help her throughout her journey. On the way to the village, she confronts a powerful masked spirit who reveals himself to be the cause of corruption in the forest, forcing it to decay and unleashing deadly monsters on the land. \r\nKena insists that she can help his spirit move on, but he refuses and leaves. In the vil', 'img/m1.jpg', 'https://www.youtube.com/embed/1aI_9mY7RgE', 'https://www.youtube.com/embed/28CIeC8cZks'),
(2, 'Comedy, Adventure, Animation, Science fiction', 'Home', '2015','English',  'An alien on the run from his own people makes friends with a girl. He tries to help her on her quest, but can be an interference.', 'img/m2.jpg', 'https://www.youtube.com/embed/MyqZf8LiWvM', 'https://www.youtube.com/embed/WpXHdqfsoVk'),
(3, 'Action, Science fiction, Horror', 'Halo', '2022','English',  'The central focus of the franchise builds on the experiences of Spartan 117, Master Chief, Sierra 117 John, one of a group of super soldiers code-named Spartans, and his artificial intelligence (AI) companion, Cortana.', 'img/m3.jpg', 'https://www.youtube.com/embed/PyMlV5_HRWk', 'https://www.youtube.com/embed/b80eLC0lHc4'),
(4, 'Musical, Adventure, Animation', 'The Lion King', '2019','English',  'After the murder of his father, a young lion prince flees his kingdom only to learn the true meaning of responsibility and bravery. ', 'img/m4.jpg', 'https://www.youtube.com/embed/7TavVZMewpY', 'https://www.youtube.com/embed/kRogXVio1w4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
