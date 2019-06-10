-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 09:21 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `interest_id` int(11) NOT NULL,
  `interest_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`interest_id`, `interest_name`) VALUES
(1, 'Dogs'),
(2, 'Cats'),
(3, 'Travelling'),
(4, 'Music'),
(5, 'Food'),
(6, 'Dance'),
(7, 'Gym'),
(8, 'Art');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `send_id` int(100) NOT NULL,
  `rec_id` int(100) NOT NULL,
  `send_name` varchar(100) NOT NULL,
  `rec_name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `send_id`, `rec_id`, `send_name`, `rec_name`, `message`, `time`) VALUES
(28, 1, 1, 'fgf', 'gg', 'sg', '2019-05-28 17:43:52'),
(29, 11, 10, 'Vilas Lad', 'Rohit ', 'HIII', '2019-06-10 15:56:56'),
(30, 10, 11, 'Rohit ', 'Vilas Lad', 'hello', '2019-06-10 15:58:09'),
(31, 10, 11, 'Rohit ', 'Vilas Lad', 'how are you?', '2019-06-10 15:58:28'),
(32, 10, 11, 'Rohit ', 'Vilas Lad', 'Hi dad', '2019-06-10 17:42:19'),
(33, 10, 11, 'Rohit  Lad', 'Vilas Lad', 'i got job', '2019-06-10 18:00:24'),
(34, 10, 11, 'Rohit  Lad', 'Vilas Lad', 'test', '2019-06-10 18:02:44'),
(35, 10, 11, 'Rohit  Lad', 'Vilas Lad', 'testing', '2019-06-10 18:05:07'),
(36, 10, 11, 'Rohit  Lad', 'Vilas Lad', 'testin 2', '2019-06-10 18:14:12'),
(37, 10, 11, 'Rohit  Lad', 'Vilas Lad', 'testing3', '2019-06-10 19:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `user_name`, `topic_id`, `post_title`, `post_content`, `post_date`) VALUES
(25, 10, 'Rohit Lad', 2, 'CWC2019', 'watching India vs Bang', '2019-05-28'),
(26, 10, 'Rohit ', 1, 'cwc2019', 'India trashed Aussies', '2019-06-10'),
(28, 11, 'Vilas', 3, 'PHP7', 'slowly and steadily i am becoming master in php', '2019-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_title`) VALUES
(1, 'News'),
(2, 'Fun'),
(3, 'Science'),
(4, 'Politics');

-- --------------------------------------------------------

--
-- Table structure for table `userinterest`
--

CREATE TABLE `userinterest` (
  `id` int(11) NOT NULL,
  `interest_id` int(100) NOT NULL,
  `interest_name` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `u_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinterest`
--

INSERT INTO `userinterest` (`id`, `interest_id`, `interest_name`, `user_id`, `u_name`) VALUES
(30, 5, 'Food', 10, 'Rohit '),
(31, 7, 'Gym', 10, 'Rohit '),
(33, 5, 'Food', 11, 'Vilas Lad'),
(34, 8, 'Art', 11, 'Vilas Lad'),
(35, 3, 'Travelling', 11, 'Vilas Lad'),
(39, 3, 'Travelling', 10, 'Rohit  Lad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_b_day` date NOT NULL,
  `user_image` text NOT NULL,
  `register_date` date NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_b_day`, `user_image`, `register_date`, `last_login`, `status`, `posts`) VALUES
(10, 'Rohit  Lad', '123456', 'r@g.com', 'India', 'Male', '2019-05-02', 'avatar.png', '2019-05-28', '2019-06-10 19:17:34', 'unverified', 'yes'),
(11, 'Vilas Lad', '123', 'v@g.com', 'USA', 'Male', '1966-09-10', 'avatar2.png', '2019-06-10', '2019-06-10 18:30:18', 'unverified', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `userinterest`
--
ALTER TABLE `userinterest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userinterest`
--
ALTER TABLE `userinterest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
