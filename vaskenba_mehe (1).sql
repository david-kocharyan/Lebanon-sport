-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2019 at 09:48 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `first_name`, `last_name`, `mobile_number`, `email`, `role`, `password`, `active`, `created_at`, `updated_at`) VALUES
(37, 'admin', 'admin', 'admin', '+1000000000', 'admin@gmail.com', '2', 'c9cc24ffa63b25bb52b9d5fa288c2921a5190acd2ad461e2ece7b7d74af0fa53c86b783a066fc1ad3694313345702e69f57d70a597f7fbbf78dfc957d3bcdea9', '1', '2019-10-21 21:00:08', '2019-10-21 21:00:08'),
(38, 'pargev', 'Pargev', 'Aghabekyan', '+90000000000', 'pargev@gmail.com', '1', '32b70b41827206bc07f988aa53322d428a4ecb43a60c9e0f01fb994e3466a9fb798e4902a97785507f9b34f48bbf9969a6e45419aa0b852e04b8bb6500de74d4', '1', '2019-10-21 21:21:40', '2019-10-21 21:21:40'),
(39, 'vache', 'Vache', 'Panosyan', '+90000000000000', 'vache@gmail.com', '1', 'f78021a3bfcbd6c34d0d2eb81a0a291d286c45ad95a8b7787376ff78c5deb230d65e873454f96efcda8c441681e1391e3f61d1e4e0b9c076834f32212004f437', '1', '2019-10-21 21:23:33', '2019-10-21 21:23:33'),
(40, 'gevor', 'Gevor', 'Kocharyan', '+800000000000', 'gevor@aimtech.am', '1', '85d3da52f8cbb6e75a6282e65086593efdc3627cadd0f4207c4d8c9e1a54436685ad063171c6b2636e1adeae0764a7c726a7ce53f0dcf7243714a207947a12d9', '1', '2019-10-21 21:24:04', '2019-10-21 21:24:04'),
(41, 'david', 'David', 'Kocharayan', '+37499000000000', 'david@gmail.com', '1', '0cccb543dab94b13f968b4d33acb7627cdc6c381eeecc17970471ebcf1bc9aa9cb768e09edeb045fe6dbcb5994603d6acb570941c54a6530db2bf9a3edceaf50', '1', '2019-10-21 21:25:09', '2019-10-21 21:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `admins_region`
--

CREATE TABLE `admins_region` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins_region`
--

INSERT INTO `admins_region` (`id`, `admin_id`, `region_id`, `status`) VALUES
(10, 38, 17, 1),
(11, 39, 11, 1),
(12, 39, 12, 1),
(13, 39, 13, 1),
(14, 40, 15, 1),
(15, 41, 12, 1),
(16, 41, 16, 1),
(17, 41, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `age_group`
--

CREATE TABLE `age_group` (
  `id` int(11) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age_group`
--

INSERT INTO `age_group` (`id`, `from`, `to`, `status`) VALUES
(7, 6, 8, 1),
(8, 8, 10, 1),
(9, 10, 12, 1),
(10, 12, 14, 1),
(11, 14, 16, 1),
(12, 16, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `text_en` varchar(255) NOT NULL,
  `text_ar` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title_en`, `title_ar`, `text_en`, `text_ar`, `status`) VALUES
(25, 'Lorem', 'Lorem', 'Lorem Ipsum Dolor Set Amet', 'Lorem Ipsum Dolor Set Amet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_id`, `image`, `status`) VALUES
(31, 25, 'blog_1572610204_5dbc209c96f4b.jpg', 1),
(32, 25, 'blog_1572610204_5dbc209c9a0dd.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `school_id`, `name_en`, `name_ar`, `gender`, `status`) VALUES
(3, 10, 'Ziggs', 'Ziggs', 1, 1),
(4, 9, 'Karma', 'Karma', 0, 1),
(5, 11, 'Zed', 'Zed', 1, 1);

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
  `info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_game`
--

INSERT INTO `end_game` (`id`, `game_id`, `team_1_id`, `team_2_id`, `score_1`, `score_2`, `referee_id`, `info`) VALUES
(125, 14, 23, 23, 2, 2, 5, 0),
(126, 15, 21, 23, 0, 0, NULL, 0),
(127, 15, 21, 23, 3, 3, 6, 0),
(128, 15, 21, 23, 0, 0, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `end_game_best_players`
--

CREATE TABLE `end_game_best_players` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_game_best_players`
--

INSERT INTO `end_game_best_players` (`id`, `game_id`, `student_id`) VALUES
(247, 14, 10),
(248, 14, 10),
(249, 15, 10),
(250, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `end_game_image`
--

CREATE TABLE `end_game_image` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `end_game_media`
--

CREATE TABLE `end_game_media` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `media` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `end_game_signature`
--

CREATE TABLE `end_game_signature` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_game_signature`
--

INSERT INTO `end_game_signature` (`id`, `game_id`, `name`, `image`) VALUES
(67, 14, 'hdshhs', 'signature_1572612060_5dbc27dcbd01f.955472'),
(68, 15, 'fr', 'signature_1572613091_5dbc2be3242ae.438822'),
(69, 15, 'Username', 'signature_1572614394_5dbc30fa2123a.8757172');

-- --------------------------------------------------------

--
-- Table structure for table `end_game_teams`
--

CREATE TABLE `end_game_teams` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_game_teams`
--

INSERT INTO `end_game_teams` (`id`, `game_id`, `team_id`, `student_id`) VALUES
(243, 14, 23, 10),
(244, 14, 23, 10),
(245, 15, 21, 10),
(246, 15, 23, 10),
(247, 15, 23, 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `place`, `time`, `age_group_id`, `observer_id`, `game_type_id`, `sport_type`, `gender`, `status`, `active`, `for_site`) VALUES
(13, 'Paris', '1572728400', 7, 43, 5, 5, 2, 1, 1, 0),
(14, 'Paris', '1572728400', 7, 42, 6, 5, 2, 1, 0, 1),
(15, 'Paris', '1572649200', 7, 42, 6, 5, 2, 1, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_regions`
--

INSERT INTO `game_regions` (`id`, `game_id`, `region_id_1`, `region_id_2`, `status`) VALUES
(11, 13, 12, 12, 1),
(12, 14, 12, 12, 1),
(13, 15, 12, 12, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_schools`
--

INSERT INTO `game_schools` (`id`, `game_id`, `school_id_1`, `school_id_2`, `status`) VALUES
(14, 13, 9, 9, 1),
(15, 14, 9, 9, 1),
(16, 15, 9, 9, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_teams`
--

INSERT INTO `game_teams` (`id`, `game_id`, `team_1`, `team_2`, `status`) VALUES
(7, 10, 21, 21, 1),
(8, 11, 21, 21, 1),
(9, 12, 21, 21, 1),
(10, 13, 21, 21, 1),
(11, 14, 23, 23, 1),
(12, 15, 21, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_types`
--

CREATE TABLE `game_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_types`
--

INSERT INTO `game_types` (`id`, `type`, `status`) VALUES
(5, 'Final', 1),
(6, 'Semi-final', 1),
(7, 'quarter-final', 1),
(8, 'knock-out', 1);

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referees`
--

INSERT INTO `referees` (`id`, `name_en`, `name_ar`, `mobile_number`, `count`, `status`) VALUES
(5, 'Ararat Minasyan', 'Ararat Minasyan', '-874845745', 0, '1'),
(6, 'Minas Araratyan', 'Minas Araratyan', '-9875478512385', 0, '1'),
(7, 'Velkoz Serobyan', 'Velkoz Serobyan', '-985412485584', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_en`, `name_ar`, `status`) VALUES
(11, 'Beirut', 'Beirut', 1),
(12, 'Mount Lebanon ', 'Mount Lebanon ', 1),
(13, 'Beqaa', 'Beqaa', 1),
(14, 'Baalbak-Hermel', 'Baalbak-Hermel', 1),
(15, 'South Lebanon', 'South Lebanon', 1),
(16, 'North Lebanon', 'North Lebanon', 1),
(17, 'Nabatiyeh', 'Nabatiyeh', 1),
(18, 'Aakkar', 'Aakkar', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name_en`, `name_ar`, `address_en`, `address_ar`, `image`, `status`, `admin_id`, `region_id`) VALUES
(9, 'EPH', 'EPH', 'Amiryna 12', 'Amiryna 12', 'school_1571665461_512620802.jpg', 1, 39, 12),
(10, 'HPTH', 'HPTH', 'Eritasardakan', 'Eritasardakan', 'school_1571665489_702288273.jpg', 1, 40, 15),
(11, 'Politexnik', 'Politexnik', 'liningradyan 78', 'liningradyan 78', 'school_1571665533_559336288.jpg', 1, 41, 18);

-- --------------------------------------------------------

--
-- Table structure for table `sport_points`
--

CREATE TABLE `sport_points` (
  `id` int(11) NOT NULL,
  `sport_type_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport_points`
--

INSERT INTO `sport_points` (`id`, `sport_type_id`, `value`, `status`) VALUES
(8, 5, 1, 0),
(9, 5, 2, 0),
(10, 5, 3, 0),
(11, 6, 1, 1),
(12, 7, 1, 1),
(13, 8, 1, 0);

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
  `status` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport_types`
--

INSERT INTO `sport_types` (`id`, `name_en`, `name_ar`, `desc_en`, `desc_ar`, `image`, `status`) VALUES
(5, 'Basketball', 'Basketball', 'Basketball', 'Basketball', 'sport_1571660255_348054311.png', '1'),
(6, 'Football', 'Football', 'Football', 'Football', 'sport_1571660284_1338845258.png', '1'),
(7, 'Volleyball', 'Volleyball', 'Volleyball', 'Volleyball', 'sport_1571660304_1278744736.png', '1'),
(8, 'Handball', 'Handball', 'Handball', 'Handball', 'sport_1571660440_120311081.jpg', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `name_en`, `name_ar`, `birthday`, `gender`, `image`, `status`) VALUES
(10, 9, 'Mamikon', 'Mamikon', '2013-09-11', '1', 'student_1571665862_1170190584.jpg', 1),
(11, 9, 'Lara', 'Lara', '2013-07-23', '0', 'student_1571665905_1562809044.jpg', 1),
(12, 9, 'Valera', 'Valera', '2014-07-15', '1', 'student_1571665930_1383641723.jpg', 1),
(13, 9, 'Karolina', 'Karolina', '2014-07-16', '1', 'student_1571665958_479206101.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_sport`
--

CREATE TABLE `students_sport` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_sport`
--

INSERT INTO `students_sport` (`id`, `student_id`, `sport_id`, `status`) VALUES
(14, 10, 5, 1),
(15, 11, 5, 1),
(16, 12, 5, 1),
(17, 12, 6, 1),
(18, 13, 5, 1),
(19, 13, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_team`
--

CREATE TABLE `students_team` (
  `id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_team`
--

INSERT INTO `students_team` (`id`, `team_id`, `student_id`, `status`) VALUES
(19, 21, 10, 1),
(20, 21, 11, 1),
(21, 22, 11, 1),
(22, 23, 10, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `age_id`, `gender`, `sport_id`, `school_id`, `status`) VALUES
(21, 'EPH-both/6 - 8/Basketball', '7', '2', 5, 9, 1),
(22, 'EPH-female/6 - 8/Basketball', '7', '0', 5, 9, 1),
(23, 'EPH-both/6 - 8/Basketball', '7', '2', 5, 9, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `time`, `user_id`, `refresh_token`) VALUES
(142, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYjE0MDA5YWFkYzQi.P2Jq_3n1SjedSUX0H1R7VlQ3YVZ5pgSVAUlMTHsNx4Y', '1571983753', 42, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYjE0MDA5YWFlMGUi.tJZEYlkACsG9412qMW_EF76p5Ol_WwCRrRTrwwS-YYA'),
(143, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYjFhMjNiNjQwMDUi._IZa4kmj3eP9NaDmWQSLKC0ue-p7RJcZKMo8Y6fkvk4', '1572008891', 42, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYjFhMjNiNjQwMjgi.tNJFACLNyPJUxSxwUWw-qPyr07MQNenzdIDNEWov9CQ'),
(144, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYjY5ZjNjMzRjMjEi.oDxI336dimdMiSOdULXXgGC6m3y0-CGSOxWTHDRze_k', '1572335804', 42, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYjY5ZjNjMzRjNDIi.CaiDhq6NeArxXINHCn_hsE8vYA2WUKJdbni0MmobjwQ'),
(145, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyMGM1NjQ1YTEi.4Dj2tvNAVGAhQJDG6BOFbyiFur85fnHEM06K0q0UIyE', '1572696645', 43, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyMGM1NjQ2NDUi.yZZMvSmZBBOr6Zs1ZVRE3-SS67g8ZDftVUoVr5vNnDs'),
(146, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyMTI1NjczN2Yi.KBjilcaWu6iibbafR39dpjC92lQktRvfdr0d6wmmzwM', '1572696741', 42, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyMTI1Njc0MWUi.-UYxcYKDXKknsT4vKrYS_VaJ59vDCLvcK7bmOYDpNbI'),
(147, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyMTY2OTBiYjIi.B4BFcdiJhlOtkamzv4nZg7iOI_uC0tkG8mYHU8SUEdU', '1572696806', 43, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyMTY2OTBjNTIi.bfAYDC3sGOQ5sw87KU6SaDzqSxJ8inwILwOrFMLRVP4'),
(148, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyMzcyNTc5ZjIi.zAZGQPYEO_WxzxYU96vd6Mt8DaX5U7t_No4Elnm3ehk', '1572697330', 42, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyMzcyNTdhOGQi.raOhIUTD9r_fen760aJ1gE6sa4rX_uevIj7IubfSK-g'),
(149, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyM2NjOWY1ZTEi.36TEy6oruNG1ILwd-UPXuFR-IEElTtUoxJCnjNogdhw', '1572697420', 42, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyM2NjOWY2ODci.Vm7F6QxzsZBBmGAOaVbK8kRtJmJcl_sYWiKgCjhNlmo'),
(150, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyNDQ0Mjc4OGUi.mJYf_cxWT07IoA0YboA5cTLkZpgXkta3Sldt6kzPfUc', '1572697540', 43, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyNDQ0Mjc5NTEi.MQhNTxnnD1znGxtxULA_FtVEpkI6PgNmpnNUcNQgBpk'),
(151, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyNGI5YTlhMTci.bT4nfUFNRipPwjlXODa2n4VESHBQByMk7TkZqFAPGJU', '1572697657', 43, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyNGI5YTlhYjYi.TnZ4DCL_3hHSNYvbZCKN66ZFYviH1ZHH5gXFtYJ9zu8'),
(152, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyNjI0MmQwMWQi.M0V5KbE2Gw8PWzP29ozNefa4VcS9kjxuiz7vumgFlh0', '1572698020', 43, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMyNjI0MmQxZjIi.5Igax3-QyfFzKSOHgNmubyaqkBAJ7RGk_ZJLwlTCGrA'),
(153, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMzMjM5MTJkNmIi.YJ4zKlA0_zdWl1T8H4a3x8Bh4P1o7KbDiJQfehRkxms', '1572701113', 43, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkYmMzMjM5MTJlMTci.NAq8fBTRXVMKext3866uvhRWclXfFVL2Dl3-Nk2k260');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name_en`, `name_ar`, `gender`, `email`, `mobile_number`, `region_id`, `password`, `status`, `created_at`, `updated_at`) VALUES
(42, 'armenuhi', 'Armenuhi', 'Armenuhi', 0, 'armenuhi@gmail.com', '+9788888888888888888888', 12, '$2y$10$7cknx4EeiJX7FEPokxh3buU7eIVW1s83BRBarpLQU/p.EKjeL/ArG', 1, '2019-10-22 15:21:45', '2019-10-22 15:21:45'),
(43, 'zara', 'Zara', 'Zara', 0, 'zara.tunyan@gmail.com', '+85456877878787878787878787878', 12, '$2y$10$9R9xWg8oMW0wvE3Oi12dOODS2mtVDLLhfmZh9V.vF3bMcBFJS2qPG', 1, '2019-10-22 15:22:37', '2019-10-22 15:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `users_sport`
--

CREATE TABLE `users_sport` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_sport`
--

INSERT INTO `users_sport` (`id`, `user_id`, `sport_id`, `status`) VALUES
(17, 42, 5, 1),
(18, 42, 6, 1),
(19, 42, 7, 1),
(20, 42, 8, 1),
(21, 43, 5, 1),
(22, 43, 6, 1),
(23, 43, 7, 1),
(24, 43, 8, 1);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `game_id` (`game_id`);

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
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `admins_region`
--
ALTER TABLE `admins_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `age_group`
--
ALTER TABLE `age_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `end_game`
--
ALTER TABLE `end_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `end_game_best_players`
--
ALTER TABLE `end_game_best_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `end_game_image`
--
ALTER TABLE `end_game_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `end_game_media`
--
ALTER TABLE `end_game_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `end_game_signature`
--
ALTER TABLE `end_game_signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `end_game_teams`
--
ALTER TABLE `end_game_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `game_regions`
--
ALTER TABLE `game_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `game_schools`
--
ALTER TABLE `game_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `game_teams`
--
ALTER TABLE `game_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `game_types`
--
ALTER TABLE `game_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sport_points`
--
ALTER TABLE `sport_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sport_types`
--
ALTER TABLE `sport_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students_sport`
--
ALTER TABLE `students_sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students_team`
--
ALTER TABLE `students_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users_sport`
--
ALTER TABLE `users_sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `end_game_teams_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
