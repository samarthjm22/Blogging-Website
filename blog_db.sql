-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 07:29 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Admin', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `blogger_info`
--

CREATE TABLE `blogger_info` (
  `blogger_id` int(11) NOT NULL,
  `blogger_username` varchar(255) NOT NULL,
  `blogger_password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `blogger_email` varchar(255) NOT NULL,
  `blogger_creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blogger_updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blogger_end_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blogger_is_active` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogger_info`
--

INSERT INTO `blogger_info` (`blogger_id`, `blogger_username`, `blogger_password`, `hash`, `pass`, `blogger_email`, `blogger_creation_date`, `blogger_updated_date`, `blogger_end_date`, `blogger_is_active`) VALUES
(1, 'abc', 'abc', '9b04d152845ec0a378394003c96da594', '094bb65ef46d3eb4be0a87877ec333eb', 'abc@gmail.com', '2017-09-29 09:52:39', '2017-09-29 10:28:33', '2017-09-29 10:28:23', 'active'),
(2, 'pqr', 'pqr', 'f5deaeeae1538fb6c45901d524ee2f98', '39dd987a9d27f1045aa0ad3ed5995dd2', 'pqr@gmail.com', '2017-09-29 09:55:50', '2017-09-29 14:32:28', '2017-09-29 14:32:21', 'active'),
(3, 'xyz', 'xyz', 'f7e6c85504ce6e82442c770f7c8606f0', '325995af77a0e8b06d1204a171010b3a', 'xyz@gmail.com', '2017-09-29 09:57:09', '2017-09-29 11:12:20', '2017-09-29 11:12:14', 'active'),
(4, 'lmn', 'lmn', '0f28b5d49b3020afeecd95b4009adf4c', 'f0eaf559f89ca17022783964ebe9cdfd', 'lmn@gmail.com', '2017-09-29 10:01:21', '2017-09-29 10:27:49', '2017-09-29 10:27:49', 'active'),
(5, 'sam', 'sam', '26dd0dbc6e3f4c8043749885523d6a25', '7cce53cf90577442771720a370c3c723', 'sam@gmail.com', '2017-09-29 14:34:28', '2017-09-29 14:34:28', '2017-09-29 14:34:28', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `blog_master`
--

CREATE TABLE `blog_master` (
  `blog_id` int(10) UNSIGNED NOT NULL,
  `blogger_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_category` varchar(255) NOT NULL,
  `blog_author` varchar(255) NOT NULL,
  `blog_is_active` varchar(255) NOT NULL DEFAULT 'active',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Name` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_master`
--

INSERT INTO `blog_master` (`blog_id`, `blogger_id`, `blog_title`, `blog_desc`, `blog_category`, `blog_author`, `blog_is_active`, `creation_date`, `update_date`, `Name`, `img`) VALUES
(1, 0, 'Bitcoin', 'Bitcoin is a worldwide cryptocurrency and digital payment system[13]:3 called the first decentralized digital currency, since the system works without a central repository or single administrator.[13]:1[14] It was invented by an unknown programmer, or a group of programmers, under the name Satoshi Nakamoto[15] and released as open-source software in 2009.[16] The system is peer-to-peer, and transactions take place between users directly, without an intermediary.[13]:4 These transactions are verified by network nodes and recorded in a public distributed ledger called a blockchain.\r\n\r\nBesides being created as a reward for mining, bitcoin can be exchanged for other currencies,[17] products, and services. As of February 2015, over 100,000 merchants and vendors accepted bitcoin as payment.[18] Bitcoin can also be held as an investment. According to research produced by Cambridge University in 2017, there are 2.9 to 5.8 million unique users using a cryptocurrency wallet, most of them using bitcoin.[19]\r\n\r\n\r\n', 'Economy', 'abc', '1', '2017-09-29 10:47:11', '2017-09-29 07:35:36', 'myimages', 'eco3.jpg'),
(2, 0, 'Football', '\r\nFootball is a family of team sports that involve, to varying degrees, kicking a ball with the foot to score a goal. Unqualified, the word football is understood to refer to whichever form of football is the most popular in the regional context in which the word appears. Sports commonly called \'football\' in certain places include: association football (known as soccer in some countries); gridiron football (specifically American football or Canadian football); Australian rules football; rugby football (either rugby league or rugby union); and Gaelic football.[1][2] These different variations of football are known as football codes.', 'Sports', 'abc', '1', '2017-09-29 11:06:35', '2017-09-29 11:06:35', 'myimages', 's2.jpg'),
(3, 0, 'Economy WorldWide', '\r\nAn economy (From Greek Î¿Î¯ÎºÎ¿Ï‚ â€“ \"household\" and Î½Ä™Î¼oÎ¼Î±Î¹ â€“ \"manage\") is an area of the production, distribution, or trade, and consumption of goods and services by different agents. Understood in its broadest sense, \'The economy is defined as a social domain that emphasizes the practices, discourses, and material expressions associated with the production, use, and management of resources\'.[1] Economic agents can be individuals, businesses, organizations, or governments. Economic transactions occur when two parties agree to the value or price of the transacted good or service, commonly expressed in a certain currency. Monetary transactions only account for a small part of the economic domain.', 'Economy', 'pqr', '1', '2017-09-29 11:08:21', '2017-09-29 11:08:21', 'myimages', 'eco1.jpg'),
(4, 0, 'A Tale of Two Cities', '\r\nA Tale of Two Cities (1859) is a novel by Charles Dickens, set in London and Paris before and during the French Revolution. The novel tells the story of the French Doctor Manette, his 18-year-long imprisonment in the Bastille in Paris and his release to life in London with his daughter Lucie, whom he had never met; Lucie\'s marriage and the collision between her beloved husband and the people who caused her father\'s imprisonment; and Monsieur and Madame Defarge, sellers of wine in a poor suburb of Paris. The story is set against the conditions that led up to the French Revolution and the Reign of Terror.', 'Books', 'pqr', '1', '2017-09-29 11:09:25', '2017-09-29 11:09:25', 'myimages', 'b1.jpg'),
(5, 0, 'Space X', '\r\nSpaceX\'s achievements include the first privately funded liquid-propellant rocket to reach orbit (Falcon 1 in 2008);[9] the first privately funded company to successfully launch, orbit, and recover a spacecraft (Dragon in 2010); the first private company to send a spacecraft to the International Space Station (Dragon in 2012);[10] the first propulsive landing for an orbital rocket (Falcon 9 in 2015); and the first reuse of an orbital rocket (Falcon 9 in 2017). As of March 2017, SpaceX has since flown ten missions to the International Space Station (ISS) under a cargo resupply contract.[11] NASA also awarded SpaceX a further development contract in 2011 to develop and demonstrate a human-rated Dragon, which would be used to transport astronauts to the ISS and return them safely to Earth.[12]', 'Science', 'xyz', '0', '2017-09-29 11:11:09', '2017-09-29 11:11:09', 'myimages', 'sc2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `blog_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`blog_id`, `username`, `comment`) VALUES
(5, 'lmn', '\r\nGreat Stuff Bro!!');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `question`) VALUES
('John Doe', 'How are you?');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `blog_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`blog_id`, `username`) VALUES
('5', 'lmn'),
('3', 'lmn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogger_info`
--
ALTER TABLE `blogger_info`
  ADD PRIMARY KEY (`blogger_id`);

--
-- Indexes for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`blog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogger_info`
--
ALTER TABLE `blogger_info`
  MODIFY `blogger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_master`
--
ALTER TABLE `blog_master`
  MODIFY `blog_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
