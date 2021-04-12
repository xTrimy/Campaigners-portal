-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 11:57 PM
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
(3, 'Coaching', 0),
(4, 'Headmasters', 0),
(5, 'Coordination', 0),
(6, 'Fundraising', 0),
(7, 'PR', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coordination_booth_bank`
--

CREATE TABLE `coordination_booth_bank` (
  `id` int(11) NOT NULL,
  `_date` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `description` varchar(511) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coordination_booth_bank_images`
--

CREATE TABLE `coordination_booth_bank_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `external_contacts`
--

CREATE TABLE `external_contacts` (
  `id` int(11) NOT NULL,
  `committee_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `feedback` text DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `external_resources`
--

CREATE TABLE `external_resources` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(511) NOT NULL,
  `committee_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `feedback` text NOT NULL,
  `member_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(86, 1, 2, '2021-04-05 16:22:40', 0),
(87, 2, 255, '2021-04-12 22:41:27', 1);

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
  `initial_password` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `bio` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `university_id`, `phone`, `committee_id`, `position_id`, `password`, `initial_password`, `image`, `bio`, `birthdate`, `nickname`, `is_deleted`) VALUES
(1, 'Mohamed Ashraf', 'Mohamed1812470@miuegypt.edu.eg', '2018/12470', '01156052920', 1, 3, '$2y$10$AMjJ00NWMj4Qtx0.dmLBfO32/npUDD61ZwG.QWjSnGNV6eXda56zW', 'mDV2vPWVR', '1613369750-tenor.gif', 'xxxxxxxxxxxxxxxxxxxxxxx', '1999-08-08', 'xTrimy', 0),
(2, 'Test User', 'Mohamed1812470@miuegypt.edu.eg', '2018/12470', '', 2, 1, '$2y$10$sJ.tCEVKRR5Pt55HErORROvipX146SlYwlnqi2vKiy40sOAGbApvG', 's76ztvpGK', 'giphy.gif', '', '1999-08-08', '1', 0),
(185, 'malak', 'malak1907323@miuegypt.edu.eg', '', '1552149400', 3, 1, '$2y$10$8x/VIXnQJlQw/KtML69ER.0PFWW11jAWqG9my2Wfj.XZpkJ8zW1AG', 'bG3mrpcvJ', 'default.jpg', '', '1999-01-01', '', 0),
(186, 'Marwan', 'Marwan1906774@miuegypt.edu.eg', '', '1013227066', 3, 1, '$2y$10$C4ZPqkm4hPE1gblQNUxvlO8H35GfnYZJevwNHv0jJVewDCZktz4Nm', 'FpNgmGb3X', 'default.jpg', '', '1999-01-01', '', 0),
(187, 'nada', 'nada1803299@miuegypt.edu.eg', '', '1115537210', 3, 1, '$2y$10$bsm71r3m2JSytNetsYR8/.uW3i.EYdA2a4WP4iHtm5kOWoocQPhAq', 'Bg3tSnK5p', 'default.jpg', '', '1999-01-01', '', 0),
(188, 'nada', 'nada1902023@miuegypt.edu.eh', '', '1114259408', 3, 1, '$2y$10$5CHxXPyGNTazqtyJAP1IXup2zUk1g4XzNeBfCsbZdYS0Lf7K/VGqC', 'VeVE7brVA', 'default.jpg', '', '1999-01-01', '', 0),
(189, 'nouran', 'nouran1707383@miuegypt.edu.eg', '', '1020829041', 3, 1, '$2y$10$/d9r8R2up2P/JBF3irfsWeSwt34xqhkxhsKcN6N9STv/zWI0A1tTK', 'phEh8Krr8', 'default.jpg', '', '1999-01-01', '', 0),
(190, 'nouran', 'nouran1800955@miuegypt.edu.eg', '', '1000851105', 3, 1, '$2y$10$CCzJyqAHGzz8FosYr89MMepdn3pfPUpynBKsShh2hiMd10IXO7Je6', '95gbzDQEE', 'default.jpg', '', '1999-01-01', '', 0),
(191, 'abdullah', 'abdullah1900075@miuegypt.edu.eg', '', '1113265444', 5, 1, '$2y$10$BQJA27GVIi2DcHDXebO87ugsP94BM5RVkHyAQu2mr.4QwD7BtlMq6', 'mBS9Mpwb9', 'default.jpg', '', '1999-01-01', '', 0),
(192, 'aly', 'aly1703228@miuegypt.edu.eg', '', '1201685005', 5, 1, '$2y$10$fi6TbakaGtaC38AYk93dQeyzjMLRIlhc219T60CCSnmFL/cNjImF6', 'RbFqKA7aG', 'default.jpg', '', '1999-01-01', '', 0),
(193, 'aly', 'aly1711794@miuegypt.edu.eg', '', '1141635500', 5, 1, '$2y$10$SIzVRr31edgdUgFG3PESie2BDa8FadZzq8H2ypFIlMhCFF/Fbe5se', 'wnxw6PgJc', 'default.jpg', '', '1999-01-01', '', 0),
(194, 'aly', 'aly1810395@miuegypt.edu.eg', '', '1110242709', 5, 1, '$2y$10$AXoUsrY1R.KkFgpR5oXbKeIoD7B.Uifsl9SLHTGUoCF8vFYaFBfJi', 'WqsExj8vK', 'default.jpg', '', '1999-01-01', '', 0),
(195, 'asser', 'asser1706602@miuegypt.edu.eg', '', '1011181851', 5, 1, '$2y$10$muxOR1.cMSVbm7WrHmOiLuk6bihR8gPC55FsKtaK/XyuJOJLO/456', '8BYfHqvUb', 'default.jpg', '', '1999-01-01', '', 0),
(196, 'carol', 'carol1801617@miuegypt.edu.eg', '', '1150633336', 5, 1, '$2y$10$ybQ2nFfJucf9lvnwVmORqeh3XNyi6Zla.cuje8lry/WP0PpCdE4wS', 'QGyv6J3Tf', 'default.jpg', '', '1999-01-01', '', 0),
(197, 'engy', 'engy1800390@miuegypt.edu.eg', '', '1008487451', 5, 1, '$2y$10$r2shmzM9IZiqBdZGhq3lUe5EVUXecm22opoqgXL94SqAZPtFs8GtC', 'Ka8mEQ99T', 'default.jpg', '', '1999-01-01', '', 0),
(198, 'farah', 'farah1801666@miuegypt.edu.eg', '', '1007485456', 5, 1, '$2y$10$Nr5lPMrUSCrQECDS60YKauaugT/vEEMgYvC3Pi.8GTIphTvLMXlta', '2kmBxNkWN', 'default.jpg', '', '1999-01-01', '', 0),
(199, 'hatem', 'hatem1901377@miuegypt.edu.eg', '', '1117844861', 5, 1, '$2y$10$3TFgFE7lobOEx8uN/P.Wy.moO8PF.1r.RGHATSaOzyt54g.Lj3LYe', 'J2Vk8vFmj', 'default.jpg', '', '1999-01-01', '', 0),
(200, 'haya', 'haya1800953@miuegypt.edu.eg', '', '1287563729', 5, 1, '$2y$10$uDfEZh.CNMTWcYlFaI9a.e76PO5MQtPHwrDf3s2v5Llx6AlxGZejK', 'YZB7ks6Mr', 'default.jpg', '', '1999-01-01', '', 0),
(201, 'haya ', 'haya2006142@miuegypt.edu.eg', '', '1009671335', 5, 1, '$2y$10$rDJ/wfJfaiBX1Eoa95sdtOg83EocXPHoREZ3fyrVMCWCVeIzBVGI2', 'hp7vkQZAh', 'default.jpg', '', '1999-01-01', '', 0),
(202, 'kareem', 'kareem1707433@miuegypt.edu.eg', '', '1288908341', 5, 1, '$2y$10$N2IR1F67JlzmpTFAUvcQ7uDbsXedZwOfjDI15eJ3K4/RhPcUqgpWi', '8aHT9hc7S', 'default.jpg', '', '1999-01-01', '', 0),
(203, 'linda', 'linda1905068@miuegypt.edu.eg', '', '1200703660', 5, 1, '$2y$10$ukYe59YIHL9N.cnHGkMgAOBOK/slwiCwSb15gzvZ4Avsbny4S12RW', 'CGdrC7ahF', 'default.jpg', '', '1999-01-01', '', 0),
(204, 'Malak', 'Malak1901188@miuegypt.edu.eg', '', '1154466683', 5, 1, '$2y$10$iT8bJREgV5jWo8lFXCa8tOSD76DfCVYRyEy8J1ecwAJzZuQmtU.pK', 'ab5N3gZNZ', 'default.jpg', '', '1999-01-01', '', 0),
(205, 'malak ', 'malak2003619@miuegypt.edu.eg', '', '1111103561', 5, 1, '$2y$10$LcVwg5n1SG3TzwcEw8ii/.egVJD2y5UHIOplfc/52mevjHqkX.GlC', '3MAtb6ZRU', 'default.jpg', '', '1999-01-01', '', 0),
(206, 'marwan', 'marwan1803408@miuegypt.edu.eg', '', '1141469591', 5, 1, '$2y$10$R/TV8tt8nhpqFYuANqXyYepQ2RtRD88DoYVYIeXXvG30O00.nwVU2', '8rBsT2PMj', 'default.jpg', '', '1999-01-01', '', 0),
(207, 'merna ', 'merna2004291@miuegypt.edu.eg', '', '1023323321', 5, 1, '$2y$10$LT6jwJRPhvYYOrBGjEukAelr3Yzuc7x/Lsq4EetfX11ZkBE1FtYXO', '9XnUNM53h', 'default.jpg', '', '1999-01-01', '', 0),
(208, 'mirna', 'mirna1702235@miuegypt.edu.eg', '', '1115325756', 5, 1, '$2y$10$UiKcfY5AlxmcgI5BChdVBu49TsSU1Z3FlDEblmjH/gt/TiJSbvr8O', 'PgDgfG5fT', 'default.jpg', '', '1999-01-01', '', 0),
(209, 'mohamed', 'mohamed1801810@miuegypt.edu.eg', '', '1007109752', 5, 1, '$2y$10$dcjCOfGPHO8zCFNdL36DPu3J559KoSeO1G/ds6WCOJwxbrWNsfn.O', 'HjEPyC4rS', 'default.jpg', '', '1999-01-01', '', 0),
(210, 'Mohamed20', 'Mohamed2011437@miuegypt.edu.eg', '', '1122295541', 5, 1, '$2y$10$D5EWJSshM3JImNepu3OXZ.AiSik/6WM5IyUTMEMyacgDbp97Vn/yu', 'HKAzGE9S9', 'default.jpg', '', '1999-01-01', '', 0),
(211, 'norhan', 'norhan1601674@miuegypt.edu.eg', '', '1062220473', 5, 1, '$2y$10$ruFByt5Njkme3ZqSysP4cefZ6FRkzz4IFfMLLJ5f/V/ntv7zpWduu', 'kaTqPjJ4h', 'default.jpg', '', '1999-01-01', '', 0),
(212, 'nourallah', 'nourallah1710203@miuegypt.edu.eg', '', '1113700964', 5, 1, '$2y$10$H8OVOSBVPFVoCg.UEo.aYuU.wG/jmPsvnM21PjmLs.Eg4X8nRmOoa', 'zGUp3uN7j', 'default.jpg', '', '1999-01-01', '', 0),
(213, 'ranem', 'ranem1601545@miuegypt.edu.eg', '', '1221160165', 5, 1, '$2y$10$OwuGrIXLnPTuOUZ7zOCfTuswMepbgc8AfWo1a/IV12xLI53Y1nP6m', 'fuu5B3ycE', 'default.jpg', '', '1999-01-01', '', 0),
(214, 'salsabeel', 'salsabeel1900125@miuegypt.edu.eg', '', '1124613000', 5, 1, '$2y$10$tBmgPbjQSvwfjlSCgRq8Nez/xgA0BKBtq/Xi/h7s5leGvoPWBIYyG', '8A2hPsxQb', 'default.jpg', '', '1999-01-01', '', 0),
(215, 'youssef', 'youssef1605272@miuegypt.edu.eg', '', '1014469728', 5, 1, '$2y$10$sSzPF077xlwvNMk2MLJ.Kue7GI6aBQuiUDBeZvpIjM4qKKBS1tOn6', 'h2KAsqbsK', 'default.jpg', '', '1999-01-01', '', 0),
(216, 'youssef', 'youssef1808899@miuegypt.edu.eg', '', '1115364208', 5, 1, '$2y$10$ViMlBzzZrv6hrlwpLOWNROUe141avFpc21h54MTJfkcz57mLohpVK', '3qBtX4D5j', 'default.jpg', '', '1999-01-01', '', 0),
(217, 'ziad', 'ziad1803251@miuegypt.edu.eg', '', '1274461106', 5, 1, '$2y$10$vz/cXlLgB9DLLfaqqCbt8.GWN0FtsTO0nHt.0.BKkk8RCn8nhEphO', 'DzUdd9pVd', 'default.jpg', '', '1999-01-01', '', 0),
(218, 'ahmed', 'ahmed1810922@miuegypt.edu.eg', '', '1277216441', 6, 1, '$2y$10$Gj8tQ4gY6/QaEhdt4dmEwODmBTTfDu4d6drjaXgLLrIgR2rNY/XCi', 'eeUgg6bTd', 'default.jpg', '', '1999-01-01', '', 0),
(219, 'dina', 'dina1906391@miuegypt.edu.eg', '', '1227801000', 6, 1, '$2y$10$2qSbdXxHv.d7i21m7cUvcu9by5qPUktC49Ms9FFmrjmjIc3izABOW', 'UKG6eGkJ9', 'default.jpg', '', '1999-01-01', '', 0),
(220, 'farida', 'farida1802332@miuegypt.edu.eg', '', '1005855582', 6, 1, '$2y$10$9YAViedttDZp7PXhApeyZOZ9AFlYv6esyj/pq711KuaZaswCEk6aO', 'uesczE6F7', 'default.jpg', '', '1999-01-01', '', 0),
(221, 'habiba', 'habiba1804418@miuegypt.edu.eg', '', '1114556994', 6, 1, '$2y$10$3NlL20WK0K6X9/YSX5GEROBcCMGnL5cypxKKQ8glWp.eBJzZetJlm', 'We3cwVz2t', 'default.jpg', '', '1999-01-01', '', 0),
(222, 'hassanossama', 'hassanossama1810923@miuegypt.edu.eg', '', '1026664606', 6, 1, '$2y$10$s33KYS2lF9zU3KYhuPVfaOqT/ODiJvw7rE7loztdfMugJ..pdDSjS', 'VY3DZgE6n', 'default.jpg', '', '1999-01-01', '', 0),
(223, 'Hazem200269', 'Hazem2002691@miuegypt.edu.eg', '', '1019910648', 6, 1, '$2y$10$7wzL38jGDqvZpRW0L5g0KOjq0fEvFPagyelc8iCTA5t3E6qzs//GG', 'WBzqfr7cs', 'default.jpg', '', '1999-01-01', '', 0),
(224, 'malak', 'malak1803964@miuegypt.edu.eg', '', '1149943418', 6, 1, '$2y$10$4fgljQPc0IiEVeDTbSKwo.9S7tk9QckizNXIzc8TViidAlQG.6ve2', 'Qfzc4bzsQ', 'default.jpg', '', '1999-01-01', '', 0),
(225, 'mennatallah', 'mennatallah1808820@miuegypt.edu.eg', '', '1157554281', 6, 1, '$2y$10$8pfhvnnUI4HaVAGclhVkZuwpL.4lUTPEstZM1.b4ACQQxF.eM/zOm', '3Ss5GM6JE', 'default.jpg', '', '1999-01-01', '', 0),
(226, 'nouran', 'nouran1900859@miuegypt.edu.eg', '', '1094109790', 6, 1, '$2y$10$7SOW4k7qeGagT3ztBNhXCeoSxKSGcBm6yKSfn4vfAbYpoVeW.vwN.', 'VCwtWb4KE', 'default.jpg', '', '1999-01-01', '', 0),
(227, 'omar', 'omar1707894@miuegypt.edu.eg', '', '1068847949', 6, 1, '$2y$10$IKJiePFx2UlPsv20NoAaFu85CyA3HpkgKXYlZlkzpz9JjoxS3i4nS', 'SVMP6g8Ah', 'default.jpg', '', '1999-01-01', '', 0),
(228, 'rokaya', 'rokaya1810741@miuegypt.edu.eg', '', '1155561873', 6, 1, '$2y$10$cGexEC62h.ulUGhIxBRVVeFH9QlFiQYp8mSgUXXWkbi9LXBuFatnW', 'gcGYH6m3H', 'default.jpg', '', '1999-01-01', '', 0),
(229, 'salma', 'salma1801562@miuegypt.edu.eg', '', '1271788881', 6, 1, '$2y$10$3.UafsGDZ51Y6zxC4kLMI.QDQHsGZE2U/9VOY8nLwkGGU.H0mQI7K', 'dqRNkTmb8', 'default.jpg', '', '1999-01-01', '', 0),
(230, 'sarahmohamed', 'sarahmohamed1800771@miuegypt.edu.eg', '', '1142037589', 6, 1, '$2y$10$1U.oMfHs8Yr4HPhWv16Wl.QxL6Uq7TOznF9oQkkfxssCPlqgUlVc6', 'PTUK7Xx5p', 'default.jpg', '', '1999-01-01', '', 0),
(231, 'sherif gamil', 'sherifgamil543@gmail.com', '', '1000020011', 6, 1, '$2y$10$.lS660WqoWrl746DtYEJ2.4EXjLu2QubaPT1hj2MM/fqA3R3tn9g.', 'nyNyrv5ru', 'default.jpg', '', '1999-01-01', '', 0),
(232, 'yasmine', 'yasmine1900192@miuegypt.edu.eg', '', '1144848489', 6, 1, '$2y$10$ieTKpZhxbLNciMVMIye.Ze6no0JTFju9WV130abJwAs/itzw6mPB6', 'x2NXTRx43', 'default.jpg', '', '1999-01-01', '', 0),
(233, 'ziad2802', 'ziad2802181@miuegypt.edu.eg', '', '1127373013', 6, 1, '$2y$10$KopcbJy4YIqjJfkrohsKn.Llr2/wFO73dvz2xgx/Ep18BOxYg2WPq', '7Y3mAzXWk', 'default.jpg', '', '1999-01-01', '', 0),
(234, 'Amira', 'Amira1713354@miuegypt.edu.eg', '', '1272953339', 4, 1, '$2y$10$yADpMKI67jyXQKqP1807p.8X5aap2tIjMsJo.I9zGfMu1FTURJyfu', '3Kysz7wKF', 'default.jpg', '', '1999-01-01', '', 0),
(235, 'loay', 'loay1810467@miuegypt.edu.eg', '', '1553448039', 4, 1, '$2y$10$mX8Q48nWqVb6hQ/ak/TwKeqdGGTjXmJHicUZqbWeGfQySVVxIBDfW', '6ZY5g4YFj', 'default.jpg', '', '1999-01-01', '', 0),
(236, 'manar', 'manar1812760@miuegypt.edu.eg', '', '1155453471', 4, 1, '$2y$10$Rh0872ZTtgROFPJM7x2H9uxMcETEctxZVldm6fxHJzmokJsIml7zC', 'p8mYJAAZU', 'default.jpg', '', '1999-01-01', '', 0),
(237, 'mohamed', 'mohamed1800140@miuegypt.edu.eg', '', '1001893904', 4, 1, '$2y$10$6bCopDaIe2Q9nfZU1VHySOeTP2yFYvPg95AQy9saHUENr6KcVtRMS', 'ttM33QFdQ', 'default.jpg', '', '1999-01-01', '', 0),
(238, 'Nada', 'Nada1901038@miuegypt.edu.eg', '', '1018805626', 4, 1, '$2y$10$6Qo6HUx2UBOGibs8btE9JugS0qp3CG9ZpCa.fscxdPPE9M9uEsjE.', '3rmTRM8Z2', 'default.jpg', '', '1999-01-01', '', 0),
(239, 'omar', 'omar1801719@miuegypt.edu.eg', '', '1005560827', 4, 1, '$2y$10$R5CmMXcApCijEVKM/galROtEuNPFWMl674.ge75Ce5qo1CpiT7nT6', '5jST3b4zP', 'default.jpg', '', '1999-01-01', '', 0),
(240, 'rana', 'rana1707267@miuegypt.edu.eg', '', '1098608630', 4, 1, '$2y$10$WZ/fSLnPXAwbEdiOGFyb.e0MgTi1fNxTNahcS4.bvESICRzzX6IMK', '9f22qZxZm', 'default.jpg', '', '1999-01-01', '', 0),
(241, 'rana', 'rana1800340@miuegypt.edu.eg', '', '1281167221', 4, 1, '$2y$10$98l2ICtcq6zNb2XiU.Lz.uE2jOKYjTV2ixOM3IPYtsWeRN2By1NWG', 'FPdt6kDkC', 'default.jpg', '', '1999-01-01', '', 0),
(242, 'rana', 'rana1800721@miuegypt.edu.eg', '', '1009793313', 4, 1, '$2y$10$vR7T2hLoAfB6ykK9AunZTucQq8NXOgSor6/P3wyUk5.uA2LdTmcPe', 'jZd4fdpHF', 'default.jpg', '', '1999-01-01', '', 0),
(243, 'rouka', 'rouka_loai_swim@hotmail.com', '', '1277545533', 4, 1, '$2y$10$SD8RpddbAQIyCJ//KX1mSebi5nHRzsi8HH9yhP5T9Cyx63hQ6.vm2', 'YvSpQTw7v', 'default.jpg', '', '1999-01-01', '', 0),
(244, 'salma', 'salma1805929@miuegypt.edu.eg', '', '1021532223', 4, 1, '$2y$10$TRDgE5XhBI/CnLyy2GmS9uPcbHqxY6heX8ZC4uaTYBbritfeCTsV6', 'n8wWGazW5', 'default.jpg', '', '1999-01-01', '', 0),
(245, 'Sherry', 'Sherry1900232@miuegypt.edu.eg', '', '1202423337', 4, 1, '$2y$10$CPDhiqvsPI/4ylONHnHHtuq.a/EE3AxyxfS0rWqMCNDuIXuaDsPhm', 'nGrZWmKh2', 'default.jpg', '', '1999-01-01', '', 0),
(246, 'belal', 'belal1811700@miuegypt.edu.eg', '', '1063004236', 2, 1, '$2y$10$e1LzMdQrxKlZlH3n8xzqtexhlUw7Bpypj9i4KWuqGhEq8xzZcE0ri', 'HtrV97y9H', 'default.jpg', '', '1999-01-01', '', 0),
(247, 'farida', 'farida1900087@miuegypt.edu.eg', '', '1007006382', 2, 1, '$2y$10$AkwDMmvkBc1lDueOyPsQNOj0i1OAlrxf5yxjL6dhJpLcxHiTLkMI.', 'f4dC69Kn3', 'default.jpg', '', '1999-01-01', '', 0),
(248, 'feras', 'feras1701036@miuegypt.edu.eg', '', '1032558800', 2, 1, '$2y$10$8AGdDLNJ/BD2aISZXpFbpOU76nvlYl5V3f9bNcOLxIEqzqiYxrmbO', '6SbuQB33n', 'default.jpg', '', '1999-01-01', '', 0),
(249, 'hala', 'hala2012079@miu.edu.eg', '', '1096784358', 2, 1, '$2y$10$QuEgruGCjLh0s6IF42t8t.fGcMPGLPz0O7iHcxKTO7SzkTbqqpfpi', 'YmRDRPv8z', 'default.jpg', '', '1999-01-01', '', 0),
(250, 'mahmoud Ahmed', 'mahmoudahmed1917214@miuegypt.edu.eg', '', '1094267015', 2, 1, '$2y$10$ub6EG4Y1qIC9I1W7WaeUuuxbgin2n5pFtN/Q684hAlhtMpxWJv8z.', '5Ga7cTz9U', 'default.jpg', '', '1999-01-01', '', 0),
(251, 'adham', 'adham1700366@miuegypt.edu.eg', '', '1220050002', 1, 1, '$2y$10$8vATpTboDiNwViDZoMV/5eMMDJoDKVq/QY2ZIUL.2Ipb8nfPtmUEC', 'dKCm5b26E', 'default.jpg', '', '1999-01-01', '', 0),
(252, 'amr', 'amr1705903@miuegypt.edu.eg', '', '1119718958', 1, 1, '$2y$10$LJK3MLQF0eFqbkpzqZVDTu1O/ld3.F6cTSGNmA3UF1Fn5.nm8RPlK', '6Z6vGtUsJ', 'default.jpg', '', '1999-01-01', '', 0),
(253, 'hoda', 'hoda1900948@miuegypt.edu.eg', '', '1116778266', 1, 1, '$2y$10$kuFPAJcP/MH/VXdd2/J2WOGmVGO/Zy3qnEeZ3qAbvMKvwWoCKmR92', 'Ct9R5e6ms', 'default.jpg', '', '1999-01-01', '', 0),
(254, 'mariam', 'mariam1904317@miuegypt.edu.eg', '', '1115040009', 1, 1, '$2y$10$6vYuuYC12zTFgb5Spg.afe42ICu83PUgBPz603ikQc6iYSUGsAT7a', 'RRG38bJXf', 'default.jpg', '', '1999-01-01', '', 0),
(255, 'maryam', 'maryam1805897@miuegypt.edu.eg', '', '1220823700', 1, 1, '$2y$10$wfxSIRBeQoePSoUHfhBv7eWhZuI9dXMVt5YOV88CLY4outP/mOeeS', 'n8GfNbpj7', 'default.jpg', '', '1999-01-01', '', 0),
(256, 'mohamed', 'mohamed1801558@miuegypt.edu.eg', '', '1100604000', 1, 1, '$2y$10$nSkOk4WVUqMsFndmQIh4.eYJagdEyTxaZyyxUuDrTWhf8tl0OBzzS', 'PyVXZU42t', 'default.jpg', '', '1999-01-01', '', 0),
(257, 'nadin', 'nadin1806171@miuegypt.edu.eg', '', '1092544989', 1, 1, '$2y$10$ApXKBM8aTto64ROHzzv4rOw07M5jouVKZ0/LOCxtO8zWil.37mPkW', 'jzrMPb9SW', 'default.jpg', '', '1999-01-01', '', 0),
(258, 'Nourhan', 'Nourhan1804945@miuegypt.edu.eg', '', '1062561015', 1, 1, '$2y$10$vwysy9rGRn.S/.rbHtmSFuSQuqTt.SaG046c24j.Qd1IFRZwr2Dty', 'GWcrv79d6', 'default.jpg', '', '1999-01-01', '', 0),
(259, 'omar', 'omar1801557@miuegypt.edu.eg', '', '1271011128', 1, 1, '$2y$10$SBak7nrb0Ihk6NdNm7jHvelQLfyKbgP/BejpV2/41mrdCd50vibTG', 'e767GdyE4', 'default.jpg', '', '1999-01-01', '', 0),
(260, 'shahd', 'shahd1804867@miuegypt.edu.eg', '', '1091679730', 1, 1, '$2y$10$/Or3NCVftaru6i/vMYXRC.lkbaH.rhWtNj58b5.VhI7lX19Ah/oq2', 'NYry2V8h9', 'default.jpg', '', '1999-01-01', '', 0),
(261, 'shahd ', 'shahd2001663@miuegypt.edu.eg', '', '1111277221', 1, 1, '$2y$10$tgCayABv51cEF9z9SymXAOOASOM91yRUcnUSU662oTPr75oZLJ/Fq', 'R38Qz2R63', 'default.jpg', '', '1999-01-01', '', 0),
(262, 'yasmina', 'yasmina1804983@miuegypt.edu.eg', '', '1159700341', 1, 1, '$2y$10$9o2kO38sjB67AUC8xRmdUO9L79Qkub/orS9NNK9otxT4rfKzK7dre', 'BT9kXR6c7', 'default.jpg', '', '1999-01-01', '', 0),
(263, 'youssef', 'youssef1700453@miuegypt.edu.eg', '', '1100696869', 1, 1, '$2y$10$GH0yczrQ7hVh0HIkVfTKKuxOBAQO0QIdzKltwdFGaArVxzUfyru/S', 'mnC7v7GdF', 'default.jpg', '', '1999-01-01', '', 0),
(264, 'youssef', 'youssef1911385@miuegypt.edu.eg', '', '1158125589', 1, 1, '$2y$10$r3Kw5fQQ0vMQfNvYu/.oJO4sx66TZYPcvXVRUPZkLu12EUjWLDVW6', 'SPE2mX3Fp', 'default.jpg', '', '1999-01-01', '', 0),
(265, 'Abdelrahman Khaled', 'abdelrahmankhaled1810165@miu.edu.eg', '', '1200366117', 7, 1, '$2y$10$.01.G5qXM5IIcNgvzePIzO6QLjM8oQ4LGnASP2geWCuHQy51CET2a', '9M4E5aKQV', 'default.jpg', '', '1999-01-01', '', 0),
(266, 'ahmed', 'ahmed1701174@miuegypt.edu.eg', '', '1091020538', 7, 1, '$2y$10$V3Iao26HPegu.wkKnTLGNuMWEZiCJSosMCBnmtjMAsA9P2abXUydu', '65WxpXkWr', 'default.jpg', '', '1999-01-01', '', 0),
(267, 'ahmed', 'ahmed204339@miuegypt.edu.eg', '', '1027710544', 7, 1, '$2y$10$e4Hw3EKL6To1aG.Ecad75eXcyaRrh0u8siBhIN3F4QdJpoMKRQeSO', 'QST3rjrA4', 'default.jpg', '', '1999-01-01', '', 0),
(268, 'farah', 'farah1912154@miuegypt.edu.eg', '', '1147006684', 7, 1, '$2y$10$JDPhs4dI3f.NMurTJ6Fdl.gwaJhbR/00fCoyrAV/vCbgFM7fkJO9y', 'aXw9hJqS7', 'default.jpg', '', '1999-01-01', '', 0),
(269, 'farida', 'farida1705130@miuegypt.edu.eg', '', '1066333835', 7, 1, '$2y$10$mMUs8gwlejFAXuo.SgeCe.0cKOu59NQHsFoixwJYr7zZ7nZXKSsFm', 'M8utNUfRk', 'default.jpg', '', '1999-01-01', '', 0),
(270, 'hussein', 'hussein1906671@miuegypt.edu.eg', '', '1159552250', 7, 1, '$2y$10$HjlS3BDb97F/UvgLu2SkqOVOr/iLGjDjHqq9eAkFYfFdhaqbnLBoO', '7xsfqKS8b', 'default.jpg', '', '1999-01-01', '', 0),
(271, 'mariam', 'mariam1900269@miuegypt.edu.eg', '', '1096456511', 7, 1, '$2y$10$7V231C2tpdhWAih0ubRsV.nszjUNdQ.rEVolWFfCd/wq/ey.MaDuq', 'yP653XEBz', 'default.jpg', '', '1999-01-01', '', 0),
(272, 'maya', 'maya1805196@miuegypt.edu.eg', '', '1069593221', 7, 1, '$2y$10$onWj6fMmQJi..ghg39g/Nu7xGtt96B5kFIMOIr2HtVAIGRrUeSufi', 'N7tt5ngQe', 'default.jpg', '', '1999-01-01', '', 0),
(273, 'rana', 'rana1802307@miuegypt.edu.eg', '', '1111821333', 7, 1, '$2y$10$JyelZ/hGuBGIzm3PWPM.xOl78/RlZkDo/ArA2vKBOdmRQoPeHsIeu', '86v4SQVCX', 'default.jpg', '', '1999-01-01', '', 0),
(274, 'sandra', 'sandra1900377@miuegypt.edu.eg', '', '1211336630', 7, 1, '$2y$10$XKY1z10OdgZMRwV9ktXCXOJB6vAiDOEmwutQcVNefdC4hmKO1qlTO', 'Mk3Rd9G5A', 'default.jpg', '', '1999-01-01', '', 0),
(275, 'wedad', 'wedad2002076@miuegypt.edu.eg', '', '1284088888', 7, 1, '$2y$10$EBbzs9HRw1UFbPo.E8FSW.hVUfAObO2c5myYd0KWWmEjxzIr9acmC', 'zA35YXPDJ', 'default.jpg', '', '1999-01-01', '', 0);

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
(48, 'eaa0d47ff35129c0afacedeb2930afd64bac0bb7', 2, 1),
(49, '897dd7974d78a8bc5f767de821dba270d495c040', 2, 1),
(50, 'cd3e253bcb0a1be4502fc89bfe74a44b1f3b2d4a', 2, 0),
(51, 'e908a756d64a1be2655a0b6dc518861b355ece09', 1, 0);

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
(3, 2, 2, NULL, 0, '', 'This is a reminder', '2021-02-12', '2021-04-04 15:21:22', 0),
(4, NULL, 99, NULL, 1, 'test.notification', 'This is a reminder', NULL, '2021-04-04 15:22:38', 0),
(5, NULL, 99, NULL, 1, 'test.notification', 'This is a reminder', NULL, '2021-04-04 15:23:15', 0),
(6, NULL, 2, NULL, 1, 'announcement.committee', 'Testing notifications', '6', '2021-04-04 15:51:59', 0),
(7, 1, NULL, 2, 0, 'warning.default', 'Testing notifications system for warnings', '4', '2021-04-04 15:58:34', 0),
(8, 1, NULL, 2, 1, 'friend.request', 'You\'ve a new friend request!', '2', '2021-04-04 16:05:41', 1),
(9, 1, NULL, 2, 1, 'friend.request', 'You\'ve a new friend request!', '2', '2021-04-04 16:05:51', 1),
(10, 1, NULL, 2, 1, 'friend.request', 'You\'ve a new friend request!', '2', '2021-04-04 16:06:18', 1),
(11, 2, NULL, 1, 0, 'friend.request', '', '1', '2021-04-04 16:06:36', 0),
(12, 1, NULL, 2, 0, 'warning.default', 'Testing', '1', '2021-04-04 20:07:44', 0),
(13, 1, NULL, 2, 0, 'points.default', 'Testing', NULL, '2021-04-04 20:09:08', 0),
(14, NULL, 2, NULL, 1, 'event.committee', 'xTrimy', '2021-04-04', '2021-04-04 20:24:23', 0),
(15, 1, NULL, 2, 1, '', '', '2', '2021-04-04 20:31:25', 1),
(16, 1, NULL, 2, 0, 'friend.request', '', '2', '2021-04-05 16:21:51', 0),
(17, 2, NULL, 1, 0, 'friend.accept', '', '1', '2021-04-05 16:22:41', 0),
(18, 1, NULL, 1, 0, 'tasks.assign', 'ssss', '1', '2021-04-06 20:21:01', 0),
(19, NULL, NULL, NULL, 1, 'announcement.public', 'xTrimy', '7', '2021-04-06 20:29:50', 0),
(20, 255, NULL, 2, 1, 'friend.request', '', '2', '2021-04-12 22:41:27', 1);

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
(1, 'Member', 0),
(2, 'Co-Head', 0),
(3, 'Head', 0);

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
-- Table structure for table `tshirts_form`
--

