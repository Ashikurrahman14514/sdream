-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2019 at 11:15 PM
-- Server version: 10.2.22-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashikshe_shetu`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_auther` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `post_id`, `user_id`, `comment`, `comment_auther`, `date`) VALUES
(27, 100, 16, 'dsajf jl;jfadsjl ', 'Ashikur Rahman', '2019-02-16 19:21:28'),
(28, 100, 16, 'Nice', 'Ashikur Rahman', '2019-02-19 06:11:46'),
(29, 101, 16, 'mama proooooooooo', 'Reonal Nasir', '2019-03-16 15:16:26'),
(30, 103, 16, 'Ostir', 'Habibur Rahman', '2019-03-18 08:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_like` int(11) DEFAULT NULL,
  `user_unlike` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`like_id`, `user_id`, `post_id`, `user_like`, `user_unlike`) VALUES
(29, 16, 96, 1, NULL),
(28, 12, 6, 1, NULL),
(27, 12, 6, 1, NULL),
(26, 16, 100, 1, NULL),
(30, 16, 97, 1, NULL),
(31, 44, 101, 1, NULL),
(32, 62, 103, 10, NULL),
(33, 16, 102, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `send_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reply` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`m_id`, `sender_id`, `receiver_id`, `message`, `status`, `send_time`, `reply`) VALUES
(1, 44, 16, 'asfsaf', 'unread', '2019-02-25 10:31:20', 'no_reply'),
(2, 44, 16, 'asfsaf', 'unread', '2019-02-25 10:40:55', 'no_reply'),
(3, 16, 16, ' hello ashik .how are you?', 'unread', '2019-02-28 19:58:40', 'no_reply'),
(4, 16, 16, ' hello ashik .how are you?', 'unread', '2019-02-28 20:03:42', 'no_reply'),
(5, 16, 16, ' hello ashik .how are you?', 'unread', '2019-02-28 20:04:41', 'no_reply'),
(6, 44, 16, 'hi', 'unread', '2019-02-28 20:18:40', 'no_reply'),
(7, 16, 44, 'mama net problam cilao.', 'unread', '2019-03-16 15:17:28', 'no_reply'),
(8, 16, 44, 'Sabas', 'unread', '2019-03-16 16:16:00', 'no_reply'),
(9, 62, 16, 'ahooooo..... vatija....', 'unread', '2019-03-18 05:17:11', 'no_reply'),
(10, 16, 62, 'patkate akon ni', 'unread', '2019-03-18 08:47:31', 'no_reply');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_village` varchar(100) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_country` varchar(200) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `display` varchar(10) NOT NULL,
  `post_position` int(11) NOT NULL,
  `post_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `user_village`, `user_city`, `user_country`, `post_title`, `post_content`, `post_date`, `display`, `post_position`, `post_image`) VALUES
(100, 16, 'Boalmari', 'faridpur', 'Bangladesh', 'Articles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systems', 'Articles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systemsArticles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systemsArticles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systemsArticles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systemsArticles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systemsArticles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systemsArticles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systemsArticles are usually categorized as either definite or indefinite.[4] A few languages with well-developed systems', '2019-02-16 19:19:48', 'yes', 1, '5c6862546f90c4.12177415.jpg'),
(101, 44, 'Boalmari', 'Faridpur ', 'Bangladesh', 'I am prooo', 'I am tha prooo', '2019-03-16 15:06:29', 'yes', 1, '5c8d10f51e9f40.75088454.jpg'),
(102, 16, 'boalmari', 'Faridpur', 'Bangladesh', '', '', '2019-03-16 15:20:21', 'yes', 1, '5c8d1435d0e2f6.72670266.jpg'),
(103, 62, 'Boalmari', 'Faridpur', 'Bangladesh', 'Ami r Amate', 'Hmmmmm......pore hobe ðŸ˜€ðŸ˜', '2019-03-18 05:14:28', 'yes', 2, '5c8f2934e46ef2.90610792.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `birthday` text NOT NULL,
  `gender` text NOT NULL,
  `status` text NOT NULL,
  `ver_code` int(100) NOT NULL,
  `posts` text NOT NULL,
  `image` text NOT NULL,
  `reg_date` text NOT NULL,
  `last_login` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `country`, `city`, `village`, `birthday`, `gender`, `status`, `ver_code`, `posts`, `image`, `reg_date`, `last_login`) VALUES
(16, 'Ashikur', 'Rahman', 'ashikurrahman14514@gmail.com', '123456', 'Bangladesh', 'Faridpur', 'boalmari', '2018-10-22', 'Male', 'verifide', 64646655, 'yes', '5c686552cd8070.57437227.jpg', '2018-11-18 01:03:58', '2018-11-18 14:09:17'),
(44, 'Reonal', 'Nasir', 'mdnasirjamser@gmail.com', '01988391142', 'Bangladesh', 'Faridpur ', 'Boalmari', '2019-09-20', 'Male', 'verifide', 33150620, 'yes', 'defeult.jpg', '2019-02-16 15:12:56', '2019-02-16 15:12:56'),
(62, 'Habibur', 'Rahman', 'h33555761@gmail.com', '4224287', 'Bangladesh', 'Faridpur', 'Boalmari', '1997-11-09', 'Male', 'verifide', 376468898, 'yes', '5c8f299484ee61.86432569.jpg', '2019-03-11 23:23:43', '2019-03-11 23:23:43'),
(64, 'Gk', 'gh', 'khan.srabon26@gmail.com', '12345678', 'Bangladesh', 'Faridpur ', 'Boalmary ', '1995-03-13', 'Male', 'verifide', 678805703, 'yes', 'defeult.jpg', '2019-03-13 11:29:56', '2019-03-13 11:29:56'),
(67, 'Abdullah', 'Mamun', 'mamun102205@gmail.com', '146060', 'Bangladesh', 'Dhaka', 'Boalmari', '2002-11-15', 'Male', 'verifide', 595076915, 'yes', 'defeult.jpg', '2019-03-17 09:34:29', '2019-03-17 09:34:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
