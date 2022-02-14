-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 04:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `approved` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_by`, `created_date`, `approved`) VALUES
(1, 'po=st title uuuu', 'What else I can do for getting result or what I doing wrong? I need the assoc array from DB looking lik\r\nGGGGGGGGGGGGGGGGGGGGGGGGGG\r\nWhat else I can do for getting result or what I doing wrong? I need the assoc array from DB looking lik\r\nLLLLLLLLLLLLLLLLLLLLLLLLLLL\r\nWhat else I can do for getting result or what I doing wrong? I need the assoc array from DB looking lik\r\nPPPPPPPPPPPPPPPPPPPPPP\r\nWhat else I can do for getting result or what I doing wrong? I need the assoc array from DB looking lik		', 2, '2017-03-13 00:00:00', '0'),
(2, 'title upfated', ' ', 2, '2017-03-13 00:00:00', '1'),
(3, 'title 1', 'thid is thje content \r\n1111111111111111\r\n22222222222222\r\n333333333333333 ', 1, '2017-03-13 00:00:00', '1'),
(4, 'post created by user1234', ' this is post content', 2, '2017-03-15 16:18:31', '0'),
(5, 'title of my post', ' user123 content of post', 2, '2017-03-15 16:54:24', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `fname`, `lname`, `mobile`, `role`, `address`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Sujata', 'Mali', '9372883361', 0, 'kajgaon tal bhadgaon', 'ssmali.kaj@gmail.com'),
(2, 'user1234', 'b5b73fae0d87d8b4e2573105f8fbe7bc', 'Sangitaupdated', 'Patil', '1234567890', 1, 'tamaswadi tal parola address updated', 'vaneshmaliupdatted@gmail.com'),
(3, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', 'aaa', '111111111', 1, 'hhhh', 'aaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
