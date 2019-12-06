-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2019 at 07:30 AM
-- Server version: 5.6.41-84.1
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
-- Database: `vaskenba_mehe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `first_name`, `last_name`, `mobile_number`, `email`, `role`, `password`, `active`, `created_at`, `updated_at`) VALUES
(42, 'admin', 'Super', 'Admin', '+0000000', 'admin@gmail.com', '2', 'c9cc24ffa63b25bb52b9d5fa288c2921a5190acd2ad461e2ece7b7d74af0fa53c86b783a066fc1ad3694313345702e69f57d70a597f7fbbf78dfc957d3bcdea9', '1', '2019-11-08 13:53:43', '2019-11-08 13:53:43'),
(44, 'pargev', 'Pargev', 'Aghabekyan', '+566666666', 'pargev@aimtech.am', '1', '32b70b41827206bc07f988aa53322d428a4ecb43a60c9e0f01fb994e3466a9fb798e4902a97785507f9b34f48bbf9969a6e45419aa0b852e04b8bb6500de74d4', '1', '2019-11-08 13:55:38', '2019-11-08 13:55:38'),
(45, 'Nareg', 'Nareg', 'Sfeir', '70604213', 'nareg.sfeir33@gmail.com', '1', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1', '2019-11-10 18:52:03', '2019-11-10 18:52:03'),
(46, 'vasken', 'Vasken', 'Bakkalian', '55023420', 'vaskenbakkalian@gmail.com', '1', '42f0f66c454c90789939115800028418809e01be26d808dca31c4a96788a1cbc413b90bb1e3b1801930f00b8018cde9abb8fc13aea8a81dba3e9290e7d5d7c8a', '1', '2019-11-10 18:52:10', '2019-11-10 18:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `admins_region`
--

CREATE TABLE `admins_region` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins_region`
--

