-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2022 at 02:28 PM
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
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(20) NOT NULL,
  `category_title` varchar(200) NOT NULL,
  `show_title` varchar(100) NOT NULL,
  `release_year` int(20) NOT NULL,
  `language` varchar(100) NOT NULL,
  `season` int(20) NOT NULL,
  `info` varchar(500) NOT NULL,
  `img` varchar(30) NOT NULL,
  `preview` varchar(300) NOT NULL, 
  `ep1` varchar(300) NOT NULL,
  `ep2` varchar(300) NOT NULL,
  `ep3` varchar(300) NOT NULL,
  `ep4` varchar(300) NOT NULL,
  `ep5` varchar(300) NOT NULL,
  `ep6` varchar(300) NOT NULL,
  `ep7` varchar(300) NOT NULL,
  `ep8` varchar(300) NOT NULL,
  `ep9` varchar(300) NOT NULL,
  `ep10` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `category_title`, `show_title`, `release_year`,`language`, `season`, `info`, `img`, `preview`, `ep1`, `ep2`, `ep3`, `ep4`, `ep5`, `ep6`, `ep7`, `ep8`, `ep9`, `ep10`) VALUES
(1, 'Mystery, Action, Adventure,  Fantasy, Science fiction ', 'Star Wars Jedi Fallen Order', '2019','English', '1', 'Five years after the Great Jedi Purge and the Galactic Republics conversion into the Galactic Empire, former Jedi Padawan Cal Kestis is hiding on the planet Bracca, where he works as a scrapper salvaging ships from the Clone Wars.', 'img/s1.jpg', 'https://www.youtube.com/embed/0GLbwkfhYZk', 'https://www.youtube.com/embed/4kZOVzl99kk', 'https://www.youtube.com/embed/zCkhDZEUtn4', 'https://www.youtube.com/embed/MvaEA_fJxj8', 'https://www.youtube.com/embed/WFwLVnWx-R8', 'https://www.youtube.com/embed/YYzx5dDEaV0', 'https://www.youtube.com/embed/RL4mjgRbw6k', 'https://www.youtube.com/embed/4LceFh6-vCE', 'https://www.youtube.com/embed/JEtlN_IwzVA', 'https://www.youtube.com/embed/4KwLnLo93G8', 'https://www.youtube.com/embed/vUhrVsmNNBc'),
(2, 'Mystery, Action,  Science fiction, Horror ', 'Death Stranding',  '2019','English', '1', 'Freelance courier Sam Porter Bridges (Norman Reedus) istransporting cargo to Central Knot City but is interrupted by Timefall and takes shelter.He receives assistance from Fragile (Léa Seydoux) in evading a BT.', 'img/s2.jpg', 'https://www.youtube.com/embed/tCI396HyhbQ', 'https://www.youtube.com/embed/vNnfF1_lcEQ', 'https://www.youtube.com/embed/oMrGd_9mC5k', 'https://www.youtube.com/embed/d7pjKajX9ns', 'https://www.youtube.com/embed/lzWcjsQCsD8', 'https://www.youtube.com/embed/Ah_fdHTmCm8', 'https://www.youtube.com/embed/adWZ8fD3z20', 'https://www.youtube.com/embed/eunwGC_x1o8', 'https://www.youtube.com/embed/8-PKxsOTFOA', 'https://www.youtube.com/embed/bXKMvQmfOao', 'https://www.youtube.com/embed/0gIylgjzRjQ'),
(3, 'Mystery, Action,  Science fiction, Horror ', 'Control',  '2019','English', '1', 'Jesse Faden arrives at the Oldest House following a telepathic message from Polaris, seeking the whereabouts of her kidnapped brother Dylan. Inside the building, Jesse discovers the lifeless body of Zachariah Trench, and is instructed by Polaris to pick up his fallen Service Weapon', 'img/s3.jpg', 'https://www.youtube.com/embed/F74LLDhAhhI', 'https://www.youtube.com/embed/o6tpubLOeXg', 'https://www.youtube.com/embed/u9JofXY-_xQ', 'https://www.youtube.com/embed/Ci3HJkGARvM', 'https://www.youtube.com/embed/KTMxzEjzkKg', 'https://www.youtube.com/embed/2vNmgl6Rfyk', 'https://www.youtube.com/embed/jK5VI9SjSro', 'https://www.youtube.com/embed/obMDmw8gqBU', 'https://www.youtube.com/embed/TRXo3OvjVp0', 'https://www.youtube.com/embed/oG1EP-jbeZ8', 'https://www.youtube.com/embed/gmCuGzeK-h0'),
(4, 'Mystery, Science fiction, Horror ','Beyond Two Souls',  '2013','English', '1', 'Young Jodie Holmes (Caroline Wolfson) lives with her foster parents in a suburban home. Since birth, Jodie has had a psychic connection with a mysterious entity named Aiden, with whom she can communicate and perform telepathic acts', 'img/s4.jpg', 'https://www.youtube.com/embed/c9D1N-MHwog', 'https://www.youtube.com/embed/acGXEcLaf8U', 'https://www.youtube.com/embed/6N3H4v3EDrs', 'https://www.youtube.com/embed/ohG__q00nFQ', 'https://www.youtube.com/embed/LkNkXZYG7BM', 'https://www.youtube.com/embed/PmcHc58lLdA', 'https://www.youtube.com/embed/B3wyIS002X8', 'https://www.youtube.com/embed/_-LbHei_uJg', 'https://www.youtube.com/embed/kNo9DKIT88E', 'https://www.youtube.com/embed/YIRKnea4QNE', 'https://www.youtube.com/embed/YjgxTCdvXTU');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
