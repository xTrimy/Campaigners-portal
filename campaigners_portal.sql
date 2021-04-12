-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 08:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campaigners_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `committee_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `name`, `description`, `committee_id`, `is_deleted`) VALUES
(1, 'xTrimy', 'sxxxxxxxxxxxx', NULL, 0),
(6, 'Testing notifications', 'This is test announcement for notifications system', 2, 0),
(7, 'xTrimy', 'test', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `name`, `is_deleted`) VALUES
(1, 'Personnel', 0),
(2, 'Media', 0),
(3, 'Coaching', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `committee_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `start_date`, `end_date`, `committee_id`, `is_deleted`) VALUES
(14, 'Test', 'This is a test event', '2021-02-06', '2021-02-06', 3, 0),
(15, 'xxxxxxxxxx', 'xxxxxxxxxxxxxxxx', '2021-02-06', '2021-02-06', NULL, 0),
(16, 'Test', 'xxxxxxxxxxxxxxxxx', '2021-02-11', '2021-02-13', NULL, 0),
(17, 'xTrimy', '22222222222222222222', '2021-04-04', '2021-04-06', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sent_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `sender_id`, `receiver_id`, `sent_date`, `is_deleted`) VALUES
(8, 1, 2, '2021-02-11 08:54:57', 1),
(9, 1, 2, '2021-02-11 09:04:16', 1),
(10, 2, 1, '2021-02-11 09:04:26', 1),
(11, 1, 2, '2021-02-11 09:04:34', 1),
(12, 1, 2, '2021-02-11 09:21:52', 1),
(13, 1, 2, '2021-02-11 09:21:59', 1),
(14, 2, 1, '2021-02-11 09:22:02', 1),
(15, 1, 2, '2021-02-11 09:22:05', 1),
(16, 1, 2, '2021-02-11 09:38:33', 1),
(17, 1, 2, '2021-02-11 09:42:53', 1),
(18, 1, 2, '2021-02-11 09:44:57', 1),
(19, 1, 2, '2021-02-11 09:45:29', 1),
(20, 1, 2, '2021-02-11 09:46:32', 1),
(21, 1, 2, '2021-02-11 09:46:35', 1),
(22, 1, 2, '2021-02-11 09:46:37', 1),
(23, 1, 2, '2021-02-11 09:46:38', 1),
(24, 1, 2, '2021-02-11 09:46:41', 1),
(25, 1, 2, '2021-02-11 09:46:58', 1),
(26, 1, 2, '2021-02-11 09:47:12', 1),
(27, 1, 2, '2021-02-11 09:48:03', 1),
(28, 1, 2, '2021-02-11 09:48:05', 1),
(29, 1, 2, '2021-02-11 09:48:13', 1),
(30, 1, 2, '2021-02-11 11:07:59', 1),
(31, 1, 2, '2021-02-11 11:08:10', 1),
(32, 1, 2, '2021-02-11 13:15:43', 1),
(33, 1, 2, '2021-02-11 13:17:11', 1),
(34, 1, 2, '2021-02-11 13:17:14', 1),
(35, 1, 2, '2021-02-11 13:17:18', 1),
(36, 1, 2, '2021-02-11 13:17:19', 1),
(37, 1, 2, '2021-02-11 13:17:20', 1),
(38, 1, 2, '2021-02-11 13:17:20', 1),
(39, 1, 2, '2021-02-11 13:17:27', 1),
(40, 1, 2, '2021-02-11 13:17:29', 1),
(41, 1, 2, '2021-02-11 13:17:30', 1),
(42, 1, 2, '2021-02-11 13:17:31', 1),
(43, 1, 2, '2021-02-11 13:17:32', 1),
(44, 1, 2, '2021-02-11 13:17:32', 1),
(45, 1, 2, '2021-02-11 13:17:32', 1),
(46, 1, 2, '2021-02-11 13:17:33', 1),
(47, 1, 2, '2021-02-11 13:17:34', 1),
(48, 1, 2, '2021-02-11 13:17:35', 1),
(49, 1, 2, '2021-02-11 13:17:36', 1),
(50, 1, 2, '2021-02-11 13:17:43', 1),
(51, 1, 2, '2021-02-11 13:17:44', 1),
(52, 1, 2, '2021-02-11 13:17:45', 1),
(53, 1, 2, '2021-02-11 13:20:02', 1),
(54, 1, 2, '2021-02-11 13:20:10', 1),
(55, 1, 2, '2021-02-11 13:20:16', 1),
(56, 1, 2, '2021-02-11 13:20:19', 1),
(57, 1, 2, '2021-02-11 13:20:20', 1),
(58, 1, 2, '2021-02-14 13:05:11', 1),
(59, 1, 2, '2021-02-14 13:21:52', 1),
(60, 1, 2, '2021-02-14 13:21:52', 1),
(61, 1, 2, '2021-02-14 13:21:52', 1),
(62, 1, 2, '2021-02-14 13:21:53', 1),
(63, 1, 2, '2021-02-14 13:21:55', 1),
(64, 1, 2, '2021-02-14 13:21:55', 1),
(65, 1, 2, '2021-02-14 13:21:56', 1),
(66, 1, 2, '2021-02-14 13:21:56', 1),
(67, 1, 2, '2021-02-15 08:20:34', 1),
(68, 2, 1, '2021-02-15 08:21:10', 1),
(69, 2, 1, '2021-02-15 08:22:37', 1),
(70, 2, 1, '2021-04-03 18:42:31', 1),
(71, 2, 1, '2021-04-04 12:31:54', 1),
(72, 2, 1, '2021-04-04 13:06:20', 1),
(73, 2, 1, '2021-04-04 16:04:33', 1),
(74, 2, 1, '2021-04-04 16:04:51', 1),
(75, 2, 1, '2021-04-04 16:04:52', 1),
(76, 2, 1, '2021-04-04 16:04:56', 1),
(77, 2, 1, '2021-04-04 16:04:59', 1),
(78, 2, 1, '2021-04-04 16:05:00', 1),
(79, 2, 1, '2021-04-04 16:05:03', 1),
(80, 2, 1, '2021-04-04 16:05:41', 1),
(81, 2, 1, '2021-04-04 16:05:51', 1),
(82, 2, 1, '2021-04-04 16:06:18', 1),
(83, 2, 1, '2021-04-04 16:06:36', 1),
(84, 2, 1, '2021-04-04 20:31:25', 1),
(85, 2, 1, '2021-04-05 16:21:51', 0),
(86, 1, 2, '2021-04-05 16:22:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `university_id` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `committee_id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `bio` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `university_id`, `phone`, `committee_id`, `position_id`, `password`, `image`, `bio`, `birthdate`, `nickname`, `is_deleted`) VALUES
(1, 'Mohamed Ashraf', 'Mohamed1812470@miuegypt.edu.eg', '2018/12470', '01156052920', 1, 2, '$2y$10$oLvOXXUge2Bhjc5iR6JtcuHFlvm.hnwxOK..Fiz8f/IPyEyPZYWD2', '1613369750-tenor.gif', 'xxxxxxxxxxxxxxxxxxxxxxx', '1999-08-08', 'xTrimy', 0),
(2, 'Test user', 'example@example.com', '2018/12471', '01156052920', 2, 1, '$2y$10$oLvOXXUge2Bhjc5iR6JtcuHFlvm.hnwxOK..Fiz8f/IPyEyPZYWD2', 'giphy.gif', '', '1999-08-08', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_login_tokens`
--

CREATE TABLE `member_login_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_login_tokens`
--

INSERT INTO `member_login_tokens` (`id`, `token`, `user_id`, `is_deleted`) VALUES
(1, '188ab625a536ff8b68351b45725f1ca9dc57de87', 1, 0),
(2, '408b7d690a4cf45fa45af748a760cb9634be4f0a', 1, 0),
(8, '4138a57f5420db230637835d4809177afea34264', 1, 0),
(10, '4dabcd4142a8222ac480c34d43d91bd7fb4c84ba', 1, 0),
(12, '071c71e35bfefd9ad39d332bd2ac8fc7bfed0589', 1, 0),
(14, 'd42cf5b0eeb5469588fcec96945d6e37bcf3b103', 1, 0),
(16, '28c3aba5bcab90be3fc20e3e4caa1463120763be', 1, 0),
(18, '4074745a04d7d65f717fe25b083124f065da36b7', 1, 0),
(20, '4a3192d2c596bba94e2e80151ea9aceb3c70127c', 1, 0),
(23, 'd765a76392b2c5303d6d11b9f5236f03a0b950e4', 1, 0),
(24, '0561c816fde5de1b8af7a127cc5b14252a7bf4fa', 1, 0),
(26, 'e7c19c62ac2a3b9e0cf00a4e089e162c0378c910', 1, 0),
(27, '0fe02f64f0cb821bb665a457979991da63b8356b', 1, 0),
(30, '0a43bcb9b5ab4934f91755bfb465d439140a453c', 1, 0),
(32, '289b9332bcad3e0fad84fae8a21eddac1497743a', 1, 0),
(34, 'f0635708bf2084e2e312e1c63a3141f7596122f0', 1, 0),
(36, '3b39c5b3a002cb81602002319041530770ab48a7', 1, 0),
(37, 'e41509c9ae80eb40a617e9c8b9f4752a6d5fb96d', 1, 0),
(39, '620836b4c4b83292922ca20bafbf781312fc5adc', 2, 0),
(44, 'a98a70a8b9b65ce0c237c2cbfd890a20b892464b', 2, 0),
(45, '7d705e35ece4cadc349f5da8226b8ec64e80cd0b', 2, 0),
(46, '73818fc85c58f4e0eeca6b02a5e8ebdf4ebfc4a6', 2, 0),
(47, '5b7e93922c4cec2fce99a5fa46b3480b660630b3', 2, 0),
(48, 'eaa0d47ff35129c0afacedeb2930afd64bac0bb7', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `committee_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `unread` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(255) NOT NULL DEFAULT '',
  `parameters` text NOT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `recipient_id`, `committee_id`, `sender_id`, `unread`, `type`, `parameters`, `reference_id`, `created_at`, `is_deleted`) VALUES
(1, NULL, 99, NULL, 1, 'test.notification', 'This is a reminder', NULL, '2021-04-04 15:20:12', 0),
(2, NULL, 99, NULL, 1, 'test.notification', 'This is a reminder', NULL, '2021-04-04 15:21:10', 0),
(3, 2, 2, NULL, 1, '', 'This is a reminder', '2021-02-12', '2021-04-04 15:21:22', 0),
(4, NULL, 99, NULL, 1, 'test.notification', 'This is a reminder', NULL, '2021-04-04 15:22:38', 0),
(5, NULL, 99, NULL, 1, 'test.notification', 'This is a reminder', NULL, '2021-04-04 15:23:15', 0),
(6, NULL, 2, NULL, 1, 'announcement.committee', 'Testing notifications', '6', '2021-04-04 15:51:59', 0),
(7, 1, NULL, 2, 0, 'warning.default', 'Testing notifications system for warnings', '4', '2021-04-04 15:58:34', 0),
(8, 1, NULL, 2, 1, 'friend.request', 'You\'ve a new friend request!', '2', '2021-04-04 16:05:41', 1),
(9, 1, NULL, 2, 1, 'friend.request', 'You\'ve a new friend request!', '2', '2021-04-04 16:05:51', 1),
(10, 1, NULL, 2, 1, 'friend.request', 'You\'ve a new friend request!', '2', '2021-04-04 16:06:18', 1),
(11, 2, NULL, 1, 1, 'friend.request', '', '1', '2021-04-04 16:06:36', 0),
(12, 1, NULL, 2, 0, 'warning.default', 'Testing', '1', '2021-04-04 20:07:44', 0),
(13, 1, NULL, 2, 0, 'points.default', 'Testing', NULL, '2021-04-04 20:09:08', 0),
(14, NULL, 2, NULL, 1, 'event.committee', 'xTrimy', '2021-04-04', '2021-04-04 20:24:23', 0),
(15, 1, NULL, 2, 1, '', '', '2', '2021-04-04 20:31:25', 1),
(16, 1, NULL, 2, 0, 'friend.request', '', '2', '2021-04-05 16:21:51', 0),
(17, 2, NULL, 1, 0, 'friend.accept', '', '1', '2021-04-05 16:22:41', 0),
(18, 1, NULL, 1, 0, 'tasks.assign', 'ssss', '1', '2021-04-06 20:21:01', 0),
(19, NULL, NULL, NULL, 1, 'announcement.public', 'xTrimy', '7', '2021-04-06 20:29:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point` int(4) NOT NULL,
  `reason` text NOT NULL,
  `_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `point`, `reason`, `_date`, `is_deleted`) VALUES
(3, 2, 600, '', '2021-04-03 18:35:21', 0),
(4, 1, 500, 'Testing', '2021-04-04 20:07:43', 0),
(5, 1, 500, 'Testing', '2021-04-04 20:09:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `is_deleted`) VALUES
(1, 'Head', 0),
(2, 'Co-Head', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `is_deleted`) VALUES
(1, 'Humanities', 0),
(2, 'Psychology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `committee_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `is_finished` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `start_date`, `deadline`, `committee_id`, `member_id`, `is_finished`, `is_deleted`) VALUES
(1, 'ssss', 'ddddddddd', '2021-01-16', '2021-01-22', 1, 1, 1, 0),
(2, 'xxxx', 'eeeeeeeeee', '2021-01-16', '2021-01-22', 1, 1, 1, 0),
(3, 'xx', 'xxxxxxxxxxxxxxxxxx', '2021-02-17', '2021-02-17', 2, NULL, 0, 0),
(4, 'xTrimy', 'ddddddddd', '2021-04-09', '2021-04-09', 2, 2, 1, 0),
(5, 'xTrimy', 'ddddddddd', '2021-04-09', '2021-04-09', 2, 2, 0, 0),
(6, 'xTrimy', 'ddddddddd', '2021-04-09', '2021-04-09', 2, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE `trainees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `university_id` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `school_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainee_login_tokens`
--

CREATE TABLE `trainee_login_tokens` (
  `id` int(11) NOT NULL,
  `trainee_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warnings`
--

CREATE TABLE `warnings` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `warndate` date NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warnings`
--

INSERT INTO `warnings` (`id`, `member_id`, `reason`, `warndate`, `is_deleted`) VALUES
(1, 1, 'Testing', '2021-02-04', 0),
(2, 1, '>/!@#$%^&', '2021-02-04', 0),
(3, 1, 'sssssss', '2021-02-06', 0),
(4, 1, 'Testing notifications system for warnings', '2021-04-04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_id` (`committee_id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_id` (`committee_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_id` (`committee_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `member_login_tokens`
--
ALTER TABLE `member_login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `committee_id` (`committee_id`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `trainee_login_tokens`
--
ALTER TABLE `trainee_login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainee_id` (`trainee_id`);

--
-- Indexes for table `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_login_tokens`
--
ALTER TABLE `member_login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainees`
--
ALTER TABLE `trainees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainee_login_tokens`
--
ALTER TABLE `trainee_login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

--
-- Constraints for table `member_login_tokens`
--
ALTER TABLE `member_login_tokens`
  ADD CONSTRAINT `member_login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`);

--
-- Constraints for table `trainees`
--
ALTER TABLE `trainees`
  ADD CONSTRAINT `trainees_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `trainee_login_tokens`
--
ALTER TABLE `trainee_login_tokens`
  ADD CONSTRAINT `trainee_login_tokens_ibfk_1` FOREIGN KEY (`trainee_id`) REFERENCES `trainees` (`id`);

--
-- Constraints for table `warnings`
--
ALTER TABLE `warnings`
  ADD CONSTRAINT `warnings_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
