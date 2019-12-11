-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2019 at 06:06 AM
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
(46, 'vasken', 'Vasken', 'Bakkalian', '55023420', 'vaskenbakkalian@gmail.com', '1', '42f0f66c454c90789939115800028418809e01be26d808dca31c4a96788a1cbc413b90bb1e3b1801930f00b8018cde9abb8fc13aea8a81dba3e9290e7d5d7c8a', '1', '2019-11-10 18:52:10', '2019-11-10 18:52:10'),
(47, 'lichaa', 'Lichaa', 'Tarabay', '714567890', 'lichaa@nova4lb.com', '1', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1', '2019-12-09 08:54:09', '2019-12-09 08:54:09');

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
(21, 46, 20, 1),
(22, 47, 19, 1),
(23, 47, 20, 1);

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

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title_en`, `title_ar`, `text_en`, `text_ar`, `landscape`, `status`) VALUES
(38, 'What is Lorem Ipsum?', 'ما هو ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\nلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\nلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\n', 'landscape_1575883302_1417475550.jpg', 1),
(39, 'What is Lorem Ipsum?', 'ما هو ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\nلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\nلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\n', 'landscape_1575883541_1371155798.jpg', 1),
(40, 'What is Lorem Ipsum?', 'ما هو', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\nلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\nلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n\r\n', 'landscape_1575883619_1567778393.jpg', 1),
(41, 'New Topic', 'Topic new', 'Lorem ipsum dolor set a met', 'Lorem ipsum dolor set a met', 'landscape_1575995417_404402485.jpg', 0),
(42, 'Lorem', 'Lorem', 'lorem', 'lorem', 'landscape_1575970906_1592689156.jpg', 0),
(43, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'landscape_1575995631_860081780.jpg', 1);

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

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `blog_id`, `image`, `status`) VALUES
(47, 40, 'blog_1575883619_5dee1363a7407.jpg', 1),
(48, 39, 'blog_1575884120_5dee15588db1a.jpg', 1),
(49, 41, 'blog_1575970294_5def65f65d40c.jpg', 1),
(50, 42, 'blog_1575970906_5def685a313fc.jpg', 1),
(51, 43, 'blog_1575974840_5def77b86dece.jpg', 1),
(52, 38, 'blog_1575980141_5def8c6db9769.jpg', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `end_game_best_players`
--

CREATE TABLE `end_game_best_players` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(15, 'Saida National School ', 'مدرسة صيدا الوطنية', 'Saida ', 'صيدا ', 'school_1573412185_699537170.jpg', 1, 46, 20),
(16, 'NOVA4', 'نوفا4', 'Sin El Fill', 'سن الفيل', 'school_1575881713_1918550844.png', 1, 47, 19),
(17, 'NOVA4-1', 'سن الفيل11', 'Horsh Tabet', 'سن الفيل', 'school_1575881761_2001126616.png', 1, 47, 19);

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
(37, 12, 'Sarkis', 'Sarkis', '2010-03-10', '1', 'student_1576064437_237552665.jpg', 1),
(38, 13, 'pargev', 'Pargev', '2010-12-16', '1', 'student_1576064513_1632865151.jpg', 1);

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
(48, 37, 9, 1),
(49, 38, 9, 1);

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
(1, 1, 37, 1),
(2, 2, 38, 1);

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
(1, 'Fizmat-male/8-10/Basketball', '14', '1', 9, 12, 1),
(2, 'Qvant-male/8-10/Basketball', '14', '1', 9, 13, 1);

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
(157, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZWRmMmU0M2E0OGEi.z0jNprsYEMFGGztZXNf8mpYXk6uq7K9ae0zorfQEGy0', '1575961700', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZWRmMmU0M2E1MDMi.vs2EqUs64juHwHCW2aJADCqKXqdn_80XCxJvDIEd-gU'),
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
(175, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZTUyYTZkMTBhNTMi.dirzkt-EP8Y_yy2kbZyiJSQ1gC9JELMQjmjjuVmat4c', '1575386093', 49, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZTUyYTZkMTBhZjIi.vbjiLZpQ-Vb7Mz2aju-ATlvZB4yqU_tp-hNWwFd1TJI'),
(176, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZjBjNDM1YjI2YzUi.wLrkHlxcX0VAnb9QIDW_3hVvWjiFGM-NgEcMEWCK9T4', '1576146357', 46, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjVkZjBjNDM1YjI3NDQi.Fpx7vvrM7mRYBosiFzdczTkNUU5lNZYeo0WIZs3KKFU');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `admins_region`
--
ALTER TABLE `admins_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `age_group`
--
ALTER TABLE `age_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `end_game`
--
ALTER TABLE `end_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `end_game_best_players`
--
ALTER TABLE `end_game_best_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `end_game_image`
--
ALTER TABLE `end_game_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `end_game_media`
--
ALTER TABLE `end_game_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `end_game_signature`
--
ALTER TABLE `end_game_signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `end_game_teams`
--
ALTER TABLE `end_game_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_regions`
--
ALTER TABLE `game_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_schools`
--
ALTER TABLE `game_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_teams`
--
ALTER TABLE `game_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `students_sport`
--
ALTER TABLE `students_sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `students_team`
--
ALTER TABLE `students_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

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