INSERT INTO `admins_region` (`id`, `admin_id`, `region_id`, `status`) VALUES
(18, 44, 19, 1),
(19, 44, 20, 1),
(20, 45, 19, 1),
(21, 46, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `age_group`
--

CREATE TABLE `age_group` (
  `id` int(11) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `age_group`
--

INSERT INTO `age_group` (`id`, `from`, `to`, `status`) VALUES
(13, 6, 8, 1),
(14, 8, 10, 1),
(15, 10, 12, 1),
(16, 12, 14, 1),
(17, 14, 16, 1),
(18, 16, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `text_en` text NOT NULL,
  `text_ar` text NOT NULL,
  `landscape` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `school_id`, `name_en`, `name_ar`, `image`, `gender`, `status`) VALUES
(7, 12, 'Gevor', 'Gevor', 'coaches_1573221680_1445975186.jpg', 1, 1),
(8, 13, 'Vardan', 'Vardan', 'coaches_1573222224_769605579.jpg', 1, 1),
(9, 14, 'Vasken', 'Vasken', 'coaches_1573412293_1838908072.jpeg', 1, 1),
(10, 15, 'Pat Riley', 'بات رايلي', 'coaches_1573412764_1636101561.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `end_game`
--

CREATE TABLE `end_game` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `team_1_id` int(11) DEFAULT NULL,
  `team_2_id` int(11) DEFAULT NULL,
  `score_1` int(11) DEFAULT NULL,
  `score_2` int(11) DEFAULT NULL,
  `referee_id` int(11) DEFAULT NULL,
  `info` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `end_game`
--

INSERT INTO `end_game` (`id`, `game_id`, `team_1_id`, `team_2_id`, `score_1`, `score_2`, `referee_id`, `info`, `time`) VALUES
(129, 24, 28, 29, 0, 0, 12, 0, NULL),
(130, 24, 28, 29, 0, 0, 11, 0, NULL),
(131, 24, 28, 29, 0, 0, 10, 0, NULL),
(132, 24, 28, 29, 0, 0, 12, 0, NULL),
(133, 24, 28, 29, 0, 0, 10, 0, NULL),
(134, 24, 28, 29, 3, 3, 11, 0, NULL),
(135, 24, 28, 29, 0, 0, 12, 0, NULL),
(136, 26, 30, 31, 2, 2, 11, 0, NULL),
(137, 29, 30, 31, 3, 2, 11, 0, NULL),
(138, 30, 30, 31, 12, 12, 12, 0, NULL),
(139, 30, 30, 31, 0, 0, 12, 0, NULL),
(155, 25, 30, 31, 0, 0, 12, 0, NULL),
(156, 25, 30, 31, 0, 0, 12, 0, NULL),
(157, 25, 30, 31, 0, 0, 12, 0, NULL),
(158, 31, 32, 33, 12, 15, 11, 0, NULL),
(159, 25, 30, 31, 3, 3, 11, 0, NULL),
(160, 25, 30, 31, 3, 3, 11, 0, NULL),
(161, 25, 30, 31, 3, 3, 11, 0, NULL),
(162, 23, 28, 29, 1, 3, 11, 0, NULL),
(163, 32, 30, 33, 9, 8, 12, 0, '0'),
(164, 33, 32, 31, 1, 4, 11, 0, '00:00:05'),
(165, 34, 30, 33, 12, 3, 10, 0, '00:00:07'),
(166, 34, 30, 33, 18, 8, 11, 0, '00:00:20'),
(167, 34, 30, 33, 0, 0, 10, 0, '00:00:02'),
(168, 34, 30, 33, 0, 0, 11, 0, '00:00:03'),
(169, 34, 30, 33, 0, 0, 10, 0, '00:00:01'),
(170, 34, 30, 33, 0, 0, 10, 0, '00:00:02'),
(171, 34, 30, 33, 0, 0, 11, 0, '00:00:01'),
(172, 34, 30, 33, 12, 9, 11, 0, '00:00:04'),
(173, 35, 31, 32, 3, 3, 11, 0, '00:00:07'),
(174, 35, 31, 32, 3, 3, 11, 0, '00:00:07'),
(175, 35, 31, 32, 3, 3, 11, 0, '00:00:07'),
(176, 35, 31, 32, 3, 3, 11, 0, '00:00:07'),
(177, 35, 31, 32, 3, 3, 11, 0, '00:00:07'),
(178, 34, 30, 33, 0, 0, 11, 0, '00:00:02'),
(179, 36, 32, 33, 22, 5, 10, 0, '00:00:20'),
(180, 37, 30, 33, 112, 0, 12, 0, '00:00:33'),
(181, 36, 32, 33, 0, 0, 11, 0, '00:00:02'),
(182, 34, 30, 33, 0, 0, 10, 0, '00:00:01'),
(183, 36, 32, 33, 0, 0, 10, 0, '00:00:00'),
(184, 36, 32, 33, 0, 0, 11, 0, '00:00:01'),
(185, 38, 31, 32, 0, 0, 11, 0, '00:00:01'),
(186, 36, 32, 33, 0, 0, 10, 0, '00:00:00'),
(187, 30, 30, 31, 0, 0, 11, 0, '00:00:01'),
(188, 39, 30, 33, 0, 0, 11, 0, '00:00:02'),
(189, 39, 30, 33, 0, 0, 11, 0, '00:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `end_game_best_players`
--

CREATE TABLE `end_game_best_players` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `end_game_best_players`
--

INSERT INTO `end_game_best_players` (`id`, `game_id`, `student_id`) VALUES
(255, 24, 14),
(256, 26, 18),
(257, 26, 21),
(258, 29, 18),
(259, 29, 21),
(260, 30, 18),
(261, 30, 20),
(291, 31, 18),
(292, 31, 20),
(293, 23, 14),
(294, 23, 17),
(295, 32, 18),
(296, 32, 20),
(297, 33, 22),
(298, 33, 20),
(299, 34, 18),
(300, 34, 20),
(301, 34, 18),
(302, 34, 20),
(303, 34, 18),
(304, 34, 20),
(305, 35, 20),
(306, 35, 22),
(307, 35, 23),
(308, 35, 24),
(309, 35, 20),
(310, 35, 22),
(311, 35, 23),
(312, 35, 24),
(313, 35, 20),
(314, 35, 22),
(315, 35, 23),
(316, 35, 24),
(317, 35, 20),
(318, 35, 22),
(319, 35, 23),
(320, 35, 24),
(321, 35, 20),
(322, 35, 22),
(323, 35, 23),
(324, 35, 24),
(325, 36, 19),
(326, 36, 21),
(327, 37, 19),
(328, 37, 20),
(329, 34, 18),
(330, 36, 18),
(331, 36, 20),
(332, 38, 20),
(333, 38, 25),
(334, 36, 19),
(335, 36, 26),
(336, 30, 19),
(337, 30, 18),
(338, 30, 20),
(339, 39, 18),
(340, 39, 26),
(341, 39, 18),
(342, 39, 26);

-- --------------------------------------------------------

--
-- Table structure for table `end_game_image`
--

CREATE TABLE `end_game_image` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `end_game_media`
--

CREATE TABLE `end_game_media` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `media` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `end_game_signature`
--

CREATE TABLE `end_game_signature` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `coaches_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `end_game_signature`
--

INSERT INTO `end_game_signature` (`id`, `game_id`, `coaches_id`, `image`) VALUES
(69, 26, 7, 'signature_1573553509_5dca856597682.630715'),
(70, 26, 8, 'signature_1573553509_5dca85659817c.630837'),
(71, 29, 7, 'signature_1573553887_5dca86df28478.12588'),
(72, 30, 8, 'signature_1573559119_5dca9b4f6a6e7.644548'),
(73, 30, 8, 'signature_1573628194_5dcba9221d8a4.396126'),
(74, 30, 7, 'signature_1573628194_5dcba92220830.397603'),
(75, 30, 7, 'signature_1573628194_5dcba92220c83.397663'),
(76, 31, 8, 'signature_1573648885_5dcbf9f58e090.3418288'),
(77, 23, 10, 'signature_1573649333_5dcbfbb581ece.jpg'),
(78, 32, 8, 'signature_1573650698_5dcc010a2838b.216002'),
(79, 33, 8, 'signature_1573650897_5dcc01d1c93ba.jpg'),
(80, 33, 8, 'signature_1573650897_5dcc01d1c9987.jpg'),
(81, 34, 8, 'signature_1573651028_5dcc0254031d9.113698'),
(82, 36, 7, 'signature_1573654016_5dcc0e00750b0.152669'),
(83, 37, 8, 'signature_1573655020_5dcc11ec63ca3.jpg'),
(84, 36, 7, 'signature_1574252524_5dd52fec84af0.2160711'),
(85, 38, 7, 'signature_1574253312_5dd5330019e15.jpg'),
(86, 38, 7, 'signature_1574253312_5dd533001a23f.jpg'),
(87, 38, 7, 'signature_1574253312_5dd533001a451.jpg'),
(88, 38, 7, 'signature_1574253312_5dd533001a68e.jpg'),
(89, 38, 7, 'signature_1574253312_5dd533001a85d.jpg'),
(90, 39, 8, 'signature_1574850101_5dde4e35298c8.jpg'),
(91, 39, 8, 'signature_1574850101_5dde4e35b9011.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `end_game_teams`
--

CREATE TABLE `end_game_teams` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `end_game_teams`
--

INSERT INTO `end_game_teams` (`id`, `game_id`, `team_id`, `student_id`) VALUES
(251, 24, 28, 14),
(252, 24, 29, 17),
(253, 24, 28, 14),
(254, 24, 29, 17),
(255, 24, 28, 14),
(256, 24, 29, 17),
(257, 24, 28, 14),
(258, 24, 29, 17),
(259, 24, 28, 14),
(260, 24, 29, 17),
(261, 24, 28, 14),
(262, 24, 29, 17),
(263, 26, 30, 18),
(264, 26, 30, 19),
(265, 26, 31, 20),
(266, 26, 31, 21),
(267, 29, 30, 19),
(268, 29, 31, 20),
(269, 29, 31, 21),
(270, 30, 30, 19),
(271, 30, 31, 21),
(272, 30, 30, 19),
(273, 30, 31, 21),
(289, 31, 32, 23),
(290, 31, 33, 21),
(291, 23, 28, 14),
(292, 23, 29, 17),
(293, 32, 30, 19),
(294, 32, 33, 21),
(295, 33, 32, 18),
(296, 33, 32, 19),
(297, 33, 32, 22),
(298, 33, 31, 20),
(299, 33, 31, 21),
(300, 34, 30, 19),
(301, 34, 33, 21),
(302, 34, 30, 19),
(303, 34, 33, 21),
(304, 34, 30, 18),
(305, 34, 33, 20),
(306, 34, 30, 18),
(307, 34, 33, 20),
(308, 34, 30, 18),
(309, 34, 33, 20),
(310, 34, 30, 18),
(311, 34, 33, 20),
(312, 34, 30, 19),
(313, 34, 33, 20),
(314, 34, 30, 19),
(315, 34, 33, 20),
(316, 35, 31, 20),
(317, 35, 31, 21),
(318, 35, 32, 18),
(319, 35, 32, 19),
(320, 35, 32, 22),
(321, 35, 32, 23),
(322, 35, 32, 24),
(323, 35, 32, 25),
(324, 35, 31, 20),
(325, 35, 31, 21),
(326, 35, 32, 18),
(327, 35, 32, 19),
(328, 35, 32, 22),
(329, 35, 32, 23),
(330, 35, 32, 24),
(331, 35, 32, 25),
(332, 35, 31, 20),
(333, 35, 31, 21),
(334, 35, 32, 18),
(335, 35, 32, 19),
(336, 35, 32, 22),
(337, 35, 32, 23),
(338, 35, 32, 24),
(339, 35, 32, 25),
(340, 35, 31, 20),
(341, 35, 31, 21),
(342, 35, 32, 18),
(343, 35, 32, 19),
(344, 35, 32, 22),
(345, 35, 32, 23),
(346, 35, 32, 24),
(347, 35, 32, 25),
(348, 35, 31, 20),
(349, 35, 31, 21),
(350, 35, 32, 18),
(351, 35, 32, 19),
(352, 35, 32, 22),
(353, 35, 32, 23),
(354, 35, 32, 24),
(355, 35, 32, 25),
(356, 34, 30, 19),
(357, 34, 33, 21),
(358, 36, 32, 19),
(359, 36, 32, 18),
(360, 36, 32, 22),
(361, 36, 32, 23),
(362, 36, 33, 21),
(363, 36, 33, 26),
(364, 36, 33, 20),
(365, 36, 33, 27),
(366, 37, 30, 19),
(367, 37, 33, 20),
(368, 37, 33, 21),
(369, 37, 33, 27),
(370, 36, 32, 22),
(371, 36, 33, 20),
(372, 34, 30, 19),
(373, 34, 33, 21),
(374, 36, 32, 23),
(375, 36, 33, 26),
(376, 36, 32, 22),
(377, 36, 33, 21),
(378, 38, 31, 20),
(379, 38, 31, 21),
(380, 38, 32, 24),
(381, 38, 32, 25),
(382, 36, 32, 23),
(383, 36, 32, 19),
(384, 36, 33, 20),
(385, 36, 33, 26),
(386, 36, 33, 27),
(387, 30, 30, 19),
(388, 30, 30, 18),
(389, 30, 31, 21),
(390, 39, 30, 18),
(391, 39, 30, 19),
(392, 39, 33, 20),
(393, 39, 33, 21),
(394, 39, 33, 26),
(395, 39, 30, 18),
(396, 39, 30, 19),
(397, 39, 33, 20),
(398, 39, 33, 21),
(399, 39, 33, 26);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `age_group_id` int(11) NOT NULL,
  `observer_id` int(11) NOT NULL,
  `game_type_id` int(11) NOT NULL,
  `sport_type` int(11) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '2',
  `status` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `for_site` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `place`, `time`, `age_group_id`, `observer_id`, `game_type_id`, `sport_type`, `gender`, `status`, `active`, `for_site`) VALUES
(21, 'Grand Lycee', '1573787100', 15, 47, 12, 9, 1, 1, 1, 0),
(22, 'Grand Stadium Saida', '1573619100', 15, 48, 10, 9, 1, 1, 1, 0),
(23, 'Paris', '1573837200', 15, 49, 9, 9, 1, 1, 0, 1),
(24, 'La bohem', '1573718400', 15, 46, 11, 9, 1, 1, 0, 0),
(25, 'Katar', '1573044300', 13, 49, 9, 9, 2, 1, 0, 0),
(26, 'Paris', '1573588800', 13, 46, 9, 9, 2, 1, 0, 1),
(29, 'Katar', '1573589700', 13, 46, 9, 9, 2, 1, 0, 1),
(30, 'Katar', '1573594800', 13, 46, 9, 9, 2, 1, 0, 0),
(31, 'Katar', '1573678800', 13, 46, 12, 9, 2, 1, 0, 1),
(32, 'Paris', '1573686000', 13, 46, 10, 9, 2, 1, 0, 0),
(33, 'La bohem', '1573686000', 13, 49, 9, 9, 2, 1, 0, 0),
(34, 'Paris', '1573686000', 13, 46, 9, 9, 2, 1, 0, 0),
(35, 'Paris', '1574465400', 13, 49, 9, 9, 2, 1, 0, 0),
(36, 'Katar', '1573689000', 13, 46, 9, 9, 2, 1, 0, 0),
(37, 'La bohem', '1573689600', 13, 49, 9, 9, 2, 1, 0, 0),
(38, 'Paris', '1574460000', 13, 49, 9, 9, 2, 1, 0, 0),
(39, 'Paris', '1574870400', 13, 49, 9, 9, 2, 1, 0, 0),
(40, 'beirut', '1574970300', 13, 46, 9, 9, 2, 1, 1, 0),
(41, '', '0', 13, 46, 9, 9, 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game_regions`
--

CREATE TABLE `game_regions` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `region_id_1` int(11) NOT NULL,
  `region_id_2` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_regions`
--

INSERT INTO `game_regions` (`id`, `game_id`, `region_id_1`, `region_id_2`, `status`) VALUES
(19, 21, 19, 20, 1),
(20, 22, 19, 20, 1),
(21, 23, 19, 20, 1),
(22, 24, 19, 20, 1),
(23, 25, 19, 19, 1),
(24, 26, 19, 19, 1),
(27, 29, 19, 19, 1),
(28, 30, 19, 19, 1),
(29, 31, 19, 19, 1),
(30, 32, 19, 19, 1),
(31, 33, 19, 19, 1),
(32, 34, 19, 19, 1),
(33, 35, 19, 19, 1),
(34, 36, 19, 19, 1),
(35, 37, 19, 19, 1),
(36, 38, 19, 19, 1),
(37, 39, 19, 19, 1),
(38, 40, 19, 19, 1),
(39, 41, 19, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_schools`
--

CREATE TABLE `game_schools` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `school_id_1` int(11) NOT NULL,
  `school_id_2` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_schools`
--

INSERT INTO `game_schools` (`id`, `game_id`, `school_id_1`, `school_id_2`, `status`) VALUES
(22, 21, 14, 15, 1),
(23, 22, 14, 15, 1),
(24, 23, 14, 15, 1),
(25, 24, 14, 15, 1),
(26, 25, 12, 13, 1),
(27, 26, 12, 13, 1),
(30, 29, 12, 13, 1),
(31, 30, 12, 13, 1),
(32, 31, 12, 13, 1),
(33, 32, 12, 13, 1),
(34, 33, 12, 13, 1),
(35, 34, 12, 13, 1),
(36, 35, 13, 12, 1),
(37, 36, 12, 13, 1),
(38, 37, 12, 13, 1),
(39, 38, 13, 12, 1),
(40, 39, 12, 13, 1),
(41, 40, 13, 12, 1),
(42, 41, 13, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_teams`
--

CREATE TABLE `game_teams` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `team_1` int(11) NOT NULL,
  `team_2` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_teams`
--

INSERT INTO `game_teams` (`id`, `game_id`, `team_1`, `team_2`, `status`) VALUES
(18, 21, 28, 29, 1),
(19, 22, 28, 29, 1),
(20, 23, 28, 29, 1),
(21, 24, 28, 29, 1),
(22, 25, 30, 31, 1),
(23, 26, 30, 31, 1),
(26, 29, 30, 31, 1),
(27, 30, 30, 31, 1),
(28, 31, 32, 33, 1),
(29, 32, 30, 33, 1),
(30, 33, 32, 31, 1),
(31, 34, 30, 33, 1),
(32, 35, 31, 32, 1),
(33, 36, 32, 33, 1),
(34, 37, 30, 33, 1),
(35, 38, 31, 32, 1),
(36, 39, 30, 33, 1),
(37, 40, 31, 30, 1),
(38, 41, 31, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_types`
--

CREATE TABLE `game_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_types`
--

INSERT INTO `game_types` (`id`, `type`, `status`) VALUES
(9, 'Final', 1),
(10, 'Semi-final', 1),
(11, 'Quarter-final', 1),
(12, 'Knock-out', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_banner`
--

CREATE TABLE `main_banner` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `text_en` text NOT NULL,
  `text_ar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_banner`
--

INSERT INTO `main_banner` (`id`, `banner`, `text_en`, `text_ar`) VALUES
(2, 'student_1573465826_416385199.jpg', 'U Sports&nbsp;(stylized as&nbsp;U SPORTS) is the national&nbsp;sport governing body&nbsp;of university\r\n				sport in Canada, comprising the majority of degree-\r\n				granting universities in the country. Its equivalent body for organized sports at&nbsp;colleges&nbsp;in\r\n				Canada is the Canadian Collegiate Athletic Association&nbsp;(CCAA). Some institutions are members of\r\n				both bodies for different sports', 'text ar\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `referees`
--

INSERT INTO `referees` (`id`, `name_en`, `name_ar`, `image`, `region_id`, `mobile_number`, `count`, `status`) VALUES
(10, 'Vache', 'Vache', 'referee_1573221611_1902484823.jpg', 19, '+374995484', 0, '1'),
(11, 'Partoghomios', 'Partoghomios', 'referee_1573412409_1524618529.jpg', 19, '70605040', 0, '1'),
(12, 'Antwan', 'انطوان', 'referee_1573412663_711149530.jpg', 20, '054545554', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_en`, `name_ar`, `status`) VALUES
(19, 'Beirut', 'Beirut', 1),
(20, 'Mount Lebanon', 'Mount Lebanon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT '',
  `name_ar` varchar(255) DEFAULT NULL,
  `address_en` varchar(255) DEFAULT '',
  `address_ar` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `admin_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name_en`, `name_ar`, `address_en`, `address_ar`, `image`, `status`, `admin_id`, `region_id`) VALUES
(12, 'Fizmat', 'Fizmat', 'Amiryan 12', 'amiryan 12', 'school_1573221653_2131018553.jpg', 1, 44, 19),
(13, 'Qvant', 'Qvant', 'Amiryan 13', 'Amiryan 13', 'school_1573222173_388087619.jpg', 1, 44, 19),
(14, 'High School', 'High School', 'Ashrafieh', 'Ashrafieh', 'school_1573412130_1309674068.jpeg', 1, 45, 19),
(15, 'Saida National School ', 'مدرسة صيدا الوطنية', 'Saida ', 'صيدا ', 'school_1573412185_699537170.jpg', 1, 46, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sport_points`
--

CREATE TABLE `sport_points` (
  `id` int(11) NOT NULL,
  `sport_type_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sport_points`
--

INSERT INTO `sport_points` (`id`, `sport_type_id`, `value`, `status`) VALUES
(14, 9, 2, 1),
(15, 9, 3, 1),
(16, 10, 1, 1),
(17, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sport_types`
--

CREATE TABLE `sport_types` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `desc_en` varchar(255) DEFAULT NULL,
  `desc_ar` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1',
  `image_site` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sport_types`
--

INSERT INTO `sport_types` (`id`, `name_en`, `name_ar`, `desc_en`, `desc_ar`, `image`, `status`, `image_site`) VALUES
(9, 'Basketball', 'Basketball', 'basketball', 'Basketball', 'sport_1573221424_1890764397.png', '1', 'sport_1573482291_979876091.jpg'),
(10, 'Football', 'Football', 'football', 'football', 'sport_1573221451_33900528.png', '1', ''),
(11, 'VolleyBall', 'الكرة الطائرة', 'VolleyBall', 'الكرة الطائرة', 'sport_1573411097_1540260313.jpg', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT '',
  `name_ar` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `name_en`, `name_ar`, `birthday`, `gender`, `image`, `status`) VALUES
(14, 14, 'Nareg', 'Nareg', '2009-01-27', '1', 'student_1573412234_1658188050.jpeg', 1),
(15, 15, 'Fatme ', 'Fatme ', '2004-07-22', '0', 'student_1573412377_1103640172.jpg', 1),
(16, 14, 'Partoghomios', 'Partoghomios', '2009-01-14', '1', 'student_1573413143_901900855.jpeg', 1),
(17, 15, 'Sarkis', 'سركيس', '2008-11-20', '1', 'student_1573414184_188522940.jpg', 1),
(18, 12, 'david', 'david', '2013-11-06', '1', 'student_1573483187_1039985551.jpg', 1),
(19, 12, 'Pargev', 'pargev', '2013-06-18', '1', 'student_1573483222_1778667375.jpg', 1),
(20, 13, 'Zara', 'Zara', '2013-07-24', '0', 'student_1573483269_511258016.jpg', 1),
(21, 13, 'Lara Croft', 'Lara Croft', '2013-10-11', '0', 'student_1573483356_925555212.jpg', 1),
(22, 12, 'Nara', 'Nara', '2013-11-06', '0', 'student_1573643334_1062919774.jpg', 1),
(23, 12, 'Mara', 'Mara', '2013-11-06', '0', 'student_1573643355_1289213371.jpg', 1),
(24, 12, 'Lara', 'Lara', '2013-11-06', '0', 'student_1573643384_1144328381.jpg', 1),
(25, 12, 'Klara', 'Klara', '2013-11-06', '0', 'student_1573643409_1597574605.jpg', 1),
(26, 13, 'Babken', 'Babken', '2013-11-06', '1', 'student_1573643491_1474495100.jpg', 1),
(27, 13, 'Vachagan', 'Vachagan', '2013-11-06', '1', 'student_1573643517_661132741.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_sport`
--

CREATE TABLE `students_sport` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_sport`
--

INSERT INTO `students_sport` (`id`, `student_id`, `sport_id`, `status`) VALUES
(20, 14, 9, 1),
(21, 15, 9, 1),
(22, 15, 11, 1),
(23, 16, 9, 1),
(24, 17, 9, 1),
(25, 18, 9, 1),
(26, 19, 9, 1),
(27, 20, 9, 1),
(28, 21, 9, 1),
(29, 22, 9, 1),
(30, 23, 9, 1),
(31, 24, 9, 1),
(32, 25, 9, 1),
(33, 26, 9, 1),
(34, 27, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_team`
--

CREATE TABLE `students_team` (
  `id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_team`
--

INSERT INTO `students_team` (`id`, `team_id`, `student_id`, `status`) VALUES
(31, 28, 14, 1),
(32, 29, 17, 1),
(33, 30, 18, 1),
(34, 30, 19, 1),
(35, 31, 20, 1),
(36, 31, 21, 1),
(37, 32, 18, 1),
(38, 32, 19, 1),
(39, 32, 22, 1),
(40, 32, 23, 1),
(41, 32, 24, 1),
(42, 32, 25, 1),
(43, 33, 20, 1),
(44, 33, 21, 1),
(45, 33, 26, 1),
(46, 33, 27, 1),
(47, 34, 20, 1),
(48, 34, 21, 1),
(49, 34, 26, 1),
(50, 34, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age_id` varchar(255) DEFAULT '',
  `gender` varchar(255) DEFAULT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `age_id`, `gender`, `sport_id`, `school_id`, `status`) VALUES
(28, 'High School-male/10 - 12/Basketball', '15', '1', 9, 14, 1),
(29, 'Saida National School -male/10 - 12/Basketball', '15', '1', 9, 15, 1),
(30, 'Fizmat-both/6 - 8/Basketball', '13', '2', 9, 12, 1),
(31, 'Qvant-both/6 - 8/Basketball', '13', '2', 9, 13, 1),
(32, 'New-Fizmat-both/6 - 8/Basketball', '13', '2', 9, 12, 1),
(33, 'New-Qvant-both/6 - 8/Basketball', '13', '2', 9, 13, 1),
(34, 'Qvant-both/6 - 8/Basketball', '13', '2', 9, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `time` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `refresh_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `time`, `user_id`, `refresh_token`) VALUES
(149, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzk0NTM5MTY4YTci.Bef9-CO33HKMG_wEzzy5dE19KS_Oe19LjG4FOEfrkTI', '1573557945', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzk0NTM5MTY5MTgi.Y2IPqr49gAYWdXAZqO2wi-Cec3cy98WqU-DnEiMgsoQ'),
(150, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzg2NjI2MWU3Mzki.lz5_C1By9ebX9458oC8iWd02KBh1y6RYPHFUGkozEhA', '1573500838', 47, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzg2NjI2MWU3Yzgi.rPcPsh1uTH62YPqEuDXFRwM88k-teQCsIybtGLX8Xbk'),
(151, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZTI2MWY1ODI1NGYi.BEReGxBGIu5psxdTRzrwZL-pf9M4m_Q1ISbKG_Kdip4', '1575203701', 48, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZTI2MWY1ODI1YjYi.KmwIP8PpjsNusocTsKQps5lvYLC3N8RSCjGMyZYSowE'),
(152, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZTY0MmY1MTAwMzgi.79th7K95VU9Gc_alJIhq2n3jbksz_hm4OCm8mzW8e18', '1575457909', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZTY0MmY1MTAwYWMi.NT3hVkZUIYF9XTsJ567By9GYNu0EvY5r9wdkyHEMRIU'),
(153, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzkxMGQ3YTYxYWIi.7VA7qdbjjYNR-CWRCEaRIZxZ6nqwQtjbsAPCErhxyE4', '0', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzkxMGQ3YTYyM2Ii.fM0Se0gvh1VEc6e6OOtSvhKPWwRDWIu7xqMAtAUpQ_s'),
(154, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzkxMzFjYWRkOTEi.au8XtaAG8NEehIu5zZ7hLWSMKY4qb-U4lm1mOQ8U8zU', '0', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzkxMzFjYWRlMmQi.Zhoq0Kc1r9gN1xEvxXbX7abzczaf3YC1uFcEugMWJLE'),
(155, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2E5N2Q0MDgzOGYi.Dho1riaW1LPSrb-4hrsO8a6JPrCYBltIPqTpqQoNjps', '1573644628', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2E5N2Q0MDg0Njci.RVCKzfzAjFGthHYr-QupNNDU_15dr_mPmECZ4bL9Aqk'),
(156, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxODU5MjA2ZGMi.PSuQuRJItkoqHm2n6nBt_dVWezYIlwn6ZCfyeALJa7s', '0', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxODU5MjA3NjYi.djGL_6zl7hUSOTMNOYbI2gcBYsyJC2f_Slwal5Y7EgI'),
(157, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZDUyNjI4ZThhMDMi.zk3WgFhAT-wbhNWcpXEUdDvEn7U8QV1iymLU-n03SiM', '1574336424', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZDUyNjI4ZThhNzQi.FhNWjzC60FGJYKLLCHXNRFRDEis7GhfvOQOAXnERfYY'),
(158, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzk2OTk5NjQ3NjAi.79XqCB87f7Fx7ZwZqm8FkyPCQdSlQIOyummENFVOZNQ', '0', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYzk2OTk5NjQ3ZTgi.SAOyob7_vdE47mnWOsqWeS3PMXvlN_bOSMUTQxzIavY'),
(159, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2JmMDY5Mjk2MTAi.jlXk1U9jdZ-ZhjBFPsqO0Ijuj957KodtUVYg13v1Iuo', '1573732841', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2JmMDY5Mjk2ODIi.WcQstis5ynMh2V2HhcPw7c7UpJbyO1UMaGYpjb0kyMI'),
(160, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxMGUxZTc4NmUi.AU2dqYv3bHaaxXhnaQh411CNDe532ZpusPkPZJJeIxo', '0', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxMGUxZTdhZTQi.GyGf_mLJ8gKlRQclpbe2C6kJvu0c4iZ6_2cjPoUn_1s'),
(161, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxYTgwZTk2NDUi.ekzeW4oltxiGgM2ksLq-Nnku5VniVbDO24tWHI_oJMI', '0', 49, 'eyJ0eXAiOiJKV1QiLCJhbiJIUzI1NiJ9.IjVkY2MxYTgwZTk2Yjki.bhRirLpA7FTq1Pt3tJrbBetlHIwwNWa3w0b1abCeH0w'),
(162, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxYWRiYjcwZjki.wxfw-lnSumuZA9feHSxQbHrWwR5yJpUeZcLbrKa3elY', '0', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxYWRiYjcxOTAi.--GHmf4Og'),
(163, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxYjQ0YTVmYTYi.JnBzbZIKPmR-sPdp8bRH_5SHlP5y2dhzqx1RlyD4qkk', '0', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxYjQ0YTYwMjYi.-pspDt4OHD_zrF9bHlxO8'),
(164, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxYjk1OWY5M2Mi.5BtAz_Gp4qFQ9mkCX_0cVvSfoNp49qiLZkCCg6jRx8M', '0', 49, '.IjVkY2MxYjk1OWY5YzEi.RnigHhoVBw5czGOupKOnlafn5yZTp3VOwvIKb0OzqkQ'),
(165, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxYzRlMTc3ZTUi.FdPXhjcrKN6qGBOkJDkrRU-pAvhtgIXO5ATZtiihby8', '0', 49, '.IjVkY2MxYzRlMTc4Nzki.qIxtNSqWuFntfbbTw4SYbq0wJt-3wt-E-Dxdy03skzM'),
(166, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkY2MxYzg3MDI1NjUi.Q6y1unvxgIFmm5Exh9njnfXoWUkC3mrCXOYsx-X_u3o', '0', 49, '.IjVkY2MxYzg3MDI1ZmEi.a9vTUIC6UBemSQyEhzzWWbPtq8T4VubLyYPH0qW2SF4'),
(167, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZDRlMDQ2NGFhZTgi.0lD30XJe3Fz1wWdHp_DGfxXmO0iwLolBun6_bFjyuVo', '1574318534', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZDRlMDQ2NGFiNmUi.lsN_eMt9TJUZ-9kTyiWfp_DKLJzGy6gLAKGLl7DUd7g'),
(168, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGQ1OWY3Y2MxYzci.qpgMJcz-agXCwGfw__2ik7rOxBNowiSUmy9tql9Y-y8', '1574873975', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGQ1OWY3Y2MyNWQi.gyIgz80iMFTBfPEhdsOdm-B50tOYd-rdnC2SUnxEqMY'),
(169, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGUxZjNjYTYyZGUi.uICQ7VKZgIW2EY-Hfnhug7Q2lKfVQdUWQut6-CStLuw', '1574924476', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGUxZjNjYTYzODgi.BSIrl0UPcZMYZ2pkY7naQlp4xBO8Xf2zutmHzUr2exs'),
(170, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGUxZmE5ZTQyYmQi.l3Xz0qP4rSbigNrbE03CgDbAC7u1Fhf17HPFL5GG6QY', '1574924585', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGUxZmE5ZTQzNTUi.f2pZtichE0Sw-sC6FG4rLcXptvDauiOX-PVgy5DORz4'),
(171, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGUyMGQzYzU0M2Yi.6ZtrQT71CZp--_0l933L6J4fhkswL9HC0RTjpKqstsw', '1574924883', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGUyMGQzYzU0ZGMi.c7uPMB9uV3LUmc7AZgw94BpWYSt1SkE9fXsFmqv6LXg'),
(172, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGUyYmQ5YzBhNmMi.9v5QnD9sPydGq2Pa_DxemrF7cNCyJa4_m6Hkj3FWsic', '1574927705', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGUyYmQ5YzBiMGIi.lSH2pNWl9va60zhjdWtq8-0ZAMDciGIPau2d0hE4HVA'),
(173, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGU0YWJkOGNmMTci.eceDmZLiwGNDvRq-ltJfwqrWLLHKZqyIjvVH3cmofKw', '1574935613', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGU0YWJkOGQxOGUi.UOOJqtXQ-ZGma-Rw4fdMBniyqRghBaHhknr_b84eCvc'),
(174, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGU1NjdjYjJjOTci.vSiZ5j0Ntxff5nBI0cDb-M1Wcte71olGCvIHASCdk0Y', '1574938620', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZGU1NjdjYjJkNDMi.ljlX7-I8BL-nd8WBSVAoAuCf27UfBR7UNUNLnyBJszo'),
(175, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZTUyYTZkMTBhNTMi.dirzkt-EP8Y_yy2kbZyiJSQ1gC9JELMQjmjjuVmat4c', '1575386093', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZTUyYTZkMTBhZjIi.vbjiLZpQ-Vb7Mz2aju-ATlvZB4yqU_tp-hNWwFd1TJI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name_en`, `name_ar`, `image`, `gender`, `email`, `mobile_number`, `region_id`, `password`, `status`, `created_at`, `updated_at`) VALUES
(46, 'armenuhi', 'Armenuhi', 'Armenuhi', 'users_1573221726_2060943432.jpg', 1, 'armenuhi@gmail.com', '+78798984894', 19, '$2y$10$BxG5GdgCg3OJEU6/UcQB/OdhZr7i9wsEpb10aPxEL453O8OIL3cTe', 1, '2019-11-08 14:02:08', '2019-11-08 14:02:08'),
(47, 'Nareg', 'Nareg', 'Nareg', 'users_1573412571_124394344.JPG', 1, 'nareg.sfeir33@gmail.com', '70604213', 19, '$2y$10$Nh1/mUzUDeZyIJKFfmmPwOaW.eYfT9svrFxTSLKlytu5gRF7RYiH6', 1, '2019-11-10 19:02:51', '2019-11-10 19:02:51'),
(48, 'hammoudi', 'Hammoudi ', 'حمودي', 'users_1573412899_1746772845.jpg', 1, 'hammoudi@hammoudi.com', '0561265165', 20, '$2y$10$VE8Mgg5mPy6soD8yGfbJzu44Shec6aPAN5EmVfszXuEqNSPYEvGUe', 1, '2019-11-10 19:08:19', '2019-11-10 19:08:19'),
(49, 'zara', 'Zara', 'Zara', 'users_1573457813_1080898886.jpg', 0, 'zara.tunyan@gmail.com', '+37499000000000', 19, '$2y$10$JRXdPFGboJJAQYTux7dC1e9n6Mqf14g9DBta3DiuvjvpZ9y7o4FRm', 1, '2019-11-11 07:36:54', '2019-11-11 07:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `users_sport`
--

CREATE TABLE `users_sport` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_sport`
--

INSERT INTO `users_sport` (`id`, `user_id`, `sport_id`, `status`) VALUES
(31, 46, 9, 1),
(32, 46, 10, 1),
(33, 47, 9, 1),
(34, 48, 9, 1),
(35, 48, 11, 1),
(36, 49, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins_region`
--
ALTER TABLE `admins_region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `age_group`
--
ALTER TABLE `age_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `end_game`
--
ALTER TABLE `end_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referee_id` (`referee_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `end_game_best_players`
--
ALTER TABLE `end_game_best_players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `end_game_best_players_ibfk_1` (`game_id`);

--
-- Indexes for table `end_game_image`
--
ALTER TABLE `end_game_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `end_game_media`
--
ALTER TABLE `end_game_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `end_game_signature`
--
ALTER TABLE `end_game_signature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `end_game_teams`
--
ALTER TABLE `end_game_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_group_id` (`age_group_id`),
  ADD KEY `observer_id` (`observer_id`),
  ADD KEY `game_type_id` (`game_type_id`);

--
-- Indexes for table `game_regions`
--
ALTER TABLE `game_regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `region_id` (`region_id_1`),
  ADD KEY `region_id_2` (`region_id_2`);

--
-- Indexes for table `game_schools`
--
ALTER TABLE `game_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `school_id_1` (`school_id_1`),
  ADD KEY `school_id_2` (`school_id_2`);

--
-- Indexes for table `game_teams`
--
ALTER TABLE `game_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_1` (`team_1`),
  ADD KEY `team_2` (`team_2`);

--
-- Indexes for table `game_types`
--
ALTER TABLE `game_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_banner`
--
ALTER TABLE `main_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `sport_points`
--
ALTER TABLE `sport_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_type_id` (`sport_type_id`);

--
-- Indexes for table `sport_types`
--
ALTER TABLE `sport_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `students_sport`
--
ALTER TABLE `students_sport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `sport_id` (`sport_id`);

--
-- Indexes for table `students_team`
--
ALTER TABLE `students_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_id` (`sport_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users_sport`
--
ALTER TABLE `users_sport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`user_id`),
  ADD KEY `sport_id` (`sport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `admins_region`
--
ALTER TABLE `admins_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `age_group`
--
ALTER TABLE `age_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `end_game`
--
ALTER TABLE `end_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `end_game_best_players`
--
ALTER TABLE `end_game_best_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `end_game_image`
--
ALTER TABLE `end_game_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `end_game_media`
--
ALTER TABLE `end_game_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `end_game_signature`
--
ALTER TABLE `end_game_signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `end_game_teams`
--
ALTER TABLE `end_game_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `game_regions`
--
ALTER TABLE `game_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `game_schools`
--
ALTER TABLE `game_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `game_teams`
--
ALTER TABLE `game_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `game_types`
--
ALTER TABLE `game_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `main_banner`
--
ALTER TABLE `main_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sport_points`
--
ALTER TABLE `sport_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sport_types`
--
ALTER TABLE `sport_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `students_sport`
--
ALTER TABLE `students_sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `students_team`
--
ALTER TABLE `students_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users_sport`
--
ALTER TABLE `users_sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins_region`
--
ALTER TABLE `admins_region`
  ADD CONSTRAINT `admins_region_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_region_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coaches`
--
ALTER TABLE `coaches`
  ADD CONSTRAINT `coaches_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `end_game`
--
ALTER TABLE `end_game`
  ADD CONSTRAINT `end_game_ibfk_1` FOREIGN KEY (`referee_id`) REFERENCES `referees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `end_game_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `end_game_best_players`
--
ALTER TABLE `end_game_best_players`
  ADD CONSTRAINT `end_game_best_players_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `end_game_image`
--
ALTER TABLE `end_game_image`
  ADD CONSTRAINT `end_game_image_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `end_game_media`
--
ALTER TABLE `end_game_media`
  ADD CONSTRAINT `end_game_media_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `end_game_signature`
--
ALTER TABLE `end_game_signature`
  ADD CONSTRAINT `end_game_signature_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `end_game_teams`
--
ALTER TABLE `end_game_teams`
  ADD CONSTRAINT `end_game_teams_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `end_game_teams_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`age_group_id`) REFERENCES `age_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`observer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_ibfk_3` FOREIGN KEY (`game_type_id`) REFERENCES `game_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game_regions`
--
ALTER TABLE `game_regions`
  ADD CONSTRAINT `game_regions_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_regions_ibfk_2` FOREIGN KEY (`region_id_1`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_regions_ibfk_3` FOREIGN KEY (`region_id_2`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game_schools`
--
ALTER TABLE `game_schools`
  ADD CONSTRAINT `game_schools_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_schools_ibfk_2` FOREIGN KEY (`school_id_1`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_schools_ibfk_3` FOREIGN KEY (`school_id_2`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game_teams`
--
ALTER TABLE `game_teams`
  ADD CONSTRAINT `game_teams_ibfk_1` FOREIGN KEY (`team_1`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_teams_ibfk_2` FOREIGN KEY (`team_2`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `referees`
--
ALTER TABLE `referees`
  ADD CONSTRAINT `referees_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schools_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sport_points`
--
ALTER TABLE `sport_points`
  ADD CONSTRAINT `sport_points_ibfk_1` FOREIGN KEY (`sport_type_id`) REFERENCES `sport_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_sport`
--
ALTER TABLE `students_sport`
  ADD CONSTRAINT `students_sport_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_sport_ibfk_2` FOREIGN KEY (`sport_id`) REFERENCES `sport_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_team`
--
ALTER TABLE `students_team`
  ADD CONSTRAINT `students_team_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_team_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_sport`
--
ALTER TABLE `users_sport`
  ADD CONSTRAINT `users_sport_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_sport_ibfk_2` FOREIGN KEY (`sport_id`) REFERENCES `sport_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
