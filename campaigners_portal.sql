-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 05:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET FOREIGN_KEY_CHECKS=0;
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
CREATE DATABASE IF NOT EXISTS `campaigners_portal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `campaigners_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--
-- Creation: Feb 06, 2021 at 04:04 AM
-- Last update: Feb 06, 2021 at 04:05 AM
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `committee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `name`, `description`, `committee_id`) VALUES
(1, 'xTrimy', 'sxxxxxxxxxxxx', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--
-- Creation: Feb 05, 2021 at 05:44 PM
-- Last update: Feb 05, 2021 at 05:47 PM
--

DROP TABLE IF EXISTS `committees`;
CREATE TABLE `committees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `name`) VALUES
(1, 'Personnel'),
(2, 'Media'),
(3, 'Coaching');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--
-- Creation: Feb 06, 2021 at 03:42 AM
-- Last update: Feb 06, 2021 at 03:51 AM
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `committee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `start_date`, `end_date`, `committee_id`) VALUES
(14, 'Test', 'This is an test event', '2021-02-06', '2021-02-06', 3),
(15, 'xxxxxxxxxx', 'xxxxxxxxxxxxxxxx', '2021-02-06', '2021-02-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--
-- Creation: Feb 05, 2021 at 05:44 PM
-- Last update: Feb 06, 2021 at 01:04 AM
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `university_id` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `committee_id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `university_id`, `phone`, `committee_id`, `position_id`, `password`, `image`) VALUES
(1, 'Mohamed Ashraf', 'Mohamed1812470@miuegypt.edu.eg', '2018/12470', '01156052920', 1, 1, '$2y$10$oLvOXXUge2Bhjc5iR6JtcuHFlvm.hnwxOK..Fiz8f/IPyEyPZYWD2', 'profile.png'),
(2, 'Test user', 'example@example.com', '2018/12471', '01156052921', 2, 1, '123456789', 'test.png');

-- --------------------------------------------------------

--
-- Table structure for table `member_login_tokens`
--
-- Creation: Jan 22, 2021 at 01:24 PM
-- Last update: Feb 06, 2021 at 04:16 AM
--

DROP TABLE IF EXISTS `member_login_tokens`;
CREATE TABLE `member_login_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_login_tokens`
--

INSERT INTO `member_login_tokens` (`id`, `token`, `user_id`) VALUES
(1, '188ab625a536ff8b68351b45725f1ca9dc57de87', 1),
(2, '408b7d690a4cf45fa45af748a760cb9634be4f0a', 1),
(6, '8145217b799b9196fcd5eeddb39322d91c06dc04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--
-- Creation: Feb 05, 2021 at 05:44 PM
-- Last update: Feb 05, 2021 at 05:47 PM
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(1, 'Head'),
(2, 'Co-Head');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--
-- Creation: Feb 06, 2021 at 12:35 AM
-- Last update: Feb 06, 2021 at 12:43 AM
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`) VALUES
(1, 'Humanities'),
(2, 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--
-- Creation: Feb 06, 2021 at 04:40 AM
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `committee_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `start_date`, `deadline`, `committee_id`, `member_id`) VALUES
(1, 'ssss', 'ddddddddd', '2021-01-16', '2021-01-22', 1, 1),
(2, 'xxxx', 'eeeeeeeeee', '2021-01-16', '2021-01-22', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--
-- Creation: Jan 30, 2021 at 12:26 PM
--

DROP TABLE IF EXISTS `trainees`;
CREATE TABLE `trainees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `university_id` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `school_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainee_login_tokens`
--
-- Creation: Jan 30, 2021 at 12:27 PM
--

DROP TABLE IF EXISTS `trainee_login_tokens`;
CREATE TABLE `trainee_login_tokens` (
  `id` int(11) NOT NULL,
  `trainee_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warnings`
--
-- Creation: Feb 04, 2021 at 10:55 PM
--

DROP TABLE IF EXISTS `warnings`;
CREATE TABLE `warnings` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `warndate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warnings`
--

INSERT INTO `warnings` (`id`, `member_id`, `reason`, `warndate`) VALUES
(1, 1, 'Testing', '2021-02-04'),
(2, 1, '>/!@#$%^&', '2021-02-04'),
(3, 1, 'sssssss', '2021-02-06');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_login_tokens`
--
ALTER TABLE `member_login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
