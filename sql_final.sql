-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 04:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_ID` int(4) UNSIGNED NOT NULL,
  `title` varchar(25) NOT NULL,
  `body` varchar(200) NOT NULL,
  `ttl_topics` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_ID`, `title`, `body`, `ttl_topics`) VALUES
(1, 'Politics', 'All of your controversial and political questions', 0),
(2, 'Microsoft', 'Company founded by Bill Gates', 0),
(3, 'Apple', 'Company founded by Steve Jobs', 0),
(4, 'Games', 'Any video, card or board games', 0),
(5, 'Health', 'Having an issue with your health?', 0),
(6, 'History', 'History ranging from the beginning of time until the end of it', 0),
(7, 'Education', 'The idea of public or private schooling', 0),
(8, 'Art', 'The arts are of the utmost importance, for they represent our being', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_ID` int(4) UNSIGNED NOT NULL,
  `topic_ID` int(4) NOT NULL,
  `user_ID` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(250) NOT NULL,
  `ttl_replies` int(5) NOT NULL,
  `dateposted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_ID`, `topic_ID`, `user_ID`, `title`, `body`, `ttl_replies`, `dateposted`) VALUES
(50, 1, 4, 'Donald Trump is the best president.', 'I think Donald Trump is the best president out there.', 0, '2019-12-06 06:31:00'),
(51, 1, 4, 'Donald trump is A racist', 'Donald Trump hates black people.  I know it for sure.', 0, '2019-12-06 06:31:46'),
(57, 2, 4, 'Is abortion Wrong?', 'Abortion is clearly wrong, but its not that simple.', 0, '2019-12-06 06:42:46'),
(59, 3, 4, 'Do we need it?', 'Do we even really need the first amendment?', 0, '2019-12-06 06:45:06'),
(60, 5, 4, 'Are transgenders delusional?', 'Serious question, is it truly a problem?  Or is it psychological?', 0, '2019-12-06 06:45:43'),
(64, 1, 11, 'Donald Trump has 2020', 'he has it.', 0, '2019-12-06 17:06:10'),
(65, 1, 1, 'dTRUMP FOR LIFE', 'hi', 0, '2019-12-06 17:19:28'),
(66, 1, 12, 'The Wall', 'Should Donald Trump build the wall?', 0, '2019-12-09 15:27:35'),
(67, 4, 13, 'Do we need the right to bear arms?', 'Hmmmm Jeremy, what do you think?', 0, '2019-12-12 09:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_ID` int(4) UNSIGNED NOT NULL,
  `post_ID` int(4) NOT NULL,
  `user_ID` int(4) NOT NULL,
  `title` varchar(25) NOT NULL,
  `body` varchar(250) NOT NULL,
  `ttl_replies` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_ID`, `post_ID`, `user_ID`, `title`, `body`, `ttl_replies`) VALUES
(66, 51, 4, '', 'Pretty unreasonable.', 0),
(67, 51, 4, '', 'Pretty unreasonable.', 0),
(68, 51, 4, '', 'Nope', 0),
(70, 51, 10, '', 'bull', 0),
(71, 59, 10, '', 'Yes', 0),
(72, 59, 10, '', 'I think we really need it.', 0),
(82, 57, 6, '', 'I agree.', 0),
(83, 57, 11, '', 'What makes you think it is wrong?', 0),
(94, 57, 1, '', 'asd', 0),
(95, 59, 1, '', '\r\nNah not really.', 0),
(96, 51, 12, '', 'Yes he is he hates Mexicans and so do I', 0),
(97, 51, 12, '', 'Yeah you racist!', 0),
(98, 67, 4, '', 'Yeah Jeremy..what do you think?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_ID` int(4) NOT NULL,
  `cat_ID` int(4) NOT NULL,
  `title` varchar(25) NOT NULL,
  `body` varchar(250) NOT NULL,
  `ttl_posts` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_ID`, `cat_ID`, `title`, `body`, `ttl_posts`) VALUES
(1, 1, 'Donald Trump', 'All things concerning the current President of the United States', 0),
(2, 1, 'Abortion', 'All things concerning preborn fetus\'', 0),
(3, 1, 'The First Amendment', 'All things concerning the right to free speech', 0),
(4, 1, 'The Second Amendment', 'All things concerning the right to bear arms', 0),
(5, 1, 'Transgenderism', 'All things concering transgenderism', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(4) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthdate` datetime NOT NULL,
  `ttl_posts` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `username`, `password`, `email`, `birthdate`, `ttl_posts`) VALUES
(1, 'Trechubet', 'lol123', 'tblevins1028@starkstate.net', '1997-10-28 00:00:00', 0),
(3, 'Donald Trump', 'dtrumpistheboss', '', '0000-00-00 00:00:00', NULL),
(4, 'root', 'root', '', '0000-00-00 00:00:00', NULL),
(5, 'new account', 'lol123', '', '0000-00-00 00:00:00', NULL),
(6, 'joanna', 'blevs', '', '0000-00-00 00:00:00', NULL),
(7, 'john', 'blevs', '', '0000-00-00 00:00:00', NULL),
(8, 'Nathan', 'cats3261', '', '0000-00-00 00:00:00', NULL),
(10, 'Jeremy', 'Kurtz', '', '0000-00-00 00:00:00', NULL),
(11, 'Thomas', 'lol123', '', '0000-00-00 00:00:00', NULL),
(12, 'Hannah', 'blevs', '', '0000-00-00 00:00:00', NULL),
(13, 'JeremyK', 'Kurtz', '', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_ID`),
  ADD UNIQUE KEY `post_ID` (`post_ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_ID`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_ID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_ID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_ID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
