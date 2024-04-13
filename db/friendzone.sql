-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 01, 2024 at 09:22 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00"; 


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(3, 5, 3, 'lol', '2024-04-01 17:51:27'),
(13, 5, 3, 'haha', '2024-04-01 18:36:40'),
(14, 5, 3, 'classic', '2024-04-01 18:36:46'),
(36, 57, 46, 'Nice one, mate!', '2024-04-07 16:20:35'),
(37, 59, 47, 'Bloody brilliant!', '2024-04-07 16:20:35'),
(38, 60, 48, 'Cracking job, lad!', '2024-04-07 16:20:35'),
(39, 61, 49, 'Cheers, bruv!', '2024-04-07 16:20:35'),
(40, 62, 50, 'Oi oi, top stuff!', '2024-04-07 16:20:35'),
(41, 63, 51, 'Smashing work, guv!', '2024-04-07 16:20:35'),
(42, 64, 52, 'Proper lol!', '2024-04-07 16:20:35'),
(43, 65, 53, 'Haha, cheeky!', '2024-04-07 16:20:35'),
(44, 66, 54, 'Cor blimey, that\'s quality!', '2024-04-07 16:20:35'),
(45, 67, 55, 'Congrats, me old mucker!', '2024-04-07 16:20:35'),
(46, 68, 56, 'Spot on, innit?', '2024-04-07 16:20:35'),
(47, 69, 57, 'Banter!', '2024-04-07 16:20:35'),
(48, 70, 58, 'You\'re having a laugh!', '2024-04-07 16:20:35'),
(49, 71, 59, 'Sorted, fam!', '2024-04-07 16:20:35'),
(50, 72, 60, 'Wicked!', '2024-04-07 16:20:35'),
(51, 73, 46, 'Belter!', '2024-04-07 16:20:35'),
(52, 74, 47, 'Cushty!', '2024-04-07 16:20:35'),
(53, 75, 48, 'Good on ya, mate!', '2024-04-07 16:20:35'),
(54, 76, 49, 'Mint!', '2024-04-07 16:20:35'),
(55, 77, 50, 'Bonkers but brilliant!', '2024-04-07 16:20:35'),
(56, 78, 51, 'Ace!', '2024-04-07 16:20:35'),
(57, 79, 52, 'Tidy!', '2024-04-07 16:20:35'),
(58, 57, 53, 'Cheeky bugger!', '2024-04-07 16:20:35'),
(59, 58, 54, 'Nailed it!', '2024-04-07 16:20:35'),
(60, 59, 55, 'Crikey!', '2024-04-07 16:20:35'),
(61, 60, 56, 'Blimey, that\'s a corker!', '2024-04-07 16:20:35'),
(62, 61, 57, 'Brilliant banter!', '2024-04-07 16:20:35'),
(63, 62, 58, 'Cracking stuff!', '2024-04-07 16:20:35'),
(64, 63, 59, 'Top banana!', '2024-04-07 16:20:35'),
(65, 64, 60, 'Absolute madness!', '2024-04-07 16:20:35'),
(66, 57, 46, 'Nice one, mate!', '2024-04-07 16:22:31'),
(67, 59, 47, 'Bloody brilliant!', '2024-04-07 16:22:31'),
(68, 60, 48, 'Cracking job, lad!', '2024-04-07 16:22:31'),
(69, 61, 49, 'Cheers, bruv!', '2024-04-07 16:22:31'),
(70, 62, 50, 'Oi oi, top stuff!', '2024-04-07 16:22:31'),
(71, 63, 51, 'Smashing work, guv!', '2024-04-07 16:22:31'),
(72, 64, 52, 'Proper lol!', '2024-04-07 16:22:31'),
(73, 65, 53, 'Haha, cheeky!', '2024-04-07 16:22:31'),
(74, 66, 54, 'Cor blimey, that\'s quality!', '2024-04-07 16:22:31'),
(75, 67, 55, 'Congrats, me old mucker!', '2024-04-07 16:22:31'),
(76, 68, 56, 'Spot on, innit?', '2024-04-07 16:22:31'),
(77, 69, 57, 'Banter!', '2024-04-07 16:22:31'),
(78, 70, 58, 'You\'re having a laugh!', '2024-04-07 16:22:31'),
(79, 71, 59, 'Sorted, fam!', '2024-04-07 16:22:31'),
(80, 72, 60, 'Wicked!', '2024-04-07 16:22:31'),
(81, 73, 46, 'Belter!', '2024-04-07 16:22:31'),
(82, 74, 47, 'Cushty!', '2024-04-07 16:22:31'),
(83, 75, 48, 'Good on ya, mate!', '2024-04-07 16:22:31'),
(84, 76, 49, 'Mint!', '2024-04-07 16:22:31'),
(85, 77, 50, 'Bonkers but brilliant!', '2024-04-07 16:22:31'),
(86, 78, 51, 'Ace!', '2024-04-07 16:22:31'),
(87, 79, 52, 'Tidy!', '2024-04-07 16:22:31'),
(88, 57, 53, 'Cheeky bugger!', '2024-04-07 16:22:31'),
(89, 58, 54, 'Nailed it!', '2024-04-07 16:22:31'),
(90, 59, 55, 'Crikey!', '2024-04-07 16:22:31'),
(91, 60, 56, 'Blimey, that\'s a corker!', '2024-04-07 16:22:31'),
(92, 61, 57, 'Brilliant banter!', '2024-04-07 16:22:31'),
(93, 62, 58, 'Cracking stuff!', '2024-04-07 16:22:31'),
(94, 63, 59, 'Top banana!', '2024-04-07 16:22:31'),
(95, 64, 60, 'Absolute madness!', '2024-04-07 16:22:31'),
(96, 65, 46, 'Daft but decent!', '2024-04-07 16:22:31'),
(97, 66, 47, 'Gave it some welly, eh?', '2024-04-07 16:22:31'),
(98, 67, 48, 'Bodge job but it works!', '2024-04-07 16:22:31'),
(99, 68, 49, 'Proper job, lad!', '2024-04-07 16:22:31'),
(100, 69, 50, 'Knees up, mother brown!', '2024-04-07 16:22:31'),
(101, 70, 51, 'Apples and pears!', '2024-04-07 16:22:31'),
(102, 71, 52, 'Bob\'s your uncle!', '2024-04-07 16:22:31'),
(103, 72, 53, 'Brill, mate!', '2024-04-07 16:22:31'),
(104, 73, 54, 'Chuffed to bits!', '2024-04-07 16:22:31'),
(105, 74, 55, 'Codswallop!', '2024-04-07 16:22:31'),
(106, 75, 56, 'Crackers!', '2024-04-07 16:22:31'),
(107, 76, 57, 'Cup of rosie lee?', '2024-04-07 16:22:31'),
(108, 77, 58, 'Damned good show!', '2024-04-07 16:22:31'),
(109, 78, 59, 'Dibdabs!', '2024-04-07 16:22:31'),
(110, 79, 60, 'Donkey\'s years!', '2024-04-07 16:22:31'),
(111, 57, 46, 'Eton mess!', '2024-04-07 16:22:31'),
(112, 58, 47, 'Faff about!', '2024-04-07 16:22:31'),
(113, 59, 48, 'Fair play to you!', '2024-04-07 16:22:31'),
(114, 60, 49, 'Fancy a brew?', '2024-04-07 16:22:31'),
(115, 61, 50, 'Fiddlesticks!', '2024-04-07 16:22:31'),
(116, 57, 46, 'Nice one, mate!', '2024-04-07 16:24:46'),
(117, 59, 47, 'Bloody brilliant!', '2024-04-07 16:24:46'),
(118, 60, 48, 'Cracking job, lad!', '2024-04-07 16:24:46'),
(119, 61, 49, 'Cheers, bruv!', '2024-04-07 16:24:46'),
(120, 62, 50, 'Oi oi, top stuff!', '2024-04-07 16:24:46'),
(121, 63, 51, 'Smashing work, guv!', '2024-04-07 16:24:46'),
(122, 64, 52, 'Proper lol!', '2024-04-07 16:24:46'),
(123, 65, 53, 'Haha, cheeky!', '2024-04-07 16:24:46'),
(124, 66, 54, 'Cor blimey, that\'s quality!', '2024-04-07 16:24:46'),
(125, 67, 55, 'Congrats, me old mucker!', '2024-04-07 16:24:46'),
(126, 68, 56, 'Spot on, innit?', '2024-04-07 16:24:46'),
(127, 69, 57, 'Banter!', '2024-04-07 16:24:46'),
(128, 70, 58, 'You\'re having a laugh!', '2024-04-07 16:24:46'),
(129, 71, 59, 'Sorted, fam!', '2024-04-07 16:24:46'),
(130, 72, 60, 'Wicked!', '2024-04-07 16:24:46'),
(131, 73, 46, 'Daft but decent!', '2024-04-07 16:24:46'),
(132, 74, 47, 'Gave it some welly, eh?', '2024-04-07 16:24:46'),
(133, 75, 48, 'Bodge job but it works!', '2024-04-07 16:24:46'),
(134, 76, 49, 'Proper job, lad!', '2024-04-07 16:24:46'),
(135, 77, 50, 'Knees up, mother brown!', '2024-04-07 16:24:46'),
(136, 78, 51, 'Apples and pears!', '2024-04-07 16:24:46'),
(137, 79, 52, 'Bob\'s your uncle!', '2024-04-07 16:24:46'),
(138, 57, 53, 'Brill, mate!', '2024-04-07 16:24:46'),
(139, 58, 54, 'Chuffed to bits!', '2024-04-07 16:24:46'),
(140, 59, 55, 'Codswallop!', '2024-04-07 16:24:46'),
(141, 60, 56, 'Crackers!', '2024-04-07 16:24:46'),
(142, 61, 57, 'Cup of rosie lee?', '2024-04-07 16:24:46'),
(143, 62, 58, 'Damned good show!', '2024-04-07 16:24:46'),
(144, 63, 59, 'Dibdabs!', '2024-04-07 16:24:46'),
(145, 64, 60, 'Donkey\'s years!', '2024-04-07 16:24:46'),
(146, 65, 46, 'Eton mess!', '2024-04-07 16:24:46'),
(147, 66, 47, 'Faff about!', '2024-04-07 16:24:46'),
(148, 67, 48, 'Fair play to you!', '2024-04-07 16:24:46'),
(149, 68, 49, 'Fancy a brew?', '2024-04-07 16:24:46'),
(150, 69, 50, 'Fiddlesticks!', '2024-04-07 16:24:46'),
(151, 70, 51, 'Knees up!', '2024-04-07 16:24:46'),
(152, 71, 52, 'Alrighty then!', '2024-04-07 16:24:46'),
(153, 72, 53, 'Bite your arm!', '2024-04-07 16:24:46'),
(154, 73, 54, 'Bog roll!', '2024-04-07 16:24:46'),
(155, 74, 55, 'Brass monkeys!', '2024-04-07 16:24:46'),
(156, 75, 56, 'Bubble bath!', '2024-04-07 16:24:46'),
(157, 76, 57, 'Chucking a sickie!', '2024-04-07 16:24:46'),
(158, 77, 58, 'Cockney rhyming slang!', '2024-04-07 16:24:46'),
(159, 78, 59, 'Codgers!', '2024-04-07 16:24:46'),
(160, 79, 60, 'Crikey, mate!', '2024-04-07 16:24:46'),
(161, 83, 3, 'Nice cant wait', '2024-04-07 16:34:17'),
(162, 87, 66, 'well done Will, prod of you mate ', '2024-04-07 17:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`) VALUES
(1, 3, 4),
(4, 3, 5),
(5, 3, 46);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(3, 5, 5),
(215, 46, 57),
(216, 46, 58),
(217, 46, 59),
(218, 46, 60),
(219, 46, 61),
(220, 47, 62),
(221, 47, 63),
(222, 47, 64),
(223, 47, 65),
(224, 47, 66),
(225, 48, 67),
(226, 48, 68),
(227, 48, 69),
(228, 48, 70),
(229, 48, 71),
(230, 49, 72),
(231, 49, 73),
(232, 49, 74),
(233, 49, 75),
(234, 49, 76),
(235, 50, 77),
(236, 50, 78),
(237, 50, 79),
(238, 51, 57),
(239, 51, 58),
(240, 51, 59),
(241, 51, 60),
(242, 51, 61),
(243, 52, 62),
(244, 52, 63),
(245, 52, 64),
(246, 52, 65),
(247, 52, 66),
(248, 53, 67),
(249, 53, 68),
(250, 53, 69),
(251, 53, 70),
(252, 53, 71),
(253, 54, 72),
(254, 54, 73),
(255, 54, 74),
(256, 54, 75),
(257, 54, 76),
(258, 55, 77),
(259, 55, 78),
(260, 55, 79),
(261, 56, 57),
(262, 56, 58),
(263, 56, 59),
(264, 56, 60),
(265, 56, 61),
(266, 57, 62),
(267, 57, 63),
(268, 57, 64),
(269, 57, 65),
(270, 57, 66),
(271, 58, 67),
(272, 58, 68),
(273, 58, 69),
(274, 58, 70),
(275, 58, 71),
(276, 59, 72),
(277, 59, 73),
(278, 59, 74),
(279, 59, 75),
(280, 59, 76),
(281, 60, 77),
(282, 60, 78),
(283, 60, 79),
(284, 46, 62),
(285, 46, 63),
(286, 46, 64),
(287, 46, 65),
(288, 46, 66),
(289, 47, 67),
(290, 47, 68),
(291, 47, 69),
(292, 47, 70),
(293, 47, 71),
(294, 48, 72),
(295, 48, 73),
(296, 48, 74),
(297, 48, 75),
(298, 48, 76),
(299, 49, 77),
(300, 49, 78),
(301, 49, 79),
(302, 50, 57),
(303, 50, 58),
(304, 50, 59),
(305, 50, 60),
(306, 50, 61),
(307, 46, 57),
(308, 46, 58),
(309, 46, 62),
(310, 46, 66),
(311, 46, 70),
(312, 46, 74),
(313, 46, 78),
(314, 47, 59),
(315, 47, 63),
(316, 47, 67),
(317, 47, 71),
(318, 47, 75),
(319, 47, 79),
(320, 48, 60),
(321, 48, 64),
(322, 48, 68),
(323, 48, 72),
(324, 48, 76),
(325, 49, 61),
(326, 49, 65),
(327, 49, 69),
(328, 49, 73),
(329, 49, 77),
(330, 50, 62),
(331, 50, 66),
(332, 50, 70),
(333, 50, 74),
(334, 50, 78),
(335, 51, 63),
(336, 51, 67),
(337, 51, 71),
(338, 51, 75),
(339, 51, 79),
(340, 51, 57),
(341, 51, 58),
(342, 52, 64),
(343, 52, 68),
(344, 52, 72),
(345, 52, 76),
(346, 52, 59),
(347, 52, 60),
(348, 53, 65),
(349, 53, 69),
(350, 53, 73),
(351, 53, 77),
(352, 53, 61),
(353, 53, 62),
(354, 53, 63),
(355, 54, 66),
(356, 54, 70),
(357, 54, 74),
(358, 54, 78),
(359, 54, 64),
(360, 54, 65),
(361, 54, 66),
(362, 54, 67),
(363, 55, 67),
(364, 55, 71),
(365, 55, 75),
(366, 55, 79),
(367, 55, 68),
(368, 55, 69),
(369, 56, 68),
(370, 56, 72),
(371, 56, 76),
(372, 56, 57),
(373, 56, 70),
(374, 56, 71),
(375, 56, 72),
(376, 57, 69),
(377, 57, 73),
(378, 57, 77),
(379, 57, 58),
(380, 57, 73),
(381, 57, 74),
(382, 57, 75),
(383, 57, 76),
(384, 58, 70),
(385, 58, 74),
(386, 58, 78),
(387, 58, 59),
(388, 58, 77),
(389, 58, 78),
(390, 58, 79),
(391, 59, 71),
(392, 59, 75),
(393, 59, 79),
(394, 59, 60),
(395, 59, 61),
(396, 59, 62),
(397, 60, 72),
(398, 60, 76),
(399, 60, 57),
(400, 60, 63),
(401, 60, 64),
(402, 60, 65),
(403, 60, 66),
(404, 60, 67),
(405, 60, 68),
(407, 3, 5),
(408, 3, 66),
(409, 3, 62),
(410, 3, 65),
(411, 3, 85),
(412, 3, 88),
(413, 3, 93),
(414, 3, 82),
(415, 3, 90),
(416, 3, 97),
(417, 3, 96),
(418, 3, 87),
(419, 3, 92),
(420, 3, 84),
(421, 3, 81),
(423, 3, 95),
(424, 3, 94),
(425, 3, 86),
(426, 3, 91),
(427, 3, 83),
(428, 3, 80),
(429, 3, 98),
(430, 3, 1),
(431, 3, 99),
(432, 3, 100),
(433, 66, 102),
(434, 66, 101),
(435, 66, 88),
(436, 66, 87),
(437, 3, 89);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(280) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`) VALUES
(1, 3, 'yolo thats the moto -drake', '2024-03-30 16:00:44'),
(5, 4, 'yesssir', '2024-03-30 16:23:06'),
(57, 46, 'Just wrapped up filming for my new movie! Can\'t wait for you all to see it.', '2024-04-07 15:45:22'),
(58, 46, 'Spending some quality time with family and friends. Cherishing these moments.', '2024-04-07 15:45:22'),
(59, 47, 'Excited to announce my upcoming project! Stay tuned for more details.', '2024-04-07 15:45:22'),
(60, 47, 'Throwback to the amazing time on the set of Friends. Miss those days!', '2024-04-07 15:45:22'),
(61, 47, 'Grateful for all the love and support from my fans. You guys are the best!', '2024-04-07 15:45:22'),
(62, 48, 'Had a fantastic meeting with the production team. Big things coming soon!', '2024-04-07 15:45:22'),
(63, 48, 'Enjoying a well-deserved vacation in a beautiful location. Recharging my batteries.', '2024-04-07 15:45:22'),
(64, 48, 'Just finished reading an incredible script. Can\'t wait to bring this character to life!', '2024-04-07 15:45:22'),
(65, 49, 'Thrilled to be a part of this amazing cause. Together, we can make a difference.', '2024-04-07 15:45:22'),
(66, 49, 'Behind the scenes of my latest photoshoot. Love working with such talented people.', '2024-04-07 15:45:22'),
(67, 50, 'Excited to share that I\'ll be starring in a new film alongside an incredible cast!', '2024-04-07 15:45:22'),
(68, 50, 'Reflecting on the incredible journey so far. Grateful for every opportunity.', '2024-04-07 15:45:22'),
(69, 51, 'Had a blast at the premiere of my new movie. Thanks to everyone who came out to support!', '2024-04-07 15:45:22'),
(70, 51, 'Feeling inspired after attending a powerful conference. Ready to make positive changes.', '2024-04-07 15:45:22'),
(71, 52, 'Training hard for my upcoming role. Pushing myself to new limits.', '2024-04-07 15:45:22'),
(72, 52, 'Enjoying some downtime with my family. Nothing beats quality time with loved ones.', '2024-04-07 15:45:22'),
(73, 53, 'Thrilled to announce my partnership with a brand I truly believe in. Stay tuned for more!', '2024-04-07 15:45:22'),
(74, 53, 'Reminiscing about the incredible experiences I\'ve had on set. Feeling grateful.', '2024-04-07 15:45:22'),
(75, 54, 'Excited to share a sneak peek of my upcoming project. Can\'t wait for you all to see it!', '2024-04-07 15:45:22'),
(76, 54, 'Taking a break from work to focus on my well-being. Self-care is important.', '2024-04-07 15:45:22'),
(77, 55, 'Had an amazing time at the awards ceremony. Congrats to all the deserving winners!', '2024-04-07 15:46:52'),
(78, 55, 'Feeling honored to be recognized for my work. Thank you for the support.', '2024-04-07 15:46:52'),
(79, 56, 'Working on an exciting new character. Can\'t wait to bring it to life on screen!', '2024-04-07 15:46:52'),
(80, 56, 'Enjoying a quiet evening at home. Sometimes the simple things are the best.', '2024-04-07 15:46:52'),
(81, 57, 'Thrilled to be a part of this groundbreaking project. Stay tuned for updates!', '2024-04-07 15:46:52'),
(82, 57, 'Feeling grateful for the opportunity to work with such talented individuals.', '2024-04-07 15:46:52'),
(83, 58, 'Excited to announce my upcoming tour dates! Can\'t wait to perform for you all.', '2024-04-07 15:46:52'),
(84, 58, 'In the studio working on new music. Pouring my heart and soul into every track.', '2024-04-07 15:46:52'),
(85, 59, 'Had a fantastic meeting with the creative team. Lots of exciting ideas in the works!', '2024-04-07 15:46:52'),
(86, 59, 'Taking a moment to appreciate the beauty of nature. It\'s the little things.', '2024-04-07 15:46:52'),
(87, 60, 'Thrilled to be collaborating with some amazing artists. Stay tuned for what\'s to come!', '2024-04-07 15:46:52'),
(88, 60, 'Feeling blessed to have such incredible fans. Your support means everything to me.', '2024-04-07 15:46:52'),
(89, 46, 'Excited to announce my next big project. Can\'t wait to share more details soon!', '2024-04-07 15:46:52'),
(90, 46, 'Enjoying a beautiful day outdoors. Sometimes you just need to disconnect and recharge.', '2024-04-07 15:46:52'),
(91, 47, 'Had a powerful meeting with some inspiring individuals. Feeling motivated to make a change.', '2024-04-07 15:46:52'),
(92, 47, 'Reflecting on my journey so far. Grateful for the lessons learned and growth experienced.', '2024-04-07 15:46:52'),
(93, 48, 'Thrilled to be a part of this incredible cast. Can\'t wait to bring this story to life!', '2024-04-07 15:46:52'),
(94, 48, 'Taking a break from social media to focus on personal growth. See you all soon.', '2024-04-07 15:46:52'),
(95, 49, 'Excited to share a behind-the-scenes look at my latest project. Stay tuned!', '2024-04-07 15:46:52'),
(96, 49, 'Feeling grateful for the love and support of my family and friends. You are my rock.', '2024-04-07 15:46:52'),
(97, 50, 'Working on something special. Can\'t wait to reveal it to the world!', '2024-04-07 15:46:52'),
(98, 50, 'Enjoying a peaceful moment of reflection. Finding joy in the present.', '2024-04-07 15:46:52'),
(99, 3, 'drake is my favourite artist', '2024-04-07 16:40:47'),
(100, 3, 'coding and music thats all you neeed', '2024-04-07 16:41:31'),
(101, 66, 'Hello world', '2024-04-07 16:45:14'),
(102, 66, 'sleep code and code more', '2024-04-07 16:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `biography` text,
  `mobile_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT 'default-profile-picture.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `biography`, `mobile_number`, `created_at`, `name`, `profile_picture`) VALUES
(3, 'elon.musk@friendzone.com', '$2y$10$geHbqiUKv.pp79owIUFgxuD/SeYsVCPYAjiU3A0CD9zrL.GU9KvPu', 'you only live once -drake', '89459383', '2024-03-30 15:39:15', 'racks', 'default-profile-picture.png'),
(4, 'bill.gates@friendzone.com', '$2y$10$6aZ.6VrMSkkocnZHrA/RnuI8NUwp05lbFrkydTTTL8qJqHvuKwjNS', 'Hello world, microsoft ceo', '233434323', '2024-03-30 16:22:11', 'Bill Gates', 'default-profile-picture.png'),
(5, 'Michael.Jordana@friendzone.com', '$2y$10$oCgPgPZcZox5NDlQJGPRn.JxmDgpMa87KbcCLe6rJdDERC5yYktuu', 'retired basketball player , 5x NBA champion', '3873487289748', '2024-03-31 14:48:16', 'Michael Jordan', 'default-profile-picture.png'),
(46, 'tom.hanks@friendzone.com', '$2y$10$LPaeWS.TwFKGc47J1eCkwuzmqOH7HXcV/WDCHKWYdFbr3cLFQrkEu', 'Still running, forest gump', '483034349', '2024-04-07 15:28:19', 'Tom Hanks', 'default-profile-picture.png'),
(47, 'jennifer.aniston@friendzone.com', '$2y$10$xUMYJJLWq0v8QC9qN3Wytu7p8V3Kzc1jOmJ4hUv/uj7aZfuhXi0.W', 'Actress known for Friends and various movies.', '8937837343', '2024-04-07 15:28:19', 'Jennifer Aniston', 'default-profile-picture.png'),
(48, 'brad.pitt@friendzone.com', '$2y$10$PL2N9Jv1j0m7k2r3t4x5v6b7n8m9k0l1p2q3r4s5t6v7b8n9m0a1', 'Actor and producer.', '7989798', '2024-04-07 15:28:19', 'Brad Pitt', 'default-profile-picture.png'),
(49, 'angelina.jolie@friendzone.com', '$2y$10$m0n1t2o3r4i5n6g7j8u9h0a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5', 'Actress, filmmaker, and humanitarian.', '789867879', '2024-04-07 15:28:19', 'Angelina Jolie', 'default-profile-picture.png'),
(50, 'leonardo.dicaprio@friendzone.com', '$2y$10$a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6q7r8s9t0u1v2w3x4y5z6', 'Actor and environmentalist.', '78978680', '2024-04-07 15:28:19', 'Leonardo DiCaprio', 'default-profile-picture.png'),
(51, 'scarlett.johansson@friendzone.com', '$2y$10$z9y8x7w6v5u4t3s2r1q0p9o8n7m6l5k4j3i2h1g0f9e8d7c6b5a4', 'Actress known for her roles in various films.', '9879809', '2024-04-07 15:28:19', 'Scarlett Johansson', 'default-profile-picture.png'),
(52, 'chris.hemsworth@friendzone.com', '$2y$10$b4c3d2e1f0g9h8i7j6k5l4m3n2o1p0q9r8s7t6u5v4w3x2y1z0a9', 'Actor known for playing Thor in the Marvel movies.', '97867879', '2024-04-07 15:28:19', 'Chris Hemsworth', 'default-profile-picture.png'),
(53, 'emma.stone@friendzone.com', '$2y$10$c4d3e2f1g0h9i8j7k6l5m4n3o2p1q0r9s8t7u6v5w4x3y2z1a0b9', 'Actress known for her roles in La La Land and other films.', '7898868789', '2024-04-07 15:28:19', 'Emma Stone', 'default-profile-picture.png'),
(54, 'ryan.gosling@friendzone.com', '$2y$10$d4e3f2g1h0i9j8k7l6m5n4o3p2q1r0s9t8u7v6w5x4y3z2a1b0c9', 'Actor and musician.', '76787987', '2024-04-07 15:28:19', 'Ryan Gosling', 'default-profile-picture.png'),
(55, 'natalie.portman@friendzone.com', '$2y$10$e4f3g2h1i0j9k8l7m6n5o4p3q2r1s0t9u8v7w6x5y4z3a2b1c0d9', 'Actress known for Black Swan and other films.', '6787878', '2024-04-07 15:28:19', 'Natalie Portman', 'default-profile-picture.png'),
(56, 'johnny.depp@friendzone.com', '$2y$10$f4g3h2i1j0k9l8m7n6o5p4q3r2s1t0u9v8w7x6y5z4a3b2c1d0e9', 'Actor known for his roles in various films.', '01010101', '2024-04-07 15:28:19', 'Johnny Depp', 'default-profile-picture.png'),
(57, 'jennifer.lawrence@friendzone.com', '$2y$10$g4h3i2j1k0l9m8n7o6p5q4r3s2t1u0v9w8x7y6z5a4b3c2d1e0f9', 'Actress known for her roles in The Hunger Games and other films.', '8798979', '2024-04-07 15:28:19', 'Jennifer Lawrence', 'default-profile-picture.png'),
(58, 'chris.evans@friendzone.com', '$2y$10$h4i3j2k1l0m9n8o7p6q5r4s3t2u1v0w9x8y7z6a5b4c3d2e1f0g9', 'Actor known for playing Captain America in the Marvel movies.', '876756879', '2024-04-07 15:28:19', 'Chris Evans', 'default-profile-picture.png'),
(59, 'margot.robbie@friendzone.com', '$2y$10$i4j3k2l1m0n9o8p7q6r5s4t3u2v1w0x9y8z7a6b5c4d3e2f1g0h9', 'Actress known for her roles in various films.', '803555-963', '2024-04-07 15:28:19', 'Margot Robbie', 'default-profile-picture.png'),
(60, 'will.smith@friendzone.com', '$2y$10$j4k3l2m1n0o9p8q7r6s5t4u3v2w1x0y9z8a7b6c5d4e3f2g1h0i9', 'Actor and rapper.', '89038430', '2024-04-07 15:28:19', 'Will Smith', 'default-profile-picture.png'),
(66, 'keele@friendzone.com', '$2y$10$loNtg1U1EF68codhoaQCLug6i4jNcgwZx3roG9vHSs5XXxut0noZ6', 'Coding since 2016', '234957493', '2024-04-07 16:44:44', 'keele', 'default-profile-picture.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