CREATE TABLE `tshirts_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `size_chart` varchar(255) DEFAULT NULL,
  `available_sizes` varchar(255) DEFAULT NULL,
  `available_colors` varchar(255) NOT NULL,
  `available_styles` varchar(255) NOT NULL,
  `options` varchar(255) DEFAULT NULL,
  `obligatory_for_committee` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tshirts_form`
--

INSERT INTO `tshirts_form` (`id`, `name`, `description`, `start_date`, `end_date`, `size_chart`, `available_sizes`, `available_colors`, `available_styles`, `options`, `obligatory_for_committee`, `is_deleted`) VALUES
(1, '2021 Spring TShirts Form', NULL, '2021-04-12', '2021-04-22', NULL, 'S,M,L,XL', 'White', 'Tshirt', 'T-shirt & Nametag,Only Nametag', 'Coaching', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tshirts_registrees`
--

CREATE TABLE `tshirts_registrees` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `style` varchar(50) NOT NULL,
  `_option` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tshirts_registrees`
--

INSERT INTO `tshirts_registrees` (`id`, `form_id`, `member_id`, `size`, `color`, `style`, `_option`, `is_deleted`) VALUES
(14, 1, 2, 'S', 'White', 'Tshirt', 'T-shirt & Nametag', 0),
(15, 1, 2, 'S', 'White', 'Tshirt', 'T-shirt & Nametag', 0);

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
-- Indexes for table `coordination_booth_bank`
--
ALTER TABLE `coordination_booth_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordination_booth_bank_images`
--
ALTER TABLE `coordination_booth_bank_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committee_id` (`committee_id`);

--
-- Indexes for table `external_contacts`
--
ALTER TABLE `external_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `external_resources`
--
ALTER TABLE `external_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tshirts_form`
--
ALTER TABLE `tshirts_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tshirts_registrees`
--
ALTER TABLE `tshirts_registrees`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coordination_booth_bank`
--
ALTER TABLE `coordination_booth_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coordination_booth_bank_images`
--
ALTER TABLE `coordination_booth_bank_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `external_contacts`
--
ALTER TABLE `external_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `external_resources`
--
ALTER TABLE `external_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `member_login_tokens`
--
ALTER TABLE `member_login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `tshirts_form`
--
ALTER TABLE `tshirts_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tshirts_registrees`
--
ALTER TABLE `tshirts_registrees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
